<?php
/**
 * VCD-db - a web based VCD/DVD Catalog system
 * Copyright (C) 2003-2006 Konni - konni.com
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 * 
 * @author  Hákon Birgisson <konni@konni.com>
 * @package Kernel
 * @version $Id$
 *
 */

class VCDXMLImporter {
		
	/**
	 * XSD to validate VCD-db XML Movie files.
	 *
	 */
	CONST XSD_VCDDB_MOVIES = "includes/schema/vcddb-export.xsd";
	CONST XSD_VCDDB_MOVIES_LEGACY = "includes/schema/vcddb-export-legacy.xsd";
	
	/**
	 * XSD to validate VCD-db XML Thumbnails files.
	 *
	 */
	CONST XSD_VCDDB_THUMBS = "includes/schema/vcddb-thumbnails.xsd";
	
	
	
	/**
	 * Get the number of movie entries in the XML file.
	 *
	 * @param string $strXmlFile | The XML file to load and read from.
	 * @return int | The number of movie entries found in XML file.
	 */
	public static function getXmlMovieCount($strXmlFile) {
		try {
			$file = TEMP_FOLDER.$strXmlFile;
			if (!file_exists($file)) {
				throw new Exception("Could not load file " . $file);
			}
			
			$xml = simplexml_load_file($file);
			$movieCount = count($xml->xpath("//movie")); 
			if (is_numeric($movieCount)) {
				return $movieCount;
			} else {
				return 0;
			}
			
		} catch (Exception $ex) {
			throw $ex;
		}
	}
	
	/**
	 * Get the number of entries in the XML file.
	 *
	 * @param string $strXmlFile | The XML file to load and read from.
	 * @return int | The number of cover entries found in the XML file.
	 */
	public static function getXmlThumbnailCount($strXmlFile) {
		try {
			
			$file = TEMP_FOLDER.$strXmlFile;
			if (!file_exists($file)) {
				throw new Exception("Could not load file " . $file);
			}
			
			$xml = simplexml_load_file($file);
			$coverCount = count($xml->xpath("//cdcover")); 
			if (is_numeric($coverCount)) {
				return $coverCount;
			} else {
				return 0;
			}
		} catch (Exception $ex) {
			throw $ex;
		}
	}
	
	
	/**
	 * Get the Movie Titles from the XML Movie file
	 *
	 * @param string $strXmlFile | The XML Movie file to read from.
	 * @return array | Array of movie titles.
	 */
	public static function getXmlTitles($strXmlFile) {
		try {
		
			$xml = simplexml_load_file(TEMP_FOLDER.$strXmlFile);
			$movies = $xml->movie;
			$arrMovies = array();
			foreach ($movies as $movie) {
				if ( strcmp((string)$movie->title, "") != 0 ) {
					array_push($arrMovies, utf8_decode((string)$movie->title));
				}
			}
			
			return $arrMovies;
			
			
		} catch (Exception $ex) {
			throw $ex;
		}
	}
	

	/**
	 * Handle a XML Movie upload and import.
	 *
	 * @return string | The uploaded file name
	 */
	public static function validateXMLMovieImport() {
		
		// Set the allowed extensions for the upload
		$arrExt = array(VCDUploadedFile::FILE_XML , VCDUploadedFile::FILE_TGZ , VCDUploadedFile::FILE_ZIP );
		$VCDUploader = new VCDFileUpload($arrExt);
		
		if ($VCDUploader->getFileCount() != 1) {
			throw new Exception("No File was uploaded.");
		}
		
		$fileObj = $VCDUploader->getFileAt(0);
		// Move the file to the TEMP Folder
		$fileObj->move(TEMP_FOLDER);
		// Get the full path including filename after it has been moved
		$fileLocation = $fileObj->getFileLocation();
		
				    
		 // Check if this is a compressed file ..
   		$filename = $fileObj->getFileName();
   		if (strpos($filename, ".tgz")) {
   			// The file is a tar archive .. lets untar it ...
   			require_once('classes/external/compression/tar.php');
   			$zipfile = new tar();
   			if ($zipfile->openTAR($fileLocation)) {
   				if ($zipfile->numFiles != 1) {
   					throw new Exception('Only one XML file is allowed per Tar archive');
   				}
   				
   				$tar_xmlfile = $zipfile->files[0]['file'];
   				$tar_xmlfilename = VCDUtils::generateUniqueId().".xml";
   				
   				// Write the contents to cache
   				VCDUtils::write(TEMP_FOLDER.$tar_xmlfilename, $tar_xmlfile);
   				$fileLocation = TEMP_FOLDER.$tar_xmlfilename;
   				
   				// delete the original Tar file
   				$fileObj->delete();
 				
   				
   			} else {
   				throw new Exception('The uploaded TAR file could not be opened.');
   			}
   		} elseif (strpos($filename, ".zip")) {
   			
   			require_once('classes/external/compression/pclzip.lib.php');
		  	$archive = new PclZip($fileLocation);
		  	
		  	if (($list = $archive->listContent()) == 0) {
		  		throw new Exception("No files found in archive.<break>". $archive->errorInfo(true));
  			}
  			
  			if (sizeof($list) > 1) {
  				throw new Exception("Only one file is allowed within the zip archive.");
  			}
  			
		  	if ($archive->extract(PCLZIP_OPT_PATH, TEMP_FOLDER) == 0) {
		  		throw new Exception($archive->errorInfo(true));
		  	}
		  	
		  	$fileLocation = TEMP_FOLDER.$list[0]['filename'];
		  	
		  	
		  	// delete the original Zip file
   			$fileObj->delete();
   		}

   		
		 
   		/* Process the XML Thumbnail file */
	    if (!fs_file_exists($fileLocation)) {
	   		throw new Exception('Failed to open the Xml file.');
	    }
	
	   		
		 // Validate the document before processing it ..
		 
		 $dom = new domdocument();
		 $dom->load($fileLocation);
		 $schema = self::XSD_VCDDB_MOVIES;
		 if (!@$dom->schemaValidate($schema)) {
		 	throw new Exception("XML Document does not validate to the VCD-db XSD import schema.<break>Please fix the document or export a new one.<break>The schema can be found under '/includes/schema/vcddb-export.xsd'");
		 }
		 unset($dom);
	   		
	 	return str_replace(TEMP_FOLDER, "", $fileLocation);
	}
	

	/**
	 * Handle a XML Thumbnail upload and import.
	 *
	 * @return string | The name of the uploaded XML file.
	 */
	public static function validateXMLThumbsImport() {
	
		// Set the allowed extensions for the upload
		$arrExt = array(VCDUploadedFile::FILE_XML , VCDUploadedFile::FILE_TGZ, VCDUploadedFile::FILE_ZIP );
		$VCDUploader = new VCDFileUpload($arrExt);
		
		if ($VCDUploader->getFileCount() != 1) {
			throw new Exception("No File was uploaded.");
		}
		
		$fileObj = $VCDUploader->getFileAt(0);
		// Move the file to the TEMP Folder
		$fileObj->move(TEMP_FOLDER);
		// Get the full path including filename after it has been moved
		$fileLocation = $fileObj->getFileLocation();
		    
		 // Check if this is a compressed file ..
   		$filename = $fileObj->getFileName();
   		if (strpos($filename, ".tgz")) {
   			// The file is a tar archive .. lets untar it ...
   			require_once('classes/external/compression/tar.php');
   			$zipfile = new tar();
   			if ($zipfile->openTAR($fileLocation)) {
   				if ($zipfile->numFiles != 1) {
   					throw new Exception('Only one XML file is allowed per Tar archive');
   				}
   				
   				$tar_xmlfile = $zipfile->files[0]['file'];
   				$tar_xmlfilename = VCDUtils::generateUniqueId().".xml";
   				
   				// Write the contents to cache
   				VCDUtils::write(TEMP_FOLDER.$tar_xmlfilename, $tar_xmlfile);
   				$fileLocation = TEMP_FOLDER.$tar_xmlfilename;
   				
   				// delete the original Tar file
   				$fileObj->delete();
 				
   				
   			} else {
   				throw new Exception('The uploaded TAR file could not be opened.');
   			}
   		} elseif (strpos($filename, ".zip")) {
   			
   			require_once('classes/external/compression/pclzip.lib.php');
		  	$archive = new PclZip($fileLocation);
		  	
		  	if (($list = $archive->listContent()) == 0) {
		  		throw new Exception("No files found in archive.<break>". $archive->errorInfo(true));
  			}
  			
  			if (sizeof($list) > 1) {
  				throw new Exception("Only one file is allowed within the zip archive.");
  			}
  			
		  	if ($archive->extract(PCLZIP_OPT_PATH, TEMP_FOLDER) == 0) {
		  		throw new Exception($archive->errorInfo(true));
		  	}
		  	
		  	$fileLocation = TEMP_FOLDER.$list[0]['filename'];
		  	
		  	
		  	// delete the original Zip file
   			$fileObj->delete();
   		}
		      
		 
   		/* Process the XML Thumbnail file */
	    if (!fs_file_exists($fileLocation)) {
	   		throw new Exception('Failed to open the thumbnails file.');
	    }
	
	   		
		 // Validate the document before processing it ..
		 
		 $dom = new domdocument();
		 $dom->load($fileLocation);
		 $schema = self::XSD_VCDDB_THUMBS;
		 if (!@$dom->schemaValidate($schema)) {
			throw new Exception("XML Document does not validate to the VCD-db Thumbnails XSD import schema.<break>Please fix the document or export a new one.<break>The schema can be found under '/includes/schema/vcddb-thumbnails.xsd'");
		 }
		 unset($dom);
	   		
	 	return str_replace(TEMP_FOLDER, "", $fileLocation);
   		
	}


	/**
	 * Add a single movie from the $xmlfilename into database.
	 *
	 * @param string $xmlfilename | The XML Movie file to read from
	 * @param int $index | The item index to read in the XML Movie file.
	 * @param string $xmlthumbsfilename | The XML Thumbnail file to read from.
	 * @return array | Status array containing status information.
	 * @throws AjaxException
	 */
	public function addMovie($xmlfilename, $index, $xmlthumbsfilename = null) {
		try {
		
			$xml = simplexml_load_file(TEMP_FOLDER.$xmlfilename);
			$movie = $xml->movie[$index];
			$status = "1";
			$thumb = "0";
			
			if (count($movie) == 1) {
			
				$movie_id = (string)$movie->id;
				$vcdObj = $this->createMovieObject($movie);
				
				if (!is_null($xmlthumbsfilename)) {
					$xmlthumbnail = TEMP_FOLDER.$xmlthumbsfilename;
					$coverObj = $this->getThumbnail($movie_id, $xmlthumbnail);
					if ($coverObj instanceof cdcoverObj ) {
						$thumb = "1";
						$vcdObj->addCovers(array($coverObj));
					}
				}
					
			
				// Delegate the vcdObj to the facade
				$ClassVcd = VCDClassFactory::getInstance('vcd_movie');
				$iResults = $ClassVcd->addVcd($vcdObj);
				if (!is_numeric($iResults) || $iResults == -1) {
					$status = "0";
				}
				//VCDUtils::write(TEMP_FOLDER."results.txt", print_r($vcdObj, true), true);
				
			}
			
			
			$arr = array(
				'name' => utf8_encode((string)$movie->title), 
				'status' => utf8_encode($status),
				'thumb' => utf8_encode($thumb));
			
			return $arr;
			
		
		} catch (Exception $ex) {
			throw new AjaxException($ex->getMessage(), $ex->getCode());
		}
		
	}
	
	/**
	 * Get the imported thumbnail as cdCoverObj is it exists, otherwise returns null.
	 *
	 * @param int $vcd_id | The MovieID to find the matching cover
	 * @param string $xmlfilename | The XML file name of the cover file.
	 * @return cdcoverObj
	 */
	private function getThumbnail($vcd_id, $xmlfilename) {
		try {
		
			if (file_exists($xmlfilename) && is_file($xmlfilename)) {

				$xml = simplexml_load_file($xmlfilename);
				
				$query = "//vcdthumbnails/cdcover/vcd_id[. = {$vcd_id}]";
				$nodeList = $xml->xpath($query);
				if (isset($nodeList)) {
					if (!isset($nodeList[0])) { return null;}
					$node = $nodeList[0];
					$parent = $node->xpath('parent::node()');
					if (isset($parent[0])) {
						$cover = $parent[0];
						return $this->createThumbnailObject($cover);
					}
				}
			}
			return null;
		} catch (Exception $ex) {
			throw $ex;
		}
	}
	
	
	/**
	 * Create a CDcoverObj from the XMLElement, returns null if cover is not Ok.
	 *
	 * @param SimpleXMLElement $element
	 * @return cdcoverObj
	 */
	private function createThumbnailObject(SimpleXMLElement $element) {
		try {

			$filename = (string)$element->filename;
			$data = (string)$element->data;
			$ClassCovers = VCDClassFactory::getInstance('vcd_cdcover');
			$cdCoverObj = null;
						
			// Check if the data is not null and then write the image to temp folder
			if ((strlen($data) > 0) && VCDUtils::write(TEMP_FOLDER.$filename, base64_decode($data))) {
				$cdCoverObj = new cdcoverObj();
				$coverTypeObj = $ClassCovers->getCoverTypeByName("thumbnail");
				$cdCoverObj->setCoverTypeID($coverTypeObj->getCoverTypeID());
				$cdCoverObj->setCoverTypeName("Thumbnail");
				$cdCoverObj->setFilename($filename);
			}
			
			return $cdCoverObj;		
			
		} catch (Exception $ex) {
			throw $ex;
		}
	}
	
	
	/**
	 * Create a vcdObj from the XMLElement, returns null if the vcdObj is not ok.
	 *
	 * @param SimpleXMLElement $element
	 * @return vcdObj
	 */
	private function createMovieObject(SimpleXMLElement $element) {
		try {
		
			$ClassSettings = VCDClassFactory::getInstance('vcd_settings');
			$ClassPorn = VCDClassFactory::getInstance("vcd_pornstar");
			$adult_cat = $ClassSettings->getCategoryIDByName('adult');
		    
			
			
   			// Create the basic CD obj
			$basic = array('', utf8_decode((string)$element->title), (string)$element->category_id, (string)$element->year);
			$vcd = new vcdObj($basic);
			
			// Add 1 instance
			$mediaTypeObj = $ClassSettings->getMediaTypeByID((string)$element->mediatype_id);
			if (is_null($mediaTypeObj)) {
				
				// Non existing media type .. at least not found by ID
				// try a lookup by name
				
				$mediaTypeObj = $ClassSettings->getMediaTypeByName((string)$element->mediatype);
				if (is_null($mediaTypeObj)) {
					// Still no luck .. then lets create mediatype
					$newMediaTypeObj = new mediaTypeObj(array('',(string)$element->mediatype,'','Created by XML importer.'));
					$ClassSettings->addMediaType($newMediaTypeObj);
					$mediaTypeObj = $ClassSettings->getMediaTypeByName((string)$element->mediatype);
				}
			}
			
			$vcd->addInstance($_SESSION['user'], $mediaTypeObj, (string)$element->cds, (string)$element->dateadded);
			
			
			$movieCatObj = $ClassSettings->getMovieCategoryByID((string)$element->category_id);
			if ($movieCatObj instanceof movieCategoryObj ) {
				$vcd->setMovieCategory($movieCatObj);
			} 		   			
   			
   			
   			$source_id = '';
   			
   			if ($element->category_id == $adult_cat) {
   				// Adult flick
   				
   				// Check if any pornstars are associated in the movie
   				$pornstars = $element->pornstars->pornstar;
   				
   					   				
   				if (isset($pornstars)) {
   					foreach ($pornstars as $pornstar) {
   						$starObj = null;
   						$starObj = $ClassPorn->getPornstarByName((string)$pornstar->name);
   						
   						if ($starObj instanceof pornstarObj ) {
   							$vcd->addPornstars($starObj);
   						} else {
   							// Star was not found in DB | create the entry
   							$s = new pornstarObj(array('',(string)$pornstar->name, (string)$pornstar->homepage, ''));
   							$vcd->addPornstars($ClassPorn->addPornstar($s));
   						}
   					}
   				}
   				
   				
   				
   				// Set the studio if any
   				$studio = $element->studio;
   				if (sizeof($studio) > 0) {
   					$studioObj = $ClassPorn->getStudioByName((string)$studio->name);
   					if ($studioObj instanceof studioObj ) {
   						$vcd->setStudioID($studioObj->getID());
   					} else {
   						$studioObj = new studioObj(array('', (string)$studio->name));
   						$ClassPorn->addStudio($studioObj);
   						
   						// Find the just added studioObj
   						$studioObj = $ClassPorn->getStudioByName((string)$studio->name);
   						// And add it to the movie
   						if ($studioObj instanceof studioObj ) {
   							$vcd->setStudioID($studioObj->getID());
   						}
   						
   					}
   				}
   				
   				
   				$sourceSiteObj = $ClassSettings->getSourceSiteByID((string)$element->sourcesite_id);
				if ($sourceSiteObj instanceof sourceSiteObj ) {
					$source_id = $sourceSiteObj->getsiteID();		
				}
				
				// Add the adult categories if any
				$adult_categories = $element->adult_category->category;
				if (!is_null($adult_categories) && sizeof($adult_categories > 0)) {
					foreach ($adult_categories as $xmlcat) {
						$catObj = new porncategoryObj(array((string)$xmlcat->id, (string)$xmlcat->name));
						$vcd->addAdultCategory($catObj);
					}
				}
   				
   				
   						   			
   			} else {
   				// Normal flick
   				
   				if (isset($element->imdb)) {
   				
   					$imdb = $element->imdb;
   					
	   				// Create the IMDB obj
					$obj = new imdbObj();
					$obj->setIMDB((string)$imdb->imdb_id);
					$obj->setTitle(utf8_decode((string)$imdb->title));
					$obj->setYear((string)$imdb->year);
					$obj->setDirector((string)$imdb->director);
					$obj->setGenre((string)$imdb->genre);
					$obj->setRating((string)$imdb->rating);
					$obj->setCast(utf8_decode(ereg_replace("\|",13,(string)$imdb->cast)));
					$obj->setPlot((string)$imdb->plot);
					$obj->setRuntime((string)$imdb->runtime);
					$obj->setCountry((string)$imdb->country);
					
					// Add the imdbObj to the VCD
					$vcd->setIMDB($obj);
	   				
	   				}
	   				
	   			$sourceSiteObj = $ClassSettings->getSourceSiteByID((string)$element->sourcesite_id);
				if ($sourceSiteObj instanceof sourceSiteObj ) {
					$source_id = $sourceSiteObj->getsiteID();		
				}
				
   			}

   			$external_id = (string)$element->external_id;
   			
   			// Set the source site
   			if ($source_id != '' && $external_id != '') {
				$vcd->setSourceSite($source_id, $external_id);
   			}
			
   			
   			// Check for comments
   			$comments = $element->comments->comment;
   			if (isset($comments) && !is_null($comments)) {
   				foreach ($comments as $xmlComment) {
   					$commentData = array('', '', VCDUtils::getUserID(), (string)$xmlComment->date, utf8_decode((string)$xmlComment->text), (string)$xmlComment->isPrivate);
   					$commentObj = new commentObj($commentData);
   					$vcd->addComment($commentObj);
   				}
   			}
   			
   			
   			// Check for metadata
   			$metadata = $element->meta->metadata;
   			if (isset($metadata) && !is_null($metadata)) {
   				foreach ($metadata as $xmlMeta) {
   					$metaArr = array('', '', VCDUtils::getUserID(),(string)$xmlMeta->type_name, (string)$xmlMeta->data, $mediaTypeObj->getmediaTypeID(), 
   							  (string)$xmlMeta->type_id, (int)$xmlMeta->type_level, (string)$xmlMeta->type_desc);
   					$metaObj = new metadataObj($metaArr);
   					$vcd->addMetaData($metaObj);
   				}
   			}
   			
   			
   			   			
   			return $vcd;	
		   		
				
			
		
		} catch (Exception $ex) {
			throw $ex;
		}
	}
	
	
}


class VCDXMLExporter {

	CONST EXP_XML = 1;
	CONST EXP_TGZ = 2;
	CONST EXP_ZIP = 3;
	CONST EXP_XLS = 4;
	
	CONST XML_ENCODING = "UTF-8";
	
	
	public static function exportMovies($expMethod, $iUserID = null) {
		try {
			
			// Cut some (inifinite) slack ..
			set_time_limit(0);
			
			
			$xml = "<?xml version=\"1.0\" encoding=\"".self::XML_ENCODING."\" ?>";
			// Create the root XMLElement
			$xml .= "<vcddb appversion=\"".VCDDB_VERSION."\" created=\"".date('c')."\">";
			
			// Add the sourcesites XMLElements
			$xml .= self::getXMLSourceSites();
			
			// Add the movies XMLElements
			$xml .= self::getXMLMovies($iUserID);
						
			
			// Close the root XMLElement
			$xml .= "</vcddb>";
			
			
			// Pretty print the XML
			$xmlObj = simplexml_load_string($xml);
			
			
			// Generate XML filename
			$XmlFilename = self::generateFileName('xml');
			
			// Select export routine ..
			switch ($expMethod) {
				case self::EXP_XML:
					
					// Write the XML file to cache folder
					VCDUtils::write(CACHE_FOLDER.$XmlFilename, $xmlObj->asXML());
					
					// Stream the file to browser
					send_file(CACHE_FOLDER.$XmlFilename);
					
					// Delete the XML file from cache
					fs_unlink(CACHE_FOLDER.$XmlFilename);
				
					break;
					
				case self::EXP_ZIP:
					
					require_once('external/compression/zip.php');
					
					// Generate Zip filename
					$ZipFilename = self::generateFileName('zip');
					
					$zipfile = new zipfile();
					$zipfile->addFile($xml, $XmlFilename);
					
					// Write the zip file to cache folder
					VCDUtils::write(CACHE_FOLDER.$ZipFilename, $zipfile->file());
					// Stream the file to browser
					send_file(CACHE_FOLDER.$ZipFilename);
					// Delete the Zip file from cache
					fs_unlink(CACHE_FOLDER.$ZipFilename);

					break;
					
					
				case self::EXP_TGZ:
					
					require_once('external/compression/tar.php');
	
					// Generate Tar filename
					$TarFilename = self::generateFileName('tgz');
					
					VCDUtils::write(CACHE_FOLDER.$XmlFilename, $xml);
					$zipfile = new tar();
					$zipfile->addFile(CACHE_FOLDER.$XmlFilename);
					fs_unlink(CACHE_FOLDER.$XmlFilename);
					
					// Write the TAR file to disk
					VCDUtils::write(CACHE_FOLDER.$TarFilename, $zipfile->toTarOutput("movie_export", true));
					// Stream the file to browser
					send_file(CACHE_FOLDER.$TarFilename);
					// Delete the tar file from cache
					fs_unlink(CACHE_FOLDER.$TarFilename);
					
					break;				
				
				default:
					throw new Exception('Undefined export method');
					break;
					
					
			}
			
			
			
		} catch (Exception $ex)	{
			throw new VCDException($ex);			
		}
		
	}
	
	
	public static function exportThumbnails($expMethod, $iUserID = null) {
		
		try {
		
			// Cut some (inifinite) slack ..
			@set_time_limit(0);
			
			$COVERClass = VCDClassFactory::getInstance('vcd_cdcover');
			if (is_null($iUserID)) {
				$arrCovers = $COVERClass->getAllThumbnailsForXMLExport(VCDUtils::getUserID());	
			} else {
				$arrCovers = $COVERClass->getAllThumbnailsForXMLExport($iUserID);
			}
			
			
			$xml = "<?xml version=\"1.0\" encoding=\"".self::XML_ENCODING."\" ?>";
			$xml .= "<vcdthumbnails>";
			foreach ($arrCovers as $cdcover) {
				$xml .= $cdcover->toXML();
			}
			$xml .= "</vcdthumbnails>";
			
			
			// Generate XML filename
			$XmlFilename = self::generateThumbFileName('xml');
			
			// Select export routine ..
			switch ($expMethod) {
				case self::EXP_XML:
					
					// Write the XML file to cache folder
					VCDUtils::write(CACHE_FOLDER.$XmlFilename, $xml);
					
					// Stream the file to browser
					send_file(CACHE_FOLDER.$XmlFilename);
					
					// Delete the XML file from cache
					fs_unlink(CACHE_FOLDER.$XmlFilename);
				
					break;
					
				case self::EXP_ZIP:
					
					require_once('external/compression/zip.php');
					
					// Generate Zip filename
					$ZipFilename = self::generateThumbFileName('zip');
					
					$zipfile = new zipfile();
					$zipfile->addFile($xml, $XmlFilename);
					
					// Write the zip file to cache folder
					VCDUtils::write(CACHE_FOLDER.$ZipFilename, $zipfile->file());
					// Stream the file to browser
					send_file(CACHE_FOLDER.$ZipFilename);
					// Delete the Zip file from cache
					fs_unlink(CACHE_FOLDER.$ZipFilename);

					break;
					
					
				case self::EXP_TGZ:
					
					require_once('external/compression/tar.php');
	
					// Generate Tar filename
					$TarFilename = self::generateThumbFileName('tgz');
					
					VCDUtils::write(CACHE_FOLDER.$XmlFilename, $xml);
					$zipfile = new tar();
					$zipfile->addFile(CACHE_FOLDER.$XmlFilename);
					fs_unlink(CACHE_FOLDER.$XmlFilename);
					
					// Write the TAR file to disk
					VCDUtils::write(CACHE_FOLDER.$TarFilename, $zipfile->toTarOutput("thumbnail_export", true));
					// Stream the file to browser
					send_file(CACHE_FOLDER.$TarFilename);
					// Delete the tar file from cache
					fs_unlink(CACHE_FOLDER.$TarFilename);
					
					break;				
				
				default:
					throw new Exception('Undefined export method');
					break;
					
					
			}
			
			
			
		} catch (Exception $ex)	{
			throw new VCDException($ex);			
		}
		
	}

	
	private static function getXMLSourceSites() {
		$xml = "<sourcesites>";
		
		$CLASSSettings = new vcd_settings();
		foreach($CLASSSettings->getSourceSites() as $sourceSiteObj) {
			$xml .= $sourceSiteObj->toXML();
		}
		
		$xml .= "</sourcesites>";
		return $xml;
	}
	
	
	private static function getXMLMovies($iUserID = null) {
		
		$xml = "<vcdmovies>";
		$CLASSVcd = VCDClassFactory::getInstance("vcd_movie");
		if (!is_null($iUserID)) {
			$arrMovies = $CLASSVcd->getAllVcdByUserId($iUserID, false);
		} else {
			$arrMovies = $CLASSVcd->getAllVcdByUserId(VCDUtils::getUserID(), false);				
		}
						
		foreach ($arrMovies as $vcdObj) { $xml .= $vcdObj->toXML();	}
		$xml .= "</vcdmovies>";
				
		return $xml;
		
	}
	
	
	private static function generateFileName($extension) {
		$filename = "VCDdb-Export-".date("d.m.Y").".".$extension;
		return $filename;
	}
	
	private static function generateThumbFileName($extension) {
		$filename = "VCDdb-Thumbnails-".date("d.m.Y").".".$extension;
		return $filename;
	}

	private static function tar($file) {
		
		
	}
	
	private static function zip($file) {
		
		
	}


}




?>
<?php
/**
 * VCD-db - a web based VCD/DVD Catalog system
 * Copyright (C) 2003-2004 Konni - konni.com
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 * 
 * @author  H�kon Birgsson <konni@konni.com>
 * @package Kernel
 * @subpackage WebFetch
 * @version $Id$
 */
 
?>
<? 
class VCDFetch_yahoo extends VCDFetch {
	
	
	protected $regexArray = array(
		'title' 	  => '<td bgcolor=A6B9DC width=570><h1><strong>([^<]*)</strong></h1></td>',
		'year'  	  => '<td bgcolor=A6B9DC width=570><h1><strong>([^<]*)</strong></h1></td>',
		'genre'	 	  => 'Genres:</b></font></td>([^<]*)<td valign="top"><font face=arial size=-1>([^<]*)</font></td>',
		'cast' 		  => null,
		'plot'		  => '<font face=arial size=-1>([^<]*)<br clear',
		'director'	  => '&id=([0-9]{10})&cf=gen">([^<]*)</a></font>',
		'poster'	  => '<img src=([^<]*) width="101"',
		'country'	  => 'Produced in:</b></font></td>([^<]*)<td valign="top"><font face=arial size=-1>([^<]*)</font></td>',
		'runtime' 	  => 'Running Time:</b></font></td>([^<]*)<td valign="top"><font face=arial size=-1>([^<]*)</font></td>'
		);
	
			
	protected $multiArray = array(
		'cast', 'genre', 'poster'
	);
		
		
		
	private $servername = 'movies.yahoo.com';
	private $searchpath = '/mv/search?p=[$]';
	private $itempath   = '/movie/[$]/details';
		
	
	public function __construct() {
		$this->useSnoopy();
		$this->setSiteName("yahoo");
		$this->setFetchUrls($this->servername, $this->searchpath, $this->itempath);
	}
	
	protected function processResults() {
		if (!is_array($this->workerArray) || sizeof($this->workerArray) == 0) {
			$this->setErrorMsg("No results to process.");
			return;
		}
		
		$obj = new imdbObj();
		$obj->setIMDB($this->getItemID());
		
		foreach ($this->workerArray as $key => $data) {
			
			$entry = $data[0];
			$arrData = $data[1];
			
			switch ($entry) {
				case 'title':
					$title = $arrData[1];
					$regex = "\(([0-9]{4})\)";
					$title = ereg_replace($regex, "", $title);
					$obj->setTitle($title);	
					break;
				
				case 'year':
					$title = $arrData[1];
					$regex = "([0-9]{4})";
					if(@eregi($regex, $title, $retval)) { 
						$year = $retval[0];
						if (is_numeric($year)) {
							$obj->setYear($year);
						}
					}
									
					break;
					
				case 'poster':
					$poster = $arrData[0][1];
					if (substr_count($poster, "npa.gif") == 0) {
						$obj->setImage($poster);
					}
					break;
					
				case 'runtime':
					$runtime = $arrData[2];
					if (!is_numeric($runtime)) {
						$regex = "([0-9]{1}) ([^<]*) ([0-9]{1,2}) min.";
						if(@eregi($regex, $runtime, $retval)) { 
							if (sizeof($retval) >= 3) {
								$hours = $retval[1];
								$minutes = $retval[3];
								if (is_numeric($hours) && is_numeric($minutes)) {
									$runtime = ($hours*60) + $minutes;
									$obj->setRuntime($runtime);
								}
							}
						}
					}
					$obj->setRuntime($runtime);
					
					break;
					
					
				case 'director':
					// Implemented in the cast section ..
					break;
					
					
				case 'plot':
					$plot = $arrData[1];
					$obj->setPlot($plot);
					break;
					
				case 'genre':
					$genres = $arrData[0][2];
					$genres = str_replace("and", ",", $genres);
					$arr = split("/", $genres);
					
					$obj->setGenre($arr);
					break;
					
				case 'rating':
					$rating = $arrData[1].$arrData[2];
				    $rating = $rating/10;
				    $obj->setRating($rating);
					break;
					
				case 'cast':
					$arr = null;
					$arr = array();				
					foreach ($arrData as $itemArr) {
						$actor = $itemArr[1];
						$role = $itemArr[3];
						if (strcmp($role, "<!-- N/A -->") ==0) {
							$role = "";
						}
						
						// Break when we hit the director ..
						if (strcmp($role,"Director")==0) {
							$obj->setDirector($actor);
							break;}
						
						$result = $actor." .... " .$role;
						array_push($arr, $result);
					}
					$obj->setCast($arr);
					break;
					
				case 'runtime':
					$runtime = $arrData[1];
					$obj->setRuntime($runtime);
					break;
					
				case 'akas':
					$akaTitles = implode(',', $arrData);
					$obj->setAltTitle($akaTitles);
					break;
					
				case 'plot':
					$plot = $arrData;
					$obj->setPlot($plot);
					break;
					
				case 'country':
					$country = $arrData[2];
					$obj->setCountry($country);
					
					break;
					
					
					
				default:
					break;
				}
			
			}
		
			$this->fetchedObj = $obj;
	
	
	}
	
	
	protected function fetchDeeper($entry) {
		
		switch ($entry) {
			case 'cast':
			
				// Save the old buffer
				$itemBuffer = $this->getContents();	
			
				// Generate urls
				$actorurl = "/movie/".$this->getItemID()."/cast";
				$referer = "http://".$this->servername.str_replace('[$]', $this->getItemID(), $this->itempath);
				
				// Set the regx
				$regx = '&cf=gen">([^"]+)</a></font></td>([^\s])<td><font face=arial size=-1>([^"]+)</font>';
				
				$isActors =  $this->fetchPage($this->servername, $actorurl, $referer);
				if ($isActors) {
					if ($this->getItem($regx, true) == self::ITEM_OK) {
						$actors = $this->getFetchedItem();
						array_push($this->workerArray, array($entry, $actors));
						
					} 
				} 
				
				// Restore the old buffer
				$this->setContents($itemBuffer);
				
				break;
		
			default:
				break;
		}
		
	}
	
	public function search($title) { 
		return parent::search($title);
	}
	
	public function showSearchResults() {
		
		
		$this->setMaxSearchResults(50);
		$regx = 'd=hv&cf=info&id=([0-9]{10})">([^"]+)</a><br>';

		$results = parent::generateSimpleSearchResults($regx,1,2);
		
		
		

		parent::generateSearchSelection($results);
		
		/*
		print "<pre>";
		print_r($results);
		print "</pre>";
		*/
					
	}
	
	
	
}




?>
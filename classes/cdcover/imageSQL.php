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
 * @package CDCover
 * @version $Id$
 */
 
?>
<?PHP

	class imageSQL {
		
		/**
		 * Constant representing the image table name in database.
		 *
		 * @var string
		 */
		private $TABLE_images = "vcd_Images";
		/**
		 * An adodb connection object
		 *
		 * @var adodb object
		 */
		private $db;
		/**
		 * instance of NewADOConnection from ther adodb class
		 *
		 * @var NewADOConnection
		 */
		private $conn;
	 			

		
		public function __construct() {
			$conn = new Connection();
	 		$this->db = &$conn->getConnection();
	 		$this->conn = &$conn;
		}
		
		
		/**
		* @return The inserted Image id
		* @desc Add image to the database
		
		* @param string $name
		* @param string $file_type
		* @param string $file_size
		* @param MIME64 string $stream
		*/
		public function addImage($name = 'Unnamed image', $file_type = 'image/jpg', $file_size = 0, $stream = null) {
			
			if ($file_size == 0 || $stream == null) {
				return false;
			}
			
			
			// Figure out the name of the file and extension ..
			
			
			$query = "INSERT INTO $this->TABLE_images (name, image_type, image_size, image)
					  VALUES (".$this->db->qstr($name).",".$this->db->qstr($file_type).", $file_size, null)";

			// Execute the query
			$this->db->Execute($query);
			
			// Get the last inserted ID
			$new_imageid = $this->db->Insert_Id();
			
			if ($this->conn->getSQLType() == 'postgres7') {
				$new_imageid =  $this->conn->oToID($this->TABLE_images, 'image_id');
			}
			
			
			// is the new imageID ok ?
			if (!is_numeric($new_imageid)) {
				// seems not ok .. let's get last inserted id manually
				$query = "SELECT image_id FROM $this->TABLE_images ORDER BY image_id DESC";
				$rs = $this->db->SelectLimit($query, 1);
				// Should only be 1 recordset
				foreach ($rs as $row) {
					$new_imageid = $row[0];
				}
				$rs->Close();
			}
			
			
			$update_value = "image_id=" . $new_imageid;
			
			
			// Update the BLOB field with the actual MIME64 stream
		   	$this->db->UpdateBlob($this->TABLE_images,'image', $stream, $update_value);	
		   	
		   	return $new_imageid;
			
		}
		
		
		/**
		 * Get the binary stream from database.
		 *
		 * @param int $image_id
		 * @return string
		 */
		public function getImageStream($image_id) {
		
			$query = "SELECT image FROM $this->TABLE_images WHERE image_id =". $image_id;
			$stream = $this->db->GetOne($query);
			if (!$stream) {
				return false;
			} else {
				return base64_decode($stream);	
			}
			
		}
		
		
	}
?>
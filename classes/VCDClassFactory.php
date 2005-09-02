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
 * @package Core
 * @version $Id$
 */
?>
<? 
/**
	Class factory to provide the application with worker 
	classes needed on demand within the application.
*/

class VCDClassFactory {

	/**
	 * Internal cache of loaded classes.
	 *
	 * @var array
	 */
	private $classArray = array();
	

	/**
	 * Class constructor.
	 *
	 */
	public function __construct() {}
	
	/**
	 * Class destructor.  Unsets all instances in cache.
	 *
	 */
	public function __destruct() {
		foreach ($this->classArray as $obj) {
			unset($obj);
		}
	}
	
	
	/**
	 * Get an instance of the specified class name.
	 *
	 * If the requested class name is already in cache the instance from the
	 * cache is returned, otherwise new instance is created and saved in local cache
	 * and then returned.
	 * If class is not known to the system, an Exception is thrown.
	 *
	 * @param string $instance_name
	 * @return mixed
	 */
	public function getInstance($instance_name) {
		try {
			if (class_exists($instance_name)) {
				
				// Check if class is cached in the factory
				if (array_key_exists($instance_name, $this->classArray)) {
					return $this->classArray[$instance_name];
				}
				
				$obj = new $instance_name;
				$this->classArray[$instance_name] = $obj;
				return $obj;
				
			} else {
				throw new Exception($instance_name . " is an unknown class");
			}
		} catch (Exception $e) {
			VCDException::display($e);
			die();
		}
			
		
			
	}
	
	/**
	 * Get the size of the cache.
	 *
	 * @return int
	 */
	public function getCacheSize() {
		return sizeof($this->classArray);
	}
	
	/**
	 * Flush the internal class cache.
	 *
	 */
	public function flushCache() {
		$this->classArray = null;
		$this->classArray = array();
	}
	
}

?>
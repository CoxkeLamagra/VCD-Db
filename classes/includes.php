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
	require_once(dirname(__FILE__) . '/VCDConstants.php');
	
	checkEnvironment();
	require_once(dirname(__FILE__) . '/Connection.php');
	require_once(dirname(__FILE__) . '/XMLable.php');
	require_once(dirname(__FILE__) . '/VCDClassFactory.php');

	/* Language Files */
	require_once(dirname(__FILE__) . '/languages/languages.php');

	/* External Libraries */
	require_once(dirname(__FILE__) . '/external/cookie/SiteCookieClass.php');
	require_once(dirname(__FILE__) . '/external/mail/smtp.php');
	require_once(dirname(__FILE__) . '/external/excel/ExcelGen.php');
	require_once(dirname(__FILE__) . '/external/uploader.php');
	require_once(dirname(__FILE__) . '/external/lastRSS.php');

	/* Settings */
	require_once(dirname(__FILE__) . '/settings/settingsFacade.php');

	/* User */
	require_once(dirname(__FILE__) . '/user/userFacade.php');

	/* Pornstars */
	require_once(dirname(__FILE__) . '/pornstar/pornstarFacade.php');

	/* CDCovers && Image inserts*/
	require_once(dirname(__FILE__) . '/cdcover/cdcoverFacade.php');

	/* VCD movies */
	require_once(dirname(__FILE__) . '/vcd/vcdFacade.php');

	require_once(dirname(__FILE__) . '/VCDUtils.php');
	require_once(dirname(__FILE__) . '/VCDException.php');
	require_once(dirname(__FILE__) . '/VCDLog.php');
	require_once(dirname(__FILE__) . '/VCDAuthentication.php');
	require_once(dirname(__FILE__) . '/VCDOnload.php');
	require_once(dirname(__FILE__) . '/VCDImage.php');
	require_once(dirname(__FILE__) . '/VCDScreenshot.php');
	


	/* Common Functions*/
	require_once(dirname(__FILE__) . '/../functions/WebFunctions.php');
	require_once(dirname(__FILE__) . '/../functions/BackendFunctions.php');
	require_once(dirname(__FILE__) . '/../functions/XMLFunctions.php');
	
	/* RSS */
	require_once(dirname(__FILE__) . '/VCDRss.php');


	/* File system functions */
	if (strcmp(strtolower(VCDUtils::getOS()), "winnt") == 0) {
		require_once(dirname(__FILE__) . '/external/fs_win32.php');
	} else {
		require_once(dirname(__FILE__) . '/external/fs_unix.php');
	}
	
	function checkEnvironment() {
		if (PHP_VERSION < 5) {
			print "<br/><br/><div align=\"center\">PHP 5.0 or later must be installed for VCD-db to work.
					<br/>PHP version on webserver => ".PHP_VERSION."<br/>
					PHP 5 can be downloaded from <a href=\"http://www.php.net\" target=\"_new\">php.net</a></div>";
			die();
		}
	}
?>
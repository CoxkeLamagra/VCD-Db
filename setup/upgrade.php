<?php
/*
 * VCD-db - a web based VCD/DVD Catalog system
 * Copyright (C) 2003-2004 Konni - konni.com
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 * 
 */
 // $Id:
?>
<?

require_once("../classes/adodb/adodb.inc.php");	 	
require_once("../classes/adodb/adodb-xmlschema.inc.php");
require_once("../classes/VCDConstants.php");	 	

/* File system functions */
if (strcmp(strtolower(PHP_OS), "winnt") == 0) {
	require_once('../classes/external/fs_win32.php');
} else {
	require_once('../classes/external/fs_unix.php');
}

require_once('../functions/WebFunctions.php');
require_once('../classes/VCDUtils.php');


if (isset($_GET['a']) && strcmp($_GET['a'],"upgrade") == 0 ) {
	require_once('../classes/Connection.php');
	$db   = new Connection();
	$conn = &$db->getConnection();
	$error_msg = "";
	$goterror = false;
		
	switch (strtolower(DB_TYPE)) {
		case 'mysql':
			
			$filename = "upgrade_mysql.sql";
			if (fs_file_exists($filename)) {
    			$fd = fopen($filename,'rb');
				if (!$fd) {
					$error_msg = "Could not open file " . $filename;
					$goterror = true;
					return;
				}
				
				// Read the file 
				$sql = fread($fd, filesize($filename));
				fclose($fd);
				
				if(!$conn->Execute($sql)) {
					$error_msg = "Error inserting via sql script.";
					$goterror = true;
					return;
				}
			} else {
				$goterror = true;
				$error_msg = "Could not find file " . $filename;
			}
			
		
			break;
			
		case 'mssql':
			
			$filename = "upgrade_mssql.sql";
			if (fs_file_exists($filename)) {
    			$fd = fopen($filename,'rb');
				if (!$fd) {
					$error_msg = "Could not open file " . $filename;
					$goterror = true;
					return;
				}
				
				// Read the file 
				$sql = fread($fd, filesize($filename));
				fclose($fd);
				
				if(!$conn->Execute($sql)) {
					$error_msg = "Error inserting via sql script.";
					$goterror = true;
				}
			} else {
				$goterror = true;
				$error_msg = "Could not find file " . $filename;
			}
		
		
		
			break;
			
			
		case 'postgres7':
			
			$filename = "upgrade_postgre.xml";
    		$schema = new adoSchema( $conn );
			$sql = $schema->ParseSchema( $filename );
			$result = $schema->ExecuteSchema(null, false); 
			
			if ($result == 0) {
				$error_msg = "ADOSchema failed while executing Postgres 7 schema";
				$goterror = true;
				return;
			} elseif ($result == 1) {
				$error_msg = "ADOSchema encountered errors while executing Postgres 7 schema";
				$goterror = true;
				return;
			}
		
			break;
			
			
		case 'db2':
			$filename = "upgrade_db2.sql";
			if (fs_file_exists($filename)) {
    			$fd = fopen($filename,'rb');
				if (!$fd) {
					$error_msg = "Could not open file " . $filename;
					$goterror = true;
					return;
				}
				
				// Read the file 
				$sql = fread($fd, filesize($filename));
				fclose($fd);
				
				if(!$conn->Execute($sql)) {
					$error_msg = "Error inserting via sql script.";
					$goterror = true;
				}
			} else {
				$goterror = true;
				$error_msg = "Could not find file " . $filename;
			}	
		
		
			break;
			
			
	
		default:
			break;
	}
	
	
	// insert new updates
	if (!$goterror) {
		
		if (strtolower(DB_TYPE) == 'postgres7') {
			$query1 = "INSERT INTO vcd_UserProperties (property_id,property_name,property_description) VALUES (10,'WISHLIST','Allow others to see my wishlist ?')";
			$query2 = "INSERT INTO vcd_UserProperties (property_id,property_name,property_description) VALUES (11,'USE_INDEX','Use index number fields for custom media IDs')";
			$query3 = "INSERT INTO vcd_UserProperties (property_id,property_name,property_description) VALUES (12,'SEEN_LIST','Keep track of movies that I have seen')";
			$query4 = "INSERT INTO vcd_UserProperties (property_id,property_name,property_description) VALUES (13,'PLAYOPTION','Use client playback options')";
		} else {
			$query1 = "INSERT INTO vcd_UserProperties (property_name,property_description) VALUES ('WISHLIST','Allow others to see my wishlist ?')";
			$query2 = "INSERT INTO vcd_UserProperties (property_name,property_description) VALUES ('USE_INDEX','Use index number fields for custom media IDs')";
			$query3 = "INSERT INTO vcd_UserProperties (property_name,property_description) VALUES ('SEEN_LIST','Keep track of movies that I have seen')";
			$query4 = "INSERT INTO vcd_UserProperties (property_name,property_description) VALUES ('PLAYOPTION','Use client playback options')";
		}
		
		
		
		$conn->Execute($query1);
		$conn->Execute($query2);
		$conn->Execute($query3);
		$conn->Execute($query4);
	}
	
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><title>VCD-db Upgrade</title>
<style type="text/css" media="all">@import url("../includes/templates/default/style.css");</style>
<style type="text/css" media="all">@import url("../includes/css/setup.css");</style>
<script src="setup.js" type="text/javascript"></script>
</head>
<body>
<form name="setup" method="post" action="upgrade.php?a=upgrade">
<table cellspacing="0" cellpadding="0" width="830" border="0">
<tr>
	<td colspan="2"><div class="bar">Setup</div></td>
</tr>
<tr>
	<td valign="top" style="padding:18px 0px 0px 16px" class="content">
	<!-- Setup content -->
	<h2>VCD-DB (v. 0.973) Upgrade</h2>
	<br/>
	<? if (isset($_GET['a']) && strcmp($_GET['a'],"upgrade") == 0) { 
	
		
		if ($goterror) {
			print "The upgrade process encountered errors .. <br>The message is " . $error_msg;
		} else {
			print "<b>Upgrade Successfull !<br>Delete the setup folder and start using VCD-db again :)</b>";
		}
		
		} elseif (isset($_GET['a']) && strcmp($_GET['a'],"upgrade97") == 0) { 
	
		
		if ($goterror) {
			print "The upgrade process encountered errors .. <br>The message is " . $error_msg;
		} else {
			print "<b>Upgrade Successfull !<br>Delete the setup folder and start using VCD-db again :)</b>";
		}
	
	
	} else {
		
		if (!defined('DB_TYPE') || strcmp(DB_TYPE, 'SETUP_TYPE') == 0) { ?>
		
		<span class="bold">
		ERROR.<br/>
		You cannot upgrade VCD-db until you edit your database settings in the file 'classes/VCDConstants.php' as
		said in the readme file.
		<br/><br/>
		Paste in your database settings from previous installation and reload this page.
		
		</span>
		
	<?	} else {
	?>
	
	<ul>
		 <li>Click the "Upgrade VCD-db" button below to upgrade your <b><?=DB_CATALOG?></b> database at
		 	 <b><?=DB_TYPE?></b> server <b><?=DB_HOST?></b>
		 	 
		 </li>
		 <li><span style="color:red">Attention</span>: Only upgrade from VCD-db v.0973 is supported!</li>
		 <li><span style="color:red">Attention</span>: Be sure to have completed the required STEP 1 described in the <b><a title="File opens in new Window!" target="_new" href="../README">README</a></b></li>
		
	</ul>
	<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" onclick="window.open('updateMeta.php');document.getElementById('upgrade').disabled=false;this.disabled=true" value="Update Metadata"/><br/>
	<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Upgrade VCD-db" id="upgrade" disabled="disabled"/>
	</form>
		
	
	<? } } ?>
	
	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

	
	
	<!-- / Setup content  -->
	</td>
	<td valign="top" width="300" style="padding-right:14px;">
	<!-- Sidebar table -->
	<br/>
	<table cellspacing="0" cellpadding="6" border="0" width="300" id="menu">
	<tr>
		<td class="active">&gt; Upgrade VCD-db</td>
	</tr>
	</table>
	
	
	
	<!-- / Sidebar table -->
	</td>
</tr>
<tr>
	<td colspan="2" align="right" valign="top"><img src="../images/logotest.gif" alt="" hspace="80" vspace="2"/><br/><br/></td>
</tr>
<tr>
	<td colspan="2"><div class="bar">(c) VCD-db</div></td>
</tr>
</table>

</body>
</html>
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
 * @package Functions
 * @subpackage Backend
 * @version $Id$
 */
?>
<?

/**
 * @return bool
 * @param $mail_to String
 * @param $subject String
 * @param $body String
 * @desc Send an email, returns true on success and false on failure
 */
function sendMail($mail_to, $subject='', $body='', $use_html=false) {

	$SETTINGSClass = VCDClassFactory::getInstance("vcd_settings");

	$smtp = VCDClassFactory::getInstance("smtp_class");

	$content_type = "text/plain; charset=\"utf-8\"";

	if ($use_html) {
		$content_type = "text/html; charset=\"utf-8\"";
		
		// Add the html tags for header and body ...
		$html = '';
		$html .= "<html><head>";
		$html .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">";
		$html .= "<title>VCD-db notification</title></head><body>";
		$html .= str_replace('<br/>', '<br>', $body);
		$html .= "</body></html>";
		$body = $html;
		
	}


	/*
	 * If you need to use the direct delivery mode and this is running under
	 * Windows or any other platform that does not have enabled the MX
	 * resolution function GetMXRR() , you need to include code that emulates
	 * that function so the class knows which SMTP server it should connect
	 * to deliver the message directly to the recipient SMTP server.
	 */
	if(!function_exists("GetMXRR"))
	{
		/*
		 * If possible specify in this array the address of at least on local
		 * DNS that may be queried from your network.
		 */
		$_NAMESERVERS=array();
		include(VCDDB_BASE.'/classes/external/mail/getmxrr.php');


	}
	/*
	 * If GetMXRR function is available but it is not functional, to use
	 * the direct delivery mode, you may use a replacement function.
	 */
	/*
	else
	{
		$_NAMESERVERS=array();
		if(count($_NAMESERVERS)==0)
			Unset($_NAMESERVERS);
		include("rrcompat.php");
		$smtp->getmxrr="_getmxrr";
	}
	*/

	$smtp->host_name=getenv("HOSTNAME"); /* relay SMTP server address */
	$smtp->localhost="localhost"; /* this computer address */
	$smtp->host_name = $SETTINGSClass->getSettingsByKey('SMTP_SERVER');

	$from = $SETTINGSClass->getSettingsByKey('SMTP_FROM');
	$to = $mail_to;

	/* Set to 1 to deliver directly to the recepient SMTP server */
	$smtp->direct_delivery = 0;
	/* Set to the number of seconds wait for a successful connection to the SMTP server */
	$smtp->timeout = 10;

	$smtp->data_timeout=0;    		/* Set to the number seconds wait for sending or retrieving data from the SMTP server.
	                           	  	Set to 0 to use the same defined in the timeout variable */

	/* Set to 1 to output the communication with the SMTP server */
	$smtp->debug = $SETTINGSClass->getSettingsByKey('SMTP_DEBUG');
	 /* Set to 1 to format the debug output as HTML */
	$smtp->html_debug = $SETTINGSClass->getSettingsByKey('SMTP_DEBUG');
	/* Set to the user name if the server requires authetication */
	$smtp->user = $SETTINGSClass->getSettingsByKey('SMTP_USER');
	 /* Set to the authetication realm, usually the authentication user e-mail domain */
	$smtp->realm = $SETTINGSClass->getSettingsByKey('SMTP_REALM');
	/* Set to the authetication password */
	$smtp->password = $SETTINGSClass->getSettingsByKey('SMTP_PASS');

	
	if($smtp->SendMessage(
		$from,
		array(
			$to
		),
		array(
			"From: $from",
			"To: $to",
			"Subject: $subject ..",
			"Content-Type: $content_type",
			"Date: ".strftime("%a, %d %b %Y %H:%M:%S %Z")
		),
		"$body.\n")) {
		
		
		// Check if we are supposed to log this event ..
		if (VCDLog::isInLogList(VCDLog::EVENT_EMAILS )) {
			VCDLog::addEntry(VCDLog::EVENT_EMAILS, "Mail to {$to}: subject: {$subject}");
		}
		
			return true;
		}
		
	else
		return false;

}



/**
 * Get Encryption Key Tokens
 *
 * @param string $txt
 * @param string $encrypt_key
 * @return string
 */
function keyED($txt,$encrypt_key)		{
	$encrypt_key = md5($encrypt_key);
	$ctr=0;
	$tmp = "";
	for ($i=0;$i<strlen($txt);$i++){
			if ($ctr==strlen($encrypt_key)) $ctr=0;
			$tmp.= substr($txt,$i,1) ^ substr($encrypt_key,$ctr,1);
			$ctr++;
	}
	return $tmp;
}

/**
 * Encrypt the incoming text with the given password key.
 * Returns the encrypted string
 *
 * @param string $txt | The text to encrypt
 * @param string $key | The secret key
 * @return string
 */
function Encrypt($txt,$key) {
	srand((double)microtime()*1000000);
	$encrypt_key = md5(rand(0,32000));
	$ctr=0;
	$tmp = "";
	for ($i=0;$i<strlen($txt);$i++)
	{
	if ($ctr==strlen($encrypt_key)) $ctr=0;
	$tmp.= substr($encrypt_key,$ctr,1) .
	(substr($txt,$i,1) ^ substr($encrypt_key,$ctr,1));
	$ctr++;
	}
	return base64_encode(keyED($tmp,$key));
}

/**
 * Decrypt the given string with the password provided.
 * Returns the original message decrypted.
 *
 * @param string $txt | The encrypted string
 * @param string $key | The secret key to decode with
 * @return string
 */
function Decrypt($txt,$key)
{
	$txt = keyED(base64_decode($txt),$key);
	$tmp = "";
	for ($i=0;$i<strlen($txt);$i++){
		$md5 = substr($txt,$i,1);
		$i++;
		$tmp.= (substr($txt,$i,1) ^ $md5);
	}
	return $tmp;
}


/**
 * Create the body for the mail message that is sent to remind
 * user to return the movies that he/her has borrowed from the current user.
 * Returns the body for the email.
 *
 * @param string $borrower_name | The name of the borrower
 * @param array $arrLoanObj | Array of loanObjects
 * @return string
 */
function createReminderEmailBody($borrower_name, $arrLoanObj) {

	$msg = sprintf(VCDLanguage::translate('mail.returnmovies1'), $borrower_name);
	foreach ($arrLoanObj as $loanObj) {
		$msg .= "<br>" . $loanObj->getCDTitle() . " - ".VCDLanguage::translate('loan.since')." " . date("d/m/Y", $loanObj->getDateOut());
	}
	$msg .= "<br><br>";
	$msg .= sprintf(VCDLanguage::translate('mail.returnmovies2'), $_SESSION['user']->getFullname());
	return $msg;

}

/**
 * Create the body for the email when new movies have been added to VCD-db.
 * Returns the email body contents.
 *
 * @param vcdObj $obj | The vcdObj to notify about
 * @return string
 */
function createNotifyEmailBody(vcdObj $obj) {

	$SETTINGSClass = VCDClassFactory::getInstance("vcd_settings");
	$home = $SETTINGSClass->getSettingsByKey('SITE_HOME');
	$home = substr($home, 0, (strlen($home)-1));

	$msg = '';
	$msg .= sprintf(VCDLanguage::translate('mail.notify'), $home, $obj->getID());
	return $msg;
}


/**
 * Create the Excel spreadsheet for download.
 *
 */
function generateExcel() {

	$user_id = VCDUtils::getUserID();
	$vcd = VCDClassFactory::getInstance("vcd_movie");
	$arrMovies = $vcd->getAllVcdByUserId($user_id);
	$SETTINGSClass = VCDClassFactory::getInstance('vcd_settings');

	//initiate a instance of "excelgen" class
	$excel = new ExcelGen("My_Movies");

	//initiate $row,$col variables
	$row=0;
	$col=0;

	//write text in cell(0,0)
	$excel->WriteText($row,$col,"My Movie List (".date("d.m.Y").") (Generated by VCD-db)");
	$row++;

	// Write the column headers
	$excel->WriteText($row, 0, "Title");
	$excel->WriteText($row, 1, "Genre");
	$excel->WriteText($row, 2, "Media type");
	$excel->WriteText($row, 3, "Year");
	$excel->WriteText($row, 4, "Media index");
	$row++;

	for ($row; $row < sizeof($arrMovies) + 2; $row++) {
		$col = 0;

		$movie = $arrMovies[$row-2];

		// Write The title
		$excel->WriteText($row, $col, $movie->getTitle());
		$col++;

		// Write The category
		if (!is_null($movie->getCategory())) {
			$excel->WriteText($row, $col, $movie->getCategory()->getName(true));
		}
		$col++;

		// Write The Media type
		if (!is_null($movie->getMediaType())) {
			$mediaTypeObj = $movie->getMediaType();
			$excel->WriteText($row, $col, $mediaTypeObj[0]->getDetailedName());
		}
		$col++;

		// Write The Year
		$excel->WriteNumber($row, $col, $movie->getYear());
		$col++;

		// Write The Media index
		$arr = $SETTINGSClass->getMetadata($movie->getID(), $user_id, 'mediaindex');
		if (is_array($arr) && sizeof($arr) == 1) {
			$excel->WriteText($row, $col, $arr[0]->getMetadataValue());
		}
		$col++;
	}

	//stream Excel for user to download or show on browser
	$excel->SendFile();
}

/**
 * Get count of movies in each category
 *
 * @param array $catArr | Array of categories
 * @param array $dataArray | array of movies
 * @return array
 */
function getCategoryResults($catArr, $dataArray) {
	$resultArr = $catArr;
	$keys = array_keys($resultArr);
	foreach ($keys as $key) {
		$resultArr[$key] = 0;
	}
	foreach ($dataArray as $inArr) {
		$resultArr[$inArr[0]] = $inArr[1];
	}
	return $resultArr;
}


/**
 * Increment the query counter in the Connection class.
 *
 */
function addQueryCount() {
	Connection::addQueryCount();
}

?>
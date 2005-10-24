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
 * @package Settings
 * @version $Id$
 */
 
?>
<?

/* 
	No need to store this information in db since this is a part of the DVD standards,
	which is definitely not going to change any time soon :)
*/

final class dvdRegions {
	/**
	 * list of DVD region codes.
	 *
	 * @var array
	 */
	private $regions = array(
		'0'  => 'Region Free',
		'1'  => 'Bermuda, Canada, United States and U.S. territories.',
		'2'  => 'Japan, Europe, South Africa, and Middle East.',
		'3'  => 'Southeast Asia, Hong Kong, Macau, South Korea and Taiwan.',
		'4'  => 'Central America, Oceania, South America, Mexico',
		'5'  => 'The rest of Africa, Former Soviet Union, the Indian subcontinent, Mongolia, North Korea.',
		'6'  => 'Mainland China.',
		'7'  => 'Reserved for future use.',
		'8'  => 'Special international routes (airplanes, cruise ships, etc.)'
	);
	
	
	/**
	 * Get the list of all DVD Region codes
	 *
	 * @return array
	 */
	public function getList() {
		return $this->regions;
	}
	
	/**
	 * Get description of specified region code.
	 * Return false if the requested region code is not found.
	 *
	 * @param int $code
	 * @return string
	 */
	public function getRegion($code) {
		if (isset($this->regions[$code])) {
			return $this->regions[$code];
		}
		return false;
	}
}





final class dvdLanguages {
	
	/**
	 * Array of all available DVD languages.
	 *
	 * @var array
	 */
	private $languages = array(
		'AB' => 'Abkhazian',
		'AA' => 'Afar',
		'AF' => 'Afrikaans',
		'SQ' => 'Albanian',
		'AM' => 'Amharic, Ameharic',
		'AR' => 'Arabic',
		'HY' => 'Armenian',
		'AS' => 'Assamese',
		'AY' => 'Aymara',
		'AZ' => 'Azerbaijani',
		'BA' => 'Bashkir',
		'EU' => 'Basque',
		'BN' => 'Bengali, Bangla',
		'DZ' => 'Bhutani',
		'BH' => 'Bihari',
		'BI' => 'Bislama',
		'BR' => 'Breton',
		'BG' => 'Bulgarian',
		'MY' => 'Burmese',
		'BE' => 'Byelorussian',
		'KM' => 'Cambodian',
		'CA' => 'Catalan',
		'ZH' => 'Chinese',
		'CO' => 'Corsican',
		'HR' => 'Hrvatski (Croatian)',
		'CS' => 'Czech (Ceske)',
		'DA' => 'Dansk (Danish)',
		'NL' => 'Dutch (Nederlands)',
		'EN' => 'English',
		'EO' => 'Esperanto',
		'ET' => 'Estonian',
		'FO' => 'Faroese',
		'FJ' => 'Fiji',
		'FI' => 'Finnish',
		'FR' => 'French',
		'FY' => 'Frisian',
		'GL' => 'Galician',
		'KA' => 'Georgian',
		'DE' => 'Deutsch (German)',
		'EL' => 'Greek',
		'KL' => 'Greenlandic',
		'GN' => 'Guarani',
		'GU' => 'Gujarati',
		'HA' => 'Hausa',
		'IW' => 'Hebrew',
		'HI' => 'Hindi',
		'HU' => 'Hungarian',
		'IS' => '�slenska (Icelandic)',
		'IN' => 'Indonesian',
		'IA' => 'Interlingua',
		'IE' => 'Interlingue',
		'IK' => 'Inupiak',
		'GA' => 'Irish',
		'IT' => 'Italian',
		'JA' => 'Japanese',
		'JW' => 'Javanese',
		'KN' => 'Kannada',
		'KS' => 'Kashmiri',
		'KK' => 'Kazakh',
		'RW' => 'Kinyarwanda',
		'KY' => 'Kirghiz',
		'RN' => 'Kirundi',
		'KO' => 'Korean',
		'KU' => 'Kurdish',
		'LO' => 'Laothian',
		'LA' => 'Latin',
		'LV' => 'Latvian, Lettish',
		'LN' => 'Lingala',
		'LT' => 'Lithuanian',
		'MK' => 'Macedonian',
		'MG' => 'Malagasy',
		'MS' => 'Malay',
		'ML' => 'Malayalam',
		'MT' => 'Maltese',
		'MI' => 'Maori',
		'MR' => 'Marathi',
		'MO' => 'Moldavian',
		'MN' => 'Mongolian',
		'NA' => 'Nauru',
		'NE' => 'Nepali',
		'NO' => 'Norwegian (Norsk)',
		'OC' => 'Occitan',
		'OR' => 'Oriya',
		'OM' => 'Afan (Oromo)',
		'PA' => 'Panjabi',
		'PS' => 'Pashto, Pushto',
		'FA' => 'Persian',
		'PL' => 'Polish',
		'PT' => 'Portuguese',
		'QU' => 'Quechua',
		'RM' => 'Rhaeto-Romance',
		'RO' => 'Romanian',
		'RU' => 'Russian',
		'SM' => 'Samoan',
		'SG' => 'Sangho',
		'SA' => 'Sanskrit',
		'GD' => 'Scots Gaelic',
		'SH' => 'Serbo-Crotain',
		'ST' => 'Sesotho',
		'SR' => 'Serbian',
		'TN' => 'Setswana',
		'SN' => 'Shona',
		'SD' => 'Sindhi',
		'SI' => 'Singhalese',
		'SS' => 'Siswati',
		'SK' => 'Slovak',
		'SL' => 'Slovenian',
		'SO' => 'Somali',
		'ES' => 'Spanish (Espanol)',
		'SU' => 'Sundanese',
		'SW' => 'Swahili',
		'SV' => 'Svenska (Swedish)',
		'TL' => 'Tagalog',
		'TG' => 'Tajik',
		'TT' => 'Tatar',
		'TA' => 'Tamil',
		'TE' => 'Telugu',
		'TH' => 'Thai',
		'BO' => 'Tibetian',
		'TI' => 'Tigrinya',
		'TO' => 'Tonga',
		'TS' => 'Tsonga',
		'TR' => 'Turkish',
		'TK' => 'Turkmen',
		'TW' => 'Twi',
		'UK' => 'Ukranian',
		'UR' => 'Urdu',
		'UZ' => 'Uzbek',
		'VI' => 'Vietnamese',
		'VO' => 'Volapuk',
		'CY' => 'Welsh',
		'WO' => 'Wolof',
		'JI' => 'Yiddish',
		'YO' => 'Yoruba',
		'XH' => 'Xhosa',
		'ZU' => 'Zulu'
	);
	

	/**
	 * Get the entire DVD Languague list.
	 *
	 * @return array
	 */
	public function getList() {
		return $this->languages;
	}
	
	/**
	 * Get langage name based on the language code.
	 * If language code is not found, function returns false.
	 *
	 * @param string $code
	 * @return string
	 */
	public function getLanguage($code) {
		if (isset($this->languages[$code])) {
			return $this->languages[$code];
		}
		return false;
	}
}



?>

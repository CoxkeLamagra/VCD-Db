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
 * @package Language
 * @version $Id$
 */

?>
<?
   /**
      Danish language file
      Initial version translated by Gundelach
   */



$_ = array(


/* Language Identifier */
'LANG_TYPE' 			=> 'DK',
'LANG_NAME'				=> 'Dansk',
'LANG_CHARSET'			=> 'iso-8859-1',

/* Menu system */
'MENU_MINE' 			=> 'Min menu',
'MENU_SETTINGS' 		=> 'Mine indstillinger',
'MENU_MOVIES' 			=> 'Mine film',
'MENU_ADDMOVIE' 		=> 'Tilf�j ny film',
'MENU_LOANSYSTEM' 		=> 'Udl�n',
'MENU_WISHLIST' 		=> 'Min �nskeliste',
'MENU_CATEGORIES' 		=> 'Filmkategorier',
'MENU_RSS' 				=> 'Mine Rss Feeds',
'MENU_CONTROLPANEL' 	=> 'Kontrolpanel',
'MENU_REGISTER' 		=> 'Registrer',
'MENU_LOGOUT' 			=> 'Log ud',
'MENU_SUBMIT' 			=> 'Send',
'MENU_TOPUSERS' 		=> 'Topbrugere',
'MENU_WISHLISTPUBLIC' 	=> 'Andres �nskelister',

/* Login */
'LOGIN' 				=> 'Login',
'LOGIN_USERNAME' 		=> 'Brugernavn',
'LOGIN_PASSWORD' 		=> 'Password',
'LOGIN_REMEMBER' 		=> 'Husk mine loginfo.',
'LOGIN_INFO' 			=> 'Lad dette felt v�re tomt hvis du <b>ikke</b> vil �ndre dit password',

/* Register */
'REGISTER_TITLE' 		=> 'Oprettelse',
'REGISTER_FULLNAME' 	=> 'Fulde navn',
'REGISTER_EMAIL' 		=> 'E-mail',
'REGISTER_AGAIN' 		=> 'Password igen',
'REGISTER_DISABLED' 	=> 'Beklager, administratoren har lukket for tilmelding indtil videre',
'REGISTER_OK' 			=> 'Oprettelsen er gennemf�rt, du kan nu logge ind i databasen.',

/* User Properties */
'PRO_NOTIFY' 			=> 'Send mig en e-mail n�r en ny film bliver tilf�jet.',
'PRO_SHOW_ADULT' 		=> 'Vis pornofilm i oversigten',
'PRO_RSS' 				=> 'Tillad RSS tilf�jelser fra min filmliste?',
'PRO_WISHLIST' 			=> 'Tillad at andre ser min �nskeliste ?',
'PRO_USE_INDEX' 		=> 'Brug index numre felter for peresonlige media ID\'er',
'PRO_SEEN_LIST' 		=> 'Hold styr p� de film jeg har set',
'PRO_PLAYOPTION' 		=> 'Brug klient playback options',
'PRO_NFO' 				=> 'Bruge NFO arkiverer?',

/* User Settings */
'SE_PLAYER' 			=> 'Bruger Indstillinger',
'SE_OWNFEED' 			=> 'Vis mine tilf�jelser',
'SE_CUSTOM' 			=> 'Forside indstillinger',
'SE_SHOWSTAT' 			=> 'Vis statistik',
'SE_SHOWSIDE' 			=> 'Vis nye film i sidebar',
'SE_SELECTRSS' 			=> 'V�lg RSS Side',
'SE_PAGELOOK' 			=> 'Web layout',
'SE_PAGEMODE' 			=> 'V�lg udsende:',
'SE_UPDATED'			=> 'User information updated',
'SE_UPDATE_FAILED'		=> 'Failed to update',

/* Search */
'SEARCH' 				=> 'S�g efter',
'SEARCH_TITLE' 			=> 'Titel',
'SEARCH_ACTOR' 			=> 'Skuespiller',
'SEARCH_DIRECTOR'		=> 'Instrukt�r',
'SEARCH_RESULTS' 		=> 'S�geresultater',
'SEARCH_EXTENDED' 		=> 'Avanceret s�gning',
'SEARCH_NORESULT' 		=> 'Din s�gning var forg�ves',

/* Movie categories*/
'CAT_ACTION' 			=> 'Action',
'CAT_ADULT' 			=> 'Porno',
'CAT_ADVENTURE' 		=> 'Eventyr',
'CAT_ANIMATION' 		=> 'Animation',
'CAT_ANIME' 			=> 'Anime / Manga',
'CAT_COMEDY' 			=> 'Komedie',
'CAT_CRIME' 			=> 'Krimi',
'CAT_DOCUMENTARY' 		=> 'Dokumentar',
'CAT_DRAMA' 			=> 'Drama',
'CAT_FAMILY' 			=> 'Familie',
'CAT_FANTASY' 			=> 'Fantasy',
'CAT_FILMNOIR' 			=> 'Film Noir',
'CAT_HORROR' 			=> 'Gyser',
'CAT_JAMESBOND' 		=> 'James Bond',
'CAT_MUSICVIDEO' 		=> 'Musik-Video',
'CAT_MUSICAL' 			=> 'Musical',
'CAT_MYSTERY' 			=> 'Mysterie',
'CAT_ROMANCE' 			=> 'Romance',
'CAT_SCIFI' 			=> 'Sci-Fi',
'CAT_SHORT' 			=> 'Kortfilm',
'CAT_THRILLER' 			=> 'Thriller',
'CAT_TVSHOWS' 			=> 'TV Shows',
'CAT_WAR' 				=> 'Krigsfilm',
'CAT_WESTERN' 			=> 'Western',
'CAT_XRATED' 			=> 'X-Rated',

/* Movie Listings */
'M_MOVIE' 				=> 'Filmen',
'M_ACTORS' 				=> 'Skuespillere',
'M_CATEGORY' 			=> 'Kategori',
'M_YEAR' 				=> 'Produktions�r',
'M_COPIES' 				=> 'Film',
'M_FROM' 				=> 'Fra',
'M_TITLE' 				=> 'Titel',
'M_ALTTITLE' 			=> 'Alt titel',
'M_GRADE' 				=> 'Rating',
'M_DIRECTOR' 			=> 'Instrukt�r',
'M_COUNTRY'				=> 'Land',
'M_RUNTIME' 			=> 'Filmens l�ngde',
'M_MINUTES' 			=> 'minutter',
'M_PLOT' 				=> 'Plot beskrivelse',
'M_NOPLOT'				=> 'Ingen plot-beskrivelse er tilg�ngelig',
'M_COVERS' 				=> 'CD Covers',
'M_AVAILABLE' 			=> 'Tilg�ngelige film',
'M_MEDIA' 				=> 'Medie',
'M_NUM' 				=> 'Antal DVDer',
'M_DATE' 				=> 'Lagt i databasen',
'M_OWNER' 				=> 'Ejer',
'M_NOACTORS' 			=> 'Ingen skuespilleroversigt tilg�ngelig',
'M_INFO' 				=> 'Information om filmen',
'M_DETAILS' 			=> 'Detaljer p� min kopi',
'M_MEDIATYPE'			=> 'Medietype',
'M_COMMENT' 			=> 'Kommentar',
'M_PRIVATE' 			=> 'Mark�r som privat?',
'M_SCREENSHOTS' 		=> 'Screenshots',
'M_NOSCREENS' 			=> 'Der er ingen tilg�ngelige screenshots',
'M_SHOW' 				=> 'Vis',
'M_HIDE' 				=> 'Skjul',
'M_CHANGE' 				=> 'Rediger information',
'M_NOCOVERS' 			=> 'Der er ingen tilg�ngelige covers',
'M_BYCAT' 				=> 'Titler efter kategori',
'M_CURRCAT' 			=> 'Nuv�rende kategori',
'M_TEXTVIEW' 			=> 'Vis tekst',
'M_IMAGEVIEW' 			=> 'Vis billeder',
'M_MINEONLY' 			=> 'Vis kun mine film',
'M_SIMILAR' 			=> 'Lignende film',
'M_MEDIAINDEX'			=> 'Media Index',

/* IMDB */
'I_DETAILS' 			=> 'IMDBs oversigt',
'I_PLOT' 				=> 'Plotbeskrivelse',
'I_GALLERY' 			=> 'Fotogalleri',
'I_TRAILERS' 			=> 'Trailers',
'I_LINKS' 				=> 'IMDB Links',
'I_NOT' 				=> 'Der er ingen tilg�ngelig IMDB-information',

/* DVD Specific */
'DVD_REGION'			=> 'Region',
'DVD_FORMAT'			=> 'Format',
'DVD_ASPECT'			=> 'Aspect ratio',
'DVD_AUDIO'				=> 'Audio',
'DVD_SUBTITLES'			=> 'Unddertekster',

/* My Movies */
'MY_EXPORT' 			=> 'Eksporter data',
'MY_EXCEL' 				=> 'Eksporter som Excel',
'MY_XML' 				=> 'Eksporter som XML',
'MY_XMLTHUMBS' 			=> 'Eksporter thumbnails som XML',
'MY_ACTIONS' 			=> 'Mine handlinger',
'MY_JOIN' 				=> 'Disc join',
'MY_JOINMOVIES' 		=> 'Disc join movies',
'MY_JOINSUSER' 			=> 'V�lg bruger',
'MY_JOINSMEDIA' 		=> 'V�lg medietype',
'MY_JOINSCAT' 			=> 'V�lg kategori',
'MY_JOINSTYPE' 			=> 'V�lg handling',
'MY_JOINSHOW' 			=> 'Vis resultater',
'MY_NORESULTS' 			=> 'Foresp�rgslen gav ingen resultater',
'MY_TEXTALL'			=> 'Printervenlig version (Text)',
'MY_PWALL' 				=> 'Printervenlig version (Alt)',
'MY_PWMOVIES' 			=> 'Printervenlig version (Film)',
'MY_PWTV' 				=> 'Printervenlig version (Tv Shows)',
'MY_PWBLUE' 			=> 'Printervenlig version (Porno)',
'MY_J1' 				=> 'Film jeg har, som brugeren ikke har',
'MY_J2' 				=> 'Film brugeren har, som jeg ikke har',
'MY_J3' 				=> 'Film som b�de jeg og brugeren har',
'MY_OVERVIEW' 			=> 'Overblik over samling',
'MY_INFO' 				=> 'P� denne side kan du finde ud af alt om mine film.
						Til h�jre finder du en oversigt over dine mulige handlinger.
						Du kan ogs� eksportere dine data til Excel for udskrift, som backup eller for at flytte hele din database til en anden VCD-db.',
'MY_KEYS' 				=> 'Rediger personlige IDer',
'MY_SEENLIST' 			=> 'Rediger har set-liste',
'MY_HELPPICKER' 		=> 'V�lg en film',
'MY_HELPPICKERINFO' 	=> 'Ved du ikke hvad du vil se i aften?<br/>Lad databasen hj�lpe dig med at finde en film.<br/>
						Du kan selv definere indenfor hvilke rammer databasen s�ger.',
'MY_FIND' 				=> 'Find en film',
'MY_NOTSEEN' 			=> 'Foresl� kun film jeg ikke har set',
'MY_FRIENDS' 			=> 'Mine venner som l�ner CDer',

/* Manager window */
'MAN_BASIC' 			=> 'Basic information',
'MAN_IMDB' 				=> 'IMDB info',
'MAN_EMPIRE' 			=> 'DVDEmpire info',
'MAN_COPY' 				=> 'Min film',
'MAN_COPIES' 			=> 'Mine film',
'MAN_NOCOPY' 			=> 'Du har ikke denne film',
'MAN_1COPY' 			=> 'Kopi',
'MAN_ADDACT' 			=> 'Tilf�j skuespillere',
'MAN_ADDTODB' 			=> 'Tilf�je nye skuespillere til DB',
'MAN_SAVETODB' 			=> 'Gem til DB',
'MAN_SAVETODBNCD' 		=> 'Gem til DB og film',
'MAN_INDB' 				=> 'Skuespillere i database',
'MAN_SEL' 				=> 'V�lg af skuespillere',
'MAN_STARS' 			=> 'Stjerner',
'MAN_BROWSE' 			=> 'S�g efter fil',
'MAN_ADDMEDIA'			=> 'Add...',

/* Add movies */
'ADD_INFO' 				=> 'V�lg m�de du vil tilf�je din film p�',
'ADD_IMDB' 				=> 'Hent fra Internet Movie Database',
'ADD_IMDBTITLE' 		=> 'Skriv n�gleord du vil s�ge p�',
'ADD_MANUAL' 			=> 'Skriv den ind manuelt',
'ADD_LISTED' 			=> 'Tilf�je film der allerede i databasen',
'ADD_XML' 				=> 'Tilf�je film fra eksporterede XML arkiverer',
'ADD_XMLFILE' 			=> 'V�lg den XML arkiverer der skal importeres',
'ADD_XMLNOTE' 			=> '(HUSK at det er kun XML arkiverer, der kan blive eksporteret fra ans�gning fra andre VCD-db
						s� kan blive tilf�je dem her. Du kan eksporteret dine film fra "Mine film" sektion. Du b�r undg�, at redigere i de eksporterede XML filer. ) ',
'ADD_MAXFILESIZE' 		=> 'Max fil st�rrelse',
'ADD_DVDEMPIRE' 		=> 'Hent fra Adult DVD Empire (X-rated films)',
'ADD_LISTEDSTEP1' 		=> 'Trin 1<br/>V�lg de titler du vil tilf�je din liste.<br/>Du kan v�lge media typen i n�ste trin.',
'ADD_LISTEDSTEP2' 		=> 'Trin 2.<br/>V�lg den rette media type.',
'ADD_INDB' 				=> 'Film i VCD-DB',
'ADD_SELECTED' 			=> 'Valgte titler',
'ADD_INFOLIST' 			=> 'Dobbelt klik p� en titel for at v�lge den eller brug piletasterne.<br/>Du kan bruge tastaturet til hutrigt at finde en titel.',
'ADD_NOTITLES' 			=> 'Ingen andre brugere har tilf�jet film til VCD-db',

/* Add from XML */
'XML_CONFIRM' 			=> 'Bekr�ft XML upload',
'XML_CONTAINS' 			=> 'XML fil indeholder %d film.',
'XML_INFO1' 			=> 'Tryk bekr�ft for at behandle filmen og gemme den i databasen.<br/>Eller tryk fortryd for at stoppe. ',
'XML_INFO2' 			=> 'Hvis du �nsker at inkludere thumbnails (posters) med filmene du er ved at	importere i din XML fil, <b>SKALT</b> du have thumbnails XML fil tilg�ngelig nu!.<br/>
						Posters kan ikke importeres efter du har gennemf�rt importen af film fra denne XML fil.
						Hvis du allerede har thumbnails XML filen klar afm�rk feltet herunder, og i efter importen af dine film vil du blive spurgt efter din thumbnails XML fil. ',
'XML_THUMBNAILS' 		=> 'Inds�t thumbnails fra min thumbnails XML fil ',
'XML_LIST' 				=> 'Komplet liste over film fundet i XML fil.',
'XML_ERROR' 			=> 'Ingen titler fundet i XML fil.<br/>Filen kan v�re tom eller �delagt. <br/>Check at du bruger en XML fil der er eksporteret fra VCD-db..',
'XML_RESULTS' 			=> 'XML upload resultat.',
'XML_RESULTS2' 			=> 'Her er resultatet af din XML import.<br/>Totalt %d film blev importeret.',

/* Add from DVD Empire */
'EM_INFO' 				=> 'Information fra AdultDVDEmpire.com ....',
'EM_DESC' 				=> 'DVDEmpire beskrivelse',
'EM_SUBCAT' 			=> 'Voksen kategorier',
'EM_DETAILS' 			=> 'Adultdvdempire.com detaljer',
'EM_STARS' 				=> 'Pornstjerner',
'EM_NOTICE' 			=> 'Skuespillere markeret med r�dt findes p.t. ikke i VCD-DB. Du kan markere deres navn og de tilf�jes automatisk til VCD-db og k�des til denne film.',
'EM_FETCH' 				=> 'Hent ogs�',

/* Loan System */
'LOAN_MOVIES' 			=> 'Film til udl�n',
'LOAN_TO' 				=> 'L�n fil til',
'LOAN_ADDUSERS' 		=> 'Tilf�j nogle l�nere for at kunne forts�tte',
'LOAN_NEWUSER' 			=> 'Ny l�ner',
'LOAN_REGISTERUSER' 	=> 'Tilf�j ny l�ner',
'LOAN_NAME' 			=> 'Navn',
'LOAN_SELECT' 			=> 'V�lg l�ner',
'LOAN_MOVIELOANS' 		=> 'Udl�nte film ...',
'LOAN_REMINDER' 		=> 'Send p�mindelse',
'LOAN_HISTORY' 			=> 'Udl�ns historik',
'LOAN_HISTORY2' 		=> 'Se udl�ns historik',
'LOAN_SINCE' 			=> 'Siden',
'LOAN_TIME' 			=> 'Tid siden',
'LOAN_RETURN' 			=> 'Retur kopi',
'LOAN_SUCCESS' 			=> 'Film udl�n gennef�rt',
'LOAN_OUT' 				=> 'Ikke returneret',
'LOAN_DATEIN' 			=> 'Dato ind',
'LOAN_DATEOUT' 			=> 'Dato ud',
'LOAN_PERIOD' 			=> 'L�ne periode',
'LOAN_BACK' 			=> 'Tilbage til udl�ns index',
'LOAN_DAY' 				=> 'dag',
'LOAN_DAYS' 			=> 'dage',
'LOAN_TODAY' 			=> 'fra i dag',

/* RSS */
'RSS' 					=> 'RSS tilf�jelser',
'RSS_TITLE' 			=> 'RSS tilf�jelser fra mine venners VCD-DB hjemme-sider',
'RSS_SITE' 				=> 'RSS Side tilf�jelser',
'RSS_USER' 				=> 'RSS Bruger tilf�jelser',
'RSS_VIEW' 				=> 'Vis RSS tilf�jelser',
'RSS_ADD' 				=> 'Tilf�j ny brugerliste',
'RSS_NOTE' 				=> 'Skriv den <strong>n�jagtige url</strong> p� din vens VCD database.<br/>Hvis RSS er sl�et til p� din vens side s� kan du udv�lge
						de film du er intresseret i og vise dem p� din side.',
'RSS_FETCH' 			=> 'Hent RSS liste',
'RSS_NONE' 				=> 'Ingen RSS er blevet tilf�jet.',
'RSS_FOUND' 			=> 'F�lgende RSS feeds blev fundet. V�lg de feeds du vil tilf�je:',
'RSS_NOTFOUND' 			=> 'Ingen feeds blev fundet p� denne lokation',

/* Wishlist */
'W_ADD' 				=> 'Tilf�j til min �nskeliste',
'W_ONLIST' 				=> 'Er p� din �nskeliste',
'W_EMPTY' 				=> 'Din �nskeliste er tom',
'W_OWN' 				=> 'Du har denne film',
'W_NOTOWN' 				=> 'Du har ikke denne film',

/* Comments */
'C_COMMENTS' 			=> 'Kommentarer',
'C_ADD' 				=> 'Post ny kommentar',
'C_NONE' 				=> 'Ingen kommentarer er postet',
'C_TYPE' 				=> 'Skriv din nye kommentar',
'C_YOUR' 				=> 'Din kommentar',
'C_POST' 				=> 'Post kommentar',
'C_ERROR' 				=> 'Du skal v�re logget ind for at kunne poste en kommentar',

/* Pornstars */
'P_NAME' 				=> 'Navn',
'P_WEB' 				=> 'Hjemmeside',
'P_MOVIECOUNT' 			=> 'Film antal',

/* Seen List */
'S_SEENIT' 				=> 'Jeg har set den',
'S_NOTSEENIT' 			=> 'Jeg har ikke set den',
'S_SEENITCLICK' 		=> 'Klik her for at markere som set',
'S_NOTSEENITCLICK' 		=> 'Klik her for at markere som uset',

/* Statistics */
'STAT_TITLE'			=> 'Today\'s Report',
'STAT_TOP_MOVIES'		=> 'Movies in database',
'STAT_TOP_CATS'			=> 'Top categories',
'STAT_TOP_ACT'			=> 'Most active categories',
'STAT_TOP_COVERS'		=> 'Covers in database',
'STAT_TOTAL'			=> 'Total',
'STAT_TODAY'			=> 'Added today',
'STAT_WEEK'				=> 'Added in last 7 days',
'STAT_MONTH'			=> 'Added in last 30 days',

/* Mail messages */
'MAIL_RETURNTOPIC'		=> 'Udl�n p�mindelse',
'MAIL_RETURNMOVIES1' 	=> '%s, vil bare minde dig om, at du skal aflevere mine film.\n	Du har stadig f�lgende film:\n\n',
'MAIL_RETURNMOVIES2'	=> 'Venligst returnere skiverne s� snart som muligt\n Hilsen %s \n\n NB: Dette er en e-mail der sendes automatisk fra VCD-db system (http://klixbuell.dk)',
'MAIL_NOTIFY' 			=> '<strong>Nye film er tilf�jet VCD-db</strong><br/> Klik <a href="%s/?page=cd&vcd_id=%s">her</a> for at se mere ..
						 <p>NB: Dette er en e-mail der sendes automatisk fra VCD-db system (www.klixbuell.dk)</p>',
'MAIL_REGISTER' 		=> '%s, registreringen p� VCD-db er gennemf�rt.\n\nDit brugernavn er %s og dit password er
						%s.\n\nDu kan altid �ndre dit password n�r du er logget p�.\n
						Klik <a href="%s" target="_new">her</a> for at komme til VCD-db website.',

/* Player */
'PLAYER' 				=> 'Afspiller',
'PLAYER_PATH' 			=> 'Sti',
'PLAYER_PARAM' 			=> 'Parametere',
'PLAYER_NOTE' 			=> 'Skriv den fulde sti til din film-afspiller p� din harddisk.
						Din afspiller skal v�re kompatible til tage parameters og kommando linjer som fx. BSPlayer til Win32 og MPlayer til Linux.<br/>
						Du kan downloade BSPlayer <a href="http://www.bsplayer.org" target="_new"><b>HER</b></a>
						og MPlayer til linux <a href="http://www.MPlayerHQ.hu" target="_new"><b>HER</b></a>.',


/* Metadata */
'META_MY'				=> 'Mine Metadata',
'META_NAME'				=> 'Navn',
'META_DESC'				=> 'Beskrivelse',
'META_TYPE'				=> 'Meta type',
'META_VALUE'			=> 'Meta v�rdi',
'META_NONE'				=> 'ingen Metadata findes.',

/* Ignore List */
'IGN_LIST'				=> 'Ignorer Liste',
'IGN_DESC'				=> 'Ignorer alle film fra f�lgende brugere:',

/* Misc keywords */
'X_CONTAINS' 			=> 'indhold',
'X_GRADE' 				=> 'IMDB karakter h�jere end',
'X_ANY' 				=> 'Alle',
'X_TRYAGAIN' 			=> 'Pr�v igen',
'X_PROCEED' 			=> 'K�r',
'X_SELECT' 				=> 'V�lge',
'X_CONFIRM' 			=> 'Bekr�ft',
'X_CANCEL' 				=> 'Fortryd',
'X_ATTENTION' 			=> 'Opm�rksomhed!',
'X_STATUS' 				=> 'Status',
'X_SUCCESS' 			=> 'Succes',
'X_FAILURE' 			=> 'Fejl',
'X_YES' 				=> 'Ja',
'X_NO' 					=> 'Nej',
'X_SHOWMORE' 			=> 'Vis mere',
'X_SHOWLESS' 			=> 'Vis kort',
'X_NEW' 				=> 'Ny',
'X_CHANGE' 				=> 'skift',
'X_DELETE' 				=> 'slet',
'X_UPDATE' 				=> 'Opdater',
'X_SAVEANDCLOSE' 		=> 'Gem og luk',
'X_CLOSE' 				=> 'Luk',
'X_EDIT' 				=> 'Ret',
'X_RESULTS' 			=> 'Resulter',
'X_LATESTMOVIES' 		=> 'sidste film',
'X_LATESTTV' 			=> 'sidste TV show',
'X_LATESTBLUE' 			=> 'sidste X-rated',
'X_MOVIES' 				=> 'filmene',
'X_NOCATS' 				=> 'Ingen film er blivet tilf�jet.',
'X_NOUSERS' 			=> 'Ingen aktive bruger',
'X_KEY' 				=> 'N�gle',
'X_SAVENEXT' 			=> 'Gem og ret den n�ste',
'X_SAVE' 				=> 'Gem',
'X_SEEN' 				=> 'Set',
'X_TOGGLE'				=> 'Toggle preview',
'X_TOGGLE_ON'			=> 'on',
'X_TOGGLE_OFF'			=> 'off'

);


?>
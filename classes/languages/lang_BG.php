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
		Bulgarian language file
	
	*/
	
$_ = array(

/* Language Identifier */
'LANG_TYPE' 			=> 'BG',
'LANG_NAME' 			=> 'Bulgarian',
'LANG_CHARSET'			=> 'windows-1251',

/* Menu system */
'MENU_MINE' 			=> '����',
'MENU_SETTINGS' 		=> '���������',
'MENU_MOVIES' 			=> '�����',
'MENU_ADDMOVIE' 		=> '������� ����',
'MENU_LOANSYSTEM'		=> '������� ����',
'MENU_WISHLIST' 		=> '������ "�������"',
'MENU_CATEGORIES' 		=> '���������',
'MENU_RSS' 				=> 'My Rss Feeds',
'MENU_CONTROLPANEL' 	=> '��������� �����',
'MENU_REGISTER' 		=> '����������� ��',
'MENU_LOGOUT' 			=> '�����',
'MENU_SUBMIT'			=> '�����',
'MENU_TOPUSERS'			=> 'TOP �����������',
'MENU_WISHLISTPUBLIC'	=> '������ "�������" �� ����� �����������',
'MENU_STATISTICS'		=> '����������',

/* Login */
'LOGIN' 				=> '����',
'LOGIN_USERNAME' 		=> '����������',
'LOGIN_PASSWORD' 		=> '������',
'LOGIN_REMEMBER' 		=> '������� ��',
'LOGIN_INFO' 			=> '������ ������ ��� <b>��</b> ����� �� ������ �������� ��',

/* Register */
'REGISTER_TITLE'		=> '�����������',
'REGISTER_FULLNAME' 	=> '����� ���',
'REGISTER_EMAIL' 		=> 'E-mail',
'REGISTER_AGAIN' 		=> '������� ��������',
'REGISTER_DISABLED' 	=> 'Oooops !...�� ����� !',
'REGISTER_OK' 			=> '������������� ������� �������, ������ �� ������� � ���������.',

/* User Properties */
'PRO_NOTIFY' 			=> '����� �� ����� ��� � �������� ��� ����?',
'PRO_SHOW_ADULT' 		=> '�������� ���������� �� ��������� �� �����?',
'PRO_RSS' 				=> '������� RSS feed �� ����� �����?',
'PRO_WISHLIST'   		=> '�� ������� �� ������� �� ������ ����� ����� "�������" ?',
'PRO_USE_INDEX'  		=> '��������� ������ �� ������ �� �������� ID-�� �� �������  ',
'PRO_SEEN_LIST'  		=> '������ ���� �� �������, ����� �� ��� ������',
'PRO_PLAYOPTION' 	    => '��������� ����� �� ��������������� �� ���� ',
'PRO_NFO' 				=> '��������� NFO ?',

/* User Settings */
'SE_PLAYER' 			=> '��������� �� �������',
'SE_OWNFEED' 			=> 'View my own feed',
'SE_CUSTOM' 			=> '������� �� �������� ��������',
'SE_SHOWSTAT' 			=> '������ ����������',
'SE_SHOWSIDE' 			=> '�������� ������ ����� � ���������� ���',
'SE_SELECTRSS' 			=> '������ RSS feeds',
'SE_PAGELOOK' 			=> 'Web layout',
'SE_PAGEMODE' 			=> 'Select default template:',

/* Search */
'SEARCH' 				=> '�����',
'SEARCH_TITLE' 			=> '�� ��������',
'SEARCH_ACTOR' 			=> '�� ������',
'SEARCH_DIRECTOR' 		=> '�� ��������',
'SEARCH_RESULTS' 		=> '���������',
'SEARCH_EXTENDED' 		=> '�������� �������',
'SEARCH_NORESULT' 		=> '������ �� ����:):):)',

/* Movie categories*/
'CAT_ACTION' 			=> '�����',
'CAT_ADULT' 			=> '�� ���� � �����',
'CAT_ADVENTURE' 		=> '������������',
'CAT_ANIMATION' 		=> '��������',
'CAT_ANIME' 			=> '����� / �����',
'CAT_COMEDY' 			=> '�������',
'CAT_CRIME' 			=> '����������',
'CAT_DOCUMENTARY' 		=> '������������',
'CAT_DRAMA' 			=> '�����',
'CAT_FAMILY' 			=> '������',
'CAT_FANTASY' 			=> '�������',
'CAT_FILMNOIR' 			=> 'Film Noir',
'CAT_HORROR' 			=> '�����',
'CAT_JAMESBOND' 		=> '������ ����',
'CAT_MUSICVIDEO' 		=> '������ / �����',
'CAT_MUSICAL' 			=> '�������',
'CAT_MYSTERY' 			=> '��������',
'CAT_ROMANCE' 			=> '������',
'CAT_SCIFI' 			=> '������ ����������',
'CAT_SHORT' 			=> '���������������',
'CAT_THRILLER' 			=> '������',
'CAT_TVSHOWS' 			=> '�� ���',
'CAT_WAR' 				=> '������',
'CAT_WESTERN' 			=> '�������',
'CAT_XRATED' 			=> 'XXX',

/* Movie Listings */
'M_MOVIE' 				=> '������',
'M_ACTORS' 				=> '��������',
'M_CATEGORY'		    => '���������',
'M_YEAR'				=> '������',
'M_COPIES'				=> '�����',
'M_FROM' 				=> '��',
'M_TITLE' 				=> '��������',
'M_ALTTITLE' 			=> 'Alt ��������',
'M_GRADE'				=> '�������',
'M_DIRECTOR' 			=> '��������',
'M_COUNTRY'				=> '�������',
'M_RUNTIME' 			=> '���������������',
'M_MINUTES'			 	=> '������',
'M_PLOT' 				=> '�����',
'M_NOPLOT' 				=> '���� ���������� �� �����',
'M_COVERS' 				=> '�������',
'M_AVAILABLE' 			=> '������� �����',
'M_MEDIA'			 	=> '��� �����',
'M_NUM' 				=> '����� CD/��',
'M_DATE' 				=> '���� �� ���������',
'M_OWNER'			 	=> '������',
'M_NOACTORS'		    => '���� ���� �� �������',
'M_INFO'			    => '����������',
'M_DETAILS'			    => '������� �� ����� �����',
'M_MEDIATYPE'		    => '���',
'M_COMMENT'			    => '��������',
'M_PRIVATE'				=> '�������� ���� ����� ?',
'M_SCREENSHOTS'			=> '�����',
'M_NOSCREENS'			=> '���� ������� �����',
'M_SHOW'				=> '������',
'M_HIDE'				=> '�����',
'M_CHANGE'				=> '���������� �������',
'M_NOCOVERS'			=> '���� ������� �������',
'M_BYCAT'				=> '�������� �� ���������',
'M_CURRCAT'				=> '������ ���������',
'M_TEXTVIEW'			=> '������� ���',
'M_IMAGEVIEW'			=> '�����������',
'M_MINEONLY'			=> '������ ���� ����� �����',
'M_SIMILAR'				=> '�������',
'M_MEDIAINDEX'			=> 'Media Index',

/* IMDB */
'I_DETAILS'				=> 'IMDB �������',
'I_PLOT'				=> '������� �����',
'I_GALLERY'				=> '�����������',
'I_TRAILERS'			=> '��������',
'I_LINKS'				=> 'IMDB ������',
'I_NOT'					=> 'IMDB �� ��������� � ����������',

/* DVD Specific */
'DVD_REGION'			=> 'Region',
'DVD_FORMAT'			=> 'Format',
'DVD_ASPECT'			=> 'Aspect ratio',
'DVD_AUDIO'				=> 'Audio',
'DVD_SUBTITLES'			=> 'Subtitles',

/* My Movies */
'MY_EXPORT' 			=> '�����������',
'MY_EXCEL' 				=> '���� Excel',
'MY_XML' 				=> '���� XML',
'MY_XMLTHUMBS'			=> '����������� ����������� ���� XML',
'MY_ACTIONS'			=> '��������',
'MY_JOIN'				=> 'Disc join',
'MY_JOINMOVIES'			=> 'Disc join �����',
'MY_JOINSUSER'			=> '������ ����������',
'MY_JOINSMEDIA'			=> '������ ���',
'MY_JOINSCAT'			=> '������ ���������',
'MY_JOINSTYPE'			=> '������ ���������',
'MY_JOINSHOW'			=> '������ ���������',
'MY_NORESULTS'			=> '���������� �� ������ ���������',
'MY_TEXTALL'			=> '��� ������ (Textmode)',
'MY_PWALL'				=> '��� ������ (������)',
'MY_PWMOVIES'			=> '��� ������ (�����)',
'MY_PWTV'				=> '��� ������ (�� ���)',
'MY_PWBLUE'				=> '��� ������ (���� �����)',
'MY_J1'					=> '�����, ����� ����, � ����������� ����',
'MY_J2'					=> '�����, ����� �����, � ����������� ���',
'MY_J3'					=> '�����, ����� ������ �����',
'MY_OVERVIEW'			=> '�������� - ���� �����������',
'MY_INFO'				=> '�� ���� �������� �� �������� ������ �� �������.
							� ����� �� ����������, ����� ������ �� ����������� � ����������.
							������ �� ������������ � ����� /�� ����������/ ��� �� ���������� XML
							������������ �� �������� ����� ��� �� ���������� ������������ �� ������ �� � �����
							� ����� ����.',
'MY_KEYS'				=> '���������� ������ ID\'�',
'MY_SEENLIST'			=> '���������� ������������ �����',
'MY_HELPPICKER'			=> '������ ���� �� �������',
'MY_HELPPICKERINFO'		=> '�� ����� ����� �� ������ ���� ����� ?<br/>���� �� �� ������ ������ ���.<br/>
							������ �� ��������� ������, �� �� �������� ���������
						    .',
'MY_FIND'				=> '������ ����',
'MY_NOTSEEN'			=> '�������� �� ����, ����� �� ��� ������ �� �������',
'MY_FRIENDS'			=> '��������, ������ CD/�� �� ����',


/* Manager window */
'MAN_BASIC' 			=> '������ ����������',
'MAN_IMDB' 				=> 'IMDB ����',
'MAN_EMPIRE' 			=> 'DVD Empire ����',
'MAN_COPY' 				=> '����� �����',
'MAN_COPIES' 			=> '����� �����',
'MAN_NOCOPY' 			=> '��� ������ �����',
'MAN_1COPY' 			=> '�������',
'MAN_ADDACT' 			=> '������� �������',
'MAN_ADDTODB' 			=> '������� ���� ������� ��� ������ � �����',
'MAN_SAVETODB' 			=> '������ � ������ � �����',
'MAN_SAVETODBNCD' 		=> '������ � ������ � ����� � �����',
'MAN_INDB' 				=> '������� � ������ � �����',
'MAN_SEL' 				=> '������� �������',
'MAN_STARS' 			=> '������',
'MAN_BROWSE'			=> '������� �� ������������� �� �����',


/* Add movies */
'ADD_INFO' 				=> '������ ����� �� ���������',
'ADD_IMDB' 				=> '��������� �� IMDB',
'ADD_IMDBTITLE' 		=> '������� �� ������� ����',
'ADD_MANUAL' 			=> '����� ���������',
'ADD_LISTED' 			=> '������� ����, ����� � ���� � �������',
'ADD_XML' 				=> '������� ���� �� ���������� XML ���� ',
'ADD_XMLFILE' 			=> '������ XML ���� �� ������',
'ADD_XMLNOTE' 			=> '(������ �� ������, �� ���� XML ������� ������������ �� ����� VCD-db ���������� ����� �� ���������� ���������� ���.������ �� ������������ ������ �����  �� ������ -����� �����-. ������ �� ��������� �������� �� �������������� XML �������. ) ',
'ADD_MAXFILESIZE'		=> '���������� ������ �� �����',
'ADD_DVDEMPIRE' 		=> '������� �� Adult DVD Empire (���� ���� /����-����/)',
'ADD_LISTEDSTEP1' 		=> '������ 1-��<br/>������ ����������, ����� ����� �� �������� � ������� ��.<br/>���� �� ��������
						    ��� ����� ��� ���������� ������.',
'ADD_LISTEDSTEP2' 		=> '������ 2-��.<br/>������ �������� ��� �����.',
'ADD_INDB' 				=> '����� � ������ � �����',
'ADD_SELECTED' 			=> '������� ��������',
'ADD_INFOLIST' 			=> '������ ��� ���� ����� ��������, �� �� ������� �������� ��� ��������� ���������.<br/>���� �� ��������� ������������
							�� ����� �������� �� ��������.',
'ADD_NOTITLES' 			=> '����� �� ������������� �� � ������� ����� � ������ � �����',


/* Add from XML */
'XML_CONFIRM' 			=> '�������� XML ������',
'XML_CONTAINS' 			=> 'XML ����� ������� %d �����.',
'XML_INFO1' 			=> '������� ������������ �� �� ���������� � ������ � ������ � �����.<br/>
							��� ������. ',
'XML_INFO2' 			=> '��� ������ �� �������� ����������� (�������) � �������, ����� ������ �� ����������� � XML 
							�����,
<b>������</b> ���� �� ����� XML ���� �� ������ �����������!.<br/>
							��������� �� ����� �� �� ���������� ���� ���� ��� �������� ������������� �� ������� �� ������� XML ����. 
							��� ���� ����� XML ����, �������� �����������, ���������� ������ ��-���� � ��� ���������� ������, 
							���� ������������� �� ������� � ������� ����, �� ������ �������� �� ������� ����� XML ����
							�� ����������� �� ����������. ',
'XML_THUMBNAILS'		=> '������ ����������� �� XML ����, �������� ������ ',
'XML_LIST'				=> '����� ����� �� �����, �������� � XML �����.',
'XML_ERROR'				=> '� XML ����� �� ���� ������� ��������.<br/>������ ���� �� � �������� ��� ������ ������.
			   				<br/>������� �� ���, �� ���������� XML ����, ���������� ����� ���� �� VCD-db..',
'XML_RESULTS'			=> '��������� �� XML ������� .',
'XML_RESULTS2'			=> '��� �� ����������� �� ����� XML ������.<br/>������� %d ����� ���� �����������.',


/* Add from DVD Empire */
'EM_INFO'				=> '���������� �� AdultDVDEmpire.com ....',
'EM_DESC'				=> 'DVDEmpire ��������',
'EM_SUBCAT'				=> '��������� �� ���������',
'EM_DETAILS'			=> 'Adultdvdempire.com �������',
'EM_STARS'				=> '�����������',
'EM_NOTICE'				=> '��������� ��������� � ������� ��� ������� �� �� ��� VCD-DB.
							�� ������ �� �� ��������� � �� �� ����� ���������
						    � ���������� � �����.',
'EM_FETCH'				=> '������� ����',

/* Loan System */
'LOAN_MOVIES'			=> '����� �� ����',
'LOAN_TO'				=> '��� �� ���� ��',
'LOAN_ADDUSERS'			=> '������ �������',
'LOAN_NEWUSER'			=> '��� �������',
'LOAN_REGISTERUSER'		=> '������ �������',
'LOAN_NAME'				=> '���',
'LOAN_SELECT'			=> '������',
'LOAN_MOVIELOANS'		=> '������ ������ ����� ...',
'LOAN_REMINDER'			=> '������� ���������',
'LOAN_HISTORY'			=> '���� �������',
'LOAN_HISTORY2'			=> '��� ���� ��������� ',
'LOAN_SINCE'			=> '�����',
'LOAN_TIME'				=> '����� �����',
'LOAN_RETURN'			=> '����� �������',
'LOAN_SUCCESS'			=> '������� ������ �� ����',
'LOAN_OUT'				=> '�� �������',
'LOAN_DATEIN'			=> 'Date in',
'LOAN_DATEOUT'			=> 'Date out',
'LOAN_PERIOD'			=> '������ �� ����',
'LOAN_BACK'				=> '����� �� � ������ ���� �� ����',
'LOAN_DAY'				=> '���',
'LOAN_DAYS'				=> '���',
'LOAN_TODAY'			=> '�� ����',


/* RSS */
'RSS'					=> 'RSS �������������',
'RSS_TITLE'				=> 'RSS ������������� �� VCD-DB �������� �� ��� ��������',
'RSS_SITE'				=> 'RSS �������� �� �������������',
'RSS_USER'				=> 'RSS �� ����������',
'RSS_VIEW'				=> '������ RSS',
'RSS_ADD'				=> '������',
'RSS_NOTE'				=> '������ <strong>����� url</strong> �� VCD ������ �� ������ ��������.<br/>
							��� RSS � �������� �� ���������� �� ������ ��������,���� �� ��������
							���� �� ����� �� ������������ � �� �� �������� �� ������ ��������.',
'RSS_FETCH'				=> '������� RSS �����',
'RSS_NONE'				=> '�� ���� ��������� RSS �����.',
'RSS_FOUND'				=> '�������� RSS ����� ���� ��������, ���� �������� ���� ����� ������� �� ���������:',
'RSS_NOTFOUND'			=> '�� ���� ��������',


/* Wishlist */
'W_ADD'					=> '������� ��� ��� ������ "�������"',
'W_ONLIST'				=> '� ���� ������ "�������"',
'W_EMPTY'				=> '������ ������ "�������" � ������',
'W_OWN'					=> '���� ����� �� ���� ����',
'W_NOTOWN'				=> '�� ���������� ����� �� ���� ����',


/* Comments */
'C_COMMENTS'			=> '���������',
'C_ADD'					=> '����������',
'C_NONE'				=> '���� ��������',
'C_TYPE'				=> '������ ���� ��������',
'C_YOUR'				=> '������ ��������',
'C_POST'				=> '����� ���������',
'C_ERROR'				=> '������ �� ��� �� �������������� � ���������, �� �� ������ �� �����������.',


/* Pornstars */
'P_NAME'				=> '���',
'P_WEB'					=> '��� ��������',
'P_MOVIECOUNT'			=> 'Movie count',


/* Seen List */
'S_SEENIT'				=> '������ ��� ��',
'S_NOTSEENIT'			=> '�� ��� �� ������',
'S_SEENITCLICK'			=> '������ �� ��������� ���� ������',
'S_NOTSEENITCLICK'		=> '������ �� ��������� ���� ��������',

/* Mail messages */
'MAIL_RETURNTOPIC'		=> 'Loan reminder',
'MAIL_RETURNMOVIES1'	=> '%s, ������ �� ��������, �� ���� �� �� ������ �����.\n
							��� ��� ���� �������� ����� :\n\n',
'MAIL_RETURNMOVIES2'    => '���� ����� ��������� ������� �� ���� ��-�����\n �������� %s \n\n
							nb. ���� � ����������� ���� �� VCD-db ��������� (http://vcddb.konni.com)',
'MAIL_NOTIFY'  		    => '<strong>���� ����� ���� ��������� ��� VCD-db</strong><br/>
							 ������ <a href="%s/?page=cd&vcd_id=%s">���</a> �� �� ����� ������ ..
							 <p>nb. ���� � ����������� ���� �� VCD-db ��������� (vcddb.konni.com)</p>',
'MAIL_REGISTER'		 	=> '%s, ������������� ��� VCD-db ������� �������.\n\n������ ������������� ��� � %s � ������ ������ � 
							%s.\n\n����� ������ �� ������ �������� �� ������ �� � ���������.\n
							������ <a href="%s" target="_new">���</a> �� �� ������ ��� VCD-db ����������.',


/* Player */
'PLAYER'				=> '������',
'PLAYER_PATH'			=> '���',
'PLAYER_PARAM'			=> '���������',
'PLAYER_NOTE'			=> '������ ������ ��� �� ������� �� ������� ����.
							���� ������ ������ �� ���� �� ������ ��������� �� ��������� ������ ����
							BSPlayer �� Win32 ��� MPlayer �� ������.<br/>������ �� "���������" BSPlayer �� 
							<a href="http://www.bsplayer.org" target="_new">���</a> 
							� MPlayer �� <a href="http://www.MPlayerHQ.hu" target="_new">���</a>.',



/* Metadata */
'META_MY'				=> 'My Metadata',
'META_NAME'				=> 'Name',
'META_DESC'				=> 'Description',
'META_TYPE'				=> 'Meta type',
'META_VALUE'			=> 'Meta value',
'META_NONE'				=> 'No Metadata exists.',

/* Ignore List */
'IGN_LIST'				=> 'Ignore List',
'IGN_DESC'				=> 'Ignore all movies from the following users:',

/* Misc keywords */
'X_CONTAINS'			=> '�������',
'X_GRADE'				=> 'IMDB rating more than',
'X_ANY'					=> '������',
'X_TRYAGAIN'			=> '������ ������',
'X_PROCEED' 			=> '��������',
'X_SELECT' 				=> '������',
'X_CONFIRM' 			=> '��������',
'X_CANCEL' 				=> '�����',
'X_ATTENTION' 			=> '��������!',
'X_STATUS' 				=> '������',
'X_SUCCESS' 			=> '�������',
'X_FAILURE' 			=> '���������',
'X_YES' 				=> '��',
'X_NO' 					=> '��',
'X_SHOWMORE' 			=> '������ ������',
'X_SHOWLESS' 			=> '������ ��-�����',
'X_NEW' 				=> '���',
'X_CHANGE' 				=> '�������',
'X_DELETE' 				=> '������',
'X_UPDATE' 				=> '������',
'X_SAVEANDCLOSE' 		=> '������ � �������',
'X_CLOSE' 				=> '�������',
'X_EDIT' 				=> '��������',
'X_RESULTS' 			=> '���������',
'X_LATESTMOVIES' 		=> '����',
'X_LATESTTV' 			=> '���� �� ���-��',
'X_LATESTBLUE' 			=> '���� ���� ����:)',
'X_MOVIES' 				=> '�����',
'X_NOCATS' 				=> '���� ���� ��������� �����.',
'X_NOUSERS' 			=> '���� ������� �����������',
'X_KEY' 				=> '����',
'X_SAVENEXT' 			=> '������ � ���������� ���������',
'X_SAVE' 				=> '������',
'X_SEEN' 				=> '����������'


);


?>
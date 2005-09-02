<h1><?=$language->show('ADD_LISTED')?></h1>
<?
	if (!isset($_SESSION['listed'])) {
		redirect();
		exit();
	} else {
		$id_list = $_SESSION['listed'];
		// Clean the id's from session and memory
		session_unregister('listed');
		unset($_SESSION['listed']);
	}

	
	global $ClassFactory;
	$VCDClass = $ClassFactory->getInstance('vcd_movie');
	$movies = $VCDClass->getVcdForListByIds($id_list);
	
	
?>


<p class="bold"><?=$language->show('ADD_LISTEDSTEP2')?></p>

<br/>

<form method="POST" action="./exec_form.php?action=listedconfirm">
<table cellpadding="1" cellspacing="1" border="0" width="100%" class="displist">
<tr>
	<td class="header" width="80%"><?=$language->show('M_TITLE')?></td>
	<td class="header" nowrap="nowrap"><?=$language->show('M_MEDIATYPE')?></td>
	<td class="header" nowrap="nowrap"><?=$language->show('M_NUM')?></td>
</tr>
	<? 
		$i = 0;
	
		foreach ($movies as $movie) {
			print "<tr>";
			print "<td>".$movie->getTitle()."</td>";
			
			print "<td>";
			print "<select name=\"item_".$i."\" size=\"1\">";
			print "<option value=\"null\">".$language->show('X_SELECT')."</option>";
			foreach ($SETTINGSClass->getAllMediatypes() as $mediaTypeObj) {
				
				print "<option value=\"".$movie->getId()."|".$mediaTypeObj->getmediaTypeID()."\">".$mediaTypeObj->getDetailedName()."</option>";
				if ($mediaTypeObj->getChildrenCount() > 0) {
					foreach ($mediaTypeObj->getChildren() as $childObj) { 
						print "<option value=\"".$movie->getID()."|".$childObj->getmediaTypeID()."\">&nbsp;&nbsp;".$childObj->getDetailedName()."</option>";
					}
				}
				
			}
			
			print "</select></td>";
			
			print "<td><select name=\"cds_".$i."\"><option value=\"1\">1</option><option value=\"2\">2</option><option value=\"3\">3</option><option value=\"4\">4</option></select></td></tr>";
			$i++;
		}
	?>
</table>
<p align="right" style="padding-right:85px;">
	<input type="hidden" name="disccount" value="<?=$i?>"/>
	<input type="submit" value="<?=$language->show('X_CONFIRM')?>" onclick="return confirmListed(this.form)"/>
</p>

</form>

<? 
	unset($movies);
?>
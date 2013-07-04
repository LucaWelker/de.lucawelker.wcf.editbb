<?php
/**
 * Updates the styles.
 * @author 		Luca Welker
 * @copyright 	2012 Luca Welker
 * @package		de.lucawelker.wcf.editbb
 * @category	Community Framework
 */

require_once(WCF_DIR.'lib/data/style/StyleEditor.class.php');
$sql = "SELECT * FROM wcf".WCF_N."_style";
$result = WCF::getDB()->sendQuery($sql);
while ($row = WCF::getDB()->fetchArray($result)) {
	$style = new StyleEditor(null, $row);
	$style->writeStyleFile();
}
StyleUtil::updateStyleFile();
?>

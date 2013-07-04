<?php
require_once(WCF_DIR.'lib/data/message/bbcode/BBCodeParser.class.php');
require_once(WCF_DIR.'lib/data/message/bbcode/BBCode.class.php');

/**
 * Parses the [edit] BBCode-Tag.
 * @author 		Luca Welker
 * @copyright	2012 Luca Welker
 * @package		de.lucawelker.wcf.editbb
 * @category	Community Framework
 */

class EditBBCode implements BBCode {
	/**
	 * @see BBCode::getParsedTag()
	 */
	public function getParsedTag($openingTag, $content, $closingTag, BBCodeParser $parser) {
		if (BOARD_EDITBBCODES_ENABLE) {

			if ($parser->getOutputType() == 'text/html') {
				WCF::getTpl()->assign(array(
					'personWhoEdited' => (!empty($openingTag['attributes'][1])) ? StringUtil::trim($openingTag['attributes'][1]) : '',
					'number' => (!empty($openingTag['attributes'][0])) ? intval($openingTag['attributes'][0]) : '',
					'content' => $content
				));
				
				$modedit = (($openingTag['name'] === 'modedit') 
								&& (BOARD_EDITBBCODES_EVERYBODYCANUSE || WCF::getUser()->getPermission('mod.board.canUseModEditBBCode')));
				
				WCF::getTpl()->assign('modedit', $modedit);
				return WCF::getTpl()->fetch('EditBBCodeTag');
			}
		} else {
			if (BOARD_EDITBBCODES_SHOWENABLEERROR) {
				throw new NamedUserException(WCF::getLanguage()->get('wbb.threadAdd.editBBCode.bbCodeDisabledException'));
			}
		}
		return $content;
	}
}

?>
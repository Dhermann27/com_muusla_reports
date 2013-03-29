<?php
/**
 * muusla_reports Model for muusla_reports Component
 *
 * @package    muusla_reports
 * @subpackage Components
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
jimport( 'joomla.application.component.model' );
/**
 * muusla_reports Model
 *
 * @package    muusla_reports
 * @subpackage Components
 */
class muusla_reportsModelalldeposits extends JModel
{
	function getCharges($types) {
		$db =& JFactory::getDBO();
		$query = "SELECT mf.familyname, mr.camperid, mr.amount, mr.memo FROM muusa_family mf, muusa_charges_v mr WHERE mf.familyid=mr.familyid AND mr.is_deposited IS NULL AND mr.chargetypeid IN ($types) ORDER BY mf.familyname";
		$db->setQuery($query);
		return $db->loadObjectList();
	}
	
	function setCharges($types) {
		$db =& JFactory::getDBO();
		$user =& JFactory::getUser();
		$query = "UPDATE muusa_charges SET is_deposited=CURRENT_DATE, modified_by='$user->username', modified_at=CURRENT_TIMESTAMP WHERE is_deposited IS NULL AND chargetypeid IN ($types) AND fiscalyear=(SELECT year FROM muusa_currentyear)";
		$db->setQuery($query);
		$db->query();
		return;
	}
}

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
class muusla_reportsModelalloutstanding extends JModel
{
	function getCampers() {
		$db =& JFactory::getDBO();
		$query = "SELECT camperid camperid, CONCAT(lastname,', ', firstname) fullname, 0 totallater, 0 totalnow FROM muusa_campers_v WHERE hohid=0 ORDER BY lastname, firstname, statecd, city";
		$db->setQuery($query);
		return $db->loadAssocList("camperid");
	}

	function getCharges() {
		$db =& JFactory::getDBO();
		$query = "SELECT familyid, camperid, amount, chargetypeid chargetypeid FROM muusa_charges_v mv";
		$db->setQuery($query);
		return $db->loadObjectList();
	}

	function getCredits() {
		$db =& JFactory::getDBO();
		$query = "SELECT camperid, hohid, registration_amount, housing_amount FROM muusa_credits_v";
		$db->setQuery($query);
		return $db->loadObjectList();
	}
}
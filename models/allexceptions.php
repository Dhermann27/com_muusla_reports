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
class muusla_reportsModelallexceptions extends JModel
{
	function getRegistrationFees() {
		$db =& JFactory::getDBO();
		$query = "SELECT mc.camperid, CONCAT(mc.lastname, ', ', mc.firstname) fullname FROM muusa_campers_v mc WHERE (SELECT COUNT(*) FROM muusa_charges_v mr WHERE mr.chargetypeid=1003 AND mr.camperid=mc.camperid) != 1 ORDER BY mc.lastname, mc.firstname";
		$db->setQuery($query);
		return $db->loadObjectList();
	}

	function getHousingFees() {
		$db =& JFactory::getDBO();
		$query = "SELECT mc.camperid, CONCAT(mc.lastname, ', ', mc.firstname) fullname FROM muusa_campers_v mc WHERE mc.roomid != 0 AND mc.age > 4 AND (SELECT COUNT(*) FROM muusa_charges_v mr WHERE mr.chargetypeid=1000 AND mr.camperid=mc.camperid) != 1 ORDER BY mc.lastname, mc.firstname";
		$db->setQuery($query);
		return $db->loadObjectList();
	}

	function getPrograms() {
		$db =& JFactory::getDBO();
		$query = "SELECT mc.camperid, CONCAT(mc.lastname, ', ', mc.firstname) fullname, (SELECT name FROM muusa_programs WHERE programid=muusa_programs_id_f(STR_TO_DATE(mv.birthdate, '%m/%d/%Y'), mv.gradeoffset)) expected, mv.programname actual FROM muusa_campers_v mv, muusa_campers mc WHERE mv.camperid=mc.camperid AND mc.programid!=muusa_programs_id_f(mv.birthdate, mv.gradeoffset) ORDER BY mc.lastname, mc.firstname";
		$db->setQuery($query);
		return $db->loadObjectList();
	}
	
	function getProgramFees() {
		$db =& JFactory::getDBO();
		$query = "SELECT mc.camperid, CONCAT(mc.lastname, ', ', mc.firstname) fullname, mv.amount actual, muusa_programs_fee_f(STR_TO_DATE(mc.birthdate, '%m/%d/%Y'), mc.gradeoffset) expected FROM muusa_campers_v mc, muusa_charges_v mv WHERE mc.camperid=mv.camperid AND mv.chargetypeid=1003 AND mv.amount!=muusa_programs_fee_f(STR_TO_DATE(mc.birthdate, '%m/%d/%Y'), mc.gradeoffset) ORDER BY mc.lastname, mc.firstname";
		$db->setQuery($query);
		return $db->loadObjectList();
	}
	
	function getRateFees() {
		$db =& JFactory::getDBO();
		$query = "SELECT mc.camperid, CONCAT(mc.lastname, ', ', mc.firstname) fullname, mv.amount actual, muusa_rates_f(mc.camperid) expected FROM muusa_campers_v mc, muusa_charges_v mv WHERE mc.camperid=mv.camperid AND mv.chargetypeid=1000 AND mv.amount!=muusa_rates_f(mc.camperid) ORDER BY mc.lastname, mc.firstname";
		$db->setQuery($query);
		return $db->loadObjectList();
	}
	
	function getDuplicateCampers() {
		$db =& JFactory::getDBO();
		$query = "SELECT mc.camperid oldid, (SELECT COUNT(*) FROM muusa_charges_v WHERE camperid=mc.camperid) numcharges, md.camperid newid, (SELECT COUNT(*) FROM muusa_charges_v WHERE camperid=md.camperid) numdharges, CONCAT(mc.lastname, ', ', mc.firstname) fullname FROM muusa_campers mc, muusa_campers md WHERE mc.camperid!=md.camperid AND mc.firstname=md.firstname AND mc.lastname=md.lastname ORDER BY mc.lastname, mc.firstname";
		$db->setQuery($query);
		return $db->loadObjectList();
	}
}
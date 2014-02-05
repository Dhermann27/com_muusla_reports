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
class muusla_reportsModelallregchart extends JModel
{
	function getDates() {
		$db =& JFactory::getDBO();
		$query = "SELECT RIGHT(date,5) FROM muusa_staticdates ORDER BY RIGHT(date,5)";
		$db->setQuery($query);
		return $db->loadResultArray();
	}
	
	function getData() {
		$db =& JFactory::getDBO();
		$query = "SELECT ya.year, RIGHT(mf.postmark,5) date, (SELECT COUNT(*) FROM muusa_fiscalyear my WHERE mf.fiscalyear=my.fiscalyear AND RIGHT(my.postmark, 5)<=RIGHT(mf.postmark, 5)) count FROM muusa_fiscalyear mf WHERE mf.fiscalyear>2008 GROUP BY mf.postmark ORDER BY mf.postmark";
		$db->setQuery($query);
		return $db->loadObjectList();
	}
	
	function getTable() {
		$db =& JFactory::getDBO();
		$query = "SELECT mf.fiscalyear, COUNT(*) total, SUM(IF((SELECT COUNT(*) FROM muusa_fiscalyear my WHERE mf.fiscalyear>my.fiscalyear AND mc.camperid=my.camperid)=0, 1, 0)) newcampers, SUM(IF((SELECT COUNT(*) FROM muusa_fiscalyear my WHERE mf.fiscalyear-1=my.fiscalyear AND mc.camperid=my.camperid)=0 AND (SELECT COUNT(*) FROM muusa_fiscalyear my WHERE mf.fiscalyear-1>my.fiscalyear AND mc.camperid=my.camperid)>0, 1, 0)) oldcampers, SUM(IF((SELECT COUNT(*) FROM muusa_fiscalyear my WHERE mf.fiscalyear>my.fiscalyear AND mf.fiscalyear-2<=my.fiscalyear AND mc.camperid=my.camperid)=0 AND (SELECT COUNT(*) FROM muusa_fiscalyear my WHERE mf.fiscalyear-2>my.fiscalyear AND mc.camperid=my.camperid)>0, 1, 0)) voldcampers, (SELECT COUNT(*) FROM muusa_fiscalyear my WHERE mf.fiscalyear-1=my.fiscalyear AND (SELECT COUNT(*) FROM muusa_fiscalyear mz WHERE mf.fiscalyear=mz.fiscalyear AND my.camperid=mz.camperid)=0) lostcampers FROM muusa_campers mc, muusa_fiscalyear mf WHERE mc.camperid=mf.camperid AND mf.fiscalyear>2008 GROUP BY mf.fiscalyear ORDER BY mf.fiscalyear";
		$db->setQuery($query);
		return $db->loadObjectList();
	}
}

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
		$query = "SELECT mf.fiscalyear, RIGHT(mf.postmark,5) date, (SELECT COUNT(*) FROM muusa_fiscalyear my WHERE mf.fiscalyear=my.fiscalyear AND RIGHT(my.postmark, 5)<=RIGHT(mf.postmark, 5)) count FROM muusa_fiscalyear mf WHERE mf.fiscalyear>2008 GROUP BY mf.postmark ORDER BY mf.postmark";
		$db->setQuery($query);
		return $db->loadObjectList();
	}
	
	function getTable() {
		$db =& JFactory::getDBO();
		$query = "SELECT mf.fiscalyear, SUM(IF((SELECT COUNT(*) FROM muusa_fiscalyear mnc WHERE mnc.fiscalyear<mf.fiscalyear AND mf.camperid=mnc.camperid)=0,1,0)) newcampers, SUM(IF((SELECT COUNT(*) FROM muusa_fiscalyear moc WHERE moc.fiscalyear>=mf.fiscalyear-3 AND moc.fiscalyear<mf.fiscalyear-1 AND mf.camperid=moc.camperid)>0,IF((SELECT COUNT(*) FROM muusa_fiscalyear mocp WHERE mocp.fiscalyear=mf.fiscalyear-1 AND mf.camperid=mocp.camperid)=0,1,0),0)) oldcampers, SUM(IF((SELECT COUNT(*) FROM muusa_fiscalyear mvo WHERE mvo.fiscalyear<mf.fiscalyear-3 AND mf.camperid=mvo.camperid)>0,IF((SELECT COUNT(*) FROM muusa_fiscalyear mvop WHERE mvop.fiscalyear<mf.fiscalyear-1 AND mvop.fiscalyear>=mf.fiscalyear-3 AND mf.camperid=mvop.camperid)=0,1,0),0)) voldcampers, (SELECT COUNT(*) FROM muusa_fiscalyear mlc WHERE mf.fiscalyear-1=mlc.fiscalyear AND (SELECT COUNT(*) FROM muusa_fiscalyear mlcp WHERE mlcp.fiscalyear=mf.fiscalyear AND mlcp.camperid=mlc.camperid)=0) lostcampers,  (SELECT COUNT(*) FROM muusa_fiscalyear mt WHERE mf.fiscalyear=mt.fiscalyear) total FROM muusa_campers mc, muusa_fiscalyear mf WHERE mc.camperid=mf.camperid AND mf.fiscalyear>2008 GROUP BY mf.fiscalyear ORDER BY mf.fiscalyear";
		$db->setQuery($query);
		return $db->loadObjectList();
	}
}

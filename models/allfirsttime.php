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
class muusla_reportsModelallfirsttime extends JModel
{
   function getCampers($year) {
      $db =& JFactory::getDBO();
      $query = "SELECT mc.camperid, mc.firstname, mc.lastname, mc.city, mc.statecd, mc.programname, mc.birthdate, mc.roomnbr, IF((SELECT COUNT(*) FROM muusa_attendees ma WHERE mc.camperid=ma.camperid)>0,1,0) workshops FROM muusa_campers_v mc WHERE mc.hohid=0 AND (SELECT COUNT(*) FROM muusa_fiscalyear mf, muusa_currentyear my WHERE mc.camperid=mf.camperid AND mf.fiscalyear>=(my.year-$year))=1 ORDER BY lastname, firstname, city, statecd";
      $db->setQuery($query);
      return $db->loadAssocList("camperid");
   }
    
   function getChildren($year) {
      $db =& JFactory::getDBO();
      $query = "SELECT mc.camperid, mc.hohid, mc.firstname, mc.lastname, mc.programname, mc.birthdate, mc.roomnbr, IF((SELECT COUNT(*) FROM muusa_attendees ma WHERE mc.camperid=ma.camperid)>0,1,0) workshops FROM muusa_campers_v mc WHERE mc.hohid!=0 AND (SELECT COUNT(*) FROM muusa_fiscalyear mf, muusa_currentyear my WHERE mc.camperid=mf.camperid AND mf.fiscalyear>=(my.year-$year))=1 AND (SELECT COUNT(*) FROM muusa_fiscalyear mf, muusa_currentyear my WHERE mc.hohid=mf.camperid AND mf.fiscalyear>=(my.year-$year))=1 ORDER BY lastname, firstname, city, statecd";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
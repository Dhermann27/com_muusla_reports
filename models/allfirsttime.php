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
   function getCampers() {
      $db =& JFactory::getDBO();
      $query = "SELECT mc.familyid, mc.familyname, mc.city, mc.statecd FROM muusa_family_v mc ORDER BY mc.familyname";
      $db->setQuery($query);
      return $db->loadAssocList("familyid");
   }
    
   function getChildren($year, $campers) {
      $db =& JFactory::getDBO();
      $query = "SELECT mc.camperid, mc.familyid, mc.firstname, mc.lastname, mc.programname, mc.email, mc.birthdate, mc.roomnbr, IFNULL((SELECT COUNT(*) FROM muusa_attendees ma WHERE mc.fiscalyearid=ma.fiscalyearid),0) workshops FROM muusa_campers_v mc, muusa_fiscalyear mf, muusa_currentyear my WHERE mc.camperid=mf.camperid AND mf.fiscalyear>=(my.year-$year) AND mc.camperid NOT IN ($campers) GROUP BY mc.camperid HAVING COUNT(*)=1 ORDER BY STR_TO_DATE(birthdate, '%m/%d/%Y')";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
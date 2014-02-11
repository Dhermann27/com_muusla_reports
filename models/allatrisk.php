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
class muusla_reportsModelallatrisk extends JModel
{
   function getUnregcampers() {
      $db =& JFactory::getDBO();
      $query = "SELECT c.id, c.familyid, f.name familyname, c.firstname, c.lastname FROM (muusa_camper c, muusa_family f, muusa_year y) LEFT JOIN muusa_yearattending ya ON c.id=ya.camperid AND ya.year=y.year WHERE muusa_isprereg(c.id, y.year)>0 AND ya.id IS NULL AND y.is_current=1 AND c.familyid=f.id ORDER BY f.name, c.birthdate";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
    
   function getUnasscampers() {
      $db =& JFactory::getDBO();
      $query = "SELECT tc.id, tc.familyid, tc.familyname, tc.firstname, tc.lastname FROM muusa_thisyear_camper tc, muusa_year y WHERE muusa_isprereg(tc.id, y.year)>0 AND tc.roomid=0 AND y.is_current=1 AND tc.programid IN (1000,1002,1005,1007) ORDER BY tc.familyname, tc.birthdate";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
    
   function getLostcampers() {
      $db =& JFactory::getDBO();
      $query = "SELECT c.id, c.familyid, f.name familyname, c.firstname, c.lastname FROM (muusa_camper c, muusa_family f, muusa_year y) WHERE (SELECT COUNT(*) FROM muusa_yearattending ya WHERE ya.year=y.year-1 AND c.id=ya.camperid)=1 AND (SELECT COUNT(*) FROM muusa_yearattending yap WHERE yap.year=y.year AND c.id=yap.camperid)=0 AND y.is_current=1 AND c.familyid=f.id ORDER BY f.name, c.birthdate";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
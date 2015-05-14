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
class muusla_reportsModelallprograms extends JModelItem
{
   function getCampers() {
      $db = JFactory::getDBO();
      $query = "SELECT tc.id, tc.sexcd, tc.firstname, tc.lastname, tc.programid, tc.age, tc.grade, tc.familyid, tc.familyname, tc.sponsor, tc.email, tc.city, tc.statecd, tc.churchname, (SELECT COUNT(*) FROM muusa_yearattending ya WHERE ya.camperid=tc.id) years_attending, (SELECT tcp.email FROM muusa_thisyear_camper tcp WHERE tcp.familyid=tc.familyid AND tcp.id!=tc.id AND tcp.email!='' ORDER BY tcp.age LIMIT 0,1) eldest_email FROM muusa_thisyear_camper tc WHERE tc.programid!=1008 ORDER BY tc.lastname, tc.firstname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function getPrograms() {
      $db = JFactory::getDBO();
      $query = "SELECT p.id, p.name FROM muusa_program p, muusa_year y WHERE y.year>=p.start_year AND y.year<=p.end_year AND y.is_current=1 AND p.name!='Adult' ORDER BY p.name";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
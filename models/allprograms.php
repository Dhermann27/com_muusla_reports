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
class muusla_reportsModelallprograms extends JModel
{
   function getCampers() {
      $db =& JFactory::getDBO();
      $query = "SELECT tc.id, tc.sexcd, tc.firstname, tc.lastname, tc.programid, tc.age, tc.grade, tc.familyid, tc.familyname, tc.sponsor, tc.email FROM muusa_thisyear_camper tc WHERE tc.programid!=1000 ORDER BY tc.lastname, tc.firstname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
    
   function getPrograms() {
      $db =& JFactory::getDBO();
      $query = "SELECT p.id, p.name FROM muusa_program p, muusa_year y WHERE y.year>=p.start_year AND y.year<=p.end_year AND y.is_current=1 AND p.name!='Adult' ORDER BY p.name";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
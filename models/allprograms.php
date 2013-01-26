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
      $query = "SELECT mc.camperid, mc.sexcd, mc.firstname, mc.lastname, mc.programid, mc.age, mc.grade, mf.familyname, mc.sponsor sponsor, mc.email email FROM muusa_campers_v mc, muusa_family_v mf WHERE mc.familyid=mf.familyid AND mc.programid!=1000 ORDER BY mc.lastname, mc.firstname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
   
   function getPrograms() {
      $db =& JFactory::getDBO();
      $query = "SELECT programid, name FROM muusa_programs WHERE name!='Adult' ORDER BY name";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
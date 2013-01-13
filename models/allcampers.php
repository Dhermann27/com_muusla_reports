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
class muusla_reportsModelallcampers extends JModel
{
   function getCampers() {
      $db =& JFactory::getDBO();
      $query = "SELECT familyid, familyname, city, statecd FROM muusa_family_v";
      $db->setQuery($query);
      return $db->loadAssocList("familyid");
   }
    
   function getChildren() {
      $db =& JFactory::getDBO();
      $query = "SELECT camperid, familyid, firstname, lastname, programname, birthdate, roomnbr FROM muusa_campers_v ORDER BY STR_TO_DATE(birthdate, '%m/%d/%Y')";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
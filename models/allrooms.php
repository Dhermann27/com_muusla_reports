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
class muusla_reportsModelallrooms extends JModel
{
   function getBuildings() {
      $db =& JFactory::getDBO();
      $query = "SELECT buildingid, name FROM muusa_buildings";
      $db->setQuery($query);
      return $db->loadAssocList("buildingid");
   }
   
   function getRooms() {
      $db =& JFactory::getDBO();
      $query = "SELECT buildingid, roomid, roomnbr FROM muusa_rooms WHERE is_workshop=0 ORDER BY roomnbr";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
   
   function getCampers() {
      $db =& JFactory::getDBO();
      $query = "SELECT mcv.familyid, mcv.camperid, mr.buildingid, mcv.roomid, mcv.firstname, mcv.lastname, mcv.birthdate, mcv.programname FROM muusa_rooms mr, muusa_campers_v mcv WHERE mr.roomid=mcv.roomid AND mcv.roomid!=0 ORDER BY STR_TO_DATE(mcv.birthdate, '%m/%d/%Y')";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
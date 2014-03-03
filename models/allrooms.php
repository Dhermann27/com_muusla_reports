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
   function getYears() {
      $db =& JFactory::getDBO();
      $query = "SELECT year, is_current FROM muusa_year WHERE year>2008 ORDER BY year";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
   
   function getBuildings() {
      $db =& JFactory::getDBO();
      $query = "SELECT id, name, 0 count FROM muusa_building";
      $db->setQuery($query);
      return $db->loadAssocList("id");
   }
   
   function getRooms() {
      $db =& JFactory::getDBO();
      $query = "SELECT buildingid, id roomid, roomnbr FROM muusa_room WHERE is_workshop=0 ORDER BY roomnbr";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
   
   function getCampers($year) {
      $db =& JFactory::getDBO();
      $query = "SELECT bc.familyid, r.buildingid, bc.roomid, bc.firstname, bc.lastname, bc.birthday, bc.programname FROM muusa_byyear_camper bc, muusa_room r WHERE bc.roomid=r.id AND bc.roomid!=0 AND bc.year=$year ORDER BY bc.birthdate";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
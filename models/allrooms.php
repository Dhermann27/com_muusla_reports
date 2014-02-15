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
      $query = "SELECT id, name FROM muusa_building";
      $db->setQuery($query);
      return $db->loadAssocList("id");
   }
   
   function getRooms() {
      $db =& JFactory::getDBO();
      $query = "SELECT buildingid, id roomid, roomnbr FROM muusa_room WHERE is_workshop=0 ORDER BY roomnbr";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
   
   function getCampers() {
      $db =& JFactory::getDBO();
      $query = "SELECT tc.familyid, r.buildingid, tc.roomid, tc.firstname, tc.lastname, tc.birthday, tc.programname FROM muusa_thisyear_camper tc, muusa_room r WHERE tc.roomid=r.id AND tc.roomid!=0 ORDER BY tc.birthdate";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
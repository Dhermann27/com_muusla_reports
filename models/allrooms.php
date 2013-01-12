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
   function getCampers() {
      $db =& JFactory::getDBO();
      $query = "SELECT mc.camperid, mc.hohid, mb.buildingid, mb.name buildingname, mr.roomnbr, CONCAT(mc.lastname, ', ', mc.firstname) fullname, DATE_FORMAT(mc.birthdate, '%m/%d/%Y') birthdate, mc.programname FROM (muusa_rooms mr, muusa_buildings mb) LEFT JOIN muusa_campers_v mc ON mr.roomid=mc.roomid WHERE mr.buildingid=mb.buildingid AND mr.is_workshop=0 ORDER BY mr.buildingid, mr.roomnbr, mc.hohid, mc.birthdate";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
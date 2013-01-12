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
class muusla_reportsModelallemptys extends JModel
{
   function getRooms() {
      $db =& JFactory::getDBO();
      $query = "SELECT mr.roomid roomid, mr.roomnbr roomnbr, mr.buildingid buildingid, mb.name buildingname, (SELECT COUNT(*) FROM muusa_fiscalyear mf WHERE mf.roomid=mr.roomid AND mf.fiscalyear=2009) count, mr.capacity capacity FROM muusa_rooms mr, muusa_buildings mb WHERE mr.buildingid=mb.buildingid AND is_workshop=0 AND mr.capacity < 9999 ORDER BY mr.buildingid, mr.roomid";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
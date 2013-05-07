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
   function getCampers($order) {
      $db =& JFactory::getDBO();
      $query = "SELECT familyid, familyname, city, statecd FROM muusa_family_v $order";
      $db->setQuery($query);
      return $db->loadAssocList("familyid");
   }
    
   function getChildren() {
      $db =& JFactory::getDBO();
      $query = "SELECT mc.camperid, mc.familyid, mc.firstname, mc.lastname, mc.programname, mc.birthdate, mc.roomnbr, GROUP_CONCAT(mv.positionname) positionname FROM muusa_campers_v mc LEFT JOIN muusa_positions_v mv ON mc.camperid=mv.camperid GROUP BY mc.camperid ORDER BY STR_TO_DATE(birthdate, '%m/%d/%Y')";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
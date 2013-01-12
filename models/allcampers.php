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
      $query = "SELECT camperid, firstname, lastname, city, statecd, programname, birthdate, roomnbr FROM muusa_campers_v WHERE hohid=0 ORDER BY lastname, firstname, city, statecd";
      $db->setQuery($query);
      return $db->loadAssocList("camperid");
   }
    
   function getChildren() {
      $db =& JFactory::getDBO();
      $query = "SELECT camperid, hohid, firstname, lastname, city, statecd, programname, birthdate, roomnbr FROM muusa_campers_v WHERE hohid!=0 ORDER BY hohid, birthdate";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
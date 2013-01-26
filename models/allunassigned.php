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
class muusla_reportsModelallunassigned extends JModel
{   
   function getCampers() {
      $db =& JFactory::getDBO();
      $query = "SELECT mc.firstname, mc.lastname, mc.programname, mc.familyid FROM muusa_campers_v mc WHERE mc.roomid=0";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
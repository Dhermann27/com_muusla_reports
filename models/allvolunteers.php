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
class muusla_reportsModelallvolunteers extends JModel
{
   function getCampers() {
      $db =& JFactory::getDBO();
      $query = "SELECT mc.camperid, CONCAT(mc.lastname, ', ', mc.firstname) fullname, mc.name name, me.email FROM muusa_volunteers_v mc, muusa_campers me WHERE mc.camperid=me.camperid ORDER by mc.name, mc.lastname, mc.firstname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
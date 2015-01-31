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
class muusla_reportsModelallvolunteers extends JModelItem
{
   function getPositions() {
      $db = JFactory::getDBO();
      $query = "SELECT id, name FROM muusa_volunteerposition ORDER BY name";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function getCampers($id) {
      $db = JFactory::getDBO();
      $query = "SELECT familyid, firstname, lastname, email FROM muusa_thisyear_volunteer WHERE volunteerpositionid=$id ORDER BY lastname, firstname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
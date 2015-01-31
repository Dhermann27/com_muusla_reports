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
class muusla_reportsModelallunassigned extends JModelItem
{
   function getCampers() {
      $db = JFactory::getDBO();
      $query = "SELECT familyid, firstname, lastname, familyname, programname FROM muusa_thisyear_camper WHERE roomid=0 ORDER BY familyname, birthdate";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
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
      $query = "SELECT id, name, city, statecd FROM muusa_thisyear_family $order";
      $db->setQuery($query);
      return $db->loadAssocList("id");
   }

   function getChildren() {
      $db =& JFactory::getDBO();
      $query = "SELECT tc.id, tc.familyid, tc.firstname, tc.lastname, tc.programname, DATE_FORMAT(tc.birthdate, '%m/%d/%Y') birthdate, tc.roomnbr FROM muusa_thisyear_camper tc ORDER BY tc.birthdate";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
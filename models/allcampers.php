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
      $query = "SELECT tf.id, tf.name, tf.city, tf.statecd FROM muusa_thisyear_family tf, muusa_year y WHERE y.is_current=1 $order";
      $db->setQuery($query);
      return $db->loadAssocList("id");
   }

   function getChildren() {
      $db =& JFactory::getDBO();
      $query = "SELECT id, familyid, firstname, lastname, programname, birthday, roomnbr, paydate FROM muusa_thisyear_camper ORDER BY birthdate";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
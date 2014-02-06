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
      $query = "SELECT tf.id, tf.name, tf.city, tf.statecd, muusa_getpaydate(tf.id, y.year) paydate FROM muusa_thisyear_family tf, muusa_year y WHERE y.is_current=1 $order";
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
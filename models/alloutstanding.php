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
class muusla_reportsModelalloutstanding extends JModelItem
{
   function getFamilies() {
      $db = JFactory::getDBO();
      $query = "SELECT f.id, f.name, SUM(th.amount) amount FROM muusa_family f, muusa_thisyear_charge th WHERE f.id=th.familyid GROUP BY f.id HAVING SUM(th.amount)!=0.0 ORDER BY f.name, f.statecd, f.city";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function getChargetypes() {
      $db = JFactory::getDBO();
      $query = "SELECT id, name FROM muusa_chargetype WHERE is_shown=1 ORDER BY name";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function getYear() {
      $db = JFactory::getDBO();
      $query = "SELECT year FROM muusa_year WHERE is_current=1";
      $db->setQuery($query);
      return $db->loadResult();
   }

   function upsertCharge($obj) {
      $db = JFactory::getDBO();
      $user = JFactory::getUser();
      $obj->camperid = "&&(SELECT c.id FROM muusa_camper c WHERE c.familyid=$obj->familyid ORDER BY c.birthdate LIMIT 0,1)";
      unset($obj->familyid);
      $obj->timestamp = date("Y-m-d");
      $db->insertObject("muusa_charge", $obj);
      if($db->getErrorNum()) {
         JError::raiseError(500, $db->stderr());
      }
   }
}
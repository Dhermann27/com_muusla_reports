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
class muusla_reportsModelalldeposits extends JModelItem
{
   function getCharges($types) {
      $db = JFactory::getDBO();
      $query = "SELECT f.name, th.camperid, th.amount, th.memo FROM muusa_family f, muusa_thisyear_charge th WHERE f.id=th.familyid AND th.is_deposited IS NULL AND th.chargetypeid IN ($types) ORDER BY f.name";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function setCharges($types) {
      $db = JFactory::getDBO();
      $user = JFactory::getUser();
      $query = "UPDATE muusa_charge SET is_deposited=CURRENT_DATE, created_by='$user->username' WHERE is_deposited IS NULL AND chargetypeid IN ($types) AND year=(SELECT year FROM muusa_year WHERE is_current=1)";
      $db->setQuery($query);
      $db->query();
      return;
   }
}

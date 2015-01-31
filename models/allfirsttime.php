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
class muusla_reportsModelallfirsttime extends JModelItem
{
   function getCampers() {
      $db = JFactory::getDBO();
      $query = "SELECT bc.id, bc.familyid, bc.familyname, bc.firstname, bc.lastname, bc.email FROM muusa_byyear_camper bc, muusa_year y WHERE bc.year=y.year AND y.is_current=1 AND (SELECT COUNT(*) FROM muusa_yearattending ya WHERE ya.year<y.year AND bc.id=ya.camperid)=0 ORDER BY bc.familyname, bc.birthdate";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
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
class muusla_reportsModelallstates extends JModelItem
{   
   function getChurches() {
      $db = JFactory::getDBO();
      $query = "SELECT year, statecd, IFNULL(churchname, 'No Affiliation') churchname, churchcity, COUNT(*) count FROM muusa_byyear_camper WHERE year>2008 GROUP BY year, statecd, churchid ORDER BY year, statecd, count DESC";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
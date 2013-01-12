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
class muusla_reportsModelallprograms extends JModel
{
   function getCampers() {
      $db =& JFactory::getDBO();
      $query = "SELECT mc.camperid camperid, mc.sexcd, CONCAT(mc.lastname, ', ', mc.firstname) fullname, mc.programid, muusa_age_f(DATE_FORMAT(mc.birthdate, '%m/%d/%Y')) age, mc.gradeoffset, CONCAT(mp.lastname, ', ', mp.firstname) parent, mc.sponsor sponsor, mc.email email FROM (muusa_campers mc, muusa_fiscalyear mf, muusa_currentyear my) LEFT JOIN (muusa_campers mp, muusa_fiscalyear mo) ON mp.camperid=mc.hohid AND mp.camperid=mo.camperid AND mo.fiscalyear=my.year WHERE mc.camperid=mf.camperid AND mf.fiscalyear=my.year AND mc.programid!=1000 ORDER BY mc.lastname, mc.firstname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
   
   function getPrograms() {
      $db =& JFactory::getDBO();
      $query = "SELECT programid, name FROM muusa_programs WHERE name!='Adult' ORDER BY name";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
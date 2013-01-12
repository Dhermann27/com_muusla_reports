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
class muusla_reportsModelallunassigned extends JModel
{   
   function getCampers() {
      $db =& JFactory::getDBO();
      $query = "SELECT CONCAT(mc.lastname, ', ', mc.firstname) fullname, mp.name programname, mf.postmark postmark, mc.camperid camperid FROM muusa_campers mc, muusa_programs mp, muusa_fiscalyear mf WHERE mc.camperid=mf.camperid AND mc.programid=mp.programid AND mf.fiscalyear=2009 AND mf.roomid=0 ORDER BY mc.lastname, mc.firstname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}
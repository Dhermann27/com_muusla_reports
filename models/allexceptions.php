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
class muusla_reportsModelallexceptions extends JModel
{
   function getOrphanFamily() {
      $db =& JFactory::getDBO();
      $query = "SELECT mf.familyid, mf.familyname, mf.city, mf.statecd FROM muusa_family mf WHERE (SELECT COUNT(*) FROM muusa_campers mc WHERE mf.familyid=mc.familyid)=0 ORDER BY mf.familyname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function getOrphans() {
      $db =& JFactory::getDBO();
      $query = "SELECT mc.camperid, CONCAT(mc.lastname, ', ', mc.firstname) fullname FROM muusa_campers mc WHERE (SELECT COUNT(*) FROM muusa_family mf WHERE mf.familyid=mc.familyid)=0 ORDER BY mc.lastname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function getDuplicateCampers() {
      $db =& JFactory::getDBO();
      $query = "SELECT mc.camperid oldid, (SELECT COUNT(*) FROM muusa_charges_v WHERE camperid=mc.camperid) numcharges, md.camperid newid, (SELECT COUNT(*) FROM muusa_charges_v WHERE camperid=md.camperid) numdharges, CONCAT(mc.lastname, ', ', mc.firstname) fullname FROM muusa_campers mc, muusa_campers md WHERE mc.camperid!=md.camperid AND mc.firstname=md.firstname AND mc.lastname=md.lastname ORDER BY mc.lastname, mc.firstname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function dupe($id) {
      $db =& JFactory::getDBO();
      $query = "CALL muusa_duplicate_p($id)";
      $db->setQuery($query);
      $db->query();
      if($db->getErrorNum()) {
         JError::raiseError(500, $db->stderr());
      }
   }
}
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
class muusla_reportsModelallexceptions extends JModelItem
{
   function getOrphanFamily() {
      $db = JFactory::getDBO();
      $query = "SELECT mf.familyid, mf.familyname, mf.city, mf.statecd FROM muusa_family mf WHERE (SELECT COUNT(*) FROM muusa_campers mc WHERE mf.familyid=mc.familyid)=0 ORDER BY mf.familyname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function getOrphans() {
      $db = JFactory::getDBO();
      $query = "SELECT mc.camperid, CONCAT(mc.lastname, ', ', mc.firstname) fullname FROM muusa_campers mc WHERE (SELECT COUNT(*) FROM muusa_family mf WHERE mf.familyid=mc.familyid)=0 ORDER BY mc.lastname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function getDuplicateCampers() {
      $db = JFactory::getDBO();
      $query = "SELECT c.id oldid, (SELECT COUNT(*) FROM muusa_charge h, muusa_year y WHERE h.camperid=c.id AND h.year=y.year AND y.is_current=1) numcharges, cp.id newid, (SELECT COUNT(*) FROM muusa_charge hp, muusa_year yp WHERE hp.camperid=cp.id AND hp.year=yp.year AND yp.is_current=1) numdharges, CONCAT(c.lastname, ', ', c.firstname) fullname FROM muusa_camper c, muusa_camper cp WHERE c.id!=cp.id AND c.firstname=cp.firstname AND c.lastname=cp.lastname ORDER BY c.lastname, c.firstname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function dupe($id) {
      $db = JFactory::getDBO();
      $query = "CALL muusa_duplicate_p($id)";
      $db->setQuery($query);
      $db->query();
      if($db->getErrorNum()) {
         JError::raiseError(500, $db->stderr());
      }
   }
}
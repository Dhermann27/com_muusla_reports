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
class muusla_reportsModelallworkshops extends JModel
{
   function getWorkshops() {
      $db =& JFactory::getDBO();
      $query = "SELECT w.id, CONCAT(w.su, w.m, w.t, w.w, w.th, w.f, w.sa) days, CONCAT(IF(w.su,'S',''),IF(w.m,'M',''),IF(w.t,'Tu',''),IF(w.w,'W',''),IF(w.th,'Th',''),IF(w.f,'F',''),IF(w.sa,'S','')) dispdays, CONCAT(b.name, ' ', r.roomnbr) roomname, t.name timename, w.name workshopname, w.capacity, t.starttime FROM (muusa_workshop w, muusa_timeslot t) LEFT JOIN (muusa_building b, muusa_room r) ON w.roomid=r.id AND r.buildingid=b.id WHERE w.timeslotid=t.id ORDER by t.starttime, w.name";
      $db->setQuery($query);
      return $db->loadAssocList("id");
   }

   function getAttendees() {
      $db =& JFactory::getDBO();
      $query = "SELECT yw.workshopid, c.familyid, c.id, c.firstname, c.lastname, yw.choicenbr, yw.is_leader, c.email FROM muusa_yearattending__workshop yw, muusa_yearattending ya, muusa_camper c, muusa_year y WHERE yw.yearattendingid=ya.id AND ya.camperid=c.id AND ya.year=y.year AND y.is_current=1 ORDER BY yw.is_leader DESC, IFNULL(ya.paydate, NOW()), yw.choicenbr";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function updateWorkshop($id, $enrolled) {
      $db =& JFactory::getDBO();
      $obj = new stdClass;
      $obj->id = $id;
      $obj->enrolled = $enrolled;
      $obj->created_by = "workshops";
      $db->updateObject("muusa_workshop", $obj, "id");
   }
}
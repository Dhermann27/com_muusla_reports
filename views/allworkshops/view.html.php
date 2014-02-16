<?php
/**
 * @package		muusla_reports
 * @license		GNU/GPL, see LICENSE.php
 */

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the muusla_reports Component
 *
 * @package		muusla_reports
 */
class muusla_reportsViewallworkshops extends JView
{
   function display($tpl = null) {
      $model =& $this->getModel();
      $workshops = $model->getWorkshops();
      $found[][] = array();
      foreach($model->getAttendees() as $attendee) {
         if($this->noConflict($found[$workshops[$attendee->workshopid]["starttime"]][$attendee->id], $workshops[$attendee->workshopid]["days"])) {
            if($workshops[$attendee->workshopid]["attendees"] == null) {
               $workshops[$attendee->workshopid]["attendees"] = array($attendee);
               $found[$workshops[$attendee->workshopid]["starttime"]][$attendee->id] = $this->orDays($found[$workshops[$attendee->workshopid]["starttime"]][$attendee->id], $workshops[$attendee->workshopid]["days"]);
            } elseif ($workshops[$attendee->workshopid]["capacity"] == 0 || count($workshops[$attendee->workshopid]["attendees"]) < $workshops[$attendee->workshopid]["capacity"]) {
               array_push($workshops[$attendee->workshopid]["attendees"], $attendee);
               $found[$workshops[$attendee->workshopid]["starttime"]][$attendee->id] = $this->orDays($found[$workshops[$attendee->workshopid]["starttime"]][$attendee->id], $workshops[$attendee->workshopid]["days"]);
            } elseif($workshops[$attendee->workshopid]["waitlist"] == null) {
               $workshops[$attendee->workshopid]["waitlist"] = array($attendee->firstname . " " . $attendee->lastname);
            } else {
               array_push($workshops[$attendee->workshopid]["waitlist"], $attendee->firstname . " " . $attendee->lastname);
            }
         }
      }
      foreach($workshops as $workshop) {
         $model->updateWorkshop($workshop["id"], count($workshop["attendees"]));
      }
      $this->assignRef("workshops", $workshops);

      parent::display($tpl);
   }

   function noConflict($a, $b) {
      for($i=0; $i<7; $i++) {
         if($a[$i] == "1" && $b[$i] == "1") return false;
      }
      return true;
   }

   function orDays($a, $b) {
      $ret = "";
      for($i=0; $i<7; $i++) {
         $ret .= ($a[$i] == "1" || $b[$i] == "1") ? "1" : "0";
      }
      return $ret;
   }

}
?>

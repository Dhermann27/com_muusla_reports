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
			if($this->noConflict($found[$workshops[$attendee->eventid]["starttime"]][$attendee->camperid], $workshops[$attendee->eventid]["days"])) {
				if($workshops[$attendee->eventid]["attendees"] == null) {
					$workshops[$attendee->eventid]["attendees"] = array($attendee);
					$found[$workshops[$attendee->eventid]["starttime"]][$attendee->camperid] = $this->orDays($found[$workshops[$attendee->eventid]["starttime"]][$attendee->camperid], $workshops[$attendee->eventid]["days"]);
				} elseif ($workshops[$attendee->eventid]["capacity"] == 0 || count($workshops[$attendee->eventid]["attendees"]) < $workshops[$attendee->eventid]["capacity"]) {
					array_push($workshops[$attendee->eventid]["attendees"], $attendee);
					$found[$workshops[$attendee->eventid]["starttime"]][$attendee->camperid] = $this->orDays($found[$workshops[$attendee->eventid]["starttime"]][$attendee->camperid], $workshops[$attendee->eventid]["days"]);
				} elseif($workshops[$attendee->eventid]["waitlist"] == null) {
					$workshops[$attendee->eventid]["waitlist"] = array($attendee);
				} else {
					array_push($workshops[$attendee->eventid]["waitlist"], $attendee);
				}
			}
		}
		$this->assignRef('workshops', $workshops);

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

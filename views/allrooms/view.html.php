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
class muusla_reportsViewallrooms extends JView
{
   function display($tpl = null) {
      $model =& $this->getModel();
      $years = $model->getYears();
      foreach($years as $year) {
         $year->buildings = $model->getBuildings();
         foreach($model->getRooms() as $room) {
            $room->campers = array();
            if($year->buildings[$room->buildingid]["name"] == "") {
               $year->buildings[$room->buildingid]["name"] = "Unknown";
            }
            $year->buildings[$room->buildingid]["rooms"][$room->roomid] = $room;
         }
         foreach($model->getCampers($year->year) as $camper) {
            $year->buildings[$camper->buildingid]["count"]++;
            array_push($year->buildings[$camper->buildingid]["rooms"][$camper->roomid]->campers, $camper);
         }
      }
      $this->assignRef('years', $years);

      parent::display($tpl);
   }

}
?>

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
      $buildings = $model->getBuildings();
      foreach($model->getRooms() as $room) {
         $room->campers = array();
         $buildings[$room->buildingid]["rooms"][$room->roomid] = $room;
      }
      foreach($model->getCampers() as $camper) {
         array_push($buildings[$camper->buildingid]["rooms"][$camper->roomid]->campers, $camper);
      }
      $this->assignRef('buildings', $buildings);

      parent::display($tpl);
   }

}
?>

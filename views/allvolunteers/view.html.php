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
class muusla_reportsViewallvolunteers extends JView
{
   function display($tpl = null) {
      $model =& $this->getModel();
      $positions = $model->getPositions();
      if(count($positions) > 0) {
         foreach($positions as $position) {
            $position->campers = $model->getCampers($position->id);
            if(count($position->campers)>0) {
               $emails = array();
               foreach ($position->campers as $camper)
                  if($camper->email != "") {
                  array_push($emails, $camper->email);
               }
               $position->emails = implode("; ", $emails);
            }
         }
      }
      $this->assignRef('positions', $positions);

      parent::display($tpl);
   }

}
?>

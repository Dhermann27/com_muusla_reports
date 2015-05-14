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
class muusla_reportsViewallstates extends JViewLegacy
{
   function display($tpl = null) {
      $model = $this->getModel();
      $years = array();
      foreach($model->getChurches() as $church) {
         if(!isset($years[$church->year])) {
            $years[$church->year] = array();
         }
         if(!isset($years[$church->year][$church->statecd])) {
            $years[$church->year][$church->statecd] = new stdClass;
            $years[$church->year][$church->statecd]->count = 0;
            $years[$church->year][$church->statecd]->churches = array();
         }
         $years[$church->year][$church->statecd]->count += $church->count;
         array_push($years[$church->year][$church->statecd]->churches, $church);
      }
      $this->assignRef('years', $years);

      parent::display($tpl);
   }

}
?>

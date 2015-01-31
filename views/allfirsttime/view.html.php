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
class muusla_reportsViewallfirsttime extends JViewLegacy
{
   function display($tpl = null) {
      $model = $this->getModel();
      $campers = $model->getCampers();
      $emails = array();
      if(count($campers) > 0) {
         foreach($campers as $camper) {
            if($camper->email != "") {
               array_push($emails, $camper->email);
            }
         }
      }
      $this->assignRef('campers', $campers);
      $this->assignRef('emails', implode("; ", $emails));

      parent::display($tpl);
   }

}
?>

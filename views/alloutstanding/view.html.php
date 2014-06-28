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
class muusla_reportsViewalloutstanding extends JView
{
   function display($tpl = null) {
      $model =& $this->getModel();
      $user =& JFactory::getUser();
      $calls[][] = array();
      foreach(JRequest::get() as $key=>$value) {
         if(preg_match('/^(\w+)-(\w+)-(\d+)$/', $key, $objects)) {
            $table = $this->getSafe($objects[1]);
            $column = $this->getSafe($objects[2]);
            $id = $this->getSafe($objects[3]);
            if($calls[$table][$id] == null) {
               $obj = new stdClass;
               $obj->created_by = $user->username;
               $calls[$table][$id] = $obj;
            }
            $calls[$table][$id]->$column = $this->getSafe($value);
         }
      }

      if((in_array("8", $user->groups) || in_array("10", $user->groups)) && count($calls["charge"]) > 0) {
         foreach($calls["charge"] as $charge) {
            if($charge->amount != 0) {
               $model->upsertCharge($charge);
            }
         }
      }
      $this->assignRef('families', $model->getFamilies());
      $this->assignRef('chargetypes', $model->getChargetypes());
      $this->assignRef('year', $model->getYear());
      parent::display($tpl);
   }

   function getSafe($obj)
   {
      return htmlspecialchars(trim($obj), ENT_QUOTES);
   }

}
?>

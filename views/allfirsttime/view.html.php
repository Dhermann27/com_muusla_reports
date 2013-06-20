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
class muusla_reportsViewallfirsttime extends JView
{
   function display($tpl = null) {
      $model =& $this->getModel();
      $campers = $model->getCampers();
      $children = $model->getChildren(999, "0");
      $camperids = array();
      $firstemails = array();
      if(count($children) > 0) {
         foreach($children as $child) {
            array_push($camperids, $child->camperid);
            if($campers[$child->familyid]["children"] == null) {
               $campers[$child->familyid]["children"] = array($child);
            } else {
               array_push($campers[$child->familyid]["children"], $child);
            }
            if($child->email != "") {
               array_push($firstemails, $child->email);
            }
         }
      }
      $tfirstemails = array();
      $tchildren = $model->getChildren(3, implode(",", $camperids));
      if(count($tchildren) > 0) {
         foreach($tchildren as $child) {
            if($campers[$child->familyid]["tchildren"] == null) {
               $campers[$child->familyid]["tchildren"] = array($child);
            } else {
               array_push($campers[$child->familyid]["tchildren"], $child);
            }
         }
         if($child->email != "") {
            array_push($tfirstemails, $child->email);
         }
      }
      $this->assignRef('campers', $campers);
      $this->assignRef('firstemails', implode("; ", $firstemails));
      $this->assignRef('tfirstemails', implode("; ", $tfirstemails));

      parent::display($tpl);
   }

}
?>

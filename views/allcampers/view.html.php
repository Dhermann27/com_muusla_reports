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
class muusla_reportsViewallcampers extends JView
{
   function display($tpl = null) {
      $model =& $this->getModel();
      $campers = $model->getCampers($this->getSafe("sort") == "1" ? "ORDER BY paydate DESC" : "ORDER BY name");
      foreach($model->getChildren() as $child) {
         if($campers[$child->familyid]["children"] == null) {
            $campers[$child->familyid]["paydate"] = $child->paydate;
            $campers[$child->familyid]["children"] = array($child);
         } else {
            array_push($campers[$child->familyid]["children"], $child);
         }
      }
      $this->assignRef('sort', $this->getSafe("sort"));
      $this->assignRef('campers', $campers);

      parent::display($tpl);
   }

   function getSafe($obj)
   {
      return htmlspecialchars(trim(JRequest::getVar($obj)), ENT_QUOTES);
   }

}
?>

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
class muusla_reportsViewalldeposits extends JViewLegacy
{
   function display($tpl = null) {
      $model = $this->getModel();
      $user = JFactory::getUser();
      if(in_array("8", $user->groups) || in_array("10", $user->groups)) {
         if($this->getSafe("paypals") == "1") {
            $model->setCharges("1005");
         }
         if($this->getSafe("checks") == "1") {
            $model->setCharges("1001,1006");
         }
         if($this->getSafe("creditcards") == "1") {
            $model->setCharges("1007,1016");
         }
         if($this->getSafe("cash") == "1") {
            $model->setCharges("1017");
         }
      }
      $this->assignRef('paypals', $model->getCharges("1005"));
      $this->assignRef('checks', $model->getCharges("1001,1006"));
      $this->assignRef('creditcards', $model->getCharges("1007,1016"));
      $this->assignRef('cash', $model->getCharges("1017"));
       

      parent::display($tpl);
   }

   function getSafe($obj)
   {
      return htmlspecialchars(trim(JRequest::getVar($obj)), ENT_QUOTES);
   }

}
?>

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
class muusla_reportsViewallexceptions extends JView
{
   function display($tpl = null) {
      $model =& $this->getModel();
      $user =& JFactory::getUser();
      $ids = JRequest::getVar($this->getSafe("id"));
      if($ids && in_array("8", $user->groups)) {
         $model->dupe($ids);
      }
      $this->assignRef('family', $model->getOrphanFamily());
      $this->assignRef('orphans', $model->getOrphans());
      $this->assignRef('registrationFees', $model->getRegistrationFees());
      $this->assignRef('housingFees', $model->getHousingFees());
      $this->assignRef('programs', $model->getProgramFees());
      $this->assignRef('rateFees', $model->getRateFees());
      $this->assignRef('dupeCampers', $model->getDuplicateCampers());

      parent::display($tpl);
   }
    
   function getSafe($obj)
   {
      return htmlspecialchars(trim($obj), ENT_QUOTES);
   }

}
?>

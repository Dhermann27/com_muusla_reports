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
      $this->assignRef('registrationFees', $model->getRegistrationFees());
      $this->assignRef('housingFees', $model->getHousingFees());
      $this->assignRef('programs', $model->getPrograms());
      $this->assignRef('programFees', $model->getProgramFees());
      $this->assignRef('rateFees', $model->getRateFees());
      $this->assignRef('dupeCampers', $model->getDuplicateCampers());

      parent::display($tpl);
   }

}
?>

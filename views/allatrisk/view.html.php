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
class muusla_reportsViewallatrisk extends JView
{
   function display($tpl = null) {
      $model =& $this->getModel();
      $this->assignRef('unreg', $model->getUnregcampers());
      $this->assignRef('unass', $model->getUnasscampers());
      $this->assignRef('lost', $model->getLostcampers());

      parent::display($tpl);
   }

}
?>

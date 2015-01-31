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
class muusla_reportsViewallemptys extends JViewLegacy
{
   function display($tpl = null) {
      $model = $this->getModel();
      $this->assignRef('rooms', $model->getRooms());

      parent::display($tpl);
   }

}
?>

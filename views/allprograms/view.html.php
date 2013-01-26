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
class muusla_reportsViewallprograms extends JView
{
	function display($tpl = null) {
		$model =& $this->getModel();
		$this->assignRef('campers', $model->getCampers());
		$this->assignRef('programs', $model->getPrograms());

		parent::display($tpl);
	}

}
?>

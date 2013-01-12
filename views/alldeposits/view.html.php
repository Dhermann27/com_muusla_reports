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
class muusla_reportsViewalldeposits extends JView
{
	function display($tpl = null) {
		$model =& $this->getModel();
		if(JRequest::getSafe("paypals") == "1") {
			$model->setCharges("1005");
		}
		if(JRequest::getSafe("checks") == "1") {
			$model->setCharges("1001,1006");
		}
		if(JRequest::getSafe("creditcards") == "1") {
			$model->setCharges("1007,1016");
		}
		if(JRequest::getSafe("cash") == "1") {
			$model->setCharges("1017");
		}
		$this->assignRef('paypals', $model->getCharges("1005"));
		$this->assignRef('checks', $model->getCharges("1001,1006"));
		$this->assignRef('creditcards', $model->getCharges("1007,1016"));
		$this->assignRef('cash', $model->getCharges("1017"));
			

		parent::display($tpl);
	}

}
?>

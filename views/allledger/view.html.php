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
class muusla_reportsViewallledger extends JView
{
	function display($tpl = null) {
		$model =& $this->getModel();
 		$this->assignRef('carry', $model->getCarries());
 		$this->assignRef('preregs', $model->getPreregs());
 		$this->assignRef('registrationFees', $model->getRegistrationFees());
 		$this->assignRef('registration', $model->getRegistration());
 		$this->assignRef('regbd', $model->getRegistrationBreakdown());
 		$this->assignRef('pollyReg', $model->getPollyRegistration());
 		$this->assignRef('housingFees', $model->getHousingFees());
 		$this->assignRef('payments', $model->getAllPayments());
 		$this->assignRef('depositspp', $model->getAllDeposits("1005"));
 		$this->assignRef('depositschk', $model->getAllDeposits("1001,1006"));
 		$this->assignRef('depositscc', $model->getAllDeposits("1007,1016"));
 		$this->assignRef('depositscash', $model->getAllDeposits("1017"));
 		$this->assignRef('housebd', $model->getHousingBreakdown());
 		$this->assignRef('pollyHouse', $model->getPollyHousing());
 		$this->assignRef('latefees', $model->getLatefees());
 		$this->assignRef('donations', $model->getDonations());
 		$this->assignRef('scholarships', $model->getScholarships());
 		$this->assignRef('yscholarships', $model->getYScholarships());
 		$this->assignRef('campers', $model->getCampers());
		parent::display($tpl);
	}

}
?>

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
class muusla_reportsViewalloutstanding extends JView
{
	function display($tpl = null) {
		$model =& $this->getModel();
		$campers = $model->getCampers();
		foreach($model->getCharges() as $charge) {
			$campers[$charge->familyid]["totallater"] += (float)preg_replace("/,/", "",  $charge->amount);
			if($charge->chargetypeid != 1000 && $charge->chargetypeid != 1011) {
				$campers[$charge->familyid]["totalnow"] += (float)preg_replace("/,/", "",  $charge->amount);
			}
		}
		foreach($model->getCredits() as $credit) {
			$chargeid = $credit->camperid;
			if($credit->hohid != 0) {
				$chargeid = $credit->hohid;
			}
			$campers[$chargeid]["totalnow"] -= (float)preg_replace("/,/", "",  $credit->registration_amount+$credit->housing_amount);
			$campers[$chargeid]["totallater"] -= (float)preg_replace("/,/", "",  $credit->registration_amount+$credit->housing_amount);
		}
		$this->assignRef('charges', $campers);

		parent::display($tpl);
	}

}
?>

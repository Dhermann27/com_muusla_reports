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
class muusla_reportsViewallfirsttime extends JView
{
	function display($tpl = null) {
		$model =& $this->getModel();
		$campers = $model->getCampers(999);
		$children = $model->getChildren(999);
		if(count($children) > 0) {
			foreach($children as $child) {
				if($campers[$child->hohid]["children"] == null) {
					$campers[$child->hohid]["children"] = array($child);
				} else {
					array_push($campers[$child->hohid]["children"], $child);
				}
			}
		}
		$this->assignRef('campers', $campers);
		$tcampers = $model->getCampers(3);
		$tchildren = $model->getChildren(3);
		if(count($tchildren) > 0) {
			foreach($tchildren as $child) {
				if($tcampers[$child->hohid]["children"] == null) {
					$tcampers[$child->hohid]["children"] = array($child);
				} else {
					array_push($tcampers[$child->hohid]["children"], $child);
				}
			}
		}
		$this->assignRef('tcampers', $tcampers);

		parent::display($tpl);
	}

}
?>

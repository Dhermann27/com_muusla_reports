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
class muusla_reportsViewallregchart extends JView
{
   function display($tpl = null) {
      $model =& $this->getModel();
      $years[]= array();
      foreach($model->getData() as $date) {
      	if($years[$date->fiscalyear] == null) {
      		$years[$date->fiscalyear] = array($date);
      	} else {
      		array_push($years[$date->fiscalyear], $date);
      	}
      }
      unset($years[0]);
      $this->assignRef('years', $years);
      $this->assignRef('dates', $model->getDates());
      $this->assignRef('table', $model->getTable());

      parent::display($tpl);
   }

}
?>

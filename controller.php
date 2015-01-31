<?php
/**
 * @package		muusla_reports
 * @license		GNU/GPL, see LICENSE.php
 */

jimport('joomla.application.component.controller');

/**
 * muusla_reports Component Controller
 *
 * @package		muusla_reports
 */
class muusla_reportsController extends JControllerLegacy
{
   function save()
   {
      $this->muuslaControl('default', 'save');
   }

   function detail()
   {
      $this->muuslaControl('workshop', 'detail');
   }

   function payment()
   {
      $this->muuslaControl('payment', 'payment');
   }

}
?>

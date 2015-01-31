<?php
/**
 * muusla_reports Model for muusla_reports Component
 *
 * @package    muusla_reports
 * @subpackage Components
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
jimport( 'joomla.application.component.model' );
/**
 * muusla_reports Model
 *
 * @package    muusla_reports
 * @subpackage Components
 */
class muusla_reportsModelallregchart extends JModelItem
{
   function getDates() {
      $db = JFactory::getDBO();
      $query = "SELECT RIGHT(date,5) FROM muusa_staticdate ORDER BY RIGHT(date,5)";
      $db->setQuery($query);
      return $db->loadResultArray();
   }

   function getData() {
      $db = JFactory::getDBO();
      $query = "SELECT ya.year, RIGHT(ya.postmark,5) date, (SELECT COUNT(*) FROM muusa_yearattending yap WHERE yap.year=ya.year AND RIGHT(yap.postmark, 5)<=RIGHT(ya.postmark, 5)) count FROM muusa_yearattending ya WHERE ya.year>2008 GROUP BY ya.postmark ORDER BY ya.postmark";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function getTable() {
      $db = JFactory::getDBO();
      $query = "SELECT ya.year, COUNT(*) total, SUM(IF((SELECT COUNT(*) FROM muusa_yearattending yap WHERE ya.year>yap.year AND c.id=yap.camperid)=0, 1, 0)) newcampers, SUM(IF((SELECT COUNT(*) FROM muusa_yearattending yap WHERE ya.year-1=yap.year AND c.id=yap.camperid)=0 AND (SELECT COUNT(*) FROM muusa_yearattending yap WHERE ya.year-2=yap.year AND c.id=yap.camperid)=1,1,0)) oldcampers, SUM(IF((SELECT COUNT(*) FROM muusa_yearattending yap WHERE ya.year-3<yap.year AND yap.year<ya.year AND c.id=yap.camperid)=0 AND (SELECT COUNT(*) FROM muusa_yearattending yap WHERE ya.year-3>=yap.year AND c.id=yap.camperid)>0,1,0)) voldcampers, (SELECT COUNT(*) FROM muusa_yearattending yap WHERE ya.year-1=yap.year AND (SELECT COUNT(*) FROM muusa_yearattending yaq WHERE ya.year=yaq.year AND yap.camperid=yaq.camperid)=0) lostcampers FROM muusa_camper c, muusa_yearattending ya WHERE c.id=ya.camperid AND ya.year>2008 GROUP BY ya.year ORDER BY ya.year";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}

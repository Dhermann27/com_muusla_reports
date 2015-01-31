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
class muusla_reportsModelallledger extends JModelItem
{
   function getCarries() {
      $db = JFactory::getDBO();
      $query = "SELECT mc.camperid camperid, CONCAT(mc.firstname, ' ', mc.lastname) fullname, ABS(mr.amount) amount FROM muusa_campers mc, muusa_charges mr, muusa_currentyear my WHERE mc.camperid=mr.camperid AND mr.chargetypeid=1009 AND mr.fiscalyear=my.year ORDER BY mc.lastname, mc.firstname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function getPreregs() {
      $db = JFactory::getDBO();
      $query = "SELECT mc.camperid camperid, CONCAT(mc.firstname, ' ', mc.lastname) fullname, ABS(mr.amount) amount FROM muusa_campers mc, muusa_charges mr, muusa_currentyear my WHERE mc.camperid=mr.camperid AND mr.chargetypeid IN (1001,1016) AND mr.fiscalyear=my.year ORDER BY mc.lastname, mc.firstname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function getRegistrationFees() {
      $db = JFactory::getDBO();
      $query = "SELECT SUM(mr.amount) charges FROM muusa_charges_v mr WHERE mr.chargetypeid=1003";
      $db->setQuery($query);
      return $db->loadResult();
   }

   function getRegistration() {
      $db = JFactory::getDBO();
      $query = "SELECT SUM(sub.balance) balances, SUM(sub.credit) credits, SUM((SELECT IF(ABS(SUM(ms.amount))>(sub.balance-sub.credit),(sub.balance-sub.credit),ABS(SUM(ms.amount))) FROM muusa_charges_v ms WHERE ms.is_deposited IS NOT NULL AND ms.camperid=sub.familyid AND ms.chargetypeid IN (1001,1005,1006,1007,1009,1016))) payments FROM (SELECT mg.familyid, SUM(mg.amount) balance, IFNULL(SUM((SELECT mv.registration_amount FROM muusa_credits_v mv WHERE mg.camperid=mv.camperid)),0) credit FROM muusa_charges_v mg WHERE mg.chargetypeid=1003 GROUP BY mg.familyid) sub";
      $db->setQuery($query);
      return $db->loadRow();
   }

   function getRegistrationBreakdown() {
      $db = JFactory::getDBO();
      $query = "SELECT mp.registration_amount amount, mg.programid programid, mg.name programname, CONCAT(mp.firstname, ' ', mp.lastname) fullname, mp.positionname FROM muusa_credits_v mp, muusa_programs mg WHERE mp.programid=mg.programid AND mp.registration_amount>0 AND mp.positionname NOT LIKE 'Polly%' ORDER BY mg.name, mp.lastname, mp.firstname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function getPollyRegistration() {
      $db = JFactory::getDBO();
      $query = "SELECT mp.registration_amount amount, CONCAT(mp.firstname, ' ', mp.lastname) fullname FROM muusa_credits_v mp WHERE mp.positionname LIKE 'Polly%' ORDER BY mp.lastname, mp.firstname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function getHousingFees() {
      $db = JFactory::getDBO();
      $query = "SELECT SUM(mr.amount) charges FROM muusa_charges_v mr WHERE mr.chargetypeid=1000";
      $db->setQuery($query);
      return $db->loadResult();
   }

   function getAllPayments() {
      $db = JFactory::getDBO();
      $query = "SELECT SUM(mr.amount) charges FROM muusa_charges mr, muusa_currentyear my WHERE mr.chargetypeid IN (1001, 1005, 1006, 1007, 1009, 1016) AND mr.fiscalyear=my.year";
      $db->setQuery($query);
      return $db->loadResult();
   }

   function getAllDeposits($id) {
      $db = JFactory::getDBO();
      $query = "SELECT CONCAT(mc.firstname, ' ', mc.lastname) fullname, ABS(mr.amount) amount, mr.chargetypeid, IFNULL(mr.is_deposited,'Undeposited') deposited FROM muusa_campers mc, muusa_charges mr, muusa_currentyear my  WHERE mc.camperid=mr.camperid AND mr.fiscalyear=my.year AND mr.chargetypeid IN ($id) ORDER BY mr.is_deposited, mc.lastname, mc.firstname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function getHousingBreakdown() {
      $db = JFactory::getDBO();
      $query = "SELECT mp.housing_amount amount, mg.programid programid, mg.name programname, CONCAT(mp.firstname, ' ', mp.lastname) fullname, mp.positionname positionname FROM muusa_credits_v mp, muusa_programs mg WHERE mp.programid=mg.programid AND mp.housing_amount>0 AND mp.positionname NOT LIKE 'Polly%' ORDER BY mg.name, mp.lastname, mp.firstname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function getPollyHousing() {
      $db = JFactory::getDBO();
      $query = "SELECT IFNULL(SUM(sub.amount),0) FROM (SELECT mp.housing_amount amount FROM muusa_credits_v mp WHERE mp.positionname LIKE 'Polly%') sub ";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function getLatefees() {
      $db = JFactory::getDBO();
      $query = "SELECT SUM(mr.amount) FROM muusa_charges_v mr WHERE mr.chargetypeid=1012";
      $db->setQuery($query);
      return $db->loadResult();
   }

   function getDonations() {
      $db = JFactory::getDBO();
      $query = "SELECT SUM(mr.amount) FROM muusa_charges_v mr WHERE mr.chargetypeid=1008";
      $db->setQuery($query);
      return $db->loadResult();
   }

   function getScholarships() {
      $db = JFactory::getDBO();
      $query = "SELECT CONCAT(firstname, ' ', lastname) fullname, ABS(housing_amount+registration_amount) amount FROM muusa_scholarships_v WHERE name='MUUSA Scholarship' ORDER BY lastname, firstname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function getYScholarships() {
      $db = JFactory::getDBO();
      $query = "SELECT CONCAT(firstname, ' ', lastname) fullname, ABS(housing_amount+registration_amount) amount FROM muusa_scholarships_v WHERE name='YMCA Scholarship' ORDER BY lastname, firstname";
      $db->setQuery($query);
      return $db->loadObjectList();
   }

   function getCampers() {
      $db = JFactory::getDBO();
      $query = "SELECT SUM(IF(mc.age>17 AND mr.buildingid<1004,1,0)) adultsinside, SUM(IF(mc.age<=17 AND mc.age>4 AND mr.buildingid<1004,1,0)) childreninside, SUM(IF(mc.age>17 AND mr.buildingid=1007,1,0)) adultsoutside, SUM(IF(mc.age<=17 AND mc.age>4 AND mr.buildingid=1007,1,0)) childrenoutside, SUM(IF(mc.age<=17 AND mc.age>4 AND mr.buildingid>1007,1,0)) high, SUM(IF(mc.age>17 AND mr.buildingid>1007,1,0)) ya FROM muusa_campers_v mc, muusa_rooms mr WHERE mc.roomid=mr.roomid";
      $db->setQuery($query);
      return $db->loadObjectList();
   }
}

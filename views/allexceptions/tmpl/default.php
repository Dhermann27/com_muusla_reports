<?php defined('_JEXEC') or die('Restricted access');
$user =& JFactory::getUser();?>
<div id="ja-content">
   <div class="componentheading">All Current Exceptions</div>
   <table class="blog" cellpadding="0" cellspacing="0">
      <?php
      echo "      <tr>\n";
      echo "         <td valign='top'>\n";
      echo "            <div>\n";
      echo "            <div class='article-content'>\n";
      echo "               <h3>Orphan Family</h3>\n";
      foreach ($this->family as $charge) {
         echo "               <a href='" . JURI::root(true) . "/index.php/register?editcamper=$charge->camperid'>$charge->familyname</a><br />\n";
      }
      echo "               <h3>Orphan Children</h3>\n";
      foreach ($this->orphans as $charge) {
         echo "               $charge->fullname<br />\n";
      }
      echo "               <h3>Missing Registration Fee</h3>\n";
      foreach ($this->registrationFees as $charge) {
         echo "               <a href='" . JURI::root(true) . "/index.php/register?editcamper=$charge->camperid'>$charge->fullname</a><br />\n";
      }
      echo "               <h3>Missing Housing Fee</h3>\n";
      foreach ($this->housingFees as $charge) {
         echo "               <a href='" . JURI::root(true) . "/index.php/register?editcamper=$charge->camperid'>$charge->fullname</a><br />\n";
      }
      echo "               <h3>Wrong Program</h3>\n";
      foreach ($this->programs as $charge) {
         echo "               <a href='" . JURI::root(true) . "/index.php/register?editcamper=$charge->camperid'>$charge->fullname</a> (Expected $charge->expected, Actual $charge->actual)<br />\n";
      }
      echo "               <h3>Wrong Registration Fee</h3>\n";
      foreach ($this->programFees as $charge) {
         echo "               <a href='" . JURI::root(true) . "/index.php/register?editcamper=$charge->camperid'>$charge->fullname</a> (Expected " . number_format($charge->expected,2) . ", Actual " . number_format($charge->actual,2) . ")<br />\n";
      }
      echo "               <h3>Wrong Housing Fee</h3>\n";
      foreach ($this->rateFees as $charge) {
         echo "               <a href='" . JURI::root(true) . "/index.php/register?editcamper=$charge->camperid'>$charge->fullname</a> (Expected " . number_format($charge->expected,2) . ", Actual " . number_format($charge->actual,2) . ")<br />\n";
      }
      echo "               <h3>Duplicate Campers</h3>\n";
      foreach ($this->dupeCampers as $charge) {
         if(in_array("8", $user->groups)) {
            echo "               <a href='" . JURI::root(true) . "/index.php/administration/reports/exceptions?id=$charge->oldid,$charge->newid'>$charge->fullname ($charge->oldid: $charge->numcharges)</a> -> <a href='" . JURI::root(true) . "/index.php/administration/reports/exceptions?id=$charge->newid,$charge->oldid'>$charge->newid: $charge->numdharges</a><br />\n";
         } else {
            echo "               $charge->fullname<br />\n";
         }
      }
      echo "            </div>\n";
      echo "            <span class='article_separator'>&nbsp;</span>\n";
      echo "            </div>\n";
      echo "         </td>\n";
      echo "      </tr>\n";
      ?>
   </table>

</div>

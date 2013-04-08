<?php defined('_JEXEC') or die('Restricted access');
$user =& JFactory::getUser();?>
<div id="ja-content">
   <div class="componentheading">All Workshops and Workshop Attendees</div>
   <table class="blog" cellpadding="0" cellspacing="0">
      <?php
      echo "      <tr>\n";
      echo "         <td valign='top'>\n";
      echo "            <div>\n";
      echo "            <div class='article-content'>\n";
      echo "               <table cellpadding='5' cellspacing ='5'>\n";
      foreach ($this->workshops as $eventid => $workshop) {
         echo "                  <tr>\n";
         echo "                     <td><h5>" . $workshop["workshopname"] . "</h5></td>\n";
         echo "                     <td>" . $workshop["timename"] . "</td>\n";
         if($workshop["capacity"] != 0) {
            echo "                     <td>" . count($workshop["attendees"]) . "/" . $workshop["capacity"] . "</td>\n";
         } else {
            echo "                     <td>" . count($workshop["attendees"]) . "</td>\n";
         }
         echo "                  </tr>\n";
         echo "                  <tr style='font-size:.8em;font-style:italic;'>\n";
         echo "                     <td colspan='2'>" . $workshop["roomname"] . "</td>\n";
         echo "                     <td>" . $workshop["dispdays"] . "</td>\n";
         echo "                  </tr>\n";
         if($workshop['attendees']) {
            foreach($workshop['attendees'] as $attendee) {
               $count++;
               if($attendee->is_leader == "1") {
                  echo "                  <tr style='font-weight:bold;'>\n";
               } else {
                  echo "                  <tr style='font-size:.9em;'>\n";
               }
               echo "                     <td>$attendee->fullname</td>\n";
               echo "                     <td>$attendee->email</td>\n";
               if(in_array("8", $user->groups) || in_array("10", $user->groups)) {
                  echo "                     <td align='right'><a href='" . JURI::root(true) . "/index.php/register-alias/workshops?editcamper=$attendee->familyid'>Workshop/Staff Selection</a></td>\n";
               } else {
                  echo "                     <td>&nbsp;</td>\n";
               }
               echo "                  </tr>\n";
            }
         }
         if(count($workshop['waitlist']) > 0) {
            echo "                  <tr style='font-size:.9em;font-style:italic;'>\n";
            echo "                     <td colspan='3'>Waiting List:\n";
            foreach($workshop['waitlist'] as $attendee) {
               echo "                     $attendee->fullname, \n";
            }
            echo "                     </td>\n";
            echo "                  </tr>\n";
         }
      }
      echo "               </table>\n";
      echo "            </div>\n";
      echo "            <span class='article_separator'>&nbsp;</span>\n";
      echo "            </div>\n";
      echo "         </td>\n";
      echo "      </tr>\n";
      ?>
   </table>

</div>

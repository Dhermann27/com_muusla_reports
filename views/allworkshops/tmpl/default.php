<?php defined('_JEXEC') or die('Restricted access');
$user =& JFactory::getUser();?>
<div id="ja-content">
   <div class="componentheading">All Workshops and Workshop Attendees</div>
   <table class="blog">
      <tr>
         <td valign="top">
            <div>
               <div class="article-content">
                  <table>
                     <?php foreach ($this->workshops as $eventid => $workshop) {
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
                        if($workshop["attendees"]) {
                           foreach($workshop["attendees"] as $attendee) {
                              $count++;
                              if($attendee->is_leader == "1") {
                                 echo "                  <tr style='font-weight:bold;'>\n";
                              } else {
                                 echo "                  <tr style='font-size:.9em;'>\n";
                              }
                              echo "                     <td>$attendee->firstname $attendee->lastname</td>\n";
                              echo "                     <td>$attendee->email</td>\n";
                              if(in_array("8", $user->groups) || in_array("10", $user->groups)) {
                                 echo "                     <td align='right' nowrap='nowrap'><a class='tooltip' href='" . JURI::root(true) . "/index.php/register?editcamper=$attendee->familyid' title='Registration Form'><i class='fa fa-user fa-2x'></i></a>\n";
                                 echo "                     <a href='" . JURI::root(true) . "/index.php/registration/workshops?editcamper=$attendee->familyid' title='Workshop Selection'><i class='fa fa-tasks fa-2x'></i></a>\n";
                                 echo "                     <a href='" . JURI::root(true) . "/index.php/rooms?editcamper=$attendee->familyid' title='Assign Room'><i class='fa fa-home fa-2x'></i></a></td>\n";
                              } else {
                                 echo "                     <td>&nbsp;</td>\n";
                              }
                              echo "                  </tr>\n";
                           }
                        }
                        if(count($workshop["waitlist"]) > 0) {
                           echo "                  <tr style='font-size:.9em;font-style:italic;'>\n";
                           echo "                     <td colspan='3'>Waiting List:\n" . implode(", ", $workshop["waitlist"]);
                           echo "                     </td>\n";
                           echo "                  </tr>\n";
                        }
                     }?>
                  </table>
               </div>
               <span class="article_separator">&nbsp;</span>
            </div>
         </td>
      </tr>
   </table>
</div>

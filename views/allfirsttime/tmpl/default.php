<?php defined('_JEXEC') or die('Restricted access'); ?>
<div id="ja-content">
   <div class="componentheading">All Registered First Time Campers</div>
   <table class="blog">
      <tr>
         <td valign='top'>
            <div>
               <div class='article-content'>
                  <table>
                     <tr>
                        <td colspan='6'><h4>First Time</h4></td>
                     </tr>
                     <tr>
                        <td>Last Name</td>
                        <td>First Name</td>
                        <td>Program</td>
                        <td>Birthdate</td>
                        <td>Room Number</td>
                        <td>Workshop Signups</td>
                     </tr>
                     <?php
                     foreach ($this->campers as $familyid => $camper) {
                        if($camper['children']) {
                           echo "                  <tr>\n";
                           echo "                     <td colspan='2'><h4>" . $camper["familyname"] . "</h4></td>\n";
                           echo "                     <td colspan='2'>" . $camper['city'] . ", " . $camper['statecd'] . "</td>\n";
                           echo "                     <td align='right'><a href='" . JURI::root(true) . "/index.php/register?editcamper=" . $camper['familyid'] . "'>Registration Form</a></td>\n";
                           echo "                  </tr>\n";
                           foreach($camper['children'] as $child) {
                              $count++;
                              echo "                  <tr style='font-size:.9em'>\n";
                              echo "                     <td>$child->lastname</i></td>\n";
                              echo "                     <td>$child->firstname</i></td>\n";
                              echo "                     <td>$child->programname</i></td>\n";
                              echo "                     <td>$child->birthdate</i></td>\n";
                              echo "                     <td align='center'>$child->roomnbr</i></td>\n";
                              echo "                     <td align='right'>$child->workshops</td>\n";
                              echo "                  </tr>\n";
                           }
                        }
                     }
                     echo "                  <tr><td colspan='6'>Emails: $this->firstemails</td></tr>\n";
                     echo "                  <tr><td colspan='6'><h4>First Time In Past Three Years</td></tr>\n";
                     foreach ($this->campers as $familyid => $camper) {
                        if($camper['tchildren']) {
                           echo "                  <tr>\n";
                           echo "                     <td colspan='2'><h4>" . $camper["familyname"] . "</h4></td>\n";
                           echo "                     <td colspan='2'>" . $camper['city'] . ", " . $camper['statecd'] . "</td>\n";
                           echo "                     <td align='right'><a href='" . JURI::root(true) . "/index.php/register?editcamper=" . $camper['familyid'] . "'>Registration Form</a></td>\n";
                           echo "                  </tr>\n";
                           foreach($camper['tchildren'] as $child) {
                              $count++;
                              echo "                  <tr style='font-size:.9em'>\n";
                              echo "                     <td>$child->lastname</i></td>\n";
                              echo "                     <td>$child->firstname</i></td>\n";
                              echo "                     <td>$child->programname</i></td>\n";
                              echo "                     <td>$child->birthdate</i></td>\n";
                              echo "                     <td align='center'>$child->roomnbr</i></td>\n";
                              echo "                     <td align='right'>$child->workshops</td>\n";
                              echo "                  </tr>\n";
                           }
                        }
                     }
                     echo "                  <tr><td colspan='6'>Emails: $this->tfirstemails</td></tr>\n";?>
                  </table>
               </div>
               <span class='article_separator'>&nbsp;</span>
            </div>
         </td>
      </tr>
   </table>

</div>

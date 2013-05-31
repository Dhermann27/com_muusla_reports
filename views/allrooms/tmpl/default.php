<?php defined('_JEXEC') or die('Restricted access'); ?>
<div id="ja-content">
   <div class="componentheading">All Current Registered Campers by Room</div>
   <table class="blog" cellpadding="0" cellspacing="0">
      <tr>
         <td valign='top'>
            <div>
               <div class='article-content'>
                  <table cellpadding='5' cellspacing='5'>
                     <tr>
                        <td>&nbsp;</td>
                        <td>Room Number</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Program</td>
                        <td>Birthdate</td>
                        <td>&nbsp;</td>
                     </tr>
                     <?php
                     foreach ($this->buildings as $building) {
                        echo "                  <tr>\n";
                        echo "                     <td colspan='7'><h3>" . $building["name"] . "</h3></td>\n";
                        echo "                  </tr>\n";
                        foreach($building["rooms"] as $room) {
                           echo "                  <tr>\n";
                           echo "                     <td>&nbsp;</td>\n";
                           echo "                     <td colspan='6'>$room->roomnbr</td>\n";
                           echo "                  </tr>\n";
                           if(count($room->campers) > 0) {
                              foreach($room->campers as $camper) {
                                 echo "                  <tr>\n";
                                 echo "                     <td colspan='2'>&nbsp;</td>\n";
                                 echo "                     <td>$camper->firstname</td>\n";
                                 echo "                     <td>$camper->lastname</td>\n";
                                 echo "                     <td>$camper->programname</td>\n";
                                 echo "                     <td>$camper->birthdate</td>\n";
                                 echo "                     <td align='right'><a href='" . JURI::root(true) . "/index.php/register?editcamper=$camper->familyid'>Registration Form</a></td>\n";
                              }
                           }
                        }
                     }?>
                  </table>
               </div>
               <span class='article_separator'>&nbsp;</span>
            </div>
         </td>
      </tr>
   </table>
</div>

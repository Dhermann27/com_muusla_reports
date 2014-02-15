<?php defined('_JEXEC') or die('Restricted access');
$user =& JFactory::getUser();?>
<link type="text/css"
   href="<?php echo JURI::root(true);?>/components/com_muusla_application/css/application.css"
   rel="stylesheet" />
<div id="ja-content">
   <div class="componentheading">All Registered Campers by Room</div>
   <table class="blog">
      <tr>
         <td valign="top">
            <div>
               <div class="article-content">
                  <table id="muusaApp">
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
                                 echo "                     <td>$camper->birthday</td>\n";
                                 if(in_array("8", $user->groups) || in_array("10", $user->groups)) {
                                    echo "                     <td align='right' nowrap='nowrap'><a class='tooltip' href='" . JURI::root(true) . "/index.php/register?editcamper=$camper->familyid' title='Registration Form'><i class='fa fa-user fa-2x'></i></a>\n";
                                    echo "                     <a href='" . JURI::root(true) . "/index.php/registration/workshops?editcamper=$camper->familyid' title='Workshop Selection'><i class='fa fa-tasks fa-2x'></i></a>\n";
                                    echo "                     <a href='" . JURI::root(true) . "/index.php/rooms?editcamper=$camper->familyid' title='Assign Room'><i class='fa fa-home fa-2x'></i></a></td>\n";
                                 } else {
                                    echo "                     <td>&nbsp;</td>\n";
                                 }
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

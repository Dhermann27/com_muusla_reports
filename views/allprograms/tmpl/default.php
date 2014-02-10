<?php defined('_JEXEC') or die('Restricted access'); 
$user =& JFactory::getUser();?>
<div id="ja-content">
   <div class="componentheading">All Program Participants</div>
   <table class="blog">
      <tr>
         <td valign="top">
            <div>
               <div class="article-content">
                  <table id="muusaApp">
                     <?php       $count = 0;
                     foreach ($this->programs as $program) {
                        echo "                  <tr>\n";
                        echo "                     <td colspan='7'><h3>$program->name</h3></td>\n";
                        echo "                  </tr>\n";
                        echo "                  <tr>\n";
                        echo "                     <td>Gender</td>\n";
                        echo "                     <td>First Name</td>\n";
                        echo "                     <td>Last Name</td>\n";
                        echo "                     <td>Age</td>\n";
                        if($program->programid != 1005 && $program->programid != 1006) {
                           if($program->programid != 1007) {
                              echo "                     <td>Grade</td>\n";
                           } else {
                              echo "                     <td>&nbsp;</td>\n";
                           }
                           echo "                     <td>Parent</td>\n";
                        } else {
                           if($program->programid != 1007) {
                              echo "                     <td>&nbsp;</td>\n";
                           } else {
                              echo "                     <td>&nbsp;</td>\n";
                           }
                           echo "                     <td>&nbsp;</td>\n";
                        }
                        echo "                     <td>&nbsp;</td>\n";
                        echo "                  </tr>\n";
                        $count = 0;
                        $email = "";
                        foreach($this->campers as $camper) {
                           if($camper->programid == $program->id) {
                              $count++;
                              echo "                  <tr>\n";
                              echo "                     <td>$camper->sexcd</td>\n";
                              echo "                     <td>$camper->firstname</td>\n";
                              echo "                     <td>$camper->lastname</td>\n";
                              echo "                     <td>$camper->age</td>\n";
                              if($program->id != 1005 && $program->id != 1006) {
                                 if($program->id != 1007) {
                                    echo "                     <td>$camper->grade</td>\n";
                                 } else {
                                    echo "                     <td>&nbsp;</td>\n";
                                 }
                                 if($camper->sponsor) {
                                    echo "                     <td>$camper->sponsor (S)</td>\n";
                                 } else {
                                    echo "                     <td>$camper->familyname</td>\n";
                                 }
                              } else {
                                 echo "                     <td>&nbsp;</td>\n";
                                 echo "                     <td>&nbsp;</td>\n";
                              }
                              if(in_array("8", $user->groups) || in_array("10", $user->groups)) {
                                 echo "                     <td align='right' nowrap='nowrap'><a class='tooltip' href='" . JURI::root(true) . "/index.php/register?editcamper=$camper->familyid' title='Registration Form'><i class='fa fa-user fa-2x'></i></a>\n";
                                 echo "                     <a href='" . JURI::root(true) . "/index.php/registration/workshops?editcamper=$camper->familyid' title='Workshop Selection'><i class='fa fa-tasks fa-2x'></i></a>\n";
                                 echo "                     <a href='" . JURI::root(true) . "/index.php/rooms?editcamper=$camper->familyid' title='Assign Room'><i class='fa fa-home fa-2x'></i></a></td>\n";
                              } else {
                                 echo "                     <td>&nbsp;</td>\n";
                              }
                              echo "                  </tr>\n";
                              if($camper->email != "") {
                                 $email .= $camper->email . "; \n";
                              }
                           }
                        }
                        echo "                  <tr>\n";
                        echo "                     <td>&nbsp;</td>\n";
                        echo "                     <td>&nbsp;</td>\n";
                        echo "                     <td colspan='2' align='2'>Total Campers: $count</td>\n";
                        echo "                     <td>&nbsp;</td>\n";
                        echo "                     <td>&nbsp;</td>\n";
                        echo "                     <td>&nbsp;</td>\n";
                        echo "                  </tr>\n";
                        echo "                  <tr>\n";
                        echo "                     <td colspan='7'>E-mail Distribution List<br />$email</td>\n";
                        echo "                  </tr>\n";
                     }?>
                  </table>
               </div>
               <span class="article_separator">&nbsp;</span>
            </div>
         </td>
      </tr>
   </table>
</div>

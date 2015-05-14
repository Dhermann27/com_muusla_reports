<?php defined('_JEXEC') or die('Restricted access'); 
$user = JFactory::getUser();?>
<div id="ja-content">
   <div class="componentheading">All Program Participants</div>
   <table class="blog">
      <tr>
         <td valign="top">
            <div>
               <div class="article-content">
                  <table id="muusaApp">
                     <?php foreach ($this->programs as $program) {?>
                     <tr>
                        <td colspan="9"><h3>
                              <?php echo $program->name;?>
                           </h3></td>
                     </tr>
                     <tr>
                        <td>Gender</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Age</td>
                        <td>City, State</td>
                        <td>Church</td>
                        <?php if($program->id != 1005 && $program->id != 1006) {
                           if($program->id != 1007) {
                              echo "                     <td>Grade</td>\n";
                           } else {
                              echo "                     <td>&nbsp;</td>\n";
                           }
                           echo "                     <td>Parent</td>\n";
                        } else {
                           if($program->id != 1007) {
                              echo "                     <td>&nbsp;</td>\n";
                           } else {
                              echo "                     <td>&nbsp;</td>\n";
                           }
                           echo "                     <td>&nbsp;</td>\n";
                        }?>
                        <td>&nbsp;</td>
                     </tr>
                     <?php $count = 0;
                     $email = "";
                     foreach($this->campers as $camper) {
                        if($camper->programid == $program->id) {
                           $count++;?>
                     <tr>
                        <td><?php echo $camper->sexcd;?></td>
                        <td><?php echo $camper->firstname;?></td>
                        <td><?php echo $camper->lastname;?></td>
                        <td><?php echo $camper->age;?></td>
                        <td><?php echo $camper->city . ", " . $camper->statecd;?>
                        </td>
                        <td><?php echo $camper->churchname;?></td>
                        <?php if($program->id != 1005 && $program->id != 1006) {
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
                           echo "                     <td align='right' nowrap='nowrap'><a class='myhidden' href='" . JURI::root(true) . "/index.php/register?editcamper=$camper->familyid' title='Registration Form'><i class='fa fa-user fa-2x'></i></a>\n";
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
                     }?>
                     
                     
                     <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2" align="2">Total Campers: <?php echo $count;?>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                     </tr>
                     <tr>
                        <td colspan="9">E-mail Distribution List<br /> <?php echo $email;?>
                        </td>
                     </tr>
                     <?php }?>
                  </table>
               </div>
               <span class="article_separator">&nbsp;</span>
            </div>
         </td>
      </tr>
   </table>
</div>

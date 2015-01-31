<?php defined('_JEXEC') or die('Restricted access'); 
$user = JFactory::getUser();?>
<div id="ja-content">
   <div class="componentheading">All Volunteers</div>
   <table class="blog">
      <tr>
         <td valign='top'>
            <div>
               <div class='article-content'>
                  <table id="muusaApp">
                     <tr>
                        <td>Last Name</td>
                        <td>First Name</td>
                        <td>&nbsp;</td>
                     </tr>
                     <?php 
                     $count = 0;
                     foreach ($this->positions as $position) {?>
                     <tr>
                        <td colspan="4"><h4>
                              <?php echo $position->name;?>
                           </h4>
                        </td>
                     </tr>
                     <?php foreach ($position->campers as $camper) {
                        echo "                  <tr>\n";
                        echo "                     <td>$camper->lastname</td>\n";
                        echo "                     <td>$camper->firstname</td>\n";
                        if(in_array("8", $user->groups) || in_array("10", $user->groups)) {
                           echo "                     <td align='right' nowrap='nowrap'><a class='myhidden' href='" . JURI::root(true) . "/index.php/register?editcamper=$camper->familyid' title='Registration Form'><i class='fa fa-user fa-2x'></i></a>\n";
                           echo "                     <a href='" . JURI::root(true) . "/index.php/registration/workshops?editcamper=$camper->familyid' title='Workshop Selection'><i class='fa fa-tasks fa-2x'></i></a>\n";
                           echo "                     <a href='" . JURI::root(true) . "/index.php/rooms?editcamper=$camper->familyid' title='Assign Room'><i class='fa fa-home fa-2x'></i></a></td>\n";
                        } else {
                           echo "                     <td>&nbsp;</td>\n";
                        }
                        echo "                  </tr>\n";
                        $count++;
                     }?>
                     <tr>
                        <td colspan="4"><hr />
                        </td>
                     </tr>
                     <tr>
                        <td colspan='4'>Distribution List: <?php echo $position->emails;?>
                        </td>
                     </tr>
                     <?php }?>
                  </table>
               </div>
               <span class='article_separator'>&nbsp;</span>
            </div>
         </td>
      </tr>
   </table>

</div>

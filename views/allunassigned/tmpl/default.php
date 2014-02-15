<?php defined('_JEXEC') or die('Restricted access');
$user =& JFactory::getUser();?>
<link type="text/css"
   href="<?php echo JURI::root(true);?>/components/com_muusla_application/css/application.css"
   rel="stylesheet" />
<div id="ja-content">
   <div class="componentheading">All Unassigned Campers</div>
   <table class="blog">
      <tr>
         <td valign="top">
            <div>
               <div class="article-content">
                  <table id="muusaApp">
                     <tr>
                        <td>Last Name</td>
                        <td>First Name</td>
                        <td>Family Name</td>
                        <td>&nbsp;</td>
                     </tr>
                     <tr>
                        <td colspan="4"><h3>Unassigned Campers</h3></td>
                     </tr>
                     <?php 
                     $count = 0;
                     foreach ($this->campers as $camper) {
                        echo "                  <tr>\n";
                        echo "                     <td>$camper->lastname</td>\n";
                        echo "                     <td>$camper->firstname</td>\n";
                        echo "                     <td>($camper->familyname)</td>\n";
                        if(in_array("8", $user->groups) || in_array("10", $user->groups)) {
                           echo "                     <td align='right' nowrap='nowrap'><a class='tooltip' href='" . JURI::root(true) . "/index.php/register?editcamper=$camper->familyid' title='Registration Form'><i class='fa fa-user fa-2x'></i></a>\n";
                           echo "                     <a href='" . JURI::root(true) . "/index.php/registration/workshops?editcamper=$camper->familyid' title='Workshop Selection'><i class='fa fa-tasks fa-2x'></i></a>\n";
                           echo "                     <a href='" . JURI::root(true) . "/index.php/rooms?editcamper=$camper->familyid' title='Assign Room'><i class='fa fa-home fa-2x'></i></a></td>\n";
                        } else {
                           echo "                     <td>&nbsp;</td>\n";
                        }
                        echo "                  </tr>\n";
                        $count++;
                     }?>
                     <tr>
                        <td colspan='4' align='right'>Total Campers: <?php echo $count;?>
                        </td>
                     </tr>
                  </table>
               </div>
            </div>
         </td>
      </tr>
   </table>
</div>

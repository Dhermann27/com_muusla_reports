<?php defined('_JEXEC') or die('Restricted access'); 
$user =& JFactory::getUser();?>
<link type="text/css"
   href="<?php echo JURI::root(true);?>/components/com_muusla_application/css/application.css"
   rel="stylesheet" />
<div id="ja-content">
   <div class="componentheading">All Registered Campers</div>
   <table class="blog">
      <tr>
         <td valign="top">
            <div>
               <div class="article-content">
                  <div align="right">
                     <a
                        href="<?php echo $_SERVER["PHP_SELF"]; echo $this->sort == "1" ? "" : "?sort=1";?>">Sort
                        By <?php echo $this->sort == "1" ? "Last Name" : "Paid Date"?>
                     </a>
                  </div>
                  <table id="muusaApp">
                     <tr>
                        <td>Last Name</td>
                        <td>First Name</td>
                        <td>Program</td>
                        <td>Postmark / Birthdate</td>
                        <td>Room Number</td>
                     </tr>
                     <?php 
                     $count = 0;
                     foreach ($this->campers as $familyid => $camper) {
                        echo "                  <tr>\n";
                        echo "                     <td colspan='2'><h4>" . $camper["name"] . "</h4></td>\n";
                        echo "                     <td>" . $camper["city"] . ", " . $camper["statecd"] . "</td>\n";
                        echo "                     <td>" . ($camper["paydate"] != null ? $camper["paydate"] : "Unpaid") . "</td>\n";
                        if(in_array("8", $user->groups) || in_array("10", $user->groups)) {
                           echo "                     <td align='right'><a href='" . JURI::root(true) . "/index.php/register?editcamper=" . $camper['familyid'] . "'>Registration Form</a></td>\n";
                           echo "                     <td align='right'><a href='" . JURI::root(true) . "/index.php/registration/workshops?editcamper=" . $camper['familyid'] . "'>Workshop Selection</a></td>\n";
                        } else {
                           echo "                     <td>&nbsp;</td>\n";
                           echo "                     <td>&nbsp;</td>\n";
                        }
                        echo "                  </tr>\n";
                        if($camper['children']) {
                           foreach($camper['children'] as $child) {
                              $count++;
                              echo "                  <tr style='font-size:.9em'>\n";
                              echo "                     <td>$child->lastname</i></td>\n";
                              echo "                     <td>$child->firstname</i></td>\n";
                              echo "                     <td>$child->programname</i></td>\n";
                              echo "                     <td>$child->birthdate</i></td>\n";
                              echo "                     <td align='center'>$child->roomnbr</i></td>\n";
                              echo "                  </tr>\n";
                           }
                        }
                     }?>
                     <tr>
                        <td colspan="5" align="right"><b>Total Campers:
                              <?php echo $count?>
                        </b></td>
                     </tr>
                  </table>
               </div>
               <span class="article_separator">&nbsp;</span>
            </div>
         </td>
      </tr>
   </table>
</div>

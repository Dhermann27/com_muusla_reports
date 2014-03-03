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
               <div id="muusaApp" class="article-content">
                  <ul>
                     <?php
                     foreach ($this->years as $year) {?>
                     <li><a
                        href="http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "#year" . $year->year;?>"><?php echo $year->year;?>
                     </a></li>
                     <?php }?>
                  </ul>
                  <?php foreach ($this->years as $year) {?>
                  <div id="year<?php echo $year->year;?>">
                     <?php
                     foreach ($year->buildings as $building) {
                        if($building["count"] > 0) {?>
                     <div class="building">
                        <h4>
                           <?php echo $building["name"];?>
                        </h4>
                        <div>
                           <table>
                              <tr>
                                 <td>Room Number</td>
                                 <td>First Name</td>
                                 <td>Last Name</td>
                                 <td>Program</td>
                                 <td>Birthdate</td>
                                 <td>&nbsp;</td>
                              </tr>
                              <?foreach($building["rooms"] as $room) {
                                 if(count($room->campers) > 0) {
                                    foreach($room->campers as $index => $camper) {
                                       echo "                  <tr>\n";
                                       if($index == 0) {
                                          echo "                     <td valign='top' rowspan='" . max(count($room->campers), 1) . "'>$room->roomnbr</td>\n";
                                       }
                                       echo "                     <td>$camper->firstname</td>\n";
                                       echo "                     <td>$camper->lastname</td>\n";
                                       echo "                     <td>$camper->programname</td>\n";
                                       echo "                     <td>$camper->birthday</td>\n";
                                       if($year->is_current == "1" && (in_array("8", $user->groups) || in_array("10", $user->groups))) {
                                          echo "                     <td align='right' nowrap='nowrap'><a class='tooltip' href='" . JURI::root(true) . "/index.php/register?editcamper=$camper->familyid' title='Registration Form'><i class='fa fa-user fa-2x'></i></a>\n";
                                          echo "                     <a href='" . JURI::root(true) . "/index.php/registration/workshops?editcamper=$camper->familyid' title='Workshop Selection'><i class='fa fa-tasks fa-2x'></i></a>\n";
                                          echo "                     <a href='" . JURI::root(true) . "/index.php/rooms?editcamper=$camper->familyid' title='Assign Room'><i class='fa fa-home fa-2x'></i></a></td>\n";
                                       } else {
                                          echo "                     <td>&nbsp;</td>\n";
                                       }
                                       echo "                  </tr>\n";
                                    }
                                 } else {
                                    echo "                  <tr>\n";
                                    echo "                     <td>$room->roomnbr</td>\n";
                                    echo "                  </tr>\n";
                                 }
                              }?>
                           </table>
                        </div>
                     </div>
                     <?php }
                     }?>
                  </div>
                  <?php }?>
               </div>
               <span class='article_separator'>&nbsp;</span>
            </div>

         </td>
      </tr>
   </table>
   <script type="text/javascript">
   jQuery(document).ready(function($) {
		$("#muusaApp").tabs({
			active : <?php echo count($years)-1;?>
		});
		$(".building").accordion({
			active: false,
			collapsible: true,
			header : "h4",
			heightStyle : "content"
		});
   });</script>
</div>

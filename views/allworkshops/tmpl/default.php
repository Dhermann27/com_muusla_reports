<?php defined('_JEXEC') or die('Restricted access');
$user = JFactory::getUser();?>
<div id="ja-content">
   <div class="componentheading">All Workshops and Workshop Attendees</div>
   <table class="blog">
      <tr>
         <td valign="top">
            <div>
               <div id="muusaApp" class="article-content">
                  <ul>
                     <?php
                     foreach ($this->times as $timeslotid => $time) {?>
                     <li><a
                        href="http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "#time" . $timeslotid;?>"><?php echo $time["name"];?>
                     </a></li>
                     <?php }?>
                  </ul>
                  <?php foreach ($this->times as $timeslotid => $time) {?>
                  <div id="time<?php echo $timeslotid;?>">
                     <h5>
                        <?php echo $timeslotid != 1020 ? $time["start"] . " - " . $time["end"] : "";?>
                     </h5>
                     <?php if(count($time["shops"]) > 0) {
                        foreach($time["shops"] as $id => $workshop) {
                           $style = "";
                           if (count($workshop["attendees"]) / intval($workshop["capacity"]) >= .75) {
                              $style = " style='background: " . (count($workshop["attendees"]) >= intval($workshop["capacity"]) ? "#cd0a0a" : "#e3a345") . ";'";
                           }?>
                     <div class="workshop">
                        <h4 <?php echo $style;?>>
                           <?php echo $workshop["workshopname"];?>
                        </h4>
                        <div>
                           <table>
                              <thead>
                                 <tr>
                                    <td width="60%"><?php echo $workshop["roomname"];?>
                                    </td>
                                    <td width="20%"><?php echo $workshop["dispdays"];?>
                                    </td>
                                    <td width="20%"><strong><?php echo count($workshop["attendees"]) . ($workshop["capacity"] != 999 ?  "/" . $workshop["capacity"] : "");?>
                                    </strong></td>
                                 </tr>
                                 <tr>
                                    <td>Name</td>
                                    <td><?php echo $timeslotid != 1020 ? "Choice Number" : "";?>
                                    </td>
                                    <td>&nbsp;</td>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php if($workshop["attendees"]) {
                                    foreach($workshop["attendees"] as $attendee) {
                                       $count++;
                                       if($attendee->is_leader == "1") {
                                          echo "                  <tr style='font-weight:bold;'>\n";
                                       } else {
                                          echo "                  <tr style='font-size:.9em;'>\n";
                                       }
                                       echo "                     <td>$attendee->firstname $attendee->lastname</td>\n";
                                       echo "                     <td>" . ($timeslotid != 1020 ? $attendee->choicenbr : "") . "</td>\n";
                                       if(in_array("8", $user->groups) || in_array("10", $user->groups)) {
                                          echo "                     <td align='right' nowrap='nowrap'><a class='myhidden' href='" . JURI::root(true) . "/index.php/register?editcamper=$attendee->familyid' title='Registration Form'><i class='fa fa-user fa-2x'></i></a>\n";
                                          echo "                     <a href='" . JURI::root(true) . "/index.php/registration/workshops?editcamper=$attendee->familyid' title='Workshop Selection'><i class='fa fa-tasks fa-2x'></i></a>\n";
                                          echo "                     <a href='" . JURI::root(true) . "/index.php/rooms?editcamper=$attendee->familyid' title='Assign Room'><i class='fa fa-home fa-2x'></i></a></td>\n";
                                       } else {
                                          echo "                     <td>&nbsp;</td>\n";
                                       }
                                       echo "                  </tr>\n";
                                    }
                                 }?>
                              </tbody>
                              <tfoot>
                                 <?php if(count($workshop["waitlist"]) > 0) {
                                    echo "                  <tr style='font-size:.9em;font-style:italic;'>\n";
                                    echo "                     <td colspan='3'>Waiting List:\n" . implode(", ", $workshop["waitlist"]);
                                    echo "                     </td>\n";
                                    echo "                  </tr>\n";
                                 }
                                 if(count($workshop["emails"]) > 0) {
                                    echo "                  <tr style='font-size:.75em;'>\n";
                                    echo "                     <td colspan='3'>Distribution List:\n" . implode("; ", $workshop["emails"]);
                                    echo "                     </td>\n";
                                    echo "                  </tr>\n";
                                 }?>
                              </tfoot>
                           </table>
                        </div>
                     </div>
                     <?php }
                     }?>
                  </div>
                  <?php }?>
               </div>
               <span class="article_separator">&nbsp;</span>
            </div>
         </td>
      </tr>
   </table>
   <script type="text/javascript">
   jQuery(document).ready(function($) {
		$("#muusaApp").tabs();
		$(".workshop").accordion({
			active: false,
			collapsible: true,
			header : "h4",
			heightStyle : "content"
		}).find("table").css("width", "98%");
   });</script>
</div>

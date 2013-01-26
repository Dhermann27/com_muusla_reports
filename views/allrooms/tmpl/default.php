<?php defined('_JEXEC') or die('Restricted access'); ?>
<div id="ja-content">
<div class="componentheading">All Current Registered Campers by Room</div>
<table class="blog" cellpadding="0" cellspacing="0">
<?php
echo "      <tr>\n";
echo "         <td valign='top'>\n";
echo "            <div>\n";
echo "            <div class='article-content'>\n";
echo "               <table cellpadding='5' cellspacing ='5'>\n";
echo "                  <tr>\n";
echo "                     <td>Room Number</td>\n";
echo "                     <td>First Name</td>\n";
echo "                     <td>Last Name</td>\n";
echo "                     <td>Program</td>\n";
echo "                     <td>Birthdate</td>\n";
echo "                     <td>&nbsp;</td>\n";
echo "                  </tr>\n";
$building = -1;
$room = -1;
$prevhoh = -1;
foreach ($this->campers as $camper) {
	if($building == -1 || $camper->buildingid != $building) {
		$building = $camper->buildingid;
		echo "                  <tr>\n";
		echo "                     <td colspan='7'><h3>$camper->buildingname</h3></td>\n";
		echo "                  </tr>\n";
	}
	if($camper->hohid == $prevhoh) {
		echo "                  <tr style='font-size:.9em;font-style:italic'>\n";
	} else {
		echo "                  <tr>\n";
	}
	if($room == -1 || $camper->roomnbr != $room) {
		$room = $camper->roomnbr;
		echo "                     <td>$camper->roomnbr</td>\n";
	} else {
		echo "                     <td>&nbsp;</td>\n";
	}
	echo "                     <td>$camper->firstname</td>\n";
	echo "                     <td>$camper->lastname</td>\n";
	echo "                     <td>$camper->programname</td>\n";
	echo "                     <td>$camper->birthdate</td>\n";
	if($camper->camperid) {
		echo "                     <td><a href='index.php?option=com_muusla_database&task=save&view=camperdetails&Itemid=71&editcamper=$camper->camperid'>Details</a></td>\n";
	}
	echo "                  </tr>\n";
	if($camper->hohid == 0) {
		$prevhoh = $camper->camperid;
	}
}
echo "               </table>\n";
echo "            </div>\n";
echo "            <span class='article_separator'>&nbsp;</span>\n";
echo "            </div>\n";
echo "         </td>\n";
echo "      </tr>\n";
?>
</table>

</div>

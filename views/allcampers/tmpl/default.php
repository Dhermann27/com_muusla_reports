<?php defined('_JEXEC') or die('Restricted access'); ?>
<div id="ja-content">
<div class="componentheading">All Registered Campers</div>
<table class="blog" cellpadding="0" cellspacing="0">
<?php
echo "      <tr>\n";
echo "         <td valign='top'>\n";
echo "            <div>\n";
echo "            <div class='article-content'>\n";
echo "               <table cellpadding='5' cellspacing ='5'>\n";
echo "                  <tr>\n";
echo "                     <td>Last Name</td>\n";
echo "                     <td>First Name</td>\n";
echo "                     <td>Program</td>\n";
echo "                     <td>Birthdate</td>\n";
echo "                     <td>Room Number</td>\n";
echo "                     <td>Staff Position(s)</td>\n";
echo "                  </tr>\n";
$count = 0;
foreach ($this->campers as $familyid => $camper) {
	echo "                  <tr>\n";
	echo "                     <td colspan='2'><h4>" . $camper["familyname"] . "</h4></td>\n";
	echo "                     <td colspan='2'>" . $camper['city'] . ", " . $camper['statecd'] . "</td>\n";
	echo "                     <td align='right'><a href='" . JURI::root(true) . "/index.php/register?editcamper=" . $camper['familyid'] . "'>Registration Form</a></td>\n";
	echo "                     <td align='right'><a href='" . JURI::root(true) . "/index.php/register-alias/workshops?editcamper=" . $camper['familyid'] . "'>Workshop/Staff Selection</a></td>\n";
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
			echo "                     <td align='right'>$child->positionname</i></td>\n";
			echo "                  </tr>\n";
		}
	}
}
echo "                  <tr>\n";
echo "                     <td colspan='5' align='right'><b>Total Campers: $count</b></td>\n";
echo "                  </tr>\n";
echo "               </table>\n";
echo "            </div>\n";
echo "            <span class='article_separator'>&nbsp;</span>\n";
echo "            </div>\n";
echo "         </td>\n";
echo "      </tr>\n";
?>
</table>

</div>

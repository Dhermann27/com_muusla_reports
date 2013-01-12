<?php defined('_JEXEC') or die('Restricted access'); ?>
<div id="ja-content">
	<div class="componentheading">All Registered First Time Campers</div>
	<table class="blog" cellpadding="0" cellspacing="0">
		<?php
		echo "      <tr>\n";
		echo "         <td valign='top'>\n";
		echo "            <div>\n";
		echo "            <div class='article-content'>\n";
		echo "               <table cellpadding='5' cellspacing ='5'>\n";
		echo "                  <tr><td colspan='8'><h4>First Time</td></tr>\n";
		echo "                  <tr>\n";
		echo "                     <td>Last Name</td>\n";
		echo "                     <td>First Name</td>\n";
		echo "                     <td>Location</td>\n";
		echo "                     <td>Program</td>\n";
		echo "                     <td>Birthdate</td>\n";
		echo "                     <td>Room Number</td>\n";
		echo "                     <td>&nbsp;</td>\n";
		echo "                     <td>&nbsp;</td>\n";
		echo "                     <td>Workshops?</td>\n";
		echo "                  </tr>\n";
		foreach ($this->campers as $camperid => $camper) {
			echo "                  <tr>\n";
			echo "                     <td>" . $camper["lastname"] . "</td>\n";
			echo "                     <td>" . $camper['firstname'] . "</td>\n";
			echo "                     <td>" . $camper['city'] . ", " . $camper['statecd'] . "</td>\n";
			echo "                     <td>" . $camper['programname'] . "</td>\n";
			echo "                     <td>" . $camper['birthdate'] . "</td>\n";
			echo "                     <td>" . $camper['roomnbr'] . "</td>\n";
			echo "                     <td><a href='index.php?option=com_muusla_database&task=editcamper&view=campers&Itemid=70&editcamper=" . $camper['camperid'] . "'>Camper</a></td>\n";
			echo "                     <td><a href='index.php?option=com_muusla_database&task=save&view=camperdetails&Itemid=71&editcamper=" . $camper['camperid'] . "'>Details</a></td>\n";
			echo "                     <td align='center'>" . ($camper['workshops'] ? "*" : "") . "</td>\n";
			echo "                  </tr>\n";
			if($camper['children']) {
				foreach($camper['children'] as $child) {
					$count++;
					echo "                  <tr style='font-size:.9em;font-style:italic'>\n";
					echo "                     <td>$child->lastname</i></td>\n";
					echo "                     <td>$child->firstname</i></td>\n";
					echo "                     <td>&nbsp;</td>\n";
					echo "                     <td>$child->programname</i></td>\n";
					echo "                     <td>$child->birthdate</i></td>\n";
					echo "                     <td>$child->roomnbr</i></td>\n";
					echo "                     <td><a href='index.php?option=com_muusla_database&task=editcamper&view=campers&Itemid=70&editcamper=$child->camperid'>Camper</a></td>\n";
					echo "                     <td><a href='index.php?option=com_muusla_database&task=save&view=camperdetails&Itemid=71&editcamper=$child->camperid'>Details</a></td>\n";
					echo "                     <td align='center'>" . ($child->workshops ? "*" : "") . "</i></td>\n";
					echo "                  </tr>\n";
				}
			}
		}
		echo "                  <tr><td colspan='8'><h4>First Time In Past Three Years</td></tr>\n";
		foreach ($this->tcampers as $camperid => $camper) {
			if(!$this->campers[$camperid]) {
				echo "                  <tr>\n";
				echo "                     <td>" . $camper["lastname"] . "</td>\n";
				echo "                     <td>" . $camper['firstname'] . "</td>\n";
				echo "                     <td>" . $camper['city'] . ", " . $camper['statecd'] . "</td>\n";
				echo "                     <td>" . $camper['programname'] . "</td>\n";
				echo "                     <td>" . $camper['birthdate'] . "</td>\n";
				echo "                     <td>" . $camper['roomnbr'] . "</td>\n";
				echo "                     <td><a href='index.php?option=com_muusla_database&task=editcamper&view=campers&Itemid=70&editcamper=" . $camper['camperid'] . "'>Camper</a></td>\n";
				echo "                     <td><a href='index.php?option=com_muusla_database&task=save&view=camperdetails&Itemid=71&editcamper=" . $camper['camperid'] . "'>Details</a></td>\n";
				echo "                     <td align='center'>" . ($camper['workshops'] ? "*" : "") . "</td>\n";
				echo "                  </tr>\n";
				if($camper['children']) {
					foreach($camper['children'] as $child) {
						$count++;
						echo "                  <tr style='font-size:.9em;font-style:italic'>\n";
						echo "                     <td>$child->lastname</i></td>\n";
						echo "                     <td>$child->firstname</i></td>\n";
						echo "                     <td>&nbsp;</td>\n";
						echo "                     <td>$child->programname</i></td>\n";
						echo "                     <td>$child->birthdate</i></td>\n";
						echo "                     <td>$child->roomnbr</i></td>\n";
						echo "                     <td><a href='index.php?option=com_muusla_database&task=editcamper&view=campers&Itemid=70&editcamper=$child->camperid'>Camper</a></td>\n";
						echo "                     <td><a href='index.php?option=com_muusla_database&task=save&view=camperdetails&Itemid=71&editcamper=$child->camperid'>Details</a></td>\n";
						echo "                     <td align='center'>" . ($child->workshops ? "*" : "") . "</i></td>\n";
						echo "                  </tr>\n";
					}
				}
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

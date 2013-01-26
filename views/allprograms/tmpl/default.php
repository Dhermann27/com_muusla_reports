<?php defined('_JEXEC') or die('Restricted access'); ?>
<div id="ja-content">
	<div class="componentheading">All Program Participants</div>
	<table class="blog" cellpadding="0" cellspacing="0">
		<?php
		echo "      <tr>\n";
		echo "         <td valign='top'>\n";
		echo "            <div>\n";
		echo "            <div class='article-content'>\n";
		echo "               <table cellpadding='5' cellspacing ='5'>\n";
		$count = 0;
		foreach ($this->programs as $program) {
			echo "                  <tr>\n";
			echo "                     <td colspan='6'><h3>$program->name</h3></td>\n";
			echo "                  </tr>\n";
			echo "                  <tr>\n";
			echo "                     <td>Gender</td>\n";
			echo "                     <td>First Name</td>\n";
			echo "                     <td>Last Name</td>\n";
			echo "                     <td>Age</td>\n";
			if($program->programid != 1005 && $program->programid != 1006) {
				if($program->programid != 1004) {
					echo "                     <td>Grade</td>\n";
				}
				echo "                     <td>Parent</td>\n";
			} else {
				if($program->programid != 1004) {
					echo "                     <td>&nbsp;</td>\n";
				}
				echo "                     <td>&nbsp;</td>\n";
			}
			echo "                     <td>&nbsp;</td>\n";
			echo "                  </tr>\n";
			$count = 0;
			$email = "";
			foreach($this->campers as $camper) {
				if($camper->programid == $program->programid) {
					$count++;
					echo "                  <tr>\n";
					echo "                     <td>$camper->sexcd</td>\n";
					echo "                     <td>$camper->firstname</td>\n";
					echo "                     <td>$camper->lastname</td>\n";
					echo "                     <td>$camper->age</td>\n";
					if($program->programid != 1005 && $program->programid != 1006) {
						if($program->programid != 1004) {
							echo "                     <td>$camper->grade</td>\n";
						}
						if($camper->sponsor) {
							echo "                     <td>$camper->sponsor (S)</td>\n";
						} else {
							echo "                     <td>$camper->familyname</td>\n";
						}
					}
					echo "                     <td><a href='index.php?option=com_muusla_database&task=save&view=camperdetails&Itemid=71&editcamper=$camper->camperid'>Details</a></td>\n";
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
			echo "                     <td colspan='6'>E-mail Distribution List<br />$email</td>\n";
			echo "                  </tr>\n";
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

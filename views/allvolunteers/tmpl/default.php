<?php defined('_JEXEC') or die('Restricted access'); ?>
<div id="ja-content">
<div class="componentheading">All Volunteers / Staff</div>
<table class="blog" cellpadding="0" cellspacing="0">
<?php
echo "      <tr>\n";
echo "         <td valign='top'>\n";
echo "            <div>\n";
echo "            <div class='article-content'>\n";
$position = "";
$email = "";
foreach ($this->campers as $camper) {
	if($position != $camper->name) {
		echo "               </p>\n";
		if($email != "") {
			echo "               <p>Emails: $email</p>\n";
			$email = "";
		}
		echo "               <p><b>$camper->name</b></p>\n<p>";
	}
	echo "                  <a href='index.php?option=com_muusla_database&task=save&view=camperdetails&Itemid=71&editcamper=$camper->camperid'>$camper->fullname</a><br />\n";
	if($camper->email != "") {
		$email .= $camper->email . "; ";
	}
	$position = $camper->name;
}
echo "            </div>\n";
echo "            <span class='article_separator'>&nbsp;</span>\n";
echo "            </div>\n";
echo "         </td>\n";
echo "      </tr>\n";
?>
</table>

</div>

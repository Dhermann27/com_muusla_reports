<?php defined('_JEXEC') or die('Restricted access'); ?>
<div id="ja-content">
<div class="componentheading">All Unassigned Campers</div>
<table class="blog" cellpadding="0" cellspacing="0">
<?php
echo "      <tr>\n";
echo "         <td valign='top'>\n";
echo "            <div>\n";
echo "            <div class='article-content'>\n";
echo "               <h3>Unassigned Campers</h3>\n";
foreach ($this->campers as $camper) {
	echo "               <a href ='index.php?option=com_muusla_database&task=save&view=camperdetails&Itemid=71&editcamper=$camper->camperid'>$camper->lastname, $camper->firstname</a> ($camper->programname)<br />\n";
}
echo "            </div>\n";
echo "            <span class='article_separator'>&nbsp;</span>\n";
echo "            </div>\n";
echo "         </td>\n";
echo "      </tr>\n";
?>
</table>

</div>

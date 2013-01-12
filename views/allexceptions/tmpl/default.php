<?php defined('_JEXEC') or die('Restricted access'); ?>
<div id="ja-content">
<div class="componentheading">All Current Exceptions</div>
<table class="blog" cellpadding="0" cellspacing="0">
<?php
echo "      <tr>\n";
echo "         <td valign='top'>\n";
echo "            <div>\n";
echo "            <div class='article-content'>\n";
echo "               <h3>Missing Registration Fee</h3>\n";
foreach ($this->registrationFees as $charge) {
	echo "               <a href='index.php?option=com_muusla_database&task=save&view=camperdetails&Itemid=71&editcamper=$charge->camperid'>$charge->fullname</a><br />\n";
}
echo "               <h3>Missing Housing Fee</h3>\n";
foreach ($this->housingFees as $charge) {
	echo "               <a href='index.php?option=com_muusla_database&task=save&view=camperdetails&Itemid=71&editcamper=$charge->camperid'>$charge->fullname</a><br />\n";
}
echo "               <h3>Wrong Program</h3>\n";
foreach ($this->programs as $charge) {
	echo "               <a href='index.php?option=com_muusla_database&task=save&view=camperdetails&Itemid=71&editcamper=$charge->camperid'>$charge->fullname</a> (Expected $charge->expected, Actual $charge->actual)<br />\n";
}
echo "               <h3>Wrong Registration Fee</h3>\n";
foreach ($this->programFees as $charge) {
	echo "               <a href='index.php?option=com_muusla_database&task=save&view=camperdetails&Itemid=71&editcamper=$charge->camperid'>$charge->fullname</a> (Expected " . number_format($charge->expected,2) . ", Actual " . number_format($charge->actual,2) . ")<br />\n";
}
echo "               <h3>Wrong Housing Fee</h3>\n";
foreach ($this->rateFees as $charge) {
	echo "               <a href='index.php?option=com_muusla_database&task=save&view=camperdetails&Itemid=71&editcamper=$charge->camperid'>$charge->fullname</a> (Expected " . number_format($charge->expected,2) . ", Actual " . number_format($charge->actual,2) . ")<br />\n";
}
echo "               <h3>Duplicate Campers</h3>\n";
foreach ($this->dupeCampers as $charge) {
	echo "               <a href='index.php?option=com_muusla_database&task=save&view=camperdetails&Itemid=71&editcamper=$charge->oldid'>$charge->fullname ($charge->oldid: $charge->numcharges)</a> -> <a href='index.php?option=com_muusla_database&task=save&view=camperdetails&Itemid=71&editcamper=$charge->newid'>$charge->newid: $charge->numdharges</a><br />\n";
}
echo "            </div>\n";
echo "            <span class='article_separator'>&nbsp;</span>\n";
echo "            </div>\n";
echo "         </td>\n";
echo "      </tr>\n";
?>
</table>

</div>

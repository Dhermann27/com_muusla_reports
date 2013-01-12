<?php defined('_JEXEC') or die('Restricted access'); ?>
<div id="ja-content">
<div class="componentheading">All 2009 Unoccupied Rooms</div>
<table class="blog" cellpadding="0" cellspacing="0">
<?php
echo "      <tr>\n";
echo "         <td valign='top'>\n";
echo "            <div>\n";
echo "            <div class='article-content'>\n";
$building = -1;
$totalrooms = 0;
$totalcapacity = 0;
$occupants = 0;
$occupiedrooms = 0;
foreach ($this->rooms as $room) {
	if($room->buildingid != $building) {
		$building = $room->buildingid;
		echo "                  <h3>$room->buildingname</h3>\n";
	}
	if($room->count == 0) {
		echo "              $room->roomnbr<br />\n";
	} else {
		$occupiedrooms++;
		$occupants += $room->count;
	}
	$totalrooms++;
	$totalcapacity += $room->capacity;
}
echo "               <h3>Rooms: $occupiedrooms occupied of $totalrooms (" . number_format($occupiedrooms*100/$totalrooms, 0) . "%)</h3>\n";
echo "               <h3>Occupants: $occupants of possible $totalcapacity (" . number_format($occupants*100/$totalcapacity, 0) . "%)</h3>\n";
echo "            </div>\n";
echo "            <span class='article_separator'>&nbsp;</span>\n";
echo "            </div>\n";
echo "         </td>\n";
echo "      </tr>\n";
?>
</table>

</div>

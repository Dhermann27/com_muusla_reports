<?php defined('_JEXEC') or die('Restricted access'); ?>
<link type="text/css"
   href="<?php echo JURI::root(true);?>/components/com_muusla_application/css/application.css"
   rel="stylesheet" />
<script
   src="<?php echo JURI::root(true);?>/components/com_muusla_reports/js/raphael-min.js"></script>
<script
   src="<?php echo JURI::root(true);?>/components/com_muusla_reports/js/g.raphael-min.js"></script>
<script
   src="<?php echo JURI::root(true);?>/components/com_muusla_reports/js/g.line-min.js"></script>
<div id="ja-content">
   <div class="componentheading">Registration Chart</div>
   <div id="holder"></div>
   <script>
    	var r = Raphael("holder");
    	var dates = [];
    	var years = [];
    	var months = ["January", "February", "March", "April", "May", "June", "July"];
    	var myColors = ["#ff0000", "#00ff00", "#0000ff", "#ff00ff", "#00ffff", "#990000", "#009900", "#000099"];
		<?php
		//echo "    	var dates = ['" . implode("','", array_slice($this->dates, 0, 3)) . "'];\n";
		$count = 0;
		foreach ($this->years as $yearid => $dates) {
			$myDates = "";
			$myCounts = "";
			foreach($dates as $date) {
				$myDates .= array_search($date->date, $this->dates) . ",";
				$myCounts .= $date->count . ",";
			}
			echo "      dates[$count] = [" . substr($myDates,0,-1) . "];\n";
			echo "      years[$count] = [" . substr($myCounts,0,-1) . "];\n";
			echo "      r.text(100+" . $count*75 . ", 25, \"$yearid\").attr({\"font-size\": 20, \"fill\": myColors[" . $count++ . "]});\n";
		}
		?>
		var chart = r.linechart(25, 25, 800, 300, dates, years, { nostroke: false, axis: "0 0 1 1", axisxstep: 6, colors: myColors});
		var xText = chart.axis[0].text.items;
		var count = 0;      
		for(var i in xText) {
			if(typeof(xText[i].attr) != 'undefined') {
				xText[i].attr({'text': months[count++]});
			}
		};
        </script>
   <table id="muusaApp">
      <tr>
         <th>Year</th>
         <th>New Campers</th>
         <th>Old Campers<br />1 Year Missing
         </th>
         <th>Very Old Campers<br />2 or More Years Missing
         </th>
         <th>Campers Lost</th>
         <th>Total</th>
      </tr>
      <?php
      foreach ($this->table as $year) {
         echo "       <tr align='center'>\n";
         echo "          <td><b>$year->year</b></td>\n";
         echo "          <td><font color='green'>+$year->newcampers</font></td>\n";
         echo "          <td><font color='green'>+$year->oldcampers</font></td>\n";
         echo "          <td><font color='green'>+$year->voldcampers</font></td>\n";
         echo "          <td><font color='red'>-$year->lostcampers</font></td>\n";;
         echo "          <td>$year->total</td>\n";
         echo "       </tr>\n";
      }
      ?>
   </table>
   <i>Previous Year's Total - Lost Campers - Total Campers + New Campers
      + Old Campers + Very Old Campers = 0</i> <span
      class='article_separator'>&nbsp;</span>
</div>

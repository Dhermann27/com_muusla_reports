<?php defined('_JEXEC') or die('Restricted access'); ?>
<div id="ja-content">
<div class="componentheading">Current Ledger</div>
<table class="blog" cellpadding="0" cellspacing="0">
<?php
$reg = $this->registration;
echo "      <tr>\n";
echo "         <td valign='top'>\n";
echo "            <div>\n";
echo "            <div class='article-content'>\n";
echo "               <table cellpadding='5' cellspacing ='5' align='center' width='100%'>\n";
echo "                  <tr>\n";
echo "                     <td colspan='3' align='right'>\n";
echo "                        <a href='http://www.muusa.org/index.php?option=com_docman&task=doc_download&gid=36'>Ledger Archive</a>\n";
echo "                     </td>\n";
echo "                  </tr>\n";
echo "                  <tr>\n";
echo "                     <td valign='top'>\n";
echo "                        <a href='javascript:void(0)' onclick='if(document.getElementById(\"carry\").style.display==\"block\") { document.getElementById(\"carry\").style.display=\"none\"; } else { document.getElementById(\"carry\").style.display=\"block\"; }'>Carryover Bills</a>\n";
echo "                        <div id='carry' align='right' style='font-size:10px;display:none;'>\n";
$cartotal = 0;
foreach($this->carry as $car) {
	echo "                     $car->fullname: " . number_format($car->amount,2) . "<br />";
	$cartotal += $car->amount;
}
echo "                        </div></td>\n";
echo "                     <td>&nbsp;</td>\n";
echo "                     <td valign='bottom'>$" . number_format($cartotal, 2) . "</td>\n";
echo "                  </tr>\n";
echo "                  <tr>\n";
echo "                     <td valign='top'>\n";
echo "                        <a href='javascript:void(0)' onclick='if(document.getElementById(\"preregs\").style.display==\"block\") { document.getElementById(\"preregs\").style.display=\"none\"; } else { document.getElementById(\"preregs\").style.display=\"block\"; }'>Pre-Registration Deposits</a>\n";
echo "                        <div id='preregs' align='right' style='font-size:10px;display:none;'>\n";
$pretotal = 0;
foreach($this->preregs as $prereg) {
	echo "                     $prereg->fullname: " . number_format($prereg->amount,2) . "<br />";
	$pretotal += $prereg->amount;
}
echo "                        </div></td>\n";
echo "                     <td>&nbsp;</td>\n";
echo "                     <td valign='bottom'>$" . number_format($pretotal, 2) . "</td>\n";
echo "                  </tr>\n";
echo "                  <tr><td colspan='3'><hr /></td></tr>\n";
echo "                  <tr>\n";
echo "                     <td>Registration Fees Billed to Campers</td>\n";
echo "                     <td align='right'>$" . number_format($this->registrationFees, 2) . "</td>\n";
echo "                     <td>&nbsp;</td>\n";
echo "                  </tr>\n";
echo "                  <tr><td colspan='3'><b>Registration Credits Breakdown</b></td></tr>\n";
$previousProgram = "";
$programTotal = 0;
foreach($this->regbd as $credit) {
	if($credit->programname != $previousProgram) {
		if($previousProgram != "") {
			echo "                     </div>$" . number_format($programTotal, 2) . "</td>\n";
			echo "                     <td>&nbsp;</td>\n";
			echo "                     <td>&nbsp;</td>\n";
			echo "                  </tr>\n";
		}
		echo "                  <tr>\n";
		echo "                     <td align='right'>\n";
		echo "                        <a href='javascript:void(0)' onclick='if(document.getElementById(\"pc$credit->programid\").style.display==\"block\") { document.getElementById(\"pc$credit->programid\").style.display=\"none\"; } else { document.getElementById(\"pc$credit->programid\").style.display=\"block\"; }'>$credit->programname</a>\n";
		echo "                        <div id='pc$credit->programid' align='right' style='font-size:10px;display:none;'>\n";
		$previousProgram = $credit->programname;
		$programTotal = 0;
	}
	echo "                     $credit->fullname ($credit->positionname): $" . number_format($credit->amount,2) . "<br />";
	$programTotal += $credit->amount;
}
if(count($this->regbd) > 0) {
	echo "                     </div>$" . number_format($programTotal, 2) . "</td>\n";
	echo "                     <td>&nbsp;</td>\n";
	echo "                     <td>&nbsp;</td>\n";
	echo "                  </tr>\n";
}
$programTotal = 0;
echo "                  <tr>\n";
echo "                     <td align='right'>\n";
echo "                        <a href='javascript:void(0)' onclick='if(document.getElementById(\"pc999\").style.display==\"block\") { document.getElementById(\"pc999\").style.display=\"none\"; } else { document.getElementById(\"pc999\").style.display=\"block\"; }'>Polly Schaad Recipients</a>\n";
echo "                        <div id='pc999' align='right' style='font-size:10px;display:none;'>\n";
if($this->pollyReg) {
	foreach($this->pollyReg as $credit) {
		echo "                     $credit->fullname: $" . number_format($credit->amount,2) . "<br />";
		$programTotal += $credit->amount;
	}
}
echo "                     </div>$" . number_format($programTotal, 2) . "</td>\n";
echo "                     <td>&nbsp;</td>\n";
echo "                     <td>&nbsp;</td>\n";
echo "                  </tr>\n";
echo "                  <tr>\n";
echo "                     <td>Registration Credits</td>\n";
echo "                     <td>&nbsp;</td>\n";
echo "                     <td>$" . number_format($this->registration[1], 2) . "</td>\n";
echo "                  </tr>\n";
echo "                  <tr>\n";
echo "                     <td>Registration Payments (including Pre-Registration Deposits)</td>\n";
echo "                     <td>&nbsp;</td>\n";
echo "                     <td>$" . number_format($this->registration[2], 2) . "</td>\n";
echo "                  </tr>\n";
echo "                  <tr><td colspan='3'><hr /></td></tr>\n";
echo "                  <tr>\n";
echo "                     <td>Housing Fees Billed to Campers</td>\n";
echo "                     <td align='right'>$" . number_format($this->housingFees, 2) . "</td>\n";
echo "                     <td>&nbsp;</td>\n";
echo "                  </tr>\n";
echo "                  <tr><td colspan='3'><b>Housing Credits Breakdown</b></td></tr>\n";
$previousProgram = "";
$programTotal = 0;
$creditTotal = 0;
foreach($this->housebd as $credit) {
	if($credit->programname != $previousProgram) {
		if($previousProgram != "") {
			echo "                     </div>$" . number_format($programTotal, 2) . "</td>\n";
			echo "                     <td>&nbsp;</td>\n";
			echo "                     <td>&nbsp;</td>\n";
			echo "                  </tr>\n";
		}
		echo "                  <tr>\n";
		echo "                     <td align='right'>\n";
		echo "                        <a href='javascript:void(0)' onclick='if(document.getElementById(\"hc$credit->programid\").style.display==\"block\") { document.getElementById(\"hc$credit->programid\").style.display=\"none\"; } else { document.getElementById(\"hc$credit->programid\").style.display=\"block\"; }'>$credit->programname</a>\n";
		echo "                        <div id='hc$credit->programid' align='right' style='font-size:10px;display:none;'>\n";
		$previousProgram = $credit->programname;
		$programTotal = 0;
	}
	echo "                     $credit->fullname ($credit->positionname): $" . number_format($credit->amount,2) . "<br />";
	$programTotal += $credit->amount;
	$creditTotal += $credit->amount;
}
if(count($this->housebd) > 0) {
	echo "                     </div>$" . number_format($programTotal, 2) . "</td>\n";
	echo "                     <td>&nbsp;</td>\n";
	echo "                     <td>&nbsp;</td>\n";
	echo "                  </tr>\n";
}
$programTotal = 0;
echo "                  <tr>\n";
echo "                     <td align='right'>\n";
echo "                        <a href='javascript:void(0)' onclick='if(document.getElementById(\"hc999\").style.display==\"block\") { document.getElementById(\"hc999\").style.display=\"none\"; } else { document.getElementById(\"hc999\").style.display=\"block\"; }'>Polly Schaad Recipients</a>\n";
echo "                        <div id='hc999' align='right' style='font-size:10px;display:none;'>\n";
if($this->pollyHouse) {
	foreach($this->pollyHouse as $credit) {
		echo "                     $credit->fullname: $" . number_format($credit->amount,2) . "<br />";
		$programTotal += $credit->amount;
		$creditTotal += $credit->amount;
	}
}
echo "                     </div>$" . number_format($programTotal, 2) . "</td>\n";
echo "                     <td>&nbsp;</td>\n";
echo "                     <td>&nbsp;</td>\n";
echo "                  </tr>\n";
echo "                  <tr>\n";
echo "                     <td>Housing Credits</td>\n";
echo "                     <td>&nbsp;</td>\n";
echo "                     <td>$" . number_format($creditTotal, 2) . "</td>\n";
echo "                  </tr>\n";
echo "                  <tr>\n";
echo "                     <td>Housing Payments (including Pre-Registration Deposits)</td>\n";
echo "                     <td>&nbsp;</td>\n";
echo "                     <td>$" . number_format(max(abs($this->payments)-$this->registration[2],0), 2) . "</td>\n";
echo "                  </tr>\n";
echo "                  <tr><td colspan='3'><hr /></td></tr>\n";
echo "                  <tr>\n";
echo "                     <td>Late Fees Billed</td>\n";
echo "                     <td align='right'>$" . number_format($this->latefees, 2) . "</td>\n";
echo "                     <td>&nbsp;</td>\n";
echo "                  </tr>\n";
echo "                  <tr>\n";
echo "                     <td>Donations Accepted</td>\n";
echo "                     <td align='right'>$" . number_format($this->donations, 2) . "</td>\n";
echo "                     <td>&nbsp;</td>\n";
echo "                  </tr>\n";
echo "                  <tr>\n";
echo "                     <td>\n";
echo "                        <a href='javascript:void(0)' onclick='if(document.getElementById(\"scholar\").style.display==\"block\") { document.getElementById(\"scholar\").style.display=\"none\"; } else { document.getElementById(\"scholar\").style.display=\"block\"; }'>MUUSA Scholarships Awarded</a>\n";
echo "                        <div id='scholar' align='right' style='font-size:10px;display:none;'>\n";
$scholarships = 0;
if(count($this->scholarships)>0) {
	foreach($this->scholarships as $credit) {
		echo "                     $credit->fullname: $" . number_format($credit->amount,2) . "<br />";
		$scholarships += $credit->amount;
	}
}
echo "                     </div></td>\n";
echo "                     <td>&nbsp;</td>\n";
echo "                     <td>$" . number_format($scholarships, 2) . "</td>\n";
echo "                  </tr>\n";
echo "                  <tr>\n";
echo "                     <td>\n";
echo "                        <a href='javascript:void(0)' onclick='if(document.getElementById(\"yscholar\").style.display==\"block\") { document.getElementById(\"yscholar\").style.display=\"none\"; } else { document.getElementById(\"yscholar\").style.display=\"block\"; }'>YMCA Scholarships Awarded</a>\n";
echo "                        <div id='yscholar' align='right' style='font-size:10px;display:none;'>\n";
$scholarships = 0;
if(count($this->yscholarships)>0) {
	foreach($this->yscholarships as $credit) {
		echo "                     $credit->fullname: $" . number_format($credit->amount,2) . "<br />";
		$scholarships += $credit->amount;
	}
}
echo "                     </div></td>\n";
echo "                     <td>&nbsp;</td>\n";
echo "                     <td>$" . number_format($scholarships, 2) . "</td>\n";
echo "                  </tr>\n";
echo "                  <tr><td colspan='4'><hr /><b>Deposits Breakdown</b></td></tr>\n";
echo "                  <tr>\n";
echo "                     <td colspan='3'>Paypal Deposits</td>\n";
echo "                  </tr>\n";
$previousDeposit = "";
$depositTotal = 0;
foreach($this->depositspp as $deposit) {
	if($deposit->deposited != $previousDeposit) {
		if($previousDeposit != "") {
			echo "                     </div>$" . number_format($depositTotal, 2) . "</td>\n";
			echo "                     <td>&nbsp;</td>\n";
			echo "                     <td>&nbsp;</td>\n";
			echo "                  </tr>\n";
		}
		echo "                  <tr>\n";
		echo "                     <td align='right'>\n";
		echo "                        <a href='javascript:void(0)' onclick='if(document.getElementById(\"depo$deposit->deposited\").style.display==\"block\") { document.getElementById(\"depo$deposit->deposited\").style.display=\"none\"; } else { document.getElementById(\"depo$deposit->deposited\").style.display=\"block\"; }'>$deposit->deposited</a>\n";
		echo "                        <div id='depo$deposit->deposited' align='right' style='font-size:10px;display:none;'>\n";
		$previousDeposit = $deposit->deposited;
		$depositTotal = 0;
	}
	echo "                     $deposit->fullname: $" . number_format($deposit->amount,2) . "<br />";
	$depositTotal += $deposit->amount;
}
if(count($this->depositspp) > 0) {
	echo "                     </div>$" . number_format($depositTotal, 2) . "</td>\n";
	echo "                     <td>&nbsp;</td>\n";
	echo "                     <td>&nbsp;</td>\n";
	echo "                  </tr>\n";
}
echo "                  <tr>\n";
echo "                     <td colspan='3'>Check Deposits</td>\n";
echo "                  </tr>\n";
$previousDeposit = "";
$depositTotal = 0;
foreach($this->depositschk as $deposit) {
	if($deposit->deposited != $previousDeposit) {
		if($previousDeposit != "") {
			echo "                     </div>$" . number_format($depositTotal, 2) . "</td>\n";
			echo "                     <td>&nbsp;</td>\n";
			echo "                     <td>&nbsp;</td>\n";
			echo "                  </tr>\n";
		}
		echo "                  <tr>\n";
		echo "                     <td align='right'>\n";
		echo "                        <a href='javascript:void(0)' onclick='if(document.getElementById(\"depp$deposit->deposited\").style.display==\"block\") { document.getElementById(\"depp$deposit->deposited\").style.display=\"none\"; } else { document.getElementById(\"depp$deposit->deposited\").style.display=\"block\"; }'>$deposit->deposited</a>\n";
		echo "                        <div id='depp$deposit->deposited' align='right' style='font-size:10px;display:none;'>\n";
		$previousDeposit = $deposit->deposited;
		$depositTotal = 0;
	}
	echo "                     $deposit->fullname: $" . number_format($deposit->amount,2) . "<br />";
	$depositTotal += $deposit->amount;
}
if(count($this->depositschk) > 0) {
	echo "                     </div>$" . number_format($depositTotal, 2) . "</td>\n";
	echo "                     <td>&nbsp;</td>\n";
	echo "                     <td>&nbsp;</td>\n";
	echo "                  </tr>\n";
}
echo "                  <tr>\n";
echo "                     <td colspan='3'>Credit Card Deposits</td>\n";
echo "                  </tr>\n";
$previousDeposit = "";
$depositTotal = 0;
foreach($this->depositscc as $deposit) {
	if($deposit->deposited != $previousDeposit) {
		if($previousDeposit != "") {
			echo "                     </div>$" . number_format($depositTotal, 2) . "</td>\n";
			echo "                     <td>&nbsp;</td>\n";
			echo "                     <td>&nbsp;</td>\n";
			echo "                  </tr>\n";
		}
		echo "                  <tr>\n";
		echo "                     <td align='right'>\n";
		echo "                        <a href='javascript:void(0)' onclick='if(document.getElementById(\"depcc$deposit->deposited\").style.display==\"block\") { document.getElementById(\"depcc$deposit->deposited\").style.display=\"none\"; } else { document.getElementById(\"depcc$deposit->deposited\").style.display=\"block\"; }'>$deposit->deposited</a>\n";
		echo "                        <div id='depcc$deposit->deposited' align='right' style='font-size:10px;display:none;'>\n";
		$previousDeposit = $deposit->deposited;
		$depositTotal = 0;
	}
	echo "                     $deposit->fullname: $" . number_format($deposit->amount,2) . "<br />";
	$depositTotal += $deposit->amount;
}
if(count($this->depositscc) > 0) {
	echo "                     </div>$" . number_format($depositTotal, 2) . "</td>\n";
	echo "                     <td>&nbsp;</td>\n";
	echo "                     <td>&nbsp;</td>\n";
	echo "                  </tr>\n";
}
echo "                  <tr>\n";
echo "                     <td colspan='3'>Cash Deposits</td>\n";
echo "                  </tr>\n";
$previousDeposit = "";
$depositTotal = 0;
foreach($this->depositscash as $deposit) {
	if($deposit->deposited != $previousDeposit) {
		if($previousDeposit != "") {
			echo "                     </div>$" . number_format($depositTotal, 2) . "</td>\n";
			echo "                     <td>&nbsp;</td>\n";
			echo "                     <td>&nbsp;</td>\n";
			echo "                  </tr>\n";
		}
		echo "                  <tr>\n";
		echo "                     <td align='right'>\n";
		echo "                        <a href='javascript:void(0)' onclick='if(document.getElementById(\"depcash$deposit->deposited\").style.display==\"block\") { document.getElementById(\"depcash$deposit->deposited\").style.display=\"none\"; } else { document.getElementById(\"depcash$deposit->deposited\").style.display=\"block\"; }'>$deposit->deposited</a>\n";
		echo "                        <div id='depcash$deposit->deposited' align='right' style='font-size:10px;display:none;'>\n";
		$previousDeposit = $deposit->deposited;
		$depositTotal = 0;
	}
	echo "                     $deposit->fullname: $" . number_format($deposit->amount,2) . "<br />";
	$depositTotal += $deposit->amount;
}
if(count($this->depositscash) > 0) {
	echo "                     </div>$" . number_format($depositTotal, 2) . "</td>\n";
	echo "                     <td>&nbsp;</td>\n";
	echo "                     <td>&nbsp;</td>\n";
	echo "                  </tr>\n";
}
$camp = $this->campers[0];
$ymca = 0;
echo "                  <tr><td colspan='4'><hr /><b>Amount Due to YMCA Lake of the Ozarks</b></td></tr>\n";
echo "                  <tr>\n";
echo "                     <td align='right'>$camp->adultsinside Adults @528:</td>\n";
echo "                     <td align='right'>$" . number_format($camp->adultsinside*528, 2) . "</td>\n";
$ymca = $camp->adultsinside*528;
echo "                     <td>Adults in Trout Lodge, Forestview, or Lakeview</td>\n";
echo "                  </tr>\n";
echo "                  <tr>\n";
echo "                     <td align='right'>$camp->childreninside Children @252:</td>\n";
echo "                     <td align='right'>$" . number_format($camp->childreninside*252, 2) . "</td>\n";
$ymca += $camp->childreninside*252;
echo "                     <td>Children (5-17) in Trout Lodge, Forestview, or Lakeview</td>\n";
echo "                  </tr>\n";
echo "                  <tr>\n";
echo "                     <td align='right'>$camp->adultsoutside Adults @282:</td>\n";
echo "                     <td align='right'>$" . number_format($camp->adultsoutside*282, 2) . "</td>\n";
$ymca += $camp->adultsoutside*282;
echo "                     <td>Adults in North Hall or Tent Camping</td>\n";
echo "                  </tr>\n";
echo "                  <tr>\n";
echo "                     <td align='right'>$camp->childrenoutside Children @156:</td>\n";
echo "                     <td align='right'>$" . number_format($camp->childrenoutside*156, 2) . "</td>\n";
$ymca += $camp->childrenoutside*156;
echo "                     <td>Children (5-17) Tent Camping</td>\n";
echo "                  </tr>\n";
echo "                  <tr>\n";
echo "                     <td align='right'>$camp->ya Adults @354:</td>\n";
echo "                     <td align='right'>$" . number_format($camp->ya*354, 2) . "</td>\n";
$ymca += $camp->ya*354;
echo "                     <td>Adults in Camp Lakewood</td>\n";
echo "                  </tr>\n";
echo "                  <tr>\n";
echo "                     <td align='right'>$camp->high Children @276:</td>\n";
echo "                     <td align='right'>$" . number_format($camp->high*276, 2) . "</td>\n";
$ymca += $camp->high*276;
echo "                     <td>Children (5-17) in Camp Lakewood</td>\n";
echo "                  </tr>\n";
echo "                  <tr>\n";
echo "                     <td>Total Amount Due to YMCA Lake of the Ozarks:</td>\n";
echo "                     <td align='right'>$" . number_format($ymca, 2) . "</td>\n";
echo "                     <td>&nbsp;</td>\n";
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

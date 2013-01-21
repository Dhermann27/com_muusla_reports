<?php defined('_JEXEC') or die('Restricted access'); ?>
<div id="ja-content">
	<div class="componentheading">All Deposits</div>
	<table class="blog" cellpadding="0" cellspacing="0">
		<?php
		$user = JFactory::getUser();
		$admin = in_array("8", $user->groups) || in_array("10", $user->groups);
		echo "      <tr>\n";
		echo "         <td valign='top'>\n";
		echo "            <div>\n";
		echo "            <div class='article-content'>\n";
		echo "               <table cellpadding='5' cellspacing ='5'>\n";
		echo "                  <tr>\n";
		echo "                     <td>Last Name</td>\n";
		echo "                     <td>First Name</td>\n";
		echo "                     <td>Amount</td>\n";
		echo "                     <td>Memo</td>\n";
		echo "                  </tr>\n";
		echo "                  <tr>\n";
		echo "                     <td colspan='4'><b>All Paypal Deposits</b></td>\n";
		echo "                  </tr>\n";
		$count = 0;
		foreach ($this->paypals as $charge) {
			echo "                  <tr>\n";
			echo "                     <td>$charge->lastname</td>\n";
			echo "                     <td>$charge->firstname</td>\n";
			echo "                     <td>$" . number_format(abs($charge->amount),2) . "</td>\n";
			$count += $charge->amount;
			echo "                     <td>$charge->memo</td>\n";
			echo "                  </tr>\n";
		}
		echo "                  <tr>\n";
		echo "                     <td colspan='4'><p><b>Total</b>: $" . number_format(abs($count),2) . "</p>\n";
		if($admin) {
			echo "                     <p align='center'>\n";
			echo "                     <form action='index.php?option=com_muusla_reports&view=alldeposits&Itemid=71' method='post'>\n";
			echo "                        <input type='hidden' name='paypals' value='1' />\n";
			echo "                        <input type='submit' value='Mark All Paypals as Deposited' /></form>\n";
		}
		echo "                     </td>\n";
		echo "                  </tr>\n";
		echo "                  <tr>\n";
		echo "                     <td colspan='4'><b>All Check Deposits</b></td>\n";
		echo "                  </tr>\n";
		$count = 0;
		foreach ($this->checks as $charge) {
			echo "                  <tr>\n";
			echo "                     <td>$charge->lastname</td>\n";
			echo "                     <td>$charge->firstname</td>\n";
			echo "                     <td>$" . number_format(abs($charge->amount),2) . "</td>\n";
			$count += $charge->amount;
			echo "                     <td>$charge->memo</td>\n";
			echo "                  </tr>\n";
		}
		echo "                  <tr>\n";
		echo "                     <td colspan='4'><p><b>Total</b>: $" . number_format(abs($count),2) . "</p>\n";
		if($admin) {
			echo "                     <p align='center'>\n";
			echo "                     <form action='index.php?option=com_muusla_reports&view=alldeposits&Itemid=71' method='post'>\n";
			echo "                        <input type='hidden' name='checks' value='1' />\n";
			echo "                        <input type='submit' value='Mark All Checks as Deposited' /></form>\n";
		}
		echo "                     </td>\n";
		echo "                  </tr>\n";
		echo "                  <tr>\n";
		echo "                     <td colspan='4'><b>All Credit Card Deposits</b></td>\n";
		echo "                  </tr>\n";
		$count = 0;
		foreach ($this->creditcards as $charge) {
			echo "                  <tr>\n";
			echo "                     <td>$charge->lastname</td>\n";
			echo "                     <td>$charge->firstname</td>\n";
			echo "                     <td>$" . number_format(abs($charge->amount),2) . "</td>\n";
			$count += $charge->amount;
			echo "                     <td>$charge->memo</td>\n";
			echo "                  </tr>\n";
		}
		echo "                  <tr>\n";
		echo "                     <td colspan='4'><p><b>Total</b>: $" . number_format(abs($count),2) . "</p>\n";
		if($admin) {
			echo "                     <p align='center'>\n";
			echo "                     <form action='index.php?option=com_muusla_reports&view=alldeposits&Itemid=71' method='post'>\n";
			echo "                        <input type='hidden' name='creditcards' value='1' />\n";
			echo "                        <input type='submit' value='Mark All Credit Cards as Deposited' /></form>\n";
		}
		echo "                     </td>\n";
		echo "                  </tr>\n";
		echo "                  <tr>\n";
		echo "                     <td colspan='4'><b>All Cash Deposits</b></td>\n";
		echo "                  </tr>\n";
		$count = 0;
		foreach ($this->cash as $charge) {
			echo "                  <tr>\n";
			echo "                     <td>$charge->lastname</td>\n";
			echo "                     <td>$charge->firstname</td>\n";
			echo "                     <td>$" . number_format(abs($charge->amount),2) . "</td>\n";
			$count += $charge->amount;
			echo "                     <td>$charge->memo</td>\n";
			echo "                  </tr>\n";
		}
		echo "                  <tr>\n";
		echo "                     <td colspan='4'><p><b>Total</b>: $" . number_format(abs($count),2) . "</p>\n";
		if($admin) {
			echo "                     <p align='center'>\n";
			echo "                     <form action='index.php?option=com_muusla_reports&view=alldeposits&Itemid=71' method='post'>\n";
			echo "                        <input type='hidden' name='cash' value='1' />\n";
			echo "                        <input type='submit' value='Mark All Cash as Deposited' /></form>\n";
		}
		echo "                     </td>\n";
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

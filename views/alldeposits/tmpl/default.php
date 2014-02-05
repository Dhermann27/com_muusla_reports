<?php defined('_JEXEC') or die('Restricted access'); 
$user = JFactory::getUser();
$admin = in_array("8", $user->groups) || in_array("10", $user->groups);?>
<div id="ja-content">
   <div class="componentheading">All Deposits</div>
   <table class="blog">
      <tr>
         <td valign="top">
            <div>
               <div class="article-content">
                  <table>
                     <tr>
                        <td>Family Name</td>
                        <td>Amount</td>
                        <td>Memo</td>
                        <td>&nbsp;</td>
                     </tr>
                     <tr>
                        <td colspan="4"><strong>All Paypal Deposits</strong>
                        </td>
                     </tr>
                     <?php $count = 0;
                     foreach ($this->paypals as $charge) {
                        echo "                  <tr>\n";
                        echo "                     <td>$charge->name</td>\n";
                        echo "                     <td>$" . number_format(abs($charge->amount),2) . "</td>\n";
                        $count += $charge->amount;
                        echo "                     <td>$charge->memo</td>\n";
                        echo "                     <td align='right'><a href='" . JURI::root(true) . "/index.php/register?editcamper=$charge->camperid'>Registration Form</a></td>\n";
                        echo "                  </tr>\n";
                     }
                     echo "                  <tr>\n";
                     echo "                     <td colspan='4'><p><b>Total</b>: $" . number_format(abs($count),2) . "</p>\n";
                     if($admin) {
                        echo "                     <p align='center'>\n";
                        echo "                     <form method='post'>\n";
                        echo "                        <input type='hidden' name='paypals' value='1' />\n";
                        echo "                        <input type='submit' value='Mark All Paypals as Deposited' /></form>\n";
                     }
                     echo "                     </td>\n";
                     echo "                  </tr>\n";?>
                     <tr>
                        <td colspan="4"><strong>All Check Deposits</strong>
                        </td>
                     </tr>
                     <?php $count = 0;
                     foreach ($this->checks as $charge) {
                        echo "                  <tr>\n";
                        echo "                     <td>$charge->name</td>\n";
                        echo "                     <td>$" . number_format(abs($charge->amount),2) . "</td>\n";
                        $count += $charge->amount;
                        echo "                     <td>$charge->memo</td>\n";
                        echo "                     <td align='right'><a href='" . JURI::root(true) . "/index.php/register?editcamper=$charge->camperid'>Registration Form</a></td>\n";
                        echo "                  </tr>\n";
                     }
                     echo "                  <tr>\n";
                     echo "                     <td colspan='4'><p><b>Total</b>: $" . number_format(abs($count),2) . "</p>\n";
                     if($admin) {
                        echo "                     <p align='center'>\n";
                        echo "                     <form method='post'>\n";
                        echo "                        <input type='hidden' name='checks' value='1' />\n";
                        echo "                        <input type='submit' value='Mark All Checks as Deposited' /></form>\n";
                     }
                     echo "                     </td>\n";
                     echo "                  </tr>\n";?>
                     <tr>
                        <td colspan="4"><strong>All Credit Card Deposits</strong>
                        </td>
                     </tr>
                     <?php $count = 0;
                     foreach ($this->creditcards as $charge) {
                        echo "                  <tr>\n";
                        echo "                     <td>$charge->name</td>\n";
                        echo "                     <td>$" . number_format(abs($charge->amount),2) . "</td>\n";
                        $count += $charge->amount;
                        echo "                     <td>$charge->memo</td>\n";
                        echo "                     <td align='right'><a href='" . JURI::root(true) . "/index.php/register?editcamper=$charge->camperid'>Registration Form</a></td>\n";
                        echo "                  </tr>\n";
                     }
                     echo "                  <tr>\n";
                     echo "                     <td colspan='4'><p><b>Total</b>: $" . number_format(abs($count),2) . "</p>\n";
                     if($admin) {
                        echo "                     <p align='center'>\n";
                        echo "                     <form method='post'>\n";
                        echo "                        <input type='hidden' name='creditcards' value='1' />\n";
                        echo "                        <input type='submit' value='Mark All Credit Cards as Deposited' /></form>\n";
                     }
                     echo "                     </td>\n";
                     echo "                  </tr>\n";?>
                     <tr>
                        <td colspan="4"><strong>All Cash Deposits</strong>
                        </td>
                     </tr>
                     <?php $count = 0;
                     foreach ($this->cash as $charge) {
                        echo "                  <tr>\n";
                        echo "                     <td>$charge->name</td>\n";
                        echo "                     <td>$" . number_format(abs($charge->amount),2) . "</td>\n";
                        $count += $charge->amount;
                        echo "                     <td>$charge->memo</td>\n";
                        echo "                     <td align='right'><a href='" . JURI::root(true) . "/index.php/register?editcamper=$charge->camperid'>Registration Form</a></td>\n";
                        echo "                  </tr>\n";
                     }
                     echo "                  <tr>\n";
                     echo "                     <td colspan='4'><p><b>Total</b>: $" . number_format(abs($count),2) . "</p>\n";
                     if($admin) {
                        echo "                     <p align='center'>\n";
                        echo "                     <form method='post'>\n";
                        echo "                        <input type='hidden' name='cash' value='1' />\n";
                        echo "                        <input type='submit' value='Mark All Cash as Deposited' /></form>\n";
                     }
                     echo "                     </td>\n";
                     echo "                  </tr>\n";
                     ?>
                  </table>
               </div>
               <span class="article_separator">&nbsp;</span>
            </div>
         </td>
      </tr>
   </table>
</div>

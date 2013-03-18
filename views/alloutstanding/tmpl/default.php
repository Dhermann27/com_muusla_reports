<?php defined('_JEXEC') or die('Restricted access'); ?>
<div id="ja-content">
   <div class="componentheading">All Outstanding Balances</div>
   <p>
      <i>Please note that this list may contain people whose final
         balances are already zero because of housing credits which are
         ignored on this report.</i>
   </p>
   <table class="blog" cellpadding="0" cellspacing="0">
      <?php
      echo "      <tr>\n";
      echo "         <td valign='top'>\n";
      echo "            <div>\n";
      echo "            <div class='article-content'>\n";
      echo "               <table cellpadding='5' cellspacing ='5'>\n";
      echo "                  <tr>\n";
      echo "                     <td>Name</td>\n";
      echo "                     <td>Total Balance</td>\n";
      echo "                     <td>Total Due Now</td>\n";
      echo "                     <td>&nbsp;</td>\n";
      echo "                  </tr>\n";
      $fullcount = 0;
      $nowcount = 0;
      foreach ($this->charges as $camperid => $camper) {
         if($camper["totallater"] > 0) {
            $fullcount += $camper["totallater"];
            $nowcount += max($camper["totalnow"],0);
            echo "                  <tr>\n";
            echo "                     <td>" . $camper["familyname"] . "</td>\n";
            echo "                     <td>$" . number_format($camper["totallater"], 2) . "</td>\n";
            echo "                     <td>$" . number_format(max($camper["totalnow"],0), 2) . "</td>\n";
            echo "                     <td align='right'><a href='" . JURI::root(true) . "/index.php/register?editcamper=" . $camper['familyid'] . "'>Registration Form</a></td>\n";
            echo "                  </tr>\n";
         }
      }
      echo "                  <tr>\n";
      echo "                     <td align='right'>Total Outstanding:</td>\n";
      echo "                     <td>$" . number_format($fullcount, 2) . "</td>\n";
      echo "                     <td>$" . number_format($nowcount, 2) . "</td>\n";
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

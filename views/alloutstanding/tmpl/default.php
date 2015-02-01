<?php defined('_JEXEC') or die('Restricted access');
$user = JFactory::getUser();?>
<link type="text/css"
   href="<?php echo JURI::root(true);?>/components/com_muusla_application/css/application.css"
   rel="stylesheet" />
<script type="text/javascript">
   jQuery(document).ready(function ($) {
	    $("#muusaApp .save").click(function (event) {
	    	$("#muusaApp").submit();
	        event.preventDefault();
	        return false;
	    });
   });
</script>
<div id="ja-content">
   <div class="componentheading">All Outstanding Balances</div>
   <table class="blog">
      <tr>
         <td valign="top">
            <div>
               <div class="article-content">

                  <form id="muusaApp" method="post">
                     <table>
                        <tr>
                           <td>Family Name</td>
                           <td>Amount</td>
                           <td>Chargetype</td>
                           <td>Amount</td>
                           <td>Memo</td>
                           <td>&nbsp;</td>
                        </tr>
                        <?php 
                        $total = 0.0;
                        foreach ($this->families as $family) {?>
                        <tr>
                           <td><?php echo $family->name;?> <input
                              type="hidden"
                              name="charge-familyid-<?php echo $family->id;?>"
                              value="<?php echo $family->id;?>" /><input
                              type="hidden"
                              name="charge-year-<?php echo $family->id;?>"
                              value="<?php echo $this->year;?>" />
                           </td>
                           <td>$<?php echo number_format($family->amount, 2);?>
                           </td>
                           <td><select
                              name="charge-chargetypeid-<?php echo $family->id;?>"
                              class="ui-corner-all">
                                 <?php foreach($this->chargetypes as $chargetype) {
                                    echo "                     <option value='$chargetype->id'>$chargetype->name</option>\n";
                                 }?>
                           </select>
                           </td>
                           <td><input type="text"
                              name="charge-amount-<? echo $family->id;?>"
                              class="inputtexttiny ui-corner-all" /></td>
                           <td><input type="text"
                              name="charge-memo-<? echo $family->id;?>"
                              class="inputtext ui-corner-all"
                              value="<?php echo $charge->memo;?>" /></td>
                           <?php if(in_array("8", $user->groups) || in_array("10", $user->groups)) {
                              echo "                     <td align='right' nowrap='nowrap'><a class='myhidden' href='" . JURI::root(true) . "/index.php/register?editcamper=$family->id' title='Registration Form'><i class='fa fa-user fa-2x'></i></a>\n";
                              echo "                     <a href='" . JURI::root(true) . "/index.php/registration/workshops?editcamper=$family->id' title='Workshop Selection'><i class='fa fa-tasks fa-2x'></i></a>\n";
                              echo "                     <a href='" . JURI::root(true) . "/index.php/rooms?editcamper=$family->id' title='Assign Room'><i class='fa fa-home fa-2x'></i></a></td>\n";
                           } else {
                              echo "                     <td>&nbsp;</td>\n";
                           }
                           echo "                  </tr>\n";
                           $total += $family->amount;
                        }?>
                        
                        
                        <tr>
                           <td colspan='6' align='right'><strong>Total
                                 Amount Due: $<?php echo number_format($total, 2);?>
                           </strong>
                           </td>
                        </tr>
                     </table>
                     <div class="right">
                        <button class="save">Save All Charges</button>
                     </div>
                  </form>
               </div>
            </div>
         </td>
      </tr>
   </table>
</div>

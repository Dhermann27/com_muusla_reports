<?php defined('_JEXEC') or die('Restricted access');
$user = JFactory::getUser();?>
<link type="text/css"
   href="<?php echo JURI::root(true);?>/components/com_muusla_application/css/application.css"
   rel="stylesheet" />
<div id="ja-content">
   <div class="componentheading">All Churches by State (by Year)</div>
   <table class="blog">
      <tr>
         <td valign="top">
            <div>
               <div id="muusaApp" class="article-content">
                  <ul>
                     <?php
                     foreach ($this->years as $year => $statelist) {?>
                     <li><a
                        href="http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "#year" . $year;?>"><?php echo $year;?>
                     </a></li>
                     <?php }?>
                  </ul>
                  <?php foreach ($this->years as $year => $statelist) {?>
                  <div id="year<?php echo $year;?>">
                     <?php
                     foreach ($statelist as $statecd => $churchlist) {?>
                     <div class="state">
                        <h4>
                           <span class="right"><?php echo $churchlist->count;?>
                           </span>
                           <?php echo $statecd;?>
                        </h4>
                        <div>
                           <table>
                              <tr>
                                 <td>Church Name</td>
                                 <td>City</td>
                                 <td>Count</td>
                              </tr>
                              <?php foreach($churchlist->churches as $church) {?>
                              <tr>
                                 <td><?php echo $church->churchname;?></td>
                                 <td><?php echo $church->churchcity;?></td>
                                 <td><?php echo $church->count;?></td>
                              </tr>
                              <?php }?>
                           </table>
                        </div>
                     </div>
                     <?php 
                     }?>
                  </div>
                  <?php }?>
               </div>
               <span class='article_separator'>&nbsp;</span>
            </div>

         </td>
      </tr>
   </table>
   <script type="text/javascript">
   jQuery(document).ready(function($) {
		$("#muusaApp").tabs({
			active : <?php echo count($years)-1;?>
		});
		$(".state").accordion({
			active: false,
			collapsible: true,
			header : "h4",
			heightStyle : "content"
		});
   });</script>
</div>

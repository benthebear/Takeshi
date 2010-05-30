<?php 
	// At first, generate the classes of the node
	$classes = thememe_tt_get_pageclasses();
	$classstring = implode(" ", $classes);	

	global $thememe;
	
	
?>
<!doctype html>
<html>
<head>    
  <title><?php print $head_title ?></title>
  <?php print $head ?>
  <?php print $styles ?>
  <?php print $scripts ?>
	<script type="text/javascript" src="/sites/default/themes/takeshi/functions.js"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
</head>
<body  class="<?=$classstring?>">
	<?
	if($is_admin){
	// krumo(get_defined_vars());
	// krumo($thememe);
	// krumo($node);
	}	
	?>
    <div id="header" class="region">  
		<h1><a title="Startseite" href="http://anmutunddemut.de">anmut und demut</a> </h1> 
		<?if($thememe["page"] and $node->type=='moblog'){print "<h2>".$title."</h2>"; }?>
		<p>			
			
				
			<?=takeshi_getme_backandforth($thememe)?>
		
			&nbsp; <a title="Archiv" href="http://anmutunddemut.de/archive">archiv</a>
			&nbsp; <a title="Register" href="http://anmutunddemut.de/register">register</a>
			&nbsp; <a title="Impressum" href="http://anmutunddemut.de/impressum">impressum</a>
			&nbsp; <a title="Feeds" href="http://anmutunddemut.de/feeds">feeds</a>		
		
			<?
			// Admin Only Menu
			if(user_access("search content")){?>
			&nbsp; <a href="http://anmutunddemut.de/search">suche</a>
			<?}
			if($is_admin){?>						
			&nbsp; <a href="http://anmutunddemut.de/admin">admin</a>
			<?}?>

		</p> 
    </div>
		
		
		<?php if ($left) { ?>
    <div id="sidebar-left" class="region sidebar">
      <?php print $left ?>
    </div><?php } ?>
      
    <?php if ($right) { ?>
    <div id="sidebar-right" class="region sidebar">	
    	<?php print $right ?>    	
    </div>
    <?php } ?>   
    
    <div id="arena">
        <?php if($pre){?>
    	<div id="pre" class="region">
    		<?php print $pre ?>
    		<hr class="clear hideme"/>
    	</div>
    	<?php }?>
    	
      <?php if ($mission) { ?><div id="mission"><?php print $mission ?></div><?php } ?>
      <div id="content" class="region">
        <?php //print $breadcrumb ?>
        <?php if($node->type != 'moblog'):?><h2 class="title"><?php print $title ?></h2><?php endif; ?> 
 	 	<?php if (!empty($tabs) and !$thememe["page"]): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?> 
        <?php print $help ?>
        <?php if ($messages!="") { 
			print '<div id="themessages" style="visibility:visible">';
			print "<p class='hideme'><a href=\"javascript:shownhide('themessages');\">x</a></p>";
			print "<p>".t("Messages")."</p>";
			print $messages; 			
			print '</div>';
		} ?>
        <?php print $content; ?>
        <?php print $feed_icons; ?>
      </div>
      
      <?php if($post){?>      
    	<div id="post" class="region">
    		<?php print $post ?>
    	</div> 
    	<?php }?>
    	
    </div>  
    
   
    
    <div id="footer" class="region">
  		<?php print $footer_message ?>
  		<?php print $footer ?>
	  </div>
    
</body>
</html>
<?php 
	// At first, generate the classes of the node
	$classes = thememe_tt_get_nodeclasses($node, $page, $teaser);

	$classstring = implode(" ", $classes);	

	global $thememe;
	if($is_admin){
	//krumo(get_defined_vars());
	//krumo($node);
	}
	
?>	



<div class="<?=$classstring?>">	
			<span class="date"><?=date("j. n. Y", $node->created)?></span>				
		  <?if($node->field_teaserimage[0]["value"]!=""  ){
      print "<img src='".$node->field_teaserimage[0]["value"]."' alt='".thememe_cleanxml($title)."'/>";
      }?>   
      <span class="title"><a href="<?php print $node_url?>"><?php print $title?></a></span>
      <span class="commentcount"><?=$node->comment_count?> Kommentare</span>
</div>


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
    <?php if ($picture) {
      print $picture;
    }?>
	<?php if($page and $node->field_css[0]["value"]){?>
		<style type="text/css">	
			<?=$node->field_css[0]["value"]?>
		</style>	
	<?}?>
    
		<h2 class="title"><a href="<?php print $node_url?>"><?php print $title?></a></h2>
		<p class="metadata">
			<span class="date"><?=date("j. n. Y", $node->created)?><br/></span>
			<span class="commentcount"><?=l( $node->comment_count." Kommentare", 'node/'.$node->nid, array("fragment" => "comments"))?><br/></span>
			<span class="clickcount"><?=$node->links["statistics_counter"]["title"]?></span>
		</p>
	
    <div class="content">
      <?if(($node->field_teaserimage[0]["value"]!="" and $page==0) or ($node->field_teaserimage[0]["value"]!="" and $node->field_hideimage[0]["value"]!="1" and $page==1)){
        print "<p class='teaserimage'><img src='".$node->field_teaserimage[0]["value"]."' alt='".thememe_cleanxml($title)."'/></p>";
      }?>
    <?php print($content);?>
   		
	 	  <?if($readmore and $teaser){
			print("<p class='readmore'>".l("Weiterlesen …", "node/".$nid)."</p>");
		}?>
    </div>    
</div>


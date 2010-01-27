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
    <?php if ($page == 0) { ?>
		<h2 class="title"><a href="<?php print $node_url?>"><?php print $title?></a></h2>
		<p class="metadata">
			<?=date("j. n. Y", $node->created)?><br/>
			<?=l( $node->comment_count." Kommentare", 'node/'.$node->nid, array("fragment" => "comments"))?><br/>
			<?=$node->links["statistics_counter"]["title"]?>
		</p>
	<?php }; ?>   
    <div class="content">
      <?if($node->field_teaserimage[0]["value"]!=""){
        print "<p class='teaserimage'><img src='".$node->field_teaserimage[0]["value"]."'/></p>";
      }?>
   		<?=$content?> 	
	 	  <?if($readmore and $teaser){
			print("<p class='readmore'>".l("Weiterlesen …", "node/".$nid)."</p>");
		}?>
    </div>    
</div>

<? if($page){?>
<div id="footnotes">
  
  <!-- Datum, Nodetype, Klicks, Navi -->
  
	<div id="firstline">		
		~ <?=t($node->type)?> vom <?=date("j. n. Y", $node->created)?> &nbsp;  – 
		
		<?php if ($links) { ?><?php print $links?><?php }; ?>
		
		<?
		$backandforth = backandforth_data($node->created);
		
		// Set default Strings
		$backwards_string = "< ".t("backwards");
		$forwards_string = t("forwards")." >";

		// Additionally add Links if there are node
		if($backandforth["backwards_node"]){
			$backwards_string = l($backwards_string, "node/".$backandforth["backwards_node"]);
		}	
		if($backandforth["forwards_node"]){
			$forwards_string = l($forwards_string, "node/".$backandforth["forwards_node"]);
		}	

		// Actually generate the Output;
	
		$output .= "<span class='backwardslink'>".$backwards_string."</span>";
		$output .= "<span class='and'> &amp; </span>";
		$output .= "<span class='forwardslink'>".$forwards_string."</span>";
		
		print $output;
		?>
	</div>
	
	<!-- Terms -->
	
	<?php if (count($node->taxonomy)>0){
		print "<div id='mytags'>~  ";
		foreach($node->taxonomy as $term){			
			$myterms[$term->vid][] = l($term->name, "taxonomy/term/".$term->tid, array("attributes" => array("class" => "voc".$term->vid)));
			
		}
		if (count($myterms["2"])!=0){
			$vocab["ressort"] = "Ressort: ".implode ($myterms["2"], ", ");
		}
		if (count($myterms["3"])!=0){
			$vocab["series"] = "Serie: ".implode ($myterms["3"], ", ");
		}
		if (count($myterms["1"])!=0){
			$vocab["lexicon"] = "Lexikon: ".implode ($myterms["1"], ", ");
		}
		print implode ($vocab ,"&nbsp;&nbsp;&nbsp;");
		print "</div>";
	}?>
	
	<!-- Teaserimage -->
	
	<?php
	if($node->field_teaser_source[0]["value"]!=""){
	  print "<div id='mytags'>~ Aufmacherbild: ";
	  if($node->field_teaser_link[0]["value"] !=""){
	    print l($node->field_teaser_source[0]["safe"], $node->field_teaser_link[0]["value"]);
	  }else{
	    print $node->field_teaser_source[0]["safe"];
	  }
	  print "</div>";
	}
	
	?>
	
	<!-- Lokal Tasks -->
	
	<?
	if(count($thememe["local-tasks"]["primary"])>0){
		print "<p id='mytasks'>~ Tasks: ";
		foreach($thememe["local-tasks"]["primary"] as $task){
			$mytasks[]  = l($task["text"], "http://anmutunddemut.de".$task["href"], array("attributes" => array("class" => $task["class"])));
		}
		print implode ($mytasks ,", ");
		print "</p>";
	}	
	?>
</div>
<?}?>
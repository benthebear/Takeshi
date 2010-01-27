<?php

//drupal_rebuild_theme_registry();



/**
 * Allow themable wrapping of all comments.
 */
function phptemplate_comment_wrapper($content, $node) {
  if (!$content || $node->type == 'forum') {
    return '<div id="comments">'. $content .'</div>';
  }
  else {
    return '<div id="comments"><h2 class="comments">'. t('Comments') .'</h2>'. $content .'</div>';
  }
}

function takeshi_getme_backandforth($thememe){
	$output = "";
	if($thememe["page"]){		
		
		$backandforth = backandforth_data($thememe["vars"]["node"]["created"]);

		// Set default Strings
		$backwards_string = "< rückwärts";
		$forwards_string =  " vorwärts >";

		// Additionally add Links if there are node
		if($backandforth["backwards_node"]){
			$backwards_string = l($backwards_string, "node/".$backandforth["backwards_node"]);
		}	
		if($backandforth["forwards_node"]){
			$forwards_string = l($forwards_string, "node/".$backandforth["forwards_node"]);
		}	

		// Actually generate the Output;
		$output .= "<span class='backandforth'>";
		$output .= "&nbsp;<span class='headericon backwardslink'>".$backwards_string."</span>";			
		$output .= " &amp; <span class='headericon forwardslink'>".$forwards_string."</span>";
		$output .= "</span>";
		
	}
	return $output;
}
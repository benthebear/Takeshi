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
    return '<hr/><div id="comments"><h2 class="comments">'. t('Comments') .'</h2>'. $content .'</div>';
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

function takeshi_get_favicon($url) {
    $request = drupal_http_request($url, 'r');
    if ($request) {        
            if (preg_match('/<link[^>]+rel="(?:shortcut )?icon"[^>]+?href="([^"]+?)"/si', $request->data, $matches)) {
                $linkUrl = html_entity_decode($matches[1]);
                if (substr($linkUrl, 0, 1) == '/') {
                    $urlParts = parse_url($url);
                    $faviconURL = $urlParts['scheme'].'://'.$urlParts['host'].$linkUrl;
                } elseif (substr($linkUrl, 0, 7) == 'http://') {
                    $faviconURL = $linkUrl;
                } elseif (substr($url, -1, 1) == '/') {
                    $faviconURL = $url.$linkUrl;
                } else {
                    $faviconURL = $url.'/'.$linkUrl;
                }
            } else {
                $urlParts = parse_url($url);
                $faviconURL = $urlParts['scheme'].'://'.$urlParts['host'].'/favicon.ico';
            }
            $HTTPRequest = @fopen($faviconURL, 'r');
            if ($HTTPRequest) {
                stream_set_timeout($HTTPRequest, 0.1);
                $favicon = fread($HTTPRequest, 8192);
                $HTTPRequestData = stream_get_meta_data($HTTPRequest);
                fclose($HTTPRequest);
                if (!$HTTPRequestData['timed_out'] && strlen($favicon) < 8192) {
                    return $faviconURL;
                }
            }
        
    }
	return "false";
}
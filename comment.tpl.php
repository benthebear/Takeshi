<!-- Kommentar Anfang -->

<div class="comment<?php if (isset($comment->status) && $comment->status == COMMENT_NOT_PUBLISHED) print ' comment-unpublished'; ?>">
    <hr size="1"/>
	<p class="metadata">von 
    <?php 
    	global $user;
    	$url = "";   	

    	if($comment->uid!="0"){
    		$commentator = user_load($comment->uid);
    		if($commentator->profile_homepage){
    			$url = $commentator->profile_homepage;
    		}else{
    			$url = "user/".$commentator->uid;
    		}    		
    	}elseif($comment->homepage){
    		$url = $comment->homepage;
    	}

    	if($url!=""){
    		print l($comment->name, $url);
    	}else{
    		print $comment->name;
    	}

      print " ".l('#', 'node/'.$comment->nid, array('fragment' => 'comment-'.$comment->cid, 'attributes' => array('id'=>'comment-'.$comment->cid))); 
    ?>
    </p>
		 <!-- <h3 class="title"><?php print $title; ?></h3><?php if ($new != '') { ?><span class="new"><?php print $new; ?></span><?php } ?> -->		
    <div class="content">
      
     <?php 
     // Legacy: Für allte Kommentare mit Title und gaaaanz alte Kommentare mit leerem Titel
     if(substr($comment->subject, 0, 10) != substr(strip_tags($comment->comment), 0, 10) and $comment->subject != ""){
       print "<p>".$comment->subject."</p>";
     }
     print $content; 
     ?>     
    </div>    	
    <!-- <div class="links"><?php print $links; ?></div> -->
</div>
<!-- Kommentar Ende -->
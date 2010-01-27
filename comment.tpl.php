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

    ?>
    </p>
		<h3 class="title"><?php print $title; ?></h3><?php if ($new != '') { ?><span class="new"><?php print $new; ?></span><?php } ?>
    <div class="content">
     <?php print $content; ?>
     <?php if ($signature): ?>
      <div class="clear-block">
       <div>—</div>
       <?php print $signature ?>
      </div>
     <?php endif; ?>
    </div>    	
    <!-- <div class="links"><?php print $links; ?></div> -->
</div>
<!-- Kommentar Ende -->
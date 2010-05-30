<?php

$classes = thememe_tt_get_nodeclasses($node, $page, $teaser);

if($page){
  include("node-full.tpl.php");  
}elseif(arg(0)=="taxonomy" and arg(1)=="term" and is_numeric(arg(2))
        or arg(0) == "archive"){
  include("node-teaser-list.tpl.php");
}else{
  include("node-teaser-big.tpl.php");
}


?>
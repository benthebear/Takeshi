<?php
// $Id: views-view.tpl.php,v 1.13 2009/06/02 19:30:44 merlinofchaos Exp $
/**
 * @file views-view.tpl.php
 * Main view template
 *
 * Variables available:
 * - $css_name: A css-safe version of the view name.
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 * - $admin_links: A rendered list of administrative links
 * - $admin_links_raw: A list of administrative links suitable for theme('links')
 *
 * @ingroup views_templates
 */
?>


<ul>
 
  <?php
  foreach($view->result as $ti){
    print "<li>";
    //print_r($ti);
    print l("<img src='".$ti->node_data_field_teaserimage_field_teaserimage_value."' width='161' alt='".thememe_cleanxml($ti->node_title)."'/>", "node/".$ti->nid, array('html'=>'TRUE', 'attributes'=>array('title'=>$ti->node_title)));    
    print "</li>";
  }   
  ?>

</ul>
<?php /* class view */ ?>
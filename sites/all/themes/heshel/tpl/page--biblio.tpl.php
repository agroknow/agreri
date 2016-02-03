<?php require_once(drupal_get_path('theme','heshel').'/tpl/header.tpl.php');
global $base_url;
?>
<?php if(substr($title,0,1) != "_") { ?>
<h2 class="title" style="text-align:center; padding-top:20px; padding-bottom:20px; max-width:976px; margin-left:auto; margin-right:auto;">
<a href="<?php print $node_url?>">
<?php print $title?></a></h2> <?php
    } ?>
<?php
        if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
                print render($tabs);
        endif;
        print $messages;
        unset($page['content']['system_main']['default_message']);
?>
<div class="wrapper">
        <div class="container" style="max-width:976px;">
 	     <?php print render($page['top_content']); ?>
             <?php print render($page['content']); ?>
        </div>
		
</div>
<?php require_once(drupal_get_path('theme','heshel').'/tpl/footer.tpl.php'); ?>

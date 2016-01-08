<?php require_once(drupal_get_path('theme','heshel').'/tpl/header.tpl.php');

global $base_url;
?>
<?php if(substr($title,0,1) != "_") { ?> 
<h2 class="title" style="text-align:center; padding-top:20px; padding-bottom:20px;">
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
        <div class="container">
                <div class="content_block row right-sidebar">
                        <div class="fl-container hasRS">
                                <div class="posts-block">
                                        <div class="contentarea">
                                                <?php print render($page['content']); ?>
                                        </div>
                                </div>
                        </div>
                        <div class="right-sidebar-block">
                                <?php print render($page['sidebar']); ?>
                        </div>
                        <div class="clear"></div>
                </div>
        </div>
</div>
<?php require_once(drupal_get_path('theme','heshel').'/tpl/footer.tpl.php'); ?>

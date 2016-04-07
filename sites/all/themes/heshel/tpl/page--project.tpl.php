<?php require_once(drupal_get_path('theme','heshel').'/tpl/header.tpl.php');
global $base_url;
drupal_set_title('');
?>
<?php
        if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
                print render($tabs);
        endif;
        print $messages;
        unset($page['content']['system_main']['default_message']);
?>

<div class="wrapper">
        <div class="container">
                <div class="content_block row no-sidebar">
                        <div class="page_title">
                                <h1><?php print drupal_get_title(); ?></h1>
                        </div>
                        <div class="fl-container">
                                <div class="posts-block">
                                        <div class="contentarea">
                                                <div class="rounded-corners" style="max-width:976px; margin-left:auto; margin-right:auto; background-color:#EEEEEE; padding:10px;">	
                                                <?php  if($page['content']):?>
                                                        <?php print render($page['content']); ?>
                                                <?php endif; ?>
                                                <?php  if($page['section_content']):?>
                                                        <?php print render($page['section_content']); ?>
                                                <?php endif; ?>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
<br />
<br />
<?php require_once(drupal_get_path('theme','heshel').'/tpl/footer.tpl.php'); ?>


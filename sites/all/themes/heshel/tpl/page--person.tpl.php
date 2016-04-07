<?php require_once(drupal_get_path('theme','heshel').'/tpl/header.tpl.php');

global $base_url;
?>
<?php
        global $language ;
        $lang = $language->language ;
?>

<?php if ($breadcrumb): ?>
<?php if ($lang == 'en'): ?>
<div class="breadcrumbs type2">
        <div class="container">
		<?php print str_replace('<i class="fa fa-angle-right"></i>',
				 '<i class="fa fa-angle-right"></i><a href="/en/staff">Staff</a>',$breadcrumb); ?>
	</div>
</div>
<?php endif; ?>
<?php if($lang == 'el'): ?>
<div class="breadcrumbs type2">
        <div class="container">
                <?php print str_replace('<i class="fa fa-angle-right"></i>',
                                 '<i class="fa fa-angle-right"></i><a href="/el/προσωπικο">Προσωπικό Ινστιτούτου</a>',$breadcrumb); ?>
        </div>
</div>
<?php endif; ?>
<?php endif; ?>

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
						<div style="max-width:976px; margin-left:auto; margin-right:auto;">
                                                <?php if($page['content']):?>
                                                        <?php print render($page['content']); ?>
                                                <?php endif; ?>
						</div>
                                                <?php  if($page['section_content']):?>
                                                        <?php print render($page['section_content']); ?>
                                                <?php endif; ?>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
<?php require_once(drupal_get_path('theme','heshel').'/tpl/footer.tpl.php'); ?>

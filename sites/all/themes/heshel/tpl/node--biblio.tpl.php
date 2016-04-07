<?php 

global $base_root, $base_url;

if($page) { ?>

<?php $url= $_SERVER['HTTP_HOST'] . request_uri();?>

<?php 
	global $language ;
	$lang = $language->language ;
?>

<div id="biblio_ref" class="biblio-ref-c">
<div id="biblio_authors" class="b-iauth b-authors"><b><?php print t('Authors')?>:</b></br>

        <?php
                for($i=0;$i<count($node->biblio_contributors);$i++)
                {
                ?>
                        <?php if(isset($node->biblio_contributors[$i]['name'])){?>
					<?php if(isset($node->biblio_contributors[$i]['drupal_uid'])){?>
						<?php $author_drupal_id=$node->biblio_contributors[$i]['drupal_uid'];?>
						<?php echo '<a href="/user/'.$author_drupal_id.'/biblio">'.t($node->biblio_contributors[$i]['name']).'</a><br />';?>
					<?php }else{?>
						<?php print $node->biblio_contributors[$i]['name'].'<br />';?>
					<?php }?>
                        <?php }?>
				
                <?php
        }?>
</div>

		<div class="b-item"></div>

		<?php if(isset($node->biblio_type)){?><div id="biblio_type_name" class="b-item"><b><?php print t('Type')?>: </b><?php print $node->biblio_type_name;?></div><?php }?>
		<?php if(isset($node->biblio_secondary_title)){?><div id="biblio_title_2" class="b-item"><b><?php print t("Journal title")?>: </b><?php print $node->biblio_secondary_title;?></div><?php }?>
		<?php if(isset($node->biblio_year)){?><?php if($node->biblio_year != 'Submitted'){?><div id="biblio_year" class="b-item"><b><?php print t("Year of publication");?>: </b><?php print $node->biblio_year;?></div><?php }?><?php }?>

		<?php if(isset($node->field_oganization['und'][0]['entity'])){?>
			<div id="biblio_organization" class="b-item">
				<b><?php print t('Source')?>: </b>
				<?php $source_url=$node->field_oganization['und'][0]['entity']->nid;?>
				<?php echo '<a href="/node/'.$source_url.'">'.$node->field_oganization['und'][0]['entity']->title.'</a>';?>
			</div>
		<?php }?>

		<?php if(isset($node->field_collected_by['und'][0]['entity'])){?>
			<div id="biblio_collected_by" class="b-item">
				<b><?php print t("Collected from")?>: </b>
				<?php $collected_url=$node->field_collected_by['und'][0]['entity']->nid;?>
				<?php echo '<a href="/node/'.$collected_url.'">'.$node->field_collected_by['und'][0]['entity']->title.'</a>';?>
			</div>
		<?php }?>	
	
        	<b><?php print t('Subject')?>:</b>
		<div class="b-iterms">
        	<?php
                	for($i=0;$i<count($node->field_agrovoc['und']);$i++)
                	{
                	?>
                        	<?php if(isset($node->field_agrovoc['und'][$i]['taxonomy_term'])){?>
                                	<div id="biblio_tax_terms">
                                        	<?php //print t($node->field_agrovoc['und'][$i][taxonomy_term]->name);?>
						<?php $term = taxonomy_term_load($node->field_agrovoc['und'][$i]['taxonomy_term']->tid);
						if (module_exists('i18n_taxonomy')) {
    							module_load_include('inc', 'i18n', 'i18n_taxonomy.pages');
    							$term = i18n_taxonomy_localize_terms($term);
						}
						echo $term->name;//strip_tags(render(taxonomy_term_view($term, 'full'), $language->language));
						//print_r($node->field_agrovoc);?>
                                	</div>
                        	<?php }?>
                	<?php
        		}?>
		</div>
</div>
<div id="biblio_abs" class="biblio-abs-c">
	<?php if(isset($node->biblio_abst_e) && ($node->biblio_abst_e !='')){?><div id="abstract" class="b-item"><b><?php print t('Description');?>:</b><?php print $node->biblio_abst_e;?></div><?php }?>
	<?php if(isset($node->body[$lang][0])){?><div id="full_text" class="b-item"><b><?php //print t(Description);?>:</b><?php print $node->body[$lang][0][value];?></div><?php }?>
	<?php if($node->biblio_type_name == 'Image'){?>

		<?php if(isset($node->biblio_custom3) && (substr($biblio_url, -4)=='.jpg' || substr($biblio_url, -4)=='.png')){?>
                        <?php $biblio_image=$node->biblio_url;?>
                        <?php echo '<img src="'.$biblio_image.'">';?>
		
		<?php }else if(isset($node->biblio_custom3) && (substr($biblio_url, -4)!='.jpg' || substr($biblio_url, -4)=='.png')){?>
			<?php $biblio_image=$node->biblio_custom3;?>
			<?php echo '<img src="'.$biblio_image.'">';?>

		<?php }else{?>
			<?php $biblio_image=$node->biblio_url;?>
			<?php if(substr($biblio_image, -4)=='.jpg' || substr($biblio_image, -4)=='.png'){?>
				<?php echo '<img src="'.$biblio_image.'">';?>
			<?php }?>
		<?php }?>
	<?php }?>
	
	<?php
                        for($i=0;$i<count($node->field_licences['und']);$i++){?>

                                <?php if(isset($node->field_licences['und'][$i])){
					$license_node=taxonomy_term_load($node->field_licences['und'][$i]['tid']);
				?>
                                        <div id="bibilio_tax_terms"></div>

				<br /><b><?php print t('License')?>: </b>
                        	<?php echo $license_node->name;?>
                                <?php }?>
				<div class="b-item-a"></div>
			<?php }?>
	<?php
		if(isset($node->field_funded_by['und'][0]['target_id'])){
                $view_mode = 'default';
                $funded_node = node_load($node->field_funded_by['und'][0]['target_id']);?>
		<br /><b><?php print t('Funded by')?>: </b>
        	<?php echo '<a href="/node/'.$node->field_funded_by['und'][0]['target_id'].'">'.$funded_node->title.'</a>';?>
		<div class="b-item-a"></div>
		<?php }?>
&nbsp;
<div class="team_icons_wrapper view-share-tweet-wrap" style="text-align:center">
		<?php if(isset($node->field_publication_file['und'][0])){?>
                        <?php $url_pub=$node->field_publication_file['und'][0]['uri'];?>
                        <div id="biblio_pub_file"></div>
                        <?php $newurl=substr($url_pub, 8);?>
                        <?php if($lang=='en'){?>
                        <?php echo '<a href="/sites/default/files/'.$newurl.'" class="b-file" target="_blank"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp; View Publication</a>';?>
                        <?php }?>
                        <?php if($lang=='el'){?>
                        <?php echo '<a href="/sites/default/files/'.$newurl.'" class="b-file" target="_blank"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp; Δείτε την δημοσίευση</a>';?>
                        <?php }?>
                <?php }?>


		<?php if($node->biblio_url!=''){
                        $newurl2=$node->biblio_url;?>

                        <?php if($lang=='en'){?>
                        <?php echo '<a href="'.$newurl2.'" class="b-file" target="_blank"><span class="glyphicon glyphicon-new-window"></span>&nbsp;&nbsp; View Resource</a>';?>
                        <?php }?>
                        <?php if($lang=='el'){?>
                        <?php echo '<a href="'.$newurl2.'" class="b-file" target="_blank"><span class="glyphicon glyphicon-new-window"></span>&nbsp;&nbsp; Δείτε την πηγή</a>';?>
                        <?php }?>
                
                <?php }elseif($node->biblio_url==''){?>
                        <?php echo '';?>
                <?php }?>
		
		<?php echo '<a href="https://www.facebook.com/sharer/sharer.php?u='.$url.'" class="teamlink team_fb b-icon1" title="Facebook"><img src="/sites/default/files/face-ico.png" style="width:20px;"></a>';?>
		<?php echo '<a href="https://twitter.com/home?status='.$url.'" class="teamlink team_twitter b-icon2" title="Twitter"><img src="/sites/default/files/twitt-ico.png" style="width:20px;"></a>';?>
</div> 
</div> 
<div class="clear"></div>
<?php if($lang=='en'){?>
<div class="go-back-button"><a href="javascript:history.go(-1)" class="btn btn-success"> << Back to search</a></div>
<?php }?>
<?php if($lang=='el'){?>
<div class="go-back-button"><a href="javascript:history.go(-1)" class="btn btn-success"> << Πίσω στην αναζήτηση</a></div>
<?php }?>	
	<?php //print($path_alias);?>
	<?php //print_r($node);?>
		
	<?php } else {  ?>
		<?php print render($content);?>	
	<?php } ?>

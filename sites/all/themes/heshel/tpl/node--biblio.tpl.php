<?php 

global $base_root, $base_url;

if($page) { ?>

<?php $url= $_SERVER['HTTP_HOST'] . request_uri();?>

<div id="biblio_ref" class="biblio-ref-c">
<b>Authors:</b>

        <?php
                for($i=0;$i<count($node->biblio_contributors);$i++)
                {
                ?>
                        <?php if(isset($node->biblio_contributors[$i]['name'])){?>
                                <div id="biblio_authors" class="b-iauth b-authors">
                                        <?php print $node->biblio_contributors[$i]['name'];?>
                                </div>
                        <?php }?>

                <?php
        }?>

		<div class="b-item"></div>
                <?php

                        $alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));
                        $parts = explode('/', $alias);

                        $lang='und';
                        if($parts[0]=='el')
                                $lang='el';
                        else if($parts[0]=='en')
                                $lang='en';



                ?>
		<?php if(isset($node->biblio_type)){?><div id="biblio_type_name" class="b-item"><b>Type: </b><?php print $node->biblio_type_name;?></div><?php }?>
                <?php if(isset($node->biblio_year)){?><div id="biblio_year" class="b-item"><b>Year of publication: </b><?php print $node->biblio_year;?></div><?php }?>
		<?php if(isset($node->field_oganization[$lang][0])){?>
			<div id="biblio_organization" class="b-item">
				<b>Source: </b><?php print $node->field_oganization[$lang][0]['entity']->title;?>
			</div>
		<?php }?>
        	<b>Subject</b>
		<div class="b-iterms">
        	<?php
                	for($i=0;$i<count($node->field_agrovoc[und]);$i++)
                	{
                	?>
                        	<?php if(isset($node->field_agrovoc[und][$i][taxonomy_term])){?>
                                	<div id="biblio_tax_terms">
                                        	<?php print $node->field_agrovoc[und][$i][taxonomy_term]->name;?>
                                	</div>
                        	<?php }?>
                	<?php
        	}?>
		</div>
</div>
<div id="biblio_abs" class="biblio-abs-c">
	<?php if(isset($node->biblio_abst_e)){?><div id="abstract" class="b-item"><b>Description</b><?php print $node->biblio_abst_e;?></div><?php }?>
	<?php
                        for($i=0;$i<count($node->field_licences[und]);$i++)
                        {
                        ?>
                                <?php if(isset($node->field_licences[und][$i])){
					$license_id=$node->field_licences[und][$i]['tid'];
				?>
                                        <div id="biblio_tax_terms">
                                        </div>
                                <?php }?>
			<?php }?>
			<b>License: </b>
                        <?php if($license_id==89){
                                echo "Rights subject to owner's permission";
                        ?>
                        <?php }?>

			<?php if($license_id==88){
                                echo "Not open / All rights reserved";
                        ?>
                        <?php }?>

                        <?php if($license_id==84){
                                echo "Creative Commons Attribution-NonCommercial (CC BY-NC)";
                        ?>
			<?php }?>

			<?php if($license_id==83){
                                echo "Creative Commons Attribution-NoDerivs (CC BY-ND)";
                        ?>
                        <?php }?>

			<?php if($license_id==85){
                                echo "Creative Commons Attribution-NonCommercial-NoDerivs (CC BY-NC-ND)";
                        ?>
                        <?php }?>

			<?php if($license_id==86){
                                echo "Creative Commons Attribution-NonCommercial-ShareAlike (CC BY-NC-SA)";
                        ?>
                        <?php }?>

			<?php if($license_id==87){
                                echo "Creative Commons Attribution-ShareAlike (CC BY-SA)";
                        ?>
                        <?php }?>

			<?php if($license_id==82){
                                echo "Creative Commons Attribution (CC BY)";
                        ?>
                        <?php }?>

</div>
&nbsp;
<div class="team_icons_wrapper view-share-tweet-wrap" style="text-align:center">

                <?php
                        for($i=0;$i<count($node->field_publication_file[und]);$i++)
                        {
                        ?>
                                <?php if(isset($node->field_publication_file[und][$i])){
                                        $url=$node->field_publication_file[und][$i]['uri'];
                                 ?>
                                        <div id="biblio_pub_file">
                                        </div>
                                <?php }?>
					<?php $newurl=substr($url, 8); ?>
				        <?php echo '<a href="http://www.agreri.gr/sites/default/files'.$newurl.'" class="b-file" target="_blank"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp; View Publication</a>';?>
                        <?php }?>
                        <?php $newurl=substr($url, 8); ?>

	<?php echo '<a href="https://www.facebook.com/sharer/sharer.php?u='.$url.'" class="teamlink team_fb b-icon1" title="Facebook"><i class="icon-facebook"></i>&nbsp;&nbsp;&nbsp;&nbsp;Share</a>';?>
	<?php echo '<a href="https://twitter.com/home?status='.$url.'" class="teamlink team_twitter b-icon2" title="Twitter"><i class="icon-twitter"></i>&nbsp;&nbsp;Tweet</a>';?>
&nbsp;
</div>
<div class="clear"></div>
	
	<?php print($path_alias);?>
	<?php //print_r($node);?>
	
	<?php } else {  ?>
        	<?php	?>

	<?php
		print render($content);
        ?>

	
	
<?php } ?>


<section>
	<h1>THEME2</h1>
	<?php
    	$num_elements = get_option("theme_name_num_elements");
    	$elements = get_option("theme_name_front_page_elements");
	?>


	<div id="front-page-element-container">
 
    <div class="front-page-element-row">
        <?php foreach($elements as $post_id) : ?>
            <?php if ($num == $num_elements) : ?>
                
                <div class="front-page-element-row">
                	ss
				</div>

            <?php endif; ?>
 			

			<?php $element_post = get_post($post_id); ?>
			 
			<div class="front-page-element">
			    <div class="thumbnail-image">
			        <?php if (has_post_thumbnail($post_id)) : ?>
			            <?php echo get_the_post_thumbnail($post_id, 'tutorial-thumb-size'); ?>
			        <?php endif; ?>
			 
			        <a class="title" href="<?php echo get_permalink($post_id); ?>"><?php echo $element_post->post_title;?></a>
			    </div>
			</div>
 			
                     
        <?php endforeach; ?>
    </div>
 
</div>
</section>

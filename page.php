<?php
	get_header();
?>

<section class="user_page_content_body">
    <div class="container">
        <?php
            /* Start the Loop */
    		while ( have_posts() ) :
    			the_post();
    			/*
    			?>
    			<h2><?php echo get_the_title(); ?></h2>
    			
    			<?php*/
    			
    			the_content();
    		endwhile; // End of the loop.
        ?>
    </div>
</section>

<?php
	get_footer();
?>
<?php
	get_header();
?>

<section class="user_page_content_body">
    <div class="container">
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">
     
                <header class="page-header">
                    <h1 class="page-title"><?php _e( '404 Not Found', 'twentythirteen' ); ?></h1>
                </header>
     
                <div class="page-wrapper">
                    <div class="page-content">
                        <h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'j_the_fun_theme' ); ?></h2>
                        <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'j_the_fun_theme' ); ?></p>
                    </div><!-- .page-content -->
                </div><!-- .page-wrapper -->
     
            </div><!-- #content -->
        </div><!-- #primary -->
    </div>
</section>

<?php
	get_footer();
?>
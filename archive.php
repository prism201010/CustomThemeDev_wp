<?php
get_header();

the_archive_title( '<h1 class="page-title">', '</h1>' );
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		the_title( '<h1>', '</h1>' );
        the_excerpt();
        printf( '<a href="%s" > Read more</a>', get_permalink() );
        
	endwhile;
endif;

get_footer();
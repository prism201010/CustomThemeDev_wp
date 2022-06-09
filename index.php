<?php
get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		the_title( '<h1>', '</h1>' );
        the_excerpt();
        printf( '<a href="%s" > Read more</a>', get_permalink() );
        if ( has_post_thumbnail() ) :
            the_post_thumbnail();
        endif;
	endwhile;
endif;
$args = array(
    'post_type' => 'product',
);
$query = new WP_Query( $args );
 // The Loop
while ( $query->have_posts() ) {
    $query->the_post();
    echo '<li>' . get_the_title() . '</li>';
}
get_sidebar();
get_footer();
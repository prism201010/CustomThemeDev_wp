<?php
get_header();
?>
<h1>Recent Posts</h1>
<?php
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
?>
<h1>Products</h1>
<?php
$args = array(
    'post_type' => 'product',
);
$query = new WP_Query( $args );
 // The Loop
if(is_front_page() && is_home())
    while ( $query->have_posts() ) {
        $query->the_post();
        echo '<h1><li>' . get_the_title() . '</li></h1>';
        if ( has_post_thumbnail() ) :
            the_post_thumbnail();
        endif;
        the_excerpt();
        printf( '<a href="%s" > Read more</a>', get_permalink() );
}
get_sidebar();
get_footer();
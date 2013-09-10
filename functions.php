<?php

// Footer Widgets
function jotus_widgets_init() {
    register_sidebar( array(
        'name' => 'Right Sidebar',
        'id' => 'right_sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ) );

    register_sidebar( array(
        'name' => 'Footer Widgets',
        'id' => 'footer_widgets',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ) );

    register_sidebar( array(
        'name' => '404 Widgets',
        'id' => 'four04_widgets',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ) );
}
add_action( 'widgets_init', 'jotus_widgets_init' );

// Custom Excerpt Lengths
function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}
remove_filter('the_excerpt', 'wpautop'); // Also, remove p tags

?>

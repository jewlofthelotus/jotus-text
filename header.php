<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php bloginfo('name'); if ( is_404() ) : _e(' &raquo; ', 'jotus'); _e('Not Found', 'jotus'); elseif ( is_home() ) : _e(' &raquo; ', 'jotus'); bloginfo('description'); else : wp_title(); endif; ?></title>
    <meta name="description" content="<?php bloginfo('description') ?>" />

    <link href='http://fonts.googleapis.com/css?family=Lily+Script+One|Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php echo esc_html(get_bloginfo('name'), 1) ?> <?php _e('RSS feed', 'jotus'); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo esc_html(get_bloginfo('name'), 1) ?> <?php _e('Comments RSS feed', 'jotus'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

    <?php wp_head() ?>
</head>

<body>
    <header>
        <div class="wrapper">
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></h1>

            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Blog</a></li>
                    <li><a href="http://jewlofthelotus.com" target="_blank">Photography</a></li>
                    <li><a class="icon" href="http://www.github.com/jewlofthelotus" target="_blank"><i class="icon-github"></i></a></li>
                    <li><a class="icon" href="http://www.linkedin.com/in/jewlofthelotus" target="_blank"><i class="icon-linkedin"></i></a></li>
                    <li><a class="icon" href="http://www.twitter.com/jewlofthelotus" target="_blank"><i class="icon-twitter"></i></a></li>
                    <li><a class="icon" href="<?php bloginfo('rss2_url') ?>" rel="alternate" type="application/rss+xml"><i class="icon-rss"></i></a></li>

                </ul>
            </nav>

            <h4><?php bloginfo('description') ?></h4>
        </div>
    </header>

    <div class="wrapper main">
<?php get_sidebar() ?>

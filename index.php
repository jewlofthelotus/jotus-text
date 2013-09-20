<?php get_header() ?>

        <div class="content">
            <section class="post-list">
    <?php $count = 0; ?>
    <?php while ( have_posts() ) : the_post() ?>
    <?php $count++; ?>
                <article class="post">
                    <div class="post-date">
                        <span class="day"><?php the_time('d'); ?></span>
                        <span class="month"><?php the_time('M'); ?></span>
                    </div>

                    <h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

                    <div class="post-content">
<?php if ( $count < 2 && !is_home() ) : ?>
        <?php the_content() ?>
<?php else : ?>
        <?php the_excerpt(); ?>
<?php endif; ?>
                    </div>

                    <div class="post-meta">
                        <?php printf(__('Posted in %1$s%2$s.', 'jotus'),
                            get_the_category_list(', '),
                            get_the_tag_list(' '.__('and tagged').' ', ', ', '')) ?>

                    <?php if ( comments_open() ) : ?>
                        <strong><?php comments_popup_link( '<span class="leave-comment">' . __( 'Leave a comment', 'jotusText' ) . '</span>', __( '1 Comment', 'jotusText' ), __( '% Comments', 'jotusText' ) ); ?></strong>
                    <?php else : ?>
                        <?php _e('Comments are currently closed.') ?>
                    <?php endif; // comments_open() ?>

                        <?php edit_post_link(__('Edit', 'jotus'), "<span class=\"edit-link\">", "</span>"); ?>
                    </div>

                </article>
    <?php endwhile ?>
            </section>
        </div>

        <nav class="nav-below">
            <div class="nav-previous"><?php next_posts_link(__('&laquo; Older posts', 'jotus')) ?></div>
            <div class="nav-next"><?php previous_posts_link(__('Newer posts &raquo;', 'jotus')) ?></div>
        </nav>

<?php get_footer() ?>

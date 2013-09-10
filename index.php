<?php get_header() ?>

        <div class="content">
            <section class="post-list">
    <?php while ( have_posts() ) : the_post() ?>
                <article class="post">
                    <div class="post-date">
                        <span class="day"><?php the_time('d'); ?></span>
                        <span class="month"><?php the_time('M'); ?></span>
                    </div>

                    <h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

                    <div class="post-content">
        <?php the_content(); ?>
                    </div>

                    <div class="post-meta">
                        <?php printf(__('Posted in %1$s%2$s.', 'jotus'),
                            get_the_category_list(', '),
                            get_the_tag_list(' '.__('and tagged').' ', ', ', '')) ?>

        <?php if (('open' == $post-> comment_status)) : // Comments open ?>
                        <?php printf(__('<a class="comment-link" href="#respond" title="Leave a comment">Leave a comment</a>.', 'jotus')) ?>
        <?php elseif (!('open' == $post-> comment_status)) : // Comments are closed ?>
                        <?php _e('Comments are currently closed.') ?>
        <?php endif; ?>

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

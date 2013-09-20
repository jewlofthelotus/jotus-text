            <div class="comments">

<?php
    if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
        die ( 'Please do not load this page directly. Thanks!' );

    $req = get_option('require_name_email'); // Checks if fields are required.

    if ( ! empty($post->post_password) ) :
        if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) :
?>
                <div class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'your-theme') ?></div>
            </div><!-- .comments -->
<?php
            return;
        endif;
    endif;
?>

<?php if ( have_comments() ) : ?>

<?php
$ping_count = $comment_count = 0;
foreach ( $comments as $comment )
    get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;
?>

<?php if ( ! empty($comments_by_type['comment']) ) : ?>
                <div class="comments-list">
                    <h3>
                        <?php printf($comment_count > 1 ? __('<span>%d</span> Comments', 'your-theme') : __('<span>One</span> Comment', 'your-theme'), $comment_count) ?> |
                        <?php printf(__('<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a>', 'jotus')) ?>
                    </h3>

<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
                    <nav class="nav-above">
                        <div class="paginated-links"><?php paginate_comments_links(); ?></div>
                    </nav>
<?php endif; ?>

                    <ol>
<?php wp_list_comments('type=comment'); ?>
                    </ol>

<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
                    <nav class="nav-below">
                        <div class="paginated-links"><?php paginate_comments_links(); ?></div>
                    </nav>
<?php endif; ?>
                </div><!-- #comments-list .comments -->
<?php endif; /* if ( $comment_count ) */ ?>
<?php endif /* if ( $comments ) */ ?>


<?php if ( 'open' == $post->comment_status ) : ?>
                <div class="respond" id="respond">
                    <h3><?php comment_form_title( __('Post a Comment', 'your-theme'), __('Post a Reply to %s', 'your-theme') ); ?></h3>

                    <div id="cancel-comment-reply"><?php cancel_comment_reply_link() ?></div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
                    <p id="login-req"><?php printf(__('You must be <a href="%s" title="Log in">logged in</a> to post a comment.', 'your-theme'),
                    get_option('siteurl') . '/wp-login.php?redirect_to=' . get_permalink() ) ?></p>

<?php else : ?>
                    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

<?php if ( $user_ID ) : ?>
                        <p id="login"><?php printf(__('<span class="loggedin">Logged in as <a href="%1$s" title="Logged in as %2$s">%2$s</a>.</span> <span class="logout"><a href="%3$s" title="Log out of this account">Log out?</a></span>', 'your-theme'),
                            get_option('siteurl') . '/wp-admin/profile.php',
                            esc_html($user_identity, true),
                            wp_logout_url(get_permalink()) ) ?></p>
<?php else : ?>
                        <?php if ($req) : ?>
                        <div class="form-section comment-notes">
                            <p>* Required field</p>
                        </div>
                        <?php endif ?>

                        <div class="form-section">
                            <label for="author"><?php _e('Name', 'your-theme') ?> <?php if ($req) _e('<span class="required">*</span>', 'your-theme') ?></label>
                            <input id="author" name="author" type="text" value="<?php echo $comment_author ?>" size="30" maxlength="20" tabindex="3" />
                        </div>

                        <div class="form-section">
                            <label for="email"><?php _e('Email', 'your-theme') ?> <?php if ($req) _e('<span class="required">*</span>', 'your-theme') ?></label>
                            <input id="email" name="email" type="text" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" />
                        </div>

                        <div class="form-section">
                            <label for="url"><?php _e('Website', 'your-theme') ?></label>
                            <input id="url" name="url" type="text" value="<?php echo $comment_author_url ?>" size="30" maxlength="50" tabindex="5" />
                        </div>
<?php endif /* if ( $user_ID ) */ ?>

                        <div class="form-section">
                            <label for="comment"><?php _e('Comment', 'your-theme') ?></label>
                            <textarea id="comment" name="comment" cols="45" rows="8" tabindex="6"></textarea>
                        </div>

                        <div class="form-section comment-notes">
                            <p><span><?php _e('You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:', 'your-theme') ?></span> <code><?php echo allowed_tags(); ?></code></p>
                        </div>

<?php do_action('comment_form', $post->ID); ?>

                        <div class="form-submit">
                            <input id="submit" name="submit" type="submit" value="<?php _e('Post Comment', 'your-theme') ?>" tabindex="7" />
                            <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
                        </div>

<?php comment_id_fields(); ?>

                    </form>
<?php endif /* if ( get_option('comment_registration') && !$user_ID ) */ ?>
                </div><!-- #respond -->
<?php endif /* if ( 'open' == $post->comment_status ) */ ?>
            </div><!-- .comments -->
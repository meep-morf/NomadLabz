<?php
/**
 * The template for displaying comments
 *
 * @package NomadLabz
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area container mx-auto px-4 lg:px-8 py-12 max-w-4xl">
    <?php if (have_comments()): ?>
        <h2 class="comments-title text-3xl font-bold text-primary mb-8">
            <?php
            $comments_number = get_comments_number();
            if ($comments_number === 1) {
                echo esc_html__('1 Comment', 'nomadlabz');
            } else {
                printf(
                    esc_html__('%s Comments', 'nomadlabz'),
                    number_format_i18n($comments_number)
                );
            }
            ?>
        </h2>

        <ol class="comment-list space-y-6 mb-8">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 64,
                'callback'    => 'nomadlabz_comment_callback',
            ));
            ?>
        </ol>

        <?php
        the_comments_pagination(array(
            'prev_text' => '<span class="px-4 py-2 bg-gray-900/50 border border-primary/20 text-primary rounded-lg hover:bg-primary/10 transition-colors">' . esc_html__('Previous', 'nomadlabz') . '</span>',
            'next_text' => '<span class="px-4 py-2 bg-gray-900/50 border border-primary/20 text-primary rounded-lg hover:bg-primary/10 transition-colors">' . esc_html__('Next', 'nomadlabz') . '</span>',
        ));
        ?>
    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')): ?>
        <p class="no-comments text-gray-400">
            <?php echo esc_html__('Comments are closed.', 'nomadlabz'); ?>
        </p>
    <?php endif; ?>

    <?php
    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : '');

    $fields = array(
        'author' => '<div class="mb-4"><label for="author" class="block text-sm font-medium text-gray-300 mb-2">' . esc_html__('Name', 'nomadlabz') . ($req ? ' <span class="text-primary">*</span>' : '') . '</label>' .
                    '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' class="w-full px-4 py-3 bg-gray-800 border border-primary/20 rounded-lg text-white focus:outline-none focus:border-primary transition-colors" /></div>',
        'email'  => '<div class="mb-4"><label for="email" class="block text-sm font-medium text-gray-300 mb-2">' . esc_html__('Email', 'nomadlabz') . ($req ? ' <span class="text-primary">*</span>' : '') . '</label>' .
                    '<input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' class="w-full px-4 py-3 bg-gray-800 border border-primary/20 rounded-lg text-white focus:outline-none focus:border-primary transition-colors" /></div>',
        'url'    => '<div class="mb-4"><label for="url" class="block text-sm font-medium text-gray-300 mb-2">' . esc_html__('Website', 'nomadlabz') . '</label>' .
                    '<input id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" class="w-full px-4 py-3 bg-gray-800 border border-primary/20 rounded-lg text-white focus:outline-none focus:border-primary transition-colors" /></div>',
    );

    $comment_field = '<div class="mb-4"><label for="comment" class="block text-sm font-medium text-gray-300 mb-2">' . esc_html__('Comment', 'nomadlabz') . ' <span class="text-primary">*</span></label>' .
                     '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="w-full px-4 py-3 bg-gray-800 border border-primary/20 rounded-lg text-white focus:outline-none focus:border-primary transition-colors"></textarea></div>';

    comment_form(array(
        'fields'               => $fields,
        'comment_field'        => $comment_field,
        'class_submit'         => 'px-6 py-3 bg-primary text-black font-semibold rounded-lg hover:bg-primary/90 transition-all duration-300 hover:scale-105',
        'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
        'title_reply'          => '<h3 class="text-2xl font-bold text-primary mb-6">' . esc_html__('Leave a Reply', 'nomadlabz') . '</h3>',
        'title_reply_to'       => '<h3 class="text-2xl font-bold text-primary mb-6">' . esc_html__('Leave a Reply to %s', 'nomadlabz') . '</h3>',
        'cancel_reply_link'    => '<span class="text-primary hover:text-primary/80 transition-colors">' . esc_html__('Cancel Reply', 'nomadlabz') . '</span>',
        'label_submit'         => esc_html__('Post Comment', 'nomadlabz'),
        'format'               => 'xhtml',
    ));
    ?>
</div>

<?php
/**
 * Custom comment callback
 */
function nomadlabz_comment_callback($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class('comment bg-gray-900/50 border border-primary/20 rounded-lg p-6'); ?> id="comment-<?php comment_ID(); ?>">
        <div class="flex gap-4">
            <div class="flex-shrink-0">
                <?php echo get_avatar($comment, 64, '', '', array('class' => 'rounded-full')); ?>
            </div>
            <div class="flex-1">
                <div class="comment-author text-white font-semibold mb-2">
                    <?php comment_author_link(); ?>
                </div>
                <div class="comment-meta text-sm text-gray-400 mb-3">
                    <time datetime="<?php comment_time('c'); ?>">
                        <?php printf(esc_html__('%1$s at %2$s', 'nomadlabz'), get_comment_date(), get_comment_time()); ?>
                    </time>
                    <?php edit_comment_link(esc_html__('(Edit)', 'nomadlabz'), ' <span class="edit-link">', '</span>'); ?>
                </div>
                <div class="comment-content text-gray-300">
                    <?php comment_text(); ?>
                </div>
                <?php
                comment_reply_link(array_merge($args, array(
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'reply_text' => '<span class="text-primary hover:text-primary/80 transition-colors text-sm">' . esc_html__('Reply', 'nomadlabz') . '</span>',
                )));
                ?>
            </div>
        </div>
    </li>
    <?php
}
?>


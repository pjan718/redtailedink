<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) { ?>
		This post is password protected. Enter the password to view comments.
	<?php
		return;
	}
	/* This variable is for alternating comment background */
    $oddcomment = 'alt';
?>

<!-- you can start editing here -->
<section class="comments">
<?php if ($comments) : ?>
    <h2>
        <?php comments_number('There are not any comments on this article yet.',
                              'Here is the comment on this article!',
                              'Here are the comments on this article!' ); ?>
    </h2>
    <?php $counter = 1; ?>
    <?php foreach ($comments as $comment) : ?>
    <article class="<?php echo $oddcomment; ?>">
        <header>
            <span class="number"><?php echo $counter; ?></span>
            <?php echo get_avatar( $comment, $size = '64' ); ?>
            <h3><?php comment_author_link(); ?></h3>
            <p>
                Comment left on:<br />
                <?php comment_date('F jS, Y'); ?> at <?php comment_time('g:i a'); ?>
            </p>
        </header>
        <?php if ($comment->comment_approved == '0') : ?>
        <em>Your comment is awaiting moderation.</em>
        <?php endif; ?>
        <?php comment_text(); ?>
    </article>
    <?php /* Changes every other comment to a different class */	
        if ('alt' == $oddcomment) { $oddcomment = ''; }
        else { $oddcomment = 'alt'; }
        //increment the counter
        $counter = $counter + 1;
    ?>
    <?php endforeach; /* end for each comment */ ?>
        
<?php else : // this is displayed if there are no comments so far ?>
    <?php if ('open' == $post->comment_status) : ?> 
        <!-- If comments are open, but there are no comments. -->
    <?php else : // comments are closed ?>
        <!-- If comments are closed. -->
        <p class="nocomments">Comments are closed.</p>
    <?php endif; ?>
<?php endif; ?>
    
<?php if ('open' == $post->comment_status) : ?>
    <h2 id="respond">Leave your own comment!</h2>
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        <fieldset>
            <?php if ( $user_ID ) : ?>
            <label>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></label>
            <?php else : ?>
            <label for="author">Your Name (required):</label>
            <input name="author" id="author" value="<?php echo $comment_author; ?>" />
            <label for="email">Email Address (required, but will not be displayed):</label>
            <input name="email" id="email" value="<?php echo $comment_author_email; ?>" />
            <label for="url">Website:</label>
            <input name="url" id="url" value="<?php echo $comment_author_url; ?>" />
            <?php endif; ?>
            <!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->
            <label for="comment">Leave a message:</label>
            <textarea name="comment" id="comment"></textarea>
            <input name="submit" type="submit" id="submit" value="Leave your comment" />
            <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
            <?php do_action('comment_form', $post->ID); ?>
        </fieldset>
    </form>
</section>
<?php endif; // if you delete this the sky will fall on your head ?>

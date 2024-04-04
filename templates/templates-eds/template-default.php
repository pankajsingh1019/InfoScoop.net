<?php

global $dispayBreadcrumb;
$dispayBreadcrumb = true;

get_header();

?>
<div class="article-pg">
    <div class="container">
        <div class="main-wrapper clearfix">
            <div class="left-wrapper mb-30">
                <?php if (have_posts()) : while (have_posts()) : the_post(); $posts_already_shown[] = $post->ID; ?>
                <div class="article-title mb-20"><?php the_title(); ?></div>
                <div class="article-img mb-20">
                    <?php
                        if ( has_post_thumbnail($post->ID) ) { 
                            the_post_thumbnail('thumbnail_850x450', array('class' => 'img-responsive tran', 'title' => get_the_title() ));
                        }
                        ?>
                </div>
                <div class="article-desc"><?php wp_strip_all_tags(the_content()); ?></div>
            </div>
            <?php endwhile; endif; ?>
            <div class="right-wrapper">
            <?php echo element("SideBar", ["title_one" =>"You May Also Like", "title_two" => "Recent Post"]); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
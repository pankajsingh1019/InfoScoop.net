<?php 
    /* Template Name: tag */
    global $dispayBreadcrumb;
    $dispayBreadcrumb = true;
    get_header();

    $cat_cnt = 0;
    $d_exclude = array();

?>
<div class="category-pg tag-pg">
    <div class="container">
        <div class="main-wrapper clearfix">
            <div class="left-wrapper">
                <?php if (have_posts()) : ?>
                <ul>
                    <?php
                    $thumbs_size = 'thumbnail-550x320';
                    $query = getArticles(['posts_per_page' => 8, 'post__not_in' => $d_exclude]);
                    while (have_posts()) : the_post();  $cat_cnt++;
                ?>
                    <li class="card mb-30 pos-rel">
                        <?php $url = get_the_post_thumbnail_url(get_the_ID(), array(300, 180)); ?>
                        <div class="img-wrap bgi" style="background-image:url('<?php echo addslashes($url); ?>')"></div>
                        <div class="info tran">
                            <span class="title"><?php the_title(); ?></span>
                            <div class="desc"><?php wp_strip_all_tags(the_content()); ?></div>
                            <span class="read-more">Read More</span>
                        </div>
                        <a href="<?php echo the_permalink(); ?>" class="overlay-link"></a>
                    </li>
                    <?php endwhile; wp_reset_query(); ?>
                </ul>
                <?php endif; ?>
                <div class="pagination"><?php wp_pagenavi(); ?></div>
            </div>
            <div class="right-wrapper">
                <?php echo element('SideBar'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
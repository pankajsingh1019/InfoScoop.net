<?php 
    /* Template Name: category */
    global $dispayBreadcrumb;
    $dispayBreadcrumb = true;
    get_header();

    $cat_cnt = 0;
    $d_exclude = array();

?>
<div class="category-pg">
    <div class="container">
        <div class="main-wrapper clearfix">
            <div class="left-wrapper">
                <?php if (have_posts()) : ?>
                <ul class="card-list">
                    <?php
                    $thumbs_size = 'thumbnail-550x320';
                    $query = getArticles(['posts_per_page' => 8, 'post__not_in' => $d_exclude]);
                    while (have_posts()) : the_post();  $cat_cnt++;
                ?>
                    <li class="card pos-rel">
                        <?php $url = get_the_post_thumbnail_url(get_the_ID(), array(300, 180)); ?>
                        <div class="img-wrap bgi" style="background-image:url('<?php echo addslashes($url); ?>')"></div>
                        <?php $cats = get_the_category($post->ID); ?>
                        <?php if(!empty($cats)) { ?>
                            <span class="category disp-in"><?php echo $cats[0]->name; ?></span>
                        <?php }; ?>
                        <div class="title"><?php the_title(); ?></div>
                        <div class="desc"><?php wp_strip_all_tags(the_content()); ?></div>
                        <a href="<?php echo the_permalink(); ?>" class="overlay-link"></a>
                    </li>
                    <?php endwhile; wp_reset_query(); ?>
                </ul>
                <?php endif; ?>
                <div class="pagination"><?php wp_pagenavi(); ?></div>
            </div>
            <div class="right-wrapper">
                <div class="category-tab">
                <?php echo element("SectionTitle", ["title" => "categories"]); ?>
                    <ul>
                        <li><a href="/category/health">Health</a></li>
                        <li><a href="/category/travel">Travel</a></li>
                        <li><a href="/category/services">Lifestyle</a></li>
                        <li><a href="/category/auto">Automotive</a></li>
                        <li><a href="/category/finance">Finance</a></li>
                    </ul>
                </div>
                <?php echo element("SideBar", ["title_one" =>"Trending Articles", "title_two" => "Recent Post"]); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
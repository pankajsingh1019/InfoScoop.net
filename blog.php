<?php 
    /* Template Name: category */
    global $dispayBreadcrumb;
    $dispayBreadcrumb = true;
    get_header();

    $cat_cnt = 0;
    $d_exclude = array();

?>
<div class="category-pg blog-pg">
    <div class="container">
        <div class="main-wrapper clearfix">
            <div class="left-wrapper">
                <ul class="card-list">
                <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $query = getArticles(['post__not_in' => $d_exclude, 'paged' => $paged]);
                        if (have_posts()) :
                    ?>
                    <?php while ($query->have_posts()) : $query->the_post();  $cat_cnt++; $d_exclude[] = $post->ID; ?>
                    <li class="card pos-rel">
                        <?php $url = get_the_post_thumbnail_url(get_the_ID()); ?>
                        <div class="img-wrap bgi" style="background-image:url('<?php echo addslashes($url); ?>')"></div>
                        <?php $cats = get_the_category($post->ID); ?>
                        <?php if(!empty($cats)) { ?>
                            <span class="category disp-in"><?php echo $cats[0]->name; ?></span>
                        <?php }; ?>
                        <div class="title"><?php the_title(); ?></div>
                        <div class="desc"><?php wp_strip_all_tags(the_content()); ?></div>
                        <a href="<?php echo the_permalink(); ?>" class="overlay-link"></a>
                    </li>
                    <?php endwhile; wp_pagenavi(array( 'query' => $query )); ?>
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
                        <li><a href="/category/lifestyle">Lifestyle</a></li>
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
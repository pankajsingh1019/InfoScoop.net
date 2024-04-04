<?php 
    global $post_exclude;
    global $dfp_status;
?>

<div class="side-bar">
    <div class="side-articles-one side-articles">
        <?php echo element("SectionTitle", ["title" => $title_one]); ?>
        <ul>
            <?php
                $articles = getArticles(['posts_per_page' => 4, 'post__not_in' => $post_exclude]);
                while ($articles->have_posts()) : $articles->the_post();
                    $post_exclude[] = get_the_ID();
                ?>
            <li class="card mb-20 pos-rel">
                <?php $url = get_the_post_thumbnail_url(get_the_ID(), array(180, 140)); ?>
                <div class="img-wrap bgi" style="background-image:url('<?php echo addslashes($url); ?>')"></div>
                <div class="title tran"><?php the_title(); ?></div>
                <a href="<?php echo the_permalink(); ?>" class="overlay-link"></a>
            </li>
            <?php endwhile;
            wp_reset_query(); ?>
        </ul>
    </div>
    <?php if($dfp_status){ ?>
        <div class="dfp-wrp text-center mb-30">
            <?php
                if (function_exists('get_common_file_path')) {
                include(get_common_file_path('DFPPlacement',array('opt_div_id' => 'blog-article-list-category-300x250-1')));
                }
            ?>
        </div>
    <?php } ?>
    <div class="side-articles-two side-articles">
        <?php echo element("SectionTitle", ["title" => $title_two]); ?>
        <ul>
            <?php
                $articles = getArticles(['posts_per_page' => 4, 'post__not_in' => $post_exclude]);
                while ($articles->have_posts()) : $articles->the_post();
                    $post_exclude[] = get_the_ID();
                    $num;
                ?>
            <li class="card mb-20 pos-rel">
                <div class="no"><?php echo $num + 1; ?>.</div>
                <div class="title tran"><?php the_title(); ?></div>
                <a href="<?php echo the_permalink(); ?>" class="overlay-link"></a>
            </li>
            <?php $num++; endwhile; wp_reset_query();?>
        </ul>
    </div>
</div>
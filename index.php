<?php /* Template Name: homepage */
    get_header();
?>

<div class="home-page">
    <?php echo element ('HeroSection'); ?>
    <?php echo element ('RecentArticles'); ?>
    <?php echo element ('Categories'); ?>
    <?php echo element ('PopularArticles'); ?>
    <?php echo element ('Banner'); ?>
    <?php echo element ('BottomArticles'); ?>
</div>

<?php get_footer(); ?>
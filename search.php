<?php
// Template Name: Search
$template_name = '';
if (isset($_GET['tm']) && !empty(locate_template('templates/templates-eds/' . $_GET['tm'] . '.php'))) {
    $template_name = $_GET['tm'] . '.php';
} else if (!empty(pt_get_query_var('tm')) && !empty(locate_template('templates/templates-eds/' . pt_get_query_var('tm') . '.php'))) {
    $template_name = pt_get_query_var('tm') . '.php';
}

//Load Template
if (!empty($template_name)) {
    include(locate_template('templates/templates-eds/' . $template_name));
} else {
    include(locate_template('templates/templates-eds/template-search-default.php'));
}
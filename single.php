<?php
    //Get Template Name
    $template_name = '';
    if (isset($_GET['tm']) && !empty(locate_template('templates/templates-eds/' . $_GET['tm'] . '.php'))) {
        $template_name = $_GET['tm'] . '.php';
    } else if (!empty(pt_get_query_var('tm')) && !empty(locate_template('templates/templates-eds/' . pt_get_query_var('tm') . '.php'))) {
        $template_name = pt_get_query_var('tm') . '.php';
    }

    $kw = '';
    $tags = get_the_tags();
    $categories = get_the_category();
    if (!empty($tags) && isset($tags[0]->name)) {
        $kw = $tags[0]->name;
    }else if(isset($categories[0]->name)){
        $kw=$categories[0]->name;
    }

    //Get Data
    if ( !empty(set_and_get_topic_id()) ) {
        get_feeds_data(
            array(
                'ad_api'=>array('keyword'=>$kw)
            )
		);
        global $ad_api_data;
    }
 
    //Load Template
    if (!empty($template_name)) {
        include(locate_template('templates/templates-eds/' . $template_name));
    } else {
        include(locate_template('templates/templates-eds/template-default.php'));
    }
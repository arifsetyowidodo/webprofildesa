<?php


/**
 * Add custom columns on wp-admin cpt list
 */
add_filter('manage_tdb_templates_posts_columns', function($columns) {
    $date = $columns['date'];
    unset($columns['date']);
    $columns['tdb_template_type'] = 'Template Type';
    $columns['date'] = $date;

    return $columns;
});


/**
 * Add custom data to the columns on wp-admin cpt list
 */
add_action('manage_tdb_templates_posts_custom_column' , function($column, $post_id) {

    switch( $column ) {

        case 'tdb_template_type':
            $tdb_template_type = get_post_meta($post_id, 'tdb_template_type', true);

            $args = array(
                'post_type'  => 'tdb_templates',
                'meta_key'   => 'tdb_template_type',
                'meta_value' => $tdb_template_type
            );

            $url = add_query_arg( $args, 'edit.php' );

            echo sprintf( '<a href="%s">%s</a>', esc_url( $url ), $tdb_template_type );

            break;
    }

}, 10, 2 );


/**
 * add sorting support on wp-admin cpt list
 */
add_filter('manage_edit-tdb_templates_sortable_columns', function ( $columns ) {
    $columns['tdb_template_type'] = 'tdb_template_type';
    return $columns;
});

/**
 * add filter support on wp-admin cpt list
 */
add_action( 'restrict_manage_posts', 'my_restrict_manage_posts' );
function my_restrict_manage_posts($post_type) {

    // only display these taxonomy filters on desired custom post_type listings
    if ( $post_type == 'tdb_templates' ) {

        // output html for templates type dropdown filter
        echo '<select name="template_type" id="template_type" class="postform">';
        echo "<option value=''>Show All Types</option>";

        $filters = array(
            'single',
            '404',
            'attachment',
            'author',
            'category',
            'date',
            'search',
            'tag'
        );

        foreach ( $filters as $template_type ) {

            $selected = isset($_GET['template_type'])? $_GET['template_type'] : null;
            $template_name = ucfirst($template_type);

            // output each select option line, check against the last $_GET to show the current option selected
            echo '<option value='. $template_type, $selected == $template_type ? ' selected="selected"' : '','>' . $template_name .'</option>';

        }

        echo "</select>";
    }
}

/**
 * change the links for each item on wp-admin cpt list
 */
add_filter('page_row_actions', function ($actions, $post) {
    global $current_screen;
    if (!empty($current_screen) && $current_screen->post_type != 'tdb_templates') {
        return $actions;
    }

    $tdb_template_type = get_post_meta($post->ID, 'tdb_template_type', true);

    // remove the default td-composer edit
    unset($actions['edit_tdc_composer']);

    $actions = array_merge(
        array(
            'edit_tdc_composer' => '<a href="' . admin_url( 'post.php?post_id=' . $post->ID . '&td_action=tdc&tdbTemplateType=' . $tdb_template_type . '&prev_url='  . rawurlencode(tdc_util::get_current_url() ) ) . '">Edit template</a>'
        ),
        $actions
    );
    unset($actions['inline hide-if-no-js']); // hide quick edit

    return $actions;
}, 11, 2 );


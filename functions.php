<?php

define( 'WP_SITE_URL', get_bloginfo('url') );
define( 'WP_THEME_URL', get_bloginfo( 'stylesheet_directory' ) );
define( 'WP_TODAY', date('Y_m_d',strtotime('00:00:00')));

define( 'WP_CURRENT_TAG', 'chips-1');
define( 'WP_MEDIA_LIMIT', 3);

date_default_timezone_set("Brazil/East");

add_theme_support('post-thumbnails');
set_post_thumbnail_size( 100, 100, true );
add_image_size( 'default', 800, 600, false );

// REDIRECT TO HOME AFTER LOGOUT

add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
  wp_redirect( home_url() );
  exit();
}

// ADD MEDIA UPLOADER SCRIPTS TO FRONTEND

add_action('wp_enqueue_scripts', 'add_media_upload_scripts');
function add_media_upload_scripts() {
    if ( is_admin() ) {
         return;
       }
    wp_enqueue_media();
}

// CHECK IF REACH UPLOAD LIMIT

add_filter( 'wp_handle_upload_prefilter', 'wp_check_upload_limits' );
function wp_check_upload_limits( $file ) {

    $user_id = get_current_user_id();

    $args = array( 
        'post_type' => 'attachment', 
        'author' => $user_id,
        'post_status' => 'inherit',
        'tax_query' => array(
                    array(
                        'taxonomy' => 'post_tag',
                        'terms' => WP_CURRENT_TAG,
                        'field' => 'slug',
                    )
                )
        );

    $attachments = get_posts($args);

    $upload_count_limit_reached = count($attachments) >= WP_MEDIA_LIMIT;

    if ( $upload_count_limit_reached )
        $file['error'] = 'Você já atingiu ao limite de upload';

    return $file;
}

// ADD MEDIA TAG SUPPORT

add_action( 'init', 'attachment_taxonomies' );
function attachment_taxonomies() {
    $taxonomies = array( 'post_tag' );
    foreach ( $taxonomies as $tax ) {
        register_taxonomy_for_object_type( $tax, 'attachment' );
    }
}

// UNSET MEDIA UPLOADER TABS

add_filter( 'media_view_strings', 'cor_media_view_strings' );
function cor_media_view_strings( $strings ) {
    unset( $strings['insertFromUrlTitle'] );
    unset( $strings['createGalleryTitle'] );
    return $strings;
}

// AUTO TAG MEDIA

add_action('add_attachment', 'attachment_manipulation');
function attachment_manipulation($id)
{
    if(wp_attachment_is_image($id)){
        wp_set_post_terms( $id, WP_CURRENT_TAG, 'post_tag', true );
    }
}

// FILTER MEDIA BY TAG AND USER

add_filter('parse_query', 'adm_show_users_own_attachments' );
function adm_show_users_own_attachments( $wp_query ) {
    if ( strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/upload.php' ) !== false ) {
        if ( !current_user_can( 'level_5' ) ) {
            global $current_user;
            $wp_query->set( 'author', $current_user->id );
        }
    }
}

add_filter( 'ajax_query_attachments_args', 'show_users_own_attachments', 1, 1 );
function show_users_own_attachments( $query ) {
    $id = get_current_user_id();
    if( !current_user_can('manage_options') )
    $query['author'] = $id;
    $query['tax_query'] = array(
        array(
            'taxonomy' => 'post_tag',
            'terms' => WP_CURRENT_TAG,
            'field' => 'slug',
        )
    );
    return $query;
}

?>
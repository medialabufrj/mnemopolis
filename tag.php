<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mnemopolis: memória, política e cidade nas imagens sobreviventes</title>
	<?php wp_head(); ?>
    <style>
        body {
            background: #000;
            color: #fff;
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        li {
            margin: 0;
            padding: 0;
            display: inline-block;
            line-height: 0;
        }
        .archive-title {
            position: fixed;
            top: 1em;
            left: 1em;
            text-shadow: 2px 2px 9px rgba(0, 0, 0, .5);
        }

    </style>
</head>
<body>
	<h1 class="archive-title"><?php printf( 'TAG: <span class="special">%s</span>', single_tag_title('',false) ); ?></h1>
    <ul>
    <?php
    global $wp_query;
    $args = array_merge( $wp_query->query_vars, array( 'post_type' => 'attachment', 'post_status' => 'inherit' ) );
    query_posts( $args );
        while(have_posts()){
            the_post();
            echo "<li>";
            $thumb = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
            $default = wp_get_attachment_image_src( $attachment_id, 'default' );
            echo "<a href='$default[0]' title='".get_the_author()." – ".get_the_title()."'>";
            echo "<img src='$thumb[0]' alt='".get_the_author()." – ".get_the_title()."'/>";
            echo "</a>";
            echo "</li>";
        }
    ?>
    </ul>
	<?php wp_footer(); ?>
</body>
</html>
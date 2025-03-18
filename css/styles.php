<?php
define( 'WP_USE_THEMES', false );
require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . '/wp-load.php' );
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Styles</title>
    <link rel='stylesheet' href='front.css' type='text/css' media='screen'>
    <style>
        body {
            --style-color : #777;
            --style-border-color : #eee;
            --style-gap : 1rem;
            background-color: #fff;
            padding: var(--space);
            font-size: var(--style-gap);
        }
        .style-section-title {
            color:var(--style-color);
            font-weight: 800;
            font-size: 1rem;
            text-transform: uppercase;
            background-color: var(--style-border-color);
            margin-bottom: var(--style-gap);
            padding: var(--style-gap);
        }
        .style-section-title:not(:first-child) { margin-top: calc(3*var(--style-gap)); }
        .style-section-title span {
            text-transform: none;
            font-weight: 400;
        }
        .style-list {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: var(--style-gap);
        }
        .style-list + .style-list { margin-top: var(--style-gap); }
        .style-square {
            display:flex;
            justify-content: center;
            align-items: center;
            border: 1px solid var(--style-border-color);
            width: 8rem;
            aspect-ratio: 1;
        }
        .style-legend {
            color: var(--style-color);
            font-size: 0.85rem;
        }

        .style-fonts { font-size: 2rem; }
        .card { max-width: 30rem; }
        .msg {
            max-width: 40rem;
            margin: var(--style-gap) 0;
        }
    </style>
</head>

<body><?php 

/*----------  Colors  ----------*/

$colors = array(
    [ 'color-p', 'color-p-d-1' ],
    [ 'white', 'grey', 'black' ],
    [ 'color-msg-default', 'color-msg-error', 'color-msg-success' ]
);

echo '<div class="style-section-title">Colors</div>';
    foreach ( $colors as $color_set ) {
        echo '<div class="style-list style-list--colors">';
            foreach ( $color_set as $color ) { 
                echo '<div>';
                    echo '<div class="style-square" style="background-color:var(--'.$color.')"></div>';
                    echo '<div class="style-legend">--'.$color.'</div>';
                echo '</div>';
            }
        echo '</div>';
    }

/*----------  Fonts  ----------*/    

$alphabet = 'a b c d e f g h i j k l m n o p q r s t u v w x y z 0 1 2 3 4 5 6 8 9';
    
$font_default_weight = [ 200, 800 ];
echo '<div class="style-section-title">Font default <span>(--font-default '.$font_default_weight[0].'>'.$font_default_weight[1].')</span></div>';
    echo '<div class="style-fonts">';
        foreach ( $font_default_weight as $weight ) {
            echo '<div style="font-weight:'.$weight.'">'.$alphabet.'</div>';
            echo '<div style="font-weight:'.$weight.';font-style:italic">'.$alphabet.'</div>';
        }
    echo '</div>';
    
$font_face_weight = [ 100, 900 ];
echo '<div class="style-section-title">Font project <span>(--font-project '.$font_face_weight[0].'>'.$font_face_weight[1].')</span></div>';
    echo '<div class="style-fonts" style="font-family:var(--font-project)">';
    foreach ( $font_face_weight as $weight ) {
        echo '<div style="font-weight:'.$weight.'">'.$alphabet.'</div>';
        echo '<div style="font-weight:'.$weight.';font-style:italic">'.$alphabet.'</div>';
    }
    echo '</div>';

/*----------  Icons  ----------*/

echo '<div class="style-section-title">Icons</div>';
    echo '<div class="style-list style-list--icons">';
        foreach( $sprite as $key => $tag ) { 
            echo '<div>';
                echo '<div class="style-square">'.pc_svg($key).'</div>';
                echo '<div class="style-legend">'.$key.'</div>';
            echo '</div>';
        }
    echo '</div>';

/*----------  Buttons  ----------*/

echo '<div class="style-section-title">Buttons</div>';
    echo '<div class="style-list style-list--buttons">';
        echo pc_get_button( 'Button', [], '', 'button' );
        echo pc_get_button( 'Button', [], 'cross', 'button' );
        echo pc_get_button( 'Button', ['class'=>'button--ico'], 'cross', 'button' );
        echo pc_get_button( $alphabet, [], 'cross', 'button' );
    echo '</div>';

/*----------  Card  ----------*/   
    
$get_post = get_posts( [ 'post_type' => NEWS_POST_SLUG, 'posts_per_page' => 1 ] );
$pc_post = new PC_Post( $get_post[0] );
echo '<div class="style-section-title">Card</div>';
    echo $pc_post->display_card();

/*----------  Messages  ----------*/

echo '<div class="style-section-title">Messages</div>';
    echo pc_get_message( 'Lorem ipsum dolor sit amet. Voluptate eiusmod elit minim, laboris tempor. Occaecat culpa ex sed ea, et, ex Duis aliquip. Voluptate tempor mollit voluptate.', 'default', false, $tag = 'div' );
    echo pc_get_message( 'Message', 'error', false, $tag = 'div' );
    echo pc_get_message( 'Message', 'success', false, $tag = 'div' );
    echo pc_get_message( 'Lorem ipsum dolor sit amet. Voluptate eiusmod elit minim, laboris tempor. Occaecat culpa ex sed ea, et, ex Duis aliquip. Voluptate tempor mollit voluptate.', 'default', true, $tag = 'div' );
    echo pc_get_message( 'Message', 'error', true, $tag = 'div' );
    echo pc_get_message( 'Message', 'success', true, $tag = 'div' );


?></body>
</html>
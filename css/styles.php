<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Styles</title>
    <link rel='stylesheet' href='front.css' type='text/css' media='screen'>
    <style>
        body {
            --styles-color : #777;
            --styles-border-color : #eee;
            background-color: #fff;
            padding: var(--space);
            font-size: 1rem;
        }
        .style-section-title {
            color:var(--styles-color);
            font-weight: 800;
            font-size: 1rem;
            text-transform: uppercase;
            background-color: var(--styles-border-color);
            margin-bottom: 1rem;
            padding-inline: 1rem;
        }
        .style-section-title:not(:first-child) { margin-top: 3rem; }
        .style-section-title span {
            text-transform: none;
            font-weight: 400;
        }
        .legend { color: var(--styles-color); }

        .style-fonts { font-size: 2rem; }

        .style-colors {
            display: flex;
            gap: 1rem;
        }
        .style-colors [style] {
            width: 6rem;
            aspect-ratio: 1;
        }

        .style-icons,
        .style-buttons {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 1rem;
        }

        .icon {
            display:flex;
            justify-content: center;
            align-items: center;
            border: 1px solid var(--styles-border-color);
            width: 6rem;
            aspect-ratio: 1;
        }
    </style>
</head>

<body><?php

include $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/wpreform3/include/tools.php';
include $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/wpreform3/images/sprite.php';

echo '<div class="style-section-title">Couleurs</div>';
    $colors = [ 'white', 'black', 'grey', 'red', 'orange', 'blue', 'green' ];
    echo '<div class="style-colors">';
        foreach ( $colors as $color ) { 
            echo '<div>';
                echo '<div style="background-color:hsl(var(--'.$color.'))"></div>';
                echo '<div class="legend">--'.$color.'</div>';
            echo '</div>';
        }
    echo '</div>';

$font_default = [ 200, 800 ];
echo '<div class="style-section-title">Police par défaut <span>(--font-default '.$font_default[0].'>'.$font_default[1].')</span></div>';
    echo '<div class="style-fonts">';
        echo '<div style="font-weight:'.$font_default[0].'">a b c d e f g h i j k l m n o p q r s t u v w x y z 0 1 2 3 4 5 6 8 9</div>';
        echo '<div style="font-weight:'.$font_default[1].'">a b c d e f g h i j k l m n o p q r s t u v w x y z 0 1 2 3 4 5 6 8 9</div>';
    echo '</div>';
    
$font_face = [ 100, 900 ];
echo '<div class="style-section-title">Police projet <span>(--font-project '.$font_face[0].'>'.$font_face[1].')</span></div>';
    echo '<div class="style-fonts" style="font-family:var(--font-project)">';
        echo '<div style="font-weight:'.$font_face[0].'">a b c d e f g h i j k l m n o p q r s t u v w x y z 0 1 2 3 4 5 6 8 9</div>';
        echo '<div style="font-weight:'.$font_face[1].'">a b c d e f g h i j k l m n o p q r s t u v w x y z 0 1 2 3 4 5 6 8 9</div>';
    echo '</div>';

echo '<div class="style-section-title">Icônes</div>';
    echo '<div class="style-icons">';
        foreach( $sprite as $key => $tag ) { 
            echo '<div>';
                echo '<div class="icon">'.pc_svg($key).'</div>';
                echo '<div class="legend">'.$key.'</div>';
            echo '</div>';
        }
    echo '</div>';

echo '<div class="style-section-title">Boutons</div>';
    echo '<div class="style-buttons">';
        echo pc_get_button( 'button', [], '', 'button' );
        echo pc_get_button( 'button', [], 'cross', 'button' );
    echo '</div>';

?></body>
</html>
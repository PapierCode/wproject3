<?php
$metas = get_fields();

get_header();

pc_display_main_start();

    /*==============================
    =            Header            =
    ==============================*/

    pc_display_main_header_start();

        echo '<h1 class="home-title">'.$post->post_title.'</h1>';
        echo '<p class="home-intro">'.pc_get_markdown($metas['home_header_desc']).'</p>';
        $header_btn = $metas['home_header_btn'];
        if ( $header_btn['enable'] ) {
            $header_btn_attrs = array();
            switch ( $header_btn['type'] ) {
                case 'page':
                    $header_btn_attrs['href'] = get_the_permalink( $header_btn['page'] );
                    $header_btn_ico = 'arrow';
                    break;
                case 'file':
                    $header_btn_attrs['href'] = $header_btn['file'];
                    $header_btn_attrs['target'] = '_blank';
                    $header_btn_attrs['download'] = '';
                    $header_btn_ico = 'download';
                    break;
            }
            if ( wp_http_validate_url( $header_btn_attrs['href'] ) ) {
                echo pc_get_button( $header_btn['txt'], $header_btn_attrs, $header_btn_ico );
            }
        }
        
    pc_display_main_header_end();


    /*=====  FIN Header  =====*/

    /*===============================
    =            Content            =
    ===============================*/
    
    /*----------  Shortcuts  ----------*/    
    
    echo '<section class="home-section home-section--shortcut">';
        $class_nb_shortcut = count($metas['home_page_shortcuts'])%2 ? 'card-list--odd' : 'card-list--even';
        echo '<ul class="card-list card-list--home-shortcut '.$class_nb_shortcut.'" aria-label="'.__('Featured pages','wpreform').'">';
            foreach ( $metas['home_page_shortcuts'] as $shortcut ) {
                $pc_shortcut = new PC_Post($shortcut);
                echo '<li class="card-list-item card-list-item--home-shortcut">';
                    $pc_shortcut->display_card();
                echo '</li>';
            }
        echo '</ul>';
    echo '</section>';


    /*----------  Frame  ----------*/
    
    if ( $metas['home_frame_enable'] ) {

        echo '<section class="home-section home-section--frame">';
            echo '<h2 class="home-section-title home-section-title--frame">'.$metas['home_frame_title'].'</h2>';
            echo '<p class="home-section-desc home-section-desc--frame">'.pc_get_markdown($metas['home_frame_desc']).'</p>';
            $frame_btn = $metas['home_frame_btn'];
            if ( $frame_btn['enable'] ) {
                $frame_btn_attrs = array( 'class' => 'home-section-btn home-section-btn--frame');
                switch ( $frame_btn['type'] ) {
                    case 'page':
                        $frame_btn_attrs['href'] = get_the_permalink( $frame_btn['page'] );
                        $frame_btn_attrs['class'] .= ' button--arrow';
                        $frame_btn_ico = 'arrow';
                        break;
                    case 'file':
                        $frame_btn_attrs['href'] = $frame_btn['file'];
                        $frame_btn_attrs['target'] = '_blank';
                        $frame_btn_attrs['download'] = '';
                        $frame_btn_ico = 'download';
                        break;
                }
                if ( wp_http_validate_url( $frame_btn_attrs['href'] ) ) {
                    echo pc_get_button( $frame_btn['txt'], $frame_btn_attrs, $frame_btn_ico );
                }
            }
            if ( $metas['home_frame_img'] ) {
                $frame_img = $metas['home_frame_img'];
                echo '<img src="'.$frame_img['sizes']['card-l'].'" alt="'.$frame_img['alt'].'" width="'.$frame_img['sizes']['card-l-width'].'" height="'.$frame_img['sizes']['card-l-height'].'" loading="lazy" class="home-section-img home-section-img--frame">';
            }
        echo '</section>';

    }

    /*----------  News  ----------*/
    
    if ( get_option('options_news_enabled') ) {

        $get_news = get_posts([
            'post_type' => NEWS_POST_SLUG,
            'posts_per_page' => 3
        ]);
        
        if ( !empty( $get_news ) ) {

            $news_archive_url = get_post_type_archive_link( NEWS_POST_SLUG );

            echo '<section class="home-section home-section--news">';
                echo '<h2 class="home-section-title home-section-title--news">'.__('News','wpreform').'</h2>';
                echo '<ul class="home-news-list" aria-label="'.__('Featured news','wpreform').'">';
                    foreach ( $get_news as $key => $news ) {
                        $pc_news = new PC_Post( $news );
                        echo '<li class="home-news-list-item">';
                            $pc_news->display_card( 3, [], ['key'=>$key] );
                        echo '</li>';
                    }
                echo '</ul>';
                if ( get_option('options_news_tax') ) {
                    $get_news_terms = get_terms([
                        'post_type' => NEWS_POST_SLUG,
                        'taxonomy' => NEWS_TAX_SLUG
                    ]);
                    if ( !empty( $get_news_terms ) ) {
                        echo '<ul class="home-news-term-list" aria-label="'.__('News categories','wpreform').'">';
                            foreach ($get_news_terms as $term) {
                                echo '<li class="home-news-term-list-item">';
                                    echo pc_get_button( 
                                        str_replace( ' ', '&nbsp;', $term->name ),
                                        [
                                            'href' => $news_archive_url.'?category='.$term->term_id,
                                            'rel' => 'nofollow'
                                        ],
                                        'tag'
                                    );
                                echo '</li>';
                            }
                        echo '</ul>';
                    }
                }
                echo pc_get_button( __('All news','wpreform'), ['href' => $news_archive_url,'class'=>'home-section-btn home-section-btn--news'], 'more' );
            echo '</section>';

        }

    }
    
    
    /*=====  FIN Content  =====*/

    /*==============================
    =            Footer            =
    ==============================*/
    
    pc_display_main_footer_start();
        pc_display_share_links();
    pc_display_main_footer_end();    
    
    
    /*=====  FIN Footer  =====*/

    // pc_var( $metas );

pc_display_main_end();

get_footer();
<?php
    $agendaUrl = get_category_link(get_cat_ID('agenda'));
?>
<div class="row">
    <div class="col-md-12 col-sm-6">
        <div class="agenda">
            <h2><a href="<?php echo $agendaUrl ?>">agenda</a></h2>
            <ul>
                <?php

                //query_posts('category_name=agenda&order=desc&orderby=ID&posts_per_page=5');
                query_posts(
                    array(
                        'category_name' => 'agenda',
                        'posts_per_page' => 5,
                        'order'     => 'ASC',
                        'meta_key' => 'EventDate',
                        'orderby'   => 'meta_value' //or 'meta_value_num'
                        /*'meta_query' => array(
                            array(
                                'key' => 'order_in_archive',
                                'value' => 'some_value'
                            )
                        )*/
                    )
                );

                while (have_posts()) {
                    the_post();
                    $metas = get_post_meta(get_the_ID());
                    $post_date = "-";
                    $post_lieu = "-";
                    if (isset($metas['Date'])) {
                        $post_date = $metas['Date'][0];
                    }
                    if (isset($metas['Lieu'])) {
                        $post_lieu = $metas['Lieu'][0];
                    }
                    ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <h5><?php echo $post_date; ?></h5>
                            <h4><?php the_title(); ?></h4>
                            <h6><?php echo $post_lieu; ?></h6>
                        </a>
                    </li>
                    <?php
                }
                wp_reset_query();
                ?>

                <li class="text-right"><a href="<?php echo $agendaUrl ?>">voir toutes les dates ></a></li>

            </ul>
        </div>
    </div>
    <div class="col-md-12 col-sm 6" style="margin-bottom: 20px">
        <div class="fb-page" data-href="https://www.facebook.com/Bagad-Brieg-Pipe-Band-1673356046224938/"
             data-width="340"
             data-hide-cover="false"
             data-show-facepile="true"></div>
    </div>
    <div class="col-md-12 col-sm-6">
        <?php wp_nav_menu( array('theme_location' => 'footer', 'menu_class' => 'other-menu' )); ?>
    </div>
</div>
<br class="visible-xs visible-sm hidden-md"/>

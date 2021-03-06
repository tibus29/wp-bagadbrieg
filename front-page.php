<?php

$postList = get_posts(array('category_name' => 'actualites'));

global $fb_tags;
$fb_tags = "<meta property=\"og:title\" content=\"".get_bloginfo('name')." - ".get_the_title()."\" />
                <meta property=\"og:description\" content=\"".get_the_excerpt()."\" />
                <meta property=\"og:url\" content=\"".get_home_url()."\" />
                <meta property=\"og:image\" content=\"".wp_get_attachment_url( get_post_thumbnail_id() )."\" />";

?>

<article class="home">

    <div id="carousel-news" class="carousel slide" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

            <?php $i = 0; foreach ( $postList as $post ) : setup_postdata( $post ); ?>
                <div class="item <?php echo $i++ == 0 ? 'active' : '' ?>">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('full'); ?>
                    </a>
                    <div class="carousel-caption">
                        <h3><?php the_title(); ?></h3>
                        <p class="excerpt"><?php the_excerpt(); ?></p>
                        <p class="more"><a href="<?php the_permalink(); ?>">lire la suite ></a></p>
                        <?php get_template_part('templates/page', 'footer'); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-news" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-news" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php $i = 0; foreach ( $postList as $post ) : setup_postdata( $post ); ?>
                <li data-target="#carousel-news" data-slide-to="<?php echo $i; ?>" class="<?php echo $i++ == 0 ? 'active' : '' ?>"></li>
            <?php endforeach; ?>
        </ol>

    </div>

    <a class="large-btn" title="Voir tous les articles" href="<?php echo esc_url(get_category_link(get_cat_ID('actualites'))); ?>">voir tous les articles</a>
    <br class="visible-xs visible-sm hidden-md"/>
</article>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.carousel-caption > p.excerpt').next('p').children('a').hide()
    });
</script>

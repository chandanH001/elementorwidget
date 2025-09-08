<?php get_header();

$args = array(
            'post_type'      => 'service',
            'post_status'    => 'publish',
            'posts_per_page'   => '-1',
			'order'   => 'title',
            'orderby' => 'date',
        );
        $query = new \WP_Query( $args );

?>


<!-- service area start -->
<section class="tp-service-details-ptb pt-130 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="tp-service-sidebar mb-50">
                    <div class="tp-service-sidebar-content mb-40">
                        <h4 class="tp-service-sidebar-title">Solar service category</h4>
                        <div class="tp-service-sidebar-list">
                            <ul>

                                <?php if ($query-> have_posts()): while ($query-> have_posts()): $query-> the_post(); 
                                $categories = get_the_category();
                                // var_dump($categories);
                                
                                ?>
                                <li><a href="<?php the_permalink();?>">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div><?php the_title();?></div>
                                            <div><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12"
                                                    viewBox="0 0 7 12" fill="none">
                                                    <path d="M1 11L6 6L1 1" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg></div>
                                        </div>
                                    </a></li>
                                <?php endwhile; wp_reset_postdata(); else: ?>
                                <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-8">
                <div class="tp-service-details-right-wrap">
                    <?php the_content();?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service area end -->

<?php get_footer();?>
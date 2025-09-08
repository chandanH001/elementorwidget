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
                                <?php endwhile;else: ?>
                                <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-8">
                <div class="tp-service-details-right-wrap">
                    <div class="tp-service-details-thumb mb-50">
                        <img src="assets/img/service/service-details/service-details-1.jpg" alt="">
                    </div>
                    <div class="tp-service-details-content mb-45">
                        <h3 class="tp-service-details-section-title mb-20">Working in the fields of UX design</h3>
                        <p class="mb-35">IT company content is important for a number of reasons. First, it can help you
                            attract potential customers. When you create content that is relevant to your target
                            audience, you position yourself as an expert in your field and increase the chances that
                            potential customers will find you. IT company content can help you educate potential
                            customers about your products and services.</p>
                        <p class="mb-0">We are committed to providing our clients with the highest quality IT services
                            and support. We understand that IT is essential for your business, and we will work
                            tirelessly to help you achieve your business goals.</p>
                    </div>
                    <div class="tp-service-details-feature mb-65">
                        <h4 class="tp-service-details-feature-title mb-30">Going beyond the usual</h4>
                        <div class="tp-service-details-feature-item d-flex align-items-start">
                            <span>
                                <svg width="10" height="8" viewBox="0 0 10 8" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 1L3.5 6.5L1 4" stroke="currentcolor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <div class="tp-service-details-feature-content">
                                <span>Product Quality:</span>
                                <p>Automatically syncs across all your devices. You can also access</p>
                            </div>
                        </div>
                        <div class="tp-service-details-feature-item d-flex align-items-start">
                            <span>
                                <svg width="10" height="8" viewBox="0 0 10 8" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 1L3.5 6.5L1 4" stroke="currentcolor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <div class="tp-service-details-feature-content">
                                <span>On demand design:</span>
                                <p>Images, videos, PDFs and audio files are supported.</p>
                            </div>
                        </div>
                        <div class="tp-service-details-feature-item d-flex align-items-start">
                            <span>
                                <svg width="10" height="8" viewBox="0 0 10 8" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 1L3.5 6.5L1 4" stroke="currentcolor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <div class="tp-service-details-feature-content">
                                <span>Choice of service:</span>
                                <p>Whatever your business needs, you can choose a service.</p>
                            </div>
                        </div>
                    </div>
                    <div class="tp-service-details-faq-wrap">
                        <h3 class="tp-service-details-section-title mb-20">What answer are you find?</h3>
                        <div class="tp-faq-box">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            Can I get free 3 month solar installations?
                                            <span class="accordion-btn"></span>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Our tools are easy to use and affordable, so you can
                                            start improving your website's SEO today.</div>
                                    </div>
                                </div>
                                <div class="accordion-item active">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                            aria-controls="flush-collapseTwo">
                                            Do I get all the demos and templates with?
                                            <span class="accordion-btn"></span>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Our tools are easy to use and affordable, so you can
                                            start improving your website's SEO today.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                            aria-expanded="false" aria-controls="flush-collapseThree">
                                            How do you find different criteria in your process?
                                            <span class="accordion-btn"></span>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Our tools are easy to use and affordable, so you can
                                            start improving your website's SEO today.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapsfour"
                                            aria-expanded="false" aria-controls="flush-collapsfour">
                                            What do I need to apply for an account?
                                            <span class="accordion-btn"></span>
                                        </button>
                                    </h2>
                                    <div id="flush-collapsfour" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Our tools are easy to use and affordable, so you can
                                            start improving your website's SEO today.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapsfive"
                                            aria-expanded="false" aria-controls="flush-collapsfive">
                                            Can you explain your unlimited cleanup policy?
                                            <span class="accordion-btn"></span>
                                        </button>
                                    </h2>
                                    <div id="flush-collapsfive" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Our tools are easy to use and affordable, so you can
                                            start improving your website's SEO today.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service area end -->

<?php get_footer();?>
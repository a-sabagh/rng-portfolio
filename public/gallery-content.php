<div class="vlt-site-holder animsition vlt-footer-fixed">
    <div class="vlt-content-holder">
        <main class="vlt-main-holder vlt-main-padding">
            <div class="container">
                <div class="vlt-portfolio-grid-filters">
                    <div data-filter="*" class="cbp-filter-item cbp-filter-item-active"><span>All</span></div>
                    <?php
                    $categories = array_unique($category_arr);
                    foreach ($categories as $category) {
                        echo '<div data-filter=".portfolio_category-' . $category . '" class="cbp-filter-item"><span>' . $category . '</span></div>';
                    }
                    ?>
                </div>
                <div class="vlt-portfolio-grid cubeportfolio" id="cubeportfolio">
                    <?php
                    foreach ($gallery_info as $gallery) {
                        ?>
                        <article class="cbp-item vlt-portfolio-grid-item vlt-portfolio-style2 portfolio_category-<?php echo $gallery['category']; ?>">
                            <div class="vlt-portfolio-grid-image">
                                <a class="vlt-portfolio-grid-link" href="<?php echo esc_url($gallery['link']); ?>">
                                    <img src="<?php echo esc_attr($gallery['image']['url']); ?>" alt="<?php echo esc_attr($gallery['image']['alt']); ?>">
                                </a>
                            </div>
                            <div class="vlt-portfolio-grid-content">
                                <h5 class="vlt-portfolio-grid-title"><?php echo esc_textarea($gallery['image-title']); ?></h5>
                                <p class="vlt-portfolio-grid-cat"><?php echo $gallery['category'] ?></p>
                            </div>
                        </article>
                        <!-- /.cbp-item  -->
                        <?php
                    }
                    ?>
                </div>
                <nav class="vlt-pagination-load-more-btn" data-max-pages="1">
                    <a href="#" class="vlt-btn vlt-btn-primary vlt-btn-ajax-load">Load More</a>
                </nav>
            </div>
        </main>
        <!-- /.vlt-main-holder vlt-main-padding -->
    </div>
    <!-- /.vlt-content-holder -->
</div>
<!-- /.vlt-site-holder -->
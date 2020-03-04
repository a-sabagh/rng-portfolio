<div class="pct-tab-wrapper">
    <div class="pct-tab-categories">
        <ul class="pct-category-list">
            <?php
            for ($i = 0; $i < count($category_repeater); $i++) {
                $term = get_term($category_repeater[$i]);
                $term_name = $term->name;
                ?>
                <li>
                    <a class="category-item-click" data-content="#pct-category-content-<?php echo $i; ?>" href="#" title="<?php echo $term_name; ?>">
                        <?php echo $term_name; ?>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="pct-tab-contents">
        <div class="pct-preloader"><p>در حال بارگزاری</p></div>
        <?php
        for ($i = 0; $i < count($category_repeater); $i++) {
            $category_item = $category_repeater[$i];
            $term_childrens = get_terms(array(
                'taxonomy' => 'product_cat',
                'parent' => $category_item['product_cat_id'],
            ));
            $slider_ids = $category_item['slider_ids'];
            $product_ids = $category_item['product_ids'];
            if (!empty($single_image)) {
                $background_src = current(wp_get_attachment_image_src($single_image['id']));
                $style = "style='background: url($background_src)'";
            } elseif (!empty($background_color)) {
                $style = "style='background-color: {$background_color};'";
            } else {
                $style = "style='background-color: #031d9b;'";
            }
            ?>
            <div class="pct-content-item-wrapper" id="pct-category-content-<?php echo $i; ?>">
                <div class="pct-content-item" >
                    <div class="pct-right-wrapper" <?php echo $style; ?>>
                        <ul class="pct-category-childrens">
                            <?php
                            foreach ($term_childrens as $term_child) {
                                ?>
                                <li>
                                    <a href="<?php echo get_term_link($term_child->term_id); ?>" title="<?php echo $term_child->name; ?>" >
                                        <?php echo $term_child->name; ?>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="pct-slider-wrapper">
                        <div class="pct-slider-list">
                            <?php
                            foreach ($slider_ids as $slider_id) {
                                $attachment_src = wp_get_attachment_image_src($slider_id);
                                ?>
                                <div class="slider-item" >
                                    <img src="<?php echo $attachment_src[0]; ?>" alt="" />
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <ul class="pct-product-list">
                        <?php
                        foreach ($product_ids as $product_id) {
                            $product = wc_get_product($product_id);
                            $image_src = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'medium');
                            ?>
                            <li class="pct-product-item">
                                <a href="#" title="<?php echo $product->get_name(); ?>" >
                                    <img src="<?php echo $image_src; ?>" />
                                </a>
                                <h4>
                                    <a href="#" title="" ><?php echo $product->get_name(); ?></a>
                                </h4>
                                <p class="pct-product-price">
                                    <span class="price-value"><?php echo $product->get_price(); ?></span>&nbsp;
                                    <span class="price-symbol"><?php echo get_woocommerce_currency_symbol(); ?></span>
                                </p>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<?php

$month = esc_html__('Month', 'organio');
$months = esc_html__('Months', 'organio');
$day = esc_html__('Day', 'organio');
$days = esc_html__('Day', 'organio');
$hour = esc_html__('Hour', 'organio');
$hours = esc_html__('Hour', 'organio');
$minute = esc_html__('Min', 'organio');
$minutes = esc_html__('Min', 'organio');
$second = esc_html__('Sec', 'organio');
$seconds = esc_html__('Sec', 'organio');

$html_id = ct_get_element_id($settings);
$source = $widget->get_setting('source', '');
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
extract(ct_get_posts_of_grid('product', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$widget->add_render_attribute( 'inner', [
    'class' => 'ct-carousel-inner',
] );

$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');


$arrows = $widget->get_setting('arrows');
$dots = $widget->get_setting('dots');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite');
$speed = $widget->get_setting('speed', '500');

if (is_rtl()) {
    $carousel_dir = 'true';
} else {
    $carousel_dir = 'false';
}

$widget->add_render_attribute( 'carousel', [
    'class' => 'ct-slick-carousel slick-shadow',
    'data-arrows' => $arrows,
    'data-dots' => $dots,
    'data-pauseOnHover' => $pause_on_hover,
    'data-autoplay' => $autoplay,
    'data-autoplaySpeed' => $autoplay_speed,
    'data-infinite' => $infinite,
    'data-speed' => $speed,
    'data-dir' => $carousel_dir,
    'data-colxs' => $col_xs,
    'data-colsm' => $col_sm,
    'data-colmd' => $col_md,
    'data-collg' => $col_lg,
    'data-colxl' => $col_xl,
    'data-slidesToScroll' => $slides_to_scroll,
] );

$title_tag = $widget->get_setting('title_tag', 'h3');

$thumbnail_size = $widget->get_setting('thumbnail_size', 'full');
$thumbnail_custom_dimension = $widget->get_setting('thumbnail_custom_dimension', '');
if($thumbnail_size != 'custom'){
    $img_size = $thumbnail_size;
}
elseif(!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])){
    $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
}
else{
    $img_size = '600x500';
}?>
<?php if (is_array($posts)): ?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-product-carousel2 woocommerce-product-meta-grid ct-slick-slider ct-arrow-middle woocommerce <?php echo esc_attr($settings['style']); ?>" <?php if($settings['drap']) : ?>data-cursor-label="<?php echo esc_html('DRAG', 'itfirm'); ?>"<?php endif; ?>>
    <div <?php ct_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
        <div <?php ct_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>

        <?php
            foreach ($posts as $post):
            $line_color = get_post_meta($post->ID, 'line_color', true);
            if(class_exists('Woocommerce')) {
                $product = wc_get_product( $post->ID );
                ?>
                <div class="carousel-item slick-slide">
                    <div class="grid-item-inner <?php echo esc_attr($settings['ct_animate']); ?>">
                        <div class="woocommerce-product-inner" <?php if(!empty($line_color['rgba'])) : ?>style="border-color: <?php echo esc_attr($line_color['rgba']); ?>"<?php endif; ?>>
                            <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                                $img_id       = get_post_thumbnail_id( $post->ID );
                                $product_date = get_post_meta($post->ID, 'product_date', true);
                                $img          = ct_get_image_by_size( array(
                                    'attach_id'  => $img_id,
                                    'thumb_size' => $img_size,
                                ) );
                                $thumbnail    = $img['thumbnail'];
                                ?>
                                <div class="woocommerce-product-header">
                                    <svg data-name="Product-Shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 103.68 110.93"><path d="M366.06,226.05a38.51,38.51,0,0,0,4.28-4c.93-.92,1.7-2,2.54-3,.4-.51.85-1,1.2-1.54l1.09-1.62c.38-.56.76-1.12,1.12-1.69.22-.35.48-.73.73-1.19a45.27,45.27,0,0,0,2.85-5.65l-.09.43c0,.33,0,.44.19.18a20.33,20.33,0,0,0,1.71-5.9c.05-.2.11-.4.16-.6a50.26,50.26,0,0,0,1.46-15.86,24.31,24.31,0,0,0-.65-4.48c-.15-.62-.3-1.25-.46-1.9a16.92,16.92,0,0,0-.51-2c-.23-.72-.43-1.47-.66-2.22.34.37.42.09.53-.27.45.15,1.68,3.57,1.82,2.5-.22-.64-.42-1.25-.62-1.82-.09-.28-.19-.56-.28-.82s-.22-.5-.33-.74c-.43-.95-.81-1.76-1.13-2.46a15,15,0,0,0-1.6-2.81c-.72-1-1-1-1.39-.87a42.07,42.07,0,0,0-4.28-6.61,52.14,52.14,0,0,1,4.12,6.68c-.24.11-.43.29.59,2.43.44.85.66,1.54,1,2.1s.58,1,.87,1.58l.34.57a46.44,46.44,0,0,1,.83,26.46,48,48,0,0,1-3.38,8.9c0-.33,0-.42-.33,0a25.32,25.32,0,0,0-1.95,4.11c-.36.57-.76,1.13-1.15,1.69l-.47.07c.71-1,1.4-2.08,2-3.17a46.35,46.35,0,0,0-15-62.3c-.37-.25-.73-.51-1.11-.73l-1.16-.64-2.33-1.25c-1.58-.79-3.24-1.4-4.87-2.08-1.69-.5-3.36-1.08-5.08-1.45l-2.6-.51c-.43-.07-.86-.17-1.3-.23l-1.31-.13a47.57,47.57,0,0,0-20.77,2.4l-2.49,1a20.64,20.64,0,0,0-2.42,1.15c-1,.54-2.08,1.12-2.9,1.6s-1.33,1-1.31,1.09.09.18.45.06,1-.47,2.17-1l3-1.42,3.51-1.37c.83-.34,1.71-.53,2.56-.8s1.7-.53,2.58-.7l2.63-.49c.43-.08.87-.18,1.31-.23l1.33-.13-.21.24c-1.82.44,1.91,0,2.79,0s1.74.06,2.71.08a25.13,25.13,0,0,1,3,.16h0c-.11.13-1.45.14,0,.4h0l.15,0a3.47,3.47,0,0,0,.74.13c.56.11,1.23.22,2,.34s1.58.35,2.51.53c.2.11-.07.14.75.36a45.95,45.95,0,0,1,21.42,12.57,41.92,41.92,0,0,1,9.3,14.19,43.32,43.32,0,0,1,3,16.73,24.17,24.17,0,0,1-.2,3.28,25.36,25.36,0,0,1-.43,3.25c-.22,1.08-.4,2.16-.67,3.22l-.95,3.15a11.79,11.79,0,0,1-.56,1.54l-.64,1.52-.63,1.51c-.24.49-.52,1-.77,1.45s-.43.78-.64,1.18a5.81,5.81,0,0,0-.95,1.16l-1.25,1.87a7.71,7.71,0,0,1-1.11,1.25c.22-.54.47-1,.63-1.56s.27-.9.4-1.33a44,44,0,0,0,4-8.17,41.73,41.73,0,0,0,.4-26.7,42.54,42.54,0,0,0-6.43-12.42,39.94,39.94,0,0,0-10.2-9.55,40.94,40.94,0,0,0-12.72-5.65,41.48,41.48,0,0,0-13.81-1,25.71,25.71,0,0,0-5.93,1.26c-.71.22-1.37.55-2.17.84s-1.74.58-2.89,1.12c-.91.4.42.05.63.08.44,0,3.68-.79,4.09-.7-.63.29-1.84.66-3,1a11.61,11.61,0,0,0-2.48,1.13c.64-.12,1.67-.6,2.69-.88l2.64-.72c.77-.22,1.46-.27,2.05-.39a19.6,19.6,0,0,1,2.69-.35,12.66,12.66,0,0,1,1.56,0,39,39,0,0,0-8.68,1.81,1.67,1.67,0,0,0-.81.05,11.75,11.75,0,0,0-1.32.49c-.27.21-.3.28-.07.26a38.87,38.87,0,0,0-18,57.58c.26.62.54,1.23.78,1.87-.19,0-.07.5.22,1.05s.67,1.15.86,1.58c-.9-1-1.76-2.09-2.54-3.18-.19-.29-.38-.56-.56-.82a2.12,2.12,0,0,0-.25-.76,13.5,13.5,0,0,0-.79-1.71c-1-1.83-.75-.68-1-.65l-.77-1.23a21.25,21.25,0,0,1-1.1-1.92c-.34-.63-.67-1.27-1-2-.55-1.28-.85-1.41-.5.18l.71,2.43c.12.41.24.83.38,1.26s.37.86.56,1.32A27.24,27.24,0,0,0,303,215.2c.41.48.89,1.11,1.34,1.66,3.37,3.61,3.56,3.74,2.14,2.94-.47-.41-1-.9-1.57-1.43-.27-.27-.57-.53-.85-.83l-.8-.94c-.54-.64-1.09-1.28-1.61-1.91s-.94-1.3-1.38-1.87L299.06,211a11.86,11.86,0,0,0-1.33-2.25,15.77,15.77,0,0,0,1,2.12c.35.63.77,1.23,1.16,1.85.19.49.2.67-.09.34a11.05,11.05,0,0,1-.68-.92l-.53-.8c-.19-.32-.38-.69-.6-1.11l-1.32-2.66c-.38-.95-.78-1.93-1.25-2.89a25.72,25.72,0,0,0,1.87,4.52c.39.76.77,1.51,1.12,2.18s.73,1.23,1,1.71a10.9,10.9,0,0,1-1.43-2,13.53,13.53,0,0,0-1.19-1.94,23.44,23.44,0,0,0,1.4,2.79c.61,1,1.23,1.91,1.68,2.71.13.24.24.42.33.57-.07,0-.1,0-.1.14a7.12,7.12,0,0,1-.47-.6,41.91,41.91,0,0,1-2.69-4.51l-1.18-2.34-.15-.36c0-.58-.13-1.35-.21-2.05a26.58,26.58,0,0,0-.57-3.51c-.08-.34-.17-.67-.25-1s-.11-.68-.17-1c-.12-.64-.25-1.23-.38-1.72-.91-3.18-.73-.12-.66,1.64a11.36,11.36,0,0,1,0,1.24c-.19-.58-.37-1.16-.51-1.74h0a44,44,0,0,1-.9-5.21l-.26-2.63c0-.88,0-1.76,0-2.65a56,56,0,0,1,.37-5.68c.06-.7.23-1.38.32-2a32.87,32.87,0,0,1,.84-3.79s0,0,0,0a7.2,7.2,0,0,0,.85-2.11c.59-1.46,1-2.64.84-2.93a1.56,1.56,0,0,0-.17.25c.62-1.62,1.09-2.95,1.28-3.51.2-.78-.79.7-1.63,2.62a32.44,32.44,0,0,0-2.72,7.31,2,2,0,0,1-.24.46c.08-.46.14-.93.23-1.39l.34-1.38a96.53,96.53,0,0,1,4.43-11.53c-4.71,7.84-7,15.91-6.79,24.26,0,2,.33,4.09.49,6.4a43.94,43.94,0,0,0,3.32,12.19,25.51,25.51,0,0,0,1.23,2.59c.45.85.85,1.72,1.33,2.52l1.44,2.33.68,1.11c.23.36.48.69.71,1-.29-.3-.55-.52-.88-.91-.49-.63-1.48-2.09-1.19-1.44a13.93,13.93,0,0,0,.91,1.57c.42.61,1,1.22,1.4,1.76a36.25,36.25,0,0,0,2.76,3.07l1.49,1.49.76.77.84.71a41.33,41.33,0,0,0,5.43,4.16l.07.07c.28.25.63.54,1,.84s.92.56,1.46.86a13.1,13.1,0,0,0,2.69,1.28l.35.08c.72.34,1.45.67,2.19,1s1.7.76,2.59,1.05l2.68.83,1.34.41,1.38.29,2.75.55c.93.17,1.87.22,2.8.33s1.87.23,2.81.22h.88a14.4,14.4,0,0,0,1.54.26c.63,0,1.5,0,2.26.05l2.24.3c-.25.21-.37.41-1.89.63a11.73,11.73,0,0,0-3,.12c-.93.1,0,.36.78.39.35.28,1.4.4,4.06.16a31.53,31.53,0,0,0,5.41-.54,7.47,7.47,0,0,0,2.54-1.45c.19-.31.12-.53-.46-.57a7.24,7.24,0,0,0-1.29.11c-.58.07-1.31.28-2.27.36l-3.08-.22a46.74,46.74,0,0,0,19.08-6.79l2.46-1.59C364.54,227.27,365.3,226.65,366.06,226.05Zm-43.36.58h0c.39,0,0-.16-.54-.28l-.43-.06A47,47,0,0,1,314.9,223a4.34,4.34,0,0,0-1-1,17.89,17.89,0,0,1-1.95-.9,32.07,32.07,0,0,1-3-2.35c-.49-.62-1-1.45-1.8-2.55-.19-.29-.49-.74-.73-1.12l.19-.29.31.39,1.76,1.81.88.91,1,.81,1.93,1.63,2.08,1.44.14.09a40.06,40.06,0,0,0,12.2,5.39,35.58,35.58,0,0,0,4.24.79c.53.12,1.05.24,1.56.33.72.05,1.43.09,2.14.1a9.65,9.65,0,0,0,2.32-.14c1,0,2-.09,3.06-.19a38.82,38.82,0,0,0,7.39-1.46s-.05.07,0,.09.2.08.52,0a15.29,15.29,0,0,0,2-.73c.46-.22.89-.39,1.24-.6s.48-.31.69-.46a22.15,22.15,0,0,0,2.1-1.12,5.48,5.48,0,0,0,1-.36q.34-.15.75-.36l.84-.54a40.32,40.32,0,0,0,5.65-4.15c-.26.3-.5.6-.72.89l-.08.07s0,0,0,0h0l0,0-2.32,1.85-2.49,1.61c-.81.57-1.71,1-2.56,1.45a27.18,27.18,0,0,1-2.58,1.31,44.89,44.89,0,0,1-11.83,3l-1.34.15h0l-.21,0-.39,0h-2c-.67,0-1.35,0-2,0l-2-.19A35.9,35.9,0,0,1,322.7,226.63Zm19.36,5.12-.33.1h-.07a39.28,39.28,0,0,1-11,0,21.13,21.13,0,0,0-2.6-.59l-1.57-.44,2.2.39,1.12.2c.37.05.75.07,1.12.11a36.48,36.48,0,0,0,12.82-.66c1-.2,2-.45,2.94-.73A18,18,0,0,1,342.06,231.75Zm13.88-.21c-.81.39-1.71.71-2.6,1.09a24.81,24.81,0,0,1-2.69,1l-1.26.36a.22.22,0,0,1,0-.22c1.48-.45,2.94-1,4.37-1.54a6.09,6.09,0,0,0,.89-.24c.73-.28,1.64-.68,2.37-1Zm2-5.09c-.33.18-.68.35-1,.53.35-.3.72-.62,1.18-1a19.22,19.22,0,0,0,3.56-3.57,40.43,40.43,0,0,0,7.17-7.09,16.58,16.58,0,0,1-4,6.15,2.61,2.61,0,0,1-.24.23c-.82.66-1.66,1.29-2.51,1.91s-1.81,1.25-2.72,1.88Zm1.83,3.08L362,228l.82-.7c.2-.15.41-.28.62-.43a46.59,46.59,0,0,0,7.94-7.43c0,.05,0,.08,0,.14a.13.13,0,0,0,.14.13,45.39,45.39,0,0,1-4.31,4.46A50.35,50.35,0,0,1,359.76,229.53Z" transform="translate(-284.29 -136.28)"/><path d="M296.59,219c2.59,2.39,5.72,5.82,9.82,8.62a13.39,13.39,0,0,0,1.81,1.71q1,.82,2,1.62c.71.52,1.49,1,2.26,1.42a23.3,23.3,0,0,0,2.42,1.31,37.84,37.84,0,0,0,5.34,2c.94.27,1.89.58,2.85.82l3,.56c-1.55-.59-3.19-1.07-4.81-1.81l-2.5-1-2.47-1.2-1.27-.59c-.42-.2-.81-.46-1.22-.68l-2.46-1.4c-.82-.48-1.57-1.07-2.37-1.59a23.71,23.71,0,0,1-2.29-1.69,24.19,24.19,0,0,1-4.28-3.45c-.63-.64-1.25-1.25-1.82-1.91s-1-1.37-1.55-2.06a51.19,51.19,0,0,1-5-8.91c-.74-.47-1.3-1-2.27-1.74l.78,1.72c.25.54.54,1,.77,1.48.48.92.87,1.74,1.21,2.52C295.3,216.28,295.92,217.54,296.59,219Z" transform="translate(-284.29 -136.28)"/><path d="M288.08,203.27a8.28,8.28,0,0,1-.33-1.87,8.82,8.82,0,0,1,0-1.53,22.24,22.24,0,0,0,1.56,3.59c.66,1.15,1.31,2,.56-1.22-.24-1.61-.47-3.31-.76-5-.12-1.69-.36-3.36-.61-4.93-.09-1.21-.36-.69-.35.83s.1,3.07-.26,2.31c-.16-1.21-.31-2.13-.45-2.79a3.32,3.32,0,0,0-.25-1.15c-.1-.12-.2,0-.3.44a5,5,0,0,0-.15.8c0,.33,0,.73,0,1.19-.33,4.55.85,10,1.46,13.84a18.28,18.28,0,0,0,1.7,4.19c.57.46.79,0,.93-.56a15.5,15.5,0,0,0-1.38-4C288.89,206.05,288.45,204.58,288.08,203.27Z" transform="translate(-284.29 -136.28)"/><path d="M352.89,238.09c-6.75,2.49-7.88,1.7-9.21,1.42l2-.36,1-.17c.34-.08.68-.18,1-.27,1.36-.37,2.77-.7,4.13-1.15s2.63-1.08,3.84-1.68a19,19,0,0,0,3.17-2.22,43.17,43.17,0,0,1-15.61,5.41c-1.62.39-3.46.37-4.65.7-1.69.41-1.08.65-.23.88,1.2.32,1.82.48,1.19.67a24.55,24.55,0,0,1-6.17.48h0a34.29,34.29,0,0,1-4.65.69l-2-.54c-.64-.21-1.28-.47-1.91-.71,1-.16-.12-.79-.8-1.34s-.94-1,1.56-.89a37,37,0,0,1-3.93-.49l-4.08-.94L311,235.47l-2.07-1c-.69-.31-1.3-.72-1.87-1-2-1.06-2.93-1.43-2.71-1a6.33,6.33,0,0,0,1.2,1.14l1.28,1a14,14,0,0,0,1.78,1.21c2.33,1.38,3.59,2.32,4.59,2.92s1.58,1.17,2.57,1.82c5.86,2.71,12.33,4,17.44,3.37h0c2.8-.33,2.55-.81,8.29-1.34a26,26,0,0,0,12.93-3.64c.81-.36,1.85-.74,2.73-1.13a6.42,6.42,0,0,0,1.81-1.19c.22-.31-1.31.45-2.46.9C355.24,237.7,358.31,235.74,352.89,238.09Z" transform="translate(-284.29 -136.28)"/><path d="M386.82,200.25a14.26,14.26,0,0,0,.14-1.78c-.07-2.28-.82-1.49-1.5,1.36-.53,1.61-.92,3.21-1.28,4.76s-.85,3-1.17,4.51c-.17.64-.19,1.23,0,1a20.61,20.61,0,0,0,1.11-2.32l1.05-2.42C385.79,203.69,386.26,202,386.82,200.25Z" transform="translate(-284.29 -136.28)"/><path d="M387.54,199.22c-.53,3.66-.85,6.11-1.3,8.15-.2,1-.38,2-.56,3s-.56,1.92-.93,3c-.28.84-.07.76.4-.08a18.12,18.12,0,0,0,.85-1.78c.4-1.11.64-2.45,1-3.76a26,26,0,0,0,.76-3.88C388,201.39,388.1,199.48,387.54,199.22Z" transform="translate(-284.29 -136.28)"/><path d="M295.55,176c-.31,1.13-.53,2.14-.88,3.23a18.63,18.63,0,0,0-1.62,2.51,5.89,5.89,0,0,0-.78,2.57c-.1,1.38,0,2.05.22,1.62a2.94,2.94,0,0,1,.81-1,6.08,6.08,0,0,0,1-2c0,.33,0,.74-.08,1.18s0,.91,0,1.33c0,.83.12,1.46.41,1.32.2-3.64,1.51-7.46,2.28-10.38,1.17-3.28-.61-1.19.3-4.23A34.76,34.76,0,0,0,295.55,176Z" transform="translate(-284.29 -136.28)"/><path d="M306.85,157c-.84,1.06.28.43,1.77-.64a17.14,17.14,0,0,1,2.1-1.35l2.24-1.39,2.57-1.31,1.39-.71,1.53-.62a10,10,0,0,0-2.14.52c-.74.28-1.52.61-2.29.94l-1.16.5c-.37.18-.71.39-1.06.58-.69.37-1.33.71-1.9,1A9.6,9.6,0,0,0,306.85,157Z" transform="translate(-284.29 -136.28)"/><path d="M380.76,213.08a8.48,8.48,0,0,0-1.6,2.31c-.38.68-.79,1.54-1.23,2.41s-1,1.73-1.41,2.53c-.8,1.63-1.53,2.82-1.29,2.79a2.67,2.67,0,0,0,.88-.72c.37-.44.79-1,1.21-1.62a33.13,33.13,0,0,0,1.8-2.84c.47-.94.86-1.82,1.17-2.55a12.13,12.13,0,0,0,.6-1.74C381,213.24,380.91,213,380.76,213.08Z" transform="translate(-284.29 -136.28)"/><path d="M301.21,171.39c.56-1,1.08-1.75,1.35-2.31s.35-.93.26-1.09-.39.07-.79.55c-.2.24-.42.53-.66.86a6.51,6.51,0,0,0-.68,1.13c-.67,1.34-1.69,2.92-1.74,4.09a9.37,9.37,0,0,0,.92-1.22C300.28,172.85,300.74,172.17,301.21,171.39Z" transform="translate(-284.29 -136.28)"/><path d="M364.64,234.33a18.57,18.57,0,0,0-1.85,1.4c-.47.44-1,.92-.78.91a13.67,13.67,0,0,0,3-1.65c.58-.39,1.2-.75,1.76-1.18l1.68-1.32a33,33,0,0,0,3.23-2.79c-1.16.81-3.07,2-5,3.28C366.09,233.46,365.32,233.86,364.64,234.33Z" transform="translate(-284.29 -136.28)"/><path d="M310.72,233.15c-.54-.33-1.17-.66-1.76-1.1a9.5,9.5,0,0,0-2.71-1.53,6.43,6.43,0,0,0,1.59,1.59c.43.34.9.72,1.4,1.08l1.6,1c1.16.71,2.4,1.24,2.5,1.06s-.36-.62-1.17-1.17C311.77,233.79,311.27,233.48,310.72,233.15Z" transform="translate(-284.29 -136.28)"/><path d="M371.67,231.78c-2,1.27-4.42,3.22-7.35,5.1-.49.32-.79.69-1.75,1.38a14.64,14.64,0,0,0,1.95-1c1.25-.82,2.34-1.28,3.43-1.94a19.68,19.68,0,0,0,3.53-2.93C371.92,232,372,231.51,371.67,231.78Z" transform="translate(-284.29 -136.28)"/><path d="M376.13,224.68a14.29,14.29,0,0,0-2,2.34c-.68.8-1.37,1.64-2.14,2.45a4.32,4.32,0,0,1,1.47-.75,7.81,7.81,0,0,0,2.69-2.36C377.22,224.51,377.72,223.26,376.13,224.68Z" transform="translate(-284.29 -136.28)"/><path d="M371.9,229.52l-.19.18.12-.08.14-.15-.07.05Z" transform="translate(-284.29 -136.28)"/><path d="M342.62,244.86a13.39,13.39,0,0,0-3.32.62,7.86,7.86,0,0,0,3.21.2c2.82-.36,2.64-.7,3.05-.94C346.15,244.36,345,244.43,342.62,244.86Z" transform="translate(-284.29 -136.28)"/><path d="M288,163.55c.37-.51.8-1.25,1.37-2,1.37-1.92,1-1.79.9-1.93s-.73.26-2.08,2.25c-.9,1.57-1,2.19-1,2.43C287.34,164.35,287.63,164.06,288,163.55Z" transform="translate(-284.29 -136.28)"/><path d="M333.75,246.34a18.28,18.28,0,0,0-2.45.08,3.94,3.94,0,0,0-1,.19c-.24.06-.31.14,0,.25a6.62,6.62,0,0,0,2,.35,11,11,0,0,0,3.91-.47C336.37,246.55,335.59,246.38,333.75,246.34Z" transform="translate(-284.29 -136.28)"/><path d="M358.92,231.27c-.43.18-1,.44-1.57.76a18.71,18.71,0,0,0-3.08,1.89c-.12.14,0,.18.34.12a5,5,0,0,0,1.48-.61c1.61-.88,3.34-1.78,3.64-2.41C359.61,231,359.33,231.07,358.92,231.27Z" transform="translate(-284.29 -136.28)"/><path d="M370.09,234.76c-.72.45-1.4,1-2.1,1.53s-1.44,1-2.16,1.57a34.71,34.71,0,0,1-3.94,2.63c.85-.43,1.56-.76,2.13-1.08l1.39-.85,1.68-1.06a15.14,15.14,0,0,0,3.27-2.65C370.56,234.61,370.43,234.55,370.09,234.76Z" transform="translate(-284.29 -136.28)"/><path d="M284.88,204c-.22-.36-.33-.27-.59-.45a18.54,18.54,0,0,0,1.5,4.16,3.88,3.88,0,0,0,.71,1.14c.18.15.14,0-.09-1C285.73,204.76,285.31,204.65,284.88,204Z" transform="translate(-284.29 -136.28)"/><path d="M319.47,145.57a9.3,9.3,0,0,0,3.27-1.29c.21-.19-.4-.13-1.35.11a6,6,0,0,0-2.61,1.09C318.54,145.72,318.47,145.9,319.47,145.57Z" transform="translate(-284.29 -136.28)"/><path d="M295.22,192.75c.07-.36.12-.42.15-.61a35,35,0,0,0,.44-4.22c0-.24-.07-.68-.14-.54a11.7,11.7,0,0,0-.51,4A10.29,10.29,0,0,0,295.22,192.75Z" transform="translate(-284.29 -136.28)"/><path d="M383.8,202.25a7.27,7.27,0,0,0,1-3.26c.12-1.1.09-1.79-.07-1.62-.31.28-.45,1.85-.84,3.2S383.63,202.41,383.8,202.25Z" transform="translate(-284.29 -136.28)"/><path d="M376.46,162.18c.61.9,1,1.22,1.09,1.16A5.68,5.68,0,0,0,376.3,161c-.74-.91-1.22-1.32-1.19-1.08a2,2,0,0,0,.35.79C375.7,161,376,161.52,376.46,162.18Z" transform="translate(-284.29 -136.28)"/><path d="M296.77,223.84a12.09,12.09,0,0,0-1.75-2.59c-.69-.83-1.25-1.69-1.22-1.32a4.72,4.72,0,0,0,.55,1.14c.33.47.76,1,1.17,1.56C296.25,223.54,296.92,224.28,296.77,223.84Z" transform="translate(-284.29 -136.28)"/><path d="M334.12,137.59a9.57,9.57,0,0,0,3.16-.2c.27-.13-.33-.26-1.52-.3a18.49,18.49,0,0,0-2,0,5,5,0,0,0-1.21.28C332.47,137.56,333,137.55,334.12,137.59Z" transform="translate(-284.29 -136.28)"/><path d="M333.16,238.84c.12-.13-.34-.21-1.4-.31a5.29,5.29,0,0,0-2,0c-.24.1-.13.27.9.43C332.18,239.22,333,239,333.16,238.84Z" transform="translate(-284.29 -136.28)"/><path d="M299.09,225.31a4.2,4.2,0,0,0,1.13,1.5c1,1.11,1.77,1.48,1.85,1.32s-.43-.63-1.18-1.44C299.81,225.59,299.24,225.19,299.09,225.31Z" transform="translate(-284.29 -136.28)"/><path d="M289.06,170.31c-.64,1.44-.92,2.29-.68,2.11a5.92,5.92,0,0,0,.93-1.42,6.51,6.51,0,0,0,.76-2.12C290,168.47,289.61,169.14,289.06,170.31Z" transform="translate(-284.29 -136.28)"/><path d="M303.43,227.19c1.2,1,1.81,1.34,2,1.24,0-.15-.25-.54-1.06-1.23-1.26-1-1.8-1.36-1.91-1.22s0,.18.13.39A5.46,5.46,0,0,0,303.43,227.19Z" transform="translate(-284.29 -136.28)"/><path d="M308.69,154.68c.33-.24.65-.59.61-.65s-.8,0-1.94,1c-.84.69-1,1-.86,1.09A6.88,6.88,0,0,0,308.69,154.68Z" transform="translate(-284.29 -136.28)"/><path d="M302.73,235.45a9.13,9.13,0,0,0,2.14,1.59,1.74,1.74,0,0,0,.7.23,10,10,0,0,0-2.19-1.63C303,235.41,302.62,235.3,302.73,235.45Z" transform="translate(-284.29 -136.28)"/><path d="M296.23,202.93a6.77,6.77,0,0,0-.29-1.28c-.41-1.06-.61-1.91-.77-1.59a5.56,5.56,0,0,0,.23,1.38C295.8,202.57,296.12,203.26,296.23,202.93Z" transform="translate(-284.29 -136.28)"/><path d="M296.15,225.24c-.42-.35-.27.11.47.94a7.15,7.15,0,0,0,1.69,1.5c.16-.05-.2-.54-1-1.36C296.92,225.93,296.34,225.41,296.15,225.24Z" transform="translate(-284.29 -136.28)"/><path d="M376.34,216.49c-.56.88-.77,1.34-.68,1.46a3.52,3.52,0,0,0,1.24-1.47c.51-.94.66-1.44.52-1.46S376.89,215.48,376.34,216.49Z" transform="translate(-284.29 -136.28)"/><path d="M383.33,213.72c-.23.39-.5,1-.94,1.77-.74,1.39-1.21,2.4-.95,2.38a9.48,9.48,0,0,0,1.79-2.75,4.24,4.24,0,0,0,.59-1.94C383.72,213.14,383.56,213.32,383.33,213.72Z" transform="translate(-284.29 -136.28)"/><path d="M341.66,136.78a8.15,8.15,0,0,0-2.48-.49,3.91,3.91,0,0,0-1.26.12,12.23,12.23,0,0,0,2.42.38A9.61,9.61,0,0,0,341.66,136.78Z" transform="translate(-284.29 -136.28)"/><path d="M330.34,141.8a5.12,5.12,0,0,0-1.09-.08,4.21,4.21,0,0,0-1.12.31c0,.06.67,0,1.06,0A8.78,8.78,0,0,0,330.34,141.8Z" transform="translate(-284.29 -136.28)"/><path d="M376.2,227.74c-.35.64.19.14,1-.76a8.77,8.77,0,0,0,1.39-1.95,3.18,3.18,0,0,0-.71.55A13,13,0,0,0,376.2,227.74Z" transform="translate(-284.29 -136.28)"/><path d="M386.28,174.37l-.25-.9c-.08-.05-.18-.13-.24-.1l.24.85Z" transform="translate(-284.29 -136.28)"/><path d="M358.68,148.57a10,10,0,0,0,1.39.66c.32,0-.36-.46-1.24-1-.46-.21-1.18-.57-1.35-.6C357,147.57,357.77,148.07,358.68,148.57Z" transform="translate(-284.29 -136.28)"/><path d="M297.75,200.18c-.09-.87-.26-1.55-.4-1.31a3.86,3.86,0,0,0,0,1.09,4,4,0,0,0,.39,1A3.07,3.07,0,0,0,297.75,200.18Z" transform="translate(-284.29 -136.28)"/><path d="M328.5,139.74a9.52,9.52,0,0,0,2.4-.31c.14-.1-.8-.13-1-.16a4.85,4.85,0,0,0-2.12.27C327.41,139.74,327.48,139.83,328.5,139.74Z" transform="translate(-284.29 -136.28)"/><path d="M329.09,143.23l1.56-.12-.18-.19-1.48.21C328.88,143.15,329,143.24,329.09,143.23Z" transform="translate(-284.29 -136.28)"/></svg>
                                    <a class="woocommerce-product-details" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                                </div>
                            <?php endif; ?>
                            <div class="woocommerce-product-meta">
                                <div class="woocommerce-add-to-cart">
                                    <?php
                                    echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                        sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button ajax_add_to_cart %s product_type_%s">%s</a>',
                                            esc_url( $product->add_to_cart_url() ),
                                            esc_attr( $product->get_id() ),
                                            esc_attr( $product->get_sku() ),
                                            $product->is_purchasable() ? 'add_to_cart_button' : '',
                                            esc_attr( $product->get_type() ),
                                            esc_html( $product->add_to_cart_text() )
                                        ),
                                        $product );
                                    ?>
                                </div>
                                <?php if (class_exists('WPCleverWoosc')) { ?>
                                    <div class="woocommerce-compare">
                                        <?php echo do_shortcode('[woosc id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                    </div>
                                <?php } ?>
                                <?php if (class_exists('WPCleverWoosw')) { ?>
                                    <div class="woocommerce-wishlist">
                                        <?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                    </div>
                                <?php } ?>
                                <?php if (class_exists('WPCleverWoosq')) { ?>
                                    <div class="woocommerce-quick-view">
                                        <?php echo do_shortcode('[woosq id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="woocommerce-product-content">
                               <h4 class="woocommerce-product--title">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                                </h4>
                                <span class="price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                                <?php if($settings['style'] == 'style1') : ?>
                                    <div class="woocommerce-product--rating">
                                        <?php 
                                            $rating  = $product->get_average_rating();
                                            $count   = $product->get_rating_count();
                                            echo wc_get_rating_html( $rating, $count );
                                        ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($product_date) && $settings['style'] == 'style3') : ?>
                                    <div class="woocommerce-product--countdown">
                                        <div class="ct-countdown ct-countdown-product1" 
                                            data-month="<?php echo esc_attr($month) ?>"
                                            data-months="<?php echo esc_attr($months) ?>"
                                            data-day="<?php echo esc_attr($day) ?>"
                                            data-days="<?php echo esc_attr($days) ?>"
                                            data-hour="<?php echo esc_attr($hour) ?>"
                                            data-hours="<?php echo esc_attr($hours) ?>"
                                            data-minute="<?php echo esc_attr($minute) ?>"
                                            data-minutes="<?php echo esc_attr($minutes) ?>"
                                            data-second="<?php echo esc_attr($second) ?>"
                                            data-seconds="<?php echo esc_attr($seconds) ?>">
                                            <div class="ct-countdown-inner" data-count-down="<?php echo esc_attr($product_date);?>"></div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>
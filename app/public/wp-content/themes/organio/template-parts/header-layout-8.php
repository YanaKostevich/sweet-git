<?php
/**
 * Template part for displaying default header layout
 */
$sticky_on = organio_get_opt( 'sticky_on', false );
$sticky_header_type = organio_get_opt( 'sticky_header_type', 'scroll-to-bottom' );
$sticky_header_type_page = organio_get_page_opt( 'sticky_header_type_page', 'themeoption' );
if(isset($sticky_header_type_page) && !empty($sticky_header_type_page) && $sticky_header_type_page !== 'themeoption') {
    $sticky_header_type = $sticky_header_type_page;
}
$user_icon = organio_get_opt( 'user_icon', false );
$wishlist_icon = organio_get_opt( 'wishlist_icon', false );
$cart_icon = organio_get_opt( 'cart_icon', false );
$h_phone_label = organio_get_opt( 'h_phone_label' );
$h_phone = organio_get_opt( 'h_phone' );
$h_phone_link = organio_get_opt( 'h_phone_link' );
$logo_mobile = organio_get_opt( 'logo_mobile', array( 'url' => get_template_directory_uri().'/assets/images/logo-dark.png', 'id' => '' ) );
?>
<header id="ct-masthead">
    <div id="ct-header-wrap" class="ct-header-layout8 <?php if($sticky_on == 1) { echo 'is-sticky '; echo esc_attr($sticky_header_type); } ?>" data-offset-sticky="140">
        <div id="ct-header" class="ct-header-main">
            <div class="container">
                <div class="row">
                    <div class="ct-header-branding">
                        <div class="ct-header-branding-inner">
                            <?php get_template_part( 'template-parts/header-branding' ); ?>
                        </div>
                    </div>
                    <div class="ct-header-navigation">
                        <nav class="ct-main-navigation">
                            <div class="ct-main-navigation-inner">
                                <?php if ($logo_mobile['url']) { ?>
                                    <div class="ct-logo-mobile">
                                        <a href="<?php esc_url( esc_url( home_url( '/' ) ) ); ?>" title="<?php esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home"><img src="<?php echo esc_url( $logo_mobile['url'] ); ?>" alt="<?php esc_attr( get_bloginfo( 'name' ) ); ?>"/></a>
                                    </div>
                                <?php } ?>
                                <?php organio_header_mobile_search(); ?>
                                <?php get_template_part( 'template-parts/header-menu' ); ?>
                            </div>
                        </nav>
                    </div>
                    <?php if(!empty($h_phone_label) || !empty($h_phone_link) || !empty($h_phone)) : ?>
                        <div class="ct-header-phone ct-hidden-lg">
                            <div class="ct-header-phone-icon">
                                <i class="flaticon-customer-support"></i>
                            </div>
                            <div class="ct-header-phone-meta">
                                <a href="tel:<?php echo esc_attr($h_phone_link); ?>"><?php echo esc_attr($h_phone); ?></a>
                                <label><?php echo esc_attr($h_phone_label); ?></label>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="ct-menu-overlay"></div>
                </div>
            </div>
            <div id="ct-menu-mobile">
                <?php if(function_exists('up_get_template_part') && $user_icon) : ?>
                    <div class="ct-mobile-meta-item h-btn-user">
                        <i class="flaticon-user"></i>
                        <?php if(is_user_logged_in()) : ?>
                                <ul class="ct-user-account">
                                <?php if(class_exists('WooCommerce') ) :
                                    $my_ac = get_option( 'woocommerce_myaccount_page_id' ); 
                                    ?>
                                    <li><a href="<?php echo esc_url(get_permalink($my_ac)); ?>"><?php echo esc_html__('My Account', 'organio'); ?></a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo esc_url(wp_logout_url()); ?>"><?php echo esc_html__('Log Out', 'organio'); ?></a></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if(class_exists('Woocommerce') && $cart_icon) : ?>
                    <div class="ct-mobile-meta-item btn-nav-cart">
                        <i class="caseicon-shopping-cart-alt"></i>
                    </div>
                <?php endif; ?>
                <div class="ct-mobile-meta-item btn-nav-mobile open-menu">
                    <span></span>
                </div>
            </div>
        </div>
        <div class="ct-header-bottom ct-hidden-lg">
            <div class="ct-header-bottom-inner">
                <?php if ( has_nav_menu( 'menu-shop' ) ) { ?>
                    <div class="ct-menu-shop">
                        <?php $attr_menu = array(
                            'theme_location' => 'menu-shop',
                            'container'  => '',
                            'menu_id'    => 'ct-menu-shop',
                            'menu_class' => 'ct-main-menu children-arrow ct-menu-shop clearfix',
                            'link_before'     => '<span class="ct-icon-menu-lg"><i></i></span><span>',
                            'link_after'      => '</span>',
                            'depth'       => '3',
                            'walker'         => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
                        );
                        wp_nav_menu( $attr_menu ); ?>
                    </div>
                <?php } ?>
                <?php organio_get_product_search_h8(); ?>
                <div class="ct-header-shop-icons">
                    <?php if($wishlist_icon && class_exists('WPCleverWoosw')) : 
                        $woosw_id = get_option( 'woosw_page_id' );
                        ?>
                        <div class="icon-item">
                            <a class="ct-woosw-btn" href="<?php echo esc_url(get_permalink($woosw_id)); ?>"></a>
                            <i class="flaticon-wishlist"></i>
                            <span class="wishlist-count">
                                <?php echo WPcleverWoosw::get_count(); ?>
                            </span>
                        </div>
                    <?php endif; ?>
                    <?php if(class_exists('Woocommerce') && $cart_icon) : ?>
                        <div class="icon-item h-btn-cart">
                            <i class="flaticon-add-to-cart"></i>
                            <span class="widget_cart_counter"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'organio' ), WC()->cart->cart_contents_count ); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if(function_exists('up_get_template_part') && $user_icon) : ?>
                        <div class="icon-item h-btn-user">
                            <i class="flaticon-user"></i>
                            <?php if(is_user_logged_in()) : ?>
                                <ul class="ct-user-account">
                                    <?php if(class_exists('WooCommerce') ) :
                                        $my_ac = get_option( 'woocommerce_myaccount_page_id' ); 
                                        ?>
                                        <li><a href="<?php echo esc_url(get_permalink($my_ac)); ?>"><?php echo esc_html__('My Account', 'organio'); ?></a></li>
                                    <?php endif; ?>
                                    <li><a href="<?php echo esc_url(wp_logout_url()); ?>"><?php echo esc_html__('Log Out', 'organio'); ?></a></li>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>
<?php

class CT_CtProductCarousel_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_product_carousel';
    protected $title = 'Case Product Carousel';
    protected $icon = 'eicon-cart-medium';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","prefix_class":"ct-post-carousel-layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/sweet.local\/wp-content\/themes\/organio\/elementor\/templates\/widgets\/ct_product_carousel\/layout-image\/layout1.jpg"},"2":{"label":"Layout 2","image":"http:\/\/sweet.local\/wp-content\/themes\/organio\/elementor\/templates\/widgets\/ct_product_carousel\/layout-image\/layout2.jpg"},"3":{"label":"Layout 3","image":"http:\/\/sweet.local\/wp-content\/themes\/organio\/elementor\/templates\/widgets\/ct_product_carousel\/layout-image\/layout3.jpg"},"4":{"label":"Layout 4","image":"http:\/\/sweet.local\/wp-content\/themes\/organio\/elementor\/templates\/widgets\/ct_product_carousel\/layout-image\/layout4.jpg"},"5":{"label":"Layout 5","image":"http:\/\/sweet.local\/wp-content\/themes\/organio\/elementor\/templates\/widgets\/ct_product_carousel\/layout-image\/layout5.jpg"},"6":{"label":"Layout 6","image":"http:\/\/sweet.local\/wp-content\/themes\/organio\/elementor\/templates\/widgets\/ct_product_carousel\/layout-image\/layout6.jpg"},"7":{"label":"Layout 7","image":"http:\/\/sweet.local\/wp-content\/themes\/organio\/elementor\/templates\/widgets\/ct_product_carousel\/layout-image\/layout7.jpg"},"8":{"label":"Layout 8","image":"http:\/\/sweet.local\/wp-content\/themes\/organio\/elementor\/templates\/widgets\/ct_product_carousel\/layout-image\/layout8.jpg"},"9":{"label":"Layout 9","image":"http:\/\/sweet.local\/wp-content\/themes\/organio\/elementor\/templates\/widgets\/ct_product_carousel\/layout-image\/layout9.jpg"},"10":{"label":"Layout 10","image":"http:\/\/sweet.local\/wp-content\/themes\/organio\/elementor\/templates\/widgets\/ct_product_carousel\/layout-image\/layout10.jpg"}}}]},{"name":"style_section_l7","label":"Style","tab":"content","condition":{"layout":["7","8"]},"controls":[{"name":"style_l7","label":"Style","type":"select","default":"style1","options":{"style1":"Style 1","style2":"Style 2"}},{"name":"button_bg_color","label":"Button Background Color","type":"color","selectors":{"{{WRAPPER}} .btn.btn-circle-plus::before":"background-color: {{VALUE}};"},"condition":{"style_l7":"style2"}},{"name":"button_bg_color_hover","label":"Button Background Color Hover","type":"color","selectors":{"{{WRAPPER}} .btn.btn-circle-plus:hover:before":"background-color: {{VALUE}};"},"condition":{"style_l7":"style2"}},{"name":"btn_readmore","label":"Button Readmore Text","type":"text","condition":{"style_l7":"style2"}}]},{"name":"source_section","label":"Source","tab":"content","controls":[{"name":"source","label":"Select Categories","type":"select2","multiple":true,"options":[]},{"name":"orderby","label":"Order By","type":"select","default":"date","options":{"date":"Date","ID":"ID","author":"Author","title":"Title","rand":"Random"}},{"name":"order","label":"Sort Order","type":"select","default":"desc","options":{"desc":"Descending","asc":"Ascending"}},{"name":"limit","label":"Total items","type":"number","default":"6"}]},{"name":"section_carousel_settings","label":"Carousel","tab":"content","controls":[{"name":"show_quantity","label":"Show Quantity","type":"select","default":"no","options":{"no":"No","yes":"Yes"},"condition":{"layout":"7"}},{"name":"style","label":"Style","type":"select","default":"style1","options":{"style1":"Style 1 ( Default )","style2":"Style 2 ( Small )","style3":"Style 3 ( Countdown )"},"condition":{"layout":"2"}},{"name":"style_l5","label":"Style","type":"select","default":"style1","options":{"style1":"Style 1","style2":"Style 2"},"condition":{"layout":"5"}},{"name":"thumbnail","type":"image-size","control_type":"group","default":"custom"},{"name":"ct_animate","label":"Case Animate","type":"select","options":{"":"None","wow bounce":"bounce","wow flash":"flash","wow pulse":"pulse","wow rubberBand":"rubberBand","wow shake":"shake","wow swing":"swing","wow tada":"tada","wow wobble":"wobble","wow bounceIn":"bounceIn","wow bounceInDown":"bounceInDown","wow bounceInLeft":"bounceInLeft","wow bounceInRight":"bounceInRight","wow bounceInUp":"bounceInUp","wow bounceOut":"bounceOut","wow bounceOutDown":"bounceOutDown","wow bounceOutLeft":"bounceOutLeft","wow bounceOutRight":"bounceOutRight","wow bounceOutUp":"bounceOutUp","wow fadeIn":"fadeIn","wow fadeInDown":"fadeInDown","wow fadeInDownBig":"fadeInDownBig","wow fadeInLeft":"fadeInLeft","wow fadeInLeftBig":"fadeInLeftBig","wow fadeInRight":"fadeInRight","wow fadeInRightBig":"fadeInRightBig","wow fadeInUp":"fadeInUp","wow fadeInUpBig":"fadeInUpBig","wow fadeOut":"fadeOut","wow fadeOutDown":"fadeOutDown","wow fadeOutDownBig":"fadeOutDownBig","wow fadeOutLeft":"fadeOutLeft","wow fadeOutLeftBig":"fadeOutLeftBig","wow fadeOutRight":"fadeOutRight","wow fadeOutRightBig":"fadeOutRightBig","wow fadeOutUp":"fadeOutUp","wow fadeOutUpBig":"fadeOutUpBig","wow flip":"flip","wow flipInX":"flipInX","wow flipInY":"flipInY","wow flipOutX":"flipOutX","wow flipOutY":"flipOutY","wow lightSpeedIn":"lightSpeedIn","wow lightSpeedOut":"lightSpeedOut","wow rotateIn":"rotateIn","wow rotateInDownLeft":"rotateInDownLeft","wow rotateInDownRight":"rotateInDownRight","wow rotateInUpLeft":"rotateInUpLeft","wow rotateInUpRight":"rotateInUpRight","wow rotateOut":"rotateOut","wow rotateOutDownLeft":"rotateOutDownLeft","wow rotateOutDownRight":"rotateOutDownRight","wow rotateOutUpLeft":"rotateOutUpLeft","wow rotateOutUpRight":"rotateOutUpRight","wow hinge":"hinge","wow rollIn":"rollIn","wow rollOut":"rollOut","wow zoomIn":"zoomIn","wow zoomInDown":"zoomInDown","wow zoomInLeft":"zoomInLeft","wow zoomInRight":"zoomInRight","wow zoomInUp":"zoomInUp","wow zoomOut":"zoomOut","wow zoomOutDown":"zoomOutDown","wow zoomOutLeft":"zoomOutLeft","wow zoomOutRight":"zoomOutRight","wow zoomOutUp":"zoomOutUp"},"default":""},{"name":"filter","label":"Filter","type":"select","default":"false","options":{"true":"Enable","false":"Disable"},"condition":{"layout":["5","6","7"]}},{"name":"filter_default_title","label":"Filter Default Title","type":"text","default":"All","condition":{"filter":"true","layout":["5","6","7"]}},{"name":"rows","label":"Rows","type":"select","default":"1","options":{"1":"1","2":"2","3":"3","4":"4"},"condition":{"layout":["3","8"]}},{"name":"col_xs","label":"Columns XS Devices","type":"select","default":"1","options":{"1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_sm","label":"Columns SM Devices","type":"select","default":"2","options":{"1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_md","label":"Columns MD Devices","type":"select","default":"3","options":{"1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_lg","label":"Columns LG Devices","type":"select","default":"3","options":{"1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_xl","label":"Columns XL Devices","type":"select","default":"3","options":{"1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"slides_to_scroll","label":"Slides to scroll","type":"select","default":"1","options":{"1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"arrows","label":"Show Arrows","type":"switcher","default":"false"},{"name":"dots","label":"Show Dots","type":"switcher","default":"false"},{"name":"pause_on_hover","label":"Pause on Hover","type":"switcher","default":"true"},{"name":"autoplay","label":"Autoplay","type":"switcher","default":"false"},{"name":"autoplay_speed","label":"Autoplay Speed","type":"number","default":5000,"condition":{"autoplay":"false"}},{"name":"infinite","label":"Infinite Loop","type":"switcher","default":"true"},{"name":"speed","label":"Animation Speed","type":"number","default":500},{"name":"drap","label":"Show Scroll Drap","type":"switcher","default":"false"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'ct-countdown','jquery-slick','ct-post-carousel-widget-js' );
}
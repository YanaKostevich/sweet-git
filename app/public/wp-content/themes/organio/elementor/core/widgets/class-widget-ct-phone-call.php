<?php

class CT_CtPhoneCall_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_phone_call';
    protected $title = 'Case Phone Call';
    protected $icon = 'eicon-headphones';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"selected_icon","label":"Icon","type":"icons","fa4compatibility":"icon"},{"name":"phone_number","label":"Phone Number","type":"text","label_block":true},{"name":"phone_link","label":"Phone Link","type":"text"},{"name":"phone_label","label":"Phone Label","type":"text"}]},{"name":"section_style","label":"Style","tab":"content","controls":[{"name":"phone_number_color","label":"Phone Number Color","type":"color","selectors":{"{{WRAPPER}} .ct-phone-call1 .item--meta a":"color: {{VALUE}};"}},{"name":"number_typography","label":"Number Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .ct-phone-call1 .item--meta a"},{"name":"phone_label_color","label":"Phone Label Color","type":"color","selectors":{"{{WRAPPER}} .ct-phone-call1 .item--meta label":"color: {{VALUE}};"}},{"name":"label_typography","label":"Label Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .ct-phone-call1 .item--meta label"},{"name":"phone_icon_color","label":"Phone Icon Color","type":"color","selectors":{"{{WRAPPER}} .ct-phone-call1 .item--icon":"color: {{VALUE}};"}},{"name":"phone_icon_box_color","label":"Phone Icon Box Color","type":"color","selectors":{"{{WRAPPER}} .ct-phone-call1 .item--icon":"background-color: {{VALUE}};"}}]},{"name":"section_animate","label":"Animate","tab":"content","controls":[{"name":"ct_animate","label":"Case Animate","type":"select","options":{"":"None","wow bounce":"bounce","wow flash":"flash","wow pulse":"pulse","wow rubberBand":"rubberBand","wow shake":"shake","wow swing":"swing","wow tada":"tada","wow wobble":"wobble","wow bounceIn":"bounceIn","wow bounceInDown":"bounceInDown","wow bounceInLeft":"bounceInLeft","wow bounceInRight":"bounceInRight","wow bounceInUp":"bounceInUp","wow bounceOut":"bounceOut","wow bounceOutDown":"bounceOutDown","wow bounceOutLeft":"bounceOutLeft","wow bounceOutRight":"bounceOutRight","wow bounceOutUp":"bounceOutUp","wow fadeIn":"fadeIn","wow fadeInDown":"fadeInDown","wow fadeInDownBig":"fadeInDownBig","wow fadeInLeft":"fadeInLeft","wow fadeInLeftBig":"fadeInLeftBig","wow fadeInRight":"fadeInRight","wow fadeInRightBig":"fadeInRightBig","wow fadeInUp":"fadeInUp","wow fadeInUpBig":"fadeInUpBig","wow fadeOut":"fadeOut","wow fadeOutDown":"fadeOutDown","wow fadeOutDownBig":"fadeOutDownBig","wow fadeOutLeft":"fadeOutLeft","wow fadeOutLeftBig":"fadeOutLeftBig","wow fadeOutRight":"fadeOutRight","wow fadeOutRightBig":"fadeOutRightBig","wow fadeOutUp":"fadeOutUp","wow fadeOutUpBig":"fadeOutUpBig","wow flip":"flip","wow flipInX":"flipInX","wow flipInY":"flipInY","wow flipOutX":"flipOutX","wow flipOutY":"flipOutY","wow lightSpeedIn":"lightSpeedIn","wow lightSpeedOut":"lightSpeedOut","wow rotateIn":"rotateIn","wow rotateInDownLeft":"rotateInDownLeft","wow rotateInDownRight":"rotateInDownRight","wow rotateInUpLeft":"rotateInUpLeft","wow rotateInUpRight":"rotateInUpRight","wow rotateOut":"rotateOut","wow rotateOutDownLeft":"rotateOutDownLeft","wow rotateOutDownRight":"rotateOutDownRight","wow rotateOutUpLeft":"rotateOutUpLeft","wow rotateOutUpRight":"rotateOutUpRight","wow hinge":"hinge","wow rollIn":"rollIn","wow rollOut":"rollOut","wow zoomIn":"zoomIn","wow zoomInDown":"zoomInDown","wow zoomInLeft":"zoomInLeft","wow zoomInRight":"zoomInRight","wow zoomInUp":"zoomInUp","wow zoomOut":"zoomOut","wow zoomOutDown":"zoomOutDown","wow zoomOutLeft":"zoomOutLeft","wow zoomOutRight":"zoomOutRight","wow zoomOutUp":"zoomOutUp"},"default":""},{"name":"ct_animate_delay","label":"Animate Delay","type":"text","default":"0","description":"Enter number. Default 0ms"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}
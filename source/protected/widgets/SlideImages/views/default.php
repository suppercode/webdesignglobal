<div id="full-width-slider" class="royalSlider heroSlider rsMinW">
  <div class="rsContent s1">
    <img class="rsImg" src="<?php echo $this->_url;?>/images/slider1-map.png" alt="">
    <div class="infoBlock infoBlockcenter rsABlock" data-fade-effect="" data-move-offset="10" data-move-effect="bottom" data-speed="200">
      <img class="rsImg" src="<?php echo $this->_url;?>/images/yii_slide_s1.png" alt="">
    </div>
  </div>
  <div class="rsContent s1">
    <img class="rsImg" src="<?php echo $this->_url;?>/images/slider1-map.png" alt="">
     <div class="infoBlock infoBlockcenter rsABlock" style="color:#000;" data-fade-effect="" data-move-offset="10" data-move-effect="bottom" data-speed="200">
      <img class="rsImg" src="<?php echo $this->_url;?>/images/magento_new.png" alt="">
    </div>
  </div>
 <div class="rsContent s1">
    <img class="rsImg" src="<?php echo $this->_url;?>/images/slider1-map.png" alt="">
    <div class="infoBlock rsABlock infoBlockcenter" data-fade-effect="" data-move-offset="10" data-move-effect="bottom" data-speed="200">
		<img class="rsImg" src="<?php echo $this->_url;?>/images/joomla.png" alt="">
    </div>
  </div>
  <div class="rsContent s1">
    <img class="rsImg" src="<?php echo $this->_url;?>/images/slider1-map.png" alt="">
    <div class="infoBlock rsABlock infoBlockcenter" data-fade-effect="" data-move-offset="10" data-move-effect="bottom" data-speed="200">
		<img class="rsImg" src="<?php echo $this->_url;?>/images/wordpress.png" alt="">
    </div>
  </div>
</div>
<script>
jQuery(document).ready(function($) {
  $('#full-width-slider').royalSlider({
    arrowsNav: true,
    loop: true,
    keyboardNavEnabled: true,
    controlsInside: false,
    imageScaleMode: 'fill',
    arrowsNavAutoHide: false,
    autoScaleSlider: true, 
    autoScaleSliderWidth: 960,     
    autoScaleSliderHeight: 450,
    controlNavigation: 'bullets',
    thumbsFitInViewport: false,
    navigateByClick: true,
    startSlideId: 0,
    autoPlay:{enabled:true},
    transitionSpeed: 900,
    transitionType:'fade',//'move'
    globalCaption: false,
    deeplinking: {
      enabled: true,
      change: false
    },
    /* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
    imgWidth: 1400,
    imgHeight: 680
  });
});
</script>
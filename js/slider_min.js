jQuery(document).ready(function(){
var prevSlide = null;
var slider = jQuery('#lightSlider').lightSlider({
    item: 1,
    slideMargin: 0,
    onAfterSlide: function (el) {
        prevSlide = slider.getCurrentSlideCount();
    },
    onBeforeSlide: function (el) {
        if (prevSlide) {
            console.log(prevSlide)
            var youtubePlayer = jQuery('#lightSlider li').eq(prevSlide - 1).find('.ls-youtube').get(0),
                vimeoPlayer = jQuery('#lightSlider li').eq(prevSlide - 1).find('.ls-vimeo').get(0);
            console.log(vimeoPlayer)
            if (youtubePlayer) {
                youtubePlayer.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
            } else if (vimeoPlayer) {
                jQueryf(vimeoPlayer).api("pause");
            }
        }

    }
});
});

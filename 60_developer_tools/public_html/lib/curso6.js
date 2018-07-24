//masonry ////////////////////////////////
$('.grid-masonry').masonry({
    // options
    itemSelector: '.grid-item-masonry',
//    columnWidth: 320
});


//detect mobile browser 
console.log(jQuery.browser.mobile);

//if($.browser.mobile){
//    console.log("redireccionando...");
//}


//lazyload ////////////////////////////
//$("img.lazyload").lazyload({
//    effect: "fadeIn"
//});


//sticky ////////////////////////////
$(document).ready(function () {
    $("#sticky1").sticky({topSpacing: 0});
});


//bigvideo //////////////////
$(document).ready(function() {
    var BV = new $.BigVideo();
    BV.init();
    BV.show('http://vjs.zencdn.net/v/oceans.mp4',{ambient:true});
});


// videobg /////
//$('#div_demo').videoBG({
//	mp4:'tunnel_animation.mp4',
//	ogv:'tunnel_animation.ogv',
//	webm:'tunnel_animation.webm',
//	poster:'tunnel_animation.jpg',
//	scale:true,
//	zIndex:0
//});


//tubular //////////////
$('#div_demo2').tubular({videoId: 'jnLSYfObARA'});
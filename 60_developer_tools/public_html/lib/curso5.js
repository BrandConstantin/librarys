jQuery(function ($) {
    $('.slider').sss();
});

(function () {
    Galleria.loadTheme('plugins/galleria/themes/classic/galleria.classic.min.js');
    Galleria.run('.galleria');
}());

var swiper = new Swiper('.slideshow1');
//var swiper = new Swiper('.slideshow2');

var swiper = new Swiper('.slideshow2', {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

//sweetalert ////////////////////
swal({
  title: "Good job!",
  text: "You clicked the button!",
  icon: "success",
//  timer: 2000
});


//modal de bootstrap /////////////////////
$("#myModal").modal();
setTimeout(function(){
    $("#myModal").modal('hide');
}, 3000);

// the date picker //////////////////
$('.fecha').pickadate({
    format: 'yyyy/mm/dd'
});

$("#botObtener").on("click", function(){
   var valor = $("#txtFecha").val();
   console.log(valor);
});


//chosen ///////////////
$(".chosen-select").chosen({
    no_results_text: "Oops, no he encontrado nada"
});


//complexify ///////////////
$("#pass").complexify({}, function(valid, complexity){
    console.log(valid, complexity);
//    alert("Password complexity: " + complexity);

    var $progressBar = $("#progressBar");
    
    $progressBar.css('width', complexity + '%');
    
    if(complexity >= 40){
        $progressBar
                .addClass('progress-bar-success')
                .removeClass('progress-bar-danger');
    }else{
        $progressBar
                .addClass('progress-bar-danger')
                .removeClass('progress-bar-success');
    }
});
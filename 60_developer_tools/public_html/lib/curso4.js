var $caja = $("#cajaRoja");

TweenMax.to($caja, 3, {
    x: "+=200"
});

var $caja2 = $("#cajaRoja2");

TweenMax.to($caja2, 4, {
    x: "+=200",
    ease: Elastic.easeOut.config(1, 0.3)
});

var $caja3 = $("#cajaRoja3");

TweenMax.to($caja3, 4, {
    y: "-=200",
    ease: Bounce.easeOut
});

var $caja4 = ("#cajaRoja4");
var tl = new TimelineMax();

tl.to($caja4, 2, {opacity: 1})
        .to($caja4, 2, {width: "+=50", height: "+=50"})
        .to($caja4, 2, {height: "-=100", opacity: 0.5}, "-0.5") //el -0.5 es el retardo
        .to($caja4, 2, {backgroundColor: "blue"});

setTimeout(function () {
    tl.pause();
}, 2000);
setTimeout(function () {
    tl.play();
}, 4000);
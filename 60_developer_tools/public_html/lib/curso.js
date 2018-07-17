var example4 = $("#txtArc");

example4.arctext({radius: 300})

setTimeout(function () {
    example4.arctext('set', {
        radius: 300,
        dir: -1,
        animation: {
            speed: 300,
            easing: 'ease-out'
        }
    });
}, 5);


//shuffle letter
var txtMezclar = $("#txtMezclar");
var txtTexto = $("#txtTexto");
var mensaje = ['Hola Fernando...', 'Bienvenido a mi página', 'Espero que te guste'];
var actual = 0;

txtMezclar.text(mensaje[0]);

//ejecutar los textos escritos por input
//txtMezclar.shuffleLetters();

txtTexto.on("keypress", function (e) {
    //console.log(e.keyCode)
    if (e.keyCode === 13) {
        txtMezclar.shuffleLetters({
            "text": txtTexto.val()
        });
    }
});

//ejecutar el array
setInterval(function () {
    //console.log('Pasaron 4 segundos...');
    actual++;

    if (actual >= mensaje.length) {
        actual = 0;
    }

    txtMezclar.shuffleLetters({
        "text": mensaje[actual]
    });
}, 4000);
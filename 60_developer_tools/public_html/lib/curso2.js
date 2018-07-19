//Metro Notification /////////////////////////
$(document).ready(function () {
    $.smallBox({
        title: "Hola Mundo",
        content: "Bienvenido a nuestra web",
        fa: "fa-star-o",
        color: "#429988",
        sound: true,
        timeout: 3000,
        delay: 1,
    });

//    $.smallBox({
//        title: "Hola Mundo",
//        content: "Bienvenido a nuestra web",
//        fa: "fa-star-o",
//        color: "#429988",
//        timeout: 3000,
//        delay: 1,
//    }, function (action, button) {
//        //Do something here
//
//        alert(action + ' ' + button);
//    });


    //crystal notification
    $.CrystalNotification({
        position: 1, // try 2, 3 and 4
        title: "Hello!",
        image: "plugins/CrystalNotificationV2/img/Colorfull/Messages-colorfull.png",
        content: "Ready to go!",
    });


    //yosal modal
    $.yosemodal({
        title: "Yose Modal",
        content: "Otro plugin de notificaciones",
        indelay: 0.9,
        width: "500px",
        height: "200px",
        theme: "black",
    });
});
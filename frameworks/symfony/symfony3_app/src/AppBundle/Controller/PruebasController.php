<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PruebasController extends Controller {

    public function indexAction(Request $request, $name, $page) {
        //redireccionar a la página de index
//        return $this->redirect($this->generateUrl("homepage"));
        //redireccionar a una página en concreto
//        return $this->redirect($this->container->get("router")->getContext()->getBaseUrl()."/hello-world?hola=true");
//        return $this->redirect($request->getBaseUrl()."/hello-world?hola=true");
        
        //recojer variable get y post
//        var_dump($request->query->get("hola"));
//        var_dump($request->get("hola-POST"));
//        die();
        //crear un array
        $productos = array(
            array("producto" => "consola 1", "precio" => 6),
            array("producto" => "consola 2", "precio" => 8),
            array("producto" => "consola 3", "precio" => 1),
            array("producto" => "consola 4", "precio" => 5),
            array("producto" => "consola 5", "precio" => 9),
        );

        $frutas = array("manzana" => "golden", "pera" => "rica");

        //crear una vista
        // replace this example code with whatever you need
        return $this->render('AppBundle:pruebas:index.html.twig', array(
                    'texto' => $name . " - " . $page,
                    'productos' => $productos,
                    'frutas' => $frutas
        ));
    }

}

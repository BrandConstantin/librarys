<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Curso;
use AppBundle\Form\CursoType;

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

    public function createAction() {
        $curso = new Curso();
        $curso->setTitulo("Curso Symfony3");
        $curso->setDescripcion("Curso completo de Symfony3");
        $curso->setPrecio(12);

        //llamamos al entity manager
        $em = $this->getDoctrine()->getEntityManager();
        //persistimos los datos
        $em->persist($curso);
        //volcamos los datos en la bd
        $flush = $em->flush();

        if ($flush != null) {
            echo "El curso no se ha creado bien";
        } else {
            echo "Curso creado correctamente";
        }

        die();
    }

    public function readAction() {
        //llamamos al entity manager
        $em = $this->getDoctrine()->getEntityManager();

        //sacamos los cursos
        $cursos_repo = $em->getRepository("AppBundle:Curso");
        $cursos = $cursos_repo->findAll();

        //mostrar los cursos
        foreach ($cursos as $curso) {
            echo $curso->getTitulo() . "<br/>";
            echo $curso->getDescripcion() . "<br/>";
            echo $curso->getPrecio() . "<br/><hr/>";
        }

        $curso14 = $cursos_repo->findBy(array("precio" => 14));
        echo "Curso de 14 euros " . $curso14[0]->getTitulo();
        echo "<br/><hr/>";

        $curso14 = $cursos_repo->findOneByPrecio(12);
        echo "Curso de 12 euros " . $curso14->getTitulo();
        echo "<br/><hr/>";

        die();
    }

    public function updateAction($id, $titulo, $descripcion, $precio) {
        //llamamos al entity manager
        $em = $this->getDoctrine()->getEntityManager();
        //sacamos los cursos
        $cursos_repo = $em->getRepository("AppBundle:Curso");

        //buscar un registro por id
        $curso = $cursos_repo->find($id);
        $curso->setTitulo($titulo);
        $curso->setDescripcion($descripcion);
        $curso->setPrecio($precio);

        //persistimos los datos
        $em->persist($curso);
        //volcamos los datos en la bd
        $flush = $em->flush();

        if ($flush != null) {
            echo "El curso no se ha actualizado bien";
        } else {
            echo "Curso actualizado correctamente";
        }

        die();
    }

    public function deleteAction($id) {
        //llamamos al entity manager
        $em = $this->getDoctrine()->getEntityManager();
        //sacamos los cursos
        $cursos_repo = $em->getRepository("AppBundle:Curso");
        //buscar un registro por id
        $curso = $cursos_repo->find($id);

        $em->remove($curso);
        //volcamos los datos en la bd
        $flush = $em->flush();

        if ($flush != null) {
            echo "El curso no se ha borrado bien";
        } else {
            echo "Curso borrado correctamente";
        }

        die();
    }

    public function nativeSqlAction() {
        //llamamos al entity manager
        $em = $this->getDoctrine()->getEntityManager();
        //conexión a la bd
        $db = $em->getConnection();

        $query = "SELECT * FROM cursos";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);

        $cursos = $stmt->fetchAll();

        //mostrar los cursos
        foreach ($cursos as $curso) {
            echo $curso["titulo"] . "<br/><hr/>";
        }

        die();
    }

    public function docquerylangAction() {
        //llamamos al entity manager
        $em = $this->getDoctrine()->getEntityManager();

        $query = $em->createQuery(""
                        . "SELECT c FROM AppBundle:Curso c "
                        . "WHERE c.precio > :precio "
                        . "")->setParameter("precio", "12");

        $cursos = $query->getResult();

        //mostrar los cursos
        foreach ($cursos as $curso) {
            echo $curso->getTitulo() . "<br/><hr/>";
        }

        die();
    }

    public function createQueryBuilderAction() {
        //llamamos al entity manager
        $em = $this->getDoctrine()->getEntityManager();

        //sacamos los cursos
        $cursos_repo = $em->getRepository("AppBundle:Curso");

        $query = $cursos_repo->createQueryBuilder("c")
                ->where("c.precio > :precio")
//                ->orderBy("precio asc")
                ->setParameter("precio", "12")
                ->getQuery();

        $cursos = $query->getResult();

        //mostrar los cursos
        foreach ($cursos as $curso) {
            echo $curso->getTitulo() . "<br/>";
            echo $curso->getDescripcion() . "<br/>";
            echo $curso->getPrecio() . "<br/><hr/>";
        }

        die();
    }

    public function createQueryBuilder2Action() {
        //llamamos al entity manager
        $em = $this->getDoctrine()->getEntityManager();
        //sacamos los cursos
        $cursos_repo = $em->getRepository("AppBundle:Curso");

        $cursos = $cursos_repo->getCursos();

        //mostrar los cursos
        foreach ($cursos as $curso) {
            echo $curso->getTitulo() . "<br/>";
            echo $curso->getDescripcion() . "<br/>";
            echo $curso->getPrecio() . "<br/><hr/>";
        }

        die();
    }

    public function formAction() {
        $curso = new Curso();
        $form = $this->createForm(CursoType::class, $curso);
        
        return $this->render('AppBundle:pruebas:form.html.twig', array(
            'form' => $form->createView()
        ));
    }

}

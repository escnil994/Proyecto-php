<?php

require_once 'models/producto.php';

class CarritoController {

    public function index() {

        if (!empty($_SESSION['carrito'])) {

            $carrito = $_SESSION['carrito'];
        }
        require_once('views/carrito/index.php');
    }

    public function add($exit = true) {


            $talla = '';
            if (isset($_POST['talla']) && !empty($_POST['talla'])) {
                $talla = $_POST['talla'];
            } else {
                echo 'Debe ingresar una talla';
            }
            if (isset($_POST['cantidad']) && !empty($_POST['cantidad'])) {
                $cantidad = $_POST['cantidad'];
            } else if (isset($_POST['inlineRadioOptions']) && !empty($_POST['inlineRadioOptions'])) {
                $cantidad = $_POST['inlineRadioOptions'];
            }


            if ($_GET['product']) {
                $producto_id = $_GET['product'];
            } else {
                header('Location: ' . base_url);
            }

            if (isset($producto_id) && !empty($producto_id) && isset($cantidad) && !empty($cantidad) && isset($talla) && !empty($talla)) {

                if (isset($_SESSION['carrito'])) {
                    $contador = 0;
                    foreach ($_SESSION['carrito'] as $indice => $elemento) {
                        if ($elemento['id_producto'] == $producto_id && $elemento['talla'] == $talla) {
                            $_SESSION['carrito'][$indice]['unidades'] += $cantidad;
                            $contador++;
                        }
                    }
                }
                if (!isset($contador) || $contador == 0) {
                    $producto = new Producto();
                    $producto->setId($producto_id);
                    $producto = ($producto->getById($producto_id))->fetch_object();

                    if (is_object($producto)) {
                        $_SESSION['carrito'][] = array(
                            "product_name" => $producto->nombre,
                            "id_producto" => $producto->id,
                            "precio" => (double) number_format($producto->precio - ((($producto->precio) / 100) * $producto->oferta), 2),
                            "unidades" => (int) $cantidad,
                            "talla" => $talla,
                            "imagen" => $producto->imagen,
                            "producto" => $producto
                        );
                    }
                }


                print '<html>';
                print '<head><title>Redirecting you...</title>';
                print '<meta http-equiv="Refresh" content="0;url='.base_url.'carrito/index" />';
                print '</head>';
                print '<body onload="location.replace(\''.base_url.'carrito/index\')">';
                print "You're getting...<br />";
                print 'If you are not, please click on the link above.<br />';
                print "<a  href=".base_url.">Click aqui</a>";
                print '</body>';
                print '</html>';
                if ($exit) exit;
            }


    }

    public function removeAll($exit=true) {

        $cant = (int) $_GET['cantidad'];

        if ($cant >= 1) {
            $contador = 0;
            $producto_id = $_GET['product'];
            $talla = $_GET['talla'];
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id && $elemento['talla'] == $talla) {
                    $_SESSION['carrito'][$indice]['unidades'] -= $cant;
                    $contador++;
                }
            }
        } else {
        }


                print '<html>';
                print '<head><title>Redirecting you...</title>';
                print '<meta http-equiv="Refresh" content="0;url='.base_url.'carrito/index" />';
                print '</head>';
                print '<body onload="location.replace(\''.base_url.'carrito/index\')">';
                print "You're getting...<br />";
                print 'If you are not, please click on the link above.<br />';
                print "<a  href=".base_url.">Click aqui</a>";
                print '</body>';
                print '</html>';
                if ($exit) exit;
    }

    public function removeOne($exit=true) {

        $cant = (int) $_GET['cantidad'];

        if ($cant >= 1) {
            $contador = 0;
            $producto_id = $_GET['product'];
            $talla = $_GET['talla'];
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id && $elemento['talla'] == $talla) {
                    $_SESSION['carrito'][$indice]['unidades']--;
                    $contador++;
                }
            }
        } else {
        }


        print '<html>';
        print '<head><title>Redirecting you...</title>';
        print '<meta http-equiv="Refresh" content="0;url='.base_url.'carrito/index" />';
        print '</head>';
        print '<body onload="location.replace(\''.base_url.'carrito/index\')">';
        print "You're getting...<br />";
        print 'If you are not, please click on the link above.<br />';
        print "<a  href=".base_url.">Click aqui</a>";
        print '</body>';
        print '</html>';
        if ($exit) exit;
    }

    public function delete($exit = true) {
        unset(
                $_SESSION['carrito']
        );

        print '<html>';
        print '<head><title>Redirecting you...</title>';
        print '<meta http-equiv="Refresh" content="0;url='.base_url.'carrito/index" />';
        print '</head>';
        print '<body onload="location.replace(\''.base_url.'carrito/index\')">';
        print "You're getting...<br />";
        print 'If you are not, please click on the link above.<br />';
        print "<a  href=".base_url.">Click aqui</a>";
        print '</body>';
        print '</html>';
        if ($exit) exit;
    }

}

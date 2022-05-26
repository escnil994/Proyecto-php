<?php

require_once 'models/pedido.php';

class PedidoController
{

    public function index()
    {
        $deptos = new Pedido();

        $depto = $deptos->getDeptos();

        require_once 'views/pedido/index.php';
    }

    public function add()
    {

        $deptos = new Pedido();

        $depto = $deptos->getDeptos();

        require_once 'views/pedido/index.php';
    }

    public function getMunicipio($exit = true)
    {
        $param = $_POST['depto'];

        if ($param == 000) {

            print '<html>';
            print '<head><title>Redirecting you...</title>';
            print '<meta http-equiv="Refresh" content="0;url=' . base_url . 'pedido/index" />';
            print '</head>';
            print '<body onload="location.replace(\'' . base_url . 'pedido/index\')">';
            print "You're getting...<br />";
            print 'If you are not, please click on the link above.<br />';
            print "<a  href=" . base_url . ">Click aqui</a>";
            print '</body>';
            print '</html>';
            if ($exit)
                exit;
        } else {


            $pedido = new Pedido();
            $mun = $pedido->getMunicipioByDepto($param);
            $dep = $pedido->getOneDepto($param)->fetch_object();

            $_SESSION['depto'] = array(
                'depto_id' => $dep->ID,
                'depto_name' => $dep->DepName
            );

            require_once 'views/pedido/index2.php';
        }
    }

    public function save($exit = true)
    {
        $stats = Utils::statsCarrito();

        $pedido = new Pedido();

        $municipio = isset(($pedido->getOneMuni($_POST['municipio'])->fetch_object())->MunName) ? ($pedido->getOneMuni($_POST['municipio'])->fetch_object())->MunName : false;

        $departamento = isset($_SESSION['depto']['depto_name']) ? $_SESSION['depto']['depto_name'] : false;
        $usuario = isset($_SESSION['logged_in']->id) ? $_SESSION['logged_in']->id : false;
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
        $total = isset($stats['total']) ? $stats['total'] : false;
        $estado = 'ingresado';
        $payment = isset($_POST['payment']) ? $_POST['payment'] : false;


        if (!empty($total) && !empty($municipio) && !empty($departamento) && !empty($usuario) && !empty($direccion) && !empty($estado)) {
            $pedido->setDepartamento($departamento);
            $pedido->setDireccion($direccion);
            $pedido->setEstado($estado);
            $pedido->setMunicipio($municipio);
            $pedido->setPayment($payment);
            $pedido->setTotal($total);
            $pedido->setUsuario($usuario);

            $save = $pedido->save();

            //Guardar linea pedido

            $save_linea = $pedido->save_linea();

            if ($save && $save_linea) {

                $_SESSION['pedido'] = 'complete';
                unset($_SESSION['carrito']);
                $this->confirmado();

            } else {
                $_SESSION['pedido'] = 'failed';

            }
        } else {

            $_SESSION['pedido'] = 'failed';

            print '<html>';
            print '<head><title>Redirecting you...</title>';
            print '<meta http-equiv="Refresh" content="0;url=' . base_url . 'pedido/index" />';
            print '</head>';
            print '<body onload="location.replace(\'' . base_url . 'pedido/index\')">';
            print "You're getting...<br />";
            print 'If you are not, please click on the link above.<br />';
            print "<a  href=" . base_url . 'pedido/index' . ">Click aqui</a>";
            print '</body>';
            print '</html>';
            if ($exit) exit;
        }

    }

    public function confirmado(){

        if (isset($_SESSION['logged_in'])){
            $user = $_SESSION['logged_in'];
            $pedido = new Pedido();
            $pedido->setUsuario($user->id);

            $_pedido = $pedido->getOneByUser();

            $productByPedido = $pedido->getProductsByPedido($_pedido->id);
        }


        require_once 'views/pedido/confirmado.php';
    }
}

<?php

class Pedido{

    private $id;
    private $municipio;
    private $departamento;
    private $usuario;
    private $direccion;
    private $total;
    private $estado;
    private $payment;


    private $db;
    private $db2;

    /**
     * @return mixed
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * @param mixed $municipio
     */
    public function setMunicipio($municipio): void
    {
        $this->municipio = $municipio;
    }

    /**
     * @return mixed
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * @param mixed $departamento
     */
    public function setDepartamento($departamento): void
    {
        $this->departamento = $departamento;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario): void
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion): void
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total): void
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param mixed $payment
     */
    public function setPayment($payment): void
    {
        $this->payment = $payment;
    }







    public function __construct(){
        $this->db = Database2::connect();
        $this->db2 = Database::connect();
    }



    public function getDeptos(){
        $deptos = $this->db->query("SELECT * FROM depsv");

        return $deptos;
    }

    public function getOneDepto($id){
        $depto = $this->db->query("SELECT * FROM depsv WHERE ID = $id");

        return $depto;
    }

    public function getOneMuni($id){
        $mun = $this->db->query("SELECT * FROM munsv WHERE ID = $id");

        return $mun;
    }


    public function getMunicipioByDepto($id){
        $municipios = $this->db->query("SELECT * FROM munsv WHERE DEPSV_ID = $id");

        return $municipios;
    }

    public function save(){

        $sql = "INSERT INTO pedidos VALUES (NULL ,'{$this->getUsuario()}', '{$this->getDepartamento()}', '{$this->getMunicipio()}', '{$this->getDireccion()}',
                                                {$this->getTotal()},'{$this->getEstado()}', current_date(), current_time(), {$this->getPayment()})";

        $save = $this->db2->query($sql);



        $result = false;

        if ($save){
            $result = true;
        }

        return $result;


    }

    public function save_linea(){
        $sql = "SELECT LAST_INSERT_ID() as 'pedido'";
        $query = $this->db2->query($sql);
        $pedido_id = $query->fetch_object()->pedido;

        foreach ($_SESSION['carrito'] as $elemento){


            $producto = $elemento['producto'];
            $insert =  "INSERT INTO lineas_pedidos VALUES(NULL, {$pedido_id}, {$producto->id}, {$elemento['unidades']})";

            $save = $this->db2->query($insert);

        }

        $result = false;

        if ($save){
            $result = true;
        }

        return $result;



    }
    public function getOneByUser(){
        $sql = "SELECT p.id, p.coste FROM pedidos p "
                    ."WHERE usuario_id = {$this->getUsuario()} ORDER BY id DESC LIMIT 1";

        $pedido = $this->db2->query($sql);

        return $pedido->fetch_object();
    }

    public function getProductsByPedido($pedido_id){
        //$sql = "SELECT * FROM productos WHERE id IN (SELECT producto_id FROM lineas_pedidos WHERE pedido_id = {$pedido_id})";

        $sql = "SELECT pr.*, lp.unidades FROM productos pr INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id WHERE lp.pedido_id = $pedido_id";

        $products = $this->db2->query($sql);

        return $products;

    }
}

























<?php

class Producto{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;

    private $db;

    public function __construct(){
        $this->db = Database::connect();
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
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCategoriaId()
    {
        return $this->categoria_id;
    }

    /**
     * @param mixed $categoria_id
     */
    public function setCategoriaId($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    /**
     * @return mixed
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * @param mixed $oferta
     */
    public function setOferta($oferta)
    {
        $this->oferta = $oferta;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }


    public function getAll(){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");

        return $productos;
    }


    public  function getById($id){
        $sql = "SELECT * FROM productos WHERE id = $id";

        $product = $this->db->query($sql);
        

        return $product;
    }


    public function  save (){
        $sql = "INSERT INTO productos VALUES (NULL, '{$this->getCategoriaId()}' ,'{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getPrecio()}', '{$this->getStock()}',
                                                '{$this->getOferta()}', current_date(), '{$this->getImagen()}')";
        $save = $this->db->query($sql);


        $result = false;

        if ($save){
            $result = true;
        }


        return $result;
    }
    public function edit($id){
        //UPDATE `productos` SET `nombre` = 'Camisa Playera 2', `descripcion` = 'Camisa playera color rojo, frescas y excelente', `precio` = '36.00', `stock` = '5' WHERE `productos`.`id` = 16;
        $sql = "UPDATE productos SET categoria_id = '{$this->getCategoriaId()}', nombre = '{$this->getNombre()}', descripcion = '{$this->getDescripcion()}', precio = '{$this->getPrecio()}',
                     stock = '{$this->getStock()}', oferta = '{$this->getOferta()}', imagen = '{$this->getImagen()}' WHERE id = $id ";

        $edit = $this->db->query($sql);


        $result = false;

        if ($edit){
            $result = true;
        }


        return $result;


    }

    public function delete($id){
        Utils::isAdmin();

        $sql = "DELETE FROM productos WHERE id = $id ";

        $deleted = $this->db->query($sql);


        $result = false;

        if ($deleted){
            $result = true;
        }


        return $result;

    }

    public function getProductByCategory($producto){

        $patron = '/^[a-zA-Z, ]*$/';

        if(preg_match($patron,$producto)){
            return null;
        }else{
            $sql = "SELECT * FROM productos WHERE categoria_id = $producto";



            return $this->db->query($sql);
        }





    }

}
<?php

class Categoria{
    private $id;
    private $name;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $this->db->real_escape_string($name);
    }

    public function getAll(){
        $categories = $this->db->query("SELECT * FROM categorias;");

        return $categories;
    }

    public function getCategoryById($id){
        return $this->db->query("SELECT * FROM categorias WHERE id = $id ");
    }

    public function  save (){
        $sql = "INSERT INTO categorias VALUES (NULL, '{$this->getName()}')";
        $save = $this->db->query($sql);


        $result = false;

        if ($save){
            $result = true;
        }


        return $result;
    }



}

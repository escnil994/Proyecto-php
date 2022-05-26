<?php


class Usuario{
    private $id;
    private $name;
    private $last_name;
    private $email;
    private $password;
    private $role;
    private $image;
    private $db;

    public function __construct()
    {
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

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $this->db->real_escape_string($last_name);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost'=>4]);
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }




    //METHODS TO USE

    public function save(){
        $sql = "INSERT INTO usuarios VALUES (NULL, '{$this->getName()}', '{$this->getLastName()}','{$this->getEmail()}', '{$this->getPassword()}', 'user', NULL )";
        $save = $this->db->query($sql);

        var_dump($save);


        $result = false;

        if ($save){
            $result = true;
        }
        return $result;
    }

    public function login(){
        //utils
        $result = false;

        $email = $this->email;

        $password = $this->password;

        //Comprobar si existe el usuario
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1){
            $user = $login->fetch_object();

            //Verificar la contraseña
            $password_verify = password_verify($password, $user->password);

            if ($password_verify){
                $result = $user;
            }
        }

        return $result;
    }



}

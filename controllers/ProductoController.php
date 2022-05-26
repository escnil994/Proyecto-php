<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class ProductoController
{

    public function index()
    {
        $product = new Producto();
        $products = $product->getAll();


        require_once 'views/productos/destacados.php';
    }


    public function gestion()
    {


        Utils::isAdmin();

        $producto = new producto();

        $productos = $producto->getAll();

        require_once 'views/productos/gestion.php';
    }

    public function crear()
    {
        Utils::isAdmin();

        $categoria = new Categoria();

        $categorias = $categoria->getAll();

        require_once 'views/productos/crear.php';
    }

    public function save()
    {
        Utils::isAdmin();
        $product_name = $_POST['product_name'];
        $product_description = $_POST['product_description'];
        $product_category = $_POST['product_category'];
        $product_stock = $_POST['product_stock'];
        $product_price = $_POST['product_price'];
        $product_offert = $_POST['product_offert'];
        $product_image = $_FILES['product_image'];


        if (isset($product_name) && !empty($product_name) && isset($product_description) && !empty($product_description) && isset($product_category) && !empty($product_category)
            && isset($product_stock) && !empty($product_stock) && isset($product_price) && !empty($product_price) && isset($product_offert) && !empty($product_price) && isset($product_image['name'])) {
            $product = new Producto();
            $product->setNombre($product_name);
            $product->setDescripcion($product_description);
            $product->setCategoriaId($product_category);
            $product->setStock($product_stock);
            $product->setPrecio($product_price);
            $product->setOferta($product_offert);


            $image_name = $product_image['name'];


            $ext = explode('.',$image_name)[1];

            $image_name =  uniqid('product_image_').'.'.$ext;

            if (!empty($image_name)) {

                $temp = $product_image['tmp_name'];
                $folder = 'C:/wamp64/www/proyecto-php-poo/files/products/';
                $picture_route = $folder . $image_name;



                copy($temp, $picture_route);

            } else {
                $image_name = "No image";
            }


            $product->setImagen($image_name);

            $save = $product->save();

            if ($save) {
                header("Location: " . base_url . "producto/gestion");
            } else {
                header("Location: " . base_url . "producto/gestion");
            }

        }
        header("Location: " . base_url . "producto/gestion");


    }

    public function edit()
    {
        Utils::isAdmin();


        $productoId = $_GET['product'];
        if (isset($productoId) && !empty($productoId)) {

            //Todas las categorias
            $categoria = new Categoria();

            $categorias = $categoria->getAll();

            //Producto por id
            $producto = new producto();

            $products = $producto->getById($productoId);

            $product = $products->fetch_object();

            $id_category = $product->categoria_id;

            //Categoria por id
            $category_product = ($categoria->getCategoryById($id_category))->fetch_object();


            require_once 'views/productos/editar.php';
        } else {
            header("Location: " . base_url . "producto/gestion");
        }
    }

    public function edited()
    {
        Utils::isAdmin();

        $id = $_GET['product'];


        if (isset($_POST)) {


            $product_name = $_POST['product_name'];
            $product_description = $_POST['product_description'];
            $product_category = $_POST['product_category'];
            $product_stock = $_POST['product_stock'];
            $product_price = $_POST['product_price'];
            $product_offert = $_POST['product_offert'];


            if (isset($product_name) && !empty($product_name) && isset($product_description) && !empty($product_description) && isset($product_category) && !empty($product_category)
                && isset($product_stock) && !empty($product_stock) && isset($product_price) && !empty($product_price) && isset($product_offert) && !empty($product_price)) {
                $product = new Producto();
                $product->setNombre($product_name);
                $product->setDescripcion($product_description);
                $product->setCategoriaId($product_category);
                $product->setStock($product_stock);
                $product->setPrecio($product_price);
                $product->setOferta($product_offert);

                if (empty($_FILES['product_image']['name'])) {
                    $image_name = $_GET['photo'];
                } else {
                    $product_image = $_FILES['product_image'];
                    $image_name = $product_image['name'];

                    $ext = explode('.',$image_name)[1];

                    $image_name =  uniqid('product_image_').'.'.$ext;
                    if (!empty($image_name)) {

                        $temp = $product_image['tmp_name'];
                        $folder = 'C:/wamp64/www/proyecto-php-poo/files/products/';
                        $picture_route = $folder . $image_name;


                       unlink($folder . $_GET['photo']);
                       copy($temp, $picture_route);

                    }


                }

                $product->setImagen($image_name);


                $edit = $product->edit($id);

                if ($edit) {
                    header("Location: " . base_url . "producto/gestion");
                } else {
                    header("Location: " . base_url . "producto/gestion");
                }

            }
            header("Location: " . base_url . "producto/gestion");




        }


    }

    public function question(){

        Utils::isAdmin();

        $products = new Producto();

        $product = ($products->getById($_GET['product']))->fetch_object();

        require_once 'views/productos/eliminar.php';
    }

    public function delete(){
        Utils::isAdmin();


        $image = $_GET['img'];
        $id= $_GET['product'];
        $folder = 'C:/wamp64/www/proyecto-php-poo/files/products/';


        unlink($folder.$image);

        $product = new Producto();

        $result = $product->delete($id);

        if ($result){
            header("Location: " . base_url . "producto/gestion");
        }
        else {
            header("Location: " . base_url . "producto/gestion");
        }

    }

    public function detail(){


        $products = new Producto();

        $product = ($products->getById($_GET['product']))->fetch_object();



        require_once 'views/productos/detail.php';
    }
}

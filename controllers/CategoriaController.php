<?php

    require_once 'models/categoria.php';

    require_once 'models/producto.php';
    class CategoriaController{

        public function index(){
            Utils::isAdmin();
            $category = new Categoria();
            $categories = $category->getAll();
            require_once 'views/categorias/index.php';

        }


        public function crear(){
            Utils::isAdmin();

            require_once 'views/categorias/crear.php';
        }

        public function save(){
            Utils::isAdmin();
            $category_name = $_POST['category_name'];

            if (isset($category_name) && !empty($category_name)){
                $category = new Categoria();
                $category->setName($category_name);
                $save = $category->save();

                if ($save){
                header("Location: ".base_url."categoria/index");
                }
                else{
                    header("Location: ".base_url."categoria/index");
                }

            }
            header("Location: ".base_url."categoria/index");



        }


        public function showProduct(){

            if (isset($_GET['product']) && !empty($_GET['product'])){
                $product = new  Producto();
                $products = $product->getProductByCategory($_GET['product']);



                if ($products == null){
                    $producto = null;
                }
                else{
                    $producto = $products;
                }
            }




           require_once 'views/categorias/produtos.php';
        }
    }
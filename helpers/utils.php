<?php

class Utils{

    public static function deleteSession($nameSession){
        if (isset($_SESSION[$nameSession])){
            $_SESSION[$nameSession] = null;
            unset($_SESSION[$nameSession]);
        }
        return $nameSession;

    }

    public static function isAdmin(){
        if (isset($_SESSION['admin'])){
            return true;

        }
        else{
            header("Location: " . base_url );
        }
    }

    public static function showCategorias(){
        require_once 'models/categoria.php';

        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        return $categorias;
    }

    public static function statsCarrito(){
        $stats = array(
            'count' => 0,
            'total' => 0
        );

        if (isset($_SESSION['carrito'])){
            $stats['count'] = count($_SESSION['carrito']);

            foreach ($_SESSION['carrito'] as $index => $producto){
                $stats['total'] += $producto['precio'] * $producto['unidades'];
            }
        }

        return $stats;
    }

}

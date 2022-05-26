USE tienda_master;

CREATE TABLE lineas_pedidos(
    id INT(255) AUTO_INCREMENT NOT NULL ,
    pedido_id INT(255) NOT NULL ,
    producto_id INT(255) NOT NULL ,

    CONSTRAINT  pk_lineas_pedidos PRIMARY KEY (id),
    CONSTRAINT fk_pedidos FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    CONSTRAINT fk_productos FOREIGN KEY (producto_id) REFERENCES productos(id)

)
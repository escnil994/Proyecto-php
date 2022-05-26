<style>


    .switch-field input {
        position: absolute !important;
        clip: rect(0, 0, 0, 0);
        height: 1px;
        width: 1px;
        border: 0;
        overflow: hidden;
    }


    .switch-field label:first-of-type {
        border-radius: 0;
    }

    .switch-field label {
        display: inline-block;
        width: 35px;
        min-width: 40px;
        background-color: #FFF;
        color: #000;
        font-size: 13px;
        font-weight: normal;
        text-align: center;
        text-shadow: none;
        padding: 10px 5px;
        border: 1px solid #000;
        margin: 4px;
    }

    label:hover {
        cursor: pointer;
    }

    .list-group {
        flex-direction: initial !important;
    }

    .active {
        background: #9ba6c8 !important;
        border-color: #9ba6c8 !important;
    }

    .btn:hover {
        cursor: default !important;

    }

    #carrito:hover {
        cursor: pointer !important;
    }

</style>


<h1><?= $product->nombre ?></h1>

<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <img src="<?= base_url ?>files/products/<?= $product->imagen ?>" width="300" alt="">
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">

                <h4><?php $nombre = $product->nombre;
                    echo strtoupper($nombre); ?></h4>

                <h4 class="text-danger">$
                    <del><?= $product->precio ?></del>
                    <strong class="text-dark">-</strong> <strong class="btn btn-secondary">   <?= $product->oferta ?>% De Descuento</strong></h4>


                <h4 class="text-success">
                    $ <?= number_format($product->precio - ((($product->precio) / 100) * $product->oferta), 2); ?> </h4>

                <br>
                <h3>TALLA:</h3>

                <form action="<?= base_url ?>carrito/add&product=<?=$product->id?>&name=<?=$product->nombre?>&details=<?=$product->descripcion?>" method="POST">
                    <div class="list-group switch-field" id="list-tab" role="tablist">
                        <input class="talla" type="radio" name="talla" id="1" value="talla-none" disabled="">
                        <label class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list"
                               href="#list-home" role="tab" aria-controls="list-home" for="1"><strike
                                    style="color:#CCC;">0</strike></label>
                        <input class="talla" type="radio" name="talla" id="2" value="talla-2">
                        <label class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list"
                               href="#list-home" role="tab" aria-controls="list-home" for="2">2</label>
                        <input class="talla" type="radio" name="talla" id="3" value="talla-4">
                        <label class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list"
                               href="#list-home" role="tab" aria-controls="list-home" for="3">4</label>
                        <input class="talla" type="radio" name="talla" id="4" value="talla-6">
                        <label class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list"
                               href="#list-home" role="tab" aria-controls="list-home" for="4">6</label>
                        <input class="talla" type="radio" name="talla" id="5" value="talla-8">
                        <label class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list"
                               href="#list-home" role="tab" aria-controls="list-home" for="5">8</label>
                        <input class="talla" type="radio" name="talla" id="6" value="talla-10">
                        <label class="list-group-item list-group-item-action" id="list-profile-list"
                               data-bs-toggle="list"
                               href="#list-profile" role="tab" aria-controls="list-profile" for="6">10</label>
                        <input class="talla" type="radio" name="talla" id="7" value="talla-12">
                        <label class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list"
                               href="#list-home" role="tab" aria-controls="list-home" for="7">12</label>
                        <input class="talla" type="radio" name="talla" id="8" value="talla-14">
                        <label class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list"
                               href="#list-home" role="tab" aria-controls="list-home" for="8">14</label>
                        <input class="talla" type="radio" name="talla" id="9" value="talla-16">
                        <label class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list"
                               href="#list-home" role="tab" aria-controls="list-home" for="9">16</label>
                        <input class="talla" type="radio" name="talla" id="10" value="talla-18">
                        <label class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list"
                               href="#list-home" role="tab" aria-controls="list-home" for="10">18</label>
                    </div>

                    <br>
                    <p>Si no encuantras tu talla, <a href="">Haz click aquí</a></p>


                    <br>
                    <p>Selecciona la cantidad para agregar al carrito</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                               value="1">
                        <label class="form-check-label" for="1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                               value="2">
                        <label class="form-check-label" for="2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                               value="3">
                        <label class="form-check-label" for="3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                               value="4">
                        <label class="form-check-label" for="4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                               value="5">
                        <label class="form-check-label" for="inlineRadio1">5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                               value="6">
                        <label class="form-check-label" for="inlineRadio2">6</label>
                    </div>

                   
                    <br>

                    <input type="submit" value="Agregar al carrito" class="btn btn-primary text-white mt-3"  id="carrito">
                </form>

                
                <br><br><br>
                <table class="product-detail" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td height="32" style="border-bottom:2px solid #000;">
                            <span style="font-size:16px;font-family:Oswald,sans-serif;">DETALLE DE PRODUCTO</span>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle">
                            <div id="Description" style="font-size:.9rem;font-weight: 300;">
                                <p>
                                    <?= $product->descripcion ?>
                                </p>
                            </div>
                        </td>
                    </tr>


                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>





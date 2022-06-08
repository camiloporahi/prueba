<?php

use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\ActiveForm;

use app\models\Producto;
use app\models\ProductoSearch;
use app\models\ClienteSearch;
use app\models\Cliente;

/** @var yii\web\View $this */

$this->title = 'Nueva Factura';
?>
<div class="site-index">

    <div class="body-content">
    <?php $form = ActiveForm::begin(); ?>
        <div class="row"> <h2> <?= $this->title; ?> <h2> </div>

        <div class="row">
            <div class="col-lg-12" style="border: 1px solid gray;border-radius: 10px;padding: 15px;">
                <h4>Datos del cliente</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="col-lg-12">
                            <?= $form->field($model, "identificacion")->input("text") ?> 
                        </div>
                        <div class="col-lg-12">
                            <?= Html::submitButton('Buscar Cliente', ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="col-lg-12">
                            <?php 
                            if(empty($cliente)){
                                echo "Datos del Cliente:";
                            }else{
                                echo "Datos del Cliente: <br>";
                                echo "Identificación: ".$cliente->identificacion."<br>";
                                echo "Nombre: ".$cliente->nombre." ".$cliente->apellido."<br>";
                                echo "Telefono: ".$cliente->telefono;
                            } 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row"> &nbsp; </div>
        <div class="row">
            <div class="col-lg-12" style="border: 1px solid gray;border-radius: 10px;padding: 15px;">
                <h4>Productos</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="col-lg-12">
                            <?= $form->field($model_producto, "codigo")->input("text") ?> 
                        </div>
                        <div class="col-lg-12">
                            <?= Html::submitButton('Buscar Producto', ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="col-lg-12">
                            <?php 
                            if(empty($producto)){
                                echo "Datos del Producto:";
                            }else{
                                echo "Datos del Cliente: <br>";
                                echo "Identificación: ".$producto->codigo."<br>";
                                echo "Nombre: ".$producto->nombre." - ".$producto->descripcion."<br>";
                                echo "Telefono: ".$producto->precio;
                            } 
                            ?>
                        <br><br>
                        <?php 
                        if(empty($producto)){ 
                            $producto_var = 100; 
                        }else{
                            $producto_var = $producto->id_producto;
                        } 

                        ?>
                        <a href="<?= Url::to(['/site/cargar', 
                                        'id_cliente' => $cliente->id_cliente, 
                                        'id_producto' => $producto_var]) ?>" 
                            class="btn btn-success">  Agregar Producto
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row"> &nbsp; </div>
        <div class="row">
            <div class="col-lg-12" style="border: 1px solid gray;border-radius: 10px;padding: 15px;">
                <h4>Factura</h4>
                <?php 
                if(empty($model_preparar)){
                    echo "Sin datos:";
                }else{
                    echo "Datos de la Factura: <br>";
                    echo "Cliente: ".$model_preparar->id_cliente."<br>";
                    echo "Producto: ".$model_preparar->id_producto." - Cantidad: ".$model_preparar->cantidad."<br>";
                    echo "Total: ".$model_preparar->total;
                } 
                ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>

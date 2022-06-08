<?php

use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\ActiveForm;




/** @var yii\web\View $this */

$this->title = 'Nueva Factura';
?>
<div class="site-index">

    <div class="body-content">
    
        <div class="row"> <h2> <?= $this->title; ?> <h2> </div>

        <div class="row">
            <div class="col-lg-12" style="border: 1px solid gray;border-radius: 10px;padding: 15px;">
                <h4>Datos de la Factura</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="col-lg-12">
                            <table>

                            <?php 
                            foreach($preparar as $key => $value){
                                if($key == 0){
                                   
                                    echo "Datos del Cliente: <br>";
                                    echo "Identificación: ".$value->cliente->identificacion."<br>";
                                    echo "Nombre: ".$value->cliente->nombre." ".$value->cliente->apellido."<br>";
                                    echo "Telefono: ".$value->cliente->telefono;
                                    echo "<hr>";
                                    echo "Productos: <br>";
                                }
                                echo "Codigo: ".$value->producto->codigo." &nbsp;&nbsp;&nbsp; ";
                                echo "Nombre: ".$value->producto->nombre." ".$value->producto->descripcion." &nbsp;&nbsp;&nbsp; ";
                                echo "Precio: ".$value->producto->precio;
                                echo "<br>";
                            }
                            ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row"> &nbsp; </div>
    
    </div>
</div>

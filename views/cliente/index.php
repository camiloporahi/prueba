<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Cliente;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_cliente',
            'identificacion',
            'nombre',
            'apellido',
            'fecha_nacimiento',
            //'email:email',
            //'telefono',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cliente $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_cliente' => $model->id_cliente]);
                 }
            ],
        ],
    ]); ?>


</div>

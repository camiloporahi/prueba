<?php

namespace app\models;

use Yii;
use app\models\Cliente;
/**
 * This is the model class for table "preparar".
 *
 * @property int $id_preparar
 * @property int $id_cliente
 * @property int $id_producto
 * @property int $posible
 * @property int $cantidad
 * @property int $total
 */
class Preparar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'preparar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente', 'id_producto', 'posible', 'cantidad', 'total'], 'required'],
            [['id_cliente', 'id_producto', 'posible', 'cantidad', 'total'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_preparar' => 'Id Preparar',
            'id_cliente' => 'Id Cliente',
            'id_producto' => 'Id Producto',
            'posible' => 'Posible',
            'cantidad' => 'Cantidad',
            'total' => 'Total',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PrepararQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PrepararQuery(get_called_class());
    }

    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id_cliente' => 'id_cliente']);
    }

    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id_producto' => 'id_producto']);
    }
}

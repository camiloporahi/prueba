<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $id_producto
 * @property int $codigo
 * @property string $nombre
 * @property string|null $descripcion
 * @property int $cantidad
 * @property float $precio
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'nombre', 'cantidad', 'precio'], 'required'],
            [['codigo', 'cantidad'], 'integer'],
            [['precio'], 'number'],
            [['nombre'], 'string', 'max' => 120],
            [['descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => 'Id Producto',
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'cantidad' => 'Cantidad',
            'precio' => 'Precio',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ProductoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductoQuery(get_called_class());
    }
}

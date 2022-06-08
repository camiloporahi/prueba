<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id_cliente
 * @property string $identificacion
 * @property string $nombre
 * @property string $apellido
 * @property string $fecha_nacimiento
 * @property string $email
 * @property int $telefono
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['identificacion', 'nombre', 'apellido', 'fecha_nacimiento', 'email', 'telefono'], 'required'],
            [['fecha_nacimiento'], 'safe'],
            [['telefono'], 'integer'],
            [['identificacion'], 'string', 'max' => 12],
            [['nombre', 'apellido'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cliente' => 'Id Cliente',
            'identificacion' => 'Identificacion',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'email' => 'Email',
            'telefono' => 'Telefono',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ClienteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClienteQuery(get_called_class());
    }
}

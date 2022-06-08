<?php

namespace app\models;

use Yii;
use yii\base\Model;


class BuscarCliente extends Model
{
    public $identificacion;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['identificacion'], 'required'],
            
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'indentificacion' => 'Número de Identificación',
        ];
    }

    
}

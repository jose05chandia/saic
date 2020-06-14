<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_cuenta".
 *
 * @property int $ecu_codigo
 * @property string $ecu_nombre
 * @property string $ecu_descripcion
 *
 * @property Cuenta[] $cuentas
 */
class EstadoCuenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_cuenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ecu_nombre', 'ecu_descripcion'], 'required'],
            [['ecu_nombre'], 'string', 'max' => 30],
            [['ecu_descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ecu_codigo' => 'Ecu Codigo',
            'ecu_nombre' => 'Nombre',
            'ecu_descripcion' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuentas()
    {
        return $this->hasMany(Cuenta::className(), ['ecu_codigo' => 'ecu_codigo']);
    }
}

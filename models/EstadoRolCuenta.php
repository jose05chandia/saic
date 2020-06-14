<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_rol_cuenta".
 *
 * @property int $erocu_codigo
 * @property string $erocu_nombre
 * @property string $erocu_descripcion
 *
 * @property RolCuenta[] $rolCuentas
 */
class EstadoRolCuenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_rol_cuenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['erocu_nombre', 'erocu_descripcion'], 'required'],
            [['erocu_nombre'], 'string', 'max' => 30],
            [['erocu_descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'erocu_codigo' => 'Erocu Codigo',
            'erocu_nombre' => 'Nombre',
            'erocu_descripcion' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolCuentas()
    {
        return $this->hasMany(RolCuenta::className(), ['erocu_codigo' => 'erocu_codigo']);
    }
}

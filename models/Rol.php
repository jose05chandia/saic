<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rol".
 *
 * @property int $rol_codigo
 * @property string $rol_nombre
 * @property string $rol_descripcion
 *
 * @property RolCuenta[] $rolCuentas
 */
class Rol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rol_nombre', 'rol_descripcion'], 'required'],
            [['rol_nombre'], 'string', 'max' => 30],
            [['rol_descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rol_codigo' => 'Rol Codigo',
            'rol_nombre' => 'Nombre',
            'rol_descripcion' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolCuentas()
    {
        return $this->hasMany(RolCuenta::className(), ['rol_codigo' => 'rol_codigo']);
    }
}

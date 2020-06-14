<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rol_cuenta".
 *
 * @property int $rocu_codigo
 * @property int $erocu_codigo
 * @property int $rol_codigo
 * @property int $id
 *
 * @property EstadoRolCuenta $erocuCodigo
 * @property Rol $rolCodigo
 * @property Cuenta $id0
 */
class RolCuenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rol_cuenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['erocu_codigo', 'rol_codigo', 'id'], 'required'],
            [['erocu_codigo', 'rol_codigo', 'id'], 'integer'],
            [['erocu_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoRolCuenta::className(), 'targetAttribute' => ['erocu_codigo' => 'erocu_codigo']],
            [['rol_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['rol_codigo' => 'rol_codigo']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Cuenta::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rocu_codigo' => 'Rocu Codigo',
            'erocu_codigo' => 'Erocu Codigo',
            'rol_codigo' => 'Rol Codigo',
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getErocuCodigo()
    {
        return $this->hasOne(EstadoRolCuenta::className(), ['erocu_codigo' => 'erocu_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolCodigo()
    {
        return $this->hasOne(Rol::className(), ['rol_codigo' => 'rol_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Cuenta::className(), ['id' => 'id']);
    }
}

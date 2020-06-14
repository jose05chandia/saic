<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_persona".
 *
 * @property int $eper_codigo
 * @property string $eper_nombre
 * @property string $eper_descripcion
 *
 * @property Persona[] $personas
 */
class EstadoPersona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['eper_nombre', 'eper_descripcion'], 'required'],
            [['eper_nombre'], 'string', 'max' => 30],
            [['eper_descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'eper_codigo' => 'Eper Codigo',
            'eper_nombre' => 'Nombre',
            'eper_descripcion' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['eper_codigo' => 'eper_codigo']);
    }
}

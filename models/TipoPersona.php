<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_persona".
 *
 * @property int $tper_codigo
 * @property string $tper_nombre
 * @property string $tper_descripcion
 *
 * @property Persona[] $personas
 */
class TipoPersona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tper_nombre', 'tper_descripcion'], 'required'],
            [['tper_nombre'], 'string', 'max' => 30],
            [['tper_descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tper_codigo' => 'Tper Codigo',
            'tper_nombre' => 'Nombre',
            'tper_descripcion' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['tper_codigo' => 'tper_codigo']);
    }
}

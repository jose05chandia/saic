<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_persona_congregacion".
 *
 * @property int $epcong_codigo
 * @property string $epcong_nombre
 *
 * @property PersonaCongregacion[] $personaCongregacions
 */
class EstadoPersonaCongregacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_persona_congregacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['epcong_nombre'], 'required'],
            [['epcong_nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'epcong_codigo' => 'Epcong Codigo',
            'epcong_nombre' => 'Epcong Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaCongregacions()
    {
        return $this->hasMany(PersonaCongregacion::className(), ['epcong_codigo' => 'epcong_codigo']);
    }
}

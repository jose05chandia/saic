<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_persona_congregacion".
 *
 * @property int $tpcong_codigo
 * @property string $tpcong_nombre
 *
 * @property PersonaCongregacion[] $personaCongregacions
 */
class TipoPersonaCongregacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_persona_congregacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tpcong_nombre'], 'required'],
            [['tpcong_nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tpcong_codigo' => 'Tpcong Codigo',
            'tpcong_nombre' => 'Tpcong Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaCongregacions()
    {
        return $this->hasMany(PersonaCongregacion::className(), ['tpcong_codigo' => 'tpcong_codigo']);
    }
}

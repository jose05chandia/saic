<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_congregacion".
 *
 * @property int $econg_codigo
 * @property string $econg_nombre
 *
 * @property Congregacion[] $congregacions
 */
class EstadoCongregacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_congregacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['econg_nombre'], 'required'],
            [['econg_nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'econg_codigo' => 'Econg Codigo',
            'econg_nombre' => 'Econg Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCongregacions()
    {
        return $this->hasMany(Congregacion::className(), ['econg_codigo' => 'econg_codigo']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_congregacion".
 *
 * @property int $tcong_codigo
 * @property string $tcong_nombre
 *
 * @property Congregacion[] $congregacions
 */
class TipoCongregacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_congregacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tcong_nombre'], 'required'],
            [['tcong_nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tcong_codigo' => 'Tcong Codigo',
            'tcong_nombre' => 'Tcong Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCongregacions()
    {
        return $this->hasMany(Congregacion::className(), ['tcong_codigo' => 'tcong_codigo']);
    }
}

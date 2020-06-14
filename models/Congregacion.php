<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "congregacion".
 *
 * @property int $cong_codigo
 * @property string $cong_nombre
 * @property string $cong_sector
 * @property int $econg_codigo
 * @property int $tcong_codigo
 *
 * @property EstadoCongregacion $econgCodigo
 * @property TipoCongregacion $tcongCodigo
 * @property PersonaCongregacion[] $personaCongregacions
 */
class Congregacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'congregacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cong_nombre', 'cong_sector', 'econg_codigo', 'tcong_codigo'], 'required'],
            [['econg_codigo', 'tcong_codigo'], 'integer'],
            [['cong_nombre', 'cong_sector'], 'string', 'max' => 100],
            [['cong_fotografia'], 'string', 'max' => 255],
            [['econg_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoCongregacion::className(), 'targetAttribute' => ['econg_codigo' => 'econg_codigo']],
            [['tcong_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoCongregacion::className(), 'targetAttribute' => ['tcong_codigo' => 'tcong_codigo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cong_codigo' => 'Cong Codigo',
            'cong_nombre' => 'Cong Nombre',
            'cong_sector' => 'Cong Sector',
            'cong_fotografia' => 'cong_fotografia',
            'econg_codigo' => 'Econg Codigo',
            'tcong_codigo' => 'Tcong Codigo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEcongCodigo()
    {
        return $this->hasOne(EstadoCongregacion::className(), ['econg_codigo' => 'econg_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTcongCodigo()
    {
        return $this->hasOne(TipoCongregacion::className(), ['tcong_codigo' => 'tcong_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaCongregacions()
    {
        return $this->hasMany(PersonaCongregacion::className(), ['cong_codigo' => 'cong_codigo']);
    }
}

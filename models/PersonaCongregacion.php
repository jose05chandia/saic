<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona_congregacion".
 *
 * @property int $perc_codigo
 * @property int $per_codigo
 * @property int $cong_codigo
 * @property int $tpcong_codigo
 * @property int $epcong_codigo
 *
 * @property Persona $perCodigo
 * @property Congregacion $congCodigo
 * @property TipoPersonaCongregacion $tpcongCodigo
 * @property EstadoPersonaCongregacion $epcongCodigo
 */
class PersonaCongregacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona_congregacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['per_codigo', 'cong_codigo', 'tpcong_codigo', 'epcong_codigo'], 'required'],
            [['per_codigo', 'cong_codigo', 'tpcong_codigo', 'epcong_codigo'], 'integer'],
            [['per_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['per_codigo' => 'pers_codigo']],
            [['cong_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Congregacion::className(), 'targetAttribute' => ['cong_codigo' => 'cong_codigo']],
            [['tpcong_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoPersonaCongregacion::className(), 'targetAttribute' => ['tpcong_codigo' => 'tpcong_codigo']],
            [['epcong_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoPersonaCongregacion::className(), 'targetAttribute' => ['epcong_codigo' => 'epcong_codigo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'perc_codigo' => 'Perc Codigo',
            'per_codigo' => 'Per Codigo',
            'cong_codigo' => 'Cong Codigo',
            'tpcong_codigo' => 'Tpcong Codigo',
            'epcong_codigo' => 'Epcong Codigo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerCodigo()
    {
        return $this->hasOne(Persona::className(), ['pers_codigo' => 'per_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCongCodigo()
    {
        return $this->hasOne(Congregacion::className(), ['cong_codigo' => 'cong_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpcongCodigo()
    {
        return $this->hasOne(TipoPersonaCongregacion::className(), ['tpcong_codigo' => 'tpcong_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEpcongCodigo()
    {
        return $this->hasOne(EstadoPersonaCongregacion::className(), ['epcong_codigo' => 'epcong_codigo']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property int $pers_codigo
 * @property string $pers_rut
 * @property string $per_fecha_nacimiento
 * @property string $per_nombre1
 * @property string $per_nombre2
 * @property string $per_apellido_paterno
 * @property string $per_apellido_materno
 * @property string $per_telefono
 * @property string $per_celular
 * @property string $per_email1
 * @property string $per_email2
 * @property string $per_direccion1
 * @property string $per_direccion2
 * @property int $eper_codigo
 * @property int $tper_codigo
 * @property string $per_fotografia
 *
 * @property Cuenta[] $cuentas
 * @property EstadoPersona $eperCodigo
 * @property TipoPersona $tperCodigo
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pers_rut', 'per_nombre1', 'per_apellido_paterno', 'per_direccion1', 'eper_codigo', 'tper_codigo'], 'required'],
            [['per_fecha_nacimiento','per_fecha_bautismo'], 'safe'],
            [['eper_codigo', 'tper_codigo'], 'integer'],
            [['pers_rut'], 'string', 'max' => 9],
			[['pers_rut'],'validaterut'],
            [['per_nombre1', 'per_nombre2', 'per_apellido_paterno', 'per_apellido_materno', 'per_telefono', 'per_celular', 'per_direccion1', 'per_direccion2'], 'string', 'max' => 30],
            [['per_email1', 'per_email2', 'per_fotografia'], 'string', 'max' => 255],
            [['eper_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoPersona::className(), 'targetAttribute' => ['eper_codigo' => 'eper_codigo']],
            [['tper_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoPersona::className(), 'targetAttribute' => ['tper_codigo' => 'tper_codigo']],
        ];
    }

	
	
	
	 public function validaterut($attribute_name, $params)
    {
        if (!$this->validaRut($this->pers_rut))
         {
            $this->addError($attribute_name, 'El rut ingresado no es válido.');

            return false;
        }

        return true;
    }
	
	function validaRut($rut){
        if(strlen($rut)>9 || strlen($rut)<8  ){
            return false;
        }
        if(strpos($rut,"-")==false){
            $RUT[0] = substr($rut, 0, -1);
            $RUT[1] = substr($rut, -1);
        }else{
            $RUT = explode("-", trim($rut));
        }
        $elRut = str_replace(".", "", trim($RUT[0]));
        $factor = 2;
        $suma=0;
        $noint=true;
        for($i = strlen($elRut)-1; $i >= 0; $i--):
            $factor = $factor > 7 ? 2 : $factor;
            $suma += $elRut{$i}*$factor++;
            if(!(is_numeric($elRut{$i}))){
                $noint=false;
            }
        endfor;
        if(!$noint){return false;}
        $resto = $suma % 11;
        $dv = 11 - $resto;
        if($dv == 11){
            $dv=0;
        }else if($dv == 10){
            $dv="k";
        }else{
            $dv=$dv;
        }
       if($dv == trim(strtolower($RUT[1]))){
           return true;
       }else{
           return false;
       }
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pers_codigo' => 'Pers Codigo',
            'pers_rut' => 'Rut',
            'per_fecha_nacimiento' => 'Fecha de nacimiento',
            'per_fecha_bautismo' => 'Fecha bautismo',
            'per_nombre1' => 'Primer nombre',
            'per_nombre2' => 'Segundo nombre',
            'per_apellido_paterno' => 'Apellido paterno',
            'per_apellido_materno' => 'Apellido materno',
            'per_telefono' => 'Teléfono',
            'per_celular' => 'Celular',
            'per_email1' => 'Email',
            'per_email2' => 'Email alternativo',
            'per_direccion1' => 'Dirección',
            'per_direccion2' => 'Direcciòn allternativa',
            'eper_codigo' => 'Estado',
            'tper_codigo' => 'Tipo',
            'per_fotografia' => 'Fotografìa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuentas()
    {
        return $this->hasMany(Cuenta::className(), ['pers_codigo' => 'pers_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEperCodigo()
    {
        return $this->hasOne(EstadoPersona::className(), ['eper_codigo' => 'eper_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTperCodigo()
    {
        return $this->hasOne(TipoPersona::className(), ['tper_codigo' => 'tper_codigo']);
    }
}

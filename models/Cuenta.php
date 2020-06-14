<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cuenta".
 *
 * @property int $id
 * @property string $accessToken
 * @property string $authKey
 * @property string $username
 * @property string $password
 * @property int $ecu_codigo
 * @property int $pers_codigo
 *
 * @property EstadoCuenta $ecuCodigo
 * @property Persona $persCodigo
 * @property RolCuenta[] $rolCuentas
 */
class Cuenta extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
	 
	 public $nueva;
	 public $repeticion;
    public static function tableName()
    {
        return 'cuenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['accessToken', 'authKey', 'username', 'password', 'ecu_codigo', 'pers_codigo','nueva','repeticion'], 'required'],
            [['ecu_codigo', 'pers_codigo'], 'integer'],
			[['nueva','repeticion'],'repite'],

            [['accessToken', 'authKey', 'username', 'password'], 'string', 'max' => 255],
            [['ecu_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoCuenta::className(), 'targetAttribute' => ['ecu_codigo' => 'ecu_codigo']],
            [['pers_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['pers_codigo' => 'pers_codigo']],
        ];
    }

    /**
     * @inheritdoc
     */
	 
	 public function repite($attribute_name, $params)
    {
        if (strcmp($this->nueva,$this->repeticion)!=0)
         {
            $this->addError($attribute_name, 'La nueva contraseña debe ser igual a repetición de contraseña.');

            return false;
        }

        return true;
    }

	
	
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'accessToken' => 'Access Token',
            'authKey' => 'Auth Key',
            'username' => 'Usuario',
            'password' => 'Contraseña',
            'ecu_codigo' => 'Estado',
            'pers_codigo' => 'Persona',
            'repeticion' => 'Repeticón de contraseña',
            'nueva' => 'Nueva contraseña',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEcuCodigo()
    {
        return $this->hasOne(EstadoCuenta::className(), ['ecu_codigo' => 'ecu_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersCodigo()
    {
        return $this->hasOne(Persona::className(), ['pers_codigo' => 'pers_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolCuentas()
    {
        return $this->hasMany(RolCuenta::className(), ['id' => 'id']);
    }




    

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
        
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
       return static::findOne(['accessToken' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
		$hash = mhash (MHASH_SHA1, $password);
        $hex_hash = bin2hex ($hash);
		$password=base64_encode($hash);
        return $this->password === $password;
    }
}

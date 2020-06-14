<?php

namespace app\models;

use Yii;
use yii\db\Query;


class Consultas
{
    const PASTOR='PASTOR';
    const SOPORTE='SOPORTE';
    const PROFESOR='PROFESOR';
    const MIEMBRO='MIEMBRO';
    const SECRETARIA='SECRETARIA';
    const TESORERA='TESORERA';

    
    public function obtenerMiembrosActivos()
    {
        return Persona::find()->orderBy(['per_fecha_nacimiento' => SORT_ASC])->where('tper_codigo<>3')->andWhere('eper_codigo=1')->All();
    }

    public function getRolesPorId($id)
    {
        if(Yii::$app->user->isGuest){
            return null;
        }
        $connection=\Yii::$app->db;
        $query = $connection->createCommand('select r.*
        from saic.rol r
        JOIN saic.rol_cuenta rc
        on r.rol_codigo=rc.rol_codigo
        where rc.id='.Yii::$app->user->identity->id);        
        $datos = $query->queryAll();
        return $datos;
    }
	
	
	

}

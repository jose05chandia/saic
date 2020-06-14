<?php

use yii\helpers\Html;
use app\models\Persona;
/* @var $this yii\web\View */
/* @var $model app\models\Cuenta */
$persona=Persona::Find()->where('pers_codigo='.$model->pers_codigo)->one();

?>
<div class="cuenta-update">
	<h1>Centa de <?=$persona->per_nombre1.' '.$persona->per_nombre2.' '.$persona->per_apellido_paterno?></h1>

    <?= $this->render('_formmiperfilsoporte', [
        'model' => $model,
    ]) ?>

</div>

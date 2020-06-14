<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cuenta */


?>
<div class="cuenta-create">


    <?= $this->render('_createmodalcuenta', [
        'model' => $model,
        'modelpersona' => $modelpersona,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoRolCuenta */

$this->title = 'Update Estado Rol Cuenta: ' . $model->erocu_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Estado Rol Cuentas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->erocu_codigo, 'url' => ['view', 'id' => $model->erocu_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estado-rol-cuenta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

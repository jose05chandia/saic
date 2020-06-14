<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoCuenta */

$this->title = 'Update Estado Cuenta: ' . $model->ecu_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Estado Cuentas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ecu_codigo, 'url' => ['view', 'id' => $model->ecu_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estado-cuenta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

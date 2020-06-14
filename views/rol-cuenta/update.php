<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RolCuenta */

$this->title = 'Update Rol Cuenta: ' . $model->rocu_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Rol Cuentas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rocu_codigo, 'url' => ['view', 'id' => $model->rocu_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rol-cuenta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

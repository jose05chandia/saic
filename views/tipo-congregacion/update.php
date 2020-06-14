<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoCongregacion */

$this->title = 'Update Tipo Congregacion: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Congregacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tcong_codigo, 'url' => ['view', 'id' => $model->tcong_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-congregacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

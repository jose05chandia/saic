<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoPersonaCongregacion */

$this->title = 'Update Tipo Persona Congregacion: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Persona Congregacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tpcong_codigo, 'url' => ['view', 'id' => $model->tpcong_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-persona-congregacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

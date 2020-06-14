<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PersonaCongregacion */

$this->title = 'Update Persona Congregacion: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Persona Congregacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->perc_codigo, 'url' => ['view', 'id' => $model->perc_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="persona-congregacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = 'Editando persona: ' . $model->per_nombre1.' '.$model->per_apellido_paterno.' '.$model->per_apellido_materno;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pers_codigo, 'url' => ['view', 'id' => $model->pers_codigo]];
$this->params['breadcrumbs'][] = 'Editando';
?>
<div class="persona-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

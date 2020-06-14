<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoPersona */

$this->title = 'Editando estado de Persona: ' . $model->eper_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Estado Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->eper_codigo, 'url' => ['view', 'id' => $model->eper_codigo]];
$this->params['breadcrumbs'][] = 'Editando';
?>
<div class="estado-persona-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

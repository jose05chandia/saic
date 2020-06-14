<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoPersona */

$this->title = 'Editando Tipo de Personas: ' . $model->tper_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tper_codigo, 'url' => ['view', 'id' => $model->tper_codigo]];
$this->params['breadcrumbs'][] = 'Editando';
?>
<div class="tipo-persona-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

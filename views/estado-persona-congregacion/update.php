<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoPersonaCongregacion */

$this->title = 'Update Estado Persona Congregacion: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Estado Persona Congregacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->epcong_codigo, 'url' => ['view', 'id' => $model->epcong_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estado-persona-congregacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

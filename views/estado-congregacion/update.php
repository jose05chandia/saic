<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoCongregacion */

$this->title = 'Update Estado Congregacion: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Estado Congregacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->econg_codigo, 'url' => ['view', 'id' => $model->econg_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estado-congregacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

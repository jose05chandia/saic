<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Congregacion */

$this->title = 'Update Congregacion: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Congregacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cong_codigo, 'url' => ['view', 'id' => $model->cong_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="congregacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

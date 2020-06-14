<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonaCongregacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-congregacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'perc_codigo') ?>

    <?= $form->field($model, 'per_codigo') ?>

    <?= $form->field($model, 'cong_codigo') ?>

    <?= $form->field($model, 'tpcong_codigo') ?>

    <?= $form->field($model, 'epcong_codigo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

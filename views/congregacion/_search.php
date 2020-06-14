<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CongregacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="congregacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cong_codigo') ?>

    <?= $form->field($model, 'cong_nombre') ?>

    <?= $form->field($model, 'cong_sector') ?>

    <?= $form->field($model, 'econg_codigo') ?>

    <?= $form->field($model, 'tcong_codigo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

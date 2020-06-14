<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonaCongregacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-congregacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'per_codigo')->textInput() ?>

    <?= $form->field($model, 'cong_codigo')->textInput() ?>

    <?= $form->field($model, 'tpcong_codigo')->textInput() ?>

    <?= $form->field($model, 'epcong_codigo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

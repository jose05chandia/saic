<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoPersona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tper_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tper_descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoPersona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estado-persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'eper_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eper_descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

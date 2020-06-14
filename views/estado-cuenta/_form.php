<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoCuenta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estado-cuenta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ecu_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ecu_descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

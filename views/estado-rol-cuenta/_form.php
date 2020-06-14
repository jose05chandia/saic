<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoRolCuenta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estado-rol-cuenta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'erocu_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'erocu_descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

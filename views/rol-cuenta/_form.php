<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RolCuenta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rol-cuenta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'erocu_codigo')->textInput() ?>

    <?= $form->field($model, 'rol_codigo')->textInput() ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

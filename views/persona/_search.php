<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pers_codigo') ?>

    <?= $form->field($model, 'pers_rut') ?>

    <?= $form->field($model, 'per_fecha_nacimiento') ?>

    <?= $form->field($model, 'per_nombre1') ?>

    <?= $form->field($model, 'per_nombre2') ?>

    <?php // echo $form->field($model, 'per_apellido_paterno') ?>

    <?php // echo $form->field($model, 'per_apellido_materno') ?>

    <?php // echo $form->field($model, 'per_telefono') ?>

    <?php // echo $form->field($model, 'per_celular') ?>

    <?php // echo $form->field($model, 'per_email1') ?>

    <?php // echo $form->field($model, 'per_email2') ?>

    <?php // echo $form->field($model, 'per_direccion1') ?>

    <?php // echo $form->field($model, 'per_direccion2') ?>

    <?php // echo $form->field($model, 'eper_codigo') ?>

    <?php // echo $form->field($model, 'tper_codigo') ?>

    <?php // echo $form->field($model, 'per_fotografia') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

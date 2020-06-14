<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoPersonaCongregacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-persona-congregacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tpcong_nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

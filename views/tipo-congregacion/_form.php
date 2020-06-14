<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoCongregacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-congregacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tcong_nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

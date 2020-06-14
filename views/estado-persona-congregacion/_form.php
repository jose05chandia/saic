<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoPersonaCongregacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estado-persona-congregacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'epcong_nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

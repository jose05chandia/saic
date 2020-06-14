<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(['action'=>$_SERVER['SCRIPT_NAME'].'/persona/updatemiperfil/'.$model->pers_codigo]); ?>

	<label class="control-label" for="cuenta-anterior">Rut</label>
	<div class="form-control"><?=$model->pers_rut?> <div class="pull-right"><span class="label label-warning">No se puede editar</span></div></div>
	<div class="help-block"></div>
    <?= $form->field($model, 'pers_rut')->hiddenInput(['maxlength' => true])->label(false)  ?>

    <?= $form->field($model, 'per_fecha_nacimiento')->hiddenInput()->label(false)  ?>

    <?= $form->field($model, 'per_fecha_bautismo')->hiddenInput()->label(false)  ?>

    <?= $form->field($model, 'per_nombre1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_nombre2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_apellido_paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_apellido_materno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_celular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_email1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_email2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_direccion1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_direccion2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eper_codigo')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'tper_codigo')->hiddenInput()->label(false)  ?>

    <?= $form->field($model, 'per_fotografia')->hiddenInput(['maxlength' => true])->label(false)  ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar datos personales', ['class' => 'btn btn-green btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

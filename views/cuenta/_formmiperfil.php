<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cuenta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuenta-form">

    <?php $form = ActiveForm::begin(['action'=>$_SERVER['SCRIPT_NAME'].'/cuenta/updatemiperfil/'.$model->id]); ?>

    <?= $form->field($model, 'accessToken')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'authKey')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'username')->hiddenInput(['maxlength' => true])->label(false) ?>
	
	
	
	<label class="control-label" for="cuenta-anterior">Usuario</label>
	<div class="form-control"><?=$model->username?> <div class="pull-right"><span class="label label-warning">No se puede editar</span></div></div>
	<div class="help-block"></div>

	
	<?= $form->field($model, 'password')->passwordInput(['readOnly'=>true]) ?>
	
	<?= $form->field($model, 'nueva')->passwordInput() ?>
		
   
    <?= $form->field($model, 'repeticion')->passwordInput() ?>

    <?= $form->field($model, 'ecu_codigo')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'pers_codigo')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar cambios de cuenta', ['class' => 'btn btn-green btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

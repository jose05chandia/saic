<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Estadocuenta;
use app\models\Persona;
use app\models\Rolcuenta;
use yii\helpers\ArrayHelper;
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

    <?php $dataCategory=ArrayHelper::map(Estadocuenta::find()->All(), 'ecu_codigo', 'ecu_nombre'); ?>
	  <?=	$form->field($model, 'ecu_codigo')->dropDownList($dataCategory, 
             [
              'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('post/lists?id=').'"+$(this).val(), function( data ) {
                  $( "select#title" ).html( data );
                });
            ']); 
	  ?>

    <?= $form->field($model, 'pers_codigo')->hiddenInput()->label(false) ?>

	
	
	<?php
	$rolcuentas=Rolcuenta::Find()->where('id='.$model->id)->all();
	
	?>
	<h3> <?=sizeof($rolcuentas)?> Rol(es) asignado(s)</h3>
    <div class="form-group">
        <?= Html::submitButton('Guardar cambios de cuenta', ['class' => 'btn btn-green btn-block']) ?>
    </div>
	
	

    <?php ActiveForm::end(); ?>

</div>

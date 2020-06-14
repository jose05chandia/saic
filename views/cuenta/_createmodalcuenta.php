<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Estadocuenta;
use app\models\Persona;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Cuenta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuenta-form">

    <?php $form = ActiveForm::begin(['action'=>$_SERVER['SCRIPT_NAME'].'/cuenta/createmodalcuenta']); ?>
	<?php
	
	$model->accessToken=$modelpersona->pers_rut;
	$model->authKey=$modelpersona->pers_rut;
	$model->username=$modelpersona->pers_rut;
	$model->repeticion=$modelpersona->pers_rut;
	$model->nueva=$modelpersona->pers_rut;
	$model->pers_codigo=$modelpersona->pers_codigo;
	?>
    <?= $form->field($model, 'repeticion')->hiddenInput(['maxlength' => true])->label(false)?>
    <?= $form->field($model, 'nueva')->hiddenInput(['maxlength' => true])->label(false) ?>
    <?= $form->field($model, 'accessToken')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'authKey')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'username')->textInput(['readOnly' => true]) ?>
	<?php $model->password=substr($model->username, 0, 4); ; ?>
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
	<p>* Se han asignado los primeros 4 dígitos del rut.</p>
    <!--<?= $form->field($model, 'ecu_codigo')->textInput() ?>-->
	
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
	

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

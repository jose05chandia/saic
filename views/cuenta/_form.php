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

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'accessToken')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authKey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
	<?php $model->password=substr($model->username, 0, 4); ; ?>
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

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

    <!--<?= $form->field($model, 'pers_codigo')->textInput() ?>-->
	
	<?php
	echo $form->field($model, 'pers_codigo')->widget(Select2::classname(), [
    'data' =>ArrayHelper::map(Persona::find()->All(), 'pers_codigo', 'per_nombre1','per_apellido_paterno'),
    'options' => ['placeholder' => 'Seleccione una persona ...', 'multiple' => false],
    'pluginOptions' => [
        'tags' => false,
    ],
])->label('Persona');
	?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

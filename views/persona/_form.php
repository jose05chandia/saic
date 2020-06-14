<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use app\models\EstadoPersona;
use app\models\TipoPersona;
use yii\helpers\ArrayHelper;
use app\models\UploadForm;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?php if(!$model->isNewRecord){ ?>
	<div class="row">
		<div class="col-md-3">
			<div class="text-center mbl">
				<img src="/saic/web/archivos/images/<?=(($model->per_fotografia)?$model->per_fotografia:'Unknown_Person.PNG')?>" alt="" class="img-responsive"/>
			</div>
			<?= Html::a("<i class='fa fa-upload'></i>&nbsp; Cambiar fotografía", ['updatemiperfilfile', 'id' => $model->pers_codigo], ['class' => 'btn btn-green']) ?>
		</div>
    </div>

	<?php } ?>
	   
	   
    <?= $form->field($model, 'pers_rut')->textInput(['maxlength' => true,'readOnly'=>(($model->isNewRecord)?false:true)]) ?>

	
	<?php
	echo '<label class="control-label">Fecha de nacimiento</label>';
	echo DatePicker::widget([
		'model' => $model, 
		'attribute' => 'per_fecha_nacimiento',
		'options' => ['placeholder' => 'Ingrese una fecha ...'],
		'pluginOptions' => [
			'format' => 'yyyy-mm-dd',
			'autoclose'=>true
		]
	]);

	?>
	
	
	<?php
	echo '<label class="control-label">Fecha de bautismo</label>';
	echo DatePicker::widget([
		'model' => $model, 
		'attribute' => 'per_fecha_bautismo',
		'options' => ['placeholder' => 'Ingrese una fecha ...'],
		'pluginOptions' => [
			'format' => 'yyyy-mm-dd',

			'autoclose'=>true
		]
	]);

	?>
	
   

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

    <!--<?= $form->field($model, 'eper_codigo')->textInput() ?>-->
	
	<?php $dataCategory=ArrayHelper::map(EstadoPersona::find()->All(), 'eper_codigo', 'eper_nombre'); ?>
	  <?=	$form->field($model, 'eper_codigo')->dropDownList($dataCategory, 
             ['prompt'=>'-Seleccione un estado-',
              'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('post/lists?id=').'"+$(this).val(), function( data ) {
                  $( "select#title" ).html( data );
                });
            ']); 
	  ?>

    <!--<?= $form->field($model, 'tper_codigo')->textInput() ?>-->
	
	<?php $dataCategory=ArrayHelper::map(TipoPersona::find()->All(), 'tper_codigo', 'tper_nombre'); ?>
	  <?=	$form->field($model, 'tper_codigo')->dropDownList($dataCategory, 
             ['prompt'=>'-Seleccione un estado-',
              'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('post/lists?id=').'"+$(this).val(), function( data ) {
                  $( "select#title" ).html( data );
                });
            ']); 
	  ?>

    <?= $form->field($model, 'per_fotografia')->hiddenInput(['maxlength' => true])->label(false) ?>

	
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

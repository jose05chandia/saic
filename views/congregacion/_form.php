<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\EstadoCongregacion;
use app\models\TipoCongregacion;

/* @var $this yii\web\View */
/* @var $model app\models\Congregacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="congregacion-form">

<?php if(!$model->isNewRecord){ ?>
	<div class="row">
		<div class="col-md-3">
			<div class="text-center mbl">
				<img src="/saic/web/archivos/images/<?=(($model->cong_fotografia)?$model->cong_fotografia:'Unknown_Person.PNG')?>" alt="" class="img-responsive"/>
			</div>
			<?= Html::a("<i class='fa fa-upload'></i>&nbsp; Cambiar fotografía", ['updatemiperfilfile', 'id' => $model->cong_codigo], ['class' => 'btn btn-green']) ?>
		</div>
    </div>

	<?php } ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cong_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cong_sector')->textInput(['maxlength' => true]) ?>



	<?php $dataCategory=ArrayHelper::map(EstadoCongregacion::find()->All(), 'econg_codigo', 'econg_nombre'); ?>
	  <?=	$form->field($model, 'econg_codigo')->dropDownList($dataCategory, 
             ['prompt'=>'-Seleccione un estado-',
              'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('post/lists?id=').'"+$(this).val(), function( data ) {
                  $( "select#title" ).html( data );
                });
            ']); 
	  ?>
	  
	  <?php $dataCategory=ArrayHelper::map(TipoCongregacion::find()->All(), 'tcong_codigo', 'tcong_nombre'); ?>
	  <?=	$form->field($model, 'tcong_codigo')->dropDownList($dataCategory, 
             ['prompt'=>'-Seleccione un tipo-',
              'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('post/lists?id=').'"+$(this).val(), function( data ) {
                  $( "select#title" ).html( data );
                });
            ']); 
	  ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

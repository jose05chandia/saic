<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\congregacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="congregacion-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],'action'=>$_SERVER['SCRIPT_NAME'].'/congregacion/updatemiperfilfile/'.$model->cong_codigo]); ?>

   
	
	<?= $form->field($modelUpload, 'imageFile')->fileInput(['id' => 'uploadFile'])->label('Imagen principal') ?>


				<script>        
					document.getElementById('uploadFile').onchange = function(){
			  			console.log(this.value);
			  			document.getElementById("not_imagen").value = document.getElementById('uploadFile').files[0].name;
					}
				</script>

				<?= $form->field($model, 'cong_fotografia')->hiddenInput(['id' => 'not_imagen'])->label(false) ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

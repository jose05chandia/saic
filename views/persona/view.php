<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\EstadoPersona;
use app\models\Cuenta;
use app\models\TipoPersona;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = $model->per_nombre1.' '. $model->per_nombre2.' '. $model->per_apellido_paterno.' '. $model->per_apellido_materno;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->pers_codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->pers_codigo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
	<div class="col-md-3">
		<img src="/saic/web/archivos/images/<?=(($model['per_fotografia'])?$model['per_fotografia']:'Unknown_Person.PNG')?>" alt="" class="img-responsive"/></div>
     
	 
	 <div class="col-md-4">
		<h3>Cuenta</h3>
		<?php
		$cuenta=Cuenta::find()->where('pers_codigo='.$model->pers_codigo)->one();
		if($cuenta){
			?>
			<h3><?=$model->per_nombre1.' '.$model->per_nombre2.' '.$model->per_apellido_paterno.' posee una cuenta de acceso.'?></h3>
			Su nombre de usuario es: <b><?=$cuenta->username?></b> y puedes editar su acceso desde aquí <?= Html::a("<i class='fa fa-pencil-square-o' aria-hidden='true'></i>", ['/cuenta/updatemiperfilsoporte', 'id' => $cuenta->id], ['class' => 'btn btn-link']) ?> 
			<?php
		}else{
			?>
			<div class="alert alert-danger">
			  <strong>Lo sentimos!</strong> <?=$model->per_nombre1.' '.$model->per_nombre2.' '.$model->per_apellido_paterno.' no posee una cuenta de acceso.'?>
			</div>
			
			<a href="#crear-cuenta"  data-toggle="modal" class="btn btn-green">
				<i class="fa fa-plus"></i>&nbsp; Crear cuenta
			</a>										
            
			<div id="crear-cuenta" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" data-dismiss="modal" aria-hidden="true" class="close">
								&times;
							</button>
							
							<h4 class="modal-title">
								Creando cuenta
							</h4>
						</div>
						
						<div class="modal-body">
							<?php
							$cuenta = new Cuenta();
							echo $this->render('/cuenta/createmodalcuenta', ['modelpersona' =>$model,'model' => $cuenta]);
							?>
						</div>
						
						<div class="modal-footer">
							<button type="button" data-dismiss="modal" class="center btn btn-default">
									Cerrar
							</button>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
     </div></div>
     </div>
	       

	 <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'pers_codigo',
            'pers_rut',
            'per_fecha_nacimiento',
            'per_fecha_bautismo',
            'per_nombre1',
            'per_nombre2',
            'per_apellido_paterno',
            'per_apellido_materno',
            'per_telefono',
            'per_celular',
            'per_email1:email',
            'per_email2:email',
            'per_direccion1',
            'per_direccion2',
            //'eper_codigo',
			[
                 'attribute' => 'eper_codigo',
                 'value' => EstadoPersona::find()->where('eper_codigo='.$model->eper_codigo)->One()->eper_nombre,
			],
            //'tper_codigo',
			[
                 'attribute' => 'tper_codigo',
                 'value' => TipoPersona::find()->where('tper_codigo='.$model->tper_codigo)->One()->tper_nombre,
			],
           // 'per_fotografia',
        ],
    ]) ?>
	
	 

</div>

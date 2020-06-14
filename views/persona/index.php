<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\EstadoPersona;
use app\models\TipoPersona;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear nueva', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	
	<div class="pull-right">
        <?= Html::a('Estados', ['/estado-persona'], ['class' => 'btn btn-info']) ?>
		<?= Html::a('Tipos', ['/tipo-persona'], ['class' => 'btn btn-info']) ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'pers_codigo',
            'pers_rut',
            'per_fecha_nacimiento',
            //'per_fecha_bautismo',
            'per_nombre1',
            //'per_nombre2',
             'per_apellido_paterno',
             'per_apellido_materno',
            // 'per_telefono',
             'per_celular',
             'per_email1:email',
            // 'per_email2:email',
            // 'per_direccion1',
            // 'per_direccion2',
            // 'eper_codigo',
			 [
                 'attribute' => 'eper_codigo',
                 'value' =>function($model){
								$e = EstadoPersona::find()
									->where(['eper_codigo' => $model->eper_codigo])
									->one();
								return $e->eper_nombre;
            
							},
			],
             //'tper_codigo',
			 [
                 'attribute' => 'tper_codigo',
                 'value' =>function($model){
								$e = TipoPersona::find()
									->where(['tper_codigo' => $model->tper_codigo])
									->one();
								return $e->tper_nombre;
            
							},
			],
            // 'per_fotografia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

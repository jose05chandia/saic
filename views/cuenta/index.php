<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\EstadoCuenta;
use app\models\Persona;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CuentaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cuentas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuenta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Cuenta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	
	<div class="pull-right">
        <?= Html::a('Estados', ['/estado-cuenta'], ['class' => 'btn btn-info']) ?>
		<?= Html::a('Rol', ['/rol'], ['class' => 'btn btn-info']) ?>
		<?= Html::a('Estado rol', ['/estado-rol-cuenta'], ['class' => 'btn btn-info']) ?>
    </div>

	
		
		
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
           // 'accessToken',
           // 'authKey',
            'username',
            'password',
           // 'ecu_codigo',
			[
                 'attribute' => 'ecu_codigo',
                 'value' =>function($model){
								$e = EstadoCuenta::find()
									->where(['ecu_codigo' => $model->ecu_codigo])
									->one();
								return $e->ecu_nombre;
            
							},
			],
           // 'pers_codigo',
			[
                 'attribute' => 'pers_codigo',
                 'value' =>function($model){
								$e = Persona::find()
									->where(['pers_codigo' => $model->pers_codigo])
									->one();
								return $e->per_nombre1.' '.$e->per_apellido_paterno;
            
							},
			],

				
			
			
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

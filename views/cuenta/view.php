<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Rol;
use app\models\RolCuenta;

/* @var $this yii\web\View */
/* @var $model app\models\Cuenta */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cuentas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$roles=Rol::find()->all();
$rolesAsignados=RolCuenta::find()->where('id='.$model->id)->all();

?>
<div class="cuenta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'accessToken',
            'authKey',
            'username',
            'password',
            'ecu_codigo',
            'pers_codigo',
        ],
    ]) ?>
	
	
	
									<div class="col-lg-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                Roles aisgnados</div>
                                            <div class="panel-body pan">
                                                
                                                <div class="form-body pal">
                                                   <?php
												   foreach($rolesAsignados as $ra=>$rolAsignado){
													   echo Rol::find()->where('rol_codigo='.$rolAsignado->rol_codigo)->one()->rol_nombre.' '.Html::a("<i class='fa fa-lock' aria-hidden='true'></i>", ['update', 'id' => $model->id], ['class' => 'btn btn-link']).'<br/>';
												   }
												   ?>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        </div>
										<div class="col-lg-6">
                                         <div class="panel panel-grey">
                                            <div class="panel-heading">
                                                Roles no asignados</div>
                                            <div class="panel-body pan">
                                                
                                                <div class="form-body pal">
                                                   <?php
												   foreach($roles as $r=>$rol){
													   foreach($rolesAsignados as $ra=>$rolAsignado){
														  if($rol->rol_codigo==$rolAsignado->rol_codigo){
															   unset($roles[$r]);
														  }
													   }
												   }
												   
												   
												   foreach($roles as $r=>$rol){
														echo $rol->rol_nombre.' '.Html::a("<i class='fa fa-plus' aria-hidden='true'></i>", ['update', 'id' => $model->id], ['class' => 'btn btn-link']).'<br/>';
												   }
												   ?>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

</div>

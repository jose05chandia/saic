<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


		


         
        

     
<div id="login">
        
        <div class="container"><h3 class="text-center text-white pt-5">Logo de SAIC </h3>
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" >
                    <div id="login-box" >
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                            <h3 class="text-center text-info">Acceso de usuario</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">RUT:</label><br>
                                <?= $form->field($model, 'username')->textInput(['class'=>'form-control','id'=>'username'],['autofocus' => true,'labelOptions' => [ 'style' => 'display: contents;' ]])->label("<i class='ace-icon fa fa-user'></i>")->label(false) ?>
								
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Contraseña:</label><br>
								 <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control','id'=>'password'])->label(false) ?>
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Recordar mi sesión</span> <span>
								 <?= $form->field($model, 'rememberMe')->checkbox(['id'=>'remember-me'])->label(false) ?>
								</span></label><br>
                                
								<?= Html::submitButton('Entrar', ['class' => 'btn btn-info btn-md', 'name' => 'login-button']) ?>
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="#" class="text-info">Olvidé mi contraseña</a>
                            </div>
                         <?php ActiveForm::end(); ?>
						 
						 
                    </div>
					<img width="40%" style="display: block;
  margin-left: auto;    margin-top: 2%;
  margin-right: auto;" src="/saic/web/archivos/images/Recurso 34@3x.png"/>
                </div>
            </div>
        </div>
    </div>





    
       

        

       

        
        
         

   



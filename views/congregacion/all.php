<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Congregacion;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CongregacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Congregaciones';
$this->params['breadcrumbs'][] = $this->title;
$congregaciones=Congregacion::find()->where('econg_codigo=1')->all();
?>
<div class="congregacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<div class="row mbl">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="mbs">
                                                    Nuestras <?=(sizeof($congregaciones))?> Congregaciones</h4>
                                                <p class="help-block">
                                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</p>
                                                
												
												
												<?php  
												if($congregaciones){
													foreach($congregaciones as $c=>$congregacion){
												?>
                                            <div class="col-lg-4">
                                                <div class="member-team"><img class="img-responsive" src="/saic/web/archivos/images/<?=(($congregacion->cong_fotografia)?$congregacion->cong_fotografia:'Unknown_Person.PNG')?>">

                                                    <h3><?=$congregacion->cong_nombre?>
                                                        <small>Sector: <?=$congregacion->cong_sector?></small>
                                                    </h3>
                                                    <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae.</p>
                                                    <ul class="social-icons list-unstyled list-inline mbl mtl">
                                                        <li><a class="facebook" href="#" data-hover="tooltip" data-original-title="facebook"><i class="fa fa-link"></i></a></li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                           
										   <?php
										   if($c==2){
											   
											   ?>
											   <div class="row mbl">
											   </div>
                                            <?php  
										   }
												}
												}
											?>
                                      
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
    
</div>

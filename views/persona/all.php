<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Persona;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CongregacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Miembros';
$this->params['breadcrumbs'][] = $this->title;
$personas=Persona::find()->where('eper_codigo=1')->all();
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
                                                    Nuestros <?=(sizeof($personas))?> miembros</h4>
                                                <p class="help-block">
                                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</p>
                                                
												
												
												<?php  
												if($personas){
													foreach($personas as $c=>$persona){
														if((($c)%3)==0){
															echo "<div class='row'></div>";
														}
												?>
												
                                            <div class="col-lg-4">
                                                <div class="member-team"><img src="/saic/web/archivos/images/<?=(($persona->per_fotografia)?$persona->per_fotografia:'Unknown_Person.PNG')?>" alt="" class="img-responsive"/>

                                                    <h3><?=$persona->per_nombre1. " ".$persona->per_nombre2." <br>".$persona->per_apellido_paterno. " ".$persona->per_apellido_materno ?>
                                                        <small>Sector: </small>
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

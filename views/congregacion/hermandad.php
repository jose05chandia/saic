<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Consultas;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CongregacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hermandad';
$this->params['breadcrumbs'][] = $this->title;
$personas=Consultas::obtenerMiembrosActivos();
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
                                                     <?=(sizeof($personas))?> hermanos y hermanas</h4>
                                                <p class="help-block">
                                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</p>
                                                
												
												
												
                                      
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
    
</div>

<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Cuenta;
use app\models\UploadForm;
use app\models\Persona;
$this->title = 'Mi perfil';
$this->params['breadcrumbs'][] = $this->title;
$cuentaModel=Cuenta::find()->where('id='.Yii::$app->user->identity->id)->one();
$personaModel=Persona::find()->where('pers_codigo='.$cuentaModel->pers_codigo)->one();
$personaModel2=Persona::find()->where('pers_codigo='.$cuentaModel->pers_codigo)->one();

?>
<div class="site-miperfil">
    <h1><?= Html::encode($this->title) ?></h1>

    <div id="tab-general">
                        <div class="row mbl">
                            <div class="col-lg-12">

                                            <div class="col-md-12">
                                                <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                                                </div>
                                            </div>

                            </div>

                            <div class="col-lg-12">


                              <div class="row">
                    <div class="col-md-12"><h2>Hermano/a: <?=$datosPersona['per_nombre1'].' '.$datosPersona['per_nombre2'].' '.$datosPersona['per_apellido_paterno'].' '.$datosPersona['per_apellido_materno']?></h2>

                        <div class="row mtl">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="text-center mbl"><img src="/saic/web/archivos/images/<?=(($datosPersona['per_fotografia'])?$datosPersona['per_fotografia']:'Unknown_Person.PNG')?>" alt="" class="img-responsive"/></div>
                                    <div class="text-center mbl">

										<a href="#cambiar-foto"  data-toggle="modal" class="btn btn-green">
											<i class="fa fa-upload"></i>&nbsp; Cambiar fotografía
										</a>

										<div id="cambiar-foto" class="modal fade">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" data-dismiss="modal" aria-hidden="true" class="close">
															&times;</button>
														<h4 class="modal-title">
															Cambiando fotografía</h4>
													</div>
													<div class="modal-body">
														<?php
														$modelUpload = new UploadForm();
														echo $this->render('/persona/updatemiperfilfile', ['model' => $personaModel2,'modelUpload' => $modelUpload]);
														?>
													</div>
													<div class="modal-footer">
														<button type="button" data-dismiss="modal" class="center btn btn-default">
															Cerrar</button>

													</div>
												</div>
											</div>
										</div>

									</div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Nombres</td>
                                        <td><?=$datosPersona['per_nombre1'].' '.$datosPersona['per_nombre2']?></td>
                                    </tr>
                                    <tr>
                                        <td>Apellidos</td>
                                        <td><?=$datosPersona['per_apellido_paterno'].' '.$datosPersona['per_apellido_materno']?></td>
                                    </tr>
                                    <tr>
                                        <td>Dirección principal</td>
                                        <td><?=$datosPersona['per_direccion1']?></td>
                                    </tr>
                                    <tr>
                                        <td>Estado</td>
                                        <td>
											<?php
											if($datosPersona['eper_codigo']==1){
											?>
											<span class="label label-success">Activo</span>
											<?php
											}
											if($datosPersona['eper_codigo']==2){
											?>
											<span class="label label-warning">Pasivo</span>
											<?php
											}
											if($datosPersona['eper_codigo']==3){
											?>
											<span class="label label-danger">Retirado</span>
											<?php
											}
											if($datosPersona['eper_codigo']==4){
											?>
											<span class="label label-info">Trasladado</span>
											<?php
											}
											?>
										</td>
                                    </tr>
                                    <tr>
                                        <td>Fecha nacimiento</td>
                                        <td><?=(($datosPersona['per_fecha_nacimiento'])?date("d-m-Y", strtotime($datosPersona['per_fecha_nacimiento'])):' N/A')?>
<?php
list($ano,$mes,$dia) = explode("-",$datosPersona['per_fecha_nacimiento']);
  $ano_diferencia  = date("Y") - $ano;
  $mes_diferencia = date("m") - $mes;
  $dia_diferencia   = date("d") - $dia;
  if ($dia_diferencia < 0 || $mes_diferencia < 0){
    $ano_diferencia--;
  }
echo " (".$ano_diferencia." años)";
 ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bautismo</td>
                                        <td><?=(($datosPersona['per_fecha_bautismo'])?date("d-m-Y", strtotime($datosPersona['per_fecha_bautismo'])):' N/A')?>
                                          <?php
                                          list($ano,$mes,$dia) = explode("-",$datosPersona['per_fecha_bautismo']);
                                            $ano_diferencia  = date("Y") - $ano;
                                            $mes_diferencia = date("m") - $mes;
                                            $dia_diferencia   = date("d") - $dia;
                                            if ($dia_diferencia < 0 || $mes_diferencia < 0){
                                              $ano_diferencia--;
                                            }
                                          echo " (".$ano_diferencia." años)";
                                           ?>
                                         </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-9">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab-edit" data-toggle="tab">Editar perfil</a></li>
                                    <!--<li><a href="#tab-messages" data-toggle="tab">Messages</a></li>-->
                                </ul>
                                <div id="generalTabContent" class="tab-content">
                                    <div id="tab-edit" class="tab-pane fade in active">





                                            <h3>Información personal</h3>

											<?php

											 echo $this->render('/persona/updatemiperfil', ['model' => $personaModel]);
											?>
											<hr/>

											<h3>Editar cuenta</h3>




											<?php

											 echo $this->render('/cuenta/updatemiperfil', ['model' => $cuentaModel]);
											?>

                                    </div>
                                    <div id="tab-messages" class="tab-pane fade in">
                                        <div class="row mbl">
                                            <div class="col-lg-6"><span style="margin-left: 15px"></span><input type="checkbox"/><a href="#" class="btn btn-success btn-sm mlm mrm"><i class="fa fa-send-o"></i>&nbsp;
                                                Write Mail</a><a href="#" class="btn btn-white btn-sm"><i class="fa fa-trash-o"></i>&nbsp;
                                                Delete</a></div>
                                            <div class="col-lg-6">
                                                <div class="input-group"><input type="text" class="form-control"/><span class="input-group-btn"><button type="button" class="btn btn-white">Search</button></span></div>
                                            </div>
                                        </div>
                                        <div class="list-group"><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star text-yellow mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                                class="badge">12:10 AM</span><span class="pull-right mrl"><span class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</span><span class="badge">12:10 AM</span><span class="pull-right mrl"><span class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span
                                                class="fa fa-star text-yellow mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</span><span
                                                class="badge">12:10 AM</span><span class="pull-right mrl"><span class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span class="badge">12:10 AM</span><span class="pull-right mrl"><span class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                                style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</span><span class="badge">12:10 AM</span><span class="pull-right mrl"><span
                                                class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</span><span
                                                class="badge">12:10 AM</span><span class="pull-right mrl"><span class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span class="badge">12:10 AM</span><span class="pull-right mrl"><span class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                                style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</span><span class="badge">12:10 AM</span><span class="pull-right mrl"><span
                                                class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</span><span
                                                class="badge">12:10 AM</span><span class="pull-right mrl"><span class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span class="badge">12:10 AM</span><span class="pull-right mrl"><span class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                                style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</span><span class="badge">12:10 AM</span><span class="pull-right mrl"><span
                                                class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</span><span
                                                class="badge">12:10 AM</span><span class="pull-right mrl"><span class="glyphicon glyphicon-paperclip"></span></span></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                                </div>




                        </div>
                    </div>
</div>

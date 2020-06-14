<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Cuenta;
use app\models\UploadForm;
use app\models\Persona;
$this->title = 'Diezmos y aportes';
$this->params['breadcrumbs'][] = $this->title;

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
                    <div class="col-md-12"><h2>ss</h2>

                        <div class="row mtl">
						
						
								  <div class="col-sm-6 col-md-6">
									<div class="thumbnail">
									  <img src="/saic/web/archivos/images/aporte.svg" width="150px" class="img-responsive" height alt="">
									  <div class="caption">
										<h3>Mi actividad en diezmo</h3>
										<p>...</p>
										<p>
											<a href="#historial-diezmo"  data-toggle="modal"  class="btn btn-primary" role="button">Historial mensual</a> 
											<div id="historial-diezmo" class="modal fade">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" data-dismiss="modal" aria-hidden="true" class="close">
																&times;</button>
															<h4 class="modal-title">
																Historial diezmo</h4>
														</div>
														<div class="modal-body">
															x
														</div>
														<div class="modal-footer">
															<button type="button" data-dismiss="modal" class="center btn btn-default">
																Cerrar</button>
															
														</div>
													</div>
												</div>
											</div>
											
											<a href="#estadisticas-diezmo"   data-toggle="modal" class="btn btn-info" role="button">Estadísticas </a>
											
											<div id="estadisticas-diezmo" class="modal fade">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" data-dismiss="modal" aria-hidden="true" class="close">
																&times;</button>
															<h4 class="modal-title">
																Estadísticas diezmo</h4>
														</div>
														<div class="modal-body">
															x
														</div>
														<div class="modal-footer">
															<button type="button" data-dismiss="modal" class="center btn btn-default">
																Cerrar</button>
															
														</div>
													</div>
												</div>
											</div>
											
											
											<a href="#notas-diezmo"  data-toggle="modal"  class="btn btn-success" role="button">Notas </a>
											
											<div id="notas-diezmo" class="modal fade">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" data-dismiss="modal" aria-hidden="true" class="close">
																&times;</button>
															<h4 class="modal-title">
																Notas diezmo</h4>
														</div>
														<div class="modal-body">
															x
														</div>
														<div class="modal-footer">
															<button type="button" data-dismiss="modal" class="center btn btn-default">
																Cerrar</button>
															
														</div>
													</div>
												</div>
											</div>
											
											
										</p>
									  </div>
									</div>
								  </div>

								  								  <div class="col-sm-6 col-md-6">
									<div class="thumbnail">
									  <img src="/saic/web/archivos/images/construccion.jpg"  width="150px" class="img-responsive"  alt="">
									  <div class="caption">
										<h3>Mi actividad en aporte pro-construcción</h3>
										<p>...</p>
										<p>
											<a href="#historial-construccion"  data-toggle="modal"   data-toggle="modal"  class="btn btn-primary" role="button">Historial mensual</a> 
											<div id="historial-construccion" class="modal fade">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" data-dismiss="modal" aria-hidden="true" class="close">
																&times;</button>
															<h4 class="modal-title">
																Historial construcción</h4>
														</div>
														<div class="modal-body">
															x
														</div>
														<div class="modal-footer">
															<button type="button" data-dismiss="modal" class="center btn btn-default">
																Cerrar</button>
															
														</div>
													</div>
												</div>
											</div>
											
											<a href="#estadisticas-construccion"   data-toggle="modal" class="btn btn-info" role="button">Estadísticas </a>
											
											<div id="estadisticas-construccion" class="modal fade">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" data-dismiss="modal" aria-hidden="true" class="close">
																&times;</button>
															<h4 class="modal-title">
																Estadísticas construcción</h4>
														</div>
														<div class="modal-body">
															x
														</div>
														<div class="modal-footer">
															<button type="button" data-dismiss="modal" class="center btn btn-default">
																Cerrar</button>
															
														</div>
													</div>
												</div>
											</div>
											
											
											<a href="#notas-construccion"   data-toggle="modal" class="btn btn-success" role="button">Notas </a>
											
											<div id="notas-construccion" class="modal fade">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" data-dismiss="modal" aria-hidden="true" class="close">
																&times;</button>
															<h4 class="modal-title">
																Notas construcción</h4>
														</div>
														<div class="modal-body">
															x
														</div>
														<div class="modal-footer">
															<button type="button" data-dismiss="modal" class="center btn btn-default">
																Cerrar</button>
															
														</div>
													</div>
												</div>
											</div>
											
											
										</p>
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

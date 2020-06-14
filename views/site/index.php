<?php

/* @var $this yii\web\View */
use app\models\Consultas;
use app\models\Congregacion;
use yii\helpers\Html;

$congregaciones=Congregacion::find()->where('econg_codigo=1')->all();
$miembros=Consultas::obtenerMiembrosActivos();
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div id="sum_box" class="row mbl">
                            <div class="col-sm-6 col-md-3">
                                <div class="panel profit db mbm">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class="icon fa fa-shopping-cart"></i>
                                        </p>
                                        <h4 class="value">
                                            <span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0">
                                            </span><span>$</span></h4>
                                        <p class="description">
                                            Profit description</p>
                                        <div class="progress progress-sm mbn">
                                            <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 80%;" class="progress-bar progress-bar-success">
                                                <span class="sr-only">80% Complete (success)</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
							
                                <?= Html::a("
								
								<div class='panel income db mbm'>
                                    <div class='panel-body'>
                                        <p class='icon'>
                                            <i class='icon fa fa-home'></i>
                                        </p>
                                        <h4 class='value'>
                                            <span>".(sizeof($congregaciones))."</span></h4>
                                        <p class='description'>
                                            Congregaciones</p>
                                        <div class='progress progress-sm mbn'>
                                            <div role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100'
                                                style='width: 100%;' class='progress-bar progress-bar-info'>
                                                <span class='sr-only'>100% Complete (success)</span></div>
                                        </div>
                                    </div>
                                </div>
								
								", ['/congregacion/all']) ?>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel task db mbm">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class="icon fa fa-book"></i>
                                        </p>
                                        <h4 class="value">
                                            <span>215</span></h4>
                                        <p class="description">
                                            Libros diferentes</p>
                                        <div class="progress progress-sm mbn">
                                            <div role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 100%;" class="progress-bar progress-bar-danger">
                                                <span class="sr-only">100% Complete (success)</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
							 <?= Html::a("
                                <div class='panel visit db mbm'>
                                    <div class='panel-body'>
                                        <p class='icon'>
                                            <i class='icon fa fa-group'></i>
                                        </p>
                                        <h4 class='value'>".
                                          sizeof($miembros)."</h4>
                                        <p class='description'>
                                            Miembros</p>
                                        <div class='progress progress-sm mbn'>
                                            <div role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100'
                                                style='width: 100%;' class='progress-bar progress-bar-warning'>
                                                <span class='sr-only'>100% Complete (success)</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							", ['/persona/all']) ?>
                        </div>
                        
                        <div class="row mbl">
                            <div class="col-lg-8">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4 class="mbs">
                                                    Network Performance</h4>
                                                <p class="help-block">
                                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</p>
                                                <div id="area-chart-spline" style="width: 100%; height: 300px">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h4 class="mbm">
                                                    Server Status</h4>
                                                <span class="task-item">CPU Usage (25 - 32 cpus)<small class="pull-right text-muted">40%</small><div
                                                    class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 40%;" class="progress-bar progress-bar-orange">
                                                        <span class="sr-only">40% Complete (success)</span></div>
                                                </div>
                                                </span><span>Memory Usage (2.5GB)<small class="pull-right text-muted">60%</small><div
                                                    class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 60%;" class="progress-bar progress-bar-blue">
                                                        <span class="sr-only">60% Complete (success)</span></div>
                                                </div>
                                                </span><span>Disk Usage (C:\ 120GB , D:\ 430GB)<small class="pull-right text-muted">55%</small><div
                                                    class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 55%;" class="progress-bar progress-bar-green">
                                                        <span class="sr-only">55% Complete (success)</span></div>
                                                </div>
                                                </span><span>Domain (2/5)<small class="pull-right text-muted">66%</small><div class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 66%;" class="progress-bar progress-bar-yellow">
                                                        <span class="sr-only">66% Complete (success)</span></div>
                                                </div>
                                                </span><span>Database (90/100)<small class="pull-right text-muted">90%</small><div
                                                    class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 90%;" class="progress-bar progress-bar-pink">
                                                        <span class="sr-only">90% Complete (success)</span></div>
                                                </div>
                                                </span><span>Email Account (25/50)<small class="pull-right text-muted">50%</small><div
                                                    class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 50%;" class="progress-bar progress-bar-violet">
                                                        <span class="sr-only">50% Complete (success)</span></div>
                                                </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="portlet box">
                                    <div class="portlet-header">
                                        <div class="caption">
                                            Próximos cumpleaños</div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="chat-scroller">
                                            <ul class="chats">
											
											<?php
											if($miembros){
												foreach($miembros as $m=>$miembro){
												echo $miembro->per_fecha_nacimiento;
											?>
                                                <li class="in">
                                                    <img src="/saic/web/archivos/images/<?=(($miembro->per_fotografia)?$miembro->per_fotografia:'Unknown_Person.PNG')?>" width="50px"class="avatar img-responsive" />
                                                    <div class="message">
                                                        <span class="chat-arrow"></span><a href="#" class="chat-name">El xx/xx/xxxx</a>&nbsp;<span
                                                            class="chat-datetime">(en x días)</span><span class="chat-body"><?=$miembro->per_nombre1." ".$miembro->per_nombre2." ".$miembro->per_apellido_paterno?> cumple xx años.</span></div>
                                                </li>
                                                <li class="out">
                                                    <img src="images/avatar/48.jpg" class="avatar img-responsive" />
                                                    <div class="message">
                                                         <span class="chat-arrow"></span><a href="#" class="chat-name">El xx/xx/xxxx</a>&nbsp;<span
                                                            class="chat-datetime">(en x días)</span><span class="chat-body">xx cumple xx años.</span></div>
                                                </li>
												
											<?php
												}
											}
												
											?>
                                                
                                            </ul>
                                        </div>
                                        <div class="chat-form">
                                            <div class="input-group">
                                                <input id="input-chat" type="text" placeholder="Type a message here..." class="form-control" /><span
                                                    id="btn-chat" class="input-group-btn">
                                                    <button type="button" class="btn btn-green">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mbl">
                            <div class="col-lg-4">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="profile">
                                            <div style="margin-bottom: 15px" class="row">
                                                <div class="col-xs-12 col-sm-8">
                                                    <h2>
                                                        John Doe</h2>
                                                    <p>
                                                        <strong>About:</strong> Web Designer / UI.</p>
                                                    <p>
                                                        <strong>Hobbies:</strong> Read, out with friends, listen to music, draw and learn
                                                        new things.</p>
                                                    <p>
                                                        <strong class="mrs">Skills:</strong><span class="label label-green mrs">html5</span><span
                                                            class="label label-green mrs">css3</span><span class="label label-green mrs">jquery</span></p>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 text-center">
                                                    <figure><img src="images/avatar/128.jpg" alt="" style="display: inline-block" class="img-responsive img-circle"/>
                                                    <figcaption class="ratings"><p><a href="#"><span class="fa fa-star"></span></a><a href="#"><span class="fa fa-star"></span></a><a href="#"><span class="fa fa-star"></span></a><a href="#"><span class="fa fa-star"></span></a><a href="#"><span class="fa fa-star-o"></span></a></p></figcaption>
                                                </figure>
                                                </div>
                                            </div>
                                            <div class="row text-center divider">
                                                <div class="col-xs-12 col-sm-4 emphasis">
                                                    <h2>
                                                        <strong>20,7K</strong></h2>
                                                    <p>
                                                        <small>Followers</small>
                                                    </p>
                                                    <button class="btn btn-yellow btn-block">
                                                        <span class="fa fa-plus-circle"></span>&nbsp; Follow
                                                    </button>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 emphasis">
                                                    <h2>
                                                        <strong>245</strong></h2>
                                                    <p>
                                                        <small>Following</small>
                                                    </p>
                                                    <button class="btn btn-blue btn-block">
                                                        <span class="fa fa-user"></span>&nbsp; Profile
                                                    </button>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 emphasis">
                                                    <h2>
                                                        <strong>43</strong></h2>
                                                    <p>
                                                        <small>Snippets</small>
                                                    </p>
                                                    <div class="btn-group dropup">
                                                        <button type="button" data-toggle="dropdown" class="btn btn-orange dropdown-toggle">
                                                            <span class="fa fa-gear"></span>&nbsp; Options
                                                        </button>
                                                        <ul role="menu" class="dropdown-menu pull-right text-left">
                                                            <li><a href="#"><span class="fa fa-envelope"></span>&nbsp; Send an email</a></li>
                                                            <li><a href="#"><span class="fa fa-list"></span>&nbsp; Add or remove from a list</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><span class="fa fa-warning"></span>&nbsp; Report this user for spam</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#" role="button" class="btn disabled">Unfollow</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="portlet box">
                                    <div class="portlet-header">
                                        <div class="caption">
                                            Todo List</div>
                                    </div>
                                    <div style="overflow: hidden;" class="portlet-body">
                                        <ul class="todo-list sortable">
                                            <li class="clearfix"><span class="drag-drop"><i></i></span>
                                                <div class="todo-check pull-left">
                                                    <input type="checkbox" value="" /></div>
                                                <div class="todo-title">
                                                    Sed ut perspiciatis unde omnis iste</div>
                                                <div class="todo-actions pull-right clearfix">
                                                    <a href="#" class="todo-complete"><i class="fa fa-check"></i></a><a href="#" class="todo-edit">
                                                        <i class="fa fa-edit"></i></a><a href="#" class="todo-remove"><i class="fa fa-trash-o">
                                                        </i></a>
                                                </div>
                                            </li>
                                            <li class="clearfix"><span class="drag-drop"><i></i></span>
                                                <div class="todo-check pull-left">
                                                    <input type="checkbox" value="" /></div>
                                                <div class="todo-title">
                                                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</div>
                                                <div class="todo-actions pull-right clearfix">
                                                    <a href="#" class="todo-complete"><i class="fa fa-check"></i></a><a href="#" class="todo-edit">
                                                        <i class="fa fa-edit"></i></a><a href="#" class="todo-remove"><i class="fa fa-trash-o">
                                                        </i></a>
                                                </div>
                                            </li>
                                            <li class="clearfix"><span class="drag-drop"><i></i></span>
                                                <div class="todo-check pull-left">
                                                    <input type="checkbox" value="" /></div>
                                                <div class="todo-title">
                                                    Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo
                                                    minus id</div>
                                                <div class="todo-actions pull-right clearfix">
                                                    <a href="#" class="todo-complete"><i class="fa fa-check"></i></a><a href="#" class="todo-edit">
                                                        <i class="fa fa-edit"></i></a><a href="#" class="todo-remove"><i class="fa fa-trash-o">
                                                        </i></a>
                                                </div>
                                            </li>
                                            <li class="clearfix"><span class="drag-drop"><i></i></span>
                                                <div class="todo-check pull-left">
                                                    <input type="checkbox" value="" /></div>
                                                <div class="todo-title">
                                                    Et harum quidem rerum facilis est</div>
                                                <div class="todo-actions pull-right clearfix">
                                                    <a href="#" class="todo-complete"><i class="fa fa-check"></i></a><a href="#" class="todo-edit">
                                                        <i class="fa fa-edit"></i></a><a href="#" class="todo-remove"><i class="fa fa-trash-o">
                                                        </i></a>
                                                </div>
                                            </li>
                                            <li class="clearfix"><span class="drag-drop"><i></i></span>
                                                <div class="todo-check pull-left">
                                                    <input type="checkbox" value="" /></div>
                                                <div class="todo-title">
                                                    Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet</div>
                                                <div class="todo-actions pull-right clearfix">
                                                    <a href="#" class="todo-complete"><i class="fa fa-check"></i></a><a href="#" class="todo-edit">
                                                        <i class="fa fa-edit"></i></a><a href="#" class="todo-remove"><i class="fa fa-trash-o">
                                                        </i></a>
                                                </div>
                                            </li>
                                            <li class="clearfix"><span class="drag-drop"><i></i></span>
                                                <div class="todo-check pull-left">
                                                    <input type="checkbox" value="" /></div>
                                                <div class="todo-title">
                                                    Excepteur sint occaecat cupidatat non proident</div>
                                                <div class="todo-actions pull-right clearfix">
                                                    <a href="#" class="todo-complete"><i class="fa fa-check"></i></a><a href="#" class="todo-edit">
                                                        <i class="fa fa-edit"></i></a><a href="#" class="todo-remove"><i class="fa fa-trash-o">
                                                        </i></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
    
</div>

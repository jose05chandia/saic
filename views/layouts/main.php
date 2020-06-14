

<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Persona;
use app\models\Consultas;
use kartik\widgets\Growl;
use app\models\Rol;

use app\models\Tipocuenta;

AppAsset::register($this);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>


<?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
            <?php
            
            echo Growl::widget([
                'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
                'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
                'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
                'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
                'showSeparator' => true,
                'delay' => 1, //This delay is how long before the message shows
                'pluginOptions' => [
                    'delay' => (!empty($message['duration'])) ? $message['duration'] : 3000, //This delay is how long the message shows for
                    'placement' => [
                        'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
                        'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
                    ]
                ]
            ]);
            ?>
        <?php endforeach; ?>

<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>


    <div>
        <!--BEGIN THEME SETTING
        <div id="theme-setting">
            <a href="#" data-toggle="dropdown" data-step="1" data-intro="&lt;b&gt;Many styles&lt;/b&gt; and &lt;b&gt;colors&lt;/b&gt; be created for you. Let choose one and enjoy it!"
                data-position="left" class="btn-theme-setting"><i class="fa fa-cog"></i></a>
            <div class="content-theme-setting">
                <select id="list-style" class="form-control">
                    <option value="style1">Flat Squared style</option>
                    <option value="style2">Flat Rounded style</option>
                    <option value="style3" selected="selected">Flat Border style</option>
                </select>
            </div>
        </div>-->
        <!--END THEME SETTING-->
        <!--BEGIN BACK TO TOP-->
        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
        <!--END BACK TO TOP-->
        <!--BEGIN TOPBAR-->
        <div id="header-topbar-option-demo" class="page-header-topbar">
            <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" href="/saic/web" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text"><?= Yii::$app->name ?></span><span style="display: none" class="logo-text-icon">µ</span></a></div>

             
            <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
                <?php
                if(!Yii::$app->user->isGuest){
                ?>
                <!--<form id="topbar-search" action="" method="" class="hidden-sm hidden-xs">
                    <div class="input-icon right text-white"><a href="#"><i class="fa fa-search"></i></a><input type="text" placeholder="Busca aquí..." class="form-control text-white"/></div>
                </form>-->
                <div class="news-update-box hidden-xs"><span class="text-uppercase mrm pull-left text-white">News:</span>
                    <ul id="news-update" class="ticker list-unstyled" >
                        <li>Aquí te mostramos noticias o información básica.</li>
                        <li>Te mostramos información relevante acerca de cambios de acciones.</li>
                    </ul>
                </div>
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    <!--<li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-bell fa-fw"></i><span class="badge badge-green">3</span></a>
                        
                    </li>
                    <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-envelope fa-fw"></i><span class="badge badge-orange">7</span></a>
                        
                    </li>
                    <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-tasks fa-fw"></i><span class="badge badge-yellow">8</span></a>
                        
                    </li>
					-->
					<?php $persona=Persona::find()->where('pers_rut='.Yii::$app->user->identity->username)->one(); ?>
                    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="/saic/web/archivos/images/<?=$persona->per_fotografia?>" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs"><?=$persona->per_nombre1.' '.$persona->per_nombre2?></span>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                            
                            <li>
                                <?= Html::a('<i class="fa fa-user"></i>
                                     Mi perfil'
                                   , ['/site/miperfil'])?>                                        
                            </li>
                         
                            <li class="divider"></li>
                          
                           
                            <?php 

                            echo '<li>'
                                    . Html::beginForm(['/site/logout'], 'post')
                                    . Html::submitButton(
                                    '<div ><i class="ace-icon fa fa-power-off"></i> Salir</div>',
                                    ['class' => 'btn btn-link logout']
                                               )
                                    . Html::endForm()
                                    .'
                                    </li>';
                            ?>
                        </ul>
                    </li>
                    <!--<li id="topbar-chat" class="hidden-xs"><a href="javascript:void(0)" data-step="4" data-intro="&lt;b&gt;Form chat&lt;/b&gt; keep you connecting with other coworker" data-position="left" class="btn-chat"><i class="fa fa-comments"></i><span class="badge badge-info">3</span></a></li>-->
                </ul>  <?php } ?>
            </div>

          
        </nav>
		<!--<a href="#modal-config" data-toggle="modal">s</a>
            
            <div id="modal-config" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">
                                &times;</button>
                            <h4 class="modal-title">
                                Modal title</h4>
                        </div>
                        <div class="modal-body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend et nisl eget
                                porta. Curabitur elementum sem molestie nisl varius, eget tempus odio molestie.
                                Nunc vehicula sem arcu, eu pulvinar neque cursus ac. Aliquam ultricies lobortis
                                magna et aliquam. Vestibulum egestas eu urna sed ultricies. Nullam pulvinar dolor
                                vitae quam dictum condimentum. Integer a sodales elit, eu pulvinar leo. Nunc nec
                                aliquam nisi, a mollis neque. Ut vel felis quis tellus hendrerit placerat. Vivamus
                                vel nisl non magna feugiat dignissim sed ut nibh. Nulla elementum, est a pretium
                                hendrerit, arcu risus luctus augue, mattis aliquet orci ligula eget massa. Sed ut
                                ultricies felis.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">
                                Close</button>
                            <button type="button" class="btn btn-primary">
                                Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--END MODAL CONFIG PORTLET-->
        </div>
        <!--END TOPBAR-->
        <div id="wrapper">
            <!--BEGIN SIDEBAR MENU-->
            <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
                data-position="right" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <?php
                if(!Yii::$app->user->isGuest){
                ?>

                <ul id="side-menu" class="nav">
                    
                     <div class="clearfix"></div>
                    <li class="active"><a href="/saic/web"><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Dashboard</span></a></li>
					
					<li class=" hover">
                        <?= Html::a('<i class="menu-icon fa fa-user "></i>
                                     <span class="menu-title">Mi perfil </span>'
                                   , ['/site/miperfil'])?>                                        
                    </li>
					<li class=" hover">
                        <?= Html::a('<i class="menu-icon fa fa-user "></i>
                                     <span class="menu-title">Congregaciones</span>'
                                   , ['/congregacion/all'])?>                                        
                    </li>

					<?php if(\Yii::$app->session->get('rol')==1 || \Yii::$app->session->get('rol')==2){ ?>

						<li class=" hover">
							<?= Html::a('<i class="menu-icon fa fa-users"></i>
										 <span class="menu-title">Personas </span>'
									   , ['/persona'])?>                                        
						</li>

						

						<li class=" hover">
							<?= Html::a('<i class="menu-icon fa fa-key"></i>
										 <span class="menu-title">Cuentas </span>'
									   , ['/cuenta'])?>                                        
						</li>

						<li class=" hover">
							<?= Html::a('<i class="menu-icon fa fa-key"></i>
										 <span class="menu-title">Congregaciones </span>'
									   , ['/congregacion'])?>                                        
						</li>
					
					<?php	 } ?>
                    
                    
                    <?php
                    //if(!Yii::$app->user->isGuest){
                        //Si es MIEMBRO
                      //  if(Yii::$app->user->identity->tcu_codigo==3){
                    ?>
                    

					<!-- <li class=" hover">
                        <?= Html::a('<i class="menu-icon fa fa-slack "></i>
                                     <span class="menu-title">Diezmos y aportes </span>'
                                   , ['/site/diezmosyaportes'])?>                                        
                    </li>
					
					<li class=" hover">
                        <?= Html::a('<i class="menu-icon fa fa-slack "></i>
                                     <span class="menu-title">Discipulado </span>'
                                   , ['/site/discipulado'])?>                                        
                    </li>
					-->
                    <?php
                    //    }
                    //}   
                    ?>

                </ul>

                <?php } ?>
            </div>
        </nav>
            <!--END SIDEBAR MENU-->
            <!--BEGIN CHAT FORM-->
            <div id="chat-form" class="fixed">
                <div class="chat-inner">
                    <h2 class="chat-header">
                        <a href="javascript:;" class="chat-form-close pull-right"><i class="glyphicon glyphicon-remove">
                        </i></a><i class="fa fa-user"></i>&nbsp; Chat &nbsp;<span class="badge badge-info">3</span></h2>
                    <div id="group-1" class="chat-group">
                        <strong>Favorites</strong><a href="#"><span class="user-status is-online"></span> <small>
                            Verna Morton</small> <span class="badge badge-info">2</span></a><a href="#"><span
                                class="user-status is-online"></span> <small>Delores Blake</small> <span class="badge badge-info is-hidden">
                                    0</span></a><a href="#"><span class="user-status is-busy"></span> <small>Nathaniel Morris</small>
                                        <span class="badge badge-info is-hidden">0</span></a><a href="#"><span class="user-status is-idle"></span>
                                            <small>Boyd Bridges</small> <span class="badge badge-info is-hidden">0</span></a><a
                                                href="#"><span class="user-status is-offline"></span> <small>Meredith Houston</small>
                                                <span class="badge badge-info is-hidden">0</span></a></div>
                    <div id="group-2" class="chat-group">
                        <strong>Office</strong><a href="#"><span class="user-status is-busy"></span> <small>
                            Ann Scott</small> <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                                class="user-status is-offline"></span> <small>Sherman Stokes</small> <span class="badge badge-info is-hidden">
                                    0</span></a><a href="#"><span class="user-status is-offline"></span> <small>Florence
                                        Pierce</small> <span class="badge badge-info">1</span></a></div>
                    <div id="group-3" class="chat-group">
                        <strong>Friends</strong><a href="#"><span class="user-status is-online"></span> <small>
                            Willard Mckenzie</small> <span class="badge badge-info is-hidden">0</span></a><a
                                href="#"><span class="user-status is-busy"></span> <small>Jenny Frazier</small>
                                <span class="badge badge-info is-hidden">0</span></a><a href="#"><span class="user-status is-offline"></span>
                                    <small>Chris Stewart</small> <span class="badge badge-info is-hidden">0</span></a><a
                                        href="#"><span class="user-status is-offline"></span> <small>Olivia Green</small>
                                        <span class="badge badge-info is-hidden">0</span></a></div>
                </div>
                <div id="chat-box" style="top: 400px">
                    <div class="chat-box-header">
                        <a href="#" class="chat-box-close pull-right"><i class="glyphicon glyphicon-remove">
                        </i></a><span class="user-status is-online"></span><span class="display-name">Willard
                            Mckenzie</span> <small>Online</small>
                    </div>
                    <div class="chat-content">
                        <ul class="chat-box-body">
                            <li>
                                <p>
                                    <img src="/saic/web/images/avatar/128.jpg" class="avt" /><span class="user">John Doe</span><span
                                        class="time">09:33</span></p>
                                <p>
                                    Hi Swlabs, we have some comments for you.</p>
                            </li>
                            <li class="odd">
                                <p>
                                    <img src="images/avatar/48.jpg" class="avt" /><span class="user">Swlabs</span><span
                                        class="time">09:33</span></p>
                                <p>
                                    Hi, we're listening you...</p>
                            </li>
                        </ul>
                    </div>
                    <div class="chat-textarea">
                        <input placeholder="Type your message" class="form-control" /></div>
                </div>
            </div>
            <!--END CHAT FORM-->
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                <?php if(!Yii::$app->user->isGuest){ ?>
                    <div class="page-header pull-left">
                        <div class="page-title">
                            </div>
                            <?php
                            $roles=Consultas::getRolesPorId(Yii::$app->user->identity->id);
                            

                            ?>



                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-success">
                                    <?php if(!Yii::$app->user->isGuest){
                                        
                                        if(\Yii::$app->session->get('rol')){
                                            $rol=Rol::find()->where('rol_codigo='.\Yii::$app->session->get('rol'))->one();
                                            echo $rol->rol_nombre;
                                        }
                                    }

                                    ?></button>
                                    <?php if(sizeof($roles)>1){ ?>
                                <button type="button" class="btn btn-xs  btn-success dropdown-toggle" data-toggle="dropdown">
                                  <span class="caret"></span>
                                  <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                
                                <ul class="dropdown-menu" role="menu">
                                    <?php foreach($roles as $r=>$rol){ ?>
                                      <li>
<?= Html::a('
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                            <span class="menu-text"> '.$rol['rol_nombre'].' </span>'
                            , ['site/selectrol/', 'rol' =>$rol['rol_codigo'] ]) 
								?>  </li>
                                   
                                    <?php } ?>
                                </ul>

                                <?php } ?>
                            </div>




                    </div>

                    <?php } ?>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?></li>
                       
                    </ol>

                    <div class="clearfix">
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->
                <div class="page-content">
                    <div id="tab-general">
                    
                    <div class="col-sm-12" style="padding: 0px 0px 100px 0px;">    <?=$content?></div>

                        
                    </div>
                </div>
                <!--END CONTENT-->
                <!--BEGIN FOOTER-->
                <div id="footer">
                    <div class="copyright">
                        <a href="http://www.laiglesiadecristo.cl" class="col-xs-4 col-sm-4 col-lg-4" target="_blank">SAIC <?=date("Y")?> © Iglesia de Cristo, San Carlos</a>    
						
						

						<b><div id="clockk2" class="clockk2 col-xs-3 col-sm-3 col-lg-3"></div><div id="clockk" class="clockk col-xs-3 col-sm-3 col-lg-3">cargando ...</div></b>
					

		
						
					</div>
                </div>
                <!--END FOOTER-->
            </div>
            <!--END PAGE WRAPPER-->
        </div>
    </div>




<script>        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-145464-12', 'auto');
        ga('send', 'pageview');


</script>

<script>       
function clock(){

//Save the times in variables

var today = new Date();


var day = today.getDate();
var month = today.getMonth()+1;
var year = today.getFullYear();

var hours = today.getHours();
var minutes = today.getMinutes();
var seconds = today.getSeconds();


//Set the AM or PM time

if (hours >= 12){
  meridiem = " PM";
}
else {
  meridiem = " AM";
}


//convert hours to 12 hour format and put 0 in front
if (hours>12){
	hours = hours - 12;
}
else if (hours===0){
	hours = 12;	
}

//Put 0 in front of single digit minutes and seconds

if (minutes<10){
	minutes = "0" + minutes;
}
else {
	minutes = minutes;
}

if (seconds<10){
	seconds = "0" + seconds;
}
else {
	seconds = seconds;
}


document.getElementById("clockk").innerHTML = (hours + ":" + minutes + ":" + seconds + meridiem);
document.getElementById("clockk2").innerHTML = (day + "/" + month + "/" + year);

}


setInterval('clock()', 1000);



</script>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>










                                                    



                                    

                        
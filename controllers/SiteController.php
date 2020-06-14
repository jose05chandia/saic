<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Rol;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','about','contact','index'],
                'rules' => [
                    [
                        'actions' => ['logout','about','contact','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionWord()
    {
        return $this->render('word');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {



           $connection=\Yii::$app->db;
            $query = $connection->createCommand('select rc.rol_codigo
            from saic.cuenta c
            JOIN saic.rol_cuenta rc
            on rc.id=c.id
            where c.id='.Yii::$app->user->identity->id.'
            LIMIT 1');        


            $datosPersona = $query->queryOne();
             \Yii::$app->session->set('rol',$datosPersona['rol_codigo']);

        	Yii::$app->getSession()->setFlash('success', [
				 'type' => 'success',
				 'duration' => 5000,
				 'icon' => 'fa fa-users',				 
				 'title' => 'Bienvenid@ '.Yii::$app->user->identity->username,
				 'message' => 'Tu sesión ha sido iniciada exitosamente.',
				 'positonY' => 'bottom',
				 'positonX' => 'right'
			 ]);
            return $this->goBack();
        }
		 $this->layout = 'mainLogin';
        return $this->render('login', [
		
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->getSession()->setFlash('success', [
				 'type' => 'success',
				 'duration' => 5000,
				 'icon' => 'fa fa-users',				 
				 'title' => 'Hasta pronto ',
				 'message' => 'Tu sesión ha sido cerrada exitosamente.',
				 'positonY' => 'bottom',
				 'positonX' => 'right'
			 ]);
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
	
	public function actionDiscipulado()
    {
        return $this->render('discipulado');
    }
	
	
	 public function actionDiezmosyaportes()
    {
        return $this->render('diezmosyaportes');
    }
	
	
    public function actionMiperfil(){
        //modelo de la persona logueada
        if(Yii::$app->user->isGuest){
            return $this->redirect('/site/login');
        }
        $connection=\Yii::$app->db;
        $query = $connection->createCommand('select p.*
        from saic.cuenta c
        JOIN saic.persona p
        on c.pers_codigo=p.pers_codigo
        where c.id='.Yii::$app->user->identity->id);        
        $datosPersona = $query->queryOne();

        
        return $this->render('miperfil', [
            'datosPersona' => $datosPersona,
        ]);
    }



    public  function actionSelectrol($rol)
    {
        
        \Yii::$app->session->set('rol',$rol);
         $rol=Rol::find()->where('rol_codigo='.\Yii::$app->session->get('rol'))->one();
       
        Yii::$app->getSession()->setFlash('success', [
                 'type' => 'success',
                 'duration' => 5000,
                 'icon' => 'fa fa-users',
                 'title' => 'Has cambiado de rol a '. $rol->rol_nombre,
                 'message' => 'Rol cambiado exitosamente.',
                 'positonY' => 'bottom',
                 'positonX' => 'right'
             ]);
        
        return $this->goHome();
    }
}

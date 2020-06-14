<?php

namespace app\controllers;

use Yii;
use app\models\Cuenta;
use app\models\CuentaSearch;
use app\models\Persona;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessRule;
use yii\filters\AccessControl;
/**
 * CuentaController implements the CRUD actions for Cuenta model.
 */
class CuentaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
		'access' => [
                'class' => AccessControl::className(),
				// agregamos la nueva clase AccessRule 
				'ruleConfig' => [
					'class' => AccessRule::className(),
				],
                'only' => ['index','view','update','create'],
				
                'rules' => [
					[
                        'actions' => ['index','view','update','create'],						
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
							if(!Yii::$app->user->identity){return false;}
							if($_SESSION['rol']==1){return true;}			  
                        }
                    ],
                ],
           ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cuenta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CuentaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cuenta model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cuenta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cuenta();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$hash = mhash (MHASH_SHA1, $model->password);
            $hex_hash = bin2hex ($hash);
			$model->password=base64_encode($hash);
		
			$model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionCreatemodalcuenta()
    {
        $model = new Cuenta();
        $modelpersona = new Persona();
	
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$hash = mhash (MHASH_SHA1, $model->password);
            $hex_hash = bin2hex ($hash);
			$model->password=base64_encode($hash);
		
			$model->save();
            return $this->redirect(['/persona', 'id' => $modelpersona->pers_codigo]);
        } else {
            return $this->render('createmodalcuenta', [
                'model' => $model,
                'modelpersona' => $modelpersona,
            ]);
        }
    }

    /**
     * Updates an existing Cuenta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$hash = mhash (MHASH_SHA1, $model->password);
            $hex_hash = bin2hex ($hash);
			$model->password=base64_encode($hash);
		
			$model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
	
	
	
	 public function actionUpdatemiperfil($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
			$hash = mhash (MHASH_SHA1, $model->nueva);
            $hex_hash = bin2hex ($hash);
			$model->nueva=base64_encode($hash);
			
			$hash1 = mhash (MHASH_SHA1, $model->repeticion);
            $hex_hash1 = bin2hex ($hash1);
			$model->repeticion=base64_encode($hash1);
			
			$model->password=$model->nueva;
			if($model->save()){
			Yii::$app->getSession()->setFlash('success', [
				'type' => 'success',
				'duration' => 5000,
				'icon' => 'fa fa-users',
				'title' => 'Cambios guardados',
				'message' => 'Datos almacenados exitosamente.',
				'positonY' => 'bottom',
				'positonX' => 'right'
			]);
            return $this->redirect(['/site/miperfil']);
			
		}else{
					Yii::$app->getSession()->setFlash('danger', [
					'type' => 'danger',
					'duration' => 5000,
					'icon' => 'fa fa-users',
					'title' => 'No se guardaron los cambios.',
					'message' => 'Intenta más tarde.',
					'positonY' => 'bottom',
					'positonX' => 'right'
				]);
				return $this->render('updatemiperfil', [
					'model' => $model,
				]);
			}
        } else {
			
            return $this->render('updatemiperfil', [
                'model' => $model,
            ]);
        }
    }
	
	
	public function actionUpdatemiperfilsoporte($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
			$hash = mhash (MHASH_SHA1, $model->nueva);
            $hex_hash = bin2hex ($hash);
			$model->nueva=base64_encode($hash);
			
			$hash1 = mhash (MHASH_SHA1, $model->repeticion);
            $hex_hash1 = bin2hex ($hash1);
			$model->repeticion=base64_encode($hash1);
			
			$model->password=$model->nueva;
			if($model->save()){
			Yii::$app->getSession()->setFlash('success', [
				'type' => 'success',
				'duration' => 5000,
				'icon' => 'fa fa-users',
				'title' => 'Cambios guardados',
				'message' => 'Datos almacenados exitosamente.',
				'positonY' => 'bottom',
				'positonX' => 'right'
			]);
            return $this->redirect(['/site/miperfil']);
			
		}else{
					Yii::$app->getSession()->setFlash('danger', [
					'type' => 'danger',
					'duration' => 5000,
					'icon' => 'fa fa-users',
					'title' => 'No se guardaron los cambios.',
					'message' => 'Intenta más tarde.',
					'positonY' => 'bottom',
					'positonX' => 'right'
				]);
				return $this->render('updatemiperfilsoporte', [
					'model' => $model,
				]);
			}
        } else {
			
            return $this->render('updatemiperfilsoporte', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Cuenta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cuenta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cuenta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cuenta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

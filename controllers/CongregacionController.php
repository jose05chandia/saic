<?php

namespace app\controllers;

use Yii;
use app\models\Congregacion;
use app\models\CongregacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\filters\AccessRule;
use app\models\UploadForm;
use yii\web\UploadedFile;
/**
 * CongregacionController implements the CRUD actions for Congregacion model.
 */
class CongregacionController extends Controller
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
     * Lists all Congregacion models.
     * @return mixed
     */
	 
	 
	 	public function actionUpdatemiperfilfile($id)
    {
        $model = $this->findModel($id);
		$modelUpload=new UploadForm();
        if ($model->load(Yii::$app->request->post())) {
			
			$modelUpload->imageFile = UploadedFile::getInstance($modelUpload, 'imageFile');
             $folder='archivos/images/';
			//$model->per_fotografia=$modelUpload->imageFile->getBaseName();
			
			
			$stepImg=$modelUpload->imageFile->name;
			while (file_exists($folder.$stepImg)) {
									
				$path_parts = pathinfo($stepImg);
				
				$nom=$path_parts['filename'];
				$ext=$path_parts['extension'];
				$stepImg=$nom.'(1).'.$ext;
			}
			$modelUpload->imageFile->name=$stepImg;
            if ($modelUpload->upload($folder)) {
			
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
					return $this->redirect(['/congregacion/'.$id]);
			
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
						return $this->render('updatemiperfilfile', [
							'model' => $model,
							'modelUpload' => $modelUpload,
						]);
					}
			}else{
				Yii::$app->getSession()->setFlash('danger', [
					'type' => 'danger',
					'duration' => 5000,
					'icon' => 'fa fa-users',
					'title' => 'No se subió la fotografía.',
					'message' => 'Intenta más tarde.',
					'positonY' => 'bottom',
					'positonX' => 'right'
				]);
				return $this->render('updatemiperfilfile', [
					'model' => $model,
					'modelUpload' => $modelUpload,
				]);
				
			}
        } else {
			
            return $this->render('updatemiperfilfile', [
                'model' => $model,
                'modelUpload' => $modelUpload,
            ]);
        }
    }

	
	
    public function actionIndex()
    {
        $searchModel = new CongregacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Congregacion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
	public function actionAll()
    {
        return $this->render('all');
    }
	public function actionHermandad()
    {
        return $this->render('hermandad');
    }

    /**
     * Creates a new Congregacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Congregacion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cong_codigo]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Congregacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cong_codigo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Congregacion model.
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
     * Finds the Congregacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Congregacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Congregacion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

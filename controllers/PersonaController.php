<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;

use app\models\Persona;
use app\models\Cuenta;
use app\models\PersonaSearch;
use app\models\UploadForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * PersonaController implements the CRUD actions for Persona model.
 */
class PersonaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
		'access' => [
                'class' => AccessControl::className(),
                'only' => ['view','delete','update','create','index'],
                'rules' => [
                    [
                        'actions' => ['view','delete','update','create','index'],
                        'allow' => true,
                        'roles' => ['@'],
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

	
	public function actionAll()
    {
        return $this->render('all');
    }
    /**
     * Lists all Persona models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Persona model.
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
     * Creates a new Persona model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		
        $model = new Persona();

        if ($model->load(Yii::$app->request->post()) && $model->validate() ) {
			$model2=Persona::find()->where("pers_rut='$model->pers_rut'")->one();
			if($model2){
				Yii::$app->getSession()->setFlash('danger', [
					'type' => 'danger',
					'duration' => 5000,
					'icon' => 'fa fa-users',
					'title' => 'El rut ya está registrado.',
					'message' => 'No se guardaron los cambios.',
					'positonY' => 'bottom',
					'positonX' => 'right'
				]);
				
				 return $this->render('create', [
					'model' => $model,
				]);
			}
			
			$model->save();
            return $this->redirect(['view', 'id' => $model->pers_codigo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Persona model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pers_codigo]);
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

    /**
     * Deletes an existing Persona model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
		$cuenta=Cuenta::find()->where('pers_codigo='.$model->pers_codigo)->all();
		if($cuenta){
			Yii::$app->getSession()->setFlash('danger', [
				'type' => 'danger',
				'duration' => 5000,
				'icon' => 'fa fa-users',
				'title' => 'No se puede eliminar a esta persona.',
				'message' => 'Intenta más tarde.',
				'positonY' => 'bottom',
				'positonX' => 'right'
			]);
			return $this->redirect(['index']);
		}
		$model->delete();
		Yii::$app->getSession()->setFlash('success', [
						'type' => 'success',
						'duration' => 5000,
						'icon' => 'fa fa-users',
						'title' => 'Se ha eliminado a '.$model->per_nombre1.' d elos registros',
						'message' => 'Datos almacenados exitosamente.',
						'positonY' => 'bottom',
						'positonX' => 'right'
					]);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Persona model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Persona the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Persona::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

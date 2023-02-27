<?php

namespace backend\modules\records\controllers;

use yii\web\Controller;
use common\models\Hadmlog;
use common\models\PhoRecordsEncoding;
use Yii;
use backend\modules\records\models\PhoRecordsEncodingSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\PhoRecordsFilling;
use backend\modules\records\models\PhoRecordsFillingSearch;


/**
 * Default controller for the `records` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    /*
    public function actionIndex()
    {
        return $this->render('index');
        //$model = $this->findModelHadmlog($enccode);
    }
    */
    public function actionIndex2()
    {
        $searchModel = new PhoRecordsEncodingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function findModelHadmlog($enccode)
    {
        if (($model = Hadmlog::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');

    }
    

   
        
        /** @inheritdoc */
        public function behaviors()
        {
            return [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['post'],
                    ],
                ],
            ];
        }
        
        /**
         * Lists all PhoRecordsFilling models.
         * @return mixed
         */
        public function actionIndex()
        {
            $searchModel = new PhoRecordsFillingSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        
        /**
         * Displays a single PhoRecordsFilling model.
         * @param int $rf Rf
         * @return mixed
         */
        public function actionView($rf)
        {
            return $this->render('view', [
                'model' => $this->findModel($rf),
            ]);
        }
        
        /**
         * Creates a new PhoRecordsFilling model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        public function actionCreate()
        {
            $model = new PhoRecordsFilling();
            
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'rf' => $model->rf]);
            }
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        
        /**
         * Updates an existing PhoRecordsFilling model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param int $rf Rf
         * @return mixed
         */
        public function actionUpdate($rf)
        {
            $model = $this->findModel($rf);
            
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'rf' => $model->rf]);
            }
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        
        /**
         * Deletes an existing PhoRecordsFilling model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param int $rf Rf
         * @return mixed
         */
        public function actionDelete($rf)
        {
            $this->findModel($rf)->delete();
            
            return $this->redirect(['index']);
        }
        
        /**
         * Finds the PhoRecordsFilling model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param int $rf Rf
         * @return PhoRecordsFilling the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($rf)
        {
            if (($model = PhoRecordsFilling::findOne($id)) !== null) {
                return $model;
            }
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    


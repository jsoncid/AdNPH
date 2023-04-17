<?php

namespace backend\modules\labresult\controllers;

use Yii;
use common\models\PhoLabresult;
use backend\modules\labresult\models\LabresultSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LabresultController implements the CRUD actions for PhoLabresult model.
 */
class LabresultController extends Controller
{

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
     * Lists all PhoLabresult models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LabresultSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PhoLabresult model.
     * @param int $rf_id Rf ID
     * @return mixed
     */
    public function actionView($rf_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($rf_id),
        ]);
    }

    /**
     * Creates a new PhoLabresult model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PhoLabresult();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rf_id' => $model->rf_id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PhoLabresult model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $rf_id Rf ID
     * @return mixed
     */
    public function actionUpdate($rf_id)
    {
        $model = $this->findModel($rf_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rf_id' => $model->rf_id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PhoLabresult model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $rf_id Rf ID
     * @return mixed
     */
    public function actionDelete($rf_id)
    {
        $this->findModel($rf_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PhoLabresult model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $rf_id Rf ID
     * @return PhoLabresult the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    
    
  
   
    protected function findModel($rf_id)
    {
        if (($model = PhoLabresult::findOne($rf_id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

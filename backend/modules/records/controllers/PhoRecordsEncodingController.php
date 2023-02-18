<?php

namespace backend\modules\records\controllers;

use Yii;
use common\models\PhoRecordsEncoding;
use backend\modules\records\models\PhoRecordsEncodingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PhoRecordsEncodingController implements the CRUD actions for PhoRecordsEncoding model.
 */
class PhoRecordsEncodingController extends Controller
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
     * Lists all PhoRecordsEncoding models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PhoRecordsEncodingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PhoRecordsEncoding model.
     * @param int $re_id Re ID
     * @return mixed
     */
    public function actionView($re_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($re_id),
        ]);
    }

    /**
     * Creates a new PhoRecordsEncoding model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PhoRecordsEncoding();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 're_id' => $model->re_id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PhoRecordsEncoding model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $re_id Re ID
     * @return mixed
     */
    public function actionUpdate($re_id)
    {
        $model = $this->findModel($re_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 're_id' => $model->re_id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PhoRecordsEncoding model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $re_id Re ID
     * @return mixed
     */
    public function actionDelete($re_id)
    {
        $this->findModel($re_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PhoRecordsEncoding model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $re_id Re ID
     * @return PhoRecordsEncoding the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($re_id)
    {
        if (($model = PhoRecordsEncoding::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

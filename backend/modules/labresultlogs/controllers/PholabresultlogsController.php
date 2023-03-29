<?php

namespace backend\modules\labresultlogs\controllers;

use Yii;
use common\models\Pholabresultlogs;
use backend\modules\labresultlogs\models\PholabresultlogsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PholabresultlogsController implements the CRUD actions for Pholabresultlogs model.
 */
class PholabresultlogsController extends Controller
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
     * Lists all Pholabresultlogs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PholabresultlogsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pholabresultlogs model.
     * @param int $rf_id_logs Id Logs
     * @return mixed
     */
    public function actionView($rf_id_logs)
    {
        return $this->render('view', [
            'model' => $this->findModel($rf_id_logs),
        ]);
    }

    /**
     * Creates a new Pholabresultlogs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pholabresultlogs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rf_id_logs' => $model->rf_id_logs]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pholabresultlogs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $rf_id_logs Id Logs
     * @return mixed
     */
    public function actionUpdate($rf_id_logs)
    {
        $model = $this->findModel($rf_id_logs);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rf_id_logs' => $model->rf_id_logs]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pholabresultlogs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $rf_id_logs Id Logs
     * @return mixed
     */
    public function actionDelete($rf_id_logs)
    {
        $this->findModel($rf_id_logs)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pholabresultlogs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $rf_id_logs Id Logs
     * @return Pholabresultlogs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($rf_id_logs)
    {
        if (($model = Pholabresultlogs::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

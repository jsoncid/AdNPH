<?php

namespace backend\modules\content\controllers;

use Yii;
use common\models\Hadmlog;
use backend\modules\content\models\search\HadmlogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HadmlogController implements the CRUD actions for Hadmlog model.
 */
class HadmlogController extends Controller
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
     * Lists all Hadmlog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HadmlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hadmlog model.
     * @param string $enccode Enccode
     * @return mixed
     */
    public function actionView($enccode)
    {
        return $this->render('view', [
            'model' => $this->findModel($enccode),
        ]);
    }

    /**
     * Creates a new Hadmlog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hadmlog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'enccode' => $model->enccode]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Hadmlog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $enccode Enccode
     * @return mixed
     */
    public function actionUpdate($enccode)
    {
        $model = $this->findModel($enccode);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'enccode' => $model->enccode]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Hadmlog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $enccode Enccode
     * @return mixed
     */
    public function actionDelete($enccode)
    {
        $this->findModel($enccode)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Hadmlog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $enccode Enccode
     * @return Hadmlog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($enccode)
    {
        if (($model = Hadmlog::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

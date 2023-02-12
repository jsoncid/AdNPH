<?php

namespace backend\modules\content\controllers;

use Yii;
use common\models\Hward;
use backend\modules\content\models\HwardSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HwardController implements the CRUD actions for Hward model.
 */
class HwardController extends Controller
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
     * Lists all Hward models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HwardSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Hward();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            //'model' => $model,
        ]);
    }

    /**
     * Displays a single Hward model.
     * @param string $wardcode Wardcode
     * @return mixed
     */
    public function actionView($wardcode)
    {
        return $this->render('view', [
            'model' => $this->findModel($wardcode),
        ]);
    }

    /**
     * Creates a new Hward model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hward();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'wardcode' => $model->wardcode]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Hward model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $wardcode Wardcode
     * @return mixed
     */
    public function actionUpdate($wardcode)
    {
        $model = $this->findModel($wardcode);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'wardcode' => $model->wardcode]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Hward model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $wardcode Wardcode
     * @return mixed
     */
    public function actionDelete($wardcode)
    {
        $this->findModel($wardcode)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Hward model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $wardcode Wardcode
     * @return Hward the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($wardcode)
    {
        if (($model = Hward::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

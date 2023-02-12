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

    public function actionPrint()
    {
        return "im here";
        /*
        $searchModel = new HadmlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        */
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

<?php

namespace backend\modules\records\controllers;

use yii\web\Controller;
use common\models\Hadmlog;
use common\models\PhoRecordsEncoding;
use Yii;
use backend\modules\records\models\PhoRecordsEncodingSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
    public function actionIndex()
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
}

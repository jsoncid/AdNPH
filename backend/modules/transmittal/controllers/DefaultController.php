<?php

namespace backend\modules\transmittal\controllers;


use yii\web\Controller;
use backend\modules\transmittal\models\PhoTransmittalSearch;
use Yii;
use common\models\PhoTransmittal;
use common\models\PhoTransmittalDetailsTemp;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use backend\modules\transmittal\models\PhoTransmittalDetailsTempSearch;
use common\models\PhoTransmittalDetails;
use backend\modules\transmittal\models\PhoTransmittalDetailsSearch;
use yii\filters\AccessControl;
use kartik\mpdf\Pdf;
use common\models\HadmlogSearch;
use backend;

/**
 * Default controller for the `transmittal` module
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
    }
    */
    public function actionIndex()
    {
        $searchModel = new PhoTransmittalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$dataProvider = $dataProvider->query
        $dataProvider->query->andWhere(['created_by' => Yii::$app->user->id ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionCreate()
    {
        $model = new PhoTransmittal();
        $searchModel = new PhoTransmittalDetailsTempSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['like', 'datetime', date("Y-m-d")]);
        $dataProvider->query->andWhere(['user' => Yii::$app->user->id ]);
        
        
        if ($model->load(Yii::$app->request->post()) ) {
            $model->save();        
            $listData=ArrayHelper::map(PhoTransmittalDetailsTemp::find()->where(['user'=> Yii::$app->user->id])->andWhere(['like', 'datetime', date("Y-m-d")])->all(),'id','enccode');           
            $rows=[];
            foreach ($listData as $item) {
                        print_r ($item);
                        echo "<br>";
                        $rows[] = [$model->tid,$item];
            }

            
            $modeldetails = new PhoTransmittalDetails();
            $modeldetails->tid = $model->tid;
            Yii::$app->db->createCommand()->batchInsert('pho_transmittal_details', ['tid','enccode'],$rows)->execute();
            PhoTransmittalDetailsTemp::deleteAll(['user' => Yii::$app->user->id]);
            return $this->redirect(['index']);
        }
        
        else
        {
            return $this->render('create', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }



}

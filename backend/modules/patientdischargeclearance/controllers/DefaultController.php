<?php

namespace backend\modules\patientdischargeclearance\controllers;

use common\models\Hperson;
use Yii;
use kartik\mpdf\Pdf;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\modules\patientdischargeclearance\models\HpersonSearch;
use backend\modules\patientdischargeclearance\models\HenctrSearch;
use common\models\Henctr;

/**
 * Default controller for the `patientdischargeclearance` module
 */
class DefaultController extends Controller
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
     * Lists all Hperson models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HenctrSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays a single Hperson model.
     * @param string $hpercode Hpercode
     * @return mixed
     */
    public function actionView($enccode)
    {
        return $this->render('view', [
            'model' => $this->findModel($enccode),
        ]);
    }
    
    public function actionPrint($enccode)
    {
        
        /*return $this->render('view', [
         'model' => $this->findModel($hpercode),
         ]);*/
        
        $model = $this->findModel($enccode);
        $content =  $this->renderPartial('_print', [
            'model' => $model,
        ]);
        
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'cssFile' => 'css/header.css',
            'content' => $content,
            'options' => ['title' => 'PHO'],
            
        ]);
        return $pdf->render();
        
    }


    /**
     * Finds the Hperson model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $hpercode Hpercode
     * @return Hperson the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($enccode)
    {
        if (($model = Henctr::findOne($enccode)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

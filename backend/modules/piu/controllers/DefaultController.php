<?php

namespace backend\modules\piu\controllers;

use Yii;
use kartik\mpdf\Pdf;
use common\models\Hperson;
use backend\modules\piu\models\HpersonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HpersonController implements the CRUD actions for Hperson model.
 */
//class HpersonController extends Controller
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
        $searchModel = new HpersonSearch();
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
    public function actionView($hpercode)
    {
        return $this->render('view', [
            'model' => $this->findModel($hpercode),
        ]);
    }
    
    public function actionPrint($hpercode)
    {
        
        /*return $this->render('view', [
         'model' => $this->findModel($hpercode),
         ]);*/
        
        $model = $this->findModel($hpercode);
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
    protected function findModel($hpercode)
    {
        if (($model = Hperson::findOne($hpercode)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
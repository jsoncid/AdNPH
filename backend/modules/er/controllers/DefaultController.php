<?php

namespace backend\modules\er\controllers;

use yii\filters\VerbFilter;
use yii\web\Controller;
use backend\modules\er\models\HadmlogSearch;
use common\models\Hadmlog;
use Yii;
use kartik\mpdf\Pdf;
use common\models\Hperson;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `er` module
 */
class DefaultController extends Controller
{
    

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new HadmlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $today = new \Datetime(date('Y-m-d'));
        $today = $today->format('Y-m-d');
        //$dataProvider->query->andFilterWhere(['like', 'admdate', $today]); 
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionView($enccode)
    {
        return $this->render('view', [
            'model' => $this->findModelHadmlog($enccode),
            //'enccode' => $enccode
        ]);
    }
    
    
    public function actionPrint($hpercode,$enccode)
    {
        
        /*return $this->render('view', [
         'model' => $this->findModel($hpercode),
         ]);*/
        
        $model = $this->findModel($hpercode);
        $model2 = $this->findModelHadmlog($enccode);
        $content =  $this->renderPartial('_print', [
            'model' => $model,
            'model2' => $model2,
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
    
    protected function findModel($hpercode)
    
    {
        if (($model = Hperson::find()->where(['hpercode'=>$hpercode])->one()) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
        
    }
    protected function findModelHadmlog($enccode)
    {
        if (($model = Hadmlog::findOne($enccode)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
        
    }
    
}

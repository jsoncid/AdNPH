<?php

namespace backend\modules\content\controllers;

use Yii;
use common\controllers\ValidateController;
use common\models\Hadmlog;
use backend\modules\content\models\search\HadmlogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use kartik\mpdf\Pdf;
use common\models\Hperson;
use phpDocumentor\Reflection\Types\This;


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

    
    public  function Validatedata($hperid)
    {
        $validator = null;
        if(!ValidateController::Address($hperid)){$validator = $validator."Brgy, ";}
        if(!ValidateController::Contact($hperid)){$validator = $validator."Contact, ";}
        if(!ValidateController::Civilstatus($hperid)){$validator = $validator."CivilStatus, ";}
        
        if($validator == null){
            return TRUE;      
        }
        else {
            return FALSE;     
        }
    }
    
    
    public function actionPrint($hpercode)
    {
        if($this->Validatedata($hpercode))
        {
               $model = $this->findModel($hpercode);
                $content =  $this->renderPartial('_chart', [
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
        
        else
        {
            Yii::$app->session->setFlash('error', "Cannot Print Chart inomplete data. Refer to Required column");
            return $this->redirect(['index']);
        }
       
    }

    public function actionClinical($hpercode)
    {
        $model = $this->findModel($hpercode);
        $content = $this->renderPartial('clinical',[
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
public function actionLaboratory($hpercode)
{
    $model = $this->findModel($hpercode);
    $content = $this->renderPartial('laboratory',[
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

    public function actionOtherlaboratory($hpercode)
    {
    $model = $this->findModel($hpercode);
    $content = $this->renderPartial('otherlaboratory',[
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

    public function actionRadiologyrequest($hpercode)
    {
        $model = $this->findModel($hpercode);
        $content = $this->renderPartial('radiologyrequest',[
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

    public function actionTag($hpercode)
    {
        $model = $this->findModel($hpercode);
        $content = $this->renderPartial('tag',[
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








    public function actionSurgical($hpercode)

    {
        $model = $this->findModel($hpercode);
        $content =$this->renderPartial('surgical',[
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

        public function actionCf4($hpercode)

        {
            $model = $this->findModel($hpercode);
            $content =$this->renderPartial('cf4',[
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
        public function actionNewborninformation($hpercode)

        {
            $model = $this->findModel($hpercode);
            $content =$this->renderPartial('newborninformation',[
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
     * Finds the Hadmlog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $enccode Enccode
     * @return Hadmlog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    protected function findModel($hpercode)

    {
        if (($model = Hperson::find()->where(['hpercode'=>$hpercode])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    
    }
    protected function findModelHadmlog($enccode)
    {
        if (($model = Hadmlog::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');

    }
}

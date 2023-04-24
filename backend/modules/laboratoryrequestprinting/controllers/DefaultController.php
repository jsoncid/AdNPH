<?php

namespace backend\modules\laboratoryrequestprinting\controllers;

use yii\web\Controller;
use Yii;
use common\models\Hdocord;
use common\models\Henctr;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use common\controllers\PatiendetailsController;
use backend\modules\laboratoryrequestprinting\models\HdocordSearch;

/**
 * Default controller for the `laboratoryrequestprinting` module
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
    }*/
    
    
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
     * Lists all Hdocord models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HdocordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere('pcchrgcod is null');
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    

    


    

    public function actionPatientdetails($hperid,$encid,$docointkey)
    {   
        if (($model = Henctr::findOne($encid)) !== null) {
            $modelhdocord = Hdocord::findOne($docointkey);
            

                    $contact = PatiendetailsController::Contact($hperid);
                    $age = PatiendetailsController::Age($encid);
                    $room = PatiendetailsController::Room($encid);
                    
                    
            return $this->renderAjax('patientdetails', [
                'model' => $model,
                'modelhdocord' => $modelhdocord,
                'contact' => $contact,
                'age' => $age,
                'room' => $room
            ]);
            
        }
        else 
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
    }
    
    
    public function actionLabreqlist() 
    {

        
        $searchModel = new HdocordSearch();
        $dataProvider = $searchModel->search($_SESSION['labreqlistparam']);
        $dataProvider->query->andFilterWhere(['orcode'=>'LABOR']);

        
         Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
         $pdf = new Pdf([
         'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
         'destination' => Pdf::DEST_BROWSER,
             'content' => $this->renderPartial('laboratory_list_result',['searchModel' => $searchModel,'dataProvider' => $dataProvider]),
         'options' => [
         // any mpdf options you wish to set
         ],
         'methods' => [
         'SetTitle' => 'Laboratory Request List',
         'SetSubject' => 'Generating PDF file for Laboratory Request List',
         'SetHeader' => ['Laboratory Request List||Generated On: ' . date("r")],
         'SetFooter' => ['|Page {PAGENO}|'],
         'SetAuthor' => 'AdNPH',
         'SetCreator' => 'AdNPH',
         ]
         ]);
         return $pdf->render();

    }
    
    
    /**
     * Finds the Hdocord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $docointkey Docointkey
     * @return Hdocord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($docointkey)
    {
        if (($model = Hdocord::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    

}

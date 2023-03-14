<?php

namespace backend\modules\laboratoryrequestprinting\controllers;

use yii\web\Controller;
use Yii;
use common\models\Hdocord;
use backend\modules\laboratoryrequestprinting\models\HdocordSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Hprocm;
use kartik\mpdf\Pdf;

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
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays a single Hdocord model.
     * @param string $docointkey Docointkey
     * @return mixed
     */
    public function actionView($docointkey)
    {
        return $this->render('view', [
            'model' => $this->findModel($docointkey),
        ]);
    }
    
    /**
     * Creates a new Hdocord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hdocord();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'docointkey' => $model->docointkey]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    /**
     * Updates an existing Hdocord model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $docointkey Docointkey
     * @return mixed
     */
    public function actionUpdate($docointkey)
    {
        $model = $this->findModel($docointkey);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'docointkey' => $model->docointkey]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    /**
     * Deletes an existing Hdocord model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $docointkey Docointkey
     * @return mixed
     */
    public function actionDelete($docointkey)
    {
        $this->findModel($docointkey)->delete();
        
        return $this->redirect(['index']);
    }
    
    
    public function actionLabreqlist() 
    {

        
        $searchModel = new HdocordSearch();
        $dataProvider = $searchModel->search($_SESSION['labreqlistparam']);

        
         Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
         $pdf = new Pdf([
         'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
         'destination' => Pdf::DEST_BROWSER,
             'content' => $this->renderPartial('laboratory_list_result',['searchModel' => $searchModel,'dataProvider' => $dataProvider]),
         'options' => [
         // any mpdf options you wish to set
         ],
         'methods' => [
         'SetTitle' => 'Privacy Policy - Krajee.com',
         'SetSubject' => 'Generating PDF files via yii2-mpdf extension has never been easy',
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

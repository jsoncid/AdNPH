<?php

namespace backend\modules\content\controllers;

use Yii;
use common\models\Hadmlog;
use backend\modules\content\models\search\HadmlogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use common\models\Hperson;

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

    /**
     * Creates a new Hadmlog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hadmlog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'enccode' => $model->enccode]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Hadmlog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $enccode Enccode
     * @return mixed
     */
    public function actionUpdate($enccode)
    {
        $model = $this->findModel($enccode);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'enccode' => $model->enccode]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionPrint($hpercode)
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
     * Deletes an existing Hadmlog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $enccode Enccode
     * @return mixed
     */
    public function actionDelete($enccode)
    {
        $this->findModel($enccode)->delete();

        return $this->redirect(['index']);
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
}

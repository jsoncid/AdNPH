<?php

namespace backend\modules\radresult\controllers;

use Yii;
use PHPUnit\Exception;




use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\bootstrap4\ActiveForm;
use yii\filters\VerbFilter;


use yii\web\UploadedFile;


use yii\helpers\ArrayHelper;
use common\models\PhoRadOptionValue;
use backend\modules\radresult\models\PhoRadResultSearch;
use common\models\PhoRadResult;


/**
 * Default controller for the `radresult` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
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
     * Lists all PhoLabresult models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PhoRadOptionValue();
        $searchModel = new PhoRadResultSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $results = PhoRadResult::find()->all();
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'results' => $results,
        ]);
    }
    
    /**
     * Displays a single PhoLabresult model.
     * @param int $rf_id Rf ID
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
       
     
        // Create an empty array to store the option values
        //$optionValues = [];
        $optionValues = PhoRadOptionValue::find()->where(['rf_id'=>$model->rf_id])->all();
        
        // Loop through each option value and add it to the array
        /*
        foreach ($optionsArray as $option) {
            $optionValues[] = $option->name;
        }
        */
        
        
       return $this->render('view', [
           'model' => $model,
           'optionValues' => $optionValues,
           //'optionsArray' => $optionsArray,
           
           
      ]);
      
     
    }
    
    /**
     * Creates a new PhoLabresult model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PhoRadResult();
        $modelsoption = [new PhoRadOptionValue()];
        
        if ($model->load(Yii::$app->request->post())) {
            $modelsoption =  PhoRadOptionValue::createMultiple(PhoRadOptionValue::classname());
            PhoRadOptionValue::loadMultiple($modelsoption, Yii::$app->request->post());
            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsoption),
                    ActiveForm::validate($model)
                    );
            }
            
            
            $valid = $model->validate();
           // $valid =  PhoRadOptionValue::validateMultiple($modelsoption) && $valid;
            
            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsoption as $index => $modelOptionValue) {
                            $modelOptionValue->rf_id = $model->rf_id;
                            $modelOptionValue->sort_order = $index;
                            $modelOptionValue->pdf_id = $modelOptionValue->rf_id;
                            $modelOptionValue->path = \yii\web\UploadedFile::getInstance($modelOptionValue, "[{$index}]path");
                            if ($modelOptionValue->path) {
                                $tempPath = $modelOptionValue->path->tempName;
                                $filename = 'upfiles/radioresult/' . $modelOptionValue->path->name;
                                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                                $filename = 'upfiles/radioresult/' . uniqid() . '.' . $extension;
                                $filename = str_replace(' ', '', $filename);
                                $filename = str_replace('(', '', $filename);
                                $filename = str_replace(')', '', $filename);
                                if ($modelOptionValue->path->saveAs($filename)) {
                                    $modelOptionValue->path = $filename;
                                    if (!($flag = $modelOptionValue->save(false))) {
                                        $transaction->rollBack();
                                        break;
                                    }
                                }
                            }
                           
                        }
                    }
                    
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->rf_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                    throw $e;
                }
            }
        }
        
        return $this->renderAjax('create', [
            'model' => $model,
            'modelsoption' => (empty($modelsoption)) ? [new PhoRadOptionValue()] : $modelsoption
        ]);
        
        
        
    
    }
    
    /**
     * Updates an existing PhoLabresult model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $rf_id Rf ID
     * @return mixed
     */
public function actionUpdate($id)
{
    $model = PhoRadResult::findOne($id);
    
    if (!$model) {
        throw new NotFoundHttpException("The requested page does not exist.");
    }
    
    $modelsoption = $model->phoRadOptionValue;
    $isNewRecord = false;
    
    if (empty($modelsoption)) {
        $modelsoption = [new PhoRadOptionValue()];
    
} else {
    $modelsoption =  PhoRadOptionValue::find()->where(['id' => ArrayHelper::getColumn($modelsoption, 'id')])->all();
}
    if ($model->load(Yii::$app->request->post())) {
        PhoRadOptionValue::loadMultiple($modelsoption, Yii::$app->request->post());
        
        // ajax validation
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ArrayHelper::merge(
                ActiveForm::validateMultiple($modelsoption),
                ActiveForm::validate($model)
                );
        }
        
        $valid = $model->validate();
        $valid =  PhoRadOptionValue::validateMultiple($modelsoption) && $valid;
        
        if ($valid) {
            $transaction = Yii::$app->db->beginTransaction();
            
            try {
                if ($flag = $model->save(false)) {
                    foreach ($modelsoption as $index => $modelOptionValue) {
                        $modelOptionValue->rf_id = $model->rf_id;
                        $modelOptionValue->sort_order = $index;
                        $modelOptionValue->pdf_id = $modelOptionValue->rf_id;
                        $uploadedFile = \yii\web\UploadedFile::getInstance($modelOptionValue, "[{$index}]path");
                        
                        if ($uploadedFile) {
                            // Delete the old file
                            if ($modelOptionValue->path && file_exists($modelOptionValue->path)) {
                                unlink($modelOptionValue->path);
                            }
                            
                            $tempPath = $uploadedFile->tempName;
                            $filename = 'upfiles/radioresult/' . $uploadedFile->name;
                            $extension = pathinfo($filename, PATHINFO_EXTENSION);
                            $filename = 'upfiles/radioresult/' . uniqid() . '.' . $extension;
                            $filename = str_replace(' ', '', $filename);
                            $filename = str_replace('(', '', $filename);
                            $filename = str_replace(')', '', $filename);
                            
                            if ($uploadedFile->saveAs($filename)) {
                                $modelOptionValue->path = $filename;
                                
                                if (!($flag = $modelOptionValue->save(false))) {
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                        } else {
                            if ($isNewRecord && !$modelOptionValue->isNewRecord) {
                                $modelOptionValue->delete();
                            } else {
                                $modelOptionValue->save(false);
                            }
                        }
                    }
                }
                
                if ($flag) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->rf_id]);
                }
            } catch (Exception $e) {
                $transaction->rollBack();
                throw $e;
            }
        }
    }
    
    return $this->render('update', [
        'model' => $model,
        'modelsoption' => (empty($modelsoption)) ? [new  PhoRadOptionValue()] : $modelsoption
    ]);
}

public function actionViewPdf($id)
{
    $optionValue = PhoRadOptionValue::findOne($id);
    $pdfPath = Yii::getAlias('@webroot') . '/' . $optionValue->path;
  
    if (!file_exists($pdfPath)) {
        throw new NotFoundHttpException('The requested PDF does not exist.');
    }
    
    $response = Yii::$app->response;
    $response->format = yii\web\Response::FORMAT_RAW;
    $response->headers->add('Content-Type', 'application/pdf');
    $response->headers->add('Content-Disposition', 'inline; filename="document.pdf"');
    $response->headers->add('Content-Length', filesize($pdfPath));
    $response->content = file_get_contents($pdfPath);
    
    return $response;

}
    /**
     * Deletes an existing PhoLabresult model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $rf_id Rf ID
     * @return mixed
     */
public function actionDelete($id)
{
    $model = $this->findModel($id);
    
    // delete related records in OptionValue table
    $optionValues = $model->phoRadOptionValue;
    foreach ($optionValues as $optionValue) {
        $optionValue->delete();
    }
    
    // delete the main record
    $model->delete();
    
    return $this->redirect(['index']);
}
    
    public function actionModal($rf_id)
    {
        $model = $this->findModel($id);
        
        return $this->render('modal', [
            'model' => $model,
            ]);
    }
    
    
    
    public function actionPdf($rf_id){
        
        $model = PhoRadResult::findOne($id);
        $filePath = 'http://localhost/adnph/backend/web';
        $filename = $model->enccode;
        //$url = str_replace(" ", "%20", $filename);
        $url = str_replace($search, $replace, $filename);
        // Might need to change '@app' for another alias
        //$completePath = Yii::getAlias($filePath.'/'.$filename);
        return $this->render($filePath."/".$url.".".$filename->extension);
        //return Yii::$app->response->sendFile($filePath, $filename);
        
        return $this->render('viewlabres', [
            'model' => $model,]);
       
    }
  
    public function actionViewlabres($id)
    { 
        $model = PhoRadResult::findOne($id);
        $filePath = 'http://localhost/adnph/backend/web/upfiles/result';
        $filename = $model->enccode;
        //$url = str_replace(" ", "%20", $filename);
        $url = str_replace($search, $replace, $filename);
        // Might need to change '@app' for another alias
        //$completePath = Yii::getAlias($filePath.'/'.$filename);
        return $this->render($filePath."/".$url.".".$filename->extension);
        //return Yii::$app->response->sendFile($filePath, $filename);
        
        return $this->render('viewlabres', [
            'model' => $model,]);
    }
        
        
        
      
    
    // ...


    /**
     * Finds the PhoLabresult model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $rf_id Rf ID
     * @return PhoRadResult the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PhoRadResult::findOne($id)) !== null){
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

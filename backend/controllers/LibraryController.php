<?php

namespace backend\controllers;

use Yii;
use backend\models\Library;
use backend\models\LibrarySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use backend\models\chart;

/**
 * LibraryController implements the CRUD actions for Library model.
 */
class LibraryController extends Controller
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
     * Lists all Library models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LibrarySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Library model.
     * @param int $Book_ID Book  ID
     * @return mixed
     */
    public function actionView($Book_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($Book_ID),
        ]);
    }

    /**
     * Creates a new Library model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Library();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Book_ID' => $model->Book_ID]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Library model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Book_ID Book  ID
     * @return mixed
     */
    public function actionUpdate($Book_ID)
    {
        $model = $this->findModel($Book_ID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Book_ID' => $model->Book_ID]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Library model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Book_ID Book  ID
     * @return mixed
     */
    public function actionDelete($Book_ID)
    {
        $this->findModel($Book_ID)->delete();

        return $this->redirect(['index']);
    }

    public function actionPdf()
    {
    
        $html = $this ->renderPartial('chart');
        $pdf = new \Mpdf\Mpdf();
        $pdf ->writeHTML($html);
        $pdf ->Output();
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE,
            'format' => Pdf::FORMAT_Legal,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            
            'options' => ['title' => 'PHO'],
            'methods' => [
                'SetHeader' => ['   PROVINCIAL HEALTH OFFICE <br>
                                    AGUSAN DEL NORTE PROVINCIAL HOSPITAL <br> '
                                  
                
                                ],
           ]
        ]
        );
       return $mpdf->render();
    }


    /**
     * Finds the Library model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Book_ID Book  ID
     * @return Library the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Book_ID)
    {
        if (($model = Library::findOne($Book_ID)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

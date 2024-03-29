<?php

namespace backend\modules\labresultlogs\controllers;

use Yii;
use common\models\Hdocord;
use common\models\Pholabresultlogs;
use backend\modules\labresultlogs\models\PholabresultlogsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\labresultlogs\models\HdocordSearch;
/**
 * Default controller for the `labresultlogs` module
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
     * Lists all Pholabresultlogs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HdocordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['or', 'pcchrgcod=""', 'pcchrgcod is null']) ;
        $dataProvider->query->andFilterWhere(['orcode' => 'LABOR']);
        //$dataProvider->query->andFilterWhere(['estatus' => 'S']);
        //$dataProvider->query->andFilterWhere(['dostat' => 'A']);
        
      
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
           
        ]);
    }
    
    public function actionView($id)
    {
        $docointkey=$id;
        
        $model2 = $this->findModelHdocord($docointkey);
        $model2->estatus = 'P';
        $model2->save();
        
        return $this->redirect(['index']);
        /*
        if ($model->load(Yii::$app->request->post()) && ) {
            return $this->redirect(['view', 'docointkey' => $model->docointkey]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
        
        
        $searchModel = new HdocordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere('pcchrgcod is null');
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            
        ]);
        */
    }
    
    protected function findModelHdocord($docointkey)
    {
        if (($model = Hdocord::findOne($docointkey)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    

    protected function findModel($rf_id_logs)
    {
        if (($model = Pholabresultlogs::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

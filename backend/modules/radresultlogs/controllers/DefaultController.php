<?php

namespace backend\modules\radresultlogs\controllers;

use common\models\Hdocord;
use common\models\PhoLabresult;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\modules\radresultlogs\models\HdocordSearch;

/**
 * Default controller for the `radresultlogs` module
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
        $dataProvider->query->andWhere(['or', 'pcchrgcod=""', 'pcchrgcod is null']);
        //$dataProvider->query->andFilterWhere(['dostat' => 'I']);
        //$dataProvider->query->andFilterWhere(['estatus' => 'S']);
        $dataProvider->query->andFilterWhere(['orcode' => 'RADIO']);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionView($id)
    {
        $docointkey=$id;
        
        $model2 = $this->findModelHdocord($docointkey);
        $model2->dostat = 'A';
        $model2->save();
        
        return $this->redirect(['index']);

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
        if (($model = PhoLabresult::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

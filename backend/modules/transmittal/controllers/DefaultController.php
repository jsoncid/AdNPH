<?php

namespace backend\modules\transmittal\controllers;


use yii\web\Controller;
use backend\modules\transmittal\models\PhoTransmittalSearch;
use Yii;
use common\models\Hadmlog;
use common\models\PhoTransmittal;
use common\models\PhoTransmittalDetailsTemp;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use backend\modules\transmittal\models\PhoTransmittalDetailsTempSearch;
use common\models\PhoTransmittalDetails;
use backend\modules\transmittal\models\PhoTransmittalDetailsSearch;
use yii\filters\AccessControl;
use kartik\mpdf\Pdf;
use backend;

/**
 * Default controller for the `transmittal` module
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
    }
    */
    public function actionIndex()
    {
        $searchModel = new PhoTransmittalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$dataProvider = $dataProvider->query
        $dataProvider->query->andWhere(['created_by' => Yii::$app->user->id ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionIndexreceived()
    {
        
        $roles = \Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);
        $role = [];
        foreach($roles as $key => $rol) {
            $role[] = $rol->name;
        }
        
        
        $searchModel = new PhoTransmittalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['transmit_to' => $role]);
        //$dataProvider->query->andWhere(['is_received' => 0]);
        
        return $this->render('indexreceived', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        
    }
    
    
    public function actionReceived($id)
    {
        $model = $this->findModel($id);
        
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->tid]);
            return $this->redirect(['indexreceived']);
        }
        
        else {
            return $this->render('updatereceived', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionReceivedlist($id)
    {
        $searchModel = new PhoTransmittalDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$dataProvider = $dataProvider->query
        $dataProvider->query->andWhere(['tid' => $id]);
        
        return $this->render('indexreceivedlist', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionCreate()
    {
        $model = new PhoTransmittal();
        $searchModel = new PhoTransmittalDetailsTempSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['like', 'datetime', date("Y-m-d")]);
        $dataProvider->query->andWhere(['user' => Yii::$app->user->id ]);
        
        
        if ($model->load(Yii::$app->request->post()) ) {
            $model->save();        
            $listData=ArrayHelper::map(PhoTransmittalDetailsTemp::find()->where(['user'=> Yii::$app->user->id])->andWhere(['like', 'datetime', date("Y-m-d")])->all(),'id','enccode');           
            $rows=[];
            foreach ($listData as $item) 
                    {
                        print_r ($item);
                        echo "<br>";
                        $rows[] = [$model->tid,$item];
                    }

            
            $modeldetails = new PhoTransmittalDetails();
            $modeldetails->tid = $model->tid;
            Yii::$app->db->createCommand()->batchInsert('pho_transmittal_details', ['tid','enccode'],$rows)->execute();
            PhoTransmittalDetailsTemp::deleteAll(['user' => Yii::$app->user->id]);
            return $this->redirect(['index']);
        }
        
        else
        {
            return $this->render('create', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }
    
    public function actionCreatetemp()
    {
        $model = new PhoTransmittalDetailsTemp();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['create']);
        }
        
        else
        {
            return $this->renderAjax('_formphotransmittaldetailstemp', [
                'model' => $model,
                
            ]);
        }
 
    }
    
    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $searchModel = new PhoTransmittalDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$dataProvider->query->andWhere(['like', 'datetime', date("Y-m-d")]);
        $dataProvider->query->andWhere(['tid' => $model->tid ]);
        
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->tid]);
            return $this->redirect(['index']);
        }
        
        else {
            return $this->render('update', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }
    
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        
        return $this->redirect(['index']);
    }
    
    public function actionDeletedetails($id,$tid)
    {
        //echo $tid;
        $this->findModeldetails($id)->delete();
        return $this->redirect(['update?id='.$tid]);
    }
    
    public function actionDeletetemp($id)
    {
        $this->findModeltemp($id)->delete();
        return $this->redirect(['create']);
    }
    

    
    public function actionHpersonget()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        //$disdate = '2020-10-01';
        
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $disdate = $parents[0];
                $out = self::getSubHpersonList($disdate);
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                
                return ['output'=>$out, 'selected'=>''];
            }
        }
        $out = self::getSubHpersonList($disdate);
        return ['output'=>$out, 'selected'=>''];
    } 
    
    public static function getSubHpersonList($disdate)
    {
        //$disdate = '2020-10-01';
        //$disdate = '2020-09-18 08:45:43';
        $rows = Hadmlog::find()->select(['hadmlog.enccode as id','CONCAT(hperson.patlast,", ",hperson.patfirst,", ",hperson.patmiddle) as name'])
        ->leftJoin('hperson', '`hperson`.`hpercode` = `hadmlog`.`hpercode`')
        ->where(['not', ['disdate' => null]])
        ->andWhere(['like', 'disdate', '%'.$disdate.'%', false])
        ->orderBy(['hperson.patlast' => SORT_ASC])
        ->asArray()
        ->all();
        
        return $rows;
    }
    
    protected function findModel($id)
    {
        if (($model = PhoTransmittal::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    protected function findModeltemp($id)
    {
        if (($model = PhoTransmittalDetailsTemp::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    protected function findModeldetails($id)
    {
        if (($model = PhoTransmittalDetails::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }


}

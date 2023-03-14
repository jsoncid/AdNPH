<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Hpatroom;
use common\models\Hprocm;
use common\models\Hadmlog;
use common\models\Hward;
use common\models\Hroom;

/**
 * @var yii\web\View $this
 * @var backend\modules\laboratoryrequestprinting\models\HdocordSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Laboratory Rquests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hdocord-index">
    <div class="card">
        <div class="card-header">
            <?php //echo Html::a('Create Hdocord', ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="card-body p-0">
            <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?php echo GridView::widget([
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    

                    //'docointkey',
                    //'enccode',
                    'hpercode',
                    
                    [
                        'label'=>'Patient Name',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return  $model->hpercode0->patlast.' '.$model->hpercode0->patsuffix.', '.$model->hpercode0->patfirst.' '.$model->hpercode0->patmiddle;
                        },
                    ],
                    
                   
                    'dodate',
                    'pcchrgcod',
                    [
                        'label'=>'Room',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            
                            //find room
                            $modelhpatroom = Hpatroom::find()
                            ->where(['enccode' =>  $model->enccode])
                            ->one();
                            if($modelhpatroom != NULL)
                                {
                                    $modelward = Hward::find()
                                    ->where(['wardcode' =>  $modelhpatroom->wardcode])
                                    ->one();
                                    
                                    
                                    if($modelward != NULL )
                                    {
                                        
                                        //get the rmintkey to query in hroom
                                        $rmintkey = substr($modelhpatroom->rmintkey,strlen($modelhpatroom->wardcode));
                                        
                                        $modelhroom = Hroom::find()
                                        ->where(['rmcode' =>  $rmintkey])
                                        ->andWhere(['wardcode' =>  $modelhpatroom->wardcode])
                                        ->one();
                                        
                                        return $modelward->wardname.' - '.$modelhroom->rmname;
                                    }
                                    else 
                                    {
                                        return "No Room";
                                    }
                                    
                                    
                                    //get the rmintkey to query in hroom
                                    //$rmintkey = substr($modelhpatroom->rmintkey,strlen($modelhpatroom->$model->wardcode));
                                    
                                    
                                    /*
                                    $modelhroom = Hroom::find()
                                    ->where(['rmcode' =>  $rmintkey])
                                    ->andWhere(['warcode' =>  $modelhpatroom->wardcode])
                                    ->one();
                                    
                                    return $modelward->tsdesc.' '.$modelhroom->rmname;
                                    */
                                }
                                else {
                                    return "No Room";
                                }
                            
                            
                        },
                    ],
                    
                    [
                        'label'=>'Procedure/Examination',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            if($model->proccode != NULL)
                            {
                                return  $model->proccode0->procdesc;
                            }
                            else {
                                return "-";
                            }
                            
                        },
                    ],
                    
                    [
                        'label'=>'Ordered By',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return  $model->entby0->lastname.' '.$model->hpercode0->patsuffix.', '.$model->entby0->firstname.' '.$model->entby0->middlename;
                    },
                    ],
                    
                    'dopriority',
                 
                    
                    
                    
                    
                    //['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>
    
    <?php 
        echo Html::a('<i class="fa far fa-hand-point-up"></i> Print Result', ['/laboratoryrequestprinting/default/labreqlist'], [
            'class'=>'btn btn-danger',
            'target'=>'_blank',
            'data-toggle'=>'tooltip',
            'title'=>'Will open the generated PDF file in a new window'
        ]);
    ?>

</div>

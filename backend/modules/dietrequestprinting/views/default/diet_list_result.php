<?php

use yii\helpers\Html;
use yii\bootstrap4\Modal;
use yii\grid\GridView;
use common\controllers\HproviderController;
use common\controllers\PatiendetailsController;
use common\models\Hdiet;
use common\models\Hdocord;

/**
 * @var yii\web\View $this
 * @var backend\modules\laboratoryrequestprinting\models\HdocordSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Diet Requests';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php 

$this->registerJs("$(function() {
   $('.popupModal').click(function(e) {
     e.preventDefault();
     $('#modal').modal('show')
         .find('.modal-body')
         .load($(this).attr('href'));
   });
});");
?>
<div class="hdocord-index">
    <div class="card">
        <div class="card-header">
            <?php //echo Html::a('Create Hdocord', ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="card-body p-0">
            <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>
    		<?php
        		
        		Modal::begin([
        		    'title'=>'Patient Details',
        		    'id' => 'modalPatDet',
        		    'size'=>'modal-lg'
        		]);
        		
        		echo "<div id = 'modalContentPatDet'></div>";
        		
        		Modal::end()
        		
        		
            ?>
    
    		<?php
    		      Modal::begin(['id' =>'modal','title'=>'Patient Details','size'=>'modal-lg']);
    		      
                Modal::end();
            ?>
    
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
                    /*
                    [
                        'header'=>'Health Record No.',
                        'value' => function ($model) {
                        return Html::a($model->hpercode, ['patientdetails','hperid'=>$model->hpercode,'encid'=>$model->enccode,'docointkey'=>$model->docointkey], ['class' => 'popupModal']);
                        },
                    'format' => 'raw'
                    ],
                    */
                    [
                        'label'=>'Room',
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return PatiendetailsController::Room($model->enccode);
                    },
                    ],
                    [
                        'label'=>'Patient Name',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return PatiendetailsController::Fullname($model->hpercode);
                        },
                    ],
                    
                   
                    //'dodate',
                    //'pcchrgcod',
                    
                    
                    [
                        'label'=>'Diet',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            $modeldocord = Hdocord::find()->where(['enccode'=>$model->enccode])->andWhere(['orcode'=>'DIETT'])->orderBy(['dodate'=>SORT_DESC])->one();
                            //return $modeldocord->dietcode;
                            $modeldiet = Hdiet::find()->where(['dietcode' => $modeldocord->dietcode])->one();
                            return $modeldiet->dietdesc;
                        },
                    ],
                    
                    [
                        'label'=>'Ordered By',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return HproviderController::Fullname($model->entby);
                    },
                    ],
                    
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>
    
    
    
    

</div>


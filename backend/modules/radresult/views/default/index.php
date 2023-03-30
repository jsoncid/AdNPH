<?php

use yii\bootstrap4\Modal;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use backend\assets\BackendAsset;

/**
 * @var yii\web\View $this
 * @var backend\modules\radresult\models\PhoRadResultSearch $searchModel
 * @var backend\modules\radresult\models\PhoRadOptionValueSearch  $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */
BackendAsset::register($this);
$this->title = 'Radiology Result';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJS('$(".modal").modal({backdrop:"static",keyboard:"false"})');

?>
<div class="pho-labresult-index">
    <div class="card">
        <div class="card-header">
        <p>
        
       <!--     Html::a('Create Lab Result', ['create'], ['class' => 'btn btn-success']) ?> -->
       	<?php echo Html::button('Create Radiology Result', ['value'=>Url::to('default/create'),'class' => 'btn btn-success', 'id' =>'modalButton']); 
       	
       	  
       	
       	?>
         
            </p>
              <?php
                    Modal::begin([
                                  'title' => '<h4>Create Laboratory Result </h4>',
                                    'id' => 'modal',
                                    'size' => 'modal-lg',
                    ]);
                    
                    echo "<div id= 'modalContent0'></div>";
                    
                    Modal::end();
                    ?>
                    
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
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                 
                    //'rf_id',
                    'enccode',
                   
                   
                    
                    'date',
                    'added_by',
                    //'rt_id',
                    //'remarks',
                    ['class' => 'yii\grid\ActionColumn',
                        'header' => 'Actions',
                        'template' => '{view} {update} {delete} {custom}',
                       
                    
                        
                        
                    ],
                ],   
            ]); 
         
            ?>
            
         
       
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>

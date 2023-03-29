<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var backend\modules\labresult\models\LabresultSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Pho Labresults';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pho-labresult-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Create Pho Labresult', ['create'], ['class' => 'btn btn-success']) ?>
            <?php echo    Html::button('Create Lab Result', ['value'=>Url::to('index.php?default/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
        </div>

        <div class="card-body p-0">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
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

                    'rf_id',
                    'file',
                    'date',
                    'added_by',
                    'rt_id',
                    // 'enccode',
                    
                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>

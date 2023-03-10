<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var backend\modules\records\models\PhoRecordsFilling $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Pho Records Fillings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pho-records-filling-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Create Pho Records Filling', ['create'], ['class' => 'btn btn-success']) ?>
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

                    'rf',
                    'enccode:ntext',
                    'is_received',
                    'is_scanned',
                    'is_forward_to_claims',
                    // 'received_by',
                    // 'scanned_by',
                    // 'forward_to_claims_by',
                    // 'update_received_by',
                    // 'update_scanned_by',
                    // 'update_forward_to_claims_by',
                    // 'date_received_by',
                    // 'date_scanned_by',
                    // 'date_forward_to_claims',
                    // 'date_update_received',
                    // 'date_update_scanned',
                    // 'date_update_forward_to',
                    
                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>

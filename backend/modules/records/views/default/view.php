<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\PhoRecordsFilling $model
 */

$this->title = $model->rf;
$this->params['breadcrumbs'][] = ['label' => 'Pho Records Fillings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pho-records-filling-view">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Update', ['update', 'rf' => $model->rf], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a('Delete', ['delete', 'rf' => $model->rf], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
        <div class="card-body">
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'rf',
                    'enccode:ntext',
                    'is_received',
                    'is_scanned',
                    'is_forward_to_claims',
                    'received_by',
                    'scanned_by',
                    'forward_to_claims_by',
                    'update_received_by',
                    'update_scanned_by',
                    'update_forward_to_claims_by',
                    'date_received_by',
                    'date_scanned_by',
                    'date_forward_to_claims',
                    'date_update_received',
                    'date_update_scanned',
                    'date_update_forward_to',
                    
                ],
            ]) ?>
        </div>
    </div>
</div>

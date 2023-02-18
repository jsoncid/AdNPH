<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\PhoRecordsEncoding $model
 */

$this->title = $model->re_id;
$this->params['breadcrumbs'][] = ['label' => 'Pho Records Encodings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pho-records-encoding-view">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Update', ['update', 're_id' => $model->re_id], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a('Delete', ['delete', 're_id' => $model->re_id], [
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
                    're_id',
                    'enccode:ntext',
                    'hospital_num:ntext',
                    'final_diagnosis:ntext',
                    'additional_final_diagnosis:ntext',
                    'disdate',
                    'remarks:ntext',
                    'created_date',
                    'created_by',
                    'is_active',
                    
                ],
            ]) ?>
        </div>
    </div>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var backend\models\Library $model
 */

$this->title = $model->Book_ID;
$this->params['breadcrumbs'][] = ['label' => 'Libraries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-view">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Update', ['update', 'Book_ID' => $model->Book_ID], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a('Delete', ['delete', 'Book_ID' => $model->Book_ID], [
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
                    'Book_ID',
                    'Book_name',
                    'Book_Descrip',
                    
                ],
            ]) ?>
        </div>
    </div>
</div>

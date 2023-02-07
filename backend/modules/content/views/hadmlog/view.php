<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Hadmlog $model
 */

$this->title = $model->enccode;
$this->params['breadcrumbs'][] = ['label' => 'Hadmlogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hadmlog-view">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Update', ['update', 'enccode' => $model->enccode], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a('Delete', ['delete', 'enccode' => $model->enccode], [
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
                    'enccode',
                    'hpercode',
                    'upicode',
                    'casenum',
                    'patage',
                    'newold',
                    'tacode',
                    'tscode',
                    'admdate',
                    'admtime',
                    'diagcode',
                    'admnotes',
                    'licno',
                    'diagfin',
                    'disnotes',
                    'admmode',
                    'admpreg',
                    'disdate',
                    'distime',
                    'dispcode',
                    'condcode',
                    'licnof',
                    'licncons',
                    'cbcode',
                    'dcspinst',
                    'admstat',
                    'admlock',
                    'datemod',
                    'updsw',
                    'confdl',
                    'admtxt',
                    'admclerk',
                    'licno2',
                    'licno3',
                    'licno4',
                    'licno5',
                    'patagemo',
                    'patagedy',
                    'patagehr',
                    'admphic',
                    'disnotice',
                    'treatment:ntext',
                    'hsepriv',
                    'licno6',
                    'licno7',
                    'licno8',
                    'licno9',
                    'licno10',
                    'itisind',
                    'entryby',
                    'pexpireddate',
                    'acis',
                    'watchid',
                    'lockby',
                    'lockdte',
                    'typadm',
                    'pho_hospital_number:ntext',
                    
                ],
            ]) ?>
        </div>
    </div>
</div>

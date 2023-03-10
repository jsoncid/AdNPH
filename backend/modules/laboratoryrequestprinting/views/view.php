<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Hdocord $model
 */

$this->title = $model->docointkey;
$this->params['breadcrumbs'][] = ['label' => 'Hdocords', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hdocord-view">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Update', ['update', 'docointkey' => $model->docointkey], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a('Delete', ['delete', 'docointkey' => $model->docointkey], [
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
                    'docointkey',
                    'enccode',
                    'dodate',
                    'dotime',
                    'licno',
                    'ordcon',
                    'orcode',
                    'hpercode',
                    'upicode',
                    'dopriority',
                    'dodtepost',
                    'dotmepost',
                    'dostat',
                    'dolock',
                    'datemod',
                    'updsw',
                    'confdl',
                    'donotes',
                    'entby',
                    'verby',
                    'ordreas',
                    'doctype',
                    'orderupd',
                    'intkeyref',
                    'proccode',
                    'orstat',
                    'statdate',
                    'stattime',
                    'pchrgup',
                    'currency',
                    'uomcode',
                    'pcchrgcod',
                    'pchrgqty',
                    'pcchrgamt',
                    'pcdisch',
                    'acctno',
                    'estatus',
                    'ordsrc',
                    'prikey',
                    'entryby',
                    'opergrp',
                    'incision_mode',
                    'dietcode',
                    'compense',
                    'rfee1',
                    'rfee2',
                    'rfee3',
                    'rem1',
                    'discount',
                    'disamt',
                    'discbal',
                    'phicamt',
                    'chrgtype',
                    'coldte',
                    'lbno',
                    'recdte',
                    'resdte',
                    'reldte',
                    'paystat',
                    'csamt',
                    'ncamt',
                    'paidamt',
                    'bdate',
                    'gender',
                    'apprv',
                    'apprvby',
                    'apprvdte',
                    'apprvrmrks',
                    
                ],
            ]) ?>
        </div>
    </div>
</div>

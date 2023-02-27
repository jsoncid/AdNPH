<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PhoTransmittal */

$this->title = 'Update Pho Transmittal: ' . ' ' . $model->tid;
$this->params['breadcrumbs'][] = ['label' => 'Pho Transmittals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tid, 'url' => ['view', 'id' => $model->tid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pho-transmittal-update">

    <?php echo $this->render('_formreceived', [
        'model' => $model,
    ]) ?>

</div>

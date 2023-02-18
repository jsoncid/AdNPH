<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PhoTransmittal */

$this->title = 'Create Pho Transmittal';
$this->params['breadcrumbs'][] = ['label' => 'Pho Transmittals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pho-transmittal-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]) ?>

</div>

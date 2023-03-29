<?php

/**
 * @var yii\web\View $this
 * @var common\models\PhoLabresult  $model
 * @var common\models\OptionValue $modelsoption
 */

$this->title = 'Update Pho Labresult: ' . ' ' .  $model ->rf_id;
$this->params['breadcrumbs'][] = ['label' => 'Pho Labresults', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' =>  $model->rf_id, 'url' => ['view', 'id' =>  $model ->rf_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pho-labresult-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'modelsoption' => $modelsoption,
    ]) ?>

</div>

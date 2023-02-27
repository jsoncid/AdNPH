<?php

/**
 * @var yii\web\View $this
 * @var common\models\PhoRecordsFilling $model
 */

$this->title = 'Create Pho Records Filling';
$this->params['breadcrumbs'][] = ['label' => 'Pho Records Fillings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pho-records-filling-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

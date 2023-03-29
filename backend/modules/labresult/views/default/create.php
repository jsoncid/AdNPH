<?php

/**
 * @var yii\web\View $this
 * @var common\models\PhoLabresult $model
 * @var common\models\OptionValue $modelsoption
 */

$this->title = 'Create Pho Labresult';
$this->params['breadcrumbs'][] = ['label' => 'Pho Labresults', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pho-labresult-create">

    <?php echo $this->render('_form', [
        'model' =>  $model,
    ]) ?>







<?php
$this->registerJS('$(".modal").modal({backdrop:"static",keyboard:"false"})');
?>


</div>

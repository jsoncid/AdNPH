<?php

/**
 * @var yii\web\View $this
 * @var common\models\PhoRadResult $model
 */

$this->title = 'Create Pho Rad Result';
$this->params['breadcrumbs'][] = ['label' => 'Pho Rad Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pho-rad-result-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

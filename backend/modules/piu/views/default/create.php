<?php

/**
 * @var yii\web\View $this
 * @var common\models\Hperson $model
 */

$this->title = 'Create Hperson';
$this->params['breadcrumbs'][] = ['label' => 'Hpeople', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hperson-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

/**
 * @var yii\web\View $this
 * @var common\models\PhoRecordsEncoding $model
 */

$this->title = 'Create Pho Records Encoding';
$this->params['breadcrumbs'][] = ['label' => 'Pho Records Encodings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pho-records-encoding-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

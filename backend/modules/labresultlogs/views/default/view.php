<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Pholabresultlogs $logs
 */

$this->title = $model->rf_id_logs;
$this->params['breadcrumbs'][] = ['label' => 'Pholabresultlogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<table class="table">
    <thead>
        <tr>
            <th>Level</th>
            <th>Category</th>
            <th>Message</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($logs as $log): ?>
            <tr>
                <td><?= $log['level'] ?></td>
                <td><?= $log['category'] ?></td>
                <td><?= $log['message'] ?></td>
                <td><?= date('Y-m-d H:i:s', $log['timestamp']) ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

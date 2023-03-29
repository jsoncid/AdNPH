<?php
use yii\helpers\Html;


echo '<div class="modal-header">';
echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';

echo '</div>';
echo '<div class="modal-body">';
echo '<p>' . Html::encode($model->description) . '</p>';
echo '</div>';
echo '<div class="modal-footer">';
echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
echo '</div>';
echo '<p> '.Html::encode($id->rf_id).  '</p>';
?>
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;
use yii2assets\pdfjs\PdfJs;



/**
 * @var yii\web\View $this
 * @var common\models\PhoLabresult $model
 * @var yii\bootstrap4\ActiveForm $form
 */






?>





    <?= \yii2assets\pdfjs\PdfJs::widget([
        'url'=> 'upfiles/result',$model->file,
]); ?>
         
    
   
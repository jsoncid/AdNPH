<?php

use common\grid\EnumColumn;
use common\models\Page;
use yii\grid\GridView;
use yii\helpers\Html;

/**
 * @var $this         yii\web\View
 * @var $searchModel  \backend\models\search\PageSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        common\models\Page
 */

$this->title = Yii::t('backend', 'Nurse Station Patients');

$this->params['breadcrumbs'][] = $this->title;

?>



<div class="row">
    <div class="col-lg-3 col-6">
            <div class="small-box bg-info">              
                <div class="inner">
                <h3>OB-GYN</h3>
                    <h4>20</h4>
                </div>
                
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
    </div>

    <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                <h3>Medicine</h3>
                    <p>New Orders</p>
                </div>
                
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
    </div>

    <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                <h3>Surgery</h3>
                    <p>New Orders</p>
                </div>
                
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
    </div>

    <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                <h3>Pedia</h3>
                    <p>New Orders</p>
                </div>
                
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
    </div>

    <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                <h3>Respiratory/TTMF</h3>
                    <p>New Orders</p>
                </div>
                
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
    </div>




</div>
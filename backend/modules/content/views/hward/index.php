<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Hroom;
use common\models\Hpatroom;


/**
 * @var yii\web\View $this
 * @var backend\modules\content\models\HwardSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Hospital Wards';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hward-index">
    
    <?php
            foreach ($dataProvider->models as $model) {
                //echo "addMarker({$model->wardname}, {$model->wardname});";
     ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo $model->wardname;?></h3>
                                
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                    <th style="width: 150px">#</th>
                                    <th >Room Name</th>
                                    <th style="width: 150px">Capacity</th>
                                    <th style="width: 150px">Occupied</th>
                                    <th style="width: 150px">Vacant</th>
                                    </tr>
                                    </thead>
                                        <tbody>
                                            
                                            <?php
                                                $modelroom = Hroom::find()->where(['wardcode' => $model->wardcode])->all();
                                                foreach ($modelroom as $modelr) {
                                            ?>

                                                        <tr>
                                                            <td><?php echo $modelr->rmcode; ?></td>
                                                            <td><?php echo $modelr->rmname; ?></td>
                                                            <td><?php echo $modelr->rmbed; ?></td>
                                                            <td>
                                                                <?php 
                                                                    //echo Hpatroom::find()->where(['rmintkey' => $modelr->rmintkey])->count();
                                                                    //echo Hadmlog::find()->with(['hpatroom', 'country'])->all()
                                                                    $occupied = Hpatroom::find()
                                                                        ->innerJoin('hadmlog', '`hadmlog`.`enccode` = `hpatroom`.`enccode`')
                                                                        ->where(['hadmlog.disdate' => null])
                                                                        ->andWhere(['hpatroom.rmintkey' => $modelr->rmintkey])
                                                                        ->with('hadmlog')
                                                                        ->count();
                                                                    echo $occupied;
                                                                ?>
                                                            </td>
                                                            <td><?php echo $modelr->rmbed-$occupied; ?></td>
                                                        </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                </table>
                            </div>

                        </div>

    <?php
            }
    ?>
</div>

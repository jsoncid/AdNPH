<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hpatchrg".
 *
 * @property string $enccode
 * @property string $hpercode
 * @property string|null $upicode
 * @property string $pcchrgcod
 * @property string $pcchrgdte
 * @property string $chargcode
 * @property string|null $uomcode
 * @property float|null $pchrgqty
 * @property float|null $pchrgup
 * @property float $pcchrgamt
 * @property string|null $pcstat
 * @property string|null $pclock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string $confdl
 * @property string $srcchrg
 * @property string|null $pcdisch
 * @property string $acctno
 * @property string $itemcode
 * @property string|null $docointkey
 * @property string|null $setorbid
 * @property float|null $displayorder
 * @property string|null $entryby
 * @property int|null $opergrp
 * @property string|null $incision_mode
 * @property string|null $orinclst
 * @property string|null $compense
 * @property string|null $proccode
 * @property string|null $discount
 * @property float|null $disamt
 * @property float|null $discbal
 * @property float|null $phicamt
 * @property string|null $rvscode
 * @property float|null $qtyintake
 * @property string|null $uomintake
 * @property int|null $time_frequency
 * @property string|null $unit_frequency
 *
 * @property Henctr $enccode0
 * @property Hperson $hpercode0
 */
class Hpatchrg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hpatchrg';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enccode', 'pcchrgcod', 'pcchrgdte', 'chargcode', 'pcchrgamt', 'itemcode'], 'required'],
            [['pcchrgdte', 'datemod'], 'safe'],
            [['pchrgqty', 'pchrgup', 'pcchrgamt', 'displayorder', 'disamt', 'discbal', 'phicamt', 'qtyintake'], 'number'],
            [['opergrp', 'time_frequency'], 'integer'],
            [['enccode'], 'string', 'max' => 48],
            [['hpercode'], 'string', 'max' => 20],
            [['upicode'], 'string', 'max' => 12],
            [['pcchrgcod', 'entryby', 'proccode'], 'string', 'max' => 10],
            [['chargcode', 'uomcode', 'srcchrg', 'incision_mode', 'rvscode', 'uomintake'], 'string', 'max' => 5],
            [['pcstat', 'pclock', 'updsw', 'confdl', 'pcdisch', 'orinclst', 'compense', 'discount'], 'string', 'max' => 1],
            [['acctno'], 'string', 'max' => 14],
            [['itemcode'], 'string', 'max' => 41],
            [['docointkey'], 'string', 'max' => 100],
            [['setorbid'], 'string', 'max' => 4],
            [['unit_frequency'], 'string', 'max' => 3],
            [['enccode', 'pcchrgcod', 'chargcode', 'itemcode'], 'unique', 'targetAttribute' => ['enccode', 'pcchrgcod', 'chargcode', 'itemcode']],
            [['enccode'], 'exist', 'skipOnError' => true, 'targetClass' => Henctr::className(), 'targetAttribute' => ['enccode' => 'enccode']],
            [['hpercode'], 'exist', 'skipOnError' => true, 'targetClass' => Hperson::className(), 'targetAttribute' => ['hpercode' => 'hpercode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'enccode' => 'Enccode',
            'hpercode' => 'Hpercode',
            'upicode' => 'Upicode',
            'pcchrgcod' => 'Pcchrgcod',
            'pcchrgdte' => 'Pcchrgdte',
            'chargcode' => 'Chargcode',
            'uomcode' => 'Uomcode',
            'pchrgqty' => 'Pchrgqty',
            'pchrgup' => 'Pchrgup',
            'pcchrgamt' => 'Pcchrgamt',
            'pcstat' => 'Pcstat',
            'pclock' => 'Pclock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'confdl' => 'Confdl',
            'srcchrg' => 'Srcchrg',
            'pcdisch' => 'Pcdisch',
            'acctno' => 'Acctno',
            'itemcode' => 'Itemcode',
            'docointkey' => 'Docointkey',
            'setorbid' => 'Setorbid',
            'displayorder' => 'Displayorder',
            'entryby' => 'Entryby',
            'opergrp' => 'Opergrp',
            'incision_mode' => 'Incision Mode',
            'orinclst' => 'Orinclst',
            'compense' => 'Compense',
            'proccode' => 'Proccode',
            'discount' => 'Discount',
            'disamt' => 'Disamt',
            'discbal' => 'Discbal',
            'phicamt' => 'Phicamt',
            'rvscode' => 'Rvscode',
            'qtyintake' => 'Qtyintake',
            'uomintake' => 'Uomintake',
            'time_frequency' => 'Time Frequency',
            'unit_frequency' => 'Unit Frequency',
        ];
    }

    /**
     * Gets query for [[Enccode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnccode0()
    {
        return $this->hasOne(Henctr::className(), ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpercode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpercode0()
    {
        return $this->hasOne(Hperson::className(), ['hpercode' => 'hpercode']);
    }
}

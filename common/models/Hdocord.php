<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hdocord".
 *
 * @property string $docointkey
 * @property string $enccode
 * @property string $dodate
 * @property string $dotime
 * @property string $licno
 * @property string $ordcon
 * @property string $orcode
 * @property string $hpercode
 * @property string|null $upicode
 * @property string $dopriority
 * @property string $dodtepost
 * @property string $dotmepost
 * @property string|null $dostat
 * @property string|null $dolock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string $confdl
 * @property string|null $donotes
 * @property string|null $entby
 * @property string|null $verby
 * @property string|null $ordreas
 * @property string $doctype
 * @property string|null $orderupd
 * @property string|null $intkeyref
 * @property string|null $proccode
 * @property string|null $orstat
 * @property string|null $statdate
 * @property string|null $stattime
 * @property float|null $pchrgup
 * @property string|null $currency
 * @property string|null $uomcode
 * @property string|null $pcchrgcod
 * @property float|null $pchrgqty
 * @property float|null $pcchrgamt
 * @property string|null $pcdisch
 * @property string|null $acctno
 * @property string|null $estatus
 * @property string|null $ordsrc
 * @property string|null $prikey
 * @property string|null $entryby
 * @property int|null $opergrp
 * @property string|null $incision_mode
 * @property string|null $dietcode
 * @property string|null $compense
 * @property float|null $rfee1
 * @property float|null $rfee2
 * @property float|null $rfee3
 * @property string|null $rem1
 * @property string|null $discount
 * @property float|null $disamt
 * @property float|null $discbal
 * @property float|null $phicamt
 * @property string|null $chrgtype
 * @property string|null $coldte
 * @property string|null $lbno
 * @property string|null $recdte
 * @property string|null $resdte
 * @property string|null $reldte
 * @property string|null $paystat
 * @property float|null $csamt
 * @property float|null $ncamt
 * @property float|null $paidamt
 * @property string|null $bdate
 * @property string|null $gender
 * @property string|null $apprv
 * @property string|null $apprvby
 * @property string|null $apprvdte
 * @property string|null $apprvrmrks
 *
 * @property Henctr $enccode0
 * @property Henctr $enccode1
 * @property Hpersonal $entby0
 * @property Hpersonal $entryby0
 * @property Hperson $hpercode0
 * @property Hprovider $licno0
 * @property Hproc $prikey0
 * @property Hprocm $proccode0
 * @property Hpersonal $verby0
 */
class Hdocord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hdocord';
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
            [['docointkey', 'dodate', 'dotime', 'dodtepost', 'dotmepost'], 'required'],
            [['dodate', 'dotime', 'dodtepost', 'dotmepost', 'datemod', 'statdate', 'stattime', 'coldte', 'recdte', 'resdte', 'reldte', 'bdate', 'apprvdte'], 'safe'],
            [['pchrgup', 'pchrgqty', 'pcchrgamt', 'rfee1', 'rfee2', 'rfee3', 'disamt', 'discbal', 'phicamt', 'csamt', 'ncamt', 'paidamt'], 'number'],
            [['opergrp'], 'integer'],
            [['docointkey', 'intkeyref', 'apprvrmrks'], 'string', 'max' => 100],
            [['enccode'], 'string', 'max' => 48],
            [['licno'], 'string', 'max' => 15],
            [['ordcon', 'orcode', 'doctype', 'orderupd', 'currency', 'uomcode', 'incision_mode', 'dietcode'], 'string', 'max' => 5],
            [['hpercode'], 'string', 'max' => 20],
            [['upicode'], 'string', 'max' => 12],
            [['dopriority', 'entby', 'verby', 'proccode', 'orstat', 'pcchrgcod', 'entryby', 'lbno', 'apprvby'], 'string', 'max' => 10],
            [['dostat', 'dolock', 'updsw', 'confdl', 'pcdisch', 'estatus', 'compense', 'discount', 'paystat', 'gender', 'apprv'], 'string', 'max' => 1],
            [['donotes', 'ordreas'], 'string', 'max' => 255],
            [['acctno'], 'string', 'max' => 14],
            [['ordsrc'], 'string', 'max' => 2],
            [['prikey'], 'string', 'max' => 41],
            [['rem1'], 'string', 'max' => 200],
            [['chrgtype'], 'string', 'max' => 3],
            [['docointkey'], 'unique'],
            [['enccode'], 'exist', 'skipOnError' => true, 'targetClass' => Henctr::class, 'targetAttribute' => ['enccode' => 'enccode']],
            [['entby'], 'exist', 'skipOnError' => true, 'targetClass' => Hpersonal::class, 'targetAttribute' => ['entby' => 'employeeid']],
            [['entryby'], 'exist', 'skipOnError' => true, 'targetClass' => Hpersonal::class, 'targetAttribute' => ['entryby' => 'employeeid']],
            [['licno'], 'exist', 'skipOnError' => true, 'targetClass' => Hprovider::class, 'targetAttribute' => ['licno' => 'licno']],
            [['prikey'], 'exist', 'skipOnError' => true, 'targetClass' => Hproc::class, 'targetAttribute' => ['prikey' => 'prikey']],
            [['proccode'], 'exist', 'skipOnError' => true, 'targetClass' => Hprocm::class, 'targetAttribute' => ['proccode' => 'proccode']],
            [['verby'], 'exist', 'skipOnError' => true, 'targetClass' => Hpersonal::class, 'targetAttribute' => ['verby' => 'employeeid']],
            [['enccode'], 'exist', 'skipOnError' => true, 'targetClass' => Henctr::class, 'targetAttribute' => ['enccode' => 'enccode']],
            [['hpercode'], 'exist', 'skipOnError' => true, 'targetClass' => Hperson::class, 'targetAttribute' => ['hpercode' => 'hpercode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'docointkey' => 'Docointkey',
            'enccode' => 'Enccode',
            'dodate' => 'Date/Time of Request',
            'dotime' => 'Dotime',
            'licno' => 'Licno',
            'ordcon' => 'Ordcon',
            'orcode' => 'Orcode',
            'hpercode' => 'Health Record No.',
            'upicode' => 'Upicode',
            'dopriority' => 'Dopriority',
            'dodtepost' => 'Dodtepost',
            'dotmepost' => 'Dotmepost',
            'dostat' => 'Dostat',
            'dolock' => 'Dolock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'confdl' => 'Confdl',
            'donotes' => 'Donotes',
            'entby' => 'Ordered By',
            'verby' => 'Verby',
            'ordreas' => 'Ordreas',
            'doctype' => 'Doctype',
            'orderupd' => 'Orderupd',
            'intkeyref' => 'Intkeyref',
            'proccode' => 'Proccode',
            'orstat' => 'Orstat',
            'statdate' => 'Statdate',
            'stattime' => 'Stattime',
            'pchrgup' => 'Pchrgup',
            'currency' => 'Currency',
            'uomcode' => 'Uomcode',
            'pcchrgcod' => 'Charge Slip No.',
            'pchrgqty' => 'Pchrgqty',
            'pcchrgamt' => 'Pcchrgamt',
            'pcdisch' => 'Pcdisch',
            'acctno' => 'Acctno',
            'estatus' => 'Estatus',
            'ordsrc' => 'Ordsrc',
            'prikey' => 'Prikey',
            'entryby' => 'Entryby',
            'opergrp' => 'Opergrp',
            'incision_mode' => 'Incision Mode',
            'dietcode' => 'Dietcode',
            'compense' => 'Compense',
            'rfee1' => 'Rfee1',
            'rfee2' => 'Rfee2',
            'rfee3' => 'Rfee3',
            'rem1' => 'Rem1',
            'discount' => 'Discount',
            'disamt' => 'Disamt',
            'discbal' => 'Discbal',
            'phicamt' => 'Phicamt',
            'chrgtype' => 'Chrgtype',
            'coldte' => 'Coldte',
            'lbno' => 'Lbno',
            'recdte' => 'Recdte',
            'resdte' => 'Resdte',
            'reldte' => 'Reldte',
            'paystat' => 'Paystat',
            'csamt' => 'Csamt',
            'ncamt' => 'Ncamt',
            'paidamt' => 'Paidamt',
            'bdate' => 'Bdate',
            'gender' => 'Gender',
            'apprv' => 'Apprv',
            'apprvby' => 'Apprvby',
            'apprvdte' => 'Apprvdte',
            'apprvrmrks' => 'Apprvrmrks',
        ];
    }

    /**
     * Gets query for [[Enccode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnccode0()
    {
        return $this->hasOne(Henctr::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Enccode1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnccode1()
    {
        return $this->hasOne(Henctr::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Entby0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntby0()
    {
        return $this->hasOne(Hpersonal::class, ['employeeid' => 'entby']);
    }

    /**
     * Gets query for [[Entryby0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntryby0()
    {
        return $this->hasOne(Hpersonal::class, ['employeeid' => 'entryby']);
    }

    /**
     * Gets query for [[Hpercode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpercode0()
    {
        return $this->hasOne(Hperson::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Licno0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicno0()
    {
        return $this->hasOne(Hprovider::class, ['licno' => 'licno']);
    }

    /**
     * Gets query for [[Prikey0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrikey0()
    {
        return $this->hasOne(Hproc::class, ['prikey' => 'prikey']);
    }

    /**
     * Gets query for [[Proccode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProccode0()
    {
        return $this->hasOne(Hprocm::class, ['proccode' => 'proccode']);
    }

    /**
     * Gets query for [[Verby0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVerby0()
    {
        return $this->hasOne(Hpersonal::class, ['employeeid' => 'verby']);
    }
}

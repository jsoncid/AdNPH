<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "herlog".
 *
 * @property string $enccode
 * @property string $hpercode
 * @property string|null $upicode
 * @property float|null $patage
 * @property string|null $tacode
 * @property string|null $tscode
 * @property string $erdate
 * @property string $ertime
 * @property string|null $erbrouby
 * @property string|null $ernotify
 * @property string|null $erfamdoc
 * @property string|null $ercond
 * @property string|null $dispcode
 * @property string|null $condcode
 * @property string|null $licno
 * @property string|null $diagfin
 * @property string|null $ernotes
 * @property string|null $erstat
 * @property string|null $erlock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string|null $confdl
 * @property string|null $casenum
 * @property float|null $patagemo
 * @property float|null $patagedy
 * @property float|null $patagehr
 * @property string|null $entryby
 * @property string|null $erdtedis
 * @property string|null $ertmedis
 * @property string|null $ercase
 * @property string|null $caseiden
 * @property string|null $empclerk
 * @property string|null $empcdate
 * @property string|null $empclkupd
 * @property string|null $empcdupd
 * @property string|null $resadmit
 * @property string|null $medicolegal
 * @property string|null $oldnew
 * @property string|null $timearrive
 * @property string|null $newold
 * @property string|null $itisind
 * @property string|null $acis
 * @property string|null $surveycase
 * @property string|null $reffrom
 * @property string|null $relcase
 * @property string|null $kpdte
 * @property string|null $fctype
 * @property string|null $ircdesc
 * @property string|null $injdte
 * @property string|null $agegrp
 * @property string|null $rec_mode
 * @property string|null $rec_dte
 * @property string|null $rec_by
 * @property string|null $erphic
 * @property string|null $ertxt
 * @property string|null $TmeSeenDr
 *
 * @property Henctr $enccode0
 * @property Hperson $hpercode0
 */
class Herlog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'herlog';
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
            [['enccode', 'erdate', 'ertime'], 'required'],
            [['patage', 'patagemo', 'patagedy', 'patagehr'], 'number'],
            [['erdate', 'ertime', 'datemod', 'erdtedis', 'ertmedis', 'empcdate', 'empcdupd', 'timearrive', 'injdte', 'rec_dte', 'TmeSeenDr'], 'safe'],
            [['enccode'], 'string', 'max' => 48],
            [['hpercode', 'casenum', 'reffrom'], 'string', 'max' => 20],
            [['upicode'], 'string', 'max' => 12],
            [['tacode', 'tscode', 'erbrouby', 'ercond', 'dispcode', 'condcode', 'erphic'], 'string', 'max' => 5],
            [['ernotify', 'erstat', 'erlock', 'updsw', 'confdl', 'ercase', 'caseiden', 'medicolegal', 'oldnew', 'newold', 'itisind', 'acis', 'relcase', 'agegrp', 'rec_mode'], 'string', 'max' => 1],
            [['erfamdoc'], 'string', 'max' => 100],
            [['licno', 'diagfin', 'empclerk', 'empclkupd', 'fctype'], 'string', 'max' => 15],
            [['ernotes', 'resadmit', 'ertxt'], 'string', 'max' => 255],
            [['entryby', 'surveycase', 'rec_by'], 'string', 'max' => 10],
            [['kpdte'], 'string', 'max' => 4],
            [['ircdesc'], 'string', 'max' => 3],
            [['enccode'], 'unique'],
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
            'enccode' => 'Enccode',
            'hpercode' => 'Hpercode',
            'upicode' => 'Upicode',
            'patage' => 'Patage',
            'tacode' => 'Tacode',
            'tscode' => 'Tscode',
            'erdate' => 'Erdate',
            'ertime' => 'Ertime',
            'erbrouby' => 'Erbrouby',
            'ernotify' => 'Ernotify',
            'erfamdoc' => 'Erfamdoc',
            'ercond' => 'Ercond',
            'dispcode' => 'Dispcode',
            'condcode' => 'Condcode',
            'licno' => 'Licno',
            'diagfin' => 'Diagfin',
            'ernotes' => 'Ernotes',
            'erstat' => 'Erstat',
            'erlock' => 'Erlock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'confdl' => 'Confdl',
            'casenum' => 'Casenum',
            'patagemo' => 'Patagemo',
            'patagedy' => 'Patagedy',
            'patagehr' => 'Patagehr',
            'entryby' => 'Entryby',
            'erdtedis' => 'Erdtedis',
            'ertmedis' => 'Ertmedis',
            'ercase' => 'Ercase',
            'caseiden' => 'Caseiden',
            'empclerk' => 'Empclerk',
            'empcdate' => 'Empcdate',
            'empclkupd' => 'Empclkupd',
            'empcdupd' => 'Empcdupd',
            'resadmit' => 'Resadmit',
            'medicolegal' => 'Medicolegal',
            'oldnew' => 'Oldnew',
            'timearrive' => 'Timearrive',
            'newold' => 'Newold',
            'itisind' => 'Itisind',
            'acis' => 'Acis',
            'surveycase' => 'Surveycase',
            'reffrom' => 'Reffrom',
            'relcase' => 'Relcase',
            'kpdte' => 'Kpdte',
            'fctype' => 'Fctype',
            'ircdesc' => 'Ircdesc',
            'injdte' => 'Injdte',
            'agegrp' => 'Agegrp',
            'rec_mode' => 'Rec Mode',
            'rec_dte' => 'Rec Dte',
            'rec_by' => 'Rec By',
            'erphic' => 'Erphic',
            'ertxt' => 'Ertxt',
            'TmeSeenDr' => 'Tme Seen Dr',
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
     * Gets query for [[Hpercode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpercode0()
    {
        return $this->hasOne(Hperson::class, ['hpercode' => 'hpercode']);
    }
}

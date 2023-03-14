<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hperson".
 *
 * @property string|null $hpatkey
 * @property string $hfhudcode
 * @property string $hpercode
 * @property string|null $hpatcode
 * @property string|null $upicode
 * @property string|null $hhcode
 * @property string|null $relhhhead
 * @property string|null $resarrange
 * @property string|null $hspocode
 * @property string|null $hspoupi
 * @property string|null $upistcode
 * @property string $patlast
 * @property string $patfirst
 * @property string|null $patmiddle
 * @property string|null $patsuffix
 * @property string|null $patprefix
 * @property string|null $patdegree
 * @property string|null $patalias
 * @property string|null $patmaidnm
 * @property string|null $patbdate
 * @property string|null $patbplace
 * @property string $patsex
 * @property string|null $patcstat
 * @property string|null $patempstat
 * @property string|null $citcode
 * @property string|null $natcode
 * @property string|null $relcode
 * @property string|null $hfatcode
 * @property string|null $hfatupi
 * @property string|null $hmotcode
 * @property string|null $hmotupi
 * @property string|null $patmmdn
 * @property string|null $phicnum
 * @property string|null $patmedno
 * @property string|null $patemernme
 * @property string|null $patemaddr
 * @property string|null $pattelno
 * @property string|null $relemacode
 * @property string|null $f_dec
 * @property string|null $patstat
 * @property string|null $patlock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string $confdl
 * @property string|null $fm_dec
 * @property string|null $bldcode
 * @property string|null $entryby
 * @property string|null $fatlast
 * @property string|null $fatfirst
 * @property string|null $fatmid
 * @property string|null $motlast
 * @property string|null $motfirst
 * @property string|null $motmid
 * @property string|null $splast
 * @property string|null $spfirst
 * @property string|null $spmid
 * @property string|null $fataddr
 * @property string|null $motaddr
 * @property string|null $spaddr
 * @property string|null $fatsuffix
 * @property string|null $motsuffix
 * @property string|null $spsuffix
 * @property string|null $fatempname
 * @property string|null $fatempaddr
 * @property string|null $fatempeml
 * @property string|null $fatemptel
 * @property string|null $motempname
 * @property string|null $motempaddr
 * @property string|null $motempeml
 * @property string|null $motemptel
 * @property string|null $spempname
 * @property string|null $spempaddr
 * @property string|null $spempeml
 * @property string|null $spemptel
 * @property string|null $fattel
 * @property string|null $mottel
 * @property string|null $mssno
 * @property string|null $srcitizen
 * @property string|null $picname
 * @property string|null $s_dec
 * @property string|null $hospperson
 * @property string|null $hsmokingcs
 *
 * @property Henctr[] $enccodes
 * @property Hpersonal $entryby0
 * @property Haddr[] $haddrs
 * @property Hadmcons[] $hadmcons
 * @property Hadmlog[] $hadmlogs
 * @property Harq[] $harqs
 * @property Hblack[] $hblacks
 * @property Hccomp[] $hccomps
 * @property Hcert[] $hcerts
 * @property Hconfine[] $hconfines
 * @property Hcrsward[] $hcrswards
 * @property Hdcsched[] $hdcscheds
 * @property Hdedborn $hdedborn
 * @property Hdern $hdern
 * @property Hdocord[] $hdocords
 * @property Hdrugcos[] $hdrugcos
 * @property Hecase[] $hecases
 * @property Hemplyr[] $hemplyrs
 * @property Hencdiag[] $hencdiags
 * @property Henctr[] $henctrs
 * @property Henctr[] $henctrs0
 * @property Herlog[] $herlogs
 * @property Hfamexp[] $hfamexps
 * @property Hfamplan[] $hfamplans
 * @property Hfluid[] $hflus
 * @property Hlablog[] $hlablogs
 * @property Hlivebirth[] $hlivebirths
 * @property Hmrhisto[] $hmrhistos
 * @property Hmrsrev[] $hmrsrevs
 * @property Hmsslog[] $hmsslogs
 * @property Hnewborn[] $hnewborns
 * @property Hnurnote[] $hnurnotes
 * @property Holdnumber $holdnumber
 * @property Hopdlog[] $hopdlogs
 * @property Hpallert[] $hpallerts
 * @property Hpatacci[] $hpataccis
 * @property Hpatacct[] $hpataccts
 * @property Hpatacot[] $hpatacots
 * @property Hpatadj[] $hpatadjs
 * @property Hpatchrg[] $hpatchrgs
 * @property Hpatcon[] $hpatcons
 * @property Hpatdetl[] $hpatdetls
 * @property Hpatdied[] $hpatdieds
 * @property Hpatdisc[] $hpatdiscs
 * @property Hpatgrpchrg[] $hpatgrpchrgs
 * @property Hpatmss[] $hpatmsses
 * @property Hpatoccup[] $hpatoccups
 * @property Hpatout[] $hpatouts
 * @property Hpatroom[] $hpatrooms
 * @property Hpaychk[] $hpaychks
 * @property Hpaykind[] $hpaykinds
 * @property Hpay[] $hpays
 * @property Hperresp[] $hperresps
 * @property Hphcont[] $hphconts
 * @property Hphiclog[] $hphiclogs
 * @property Hphicsum[] $hphicsums
 * @property Hphtrn[] $hphtrns
 * @property Hphyexam[] $hphyexams
 * @property Hphyfin[] $hphyfins
 * @property Hplan[] $hplans
 * @property Hproclog[] $hproclogs
 * @property Hprofserv[] $hprofservs
 * @property Hprognte[] $hprogntes
 * @property Hpromise[] $hpromises
 * @property Hrefrom[] $hrefroms
 * @property Hrefto[] $hreftos
 * @property Hresact[] $hresacts
 * @property HreturnOld[] $hreturnOlds
 * @property Hrmres[] $hrmres
 * @property Hrqdissue[] $hrqdissues
 * @property Hrqdreturn[] $hrqdreturns
 * @property Hrqd[] $hrqds
 * @property Hrqd[] $hrqds0
 * @property Hrxoissue[] $hrxoissues
 * @property Hrxoreturn[] $hrxoreturns
 * @property Hrxo[] $hrxos
 * @property Hservelog[] $hservelogs
 * @property Hservlog[] $hservlogs
 * @property Hsupcos[] $hsupcos
 * @property Hsurgpat[] $hsurgpats
 * @property Htelep[] $hteleps
 * @property Hvisitlog[] $hvisitlogs
 * @property Hvitalsign[] $hvitalsigns
 * @property Hvsbp[] $hvsbps
 * @property Hvshr[] $hvshrs
 * @property Hvsintke[] $hvsintkes
 * @property Hvsothr[] $hvsothrs
 * @property Hvsoutpt[] $hvsoutpts
 * @property Hvsrr[] $hvsrrs
 * @property Hvsspec[] $hvsspecs
 * @property Hvstemp[] $hvstemps
 * @property Hwrdtrn[] $hwrdtrns
 */
class Hperson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hperson';
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
            [['hpercode'], 'required'],
            [['patbdate', 'datemod'], 'safe'],
            [['hpatkey'], 'string', 'max' => 30],
            [['hfhudcode'], 'string', 'max' => 19],
            [['hpercode', 'hpatcode', 'hhcode', 'hspocode', 'patdegree', 'hfatcode', 'hmotcode', 'phicnum', 'patmedno', 'pattelno', 'fatempeml', 'fatemptel', 'motempeml', 'motemptel', 'spempeml', 'spemptel', 'fattel', 'mottel', 'srcitizen', 'picname'], 'string', 'max' => 20],
            [['upicode', 'hspoupi', 'hfatupi', 'hmotupi'], 'string', 'max' => 12],
            [['relhhhead', 'resarrange', 'patsuffix', 'patprefix', 'patempstat', 'citcode', 'natcode', 'relcode', 'relemacode', 'fatsuffix', 'motsuffix', 'spsuffix'], 'string', 'max' => 5],
            [['upistcode', 'patsex', 'patcstat', 'f_dec', 'patstat', 'patlock', 'updsw', 'confdl', 'fm_dec', 's_dec', 'hospperson'], 'string', 'max' => 1],
            [['patlast', 'patfirst', 'patmiddle', 'fatlast', 'fatfirst', 'fatmid', 'motlast', 'motfirst', 'motmid', 'splast', 'spfirst', 'spmid', 'fatempname', 'motempname', 'spempname'], 'string', 'max' => 50],
            [['patalias', 'patmaidnm', 'patbplace', 'patmmdn', 'patemernme'], 'string', 'max' => 60],
            [['patemaddr'], 'string', 'max' => 100],
            [['bldcode', 'hsmokingcs'], 'string', 'max' => 3],
            [['entryby'], 'string', 'max' => 10],
            [['fataddr', 'motaddr', 'spaddr'], 'string', 'max' => 255],
            [['fatempaddr', 'motempaddr', 'spempaddr'], 'string', 'max' => 150],
            [['mssno'], 'string', 'max' => 15],
            [['hpercode'], 'unique'],
            [['hpatcode'], 'unique'],
            [['entryby'], 'exist', 'skipOnError' => true, 'targetClass' => Hpersonal::className(), 'targetAttribute' => ['entryby' => 'employeeid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'hpatkey' => 'Hpatkey',
            'hfhudcode' => 'Hfhudcode',
            'hpercode' => 'Hpercode',
            'hpatcode' => 'Hpatcode',
            'upicode' => 'Upicode',
            'hhcode' => 'Hhcode',
            'relhhhead' => 'Relhhhead',
            'resarrange' => 'Resarrange',
            'hspocode' => 'Hspocode',
            'hspoupi' => 'Hspoupi',
            'upistcode' => 'Upistcode',
            'patlast' => 'Patlast',
            'patfirst' => 'Patfirst',
            'patmiddle' => 'Patmiddle',
            'patsuffix' => 'Patsuffix',
            'patprefix' => 'Patprefix',
            'patdegree' => 'Patdegree',
            'patalias' => 'Patalias',
            'patmaidnm' => 'Patmaidnm',
            'patbdate' => 'Patbdate',
            'patbplace' => 'Patbplace',
            'patsex' => 'Patsex',
            'patcstat' => 'Patcstat',
            'patempstat' => 'Patempstat',
            'citcode' => 'Citcode',
            'natcode' => 'Natcode',
            'relcode' => 'Relcode',
            'hfatcode' => 'Hfatcode',
            'hfatupi' => 'Hfatupi',
            'hmotcode' => 'Hmotcode',
            'hmotupi' => 'Hmotupi',
            'patmmdn' => 'Patmmdn',
            'phicnum' => 'Phicnum',
            'patmedno' => 'Patmedno',
            'patemernme' => 'Patemernme',
            'patemaddr' => 'Patemaddr',
            'pattelno' => 'Pattelno',
            'relemacode' => 'Relemacode',
            'f_dec' => 'F Dec',
            'patstat' => 'Patstat',
            'patlock' => 'Patlock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'confdl' => 'Confdl',
            'fm_dec' => 'Fm Dec',
            'bldcode' => 'Bldcode',
            'entryby' => 'Entryby',
            'fatlast' => 'Fatlast',
            'fatfirst' => 'Fatfirst',
            'fatmid' => 'Fatmid',
            'motlast' => 'Motlast',
            'motfirst' => 'Motfirst',
            'motmid' => 'Motmid',
            'splast' => 'Splast',
            'spfirst' => 'Spfirst',
            'spmid' => 'Spmid',
            'fataddr' => 'Fataddr',
            'motaddr' => 'Motaddr',
            'spaddr' => 'Spaddr',
            'fatsuffix' => 'Fatsuffix',
            'motsuffix' => 'Motsuffix',
            'spsuffix' => 'Spsuffix',
            'fatempname' => 'Fatempname',
            'fatempaddr' => 'Fatempaddr',
            'fatempeml' => 'Fatempeml',
            'fatemptel' => 'Fatemptel',
            'motempname' => 'Motempname',
            'motempaddr' => 'Motempaddr',
            'motempeml' => 'Motempeml',
            'motemptel' => 'Motemptel',
            'spempname' => 'Spempname',
            'spempaddr' => 'Spempaddr',
            'spempeml' => 'Spempeml',
            'spemptel' => 'Spemptel',
            'fattel' => 'Fattel',
            'mottel' => 'Mottel',
            'mssno' => 'Mssno',
            'srcitizen' => 'Srcitizen',
            'picname' => 'Picname',
            's_dec' => 'S Dec',
            'hospperson' => 'Hospperson',
            'hsmokingcs' => 'Hsmokingcs',
        ];
    }

    /**
     * Gets query for [[Enccodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnccodes()
    {
        return $this->hasMany(Henctr::className(), ['enccode' => 'enccode'])->viaTable('hphicsum', ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Entryby0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntryby0()
    {
        return $this->hasOne(Hpersonal::className(), ['employeeid' => 'entryby']);
    }

    /**
     * Gets query for [[Haddrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHaddrs()
    {
        return $this->hasMany(Haddr::className(), ['hpercode' => 'hpercode']);
    }
    
    public function getHaddr()
    {
        return $this->hasOne(Haddr::className(), ['hpercode' => 'hpercode'])->andOnCondition(['addstat' => 'A']);
    }

    /**
     * Gets query for [[Hadmcons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHadmcons()
    {
        return $this->hasMany(Hadmcons::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hadmlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHadmlogs()
    {
        return $this->hasMany(Hadmlog::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Harqs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHarqs()
    {
        return $this->hasMany(Harq::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hblacks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHblacks()
    {
        return $this->hasMany(Hblack::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hccomps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHccomps()
    {
        return $this->hasMany(Hccomp::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hcerts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHcerts()
    {
        return $this->hasMany(Hcert::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hconfines]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHconfines()
    {
        return $this->hasMany(Hconfine::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hcrswards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHcrswards()
    {
        return $this->hasMany(Hcrsward::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hdcscheds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdcscheds()
    {
        return $this->hasMany(Hdcsched::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hdedborn]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdedborn()
    {
        return $this->hasOne(Hdedborn::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hdern]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdern()
    {
        return $this->hasOne(Hdern::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hdocords]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdocords()
    {
        return $this->hasMany(Hdocord::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hdrugcos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdrugcos()
    {
        return $this->hasMany(Hdrugcos::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hecases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHecases()
    {
        return $this->hasMany(Hecase::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hemplyrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHemplyrs()
    {
        return $this->hasMany(Hemplyr::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hencdiags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHencdiags()
    {
        return $this->hasMany(Hencdiag::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Henctrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHenctrs()
    {
        return $this->hasMany(Henctr::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Henctrs0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHenctrs0()
    {
        return $this->hasMany(Henctr::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Herlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHerlogs()
    {
        return $this->hasMany(Herlog::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hfamexps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHfamexps()
    {
        return $this->hasMany(Hfamexp::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hfamplans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHfamplans()
    {
        return $this->hasMany(Hfamplan::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hflus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHflus()
    {
        return $this->hasMany(Hfluid::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hlablogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHlablogs()
    {
        return $this->hasMany(Hlablog::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hlivebirths]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHlivebirths()
    {
        return $this->hasMany(Hlivebirth::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hmrhistos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHmrhistos()
    {
        return $this->hasMany(Hmrhisto::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hmrsrevs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHmrsrevs()
    {
        return $this->hasMany(Hmrsrev::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hmsslogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHmsslogs()
    {
        return $this->hasMany(Hmsslog::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hnewborns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHnewborns()
    {
        return $this->hasMany(Hnewborn::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hnurnotes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHnurnotes()
    {
        return $this->hasMany(Hnurnote::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Holdnumber]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHoldnumber()
    {
        return $this->hasOne(Holdnumber::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hopdlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHopdlogs()
    {
        return $this->hasMany(Hopdlog::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpallerts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpallerts()
    {
        return $this->hasMany(Hpallert::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpataccis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpataccis()
    {
        return $this->hasMany(Hpatacci::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpataccts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpataccts()
    {
        return $this->hasMany(Hpatacct::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatacots]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatacots()
    {
        return $this->hasMany(Hpatacot::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatadjs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatadjs()
    {
        return $this->hasMany(Hpatadj::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatchrgs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatchrgs()
    {
        return $this->hasMany(Hpatchrg::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatcons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatcons()
    {
        return $this->hasMany(Hpatcon::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatdetls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatdetls()
    {
        return $this->hasMany(Hpatdetl::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatdieds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatdieds()
    {
        return $this->hasMany(Hpatdied::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatdiscs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatdiscs()
    {
        return $this->hasMany(Hpatdisc::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatgrpchrgs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatgrpchrgs()
    {
        return $this->hasMany(Hpatgrpchrg::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatmsses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatmsses()
    {
        return $this->hasMany(Hpatmss::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatoccups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatoccups()
    {
        return $this->hasMany(Hpatoccup::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatouts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatouts()
    {
        return $this->hasMany(Hpatout::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatrooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatrooms()
    {
        return $this->hasMany(Hpatroom::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpaychks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpaychks()
    {
        return $this->hasMany(Hpaychk::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpaykinds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpaykinds()
    {
        return $this->hasMany(Hpaykind::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpays]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpays()
    {
        return $this->hasMany(Hpay::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hperresps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHperresps()
    {
        return $this->hasMany(Hperresp::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hphconts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHphconts()
    {
        return $this->hasMany(Hphcont::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hphiclogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHphiclogs()
    {
        return $this->hasMany(Hphiclog::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hphicsums]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHphicsums()
    {
        return $this->hasMany(Hphicsum::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hphtrns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHphtrns()
    {
        return $this->hasMany(Hphtrn::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hphyexams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHphyexams()
    {
        return $this->hasMany(Hphyexam::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hphyfins]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHphyfins()
    {
        return $this->hasMany(Hphyfin::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hplans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHplans()
    {
        return $this->hasMany(Hplan::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hproclogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHproclogs()
    {
        return $this->hasMany(Hproclog::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hprofservs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHprofservs()
    {
        return $this->hasMany(Hprofserv::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hprogntes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHprogntes()
    {
        return $this->hasMany(Hprognte::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpromises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpromises()
    {
        return $this->hasMany(Hpromise::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hrefroms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrefroms()
    {
        return $this->hasMany(Hrefrom::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hreftos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHreftos()
    {
        return $this->hasMany(Hrefto::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hresacts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHresacts()
    {
        return $this->hasMany(Hresact::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[HreturnOlds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHreturnOlds()
    {
        return $this->hasMany(HreturnOld::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hrmres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrmres()
    {
        return $this->hasMany(Hrmres::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hrqdissues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrqdissues()
    {
        return $this->hasMany(Hrqdissue::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hrqdreturns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrqdreturns()
    {
        return $this->hasMany(Hrqdreturn::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hrqds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrqds()
    {
        return $this->hasMany(Hrqd::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hrqds0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrqds0()
    {
        return $this->hasMany(Hrqd::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hrxoissues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrxoissues()
    {
        return $this->hasMany(Hrxoissue::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hrxoreturns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrxoreturns()
    {
        return $this->hasMany(Hrxoreturn::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hrxos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrxos()
    {
        return $this->hasMany(Hrxo::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hservelogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHservelogs()
    {
        return $this->hasMany(Hservelog::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hservlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHservlogs()
    {
        return $this->hasMany(Hservlog::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hsupcos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHsupcos()
    {
        return $this->hasMany(Hsupcos::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hsurgpats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHsurgpats()
    {
        return $this->hasMany(Hsurgpat::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hteleps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHteleps()
    {
        return $this->hasMany(Htelep::className(), ['hpercode' => 'hpercode']);
    }
    
    public function getHtelep()
    {
        return $this->hasOne(Htelep::className(), ['hpercode' => 'hpercode'])->andOnCondition(['ptlstat' => 'A']);
    }

    /**
     * Gets query for [[Hvisitlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvisitlogs()
    {
        return $this->hasMany(Hvisitlog::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvitalsigns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvitalsigns()
    {
        return $this->hasMany(Hvitalsign::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvsbps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvsbps()
    {
        return $this->hasMany(Hvsbp::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvshrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvshrs()
    {
        return $this->hasMany(Hvshr::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvsintkes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvsintkes()
    {
        return $this->hasMany(Hvsintke::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvsothrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvsothrs()
    {
        return $this->hasMany(Hvsothr::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvsoutpts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvsoutpts()
    {
        return $this->hasMany(Hvsoutpt::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvsrrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvsrrs()
    {
        return $this->hasMany(Hvsrr::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvsspecs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvsspecs()
    {
        return $this->hasMany(Hvsspec::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvstemps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvstemps()
    {
        return $this->hasMany(Hvstemp::className(), ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hwrdtrns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHwrdtrns()
    {
        return $this->hasMany(Hwrdtrn::className(), ['hpercode' => 'hpercode']);
    }
}

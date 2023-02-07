<?php


use yii\helpers\Html;
use yii\grid\GridView;

$this->title='';
$this->params['df'][] = $this->title;
?>

<style>
    #admission{
        
        font-family:"Arial Narrow", Arial, sans=serif;
        border-collapse: 1px solid #ddd;
        width: 100%
        
    }

    #admission id, #admission th,
    #admission td{

        border: 1px solid #00000;
        padding: 8px;
        text-align: center;
    }
    #dt{
        font-family:"Arial Narrow", Arial, sans=serif;
        border-collapse: 1px solid #ddd;
        width: 100%
    }

    .timesdate{
         font-size: 18px;

    }
    .footer{
        position: relative;
        display: inline-block;

    }
    .container{
        position: relative;
        display: flex;

    }
    .header{
        font-family:"Arial Narrow", Arial, sans-serif;
        position: relative;
        text-align: center;
 }
   .image{
        margin-bottom: -7rem;
        margin-left: 7.8rem;
        position: relative;
        text-align: left;
        display: inline-block;
    }
    .image2{
        margin-top: -8rem;
        margin-right: 7.8rem;
        position: relative;
        text-align: right;
    }
    th, td{
        font-family:"Arial Narrow", Arial, sans=serif;
        padding: 5px;
        text-align: left;
        font-size: 15px;
    }
    .caption{
        font-family:"Arial Narrow", Arial, sans=serif;
        font-size: 30px;
        margin-top: -1.3rem;
        
    }
    p {
        text-align: right;
    }
    #bottom{
        position: absolute;
        bottom: 0;
        
    }
</style>


<header class="container">
    <div class= "image">
    <?php echo Html::img('@web/img/adnlogo.jpg', ['alt' => 'adnlogo', 'style' => 'width:100px;height: 100px']); ?>
    </div>
        <div class= "header">
             Republic of the Philippines <br>
            <b>PROVINCIAL HEALTH OFFICE </b> <br>
            Agusan del Norte Provincial Hospital <br>
            Libertad, Butuan City <br>
            Tel. No. (085) 817-3390 <br> &nbsp;
        </div>
            <div class= "image2">
                <?php echo Html::img('@web/img/phologo.jpg', ['alt' => 'phologo', 'style' => 'width:100px;height: 100px']); ?>
            </div>
</header>


<hr style="height: 5px;
           background: teal;
           margin: 20px 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">

<caption class = "caption">
    <b>CLINICAL COVER SHEET</b>
</caption>
<p>
    Case No.____________________
</p>

<table style= "width:100%">
<tr>
<th style= "width:40%">Name            : </th>
<td> USER </td>
</tr>
    <tr>
<th>Address              : <br> </th>
<td> awdwadawdwadaw </td>
    </tr>
        <tr>
<th> Contact   : </th>
<td> none </td>
        </tr>
            <tr>
<th> Sex   : </th>
<td> M</td>
            </tr>
                <tr>
<th> Civil Status   : </th>
<td> C </td>
                </tr>
<tr>
<th> Age   : </th>
<td> 16 </td>
</tr>
    <tr>
<th> Birth Date  : </th>
<td> 16 </td>
    </tr>
        <tr>
    <th> Birth Place  : </th>
<td> 16</td>
        </tr>
        <tr>
    <th> Nationality : </th>
<td> 16</td>
        </tr>
        <tr>
    <th> Religion  : </th>
<td> 16</td>
        </tr>
</table>


<!--Table for admission -->
<table id="admission", style= "width:100%">
    <tr> 
    <td><b>Type of admission</b> <br>
        [ ]New &nbsp;  [ ]Old   &nbsp; [ ]Former OPD &nbsp;  <br> <br>
    </td>

    <th>Referred By (Physician/Agency):<br> <br> <br>
    </th>
 </tr>
     <tr>
        <td>Admission Date and Time </td>
        <td>Discharge Date and Time</td>
    </tr>
    <tr>
        <td>02/07/22 03:33pm</td>
        <td>02/07/22 10:11pm</td>
    </tr>
 
        <tr>
            <td>Chief Complaint</td>

            <td ><p> DISPOSITION <br>
            [&nbsp;]Discharged &nbsp; [&nbsp;]Transferred &nbsp; [&nbsp;]Absconded <br>
                [&nbsp;]Home Against Advice   &nbsp;       &nbsp;     [&nbsp;]Expire <br> </p>

                <table width="106%">
                    <tr>
                        <td height="70x"><p>CONDITION DISCHARGE <br>
                        [&nbsp;]Recovered &nbsp;  [&nbsp;]Improved &nbsp; [&nbsp;]Unapproved <br>
                [&nbsp;]Died   &nbsp;       &nbsp;    &nbsp;   &nbsp;   [&nbsp;]Died less than 24hrs</p>
                    </tr>
            </table>
                </td>
            
        </tr>
  

</table>

<hr style="height: 5px;
           background: teal;
           margin: 20px 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">







<footer class = "footer">
<div class="timesdate">
    Date:
    <?php echo date ("Y-m-d");?>
    Time:
    <?php date_default_timezone_set("Hongkong");
        echo date ("h:i a"); ?>
</div>
</footer>

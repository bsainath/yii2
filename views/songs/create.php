<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblPrtSongs */

$this->title = 'Add Songs';
$this->params['breadcrumbs'][] = ['label' => 'Songs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-prt-songs-create">


    <?= $this->render('_form', [
        'model' => $model,'form_upload'=>$form_upload
    ]) ?>

</div>

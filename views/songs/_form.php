<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblPrtSongs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-prt-songs-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],'layout' => 'horizontal']); ?>

     <?= $form->field($model, 'party_id')->dropDownList(ArrayHelper::map(\app\models\TblPrtLookupOptions::find()->where(['lookup_id'=>2])->asArray()->all(), 'option_id', 'option_name'),['prompt' => 'Select Party'], ['class' => 'form-control']); ?>
    
     <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'audio/*']) ?>

    
    <div class="form-group " align="center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl() ?>/songs" class="btn btn-danger">Cancel</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>

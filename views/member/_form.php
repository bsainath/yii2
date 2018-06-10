<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblPrtMembers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-prt-members-form">

    <?php $form = ActiveForm::begin([ 'layout' => 'horizontal']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    
    <?= $form->field($model, 'party_id')->dropDownList(ArrayHelper::map(\app\models\TblPrtLookupOptions::find()->where(['lookup_id'=>2])->asArray()->all(), 'option_id', 'option_name'),['prompt' => 'Select Party'], ['class' => 'form-control']); ?>
    
    
	<?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(\app\models\TblPrtCities::find()->where('state_id=2 OR state_id=32')->asArray()->all(), 'city_id', 'city_name'),['prompt' => 'Select City'], ['class' => 'form-control']); ?>
 

    <?= $form->field($model, 'constituency')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile_type_id')->dropDownList(ArrayHelper::map(\app\models\TblPrtLookupOptions::find()->where(['lookup_id'=>1])->asArray()->all(), 'option_id', 'option_name'),['prompt' => 'Select Profile'], ['class' => 'form-control']); ?>
    

    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile_pic')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group field-tblprtmembers-personel_info has-success">
<label class="control-label col-sm-3" for="tblprtmembers-personel_info">Personel Info</label>
<div class="col-sm-6 no-padding" >
<div class="col-sm-6">
<input type="text" placeholder="label" name="info[0]['key']" class="form-control per_info_key">
</div>
<div class="col-sm-6">
<input type="text" placeholder="value" name="info[0]['val']" class="form-control per_info_val"> 
</div>
</div>

<div class="col-sm-3">
<input type="button" placeholder="value" class="btn btn-success" value="Add" onclick="addpersonelinfo();"> 
</div>
</div>

    
    <div class="form-group field-tblprtmembers-personel_info has-success">
<label class="control-label col-sm-3" for="tblprtmembers-personel_interest">Personel Interest</label>
<div class="col-sm-6 no-padding" >
<div class="col-sm-6">
<input type="text" placeholder="label" class="form-control">
</div>
<div class="col-sm-6">
<input type="text" placeholder="value" class="form-control"> 
</div>
</div>
<div class="col-sm-3">
<input type="button" placeholder="value" class="btn btn-success" value="Add" onclick="addpersonelinfo();"> 
</div>
</div>

    <?= $form->field($model, 'other_info')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
function addpersonelinfo(){
	
}
</script>

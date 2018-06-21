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

    <?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data'],'layout' => 'horizontal']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    
    <?= $form->field($model, 'party_id')->dropDownList(ArrayHelper::map(\app\models\TblPrtLookupOptions::find()->where(['lookup_id'=>2])->asArray()->all(), 'option_id', 'option_name'),['prompt' => 'Select Party'], ['class' => 'form-control']); ?>
    
    
	<?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(\app\models\TblPrtCities::find()->where('state_id=2 OR state_id=32')->asArray()->all(), 'city_id', 'city_name'),['prompt' => 'Select City'], ['class' => 'form-control']); ?>

    <?= $form->field($model, 'constituency')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile_type_id')->dropDownList(ArrayHelper::map(\app\models\TblPrtLookupOptions::find()->where(['lookup_id'=>1])->asArray()->all(), 'option_id', 'option_name'),['prompt' => 'Select Profile'], ['class' => 'form-control']); ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'profile_pic')->fileInput() ?>
    
    <div class="form-group field-tblprtmembers-personel_info has-success">
<label class="control-label col-sm-3" for="tblprtmembers-personel_info">Personel Info</label>
        <div class="col-sm-9 no-padding" id="personelinfodiv">
        <?php if($model->personel_info){ $per_info_data=json_decode(unserialize($model->personel_info),true); $x=0;foreach ($per_info_data as $per_info){  ?>


            <div  class="<?php echo $x>0?'main_personel_info main_personel_info_'.$x:'personelinfoclasscount'; ?> ">
                <div class="col-sm-8 no-padding" >
                    <div class="col-sm-6">
                        <input type="text" placeholder="label" name="info[<?php echo $x; ?>][key]" class="form-control per_info_key" value="<?php echo $per_info['key']; ?>">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" placeholder="value" name="info[<?php echo $x; ?>][val]" class="form-control per_info_val" value="<?php echo $per_info['val']; ?>">
                    </div>
                </div>
                <div class="col-sm-3">
                    <input type="button" placeholder="value" class="btn <?php echo $x==0?'btn-success':'btn-danger' ?>" value=" <?php echo $x==0?'Add':'Remove' ?>" id ="clickpersonelinfoid" onclick="<?php echo $x==0?'addpersonelinfo();':'removepersonelinfo('.$x.');' ?>">
                </div>
            </div>



            <?php $x++; }}else{ ?>

            <div class="personelinfoclasscount">
                <div class="col-sm-8 no-padding" >
                    <div class="col-sm-6">
                        <input type="text" placeholder="label" name="info[0][key]" class="form-control per_info_key">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" placeholder="value" name="info[0][val]" class="form-control per_info_val">
                    </div>
                </div>
                <div class="col-sm-3">
                    <input type="button" placeholder="value" class="btn btn-success" value="Add" id ="clickpersonelinfoid" onclick="addpersonelinfo();">
                </div>
            </div>

            <?php } ?>
        </div>



</div>

    
    <div class="form-group field-tblprtmembers-personel_info has-success">
<label class="control-label col-sm-3" for="tblprtmembers-personel_interest">Personel Interest</label>
        <div class="col-sm-9 no-padding" id="personelintdiv">




            <?php if($model->personel_interest){ $per_int_data=json_decode(unserialize($model->personel_interest),true); $x=0;foreach ($per_int_data as $per_info){  ?>


                <div  class="<?php echo $x>0?'main_personel_int main_personel_int_'.$x:'personelintclasscount'; ?> ">
                    <div class="col-sm-8 no-padding" >
                        <div class="col-sm-6">
                            <input type="text" placeholder="label" name="int[<?php echo $x; ?>][key]" class="form-control per_int_key" value="<?php echo $per_info['key']; ?>">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" placeholder="value" name="int[<?php echo $x; ?>][val]" class="form-control per_int_val" value="<?php echo $per_info['val']; ?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <input type="button" placeholder="value" class="btn <?php echo $x==0?'btn-success':'btn-danger per_int_rm_click' ?>" value=" <?php echo $x==0?'Add':'Remove' ?>" id ="<?php if($x==0){ echo 'clickpersonelintid'; } ?>" onclick="<?php echo $x==0?'addpersonelint();':'removepersonelint('.$x.');' ?>">
                    </div>
                </div>



                <?php $x++; }}else{ ?>


            <div class="personelintclasscount">
                <div class="col-sm-8 no-padding" >
                    <div class="col-sm-6">
                        <input type="text" placeholder="label" name="int[0][key]" class="form-control per_int_key">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" placeholder="value" name="int[0][val]" class="form-control per_int_val">
                    </div>
                </div>
                <div class="col-sm-3">
                    <input type="button" placeholder="value" class="btn btn-success" value="Add" id ="clickpersonelintid" onclick="addpersonelint();">
                </div>
            </div>
<?php } ?>
        </div>

</div>

    <?= $form->field($model, 'other_info')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'facebook_link')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'twitter_link')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'linkedIn_link')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'instagram_link')->textInput(['maxlength' => true]) ?>

<div class="form-group field-tblprtmembers-personel_info has-success">
<label class="control-label col-sm-3" for="tblprtmembers-personel_interest">Vedios</label>
        <div class="col-sm-9 no-padding" id="vediosdiv">




            <?php if($model->vedios){ $vedios=json_decode(unserialize($model->vedios),true); $x=0;foreach ($vedios as $vedio){  ?>


                <div  class="<?php echo $x>0?'main_vedios main_vedios_'.$x:'vediosclasscount'; ?> ">
                    <div class="col-sm-8 no-padding" >
                        <div class="col-sm-12">
                            <input type="text" placeholder="link" name="vedio[<?php echo $x; ?>][link]" class="form-control vedios_key" value="<?php echo $vedio['link']; ?>">
                        </div>
                        
                    </div>
                    <div class="col-sm-3">
                        <input type="button"  class="btn <?php echo $x==0?'btn-success':'btn-danger vedios_rm_click' ?>" value=" <?php echo $x==0?'Add':'Remove' ?>" id ="<?php if($x==0){ echo 'clickvediosid'; } ?>" onclick="<?php echo $x==0?'addvediolink();':'removevediolink('.$x.');' ?>">
                    </div>
                </div>



                <?php $x++; }}else{ ?>


            <div class="vediosclasscount">
                <div class="col-sm-8 no-padding" >
                    <div class="col-sm-12">
                        <input type="text" placeholder="label" name="vedio[0][link]" class="form-control vedios_key"> 
                    </div>
                   
                </div>
                <div class="col-sm-3">
                    <input type="button" class="btn btn-success" value="Add" id ="clickvediosid" onclick="addvediolink();">
                </div>
            </div>
<?php } ?>
        </div>

</div>

    <div class="form-group " align="center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl() ?>/member" class="btn btn-danger">Cancel</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
function addpersonelinfo(){

    var i = $('.per_info_key').length;

	var html = '<div class="main_personel_info main_personel_info_'+i+'"><div class="col-sm-8 no-padding" > <div class="col-sm-6">';
	html += '<input type="text" placeholder="label" name="info['+i+'][key]" class="form-control per_info_key">';
html +='</div> <div class="col-sm-6">';

html +='<input type="text" placeholder="value" name="info['+i+'][val]" class="form-control per_info_val"> ';
html +='</div> </div> <div class="col-sm-3">';
html +='<input type="button" placeholder="value" class="btn btn-danger per_info_rm_click" value="Remove" onclick="removepersonelinfo('+i+');"> ';

html +='</div></div>';

$("#personelinfodiv").append(html);
}

function removepersonelinfo(i){
$('.main_personel_info_'+i).remove();

var i=0;
    $(".main_personel_info").each(function() {
        i++;
        console.log($(this).find('.per_info_key').attr('name'));
        $(this).find('.per_info_key').attr('name','info['+i+'][key]');
        $(this).find('.per_info_val').attr('name','info['+i+'][val]');
        $(this).find('.per_info_rm_click').attr('onclick','removepersonelinfo('+i+')');
        $(this).attr('class','');
        $(this).addClass('main_personel_info main_personel_info_'+i);

    });

}

function addpersonelint(){

    var i = $('.per_int_key').length;

    var html = '<div class="main_personel_int main_personel_int_'+i+'"><div class="col-sm-8 no-padding" > <div class="col-sm-6">';
    html += '<input type="text" placeholder="label" name="int['+i+'][key]" class="form-control per_int_key">';
    html +='</div> <div class="col-sm-6">';

    html +='<input type="text" placeholder="value" name="int['+i+'][val]" class="form-control per_int_val"> ';
    html +='</div> </div> <div class="col-sm-3">';
    html +='<input type="button" placeholder="value" class="btn btn-danger per_int_rm_click" value="Remove" onclick="removepersonelint('+i+');"> ';

    html +='</div></div>';

    $("#personelintdiv").append(html);
}


function removepersonelint(i){
    $('.main_personel_int_'+i).remove();

    var i=0;
    $(".main_personel_int").each(function() {
        i++;
       // console.log($(this).find('.per_int_key').attr('name'));
        $(this).find('.per_int_key').attr('name','int['+i+'][key]');
        $(this).find('.per_int_val').attr('name','int['+i+'][val]');
        $(this).find('.per_int_rm_click').attr('onclick','removepersonelint('+i+')');
        $(this).attr('class','');
        $(this).addClass('main_personel_int main_personel_int_'+i);

    });

}


function addvediolink(){

    var i = $('.vedios_key').length;



    var html = '<div class="main_vedios main_vedios_'+i+'"><div class="col-sm-8 no-padding" > <div class="col-sm-12">';
    html += '<input type="text" placeholder="link" name="vedio['+i+'][link]" class="form-control vedios_key">';
    html +='</div> ';

    html +=' </div> <div class="col-sm-3">';
    html +='<input type="button" class="btn btn-danger vedios_rm_click" value="Remove" onclick="removevediolink('+i+');"> ';

    html +='</div></div>';

    $("#vediosdiv").append(html);
}


function removevediolink(i){
    $('.main_vedios_'+i).remove();

    var i=0;
    $(".main_vedios").each(function() {
        i++;
       // console.log($(this).find('.per_int_key').attr('name'));
        $(this).find('.vedios_key').attr('name','vedio['+i+'][link]');
        $(this).find('.vedios_rm_click').attr('onclick','removevediolink('+i+')');
        $(this).attr('class','');
        $(this).addClass('main_vedios main_vedios_'+i);

    });

}
</script>

<style>
    .main_personel_info,.main_personel_int,.main_vedios{    padding-top: 10px;
        float: left;
        width: 100%;}
</style>
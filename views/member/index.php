<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TblPrtMembersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Member';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>


</style>

<div class="tbl-prt-members-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 <div class="row">
    <div class="col-md-12" style="padding-top:3px;">
    <p>
        <?= Html::a('Create Member', ['create'], ['class' => 'btn btn-success pull-right']) ?>
    </p>
   </div>
</div> 
   
       

    


    
    <div class="checklists-index">
    <div class="row">
        <div class="col-sm-12 margintop10">
        
<?php $buttons = '{update} {delete}';?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'shadow-boxes'],
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','headerOptions' => ['class' => 'theadcolor']],

           // 'member_id',
            
                   [
                'attribute' => 'name',
                'headerOptions' => ['class' => 'theadcolor'],
                
                ],
            
            [
                'attribute' => 'party_id',
                'headerOptions' => ['class' => 'theadcolor'],
                'format' => 'raw',
                'header' => 'Party',
                
                'value' => function ($model) {
                
                return $model->party->option_name;
                }
                ],
           
            [
                'attribute' => 'city_id',
                'headerOptions' => ['class' => 'theadcolor'],
                'format' => 'raw',
                'header' => 'City',
                
                'value' => function ($model) {
                
                return $model->city->city_name;
                }
                ],
            [
                'attribute' => 'constituency',
                'headerOptions' => ['class' => 'theadcolor'],
                
            ],
            //'profile_type_id',
            //'district',
            //'profile_pic',
            //'personel_info:ntext',
            //'personel_interest:ntext',
            //'other_info',
            //'created_by',
            //'created_date',
            //'modified_by',
            //'modified_date',
               
           
            [
                'class' => 'yii\grid\ActionColumn',
                
                'header' => 'Actions',
                
                'headerOptions' => ['class' => 'theadcolor'],
                'template' => $buttons,
                'buttons' => [
                    'update' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['member/update', 'id' => $model->member_id], [
                        'title' => Yii::t('yii', 'Edit'),
                    ]);
                    },
                    'delete'=>function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['member/delete', 'id' => $model->member_id], [
                        'title' => Yii::t('yii', 'Delete'), 'aria-label'=>"Delete", 'data-pjax'=>"0", 'data-confirm'=>"Are you sure you want to delete this item?",
                        'data-method'=>"post"
                    ]);
                    },
                    
                    ],
                    
                    ],
                    
        ],
    ]); ?>
    </div>
    </div>
    </div>
    
</div>

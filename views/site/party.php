<!DOCTYPE html>
<html lang="en">
<head>
    <title>Our leaders</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php use yii\widgets\LinkPager;

    echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/css/publicsite.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        nav>ul{
            padding-left: 0;
            margin: 20px 0;
            text-align: center;
            list-style: none;
        }

        nav>ul.pagination>li {
            display:  inherit!important;
        }

        nav>ul>li>a, nav>ul>li>span {
            display: inline-block;
            padding: 5px 14px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 15px!important;
        }
    </style>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="share-it">
            <div class="facebook">
                <a href="#"><i class="fa fa-facebook"></i></a>
            </div>
            <div class="twitter">
                <a href="#"><i class="fa fa-twitter"></i></a>
            </div>
            <div class="google hidden-xs">
                <a href="#"><i class="fa fa-google-plus"></i></a>
            </div>
            <div class="rss">
                <a href="#"><i class="fa fa-rss"></i></a>
            </div>
            <div class="linkedin">
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
            <div class="youtube cboxElement">
                <a href="#"><i class="fa fa-youtube"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Navigation -->
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/logo-1.png" alt="">
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
            <div class="nav navbar-nav navbar-right">
                <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/ad.jpg" alt="ad">
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<section class="search-banner bg-danger text-white py-5" id="search-banner">
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-md-8">

                <marquee class="marquee-text">A scrolling text created with HTML Marquee element.A scrolling text created with HTML Marquee element.</marquee>

                <!--  <div class="row">
                 <div class="col-md-4">
                     <div class="form-group ">
                           <select id="inputState" class="form-control" >
                             <option selected>... Search for...</option>
                             <option>MP</option>
                             <option>MLA</option>
                             <option>MLC</option>
                             <option>Central Committee</option>
                             <option>State Committee</option>
                             <option>District President</option>
                           </select>
                         </div>
                 </div>
                 <div class="col-md-4">
                     <div class="form-group ">
                           <select id="inputState" class="form-control" >
                             <option selected>... Select State...</option>
                             <option>Andhra Pradesh</option>
                             <option>Telangana</option>
                           </select>
                         </div>
                 </div>

                 <div class="col-md-4">
                     <button type="button" class="btn btn-dark" >Search </button>

                 </div>
             </div> -->


            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="heading-text" style="background: <?php echo $party_details->color_code; ?>; ">
                <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/bjp.png" class="img-responsive bjp-img" alt="">
                <h3><?php echo $party_details->option_name; ?></h3>
            </div>
            <div class="blog-sidebar">
                <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked">
                    <?php foreach ($profiles->tblPrtLookupOptions as $profile) { ?>
                        <li  style="border-bottom: 1px solid #e0e0e0; cursor: pointer;"><a onclick="searchfilter(<?php echo $profile->option_id;  ?>);" style="padding: 15px 50px;"><?php echo $profile->option_name;  ?></a></li>
                    <?php } ?>

                </ul>
            </div>
            <div class="ads">
                <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/ad-1.png" class="img-responsive" alt="">
            </div>
        </div>
        <div class="col-md-6">


            <div class="checkbox-padding">
                <label class="checkbox-inline checkbox-text"><input type="checkbox" value="" checked="checked" >All</label>
                <label class="checkbox-inline checkbox-text"><input type="checkbox" <?php echo Yii::$app->request->get('state')==2?'selected':''; ?> value="32">Telangana</label>
                <label class="checkbox-inline checkbox-text"><input type="checkbox" <?php echo Yii::$app->request->get('state')==2?'selected':''; ?> value="2">Andhra Pradesh</label>
            </div>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="btab1">
                    <div class="row">
                        <?php foreach ($members as $member) { ?>
                            <div class="col-md-4 col-xs-6">
                                <div class="card hovercard">
                                    <div class="cardheader" style="background: <?php echo $party_details->color_code; ?>; "></div>
                                    <div class="avatar">
                                        <img alt="" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploads/<?php echo $member->profile_pic; ?>" >
                                    </div>
                                    <div class="info">
                                        <div class="title">
                                            <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/site/details?id=<?php echo $member->member_id; ?>" target="_blank"  class="mp-text"><?php echo $member->name; ?></a>
                                        </div>
                                        <div class="desc"><?php echo $member->city->state_name; ?>, <?php echo $member->profileType->option_name; ?></div>
                                        <a target="_blank" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/site/details?id=<?php echo $member->member_id; ?>" class="btn-1" >Read More</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                    </div>

                </div>


            </div>

            <nav aria-label="Page navigation" align="center" id="">
                <?php echo LinkPager::widget([
                    'pagination' => $pages,
                ]); ?>
            </nav>






        </div>
        <div class="col-md-3">
            <div class="party-heading">
                <h3>Related Partys :</h3>
            </div>
            <div class="center-menu">
                <ul style="margin-bottom: 15px;">
                    <?php foreach ($parties->tblPrtLookupOptions as $party){ ?>
                        <li><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/site/party?id=<?php echo $party->option_id;?>"><i class="glyphicon glyphicon-chevron-right"></i> <?php echo $party->option_name; ?> </a></li>
                    <?php } ?>

                </ul>
            </div>

            <marquee direction="down" class="marquee news-marquee" scrollamount="3">
                <ul>
                    <li> <i class="fa fa-hand-o-right" aria-hidden="true"></i> ???? ????? ? ????.. ??????? ?? ?????? ????????? ?????</li>
                    <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> ????? ???????? ??????? ????????????? ????????? ???? ???????????…..</li>
                    <li> <i class="fa fa-hand-o-right" aria-hidden="true"></i> ? ????? ??????? ???? ??????? ?????? ????????? ??????! </li>
                    <li> <i class="fa fa-hand-o-right" aria-hidden="true"></i> ?????????? ???? ???? ?????????? ?????? ????? ??????!</li>
                </ul>
            </marquee>

        </div>
    </div>
</div>






<script type="text/javascript">

    function searchfilter(profile=''){
        var datastr="?id=<?php echo Yii::$app->request->get('id'); ?>";

        datastr +="&state=";
        if(profile!=''){
            datastr +="&profile="+profile;
        }

        <?php if(!empty(Yii::$app->request->get('page'))){ ?>
        datastr +='&page='+<?php echo Yii::$app->request->get('page'); ?>;
        <?php } ?>
        window.location="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/site/party"+datastr;
    }

    $(document).ready(function(){

        $('#itemslider').carousel({ interval: 3000 });

        $('.carousel-showmanymoveone .item').each(function(){
            var itemToClone = $(this);

            for (var i=1;i<6;i++) {
                itemToClone = itemToClone.next();

                if (!itemToClone.length) {
                    itemToClone = $(this).siblings(':first');
                }

                itemToClone.children(':first-child').clone()
                    .addClass("cloneditem-"+(i))
                    .appendTo($(this));
            }
        });
    });

</script>

</body>
</html>
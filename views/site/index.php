<?php
use yii\widgets\LinkPager;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Our leaders</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/css/publicsite.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#myModal").modal('show');
        });
    </script>
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

<div id="myModal" class="modal fade">
    <div class="modal-dialog">

        <img src="images/open-add.jpg" class="img-responsive" alt="">
    </div>
</div>

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
            <div class="col-md-9">

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group ">
                            <input type="text" name="name" id="search_name" value="<?php echo Yii::$app->request->get('name'); ?>" class="form-control" placeholder=".. Search for Name..">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <select id="search_party"  class="form-control" >
                                <option value="">... Search for...</option>
                                <?php foreach ($parties->tblPrtLookupOptions as $party){ ?>
                                    <option <?php echo Yii::$app->request->get('party')==$party->option_id?'selected':''; ?> value="<?php echo $party->option_id;  ?>"><?php echo $party->option_name;  ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <select id="search_state"  class="form-control" >
                                <option value="">... Select State...</option>
                                <option <?php echo Yii::$app->request->get('state')==2?'selected':''; ?> value="2">Andhra Pradesh</option>
                                <option <?php echo Yii::$app->request->get('state')==32?'selected':''; ?> value="32">Telangana</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <button type="button" class="btn btn-dark" onclick="searchfilter();" >Search </button>

                    </div>
                </div>


            </div>
            <div class="col-md-3">
                <ul class="nav navbar-nav navbar">
                    <li><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/site/news">News</a></li>
                    <li><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/site/news">Articles</a></li>
                    <li><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/site/news">Video </a></li>
                </ul>

            </div>
        </div>
    </div>
</section>

<div class="container top-btm-padding">
    <div class="row">
        <div class="col-md-3 center-menu">
            <ul style="margin-bottom: 15px;margin-top: 15px;">
                <?php foreach ($parties->tblPrtLookupOptions as $party){ ?>
                    <li><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/site/party?id=<?php echo $party->option_id;  ?>"><i class="glyphicon glyphicon-chevron-right"></i><?php echo $party->option_name;  ?></a></li>
                <?php } ?>

            </ul>

            <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/ad-1.png" alt="ad name" class="img-responsive">
        </div>
        <div class="col-md-6">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="btab1">
                    <div class="row">
                        <?php foreach ($members as $member) { ?>
                            <div class="col-md-4 col-xs-6">
                                <div class="card hovercard">
                                    <div class="cardheader-2" style="background:<?php echo $member->party->color_code; ?>"></div>
                                    <div class="avatar">
                                        <img alt="" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploads/<?php echo $member->profile_pic; ?>" >
                                    </div>
                                    <div class="info">
                                        <div class="title">
                                            <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/site/details?id=<?php echo $member->member_id; ?>" target="_blank" href="" class="mp-text"><?php echo $member->name; ?></a>
                                        </div>
                                        <div class="desc"> <?php echo $member->city->state_name; ?>, <?php echo $member->profileType->option_name; ?>(<?php echo $member->party->option_name; ?>)</div>
                                        <a target="_blank" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/site/details?id=<?php echo $member->member_id; ?>" class="btn-1">Read More</a>
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
        <div class="col-md-3 center-menu-1" >
            <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/ad-1.png" alt="ad name" class="img-responsive" style="margin-top: 20px;">
            <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked" style="margin-top: 15px;">
                <?php foreach ($profiles->tblPrtLookupOptions as $profile) { ?>
                    <li class="" style="cursor: pointer;"><a onclick="searchfilter(<?php echo $profile->option_id; ?>)" style="padding: 5px 10px;"><i class="glyphicon glyphicon-chevron-right"></i> <?php echo $profile->option_name;  ?> </a></li>

                <?php } ?>

                <!--  <li><a href="#btab9" data-toggle="tab" style="padding: 5px 10px;"><i class="glyphicon glyphicon-chevron-right"></i> INDEPENDENTS </a></li>
                 <li><a href="#btab10" data-toggle="tab" style="padding: 5px 10px;"><i class="glyphicon glyphicon-chevron-right"></i> NOMINATED POSTS </a></li>  -->
            </ul>
        </div>
    </div>
</div>


<div class="container">

    <div class="row" id="slider-text">
        <div class="col-md-12 text-center" >
            <h2>Latest Updates</h2>
        </div>
        <div class="col-md-6">

        </div>
    </div>

    <div class="row">
        <marquee style="  scrollamount="6" scrolldelay="90" direction="left" onmouseover="this.stop()" onmouseout="this.start()">
        <ul class="list-inline list-unstyled r">
            <?php foreach($all_members as $member){?>
                <li class="productbox">
                    <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploads/<?php echo $member->profile_pic; ?>" class="img-responsive" width="300">
                    <div class="producttitle text-center">
                        <h3><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/site/details?id=<?php echo $member->member_id; ?>"><?php echo $member->name; ?></a></h3>
                        <h6><?php echo $member->city->state_name.', '.$member->profileType->option_name.'('.$member->party->option_name.')'; ?></h6>


                    </div>
                </li>
            <?php } ?>
        </ul><br>
        </marquee>

    </div>
</div>


<div class="container top-btm-padding">
    <div class="row">
        <div class="col-md-4" style="padding: 0px;"><img src="images/ad-2.jpg" class="img-responsive border-img" alt=""></div>
        <div class="col-md-4" style="padding: 0px;"><img src="images/ad-3.png" class="img-responsive border-img" alt=""></div>
        <div class="col-md-4" style="padding: 0px;"><img src="images/ad-4.jpg" class="img-responsive border-img" alt=""></div>
    </div>
</div>


<div class="search-text">
    <div class="container">
        <div class="row text-center">

            <div class="form">
                <h4>SIGN UP TO OUR NEWSLETTER</h4>
                <form id="search-form" class="form-search form-horizontal">
                    <input type="text" class="input-search" placeholder="Email Address">
                    <button type="submit" class="btn-search">SUBMIT</button>
                </form>
            </div>

        </div>
    </div>
</div>

<footer>
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-sm-6 col-xs-12">
                <span class="logo">LOGO</span>
                <p class="footer-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam dolores quidem mollitia id ipsa nisi necessitatibus iure repudiandae aperiam, odit ipsam dolor fugiat corporis nesciunt illo nemo minus.</p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="menu">
                    <span>Quick Links</span>
                    <li>
                        <a href="#">Latest Deals</a>
                    </li>

                    <li>
                        <a href="#">Contact Us</a>
                    </li>

                    <li>
                        <a href="#">Videos</a>
                    </li>

                    <li>
                        <a href="#">Gallery </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="address">
                    <span>Contact</span>
                    <li>
                        <i class="fa fa-map-marker" aria-hidden="true"></i> <a href="#">Kukatpally,Hyderabad</a>
                    </li>
                    <li>
                        <i class="fa fa-phone" aria-hidden="true"></i> <a href="#">9885577345</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope" aria-hidden="true"></i> <a href="#">123@gmail.com</a>
                    </li>
                </ul>
            </div>


        </div>
    </div>
</footer>

<script>
    function searchfilter(profile=''){
        var datastr="";
        datastr +="?name="+$("#search_name").val();
        datastr +="&party="+$("#search_party").val();
        if(profile!=''){
            datastr +="&profile="+profile;
        }
        datastr +="&state="+$("#search_state").val();
        <?php if(!empty(Yii::$app->request->get('page'))){ ?>
        datastr +='&page='+<?php echo Yii::$app->request->get('page'); ?>;
        <?php } ?>
        window.location="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/index"+datastr;
    }
</script>

<div class="copyright">
    <div class="container">

        <div class="row text-center">
            <p>Copyright © 2017 All rights reserved</p>
        </div>

    </div>
</div>






</body>
</html>
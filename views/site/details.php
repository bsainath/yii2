<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Design</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/css/publicsite.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                        <li  style="border-bottom: 1px solid #e0e0e0; cursor: pointer;">
                            <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/site/party?id=<?php echo Yii::$app->request->get('id'); ?>&profile=<?php echo $profile->option_id; ?>" style="padding: 15px 50px;"><?php echo $profile->option_name;  ?></a></li>
                    <?php } ?>



                </ul>
            </div>
            <div class="ads">
                <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/ad-1.png" class="img-responsive" alt="">
            </div>
        </div>
        <div class="col-md-6 top-margin">
            <div class="row">
                <div class="col-md-5">
                    <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploads/<?php echo $member->profile_pic; ?>" class="img-responsive" alt="name">
                </div>
                <div class="col-md-7 padding-list">
                    <p class="name-details">Name : <span class="name-details-1"><?php echo $member->name; ?></span></p>
                    <p class="name-details">Profile Type : <span class="name-details-1"><?php echo $member->profileType->option_name; ?></span></p>
                    <p class="name-details">Party : <span class="name-details-1"><?php echo $member->party->option_name; ?></span></p>
                    <p class="name-details">Constituency : <span class="name-details-1"><?php echo $member->constituency; ?></span></p>
                    <p class="name-details">District : <span class="name-details-1"><?php echo $member->district; ?></span></p>
                    <p class="name-details">State : <span class="name-details-1"><?php echo $member->city->state_name; ?></span></p>

                </div>
            </div>

            <div class="row">
                <div class="other-details">
                    <h2>Other Information :</h2>
                </div>
                <div class="para-text">
                    <p><?php echo $member->other_info; ?></p>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <?php  $personel_info = json_decode(unserialize($member->personel_info),true); if(!empty($personel_info)){ ?>
                            <table class="table">
                                <tbody>
                                <?php foreach ($personel_info as $data){ ?>
                                    <tr class="col-md-6">
                                        <td class="table-list"><?php echo $data['key']; ?> :</td>
                                        <td class="table-list-1"><?php echo $data['val']; ?></td>
                                    </tr>
                                <?php } ?>

                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>


            </div>

            <?php  $personel_int = json_decode(unserialize($member->personel_interest),true); if(!empty($personel_int)){ ?>
                <div class="row">
                    <div class="persional-head">
                        <h3>Personnel interersts :</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <?php foreach ($personel_int as $data){ ?>
                                    <tr class="col-md-6" >
                                        <td class="table-list"><?php echo $data['key']; ?> :</td>
                                        <td class="table-list-1"><?php echo $data['val']; ?></td>
                                    </tr>
                                <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            <?php } ?>

            <div class="row">
                <div class="persional-head">
                    <h3>Social Media :</h3>
                </div>
                <div class="col-xs-2 col-sm-2">
                    <a href="#" class="btn btn-lg btn-block onl_btn-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
                        <i class="fa fa-facebook fa-2x"></i>
                        <span class="hidden-xs"></span>
                    </a>
                </div>
                <div class="col-xs-2 col-sm-2">
                    <a href="#" class="btn btn-lg btn-block onl_btn-twitter" data-toggle="tooltip" data-placement="top" title="Twitter">
                        <i class="fa fa-twitter fa-2x"></i>
                        <span class="hidden-xs"></span>
                    </a>
                </div>
                <div class="col-xs-2 col-sm-2">
                    <a href="#" class="btn btn-lg btn-block onl_btn-linkedin" data-toggle="tooltip" data-placement="top" title="LinkedIn">
                        <i class="fa fa-linkedin fa-2x"></i>
                        <span class="hidden-xs"></span>
                    </a>
                </div>
                <div class="col-xs-2 col-sm-2">
                    <a href="#" class="btn btn-lg btn-block onl_btn-linkedin" data-toggle="tooltip" data-placement="top" title="Instagram">
                        <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                        <span class="hidden-xs"></span>
                    </a>
                </div>
            </div>




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
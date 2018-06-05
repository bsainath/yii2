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
      <div class="heading-text">
        <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/bjp.png" class="img-responsive bjp-img" alt="">
        <h3>Bjp</h3>
      </div>
      <div class="blog-sidebar">
             <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked">
              <li class="active" style="border-bottom: 1px solid #e0e0e0;"><a href="#btab1" data-toggle="tab" style="padding: 15px 50px;">MP</a></li>
              <li style="border-bottom: 1px solid #e0e0e0;"><a href="#btab2" data-toggle="tab" style="padding:15px 50px;">MLA</a></li>
              <li style="border-bottom: 1px solid #e0e0e0;"><a href="#btab3" data-toggle="tab" style="padding:15px 50px;">MLC</a></li>
              <li style="border-bottom: 1px solid #e0e0e0;"><a href="#btab4" data-toggle="tab" style="padding:15px 50px;"> CENTRAL COMMITTEE</a></li>
              <li style="border-bottom: 1px solid #e0e0e0;"><a href="#btab5" data-toggle="tab" style="padding:15px 50px;">STATE COMMITTEE</a></li>
              <li style="border-bottom: 1px solid #e0e0e0;"><a href="#btab6" data-toggle="tab" style="padding:15px 50px;">DISTRICT PRESIDENT </a></li>
            <!--   <li style="border-bottom: 1px solid #e0e0e0;"><a href="#btab7" data-toggle="tab" style="padding:15px 50px;font-size:15px;">WEB DESIGN </a></li>
              <li style="border-bottom: 1px solid #e0e0e0;"><a href="#btab8" data-toggle="tab" style="padding:15px 50px;font-size:15px;">MULTI MEDIA</a></li>
              <li style="border-bottom: 1px solid #e0e0e0;"><a href="#btab9" data-toggle="tab" style="padding:15px 50px;font-size:15px;">AFFILIATE</a></li> -->
           </ul>
        </div>
        <div class="ads">
          <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/ad-1.png" class="img-responsive" alt="">
        </div>
    </div>
    <div class="col-md-6">


      <div class="checkbox-padding">
      <label class="checkbox-inline checkbox-text"><input type="checkbox" value="" checked="checked" >All</label>
      <label class="checkbox-inline checkbox-text"><input type="checkbox" value="">Telangana</label>
      <label class="checkbox-inline checkbox-text"><input type="checkbox" value="">Andhra Pradesh</label>
      </div>
        <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="btab1">
                <div class="row">
                  <div class="col-md-6">
                         <div class="card hovercard">
                          <div class="cardheader"></div>
                          <div class="avatar">
                              <img alt="" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/bjp-mp.jpg" >
                          </div>
                          <div class="info">
                              <div class="title">
                                  <a target="_blank" href="" class="mp-text">Kishan Reddy</a>
                              </div>
                              <div class="desc">Telangana, MP</div>
                              <button class="btn-1">Read More</button>
                          </div>
                          </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card hovercard">
                          <div class="cardheader"></div>
                          <div class="avatar">
                              <img alt="" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/bjp-mp1.jpg">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <a target="_blank" href="" class="mp-text">Hari Babu</a>
                              </div>
                              <div class="desc">Andhra Pradesh, MP</div>
                               <button class="btn-1">Read More</button>
                          </div>
                          </div>
                  </div>
                  
                </div>
                  <div class="row">
                  <div class="col-md-6">
                         <div class="card hovercard">
                          <div class="cardheader"></div>
                          <div class="avatar">
                              <img alt="" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/bjp-mp.jpg" >
                          </div>
                          <div class="info">
                              <div class="title">
                                  <a target="_blank" href="" class="mp-text">Kishan Reddy</a>
                              </div>
                              <div class="desc">Telangana, MP</div>
                              <button class="btn-1">Read More</button>
                          </div>
                          </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card hovercard">
                          <div class="cardheader"></div>
                          <div class="avatar">
                              <img alt="" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/bjp-mp1.jpg">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <a target="_blank" href="" class="mp-text">Hari Babu</a>
                              </div>
                              <div class="desc">Andhra Pradesh, MP</div>
                               <button class="btn-1">Read More</button>
                          </div>
                          </div>
                  </div>
                  
                </div>
              </div>

               <div role="tabpanel" class="tab-pane fade in" id="btab2">
                   <div class="comeing-title"><h3 class="comeing-text">2...</h3></div>
               </div>


                <div role="tabpanel" class="tab-pane fade in" id="btab3">
                    <div class="comeing-title"><h3 class="comeing-text">3...</h3></div>
                </div>


                 <div role="tabpanel" class="tab-pane fade in" id="btab4">
                     <div class="comeing-title"><h3 class="comeing-text">4...</h3></div>
                 </div>


                <div role="tabpanel" class="tab-pane fade in" id="btab5">
                    <div class="comeing-title"><h3 class="comeing-text">5...</h3></div>
                  </div>


                <div role="tabpanel" class="tab-pane fade in" id="btab6">
                    <div class="comeing-title"><h3 class="comeing-text">6...</h3></div>
                   </div>


             
         </div>

         <nav aria-label="Page navigation" id="div1">
          <ul class="pager">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">«</span>
              </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">»</span>
              </a>
            </li>
          </ul>
        </nav>


    </div>
    <div class="col-md-3">
      <div class="party-heading">
        <h3>Related Partys :</h3>
      </div>
      <div class="center-menu">
         <ul style="margin-bottom: 15px;">
         <li><a href=""><i class="glyphicon glyphicon-chevron-right"></i> BJP </a></li>
         <li><a href=""><i class="glyphicon glyphicon-chevron-right"></i> CONGRESS </a></li>
         <li><a href=""><i class="glyphicon glyphicon-chevron-right"></i> TRS </a></li>
         <li><a href=""><i class="glyphicon glyphicon-chevron-right"></i> TDP </a></li>
         <li><a href=""><i class="glyphicon glyphicon-chevron-right"></i> YSRCP </a></li>
         <li><a href=""><i class="glyphicon glyphicon-chevron-right"></i> JANASENA </a></li>
         <li><a href=""><i class="glyphicon glyphicon-chevron-right"></i> CPI</a></li>
         <li><a href=""><i class="glyphicon glyphicon-chevron-right"></i> CPM </a></li>
         <li><a href=""><i class="glyphicon glyphicon-chevron-right"></i> INDEPENDENTS </a></li>
         <li><a href=""><i class="glyphicon glyphicon-chevron-right"></i> NOMINATED POSTS </a></li>
       </ul> 
      </div>

       <marquee direction="down" class="marquee">A scrolling text created with HTML Marquee element.A scrolling text created with HTML Marquee element.A scrolling text created with HTML Marquee element.A scrolling text created with HTML Marquee element.A scrolling text created with HTML Marquee element.A scrolling text created with HTML Marquee element.A scrolling text created with HTML Marquee element.</marquee>

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
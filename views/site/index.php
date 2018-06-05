<!DOCTYPE html>
<html lang="en">
<head>
  <title>New Design</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/css/publicsite.css">
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
                    <img src="images/logo-1.png" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <div class="nav navbar-nav navbar-right">
                 <img src="images/ad.jpg" alt="ad">
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <section class="search-banner bg-danger text-white py-5" id="search-banner">
    <div class="container py-5 my-5">   
    <div class="row">
        <div class="col-md-10">
           
                <div class="row">
                <div class="col-md-3">
                        <div class="form-group ">
                    	<input type="text" name="name" class="form-control" placeholder=".. Search for Name..">
                        </div>
                </div>
                <div class="col-md-3">
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
                <div class="col-md-3">
                    <div class="form-group ">
                          <select id="inputState" class="form-control" >
                            <option selected>... Select State...</option>
                            <option>Andhra Pradesh</option>
                            <option>Telangana</option>
                          </select>
                        </div>
                </div>
               
                <div class="col-md-3">
                    <button type="button" class="btn btn-dark" >Search </button>

                </div>
            </div>
                
            
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
</section>

<div class="container top-btm-padding">
	<div class="row">
		<div class="col-md-3 center-menu">
		     <ul style="margin-bottom: 15px;margin-top: 15px;">
			   <li><a href="site/bjp"><i class="glyphicon glyphicon-chevron-right"></i> BJP </a></li>
			   <li><a href="site/congress"><i class="glyphicon glyphicon-chevron-right"></i> CONGRESS </a></li>
			   <li><a href=""><i class="glyphicon glyphicon-chevron-right"></i> TRS </a></li>
			   <li><a href=""><i class="glyphicon glyphicon-chevron-right"></i> TDP </a></li>
			   <li><a href=""><i class="glyphicon glyphicon-chevron-right"></i> YSRCP </a></li>
			   <li><a href=""><i class="glyphicon glyphicon-chevron-right"></i> JANASENA </a></li>
			   <li><a href=""><i class="glyphicon glyphicon-chevron-right"></i> CPI</a></li>
			   <li><a href=""><i class="glyphicon glyphicon-chevron-right"></i> CPM </a></li>
			   <li><a href=""><i class="glyphicon glyphicon-chevron-right"></i> INDEPENDENTS </a></li>
			   <li><a href=""><i class="glyphicon glyphicon-chevron-right"></i> NOMINATED POSTS </a></li>
			 </ul> 

			 <img src="images/ad-1.png" alt="ad name" class="img-responsive"> 
		</div>
		<div class="col-md-6">
			  <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="btab1">
                <div class="row">
                  <div class="col-md-6">
                         <div class="card hovercard">
                          <div class="cardheader"></div>
                          <div class="avatar">
                              <img alt="" src="images/bjp-mp.jpg" >
                          </div>
                          <div class="info">
                              <div class="title">
                                  <a target="_blank" href="" class="mp-text">Kishan Reddy</a>
                              </div>
                              <div class="desc">Telangana, MP(BJP)</div>
                              <button class="btn-1">Read More</button>
                          </div>
                          </div>
                  </div>
                  <div class="col-md-6">
                         <div class="card hovercard">
                          <div class="cardheader-1"></div>
                          <div class="avatar">
                              <img alt="" src="images/congress-mp.png" >
                          </div>
                          <div class="info">
                              <div class="title">
                                  <a target="_blank" href="" class="mp-text">Anjan Kumar Yadav</a>
                              </div>
                              <div class="desc">Telangana, MP(Congress)</div>
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
                              <img alt="" src="images/bjp-mp.jpg" >
                          </div>
                          <div class="info">
                              <div class="title">
                                  <a target="_blank" href="" class="mp-text">Kishan Reddy</a>
                              </div>
                              <div class="desc">Telangana, MP(BJP)</div>
                              <button class="btn-1">Read More</button>
                          </div>
                          </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card hovercard">
                          <div class="cardheader"></div>
                          <div class="avatar">
                              <img alt="" src="images/bjp-mp1.jpg">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <a target="_blank" href="" class="mp-text">Hari Babu</a>
                              </div>
                              <div class="desc">Andhra Pradesh, MP(BJP)</div>
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
		<div class="col-md-3 center-menu-1" >
			<img src="images/ad-1.png" alt="ad name" class="img-responsive" style="margin-top: 20px;">
			<ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked" style="margin-top: 15px;">
			   <li class="active"><a href="#btab1" data-toggle="tab" style="padding: 5px 10px;"><i class="glyphicon glyphicon-chevron-right"></i> MP </a></li>
			   <li><a href="#btab2" data-toggle="tab" style="padding: 5px 10px;"><i class="glyphicon glyphicon-chevron-right"></i> MLA </a></li>
			   <li><a href="#btab3" data-toggle="tab" style="padding: 5px 10px;" ><i class="glyphicon glyphicon-chevron-right"></i> MLC </a></li>
			   <li><a href="#btab4" data-toggle="tab" style="padding: 5px 10px;"><i class="glyphicon glyphicon-chevron-right"></i> CENTRAL COMMITTEE </a></li>
			   <li><a href="#btab5" data-toggle="tab" style="padding: 5px 10px;" ><i class="glyphicon glyphicon-chevron-right"></i> STATE COMMITTEE </a></li>
			   <li><a href="#btab6" data-toggle="tab" style="padding: 5px 10px;" ><i class="glyphicon glyphicon-chevron-right"></i> DISTRICT PRESIDENT </a></li>
			   <li><a href="#btab7" data-toggle="tab" style="padding: 5px 10px;"><i class="glyphicon glyphicon-chevron-right"></i> CHIEF MINISTERS</a></li>
			   <li><a href="#btab8" data-toggle="tab" style="padding: 5px 10px;"><i class="glyphicon glyphicon-chevron-right"></i> PRIME MINISTER</a></li>
			  <!--  <li><a href="#btab9" data-toggle="tab" style="padding: 5px 10px;"><i class="glyphicon glyphicon-chevron-right"></i> INDEPENDENTS </a></li>
			   <li><a href="#btab10" data-toggle="tab" style="padding: 5px 10px;"><i class="glyphicon glyphicon-chevron-right"></i> NOMINATED POSTS </a></li>  -->
			 </ul>  
		</div>
	</div>
</div>


<div class="container">

   <div class="row" id="slider-text">
    <div class="col-md-6" >
      <h2>Latest Updates</h2>
    </div>
    <div class="col-md-6">
    	
    </div>
   </div>

  <div class="row">
  	 <marquee style="  scrollamount="6" scrolldelay="90" direction="left" onmouseover="this.stop()" onmouseout="this.start()">
		<ul class="list-inline list-unstyled r">
		<li class="productbox">
		    <img src="images/kcr-1.jpg" class="img-responsive" width="300">
		    <div class="producttitle text-center"> 
		    <h3>KCR</h3>
		    <h6>Telangana, CM(TRS)</h6>
		    </div> 
		</li>
		<li class="productbox">
		    <img src="images/kcr-1.jpg" class="img-responsive" width="300">
		    <div class="producttitle text-center"> 
		    <h3>KCR</h3>
		    <h6>Telangana, CM(TRS)</h6>
		    </div> 
		</li> 
		<li class="productbox">
		    <img src="images/kcr-1.jpg" class="img-responsive" width="300">
		    <div class="producttitle text-center"> 
		    <h3>KCR</h3>
		    <h6>Telangana, CM(TRS)</h6>
		    </div> 
		</li>
		<li class="productbox">
		    <img src="images/kcr-1.jpg" class="img-responsive" width="300">
		    <div class="producttitle text-center"> 
		    <h3>KCR</h3>
		    <h6>Telangana, CM(TRS)</h6>
		    </div> 
		</li>
		<li class="productbox">
		    <img src="images/kcr-1.jpg" class="img-responsive" width="300">
		    <div class="producttitle text-center"> 
		    <h3>KCR</h3>
		    <h6>Telangana, CM(TRS)</h6>
		    </div> 
		</li>
		<li class="productbox">
		    <img src="images/kcr-1.jpg" class="img-responsive" width="300">
		    <div class="producttitle text-center"> 
		    <h3>KCR</h3>
		    <h6>Telangana, CM(TRS)</h6>
		    </div> 
		</li>
		<li class=" productbox">
		    <img src="images/kcr-1.jpg" class="img-responsive" width="300">
		    <div class="producttitle text-center"> 
		    <h3>KCR</h3>
		    <h6>Telangana, CM(TRS)</h6>
		    </div> 
		</li>
		<li class="productbox">
		    <img src="images/kcr-1.jpg" class="img-responsive" width="300">
		    <div class="producttitle text-center"> 
		    <h3>KCR</h3>
		    <h6>Telangana, CM(TRS)</h6>
		    </div> 
		</li>
		<li class="productbox">
		    <img src="images/kcr-1.jpg" class="img-responsive" width="300">
		    <div class="producttitle text-center"> 
		    <h3>KCR</h3>
		    <h6>Telangana, CM(TRS)</h6>
		    </div> 
		</li>
		<li class=" productbox">
		    <img src="images/kcr-1.jpg" class="img-responsive" width="300">
		    <div class="producttitle text-center"> 
		    <h3>KCR</h3>
		    <h6>Telangana, CM(TRS)</h6>
		    </div> 
		</li>
		<li class=" productbox">
		    <img src="images/kcr-1.jpg" class="img-responsive" width="300">
		    <div class="producttitle text-center"> 
		    <h3>KCR</h3>
		    <h6>Telangana, CM(TRS)</h6>
		    </div> 
		</li>
		<li class=" productbox">
		    <img src="images/kcr-1.jpg" class="img-responsive" width="300">
		    <div class="producttitle text-center"> 
		    <h3>KCR</h3>
		    <h6>Telangana, CM(TRS)</h6>
		    </div> 
		</li>
		<li class=" productbox">
		    <img src="images/kcr-1.jpg" class="img-responsive" width="300">
		    <div class="producttitle text-center"> 
		    <h3>KCR</h3>
		    <h6>Telangana, CM(TRS)</h6>
		    </div> 
		</li> 
		</ul><br>
		</marquee>
<!--     <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="carousel carousel-showmanymoveone slide" id="itemslider">
        <div class="carousel-inner">

          <div class="item active">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="images/kcr.jpg" class="img-responsive center-block"></a>
              <h4 class="text-center">Kcr</h4>
              <h5 class="text-center">CM(TRS)</h5>
              <h6 class="text-center">Telangana</h6>
            </div>
          </div>

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="images/kcr.jpg" class="img-responsive center-block"></a>
              <h4 class="text-center">MAYORAL KOŠULJA</h4>
              <h5 class="text-center">4000,00 RSD</h5>
              <h6 class="text-center">5000,00 RSD</h6>
            </div>
          </div>

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="images/kcr.jpg" class="img-responsive center-block"></a>
              <h4 class="text-center">PANTALONE TERI 2</h4>
              <h5 class="text-center">4000,00 RSD</h5>
              <h6 class="text-center">5000,00 RSD</h6>
            </div>
          </div>

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="images/kcr.jpg" class="img-responsive center-block"></a>
              <h4 class="text-center">CVETNA HALJINA</h4>
              <h5 class="text-center">4000,00 RSD</h5>
              <h6 class="text-center">5000,00 RSD</h6>
            </div>
          </div>

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="images/kcr.jpg" class="img-responsive center-block"></a>
              <h4 class="text-center">MAJICA FOTO</h4>
              <h5 class="text-center">4000,00 RSD</h5>
              <h6 class="text-center">5000,00 RSD</h6>
            </div>
          </div>

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="images/kcr.jpg" class="img-responsive center-block"></a>
              <h4 class="text-center">MAJICA MAYORAL</h4>
              <h5 class="text-center">4000,00 RSD</h5>
              <h6 class="text-center">5000,00 RSD</h6>
            </div>
          </div>

            <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="images/kcr.jpg" class="img-responsive center-block"></a>
              <h4 class="text-center">Rathan</h4>
              <h5 class="text-center">4000,00 RSD</h5>
              <h6 class="text-center">5000,00 RSD</h6>
            </div>
          </div>

            <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="images/kcr.jpg" class="img-responsive center-block"></a>
              <h4 class="text-center">Sagar</h4>
              <h5 class="text-center">4000,00 RSD</h5>
              <h6 class="text-center">5000,00 RSD</h6>
            </div>
          </div>

        </div>


         

      </div>
    </div> -->
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
                           <i class="fa fa-phone" aria-hidden="true"></i> <a href="#">9885577345</a>
                        </li>
                        <li>
                           <i class="fa fa-map-marker" aria-hidden="true"></i> <a href="#">Kukatpally,Hyderabad</a>
                        </li> 
                        <li>
                           <i class="fa fa-envelope" aria-hidden="true"></i> <a href="#">123@gmail.com</a>
                        </li> 
                   </ul>
               </div>
           
           
           </div> 
        </div>
    </footer>

     <div class="copyright">
     <div class="container">
       
         <div class="row text-center">
         	<p>Copyright © 2017 All rights reserved</p>
         </div>
         
 	   </div>
    </div>
    





</body>
</html>
<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
if(isset($_POST['btn-login']))
{
 $email = mysql_real_escape_string($_POST['email']);
 $upass = mysql_real_escape_string($_POST['pass']);
 $res=mysql_query("SELECT * FROM users WHERE email='$email'");
 $row=mysql_fetch_array($res);
 if($row['password']==md5($upass))
 {
  $_SESSION['user'] = $row['user_id'];
  header("Location: home.php");
 }
 else
 {
  ?>
        <script>alert('wrong details');</script>
        <?php
 }
 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="Pushpendra Tiwari" content="Aarambh'16">
    <title>Aarambh'16 | Youth Start-Up Conclave | SRM University</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">	
	<link href="css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header" role="banner">		
		<div class="main-nav">
			<div class="container">
				<div class="header-top">
					<div class="pull-right social-icons">
						<a href="#"><i class="fa fa-facebook"></i></a>
					</div>
				</div>     
		        <div class="row">	        		
		            <div class="navbar-header">
		                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		                    <span class="sr-only">Toggle navigation</span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                </button>
		                <a class="navbar-brand" href="index.html">
		                	<img class="img-responsive" src="images/logo.png" alt="logo">
		                </a>                    
		            </div>
		            <div class="collapse navbar-collapse">
		                <ul class="nav navbar-nav navbar-right">                 
		                    <li class="scroll active"><a href="#home">Home</a></li>
		                    <li class="scroll"><a href="#about">About</a></li>                      
		                    <li class="no-scroll"><a href="#event">Speakers</a></li>                      
		                    <li class="scroll"><a href="#schedule">schedule</a></li>
		                        <li class="scroll"><a href="#sponsor">Sponsors</a></li>
		                    <li class="no-scroll"><a  data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Purchase Tickets</a></li>
		                    <li class="scroll"><a href="#contact">Contact</a></li>       
		                </ul>
		            </div>
		        </div>
	        </div>
        </div>                    
    </header>
    <!--/#header--> 

    <style type="text/css">

						.gallery-box {
						    display: block;
						    position: relative;
						    margin: 0 auto;
						    max-width: 650px;
						    overflow:hidden;
						}


				    .gallery-box .gallery-box-caption {
				    display: block;
				    position: absolute;
				    bottom: 0;
				    width: auto;
				    height: 100%;
				    text-align: center;
				    color: #fff;
				    opacity: 0;
				    background: rgba(44,44,44,.8);
				    -webkit-transition: all .35s;
				    -moz-transition: all .35s;
				    transition: all .35s;
				}


				 .gallery-box .gallery-box-caption .gallery-box-content {
				    position: absolute;
				    top: 50%;
				    width: 100%;
				    text-align: center;
				    transform: translateY(-50%);
				}

				.gallery-box:hover .gallery-box-caption {
				    opacity: 1;
				}

				.gallery-box:hover img {
				    -webkit-transform: scale(1.1);
				    -ms-transform: scale(1.1);
				    transform: scale(1.1);
				}

				.gallery-box img {
				    -webkit-transition: all 300ms ease-in-out;
				    transition: all 300ms ease-in-out;
				}



    </style>
	
	<!--/Model-->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 style="color:black" class="modal-title" id="exampleModalLabel">Come Join us!</h4>
        </div>
        <div class="modal-body">
          <div id="login-form">
			<form method="post">
			<div class="form-group">
			<input type="text" class="form-control" name="email" placeholder="Your Email" required />
			</div>
			<div class="form-group">
			<input type="password" class="form-control" name="pass" placeholder="Your Password" required /></div>
			<div class="form-group"><button type="submit" class="btn btn-primary " name="btn-login">Sign In</button></div>
			<div class="form-group"><a href="register.php">Sign Up Here</a>
			</div>
			</form>
			</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!--/ModelEnd-->

    <section id="home">	
		<div id="main-slider" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#main-slider" data-slide-to="0" class="active"></li>
				<li data-target="#main-slider" data-slide-to="1"></li>
				<li data-target="#main-slider" data-slide-to="2"></li>
			</ol>

			<div class="carousel-inner">
				<div class="item active">
					<img class="img-responsive" src="images/slider/bg1.jpg" alt="slider">						
					<div class="carousel-caption">
						<h2>register for Aarambh'16</h2>
						<h4>9<sup style="text-transform:lowercase !important">th</sup>April, 2016</h4>
						<a href="#contact">GRAB YOUR TICKETS <i class="fa fa-angle-right"></i></a>
					</div>
				</div>
				<div class="item">
					<img class="img-responsive" src="images/slider/bg2.jpg" alt="slider">	
					<div class="carousel-caption">
						<h2>register for Aarambh'16</h2>
						<h4>9<sup style="text-transform:lowercase !important">th</sup>April, 2016</h4>
						<a href="#contact">GRAB YOUR TICKETS <i class="fa fa-angle-right"></i></a>
					</div>
				</div>
				<div class="item">
					<img class="img-responsive" src="images/slider/bg3.jpg" alt="slider">	
					<div class="carousel-caption">
						<h2>register for Aarambh'16</h2>
						<h4>9<sup style="text-transform:lowercase !important">th</sup>April, 2016</h4>
						<a href="#contact">GRAB YOUR TICKETS <i class="fa fa-angle-right"></i></a>
					</div>
				</div>				
			</div>
		</div>    	
    </section>
	<!--/#home-->

	<section id="explore">
		<div class="container">
			<div class="row">
				<div class="watch">
					<img class="img-responsive" src="images/watch.png" alt="">
				</div>				
				<div class="col-md-4 col-md-offset-2 col-sm-5">
					<h2>Event begins in...</h2>
				</div>				
				<div class="col-sm-7 col-md-6">					
					<ul id="countdown">
						<li>					
							<span class="days time-font">00</span>
							<p>days </p>
						</li>
						<li>
							<span class="hours time-font">00</span>
							<p class="">hours </p>
						</li>
						<li>
							<span class="minutes time-font">00</span>
							<p class="">minutes</p>
						</li>
						<li>
							<span class="seconds time-font">00</span>
							<p class="">seconds</p>
						</li>				
					</ul>
				</div>
			</div>
			<div class="cart">
				<a href="#"><i class="fa fa-shopping-cart"></i> <span>Purchase Tickets</span></a>
			</div>
		</div>
	</section><!--/#explore-->

	

	<section id="about">
		<div class="guitar2">				
			<img class="img-responsive" src="images/guitar2.png" alt="guitar">
		</div>
		<div class="about-content">					
					<h2>Aarambh'16</h2>
					<p>Aarambh’16 is a Youth Start-Up Conclave to be held at SRM University, Vadapalani. This event is primarily targeted at budding entrepreneurs, engineers and professionals aspiring to launch their own venture. Keynote speakers will cover various aspects of a start-up; its initiation, financial management and its sustenance. A panel discussion with many eminent personalities will also take place. This will be an interactive session where the participants can converse with the guests and clear their doubts. We aim to encourage the spirit of entrepreneurship and create the leaders of tomorrow. This event solely aims to unlock the entrepreneurial potential of aspiring participants.</p>
					<a href="#" class="btn btn-primary">View Date & Place <i class="fa fa-angle-right"></i></a>
				
		</div>
	</section><!--/#about-->
	

	<section id="event">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div id="event-carousel" class="carousel slide" data-interval="false">
						<h2 class="heading" style="text-align: -webkit-center;">Keynote Speakers</h2>
						<!-- <a class="even-control-left" href="#event-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
						<a class="even-control-right" href="#event-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a> -->
						<div  style="text-align: -webkit-center;" class="carousel-inner">
							<div class="item active">
								<div class="row">
									<div class="col-lg-4 col-sm-4 speaker">
								<div class="details" style="display:none">
									<div class="name">Rajesh Srinivas</div>
									<div class="about">
										More than 2 decades of experience in SME Banking, Branch Banking and Retail Banking. Experience of working in Gujarat, Rajasthan, Central India( M.P., Chattisgarh and Vidarbha) , East India and Whole of South India. Currently with Yes Bank in SME for 9 years as Regional Business Leader, Emerging Business Banking, handling all the four states of South India, based out of Chennai.

Recipient of the Lifetime,Prestigious "Golden Pin", an M.D&CEO's Award under the "CEO League of Excellence" category for Outstanding Contribution towards growing the bank to accomplish the Key Objectives of the bank. 
									</div>
								</div>
									<a href="#galleryModal" class="gallery-box" data-toggle="modal" >
										<div class="single-event">
											<img class="img-responsive" src="images/event/event1.jpg" alt="event-image">
											<h4>HRishikesh Datar</h4>
											<h5 style=" color: floralwhite;">GROUP EXECUTIVE VICE PRESIDENT, YES BANK</h5>
										</div>
									</a>
								</div>
							<div class="col-lg-4 col-sm-4 speaker">
								<div class="details" style="display:none">
									<div class="name">HRishikesh Datar</div>
									<div class="about">
										Entrepreneur and Founder CEO of vakilsearch.com, the leading online legal services provider in India. Alumnus of the National Law School of India University, Bangalore. In-charge of building vakilsearch.com's lawyer network, brand building & marketing and alliances.
									</div>
								</div>
								<a href="#galleryModal" class="gallery-box" data-toggle="modal" >
									<div class="single-event">
										<img class="img-responsive" src="images/event/event2.jpg" alt="event-image">
										<h4>HRishikesh Datar</h4>
										<h5 style=" color: floralwhite;">Founder & CEO, Vakilsearch.com</h5>
									</div>
								</a>
							</div>
							<div class="col-lg-4 col-sm-4 speaker">
								<div class="details" style="display:none">
									<div class="name">K. Parasuraman</div>
									<div class="about">
																				
									</div>
								</div>
								<a href="#galleryModal" class="gallery-box" data-toggle="modal" >
									<div class="single-event">
										<img class="img-responsive" src="images/event/event0.jpg" alt="event-image">
										<h4>K. Parasuraman</h4>
										<h5 style=" color: floralwhite;"> Director, Samrriddhi Leadership Academy</h5>
									</div>
								</a>
							</div>
									
									
						</div>
							</div>
							
						</div>
						<div id="event-carousel" class="carousel slide" data-interval="false">
						<h2 class="heading" style="text-align: -webkit-center;">Panelists</h2>
						<!-- <a class="even-control-left" href="#event-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
						<a class="even-control-right" href="#event-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a> -->
						<div  style="text-align: -webkit-center;" class="carousel-inner">
							<div class="item active">
								<div class="row">
									<div class="col-lg-4 col-sm-4 speaker">
								<div class="details" style="display:none">
									<div class="name">Venkatesh Krishnamoorthy</div>
									<div class="about">
										Chief Evangelist of YourStory.com and Founder of VirtualPaper. Editor-turned-author. Believes entrepreneurship is a slightly convoluted state of mind daring to dream the impossible. While not editing books, finds joy in talking [to people], writing, and thinking about what makes entrepreneurs what they are. Has a special attraction towards product tech.
									</div>
								</div>
									<a href="#galleryModal" class="gallery-box" data-toggle="modal" >
										<div class="single-event">
											<img class="img-responsive" src="images/event/event11.jpg" alt="event-image">
											<h4>Venkatesh Krishnamoorthy</h4>
											<h5 style=" color: floralwhite;">Founder, Virtual Paper </h5>
										</div>
									</a>
								</div>
							<div class="col-lg-4 col-sm-4 speaker">
								<div class="details" style="display:none">
									<div class="name">L. Hemachandran</div>
									<div class="about">
										Additional Director – Youth Services for Rotary International District 3230) for the year 2014 and 2015

Addl. Chairman for MY FLAG MY INDIA Guinness event.

He completed his engineering from Crescent Engineering College and authored more than 25 books for Anna and Madras universities syllabus during his college days.
Strategic brand consultant, worked with various companies on evolving strategies for business transformation, business model generation and specifically in formulating PR, Communication and branding strategies.

He is very much passionate about developmental politics and believes “Good politics is the only way to bring permanent change and solve all socio-economic problems of this country”

He was the state general secretary of a political party started by IITians and educated youths in 2006-.He had worked within the group as General Secretary. And the youth party secured 34000 votes in Tamil Nadu –Assembly elections 2006.
									</div>
								</div>
								<a href="#galleryModal" class="gallery-box" data-toggle="modal" >
									<div class="single-event">
										<img class="img-responsive" src="images/event/event12.jpg" alt="event-image">
										<h4>L. Hemachandran</h4>
										<h5 style=" color: floralwhite;">Founder & CEO, Brand Avatar</h5>
									</div>
								</a>
							</div>
							<div class="col-lg-4 col-sm-4 speaker">
								<div class="details" style="display:none">
									<div class="name">Viresh Reddy</div>
									<div class="about">
										Toast concentrates on unique places and avoids listing deals from well-known chains. Tiki Taka, a rooftop football facility, and Chaos Entertainment, a laser-tag gaming arena, are examples. The five-member team aims to get 250 merchants from Chennai on board by the end of the year and then expand to Bengaluru and Hyderabad.
									</div>
								</div>
								<a href="#galleryModal" class="gallery-box" data-toggle="modal" >
									<div class="single-event">
										<img class="img-responsive" src="images/event/event3.jpg" alt="event-image">
										<h4>Viresh Reddy</h4>
										<h5 style=" color: floralwhite;">Founder & CEO, Toast Central</h5>
									</div>
								</a>
							</div>
									
									
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
			</div>			
		</div>
	</section><!--/#event-->

<section  style="background-color: #333333;padding-top: 50px;" id="schedule">
<div class="row">
				<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
					<h2 class="text-center text-primary; padding-top:20px;">Schedule - April 09, 2016</h2>
					<hr>
				</div>

				<style type="text/css">
					@media  screen and (min-width: 992px) {
						.schedule-text{
							float:left !important;
							text-align: left;
						}
						.schedule-badge{
							float:right !important;
						}
					}
				</style>
	

				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12" style="text-align:center">
						<div class="media wow fadeInRight">
							
								<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12" style="background-color:#333333; font-size:1.4em;">
										<span class="badge schedule-badge" style="background-color:#D9411E;color:#D3D3D3">09:30 AM - 10:00 AM</span>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12" style="background-color:#333333; font-size:1.4em;">
										<span class="schedule-text" style="font-size:1em;">Opening Remarks</span>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12" style="background-color:#333333; font-size:1.4em;">
										<span class="badge schedule-badge" style="background-color:#D9411E;color:#D3D3D3">10:00 AM - 10:45 AM</span>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12" style="background-color:#333333; font-size:1.4em;">
										<span class="schedule-text" style="font-size:1em;">"Financial Aspects to a Startup"<br>Rajesh Srinivas <span style="color:#666666;font-size:0.7em;"><br> Group Executive Vice President, Yes Bank </span></span>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12" style="background-color:#333333; font-size:1.4em;">
										<span class="badge schedule-badge" style="background-color:#D9411E;color:#D3D3D3">10:45 AM - 11:00 AM</span>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12" style="background-color:#333333; font-size:1.4em;">
										<span class="schedule-text" style="font-size:1em;">Refreshments</span>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12" style="background-color:#333333; font-size:1.4em;">
										<span class="badge schedule-badge" style="background-color:#D9411E;color:#D3D3D3">11:00 AM - 11:45 AM</span>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12" style="background-color:#333333; font-size:1.4em;">
										<span class="schedule-text" style="font-size:1em;">"Legal Aspects to a Startup"<br>Hrishikesh Datar <span style="color:#666666;font-size:0.7em;"><br> Co-founder and CEO , Vakil Search</span></span>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12" style="background-color:#333333; font-size:1.4em;">
										<span class="badge schedule-badge" style="background-color:#D9411E;color:#D3D3D3">11:40 AM - 12:20 PM</span>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12" style="background-color:#333333; font-size:1.4em;">
										<span class="schedule-text" style="font-size:1em;"> "Driving Forward - The Automobile Revolution"<br>Amit Jain <span style="color:#666666;font-size:0.7em;"><br> Country Head, Visteon Electronics India</span></span>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12" style="background-color:#333333; font-size:1.4em;">
										<span class="badge schedule-badge" style="background-color:#D9411E;color:#D3D3D3">12:20 PM - 02:00 PM</span>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12" style="background-color:#333333; font-size:1.4em;">
										<span class="schedule-text" style="font-size:1em;">Lunch and Networking</span>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12" style="background-color:#333333; font-size:1.4em;">
										<span class="badge schedule-badge" style="background-color:#D9411E;color:#D3D3D3">02:00 PM - 03:30 PM</span>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12" style="background-color:#333333; font-size:1.4em;">
										<span class="schedule-text" style="font-size:1em;">
										
											DISCUSSION ON START-UP, STAND UP INDIA INITIATIVE <br>
											<span style="color:#d9411E">Panelists</span><br>
											<span style="font-size:0.7em;">
												Venkatesh Krishnamoorthy<br><span style="color:#666666">  Founder, Virtual Paper</span><br>
												John Yesudhas<br><span style="color:#666666"> CEO, Gadget World </span><br>
												Viresh Reddy<br><span style="color:#666666">  CEO, Toast Central </span><br><br>
											</span>

											<span style="color:#d9411E">Moderator</span><br>

											<span style="font-size:0.7em;">
												Govindraj Ethiraj<br> 
												<span style="color:#666666">Founder, Ping Digital Broadcast</span><br>
											</span>
										
										</span>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12" style="background-color:#333333; font-size:1.4em;">
										<span class="badge schedule-badge" style="background-color:#D9411E;color:#D3D3D3">03:30 PM - 04:00 PM</span>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12" style="background-color:#333333; font-size:1.4em;">
										<span class="schedule-text" style="font-size:1em;">"Refreshments"<span style="color:#666666;font-size:0.7em;"><br></span></span>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12" style="background-color:#333333; font-size:1.4em;">
										<span class="badge schedule-badge" style="background-color:#D9411E;color:#D3D3D3">04:00 PM - 04:30 PM</span>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12" style="background-color:#333333; font-size:1.4em;">
										<span class="schedule-text" style="font-size:1em;">Valediction</span>
									</div>
								</div>
				</div>
			</div>
		</section>

	<!-- <section id="schedule">
		<div id="sponsor-carousel" class="carousel slide" data-interval="false">
			<div class="container"> -->
			<!-- <div class="twit">
				<img class="img-responsive" src="images/twit.png" alt="twit">
			</div> -->
		<!--	###<div style="color:darkcyan"class="row">
				<div class="col-sm-10 ">
					<h2 >Schedule</h2>
					
				</div>
				<div style="padding-left:50px;" class="col-sm-5">
					<h3>Events</h3>
				</div>
				<div class="pull-right col-sm-5">
					<h3>Timings</h3>
				</div>
				<div class="col-md-20">	
					<div style="padding-left:50px;" class="col-sm-5">
						<h4>1. Opening Remarks</h4>
					</div>
					<div class="pull-right col-sm-5">
						<h4>9:30-10:00 AM</h4>
					</div>
				</div>
				<div>	
					<div style="padding-left:50px;" class="col-sm-6">
						<h4>2. Financial Aspects to a Startup&nbsp;<span style="font-size: small !important;text-transform: initial;">By Rajesh Srinivas, Group Executive Vice President, Yes Bank</span></h4>
					</div>
					<div class="pull-right col-sm-5">
						<h4>9:30-10:00 AM</h4>
					</div>
				</div>
				<div>
					<div style="padding-left:50px;" class="col-sm-5">
						<h4>Opening Remarks</h4>
					</div>
					<div class="pull-right col-sm-5">
						<h4>9:30-10:00 AM</h4>
					</div>
				</div>
				<div>	
					<div style="padding-left:50px;" class="col-sm-5">
						<h4>Opening Remarks</h4>
					</div>
					<div class="pull-right col-sm-5">
						<h4>9:30-10:00 AM</h4>
					</div>
				</div>	
				<div style="padding-left:50px;" class="col-sm-5">
					<h4>Opening Remarks</h4>
				</div>
				<div class="pull-right col-sm-5">
					<h4>9:30-10:00 AM</h4>
				</div>
				###### <div class="col-sm-6 col-sm-offset-3">
					<div class="text-left carousel-inner left-block">
						<div class="item active">
							<img src="images/twitter/twitter1.png" alt="">
							<p>In hac habitasse platea dictumst. Nam pulvinar, odio sed rhoncus suscipit </p>
							<a href="#">http://t.co/yY7s1IfrAb 2 days ago</a>
						</div>
						<div class="item">
							<img src="images/twitter/twitter2.png" alt="">
							<p>In hac habitasse platea dictumst. Nam pulvinar, odio sed rhoncus suscipit </p>
							<a href="#">http://t.co/yY7s1IfrAb 2 days ago</a>
						</div>
						<div class="item">
							<img src="images/twitter/twitter3.png" alt="">
							<p>In hac habitasse platea dictumst. Nam pulvinar, odio sed rhoncus suscipit </p>
							<a href="#">http://t.co/yY7s1IfrAb 2 days ago</a>
						</div>
					</div>
					<a class="twitter-control-left" href="#twitter-feed" data-slide="prev"><i class="fa fa-angle-left"></i></a>
					<a class="twitter-control-right" href="#twitter-feed" data-slide="next"><i class="fa fa-angle-right"></i></a>
				</div>
			</div>#####
		</div>	
		</div>	
	</section>-->
	
	<section id="sponsor">
		<div id="sponsor-carousel" class="carousel slide" data-interval="false">
			<div class="container">
				<div class="row">
					<div class="col-sm-10">
						<h2>Sponsors</h2>			
						<div class="carousel-inner">
							<div class="item active">
								<ul>
									<li><a href="#"><img class="img-responsive" src="images/sponsor/sponsor1.png" alt=""></a></li>
									<li><a  href="#"><img class="img-responsive" src="images/sponsor/sponsor2.png" alt=""></a></li>
									<li><a href="#"><img class="img-responsive" src="images/sponsor/sponsor3.png" alt=""></a></li>
									<li><a href="#"><img class="img-responsive" src="images/sponsor/sponsor4.png" alt=""></a></li>
									<li><a href="#"><img class="img-responsive" src="images/sponsor/sponsor5.png" alt=""></a></li>
									<li><a href="#"><img class="img-responsive" src="images/sponsor/sponsor6.png" alt=""></a></li>
								</ul>
							</div>
							<div class="item">
								<ul>
									<li><a href="#"><img class="img-responsive" src="images/sponsor/sponsor6.png" alt=""></a></li>
									<li><a href="#"><img class="img-responsive" src="images/sponsor/sponsor5.png" alt=""></a></li>
									<li><a href="#"><img class="img-responsive" src="images/sponsor/sponsor4.png" alt=""></a></li>
									<li><a href="#"><img class="img-responsive" src="images/sponsor/sponsor3.png" alt=""></a></li>
									<li><a href="#"><img class="img-responsive" src="images/sponsor/sponsor2.png" alt=""></a></li>
									<li><a href="#"><img class="img-responsive" src="images/sponsor/sponsor1.png" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>				
			</div>
			<div class="light">
				<img class="img-responsive" src="images/light.png" alt="">
			</div>
		</div>
	</section><!--/#sponsor-->

	<section id="contact">
		<div id="map">
			<div id="gmap-wrap">
	 			<!-- <div id="gmap"> 				
	 			</div> -->	 			
	    	</div>
		</div><!--/#map-->
		<div class="contact-section">
			<div class="container-fluid">
			<div class="row">
				<div class="col-md-6" style="height:100%; padding:20px;">
						<div class="img-responsive">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.7475284076218!2d80.2091503137318!3d13.051735990803373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5266ea218fc7e3%3A0x70bbbca6edfc9243!2sSRM+University+Vadapalani!5e0!3m2!1sen!2s!4v1458225258636" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>
			
				
					<div class="col-sm-6 pull-right">
						<div class="contact-text">
							<h3>Contact</h3>
							<address>
								E-mail: promo@party.com<br>
								Phone: +1 (123) 456 7890<br>
								Fax: +1 (123) 456 7891
							</address>
						</div>
						<div class="contact-address">
							<h3>Contact</h3>
							<address>
								Unit C2, St.Vincent's Trading Est.,<br>
								Feeder Road,<br>
								Bristol, BS2 0UY<br>
								United Kingdom
							</address>
						</div>
					</div>
					<div class="col-sm-5">
						
					</div>
				</div>
			</div>
		</div>		
	</section>
    <!--/#contact-->

    <footer id="footer">
        <div class="container">
            <div class="text-center">
                <p> Copyright  &copy;2016<a target="_blank" href="#"> Aarambh'16 </a>Theme. All Rights Reserved. </p>                
            </div>
        </div>
    </footer>
    <!--/#footer-->
    <!-- The Modals start here -->
		<div id="mymodal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div  style="background-color:rgba(44,44,44,0.8);" class="modal-content">
					<div class="modal-body">
						<!-- <img src="//placehold.it/1200x700/222?text=..." id="galleryImage" class="img-responsive" /> -->
						<center><h2><div id="mymodalname"></div></h2></center>
						<p>
							<div id="mymodalabout"></div>
						</p>
						<p>
							<br/>
							<button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true">Close</button>
						</p>
					</div>
				</div>
			</div>
		</div>
  
  	
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  	<script type="text/javascript" src="js/gmaps.js"></script>
	<script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script src="https://www.pragyan.org/summit/js/wow.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
	<script src="js/myajax.js"></script>
    <script type="text/javascript" src="js/main.js"></script> 
    
</body>
</html>
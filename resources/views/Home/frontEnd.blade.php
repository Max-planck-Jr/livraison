<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="description" content="Responsive Bootstrap App Landing Page Template" />
<meta name="keywords" content="Kane, Bootstrap, Landing page, Template, App, Mobile, Android, iOS"/>
<meta name="author" content="Mizanur Rahman" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- SITE TITLE -->
<title>MARC LOGISTICS</title>

<!-- =========================
      FAV AND TOUCH ICONS
============================== -->
<link rel="icon" href="\front/files/images/favicon.ico">
<link rel="apple-touch-icon" href="\front/files/images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="\front/files/images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="\front/files/images/apple-touch-icon-114x114.png">

<!-- =========================
     STYLESHEETS
============================== -->
<!-- BOOTSTRAP -->
<link rel="stylesheet" href="\front/css/bootstrap.min.css">

<!-- FONT ICONS -->
<link rel="stylesheet" href="\front/assets/elegant-icons/style.css">
<link rel="stylesheet" href="\front/assets/app-icons/styles.css">
<!--[if lte IE 7]><script src="http://demo.templateocean.com/premium/template/kane/layout-style-one/dark/transparent-color-bg/lte-ie7.js"></script><![endif]-->

<!-- WEB FONTS -->
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,100italic,400,300italic' rel='stylesheet' type='text/css'>

<!-- CAROUSEL AND LIGHTBOX -->
<link rel="stylesheet" href="\front/css/owl.theme.css">
<link rel="stylesheet" href="\front/css/owl.carousel.css">
<link rel="stylesheet" href="\front/css/nivo-lightbox.css">
<link rel="stylesheet" href="\front/css/nivo_themes/default/default.css">

<!-- ANIMATIONS -->
<link rel="stylesheet" href="\front/css/animate.min.css">

<!-- CUSTOM STYLESHEETS -->
<link rel="stylesheet" href="\front/css/styles.css">

<!-- COLORS | CURRENTLY USED DIFFERENTLY TO SWITCH FOR DEMO. IN ORIGINAL FILE ALL COLORS LINK IS COMMENTED EXCEPT BLUE -->
<link rel="stylesheet" href="\front/css/colors/blue.css" title="blue">
<link rel="alternate stylesheet" href="\front/css/colors/green.css" title="green">
<link rel="alternate stylesheet" href="\front/css/colors/orange.css" title="orange">
<link rel="alternate stylesheet" href="\front/css/colors/purple.css" title="purple">
<link rel="alternate stylesheet" href="\front/css/colors/slate.css" title="slate">
<link rel="alternate stylesheet" href="\front/css/colors/yellow.css" title="yellow">
<link rel="alternate stylesheet" href="\front/css/colors/red.css" title="red">
<link rel="alternate stylesheet" href="\front/css/colors/blue-munsell.css" title="blue-munsell">

<!-- RESPONSIVE FIXES -->
<link rel="stylesheet" href="\front/css/responsive.css">

<!-- STYLE SWITCH STYLESHEET ONLY FOR DEMO -->
<link rel="stylesheet" href="\front/demo/demo.css">



<!--[if lt IE 9]>
			<script src="\front/js/html5shiv.js"></script>
			<script src="\front/js/respond.min.js"></script>
<![endif]-->

<!-- JQUERY -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</head>

<body>
<!-- =========================
     PRE LOADER
============================== -->
<div class="preloader">
  <div class="status">&nbsp;</div>
</div>

<!-- =========================
     HEADER
============================== -->
<header class="header" data-stellar-background-ratio="0.5" id="home">

<!-- COLOR OVER IMAGE -->
<div class="color-overlay"> <!-- To make header full screen. Use .full-screen class with color overlay. Example: <div class="color-overlay full-screen">  -->

	<!-- STICKY NAVIGATION -->
	<div class="navbar navbar-inverse bs-docs-nav navbar-fixed-top sticky-navigation">
		<div class="container">
			<div class="navbar-header">

				<!-- LOGO ON STICKY NAV BAR -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#kane-navigation">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>

				<a class="navbar-brand" href="/"><img src="{{ asset('logo.jpeg') }}" alt=""></a>

			</div>

			<!-- NAVIGATION LINKS -->
			<div class="navbar-collapse collapse" id="kane-navigation">
				<ul class="nav navbar-nav navbar-right main-navigation">
					<li><a href="index.html#home">Accueil</a></li>
					<li><a href="index.html#tarifs">Tarifs</a></li>
					<li><a href="index.html#brief1">Qui sommes nous?</a></li>
                    <li><a href="index.html#testimonials">Témoignages</a></li>
                    <li><a href="index.html#services">Services</a></li>
					<li><a href="index.html#contact_us">Nous contacter?</a></li>
				</ul>
			</div>
		</div> <!-- /END CONTAINER -->
	</div> <!-- /END STICKY NAVIGATION -->


	<!-- CONTAINER -->
	<div class="container">

		<!-- ONLY LOGO ON HEADER-->
		<div class="only-logo">
			<div class="navbar">
				<div class="navbar-header">
					<img src="{{ asset('planet.png') }}" alt="">
				</div>
			</div>
		</div> <!-- /END ONLY LOGO ON HEADER -->

		@if ($errors->any())
            <div class="alert alert-{{$errors->all()[1]}}">{{ $errors->all()[0] }}</div>
        @endif
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!-- HEADING AND BUTTONS -->
				<div class="intro-section">

					<!-- WELCOM MESSAGE -->
					<h1 class="intro">MarcLogistics votre facilitateur dans les services de logistique et de transports </h1>
					<h5>Envoyez des colis partout dans le monde !!! </h5>

					<!-- BUTTON -->
					<div style="display:inline-block" class="buttons" id="download-button">

						<a href="#brief1" class="btn btn-default btn-lg standard-button"><i class="icon_lightbulb_alt"></i>Qui sommes-nous ?</a>

					</div>
                    <!-- /END BUTTONS -->

				</div>
				<!-- /END HEADNING AND BUTTONS -->

			</div>
		</div>
		<!-- /END ROW -->

	</div>
	<!-- /END CONTAINER -->
</div>
<!-- /END COLOR OVERLAY -->
</header>
<!-- /END HEADER -->

<div class="container" id="tarifs">

        <!-- SECTION HEADER -->
        <div class="section-header wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">

            <!-- SECTION TITLE -->
            <h2 class="white-text">Nos Catégories</h2>
            <div class="colored-line">
            </div>

            <div class="section-description">
                 Logistics met un point d'honneur à vous fournir un rapport qualité/prix sans égal
            </div>

            <div class="colored-line">
            </div>
        </div>
        <!-- /END SECTION HEADER -->

        <div class="row">
            @foreach ($third_tarifs as $tarif)

            <!-- SINGLE PACKACGE -->
            <div class="col-md-3 col-sm-3 single-service wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">

                <div class="single-package">

                    <h3 class="package-heading main-color">
                    {{ $tarif->libelle }} </h3>

                    <div class="price">
                        <h2><span class="sign"></span> </h2>
                    </div>

                </div>
            </div>
            <!-- /END SINGLE PACKACGE -->

            @endforeach


            <!-- SINGLE PACKACGE -->
            <div class="col-md-3 col-sm-3 single-service wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
                <a data-toggle="modal" data-target="#exampleModalCenter">
                    <div class="single-package">

                        <h3 class="package-heading main-color">Tous les tarifs </h3>

                        <div class="price">
                            <h2><span class="month">Voir tous</span></h2>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /END SINGLE PACKACGE -->

        </div>
        <!-- /END ROW -->

<!-- =========================
     BRIEF LEFT SECTION
============================== -->
<section class="app-brief deep-dark-bg" id="brief1">

<div class="container">

	<div class="row">

		<!-- PHONES IMAGE -->
		<div class="col-md-6 wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s">
			<div class="phone-image">
				<img src="\front/files/images/planet.png" alt="">
			</div>
		</div>

		<!-- RIGHT SIDE WITH BRIEF -->
		<div class="col-md-6 left-align wow fadeInLeft animated" data-wow-offset="10" data-wow-duration="1.5s">

			<!-- SECTION TITLE -->
			<h2 class="white-text">Qui sommes-nous ?</h2>

			<div class="colored-line-left">
			</div>

			<p>
                MarcLogistics est une jeune entreprise qui s'est donnée pour objectif de permettre la livraison des produits partout dans le monde. <br />
                Elle se spécialise dans :
			</p>

			<!-- FEATURE LIST -->
			<ul class="feature-list">
				<li><i class="icon_check_alt2"></i> Le transport securisé de colis</li>
                <li><i class="icon_check_alt2"></i> La livraison avec tracabilité</li>
                <li><i class="icon_check_alt2"></i> La livraison avec notifications</li>
			</ul>

		</div>
		<!-- /END RIGHT BRIEF -->

	</div>
	<!-- /END ROW -->

</div>
<!-- /END CONTAINER -->

</section>
<!-- /END SECTION -->



<!-- =========================
     BRIEF LEFT SECTION WITH VIDEO
============================== -->
<section class="app-brief deep-dark-bg" id="brief1">

<div class="container">

	<div class="row">

		<!-- PHONES IMAGE -->
		<div class="col-md-6 wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s">
			<div class="video-container">

                <!--
				<div class="video">

					<iframe src="//player.vimeo.com/video/88902745?byline=0&amp;portrait=0&amp;color=ffffff" width="600" height="338" frameborder="0" allowfullscreen>
					</iframe>
				</div>
				-->

				<div class="video">

					<iframe width="640" height="360" src="http://www.youtube.com/embed/VjbGg-VuqbU?rel=0" frameborder="0" allowfullscreen></iframe>
				</div>

			</div>

		</div>

		<!-- RIGHT SIDE WITH BRIEF -->
		<div class="col-md-6 left-align wow fadeInLeft animated" data-wow-offset="10" data-wow-duration="1.5s">

			<!-- SECTION TITLE -->
			<h2 class="white-text">Vidéo présentation</h2>

			<div class="colored-line-left">
			</div>

			<p>
				Vidéo présentation de la structure MarcLogistics.<br/><br/>
				Qui sommes nous ? Que faisons-nous ? Pourquoi nous faire confiance ?
			</p>


		</div>
		<!-- /END RIGHT BRIEF -->

	</div>
	<!-- /END ROW -->

</div>
<!-- /END CONTAINER -->

</section>
<!-- /END SECTION -->

<!-- =========================
     TESTIMONIALS
============================== -->
<section class="testimonials" id="testimonials">

<div class="color-overlay">

	<div class="container wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">

		<!-- FEEDBACKS -->
		<div id="feedbacks" class="owl-carousel owl-theme">

			<!-- SINGLE FEEDBACK -->
			<div class="feedback">

				<!-- IMAGE -->
				<div class="image">
					<!-- i class=" icon_quotations"></i -->
					<img src="\front/files/images/clients-pic/4.jpg" alt="">
				</div>

				<div class="message">
                    Depuis que j'ai connu MarcLogistics, je ne souffre plus dans mes affaires. Je paie aisément mes produits en Suisse et je les fais parvenir en Belgique à petit prix. Bref, mes affaires marchent à merveille désormais. Merci à vous !
				</div>

				<div class="white-line">
				</div>

				<!-- INFORMATION -->
				<div class="name">
					Jean Baptiste
				</div>
				<div class="company-info">
					Commerçant
				</div>

			</div>
			<!-- /END SINGLE FEEDBACK -->

			<!-- SINGLE FEEDBACK -->
			<div class="feedback">

				<!-- IMAGE -->
				<div class="image">
					<!-- i class=" icon_quotations"></i -->
					<img src="\front/files/images/clients-pic/6.jpg" alt="">
				</div>

				<div class="message">
                    Le plus intéressant avec Marc-Logistics c'est qualité de ses services, le temps de réaction, bravo à vous !
				</div>

				<div class="white-line">
				</div>

				<!-- INFORMATION -->
				<div class="name">
					Olivier 
				</div>
				<div class="company-info">
					Entrepreneur
				</div>

			</div>
			<!-- /END SINGLE FEEDBACK -->

			<!-- SINGLE FEEDBACK -->
			<div class="feedback">

				<!-- IMAGE -->
				<div class="image">
					<!-- i class=" icon_quotations"></i -->
					<img src="\front/files/images/clients-pic/5.jpg" alt="">
				</div>

				<div class="message">
                    J'avais de graves problèmes à l'époque lorsque je voulais envoyer des colis à destination du Cameroun. Mais depuis que j'ai connu MarcLogistics, j'envoie en toute sérénité des colis au Cameroun et dans des délais très courts.
				</div>

				<div class="white-line">
				</div>

				<!-- INFORMATION -->
				<div class="name">
					Roland
				</div>
				<div class="company-info">
					Enseignant
				</div>

			</div>
			<!-- /END SINGLE FEEDBACK -->

		</div>
		<!-- /END FEEDBACKS -->

	</div>
	<!-- /END CONTAINER -->

</div>
<!-- /END COLOR OVERLAY -->

</section>
<!-- /END TESTIMONIALS SECTION -->


<!-- =========================
     SERVICES
============================== -->
<section class="services" id="services">

<div class="container">

	<!-- SECTION HEADER -->
	<div class="section-header wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">

		<!-- SECTION TITLE -->
		<h2 class="white-text">Nos Services</h2>

		<div class="colored-line">
		</div>
		<div class="section-description">
			Le champ d'action de MarcLogistics s'étend sur les services suivants
		</div>
		<div class="colored-line">
		</div>

	</div>
	<!-- /END SECTION HEADER -->

	<div class="row">

		<!-- SINGLE SERVICE -->
		<div class="col-md-4 single-service wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">

			<!-- SERVICE ICON -->
			<div class="service-icon">
				<i class="icon_lock_alt"></i>
			</div>

			<!-- SERVICE HEADING -->
			<h3>Tracabilité des colis</h3>

			<!-- SERVICE DESCRIPTION -->

		</div>
		<!-- /END SINGLE SERVICE -->

		<!-- SINGLE SERVICE -->
		<div class="col-md-4 single-service wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">

			<!-- SERVICE ICON -->
			<div class="service-icon">
				<i class="icon_check_alt2"></i>
			</div>

			<!-- SERVICE HEADING -->
			<h3>Transport de colis</h3>

			<!-- SERVICE DESCRIPTION -->

		</div>
		<!-- /END SINGLE SERVICE -->

		<!-- SINGLE SERVICE -->
		<div class="col-md-4 single-service wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">

			<!-- SERVICE ICON -->
			<div class="service-icon">
				<i class="icon_ribbon_alt"></i>
			</div>

			<!-- SERVICE HEADING -->
			<h3>Livraison partout dans plusieurs pays d Europe</h3>

			<!-- SERVICE DESCRIPTION -->

		</div>
		<!-- /END SINGLE SERVICE -->

	</div>
	<!-- /END ROW -->

</div>
<!-- /END CONTAINER -->

</section>
<!-- /END FEATURES SECTION -->

<!-- =========================
     DOWNLOAD NOW
============================== -->
<section class="download" id="contact_us">

<div class="color-overlay">

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!-- DOWNLOAD BUTTONS AREA -->
				<div class="download-container">
					<h2 class=" wow fadeInLeft animated" data-wow-offset="10" data-wow-duration="1.5s">Nous contacter</h2>

					<!-- BUTTONS -->
					<div class="buttons wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s">
						<div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <p>
                                    
                                    Belgique (+32) 045612356 /(+32) 457896589 <br>
									Suisse : 0041 765809596<br>
                                    Email: info@Marclogistics.com <br>
                                    BP: 1050 Ixelles
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 pull-right">
                                <p>
                                    Addresse: <br/>
                                    <small>Bruxelles, Boulevard du triomphe <br/>
                                    Ixelles, place de la couronne <br />
                                    </small>
                                </p>
                            </div>
                        </div>


					</div>
					<!-- /END BUTTONS -->

				</div>
				<!-- END OF DOWNLOAD BUTTONS AREA -->


				<!-- SUBSCRIPTION FORM WITH TITLE -->
				<div class="subscription-form-container">

                    <h2 class="wow fadeInLeft animated" data-wow-offset="10" data-wow-duration="1.5s">Souscrivez maintenant!</h2>
                    <small>Vous recevrez toutes nos meilleures offres en temps réel</small>

					<!-- =====================
					     MAILCHIMP FORM STARTS
					     ===================== -->

					<form class="subscription-form mailchimp form-inline wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s" role="form">

						<!-- SUBSCRIPTION SUCCESSFUL OR ERROR MESSAGES -->
						<h4 class="subscription-success"></h4>
						<h4 class="subscription-error"></h4>

						<!-- EMAIL INPUT BOX -->
						<input type="email" name="email" id="subscriber-email" placeholder="Your Email" class="form-control input-box">

						<!-- SUBSCRIBE BUTTON -->
						<button type="submit" id="subscribe-button" class="btn btn-default standard-button">Souscrire</button>

					</form>
					<!-- /END MAILCHIMP FORM STARTS -->

					<!-- =====================
					     LOCAL TXT FORM STARTS
					     ===================== -->

					<!-- THIS FORM IS COMMENTED TO HIDE

					<form class="subscription-form form-inline wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s" id="subscribe" role="form">

						<h4 class="subscription-success"><i class="icon_check"></i> Thank you! We will notify you soon.</h4>
						<h4 class="subscription-error">Something Wrong!</h4>

						<input type="email" name="email" id="subscriber-email" placeholder="Your Email" class="form-control input-box">

						<button type="submit" id="subscribe-button" class="btn btn-default standard-button">Subscribe</button>

					</form>

					-->

					<!-- / LOCAL TXT SAVING FORM END -->

				</div>
                <!-- END OF SUBSCRIPTION FORM WITH TITLE -->

			</div>
			<!-- END COLUMN -->

		</div>
		<!-- END ROW -->

	</div>
	<!-- /END CONTAINER -->
</div>
<!-- /END COLOR OVERLAY -->

</section>
<!-- /END DOWNLOAD SECTION -->


<!-- =========================
     FOOTER
============================== -->
<footer>

<div class="container">

	<div class="contact-box wow rotateIn animated" data-wow-offset="10" data-wow-duration="1.5s">

		<!-- CONTACT BUTTON TO EXPAND OR COLLAPSE FORM -->

		<a class="btn contact-button expand-form expanded"><i class="icon_mail_alt"></i></a>

		<!-- EXPANDED CONTACT FORM -->
		<div class="row expanded-contact-form">

			<div class="col-md-8 col-md-offset-2">

				<!-- FORM -->
				<form class="contact-form" action="{{ route('feedback') }}" method="POST">
                    @csrf
					<div class="col-md-6">
						<input class="form-control input-box" id="name" type="text" name="name" placeholder="Votre Nom">
					</div>

					<div class="col-md-6">
						<input class="form-control input-box" required id="email" type="email" name="email" placeholder="Votre Email">
					</div>

					<div class="col-md-12">
						<input class="form-control input-box" id="subject" type="text" name="subject" placeholder="Sujet">
						<textarea class="form-control textarea-box" required id="message" name="message" rows="8" placeholder="Message"></textarea>
					</div>

					<button type="subm" class="btn btn-primary standard-button2 ladda-button" data-style="expand-left">Envoyer Le Message</button>

				</form>
				<!-- /END FORM -->

			</div>

		</div>
		<!-- /END EXPANDED CONTACT FORM -->

	</div>
	<!-- /END CONTACT BOX -->

	<!-- LOGO -->
	<img src="{{ asset('terres.png') }}" alt="LOGO" class="responsive-img">

	<!-- SOCIAL ICONS -->
	<ul class="social-icons">
		<li><a href=""><i class="social_facebook_square"></i></a></li>
		<li><a href=""><i class="social_twitter_square"></i></a></li>
		<li><a href=""><i class="social_pinterest_square"></i></a></li>
		<li><a href=""><i class="social_googleplus_square"></i></a></li>
		<li><a href=""><i class="social_instagram_square"></i></a></li>
		<li><a href=""><i class="social_dribbble_square"></i></a></li>
		<li><a href=""><i class="social_flickr_square"></i></a></li>
	</ul>

	<!-- COPYRIGHT TEXT -->
	<p class="copyright">
		©2024 MarcLogistics, Tous droits reservés
	</p>

</div>
<!-- /END CONTAINER -->

</footer>
<!-- /END FOOTER -->

<!-- Button trigger modal -->

<!-- =========================
     SCRIPTS
============================== -->

<script src="\front/js/bootstrap.min.js"></script>
<script src="\front/js/smoothscroll.js"></script>
<script src="\front/js/jquery.scrollTo.min.js"></script>
<script src="\front/js/jquery.localScroll.min.js"></script>
<script src="\front/js/owl.carousel.min.js"></script>
<script src="\front/js/nivo-lightbox.min.js"></script>
<script src="\front/js/simple-expand.min.js"></script>
<script src="\front/js/wow.min.js"></script>
<script src="\front/js/jquery.stellar.min.js"></script>
<script src="\front/js/retina-1.1.0.min.js"></script>
<script src="\front/js/jquery.nav.js"></script>
<script src="\front/js/matchMedia.js"></script>
<script src="\front/js/jquery.ajaxchimp.min.js"></script>
<script src="\front/js/jquery.fitvids.js"></script>
<script src="\front/js/custom.js"></script>

<!-- =========================================================
     STYLE SWITCHER | ONLY FOR DEMO NOT INCLUDED IN MAIN FILES
============================================================== -->
<script type="text/javascript" src="\front/demo/styleswitcher.js"></script>
<script type="text/javascript" src="\front/demo/demo.js"></script>
<div class="kane-style-switch" id="switch-style">
	<a id="toggle-switcher" class="switch-button icon_tools"></a>
	<div class="switched-options">
		<div class="config-title">
			Couleur de fond:
		</div>
		<ul class="styles">
			<li><a href="index.html#" onclick="setActiveStyleSheet('blue'); return false;" title="Blue">
			<div class="blue">
			</div>
			</a></li>

			<li><a href="index.html#" onclick="setActiveStyleSheet('purple'); return false;" title="Purple">
			<div class="purple">
			</div>
			</a></li>

			<li><a href="index.html#" onclick="setActiveStyleSheet('blue-munsell'); return false;" title="Blue Munsell">
			<div class="blue-munsell">
			</div>
			</a></li>

			<li><a href="index.html#" onclick="setActiveStyleSheet('orange'); return false;" title="Orange">
			<div class="orange">
			</div>
			</a></li>

			<li><a href="index.html#" onclick="setActiveStyleSheet('slate'); return false;" title="Slate">
			<div class="slate">
			</div>
			</a></li>

			<li><a href="index.html#" onclick="setActiveStyleSheet('green'); return false;" title="Green">
			<div class="green">
			</div>
			</a></li>

			<li><a href="index.html#" onclick="setActiveStyleSheet('yellow'); return false;" title="Yellow">
			<div class="yellow">
			</div>
			</a></li>

			<li><a href="index.html#" onclick="setActiveStyleSheet('red'); return false;" title="Red">
			<div class="red">
			</div>
			</a></li>
			<li class="p">
				( NOTE: Pre Defined Colors. You can change colors very easily )
			</li>
		</ul>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="exampleModalLongTitle">
                     <!-- SECTION TITLE -->
                     <h3 style="color: black">Nos Tarifs</h3>
                     <div class="colored-line">
                     </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach ($tarifs as $tarif)
                        <!-- SINGLE PACKACGE -->
                        <div class="col-md-3 col-sm-3">
                            <div class="single-package">
                                <h3 class="package-heading" style="font-size: 20px">
                                {{ $tarif->libelle }} </h3>
                                <div class="price">
                                    <h2 style="font-size: 25px"><span class="sign" style="font-size: 12px">Frs</span>{{ $tarif->montant }} </h2>
                                </div>
                            </div>
                        </div>
                    @endforeach

            </div>
            <div class="modal-footer">
                <button  style="color: black" type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
            </div>
        </div>
        </div>


</body>
</html>

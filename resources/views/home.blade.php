@extends('layouts.app')

    @section('title')
        <title>Pg Electric</title>
    @stop
    
    @section('nav')
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav_links" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#carousel">
                <div id="logo-background-rotated">
                    <img id='nav_logo_pic' alt="Brand" src="images/PGElectric_logo.png">
                </div>
            </a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="nav_links">
            <ul class="nav navbar-nav pull-right">
                <li><a href="#carousel">Start</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#ratings">Ratings</a></li>
                <li><a href="#offer">Offer</a></li>
                <li><a href="#gallery_link">Gallery</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
          </div>
        </div>
      </nav>
    @stop
    
    @section('carousel')
    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="images/carousel_0.jpeg" alt="bulb">
                <div id="carousel_caption_0" class="carousel-caption">
                     TEXT
                </div>
            </div>
            <div class="item">
                <img src="images/carousel_1.jpeg" alt="wires">
                <div id="carousel_caption_1" class="carousel-caption">
                    TEXT2
                </div>
            </div>
            <div class="item">
                <img src="images/carousel_2.jpeg" alt="cables">
                <div id="carousel_caption_2" class="carousel-caption">
                    TEXT3
                </div>
            </div>
        </div>
    </div>
    @stop
    @section('credo')
    <div class="container-fluid thumbnail_container" id="about">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <div class="thumbnail">
                        <img src="images/competence.png" alt="competence">
                        <div class="caption">
                            <h3>Competence</h3>
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="thumbnail">
                        <img src="images/reliability.png" alt="reliability">
                        <div class="caption">
                            <h3>Reliability</h3>
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="thumbnail">
                        <img src="images/honesty.png" alt="honesty">
                        <div class="caption">
                            <h3>Honesty</h3>
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="thumbnail">
                        <img src="images/prices.png" alt="prices">
                        <div class="caption">
                            <h3>Good prices</h3>
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
    @section('about_introduction')
        <div class="container-fluid about_introduction_container">
            <div class="container">
                <img id="about_introduction_rounded_pic" src="images/face.jpeg" class="img-circle" alt="face">
                <div class="about_introduction_text_container">
                    <h2>About_introduction</h2>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                        accusantium doloremque laudantium, totam rem aperiam, eaque
                        ipsa quae ab illo inventore veritatis et quasi architecto </p>
                </div>
            </div>
        </div>
    @stop
    @section('about_pros')
        <div class="container-fluid about_pros_container">
            <div class="container">
                <h1>Why our services?</h1>
                <ul>
                    <li>orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiu</li>
                    <li>orem ipsum dolor sit amet, consectetur adipiscing el</li>
                    <li>orem ipsum dolor sit amet, consectetur adipiscing elit, seeiu</li>
                    <li>orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiu</li>
                    <li>orem ipsum dolor sit amet, consectetur adipiscing elit, sed d</li>
                </ul>
            </div>
        </div>
    @stop
    @section('ratings_link')
        <div class='container-fluid ratings_link_container' id='ratings'>
            <a href="/ratings" id="ratings_link"><h1>Click to check our ratings</h1></a>
        </div>
    @stop
    @section('offer')
    <div class='container-fluid offer_container'>
        <div class="container offer_heading_container" id="offer">
            <h1>Our offer</h1>
        </div>
        <div class="container offer_thumbnails_container">
            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                        </div>
                        <img class="offer_thumbnail_pic" src="images/competence.png" alt="...">
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                        </div>
                        <img class="offer_thumbnail_pic" src="images/competence.png" alt="...">
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                        </div>
                        <img class="offer_thumbnail_pic" src="images/competence.png" alt="...">
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                        </div>
                        <img class="offer_thumbnail_pic" src="images/competence.png" alt="...">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                        </div>
                        <img class="offer_thumbnail_pic" src="images/competence.png" alt="...">
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                        </div>
                        <img class="offer_thumbnail_pic" src="images/competence.png" alt="...">
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                        </div>
                        <img class="offer_thumbnail_pic" src="images/competence.png" alt="...">
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                        </div>
                        <img class="offer_thumbnail_pic" src="images/competence.png" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
    @section('gallery_link')
    <div class="container-fluid gallery_link_container">
        <a href="/gallery" id="gallery_link"><h1>Click to enter the gallery</h1></a>
    </div>
    @stop
    @section('address')
        <div class="container-fluid address_container" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="address_item">
                            <img id='address_logo_pic' alt="Brand" src="images/PGElectric_logo.png">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="address_item">
                            <h2>Address</h2>
                            <p>DOES HE</p>
                            <p>WANT THE</p>
                            <p>ADDRESS HERE? YES!</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="address_item">
                            <h2>Phone number</h2>
                            <p>phone number</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop
    @section('map') 
        <div class="container-fluid map_container">
            <iframe id="map" class="scrolloff" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2486.
                    289150303755!2d-0.11727678422743473!3d51.
                    452847379626206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
                    1!3m3!1m2!1s0x4876046acb989eb9%3A0xb14795907bdd2493!2s55+
                    Leander+Rd%2C+Brixton%2C+London+SW2+2NB%2C+Wielka+Brytania
                    !5e0!3m2!1spl!2spl!4v1475007940847" frameborder="0" allowfullscreen></iframe>
        </div>
    @stop
    @section('contact')
        <div class="container-fluid contact_container">
            <div class="container">
                <h2>Contact us</h2>
                <form class="form" method="POST" action="/contactForm">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xs-3 col-md-4">
                            <div class="form-group">
                                <label for="contact_name">Name</label>
                                <input type="text" class="form-control contact_input" id="contact_name" name="name"
                                       placeholder="Jane Doe" required>
                            </div>
                        </div>
                        <div class="col-xs-3 col-md-4">
                            <div class="form-group">
                                <label for="contact_email">Email</label>
                                <input type="email" class="form-control" id="contact_email" name="email"
                                       placeholder="jane.doe@example.com">
                            </div>
                        </div>
                        <div class="col-xs-3 col-md-4">
                            <div class="form-group">
                                <label for="contact_phone">Phone number</label>
                                <input type="tel" class="form-control" id="contact_phone" name="phone"
                                       placeholder="number">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact_message">Message</label>
                        <textarea class="form-control" id="contact_message" rows="3" name="msg"
                                  placeholder="Please enter the text of your message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Send</button>
                </form>
            </div>
        </div>
    @stop
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <link rel="icon" href="{{ asset('images/e-ligtas-small-icon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/e-ligtas-small-icon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/landingpage.css')}}" />
    <title>E-ligtas | Home</title>
  </head>
  <body>
    <header class="header">
      <nav>
        <div class="nav__bar">
          <div class="logo nav__logo">
            <a href="#"><img src="{{ asset('images/eligtas-logo.png')}}" alt="logo" /></a>
          </div>
          <div class="nav__menu__btn" id="menu-btn">
            <i class="ri-menu-3-line"></i>
          </div>
        </div>
        <ul class="nav__links" id="nav-links">
          <li><a href="#home">HOME</a></li>
          <li><a href="#about">ABOUT</a></li>
          <li><a href="#service">FEATURES</a></li>
          <li>
            @if (Route::has('login'))
              @auth
                  <a href="{{ url('/home') }}">ADMIN PANEL</a>
              @else
                  <a href="{{ route('login') }}" class= "text-muted">LOGIN</a>
              @endauth             
            @endif
          </li>
          <button class="btn" onclick="window.location.href='{{ route('download.file', ['filename' => 'E-LIGTAS-RESIDENT.apk']) }}'">Download App</button>
        </ul>
      </nav>
      <div class="section__container header__container" id="home">
        <div class="header__content">
          <h1>A Platform that Prioritize Lives</h1>
        </div>
      </div>
    </header>

    <section class="banner__container">
      <div class="banner__card">
        <h4>Will keep you safe, by providing the necessary needs for different kind of Disaster</h4>
      </div>
      <div class="banner__card">
        <h4>Rescuing people is our mission</h4>
      </div>
      <div class="banner__image">
        <img src="{{ asset('images/stockphoto1.jpg')}}" alt="banner" />
      </div>
    </section>

    <section class="section__container experience__container" id="about">
      <div class="experience__image">
        <img src="{{ asset('images/eligtas devices.png') }}" alt="experience" />
      </div>
      <div class="experience__content">
        <p class="section__subheader">ABOUT E-LIGTAS</p>
        <h2 class="section__header">
          A newly developed emergency response system
        </h2>
        @foreach ( $aboutus as $setting1)
        <p style="white-space: pre-wrap;"  class="section__description">
          {{$setting1->settings_description}}
        </p>
        @endforeach
      </div>
    </section>

    <section class="service" id="service">
      <div class="section__container service__container">
        <p class="section__subheader">FEATURES</p>
        <h2 class="section__header">System Main Features</h2>
        <p class="section__description">
          Trust us to keep your automobile running smoothly and reliably.
        </p>
        <div class="service__grid">
          <div class="service__card">
            <img src="{{ asset('images/guidelines.jpg')}}" alt="service" />
            <h4>Disasters Guidelines</h4>
            <p>
              Providing the necessary guidelines for different types of disasters will reduce the capabilities of the people's life
              at risks
            </p>
          </div>
          <div class="service__card">
            <img src="{{ asset('images/hotlines.jpg') }}" alt="service" />
            <h4>Emergency Hotlines</h4>
            <p>
              Allow people to call for help without any hassle.
            </p>
          </div>
          <div class="service__card">
            <img src="{{ asset('images/Emerngecy report.jpg') }}" alt="service" />
            <h4>Request Emergency Assistance</h4>
            <p>
                People can easily make a request for emergency Assistance.
            </p>
          </div>
          <div class="service__card">
            <img src="{{ asset('images/location.jpg') }}" alt="service" />
            <h4>Location Tracking</h4>
            <p>
              The responders can easily locate the incidents.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="customisation">
      <div class="section__container customisation__container">
        <p class="section__subheader">MUNICIPAL INFORMATION</p>
        <h2 class="section__header">
          This system is under of the Municipal of Santa Maria Bulacan.
        </h2>
        <div class="customisation__grid">
          <div class="customisation__card">
            <h4>24</h4>
            <p>Barangays</p>
          </div>
          <div class="customisation__card">
            <h4>256,454</h4>
            <p>Total Population</p>
          </div>
          <div class="customisation__card">
            <h4>3</h4>
            <p>Sectors</p>
          </div>
        </div>
      </div>
    </section>
    
    <footer class="footer">
      <div class="section__container subscribe__container">
      </div>
      <div class="section__container footer__container">
        <div class="footer__col">
          <div class="logo footer__logo">
            <a href="#"><img src="{{ asset('images/eligtas-logo.png')}}" alt="logo" /></a>
          </div>
          <p class="section__description">
            Helping community by enhancing emergency response
          </p>
          <ul class="footer__socials">
            <li>
              <a href="#"><i class="ri-facebook-fill"></i></a>
            </li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Services</h4>
          <ul class="footer__links">
            <li><a href="#">Automation of Reports</a></li>
            <li><a href="#">Emergency Assistance</a></li>
            <li><a href="#">Content Management</a></li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Contact Info</h4>
          <ul class="footer__links">
            <li>
              <p>
                E-ligtas Developers
              </p>
            </li>
            <li>
              <p>Phone: <span>+63 9289837585</span></p>
            </li>
            <li>
              <p>Phone: <span>+63 9876543210</span></p>
            </li>
            <li>
              <p>Email: <span>eligtas@gmail.com</span></p>
            </li>
          </ul>
        </div>
      </div>
    </footer>
    <div class="footer__bar">
      Copyright © 2024 E-ligtas. All rights reserved.
    </div>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{asset('js/landingpage.js')}}"></script>
  </body>
</html>

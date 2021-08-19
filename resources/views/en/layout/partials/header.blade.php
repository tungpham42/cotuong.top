<header class="site-header shadow-lg fixed-top">
  <div class="container mx-auto">
    <div class="row align-items-center">
      <a class="navbar-brand mr-auto my-0" href="{{ url('/en') }}"><img src="https://cotuong.r.worldssl.net/img/app-icons/logo.png" class="xiangqi-logo" alt="xiangqi logo"><h1 class="d-inline" style="font-size: inherit !important;"><strong>Xiangqi</strong></h1><span id="header-status"></span></a>
      <div class="menu-toggle open" title="Trình đơn"></div>
      <nav class="navbar py-0">
        <ul class="nav navbar-nav">
          <li class="pt-4">
            <a class="home" href="{{ url('/en') }}"><i class="fad fa-home-lg-alt"></i> Home</a>
          </li>
          <li class="pt-4">
            <a class="setup" href="{{ url('/set-up') }}"><i class="fad fa-camera-retro"></i> Set Up</a>
          </li>
          <li class="pt-4">
            <a class="contact" href="{{ url('/contact-us') }}"><i class="fad fa-envelope"></i> Contact Us</a>
          </li>
          <li class="pt-4">
            <a class="lang" href="{{ url($langUrl) }}"><i class="fad fa-language"></i> Tiếng Việt</a>
          </li>
          <li class="pt-4">
            <a target="_blank" class="buy" href="https://www.codester.com/items/24523/dual-languages-xiangqi-game-with-ai-and-room-host?ref=tungpham"><i class="fad fa-shopping-cart"></i> Buy</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</header>
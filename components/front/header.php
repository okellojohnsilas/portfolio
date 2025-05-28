   <header id="header" class="header dark-background d-flex flex-column">
       <i class="header-toggle d-xl-none bi bi-list"></i>

       <div class="profile-img">
           <!-- C:\xampp\htdocs\portfolio\assets\dist\front\src\img\personal -->
           <img src="<?php print base_url().'assets/dist/front/src/'; ?>img/personal/me.jpeg" alt="Avatar"
               class="img-fluid rounded-circle">
       </div>

       <a href="index.html" class="logo d-flex align-items-center justify-content-center">
           <!-- Uncomment the line below if you also wish to use an image logo -->
           <!-- <img src="assets/img/logo.png" alt=""> -->
           <h1 class="sitename">Okello John Silas</h1>
       </a>

       <div class="social-links text-center">
           <a href="#" class="twitter"><i class="fa-brands fa-x-twitter"></i></a>
           <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
           <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
       </div>

       <nav id="navmenu" class="navmenu">
           <ul>
               <li><a href="<?php print base_url(); ?>" class="font-weight-bold"><i
                           class="fas fa-house  navicon"></i>Home</a></li>
               <li><a href="about"><i class="far fa-address-card navicon"></i> About</a></li>
               <li><a href="portfolio"><i class="fas fa-images navicon"></i> Portfolio</a></li>
               <li><a href="contact"><i class="fas fa-headset navicon"></i> Contact Me</a></li>
           </ul>
       </nav>

   </header>
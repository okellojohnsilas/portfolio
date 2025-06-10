   <header id="header" class="header dark-background d-flex flex-column">
       <i class="header-toggle d-xl-none bi bi-list"></i>

       <div class="profile-img">
           <!-- C:\xampp\htdocs\portfolio\assets\dist\front\src\img\personal -->
           <img src="<?php print base_url().'assets/dist/front/src/'; ?>img/personal/me.jpeg" alt="Avatar"
               class="img-fluid rounded-circle">
       </div>

       <a href="<?php print base_url()?>" class="logo d-flex align-items-center justify-content-center">
           <!-- Uncomment the line below if you also wish to use an image logo -->
           <!-- <img src="assets/img/logo.png" alt=""> -->
           <h1 class="sitename">Okello John Silas</h1>
       </a>

       <?php if (count_items($dbconn, "select * from social_links where status = 1 and deleted = 0") > 0) { ?>
       <div class="social-links text-center">
           <?php  foreach (get_all_items($dbconn, 'social_links') as $social) { 
           echo '<a href="'.$social['link'].'" class="'.$social['social'].'" target="_blank">'.$social['icon'].'</a>';
            } ?>
       </div>
       <?php } ?>
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
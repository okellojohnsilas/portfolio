<!-- Navigation-->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="<?php print base_url(); ?>">
            <?php echo translate_text($app_name, $language);?></a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded fw-bold"
            type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
            aria-expanded="false" aria-label="Toggle navigation">
            OPEN MENU
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                        href="<?php print base_url();?>about"><?php echo translate_text('about', $language);?>
                    </a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                        href="<?php print base_url();?>resume"><?php echo translate_text('resume', $language);?>
                    </a></li>
                <!-- <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                        href="<?php // print base_url(); ?>portfolio">Portfolio
                    </a></li> -->
                <!-- <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                        href="<?php // print base_url();?>contact"><?php // echo translate_text('contact', $language);?></a>
                </li> -->
                <!-- <li class="nav-item mx-0 mx-lg-1 dropdown">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded dropdown-toggle active" href="" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?php // print $language;?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"
                                href="<?php // print base_url();?>"><?php // echo translate_text('English', $language);?>/English</a>
                        </li>
                        <li><a class="dropdown-item"
                                href="<?php // print base_url().'?'?>lang=es"><?php // echo translate_text('Spanish', $language);?>/Spanish</a>
                        </li>
                        <li><a class="dropdown-item"
                                href="<?php // print base_url().'?'?>lang=fr"><?php // echo translate_text('French', $language);?>/French</a>
                        </li>
                        <li><a class="dropdown-item"
                                href="<?php // print base_url().'?'?>lang=de"><?php // echo translate_text('German', $language);?>/German</a>
                        </li>
                        <li><a class="dropdown-item" href="<?php // print base_url().'?'?>lang=it">Italian</a></li>
                        <li><a class="dropdown-item" href="<?php // print base_url().'?'?>lang=pt">Portuguese</a></li>
                        <li><a class="dropdown-item" href="<?php // print base_url().'?'?>lang=ja">Japanese</a></li>
                        <li><a class="dropdown-item" href="<?php // print base_url().'?'?>lang=ko">Korean</a></li>
                        <li><a class="dropdown-item" href="<?php // print base_url().'?'?>lang=zh-CN">Chinese
                                (Simplified)</a></li>
                        <li><a class="dropdown-item" href="<?php // print base_url().'?'?>lang=zh-TW">Chinese
                                (Traditional)</a></li>
                        <li><a class="dropdown-item" href="<?php // print base_url().'?'?>lang=ru">Russian</a></li>
                        <li><a class="dropdown-item" href="<?php // print base_url().'?'?>lang=ar">Arabic</a></li>
                        <li><a class="dropdown-item" href="<?php // print base_url().'?'?>lang=hi">Hindi</a></li>
                    </ul>
                </li> -->
            </ul>
        </div>
    </div>
</nav>
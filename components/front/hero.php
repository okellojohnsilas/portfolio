<?php 
    $typed_items = explode(',', $website_data['hero_sub_tag_words'] ?? '');
    $first_typed_item = isset($typed_items[0]) ? trim($typed_items[0]) : '';
?>
</div>
<!-- Hero Section -->
<section id="hero" class="hero section dark-background"
    style="height: 100vh; background-image: url('<?php print base_url().'assets/dist/front/src/img/personal/nara-img.jpg'; ?>'); background-size: cover; background-position: center; position: relative;">
    <!-- <img src="<?php // print base_url().'assets/dist/front/src/'; ?>img/personal/me.jpg" alt="bg-image" data-aos="fade-in" class=""> -->
    <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.5); z-index: 1;"></div>
    <div class="container text-center" data-aos="fade-up" data-aos-delay="100" style="position: relative; z-index: 2;">
        <h2><?php print $website_data['hero_tag']  ?? 'Kindly wait.'?></h2>
        <p><?php print $website_data['hero_sub_tag']  ?? 'Update in Progress' ?> <span class="typed"
                data-typed-items="<?php print $website_data['hero_sub_tag_words']  ?? 'Website is Coming Soon'; ?>"><?php print $first_typed_item; ?></span><span
                class="typed-cursor typed-cursor--blink" aria-hidden="true"></span><span
                class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
    </div>
</section>
<!-- /Hero Section -->
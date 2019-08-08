<?php 
/*
Template Name: Homepage
*/
get_header();
?>
<img class="md" style="width:100%;" src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/06/primetime-game.jpg">

<div class="ann rob">
    <h2>NATIONAL BASKETBALL CHAMPIONSHIP</h2>
    <p class="live"><img src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/06/live_with_shadow.png"></p>
    <p class="gns">GAMING & ESPORTS EXPERIENCE</p>
    
    <p class="desc">NBC Live is bringing you a first of its kind gaming & esports event to kick off the week of competition.
    Bring your "A" game to the NBA2K Tournament and compete on the main stage at NBC Live 2019. 
    Tournament Qualifiers begin online at the all new PrimeTime Gaming platform. Save your spot in the NBA 2k Tournament today!</p>
    
    <a href="#signup" class="hsu">Sign up</a>
</div>
<div class="tou rob" id="signup">
    <div class="left">
        <?php echo do_shortcode('[ninja_form id=6]');?>
    </div>
    <div class="right">
        <div class="nbc">
            <img src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/06/NBC-Liv.png">
        </div>
        <div class="gre td">
            <h2>Tournament Details</h2>
            <p>July 24th - 2pm TO 8pm </br>Prelims Start online at PrimeTime Gaming</p>
            <p><strong>Cost- FREE</strong></p>
        </div>
        <div class="gre ima">
            <h2 class="spon">Sponsored By</h2>
            <img src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/06/1280px-Samsung_Logo.svg_.png"><img class="ms" src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/06/microsoft_logo.png">
        </div>
        <div class="gre b">
            <h2>Qualifying Matches</h2>
            <p><span>Thursday, July 18th</span> <img src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/06/nba_loo.png"></p>
            <p><span>Friday, July 19th</span> <img src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/06/nba_loo.png"></p>
            <p><span>Saturday, July 20th</span> <img src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/06/nba_loo.png"></p>
            <p class="last_p" ><span>Sunday, July 21th</span> <img src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/06/nba_loo.png"></p>
        </div>
        
    </div>
</div>
<?php get_footer(); ?>


		</div>
		</div>
		</div>
		
<footer class="pt-4 pb-4 rob">
    <div class="container-fluid">
        <div class="row">	
            <div class="col-md-12">
                <div class="custom_foot">
                    <h2>Play</h2>
                    <ul>
                        <li>
                        <a href="/games-list/">View Games</a>
                        </li>
                        <li>
                        <a href="/all-matches/">Matchfinder</a>
                        </li>
                        <li>
                        <a href="/all-tournaments-and-matches/">Tournaments</a>
                        </li>
                        <li>
                        <a href="/user-leaderboards/">Leaderboards</a>
                        </li>
                        <li>
                        <a href="#">Exclusive Matches</a>
                        </li>
                        <li>
                        <a href="/events/">Events</a>
                        </li>
                    </ul>
                </div>
                <div class="custom_foot">
                    <h2>LEARN</h2>
                    <ul>
                       <li>
                        <a href="/user-about/">About</a>
                        </li>
                        <li>
                        <a href="/user-faq/">FAQ</a>
                        </li>
                        <li>
                        <a href="/user-contact/">Contact</a>
                        </li>
                        <li>
                        <a href="#">Shop</a>
                        </li>
                        <li>
                        <a href="/user-support/">Support</a>
                        </li>
                        <li>
                        <a href="javascript void(0)">Affiliate Program</a>
                        </li>
                    </ul>
                </div> 
                <div class="custom_foot">
                    <h2>POPULAR GAMES</h2>
                    <ul>
                        <li>
                        <a href="/all-matches">NBA 2k19</a>
                        </li>
                        <li>
                        <a href="/all-matches">NBA Live 19</a>
                        </li>
                        <li>
                        <a href="/all-matches">Madden19</a>
                        </li>
                        <li>
                        <a href="/all-matches">FIFA 19</a>
                        </li>
                        <li>
                        <a href="/all-matches">Fortnite</a>
                        </li>
                        <li>
                        <a href="/all-matches">Call Of Duty</a>
                        </li>
                    </ul>
                </div> 
                <div class="custom_foot">
                    <h2>CONNECT</h2>
                    <ul>
                        <li>
                        <a href="#">My Stream</a>
                        </li>
                        <li>
                        <a href="#">Team Stream</a>
                        </li>
                        
                    </ul>
                </div> 
                <div class="custom_foot">
                    <h2>SOCIAL</h2>
                    <ul>
                        <li><a href="https://www.facebook.com/Workkforce/"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.instagram.com/Workkforce/"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="https://twitter.com/Workkforce"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
                <div class="custom_foot_image text-center">
                    <img class="img-fluid m-4" src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/logo.png">
        		</div>
            </div>
        
        </div>
    </div>
    <div class="copy-right">
        <span class="pull-left">
        <p><small>© 2019 WORKKFORCE GAMING</small></p>
        </span>
        <span class="pull-right">
        <!-- p><small>Contact  •  About  •  Join Us  •  Terms of Service  •  Privacy Policy</small></p -->
        </span>
    </div>
</footer>
<script>
//     $(document).ready(function() {
        
// function getBrowserName() {
//     var name = "Unknown";
//     if(navigator.userAgent.indexOf("MSIE")!=-1){
//         name = "MSIE";
//     }
//     else if(navigator.userAgent.indexOf("Firefox")!=-1){
//         name = "Firefox";
//     }
//     else if(navigator.userAgent.indexOf("Opera")!=-1){
//         name = "Opera";
//     }
//     else if(navigator.userAgent.indexOf("Chrome") != -1){
//         name = "Chrome";
//     }
//     else if(navigator.userAgent.indexOf("Safari")!=-1){
//         name = "Safari";
//     }
//     return name;   
// }


 
//         if( getBrowserName() == "Safari" ){
//         console.log("You are surfing on Safari");
        
//         $('.pla1').click(function(){
//         $('.cara1').toggleClass('intro');   
//         });
        
//         $('.car1').click(function(){
//         $('.cara1').toggleClass('intro');    
//         });
        
        
//         }else{
//              $(".card").addClass("nointro");
//             console.log("You are surfing on " + getBrowserName(name));
//         }
 


// });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
    $(document).ready(function() {
        
        var xi = $("#watthegame").val();
        
        if((xi == 'nba') || (xi == 'nbal') || (xi == 'fifa') | (xi == 'madden'))
        {
                $("#wattheresult").attr("placeholder", "Enter Your Score").placeholder();
        }
        else if((xi == 'fortnite') || (xi == 'cod'))
        {
                $("#wattheresult").attr("placeholder", "Enter Total Kills").placeholder();
                 $("#wattheresult").after('Kills');
        }
    });
</script>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    
    $('#openchat').click (function(){
       $('#LoAwayFormBtn').click();
    });
     
});
</script> 
<script>
$(function (){

    $(".sidetogglenav").click(function(){
        $("#mySidenav").css("width", "250px");
        $(".showafterfsec").delay(400).fadeIn();
    });
    
    $(".closebtn").click(function(){
        $(".showafterfsec").hide();
        $("#mySidenav").css("width", "0px");
    });
});
</script>
<script>
$(document).load(function() {

    var j = $('.eachday').width() ;
    $('.eachday').height(j);

});
</script>
<script>
$(document).ready(function() {
    
    var j = $('.events_box').height() ;
    $('.events_list').height(j);
     $('.eventout').height(j);
     
});
</script> 
<script>
$(document).ready(function() {

    var h = $('.flipfront').height() ;
    $('.flipback').height(h);
    
    var y = h + 30;
    $('.gamecardmain').height(y);
    
    $("#walletone").click(function(){
    $("#walletonee").toggle();
    });

});
</script> 
<script>
$(document).on('load', function() {
    $('#xrdollar').on('change', function() 
        {
            var xe = $("#xrdollar").val(); 
            var xy = xe/10;
            $("#rxc").val(xy);
        });
        
    var h = $('.flipfront').height() ;
    $('.flipback').height(h);
    var y = h + 30;
    
    $('.gamecardmain').height(y);
    
    $("#walletone").click(function(){
          $("#walletonee").toggle();
        });
});
</script>
<script>
$(document).ready(function() 
    {
        $("#das").click(function() {
            $(".dash").toggle();
        });
        $("#dass").click(function() {
            $(".dashh").toggle();
        });
    });
</script>
<script>
    $(document).ready(function() 
    {
        $(".1").click(function(){ 
        $(".popup1").toggle();
        });
        $(".2").click(function(){ 
        $(".popup2").toggle();
        });
        $(".3").click(function(){ 
        $(".popup3").toggle();
        });
        $(".4").click(function(){ 
        $(".popup4").toggle();
        });
        $(".5").click(function(){ 
        $(".popup5").toggle();
        });
        $(".6").click(function(){ 
        $(".popup6").toggle();
        });
        $(".7").click(function(){ 
        $(".popup7").toggle();
        });
        $(".8").click(function(){ 
        $(".popup8").toggle();
        });
        $(".9").click(function(){ 
        $(".popup9").toggle();
        });
        $(".10").click(function(){ 
        $(".popup10").toggle();
        });
        $(".11").click(function(){ 
        $(".popup11").toggle();
        });
        $(".12").click(function(){ 
        $(".popup12").toggle();
        });
        $(".13").click(function(){ 
        $(".popup13").toggle();
        });
        $(".14").click(function(){ 
        $(".popup14").toggle();
        });
        $(".15").click(function(){ 
        $(".popup15").toggle();
        });
        $(".16").click(function(){ 
        $(".popup16").toggle();
        });
        $(".17").click(function(){ 
        $(".popup17").toggle();
        });
        $(".18").click(function(){ 
        $(".popup18").toggle();
        });
        $(".19").click(function(){ 
        $(".popup19").toggle();
        });
        $(".20").click(function(){ 
        $(".popup20").toggle();
        });        
        $(".21").click(function(){ 
        $(".popup21").toggle();
        });
        $(".22").click(function(){ 
        $(".popup22").toggle();
        });
        $(".23").click(function(){ 
        $(".popup23").toggle();
        });
        $(".24").click(function(){ 
        $(".popup24").toggle();
        });
        $(".25").click(function(){ 
        $(".popup25").toggle();
        });
        $(".26").click(function(){ 
        $(".popup26").toggle();
        });
        $(".27").click(function(){ 
        $(".popup27").toggle();
        });
        $(".28").click(function(){ 
        $(".popup28").toggle();
        });
        $(".29").click(function(){ 
        $(".popup29").toggle();
        });
        $(".30").click(function(){ 
        $(".popup30").toggle();
        });        
        $(".31").click(function(){ 
        $(".popup31").toggle();
        });
        $(".32").click(function(){ 
        $(".popup32").toggle();
        });
        $(".33").click(function(){ 
        $(".popup33").toggle();
        });
        $(".34").click(function(){ 
        $(".popup34").toggle();
        });
        $(".35").click(function(){ 
        $(".popup35").toggle();
        });
        $(".36").click(function(){ 
        $(".popup36").toggle();
        });
        $(".37").click(function(){ 
        $(".popup37").toggle();
        });
        $(".38").click(function(){ 
        $(".popup38").toggle();
        });
        $(".39").click(function(){ 
        $(".popup39").toggle();
        });
        $(".40").click(function(){ 
        $(".popup40").toggle();
        });
        $(".41").click(function(){ 
        $(".popup41").toggle();
        });
        $(".42").click(function(){ 
        $(".popup42").toggle();
        });
        $(".43").click(function(){ 
        $(".popup43").toggle();
        });
        $(".44").click(function(){ 
        $(".popup44").toggle();
        });
        $(".45").click(function(){ 
        $(".popup45").toggle();
        });                   
    });
</script>
<script>
    $(document).ready(function() 
        {
            $(".formtogglebutton1").click(function(){ 
            $(".formtoggle1").toggle();
            });
            $(".formtogglebutton2").click(function(){ 
            $(".formtoggle2").toggle();
            });
            $(".formtogglebutton3").click(function(){ 
            $(".formtoggle3").toggle();
            });
            $(".formtogglebutton4").click(function(){ 
            $(".formtoggle4").toggle();
            });
            $(".formtogglebutton5").click(function(){ 
            $(".formtoggle5").toggle();
            });
            $(".formtogglebutton6").click(function(){ 
            $(".formtoggle6").toggle();
            });
            $(".formtogglebutton7").click(function(){ 
            $(".formtoggle7").toggle();
            });
            $(".formtogglebutton8").click(function(){ 
            $(".formtoggle8").toggle();
            });
            $(".formtogglebutton9").click(function(){ 
            $(".formtoggle9").toggle();
            });
            $(".formtogglebutton10").click(function(){ 
            $(".formtoggle10").toggle();
            });
            $(".formtogglebutton11").click(function(){ 
            $(".formtoggle11").toggle();
            });
            $(".formtogglebutton12").click(function(){ 
            $(".formtoggle12").toggle();
            });
            $(".formtogglebutton13").click(function(){ 
            $(".formtoggle13").toggle();
            });
            $(".formtogglebutton14").click(function(){ 
            $(".formtoggle14").toggle();
            });
            $(".formtogglebutton15").click(function(){ 
            $(".formtoggle15").toggle();
            });
            $(".formtogglebutton16").click(function(){ 
            $(".formtoggle16").toggle();
            });

        });
</script>
<script>
$(document).ready(function() {

    $(".jointoggle").click(function(){
    $(".joiningform").toggle();
    });
    
    $(".formtogglebutton").click(function(){
    $(".formtoggle").toggle();
    $(".formtogglebutton").toggle();
    });

});
</script>  
<script>
$( document ).ready(function() {
                
            // Create a Stripe client.
            var stripe = Stripe('pk_live_oDSpn9ctmsG5fOK8tclkNsLh00h2NbEQ8G');
            
            // Create an instance of Elements.
            var elements = stripe.elements();
            
            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
            base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
            color: '#aab7c4'
            }
            },
            invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
            }
            };
            
            // Create an instance of the card Element.
            var card = elements.create('card', {style: style});
            
            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');
            
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
            displayError.textContent = event.error.message;
            } else {
            displayError.textContent = '';
            }
            });
            
            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
            event.preventDefault();
            
            stripe.createToken(card).then(function(result) {
            if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
            } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
            }
            });
            });
            
            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            
            // Submit the form
            form.submit();
            }
            
    });
</script>
<script>
$(document).ready(function() {
    
    $('#xrdollar').on('change', function() {
        
    var xe = $("#xrdollar").val(); 
    if (xe == 1000){
       var xy = '1000';
    }
    else if (xe == 2000){
       var xy = '3500';
    }
    else if (xe == 5000){
      var xy = '10000';
    }
    
    $("#rxc").val(xy);
    });    

});
</script> 
<script>
$(document).ready(function() {
    $('#otphonenumber').change(function(){
    $('.ihs-otp-btn').css("display", "block");;
    });
});
</script>
<script>
$(document).ready(function() {

        $('.pla1').click(function(){
        $('.cara1').toggleClass('flipped');
        // $('.cara1').toggleClass('intro');   
        });
        
        
        $('.car1').click(function(){
        $('.cara1').toggleClass('flipped');
        // $('.cara1').toggleClass('intro');    
        });
        
        
        $('.pla2').click(function(){
        $('.cara2').toggleClass('flipped');});
        $('.car2').click(function(){
        $('.cara2').toggleClass('flipped');});
        
        $('.pla3').click(function(){
        $('.cara3').toggleClass('flipped');});
        $('.car3').click(function(){
        $('.cara3').toggleClass('flipped');});
        
        $('.pla4').click(function(){
        $('.cara4').toggleClass('flipped');});
        $('.car4').click(function(){
        $('.cara4').toggleClass('flipped');});
        
        $('.pla5').click(function(){
        $('.cara5').toggleClass('flipped');});
        $('.car5').click(function(){
        $('.cara5').toggleClass('flipped');});
        
        $('.pla6').click(function(){
        $('.cara6').toggleClass('flipped');});
        $('.car6').click(function(){
        $('.cara6').toggleClass('flipped');});
        
        $('.pla7').click(function(){
        $('.cara7').toggleClass('flipped');});
        $('.car7').click(function(){
        $('.cara7').toggleClass('flipped');});
        
        $('.pla8').click(function(){
        $('.cara8').toggleClass('flipped');});
        $('.car8').click(function(){
        $('.cara8').toggleClass('flipped');});
        
        $('.pla9').click(function(){
        $('.cara9').toggleClass('flipped');});
        $('.car9').click(function(){
        $('.cara9').toggleClass('flipped');});
        
        $('.pla10').click(function(){
        $('.cara10').toggleClass('flipped');});
        $('.car10').click(function(){
        $('.cara10').toggleClass('flipped');});
        
        
        $('.pla11').click(function(){
        $('.cara11').toggleClass('flipped');});
        $('.car11').click(function(){
        $('.cara11').toggleClass('flipped');});
        
        $('.pla12').click(function(){
        $('.cara12').toggleClass('flipped');});
        $('.car12').click(function(){
        $('.cara12').toggleClass('flipped');});
        
        $('.pla13').click(function(){
        $('.cara13').toggleClass('flipped');});
        $('.car13').click(function(){
        $('.cara13').toggleClass('flipped');});
        
        $('.pla14').click(function(){
        $('.cara14').toggleClass('flipped');});
        $('.car14').click(function(){
        $('.cara14').toggleClass('flipped');});
        
        $('.pla15').click(function(){
        $('.cara15').toggleClass('flipped');});
        $('.car15').click(function(){
        $('.cara15').toggleClass('flipped');});
        
        $('.pla16').click(function(){
        $('.cara16').toggleClass('flipped');});
        $('.car16').click(function(){
        $('.cara16').toggleClass('flipped');});
        
        
        });
</script>
<script>
$(document).ready(function() 
    {
             $(".loadingscreen").hide(); 
    });
</script>
<script>
$(document).ready(function() 
    {
        $(".choosegame").click(function(){
            $(".cg-step-1").toggle();
            $(".cg-step-2").toggle();
        });
        $(".chooseplat").click(function(){
            $(".cg-step-2").toggle();
            $(".cg-step-3").toggle();
        });
        
        $(".ladder").click(function(){
            $("#ladderForm").submit();
        });
        
        $("#madden").click(function(){
            $(".gametype").val("single");
            $(".gamename").val("madden");
            $('.doubles').hide();
        });
        $("#fifa").click(function(){
            $(".gametype").val("single");
            $(".gamename").val("fifa");
            $('.doubles').hide();
        });
        $("#nba").click(function(){
            $(".gametype").val("single");
            $(".gamename").val("nba");
            $('.doubles').hide();
        });
        $("#nbal").click(function(){
            $(".gametype").val("single");
            $(".gamename").val("nbal");
            $('.doubles').hide();
        });
        $("#fortnite").click(function(){
            $(".gametype").val("all");
            $(".gamename").val("fortnite");
            $('.singles').hide();
        });
        $("#cod").click(function(){
            $(".gametype").val("all");
            $(".gamename").val("cod");
            $('.singles').hide();
        });
        
        $("#duos").click(function(){
            $(".laddertype").val("duos");
        });
        
        $("#ps4").click(function(){
            $(".gameplatform").val("ps4");
        });
        $("#xbox").click(function(){
            $(".gameplatform").val("xbox");
        });
        $("#pc").click(function(){
            $(".gameplatform").val("pc");
        });
   });
</script>
<script>
 $(document).ready(function() {   
// var password = document.getElementById("pass")
//   , confirm_password = document.getElementById("cpass");

// function validatePassword(){
//   if(password.value != confirm_password.value) {
//     confirm_password.setCustomValidity("Passwords Don't Match");
//   } else {
//     confirm_password.setCustomValidity('');
//   }
// }

// password.onchange = validatePassword;
// confirm_password.onkeyup = validatePassword;
document.getElementById('cpass').onkeyup=function(){
    var password = $("#pass").val();
	var confirm_password = $("#cpass").val();
	if(password != confirm_password) {
           $("#cpass").css('border', "2px solid red");
	}
        else{
           $("#cpass").css('border', "2px solid green");
        }
}
    });
</script>


<!--Play Matches Pop-up-->  

<div class="modal fade signup" id="modal-container-509222" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="logo-image text-center">
                <img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/modal-logo.png" class="img-fluid">
            </div>
            <div class="modal-dialog" role="document">
                <div class="modal-content rob">
                    <div class="modal-header text-center">
                        <h5 class="modal-titl text-center w-100 creategametitle" id="myModalLabel">Join a Ladder Match</h5> 
                    </div>
                    <div class="modal-body list_game">
                        <div class="cg-step-1">
                            <p>Select a Game</p>
                            <img class="choosegame" id="madden" src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/07/madden19.png">
                            <img class="choosegame" id="nba" src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/07/NBA2K19-Front.png">
                            <img class="choosegame" id="nbal" src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/07/Nba-Live.png">
                            <img class="choosegame" id="fortnite" src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/07/Fortnite-Front.png">
                            <img class="choosegame" id="cod" src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/07/COD-BO3-Front.png">
                            <img class="choosegame" id="tekken" src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/07/tekken.png">
                            <img class="choosegame" id="mortal" src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/07/mortal-combat.png">
                        </div>
                        <div class="cg-step-2">
                            <p>Select a Platform</p>
                            <img class="chooseplat" id="ps4" src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/07/1200px-PlayStation_logo.svg_.png">
                            <img class="chooseplat" id="xbox" src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/07/3f2c4b588b.png">
                            <img class="chooseplat" id="pc" src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/2019/07/561-5619369_pc-logo-white-png.png">
                        </div>
                        <div class="cg-step-3">
                            <p>Select a Ladder</p>
                            <p class="ladder singles" id="solo">Single Player</p>
                            <p class="ladder doubles" id="solo">Solo</p>
                            <p class="ladder doubles" id="duos">Duos</p>
                            
                            <form method="post" action="<?php echo get_bloginfo('url') ?>/all-matches/" id="ladderForm">
                                <input class="hidden gametype" type="text" value="single">
                                <input class="hidden gamename" type="text" id="game" name="migame">
                                <input class="hidden gameplatform" type="text" name="miplat">
                                <input class="laddertype hidden" type="text" value="solo" name="mitype">
                                <input class="hidden" id="sub_game" type="submit" value="submit">
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>  


<!--Create Match Pop-up-->  

<div class="modal fade signup" id="modal-container-50555" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="logo-image text-center">
        <img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/modal-logo.png" class="img-fluid">
    </div>
    <div class="modal-dialog" role="document">
        <div class="modal-content rob">
            <div class="modal-header text-center">
                <h5 class="modal-titl text-center w-100 creategametitle" id="myModalLabel">Create a Match</h5> 
            </div>
            <div class="modal-body create_match">
                
                
                <?php global $user_login; // If user is already logged in.
                    if ( is_user_logged_in() )
                        {
                            echo do_shortcode('[post-team]');
                        }
                    else{
                            echo "<p class='oo'>OOPS!</p>";
                            echo "You Must Be Logged in to Create a Team!";
                            echo '<a class="cmlogin" id="modal-464146" href="#modal-container-464146" role="button" data-toggle="modal">Log in</a>';
                            echo '<a class="cmsignup" id="modal-509828" href="#modal-container-509828" role="button" data-toggle="modal">New User? Sign up</a>';
                        
                    }    
                ?>
            </div>
        </div>
    </div>
</div> 


<!-- Wallet Popup-->			
 
<div class="modal fade signup" id="modal-container-509823" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="logo-image text-center">
                        <img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/modal-logo.png" class="img-fluid">
                    </div>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h5 class="modal-titl text-center w-100" id="myModalLabel">ADD WORKKFORCE BUCKS</h5> 
                            </div>
                            <div class="modal-body d-flex">
                                <div class="col-md=12">
                                         <script src="https://js.stripe.com/v3/"></script>
                                                <div class="full" id="walletonee">
                                                    <form action="<?php echo get_permalink(88) ?>" method="post" id="payment-form">
                                                            <div class="form-row">
                                                                <!-- input class="form-control" type="text" name="first_name" placeholder="First Name">
                                                                <input class="form-control" type="text" name="last_name" placeholder="Last Name">
                                                                <input class="form-control" type="email" name="email" placeholder="Your Email" -->
                                                                <div class="amtt">
                                                                    <p class="frontamt txtamt" id="xrcredits">
                                                                        $ USD
                                                                    </p>
                                                                    <p class="x" ></p>
                                                                    <p class="frontamt txtamt" id="xrcredits">
                                                                        Workkforce Bucks
                                                                    </p>
                                                                </div>
                                                                <div class="amtt">
                                                                    <select class="frontamt form-control" id="xrdollar" name="amount">
                                                                    <option value="1000">$10</option>
                                                                    <option value="2000">$20</option>
                                                                    <option value="5000">$50</option>
                                                                    </select>
                                                                    <p class="x" >X</p>
                                                                    <p class="frontamt" id="xrcredits">
                                                                        <input class="form-control" type="text" id="rxc" value="1000">
                                                                    </p>
                                                                </div>
                                                                <label for="card-element">
                                                                    Credit or debit card
                                                                </label>
                                                                <div id="card-element">
                                                                <!-- A Stripe Element will be inserted here. -->
                                                                </div>
                                                                <!-- Used to display form errors. -->
                                                            <div id="card-errors" role="alert"></div>
                                                            </div>
                                                             <button class="btn btn-primary mb-2">Add Bucks</button>
                                                    </form>
                                                </div>
                                </div>		
                            </div>
                        </div>
                    </div>
                </div>      
      
	<!--login popup-->
          
			
<div class="modal fade" id="modal-container-464146" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="logo-image text-center">
            <img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/modal-logo.png" class="img-fluid">
            </div>
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header text-center">
                        
							<h5 class="modal-titl text-center w-100" id="myModalLabel">
								LOGIN
							</h5> 
							
						</div>
						<div class="modal-body">
                            <?php 
                                global $user_login;
                                // In case of a login error.
                                if ( isset( $_GET['login'] ) && $_GET['login'] == 'failed' ) : ?>
                        	            <div class="aa_error">
                        		            <p><?php _e( 'FAILED: Try again!', 'AA' ); ?></p>
                        	            </div>
                                <?php 
                                    endif;
                                // If user is already logged in.
                                if ( is_user_logged_in() ) : ?>
                    
                                    <div class="aa_logout"> 
                                        
                                        <?php 
                                            _e( 'Hello', 'AA' ); 
                                            echo $user_login; 
                                        ?>
                                        
                                        </br>
                                        
                                        <?php _e( 'You are already logged in.', 'AA' ); ?>
                    
                                    </div>
                    
                                    <a id="wp-submit" href="<?php echo wp_logout_url(); ?>" title="Logout">
                                        <?php _e( 'Logout', 'AA' ); ?>
                                    </a>
                    
                                <?php 
                                    // If user is not logged in.
                                    else: 
                                    
                                        // Login form arguments.
                                        $args = array(
                                            'echo'           => true,
                                            'redirect'       => home_url( '/all-matches/' ), 
                                            'form_id'        => 'loginform',
                                            'label_username' => __( 'Username' ),
                                            'label_password' => __( 'Password' ),
                                            'label_remember' => __( 'Remember Me' ),
                                            'label_log_in'   => __( 'LOGIN TO YOUR ACCOUNT' ),
                                            'id_username'    => 'user_login',
                                            'id_password'    => 'user_pass',
                                            'id_remember'    => 'rememberme',
                                            'id_submit'      => 'wp-submit',
                                            'remember'       => true,
                                            'value_username' => NULL,
                                            'value_remember' => true
                                        ); 
                                        
                                        // Calling the login form.
                                        wp_login_form( $args );
                                    endif;
                                    ?> 
                        <div class="form-group text-center m-4">
                        <p>By clicking below, you accept to our and </br><a href="/terms-and-conditions/">Terms of Use</a> and <a href="/privacy-policy/">Privacy Policy</a></p> 
                        </div>
                        <div class="form-group text-center footer">
                            <button type="submit" class="btn btn-primary hidden">LOGIN TO YOUR ACCOUNT</button>
                        </div>
                        
                        <p class="mt-2 log"> Don't have an account?<a id="modal-509828" href="#modal-container-509828" role="button" data-toggle="modal">Sign up</a> <a href="/secure-login/?action=lostpassword">Forgot Password</a></p> 
                        
                        
						</div>
						
					</div>
					
				</div>
				
			</div>

<!--signup popup-->
  

<div class="modal fade signup" id="modal-container-509828" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="logo-image text-center sinnuo">
       <img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/modal-logo.png" class="img-fluid">
    </div>
		<div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-titl text-center w-100" id="myModalLabel">
                        CREATE YOUR ACCOUNT
                    </h5> 
                </div>
                <div class="modal-body d-flex">
                <div class="col-md-12 neupp">
                    <form id="adduser" class="user-forms newform" action="<?php echo get_bloginfo('url') ?>/user-signup/" autocomplete="off" method="post" name="reg_form">
                        
                        <div class="form-group">
                            <label> <?php echo 'Your Name'; ?><span class="after">*</span></label> 
                            <input id="fastname" class="text-input form-control" name="fastname"  type="text" value="" required>
                        </div>
                        <div class="form-group">
                            <label><?php echo 'User Name'; ?><span class="after">*</span></label>
                            <input id="lastname" class="text-input form-control" name="lastname" type="text" value="" required/>
                        </div>
                        
                        <div class="form-group">
                            <label ><?php echo 'Email'; ?><span class="after">*</span></label> 
                            <input id="email" class="text-input form-control" name="email" required="required" type="email" value="" required/>
                        </div>   
                        
                        <div class="form-group birth">
                        <label >Phone*</label>
                        <input id="otphonenumber" class="text-input form-control newphone" name="newphone" required="required" type="text" value="" required/>
                        </div>
                        
                        <div class="form-group">
                            <label for="password"><?php echo 'Password'; ?><span class="after">*</span></label> 
                            <input id="pass" class="text-input form-control" name="password" required="required" type="password" value="" required/>
                        </div>
                        
                        <div class="form-group">
                            <label for="password"><?php echo 'Confirm Password'; ?><span class="after">*</span></label> 
                            <input id="cpass" class="text-input form-control" name="cpass" required="required" type="password" value="" required/>
                        </div>
                        
                        <div class="notgroup full text-left">
                       
                            <p><input class="form-check-input" type="checkbox" required>I've read and agree to the <a href="/terms-and-conditions/">Terms and Conditions</a></p> 
                       
                        </div>
                        
                        <div class="notgroup full text-left">
                           <p><input class="form-check-input" type="checkbox" required>I've read and agree to the <a href="/privacy-policy/">Privacy Poilicy</a>
                           I understand my right and how my information will be collected and used as laid out by our <a href="/privacy-policy/">Privacy Poilicy.</a></p> 
                            
                        </div>
                        
                        <div class="notgroup text-center footer" style="padding: 0 44px;">
                            <button type="submit" class="btn btn-primary newsubmit">CREATE ACCOUNT & START PLAYING</button>
                            </form> 
                            <p class="mt-2 log"> Already have a Workkforce account? <a href="#">Log in</a></p> 
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Create a Team popup-->
  

<div class="modal fade signup" id="modal-container-50999" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="logo-image text-center">
        <img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/pixiefreak-child/image/modal-logo.png" class="img-fluid">
    </div>
    <div class="modal-dialog" role="document">
        <div class="modal-content rob">
            <div class="modal-header text-center">
                <h5 class="modal-titl text-center w-100 creategametitle" id="myModalLabel">Build Your Squad</h5> 
            </div>
            <div class="modal-body create_match">
                
                
                <?php global $user_login; // If user is already logged in.
                    if ( is_user_logged_in() )
                        {
                            echo do_shortcode('[post-form]');
                        }
                    else{
                            echo "<p class='oo'>OOPS!</p>";
                            echo "You Must Be Logged in to Create a Challenge!";
                            echo '<a class="cmlogin" id="modal-464146" href="#modal-container-464146" role="button" data-toggle="modal">Log in</a>';
                            echo '<a class="cmsignup" id="modal-509828" href="#modal-container-509828" role="button" data-toggle="modal">New User? Sign up</a>';
                        
                    }    
                ?>
            </div>
        </div>
    </div>
</div> 		
      
      
</body>
<?php wp_footer(); ?>
  </html>
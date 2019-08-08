<?php 
/*
Template Name: Client Edit Bracket
*/
get_header('client');
$user = wp_get_current_user();
$roles = ( array ) $user->roles;
// $roles; // This returns an array
// Use this to return a single value
$admincheck = $roles[0];
if (!is_user_logged_in()) {
?>
<div class="client_login">
	<?php
	echo do_shortcode('[login-form redirect="/admin-login/"]');
	?>
</div>
<?php
} 
else if ($admincheck == 'client' || $admincheck == 'administrator' ) {
get_sidebar('client');
?>
        <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Edit Tournaments</h2>
                    </div>
                    <div class="col-lg-2">
                    </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Edit Bracket</h5>
                        </div>
                        <div class="ibox-content">
                                <?php
                                
                               if (isset ($_POST['bracket1player'])) 
                                   {
                                        $id =$_POST['id'];
                                        $bracket1player = $_POST['bracket1player'];
                                        $bracket2player = $_POST['bracket2player'];
                                        $bracket3player = $_POST['bracket3player'];
                                        $bracket4player = $_POST['bracket4player'];
                                        $bracket5player = $_POST['bracket5player'];
                                        $bracket6player = $_POST['bracket6player'];
                                        $bracket7player = $_POST['bracket7player'];
                                        $bracket8player = $_POST['bracket8player'];
                                        $bracket9player = $_POST['bracket9player'];
                                        $bracket10player = $_POST['bracket10player']; 
                                        $bracket11player = $_POST['bracket11player']; 
                                        $bracket12player = $_POST['bracket12player']; 
                                        $bracket13player = $_POST['bracket13player']; 
                                        $bracket14player = $_POST['bracket14player']; 
                                        $bracket15player = $_POST['bracket15player']; 
                                        $bracket16player = $_POST['bracket16player']; 
                                        $bracket17player = $_POST['bracket17player']; 
                                        $bracket18player = $_POST['bracket18player']; 
                                        $bracket19player = $_POST['bracket19player']; 
                                        $bracket20player = $_POST['bracket20player']; 
                                        $bracket21player = $_POST['bracket21player']; 
                                        $bracket22player = $_POST['bracket22player']; 
                                        $bracket23player = $_POST['bracket23player']; 
                                        $bracket24player = $_POST['bracket24player']; 
                                        $bracket25player = $_POST['bracket25player']; 
                                        $bracket26player = $_POST['bracket26player']; 
                                        $bracket27player = $_POST['bracket27player']; 
                                        $bracket28player = $_POST['bracket28player']; 
                                        $bracket29player = $_POST['bracket29player']; 
                                        $bracket30player = $_POST['bracket30player']; 
                                        $bracket31player = $_POST['bracket31player']; 
                                        $bracket32player = $_POST['bracket32player']; 
                                        $bracket33player = $_POST['bracket33player']; 
                                        $bracket34player = $_POST['bracket34player']; 
                                        $bracket35player = $_POST['bracket35player']; 
                                        $bracket36player = $_POST['bracket36player']; 
                                        $bracket37player = $_POST['bracket37player']; 
                                        $bracket38player = $_POST['bracket38player']; 
                                        $bracket39player = $_POST['bracket39player']; 
                                        $bracket40player = $_POST['bracket40player']; 
                                        $bracket41player = $_POST['bracket41player']; 
                                        $bracket42player = $_POST['bracket42player']; 
                                        $bracket43player = $_POST['bracket43player']; 
                                        $bracket44player = $_POST['bracket44player']; 
                                        $bracket45player = $_POST['bracket45player']; 
                                        $bracket46player = $_POST['bracket46player']; 
                                        $bracket47player = $_POST['bracket47player']; 
                                        $bracket48player = $_POST['bracket48player']; 
                                        $bracket49player = $_POST['bracket49player']; 
                                        $bracket50player = $_POST['bracket50player']; 
                                        $bracket51player = $_POST['bracket51player']; 
                                        $bracket52player = $_POST['bracket52player']; 
                                        $bracket53player = $_POST['bracket53player']; 
                                        $bracket54player = $_POST['bracket54player']; 
                                        $bracket55player = $_POST['bracket55player']; 
                                        $bracket56player = $_POST['bracket56player']; 
                                        $bracket57player = $_POST['bracket57player']; 
                                        $bracket58player = $_POST['bracket58player']; 
                                        $bracket59player = $_POST['bracket59player']; 
                                        $bracket60player = $_POST['bracket60player']; 
                                        $bracket61player = $_POST['bracket61player']; 
                                        $bracket62player = $_POST['bracket62player']; 
                                        $bracket63player = $_POST['bracket63player']; 
                                        $bracket64player = $_POST['bracket64player']; 

                                        $bracket1result = $_POST['bracket1result'];
                                        $bracket2result = $_POST['bracket2result'];
                                        $bracket3result = $_POST['bracket3result'];
                                        $bracket4result = $_POST['bracket4result'];
                                        $bracket5result = $_POST['bracket5result'];
                                        $bracket6result = $_POST['bracket6result'];
                                        $bracket7result = $_POST['bracket7result'];
                                        $bracket8result = $_POST['bracket8result'];
                                        $bracket9result = $_POST['bracket9result'];
                                        $bracket10result = $_POST['bracket10result']; 
                                        $bracket11result = $_POST['bracket11result']; 
                                        $bracket12result = $_POST['bracket12result']; 
                                        $bracket13result = $_POST['bracket13result']; 
                                        $bracket14result = $_POST['bracket14result']; 
                                        $bracket15result = $_POST['bracket15result']; 
                                        $bracket16result = $_POST['bracket16result']; 
                                        $bracket17result = $_POST['bracket17result']; 
                                        $bracket18result = $_POST['bracket18result']; 
                                        $bracket19result = $_POST['bracket19result']; 
                                        $bracket20result = $_POST['bracket20result']; 
                                        $bracket21result = $_POST['bracket21result']; 
                                        $bracket22result = $_POST['bracket22result']; 
                                        $bracket23result = $_POST['bracket23result']; 
                                        $bracket24result = $_POST['bracket24result']; 
                                        $bracket25result = $_POST['bracket25result']; 
                                        $bracket26result = $_POST['bracket26result']; 
                                        $bracket27result = $_POST['bracket27result']; 
                                        $bracket28result = $_POST['bracket28result']; 
                                        $bracket29result = $_POST['bracket29result']; 
                                        $bracket30result = $_POST['bracket30result']; 
                                        $bracket31result = $_POST['bracket31result']; 
                                        $bracket32result = $_POST['bracket32result']; 
                                        $bracket33result = $_POST['bracket33result']; 
                                        $bracket34result = $_POST['bracket34result']; 
                                        $bracket35result = $_POST['bracket35result']; 
                                        $bracket36result = $_POST['bracket36result']; 
                                        $bracket37result = $_POST['bracket37result']; 
                                        $bracket38result = $_POST['bracket38result']; 
                                        $bracket39result = $_POST['bracket39result']; 
                                        $bracket40result = $_POST['bracket40result']; 
                                        $bracket41result = $_POST['bracket41result']; 
                                        $bracket42result = $_POST['bracket42result']; 
                                        $bracket43result = $_POST['bracket43result']; 
                                        $bracket44result = $_POST['bracket44result']; 
                                        $bracket45result = $_POST['bracket45result']; 
                                        $bracket46result = $_POST['bracket46result']; 
                                        $bracket47result = $_POST['bracket47result']; 
                                        $bracket48result = $_POST['bracket48result']; 
                                        $bracket49result = $_POST['bracket49result']; 
                                        $bracket50result = $_POST['bracket50result']; 
                                        $bracket51result = $_POST['bracket51result']; 
                                        $bracket52result = $_POST['bracket52result']; 
                                        $bracket53result = $_POST['bracket53result']; 
                                        $bracket54result = $_POST['bracket54result']; 
                                        $bracket55result = $_POST['bracket55result']; 
                                        $bracket56result = $_POST['bracket56result']; 
                                        $bracket57result = $_POST['bracket57result']; 
                                        $bracket58result = $_POST['bracket58result']; 
                                        $bracket59result = $_POST['bracket59result']; 
                                        $bracket60result = $_POST['bracket60result']; 
                                        $bracket61result = $_POST['bracket61result']; 
                                        $bracket62result = $_POST['bracket62result']; 
                                        $bracket63result = $_POST['bracket63result']; 
                                        $bracket64result = $_POST['bracket64result']; 

                                       $twobracket1player = $_POST['2bracket1player'];
                                       $twobracket2player = $_POST['2bracket2player'];
                                       $twobracket3player = $_POST['2bracket3player'];
                                       $twobracket4player = $_POST['2bracket4player'];
                                       $twobracket5player = $_POST['2bracket5player'];
                                       $twobracket6player = $_POST['2bracket6player'];
                                       $twobracket7player = $_POST['2bracket7player'];
                                       $twobracket8player = $_POST['2bracket8player'];
                                       $twobracket9player = $_POST['2bracket9player'];
                                       $twobracket10player = $_POST['2bracket10player']; 
                                       $twobracket11player = $_POST['2bracket11player']; 
                                       $twobracket12player = $_POST['2bracket12player']; 
                                       $twobracket13player = $_POST['2bracket13player']; 
                                       $twobracket14player = $_POST['2bracket14player']; 
                                       $twobracket15player = $_POST['2bracket15player']; 
                                       $twobracket16player = $_POST['2bracket16player']; 
                                       $twobracket17player = $_POST['2bracket17player']; 
                                       $twobracket18player = $_POST['2bracket18player']; 
                                       $twobracket19player = $_POST['2bracket19player']; 
                                       $twobracket20player = $_POST['2bracket20player']; 
                                       $twobracket21player = $_POST['2bracket21player']; 
                                       $twobracket22player = $_POST['2bracket22player']; 
                                       $twobracket23player = $_POST['2bracket23player']; 
                                       $twobracket24player = $_POST['2bracket24player']; 
                                       $twobracket25player = $_POST['2bracket25player']; 
                                       $twobracket26player = $_POST['2bracket26player']; 
                                       $twobracket27player = $_POST['2bracket27player']; 
                                       $twobracket28player = $_POST['2bracket28player']; 
                                       $twobracket29player = $_POST['2bracket29player']; 
                                       $twobracket30player = $_POST['2bracket30player']; 
                                       $twobracket31player = $_POST['2bracket31player']; 
                                       $twobracket32player = $_POST['2bracket32player']; 


                                       $twobracket1result = $_POST['2bracket1result'];
                                       $twobracket2result = $_POST['2bracket2result'];
                                       $twobracket3result = $_POST['2bracket3result'];
                                       $twobracket4result = $_POST['2bracket4result'];
                                       $twobracket5result = $_POST['2bracket5result'];
                                       $twobracket6result = $_POST['2bracket6result'];
                                       $twobracket7result = $_POST['2bracket7result'];
                                       $twobracket8result = $_POST['2bracket8result'];
                                       $twobracket9result = $_POST['2bracket9result'];
                                       $twobracket10result = $_POST['2bracket10result']; 
                                       $twobracket11result = $_POST['2bracket11result']; 
                                       $twobracket12result = $_POST['2bracket12result']; 
                                       $twobracket13result = $_POST['2bracket13result']; 
                                       $twobracket14result = $_POST['2bracket14result']; 
                                       $twobracket15result = $_POST['2bracket15result']; 
                                       $twobracket16result = $_POST['2bracket16result']; 
                                       $twobracket17result = $_POST['2bracket17result']; 
                                       $twobracket18result = $_POST['2bracket18result']; 
                                       $twobracket19result = $_POST['2bracket19result']; 
                                       $twobracket20result = $_POST['2bracket20result']; 
                                       $twobracket21result = $_POST['2bracket21result']; 
                                       $twobracket22result = $_POST['2bracket22result']; 
                                       $twobracket23result = $_POST['2bracket23result']; 
                                       $twobracket24result = $_POST['2bracket24result']; 
                                       $twobracket25result = $_POST['2bracket25result']; 
                                       $twobracket26result = $_POST['2bracket26result']; 
                                       $twobracket27result = $_POST['2bracket27result']; 
                                       $twobracket28result = $_POST['2bracket28result']; 
                                       $twobracket29result = $_POST['2bracket29result']; 
                                       $twobracket30result = $_POST['2bracket30result']; 
                                       $twobracket31result = $_POST['2bracket31result']; 
                                       $twobracket32result = $_POST['2bracket32result']; 

                                        $threebracket1player = $_POST['3bracket1player'];
                                        $threebracket2player = $_POST['3bracket2player'];
                                        $threebracket3player = $_POST['3bracket3player'];
                                        $threebracket4player = $_POST['3bracket4player'];
                                        $threebracket5player = $_POST['3bracket5player'];
                                        $threebracket6player = $_POST['3bracket6player'];
                                        $threebracket7player = $_POST['3bracket7player'];
                                        $threebracket8player = $_POST['3bracket8player'];
                                        $threebracket9player = $_POST['3bracket9player'];
                                        $threebracket10player = $_POST['3bracket10player']; 
                                        $threebracket11player = $_POST['3bracket11player']; 
                                        $threebracket12player = $_POST['3bracket12player']; 
                                        $threebracket13player = $_POST['3bracket13player']; 
                                        $threebracket14player = $_POST['3bracket14player']; 
                                        $threebracket15player = $_POST['3bracket15player']; 
                                        $threebracket16player = $_POST['3bracket16player']; 


                                        $threebracket1result = $_POST['3bracket1result'];
                                        $threebracket2result = $_POST['3bracket2result'];
                                        $threebracket3result = $_POST['3bracket3result'];
                                        $threebracket4result = $_POST['3bracket4result'];
                                        $threebracket5result = $_POST['3bracket5result'];
                                        $threebracket6result = $_POST['3bracket6result'];
                                        $threebracket7result = $_POST['3bracket7result'];
                                        $threebracket8result = $_POST['3bracket8result'];
                                        $threebracket9result = $_POST['3bracket9result'];
                                        $threebracket10result = $_POST['3bracket10result']; 
                                        $threebracket11result = $_POST['3bracket11result']; 
                                        $threebracket12result = $_POST['3bracket12result']; 
                                        $threebracket13result = $_POST['3bracket13result']; 
                                        $threebracket14result = $_POST['3bracket14result']; 
                                        $threebracket15result = $_POST['3bracket15result']; 
                                        $threebracket16result = $_POST['3bracket16result'];

                                        $fourbracket1player = $_POST['4bracket1player'];
                                        $fourbracket2player = $_POST['4bracket2player'];
                                        $fourbracket3player = $_POST['4bracket3player'];
                                        $fourbracket4player = $_POST['4bracket4player'];
                                        $fourbracket5player = $_POST['4bracket5player'];
                                        $fourbracket6player = $_POST['4bracket6player'];
                                        $fourbracket7player = $_POST['4bracket7player'];
                                        $fourbracket8player = $_POST['4bracket8player'];

                                        $fourbracket1result = $_POST['4bracket1result'];
                                        $fourbracket2result = $_POST['4bracket2result'];
                                        $fourbracket3result = $_POST['4bracket3result'];
                                        $fourbracket4result = $_POST['4bracket4result'];
                                        $fourbracket5result = $_POST['4bracket5result'];
                                        $fourbracket6result = $_POST['4bracket6result'];
                                        $fourbracket7result = $_POST['4bracket7result'];
                                        $fourbracket8result = $_POST['4bracket8result']; 

                                        $fivebracket1player = $_POST['5bracket1player'];
                                        $fivebracket2player = $_POST['5bracket2player'];
                                        $fivebracket3player = $_POST['5bracket3player'];
                                        $fivebracket4player = $_POST['5bracket4player'];


                                        $fivebracket1result = $_POST['5bracket1result'];
                                        $fivebracket2result = $_POST['5bracket2result'];
                                        $fivebracket3result = $_POST['5bracket3result'];
                                        $fivebracket4result = $_POST['5bracket4result'];

                                        $sixbracket1player = $_POST['6bracket1player'];
                                        $sixbracket2player = $_POST['6bracket2player'];


                                        $sixbracket1result = $_POST['6bracket1result'];
                                        $sixbracket2result = $_POST['6bracket2result'];

                                        $winner = $_POST['winner'];




                                    }
                                else if (isset ($_POST['formbracket1player']))
                                  {
                                                    $bracket1player = $_POST['formbracket1player'];
                                                    $bracket2player = $_POST['formbracket2player'];
                                                    $bracket3player = $_POST['formbracket3player'];
                                                    $bracket4player = $_POST['formbracket4player'];
                                                    $bracket5player = $_POST['formbracket5player'];
                                                    $bracket6player = $_POST['formbracket6player'];
                                                    $bracket7player = $_POST['formbracket7player'];
                                                    $bracket8player = $_POST['formbracket8player'];
                                                    $bracket9player = $_POST['formbracket9player'];
                                                    $bracket10player = $_POST['formbracket10player']; 
                                                    $bracket11player = $_POST['formbracket11player']; 
                                                    $bracket12player = $_POST['formbracket12player']; 
                                                    $bracket13player = $_POST['formbracket13player']; 
                                                    $bracket14player = $_POST['formbracket14player']; 
                                                    $bracket15player = $_POST['formbracket15player']; 
                                                    $bracket16player = $_POST['formbracket16player']; 
                                                    $bracket17player = $_POST['formbracket17player']; 
                                                    $bracket18player = $_POST['formbracket18player']; 
                                                    $bracket19player = $_POST['formbracket19player']; 
                                                    $bracket20player = $_POST['formbracket20player']; 
                                                    $bracket21player = $_POST['formbracket21player']; 
                                                    $bracket22player = $_POST['formbracket22player']; 
                                                    $bracket23player = $_POST['formbracket23player']; 
                                                    $bracket24player = $_POST['formbracket24player']; 
                                                    $bracket25player = $_POST['formbracket25player']; 
                                                    $bracket26player = $_POST['formbracket26player']; 
                                                    $bracket27player = $_POST['formbracket27player']; 
                                                    $bracket28player = $_POST['formbracket28player']; 
                                                    $bracket29player = $_POST['formbracket29player']; 
                                                    $bracket30player = $_POST['formbracket30player']; 
                                                    $bracket31player = $_POST['formbracket31player']; 
                                                    $bracket32player = $_POST['formbracket32player']; 
                                                    $bracket33player = $_POST['formbracket33player']; 
                                                    $bracket34player = $_POST['formbracket34player']; 
                                                    $bracket35player = $_POST['formbracket35player']; 
                                                    $bracket36player = $_POST['formbracket36player']; 
                                                    $bracket37player = $_POST['formbracket37player']; 
                                                    $bracket38player = $_POST['formbracket38player']; 
                                                    $bracket39player = $_POST['formbracket39player']; 
                                                    $bracket40player = $_POST['formbracket40player']; 
                                                    $bracket41player = $_POST['formbracket41player']; 
                                                    $bracket42player = $_POST['formbracket42player']; 
                                                    $bracket43player = $_POST['formbracket43player']; 
                                                    $bracket44player = $_POST['formbracket44player']; 
                                                    $bracket45player = $_POST['formbracket45player']; 
                                                    $bracket46player = $_POST['formbracket46player']; 
                                                    $bracket47player = $_POST['formbracket47player']; 
                                                    $bracket48player = $_POST['formbracket48player']; 
                                                    $bracket49player = $_POST['formbracket49player']; 
                                                    $bracket50player = $_POST['formbracket50player']; 
                                                    $bracket51player = $_POST['formbracket51player']; 
                                                    $bracket52player = $_POST['formbracket52player']; 
                                                    $bracket53player = $_POST['formbracket53player']; 
                                                    $bracket54player = $_POST['formbracket54player']; 
                                                    $bracket55player = $_POST['formbracket55player']; 
                                                    $bracket56player = $_POST['formbracket56player']; 
                                                    $bracket57player = $_POST['formbracket57player']; 
                                                    $bracket58player = $_POST['formbracket58player']; 
                                                    $bracket59player = $_POST['formbracket59player']; 
                                                    $bracket60player = $_POST['formbracket60player']; 
                                                    $bracket61player = $_POST['formbracket61player']; 
                                                    $bracket62player = $_POST['formbracket62player']; 
                                                    $bracket63player = $_POST['formbracket63player']; 
                                                    $bracket64player = $_POST['formbracket64player']; 

                                                    $bracket1result = $_POST['formbracket1result'];
                                                    $bracket2result = $_POST['formbracket2result'];
                                                    $bracket3result = $_POST['formbracket3result'];
                                                    $bracket4result = $_POST['formbracket4result'];
                                                    $bracket5result = $_POST['formbracket5result'];
                                                    $bracket6result = $_POST['formbracket6result'];
                                                    $bracket7result = $_POST['formbracket7result'];
                                                    $bracket8result = $_POST['formbracket8result'];
                                                    $bracket9result = $_POST['formbracket9result'];
                                                    $bracket10result = $_POST['formbracket10result']; 
                                                    $bracket11result = $_POST['formbracket11result']; 
                                                    $bracket12result = $_POST['formbracket12result']; 
                                                    $bracket13result = $_POST['formbracket13result']; 
                                                    $bracket14result = $_POST['formbracket14result']; 
                                                    $bracket15result = $_POST['formbracket15result']; 
                                                    $bracket16result = $_POST['formbracket16result']; 
                                                    $bracket17result = $_POST['formbracket17result']; 
                                                    $bracket18result = $_POST['formbracket18result']; 
                                                    $bracket19result = $_POST['formbracket19result']; 
                                                    $bracket20result = $_POST['formbracket20result']; 
                                                    $bracket21result = $_POST['formbracket21result']; 
                                                    $bracket22result = $_POST['formbracket22result']; 
                                                    $bracket23result = $_POST['formbracket23result']; 
                                                    $bracket24result = $_POST['formbracket24result']; 
                                                    $bracket25result = $_POST['formbracket25result']; 
                                                    $bracket26result = $_POST['formbracket26result']; 
                                                    $bracket27result = $_POST['formbracket27result']; 
                                                    $bracket28result = $_POST['formbracket28result']; 
                                                    $bracket29result = $_POST['formbracket29result']; 
                                                    $bracket30result = $_POST['formbracket30result']; 
                                                    $bracket31result = $_POST['formbracket31result']; 
                                                    $bracket32result = $_POST['formbracket32result']; 
                                                    $bracket33result = $_POST['formbracket33result']; 
                                                    $bracket34result = $_POST['formbracket34result']; 
                                                    $bracket35result = $_POST['formbracket35result']; 
                                                    $bracket36result = $_POST['formbracket36result']; 
                                                    $bracket37result = $_POST['formbracket37result']; 
                                                    $bracket38result = $_POST['formbracket38result']; 
                                                    $bracket39result = $_POST['formbracket39result']; 
                                                    $bracket40result = $_POST['formbracket40result']; 
                                                    $bracket41result = $_POST['formbracket41result']; 
                                                    $bracket42result = $_POST['formbracket42result']; 
                                                    $bracket43result = $_POST['formbracket43result']; 
                                                    $bracket44result = $_POST['formbracket44result']; 
                                                    $bracket45result = $_POST['formbracket45result']; 
                                                    $bracket46result = $_POST['formbracket46result']; 
                                                    $bracket47result = $_POST['formbracket47result']; 
                                                    $bracket48result = $_POST['formbracket48result']; 
                                                    $bracket49result = $_POST['formbracket49result']; 
                                                    $bracket50result = $_POST['formbracket50result']; 
                                                    $bracket51result = $_POST['formbracket51result']; 
                                                    $bracket52result = $_POST['formbracket52result']; 
                                                    $bracket53result = $_POST['formbracket53result']; 
                                                    $bracket54result = $_POST['formbracket54result']; 
                                                    $bracket55result = $_POST['formbracket55result']; 
                                                    $bracket56result = $_POST['formbracket56result']; 
                                                    $bracket57result = $_POST['formbracket57result']; 
                                                    $bracket58result = $_POST['formbracket58result']; 
                                                    $bracket59result = $_POST['formbracket59result']; 
                                                    $bracket60result = $_POST['formbracket60result']; 
                                                    $bracket61result = $_POST['formbracket61result']; 
                                                    $bracket62result = $_POST['formbracket62result']; 
                                                    $bracket63result = $_POST['formbracket63result']; 
                                                    $bracket64result = $_POST['formbracket64result']; 

                                                   $twobracket1player = $_POST['form2bracket1player'];
                                                   $twobracket2player = $_POST['form2bracket2player'];
                                                   $twobracket3player = $_POST['form2bracket3player'];
                                                   $twobracket4player = $_POST['form2bracket4player'];
                                                   $twobracket5player = $_POST['form2bracket5player'];
                                                   $twobracket6player = $_POST['form2bracket6player'];
                                                   $twobracket7player = $_POST['form2bracket7player'];
                                                   $twobracket8player = $_POST['form2bracket8player'];
                                                   $twobracket9player = $_POST['form2bracket9player'];
                                                   $twobracket10player = $_POST['form2bracket10player']; 
                                                   $twobracket11player = $_POST['form2bracket11player']; 
                                                   $twobracket12player = $_POST['form2bracket12player']; 
                                                   $twobracket13player = $_POST['form2bracket13player']; 
                                                   $twobracket14player = $_POST['form2bracket14player']; 
                                                   $twobracket15player = $_POST['form2bracket15player']; 
                                                   $twobracket16player = $_POST['form2bracket16player']; 
                                                   $twobracket17player = $_POST['form2bracket17player']; 
                                                   $twobracket18player = $_POST['form2bracket18player']; 
                                                   $twobracket19player = $_POST['form2bracket19player']; 
                                                   $twobracket20player = $_POST['form2bracket20player']; 
                                                   $twobracket21player = $_POST['form2bracket21player']; 
                                                   $twobracket22player = $_POST['form2bracket22player']; 
                                                   $twobracket23player = $_POST['form2bracket23player']; 
                                                   $twobracket24player = $_POST['form2bracket24player']; 
                                                   $twobracket25player = $_POST['form2bracket25player']; 
                                                   $twobracket26player = $_POST['form2bracket26player']; 
                                                   $twobracket27player = $_POST['form2bracket27player']; 
                                                   $twobracket28player = $_POST['form2bracket28player']; 
                                                   $twobracket29player = $_POST['form2bracket29player']; 
                                                   $twobracket30player = $_POST['form2bracket30player']; 
                                                   $twobracket31player = $_POST['form2bracket31player']; 
                                                   $twobracket32player = $_POST['form2bracket32player']; 


                                                   $twobracket1result = $_POST['form2bracket1result'];
                                                   $twobracket2result = $_POST['form2bracket2result'];
                                                   $twobracket3result = $_POST['form2bracket3result'];
                                                   $twobracket4result = $_POST['form2bracket4result'];
                                                   $twobracket5result = $_POST['form2bracket5result'];
                                                   $twobracket6result = $_POST['form2bracket6result'];
                                                   $twobracket7result = $_POST['form2bracket7result'];
                                                   $twobracket8result = $_POST['form2bracket8result'];
                                                   $twobracket9result = $_POST['form2bracket9result'];
                                                   $twobracket10result = $_POST['form2bracket10result']; 
                                                   $twobracket11result = $_POST['form2bracket11result']; 
                                                   $twobracket12result = $_POST['form2bracket12result']; 
                                                   $twobracket13result = $_POST['form2bracket13result']; 
                                                   $twobracket14result = $_POST['form2bracket14result']; 
                                                   $twobracket15result = $_POST['form2bracket15result']; 
                                                   $twobracket16result = $_POST['form2bracket16result']; 
                                                   $twobracket17result = $_POST['form2bracket17result']; 
                                                   $twobracket18result = $_POST['form2bracket18result']; 
                                                   $twobracket19result = $_POST['form2bracket19result']; 
                                                   $twobracket20result = $_POST['form2bracket20result']; 
                                                   $twobracket21result = $_POST['form2bracket21result']; 
                                                   $twobracket22result = $_POST['form2bracket22result']; 
                                                   $twobracket23result = $_POST['form2bracket23result']; 
                                                   $twobracket24result = $_POST['form2bracket24result']; 
                                                   $twobracket25result = $_POST['form2bracket25result']; 
                                                   $twobracket26result = $_POST['form2bracket26result']; 
                                                   $twobracket27result = $_POST['form2bracket27result']; 
                                                   $twobracket28result = $_POST['form2bracket28result']; 
                                                   $twobracket29result = $_POST['form2bracket29result']; 
                                                   $twobracket30result = $_POST['form2bracket30result']; 
                                                   $twobracket31result = $_POST['form2bracket31result']; 
                                                   $twobracket32result = $_POST['form2bracket32result']; 

                                                    $threebracket1player = $_POST['form3bracket1player'];
                                                    $threebracket2player = $_POST['form3bracket2player'];
                                                    $threebracket3player = $_POST['form3bracket3player'];
                                                    $threebracket4player = $_POST['form3bracket4player'];
                                                    $threebracket5player = $_POST['form3bracket5player'];
                                                    $threebracket6player = $_POST['form3bracket6player'];
                                                    $threebracket7player = $_POST['form3bracket7player'];
                                                    $threebracket8player = $_POST['form3bracket8player'];
                                                    $threebracket9player = $_POST['form3bracket9player'];
                                                    $threebracket10player = $_POST['form3bracket10player']; 
                                                    $threebracket11player = $_POST['form3bracket11player']; 
                                                    $threebracket12player = $_POST['form3bracket12player']; 
                                                    $threebracket13player = $_POST['form3bracket13player']; 
                                                    $threebracket14player = $_POST['form3bracket14player']; 
                                                    $threebracket15player = $_POST['form3bracket15player']; 
                                                    $threebracket16player = $_POST['form3bracket16player']; 


                                                    $threebracket1result = $_POST['form3bracket1result'];
                                                    $threebracket2result = $_POST['form3bracket2result'];
                                                    $threebracket3result = $_POST['form3bracket3result'];
                                                    $threebracket4result = $_POST['form3bracket4result'];
                                                    $threebracket5result = $_POST['form3bracket5result'];
                                                    $threebracket6result = $_POST['form3bracket6result'];
                                                    $threebracket7result = $_POST['form3bracket7result'];
                                                    $threebracket8result = $_POST['form3bracket8result'];
                                                    $threebracket9result = $_POST['form3bracket9result'];
                                                    $threebracket10result = $_POST['form3bracket10result']; 
                                                    $threebracket11result = $_POST['form3bracket11result']; 
                                                    $threebracket12result = $_POST['form3bracket12result']; 
                                                    $threebracket13result = $_POST['form3bracket13result']; 
                                                    $threebracket14result = $_POST['form3bracket14result']; 
                                                    $threebracket15result = $_POST['form3bracket15result']; 
                                                    $threebracket16result = $_POST['form3bracket16result'];

                                                    $fourbracket1player = $_POST['form4bracket1player'];
                                                    $fourbracket2player = $_POST['form4bracket2player'];
                                                    $fourbracket3player = $_POST['form4bracket3player'];
                                                    $fourbracket4player = $_POST['form4bracket4player'];
                                                    $fourbracket5player = $_POST['form4bracket5player'];
                                                    $fourbracket6player = $_POST['form4bracket6player'];
                                                    $fourbracket7player = $_POST['form4bracket7player'];
                                                    $fourbracket8player = $_POST['form4bracket8player'];

                                                    $fourbracket1result = $_POST['form4bracket1result'];
                                                    $fourbracket2result = $_POST['form4bracket2result'];
                                                    $fourbracket3result = $_POST['form4bracket3result'];
                                                    $fourbracket4result = $_POST['form4bracket4result'];
                                                    $fourbracket5result = $_POST['form4bracket5result'];
                                                    $fourbracket6result = $_POST['form4bracket6result'];
                                                    $fourbracket7result = $_POST['form4bracket7result'];
                                                    $fourbracket8result = $_POST['form4bracket8result']; 

                                                    $fivebracket1player = $_POST['form5bracket1player'];
                                                    $fivebracket2player = $_POST['form5bracket2player'];
                                                    $fivebracket3player = $_POST['form5bracket3player'];
                                                    $fivebracket4player = $_POST['form5bracket4player'];


                                                    $fivebracket1result = $_POST['form5bracket1result'];
                                                    $fivebracket2result = $_POST['form5bracket2result'];
                                                    $fivebracket3result = $_POST['form5bracket3result'];
                                                    $fivebracket4result = $_POST['form5bracket4result'];

                                                    $sixbracket1player = $_POST['form6bracket1player'];
                                                    $sixbracket2player = $_POST['form6bracket2player'];


                                                    $sixbracket1result = $_POST['form6bracket1result'];
                                                    $sixbracket2result = $_POST['form6bracket2result'];


                                                    $winner = $_POST['formwinner'];
                                                    $id =$_POST['formid'];


                                                                  update_field( 'bracket1player', $bracket1player, $id);
                                                                  update_field( 'bracket2player', $bracket2player, $id);
                                                                  update_field( 'bracket3player', $bracket3player, $id);
                                                                  update_field( 'bracket4player', $bracket4player, $id);
                                                                  update_field( 'bracket5player', $bracket5player, $id);
                                                                  update_field( 'bracket6player', $bracket6player, $id);
                                                                  update_field( 'bracket7player', $bracket7player, $id);
                                                                  update_field( 'bracket8player', $bracket8player, $id);
                                                                  update_field( 'bracket9player', $bracket9player, $id);
                                                                  update_field( 'bracket10player', $bracket10player, $id); 
                                                                  update_field( 'bracket11player', $bracket11player, $id); 
                                                                  update_field( 'bracket12player', $bracket12player, $id); 
                                                                  update_field( 'bracket13player', $bracket13player, $id); 
                                                                  update_field( 'bracket14player', $bracket14player, $id); 
                                                                  update_field( 'bracket15player', $bracket15player, $id); 
                                                                  update_field( 'bracket16player', $bracket16player, $id); 
                                                                  update_field( 'bracket17player', $bracket17player, $id); 
                                                                  update_field( 'bracket18player', $bracket18player, $id); 
                                                                  update_field( 'bracket19player', $bracket19player, $id); 
                                                                  update_field( 'bracket20player', $bracket20player, $id); 
                                                                  update_field( 'bracket21player', $bracket21player, $id); 
                                                                  update_field( 'bracket22player', $bracket22player, $id); 
                                                                  update_field( 'bracket23player', $bracket23player, $id); 
                                                                  update_field( 'bracket24player', $bracket24player, $id); 
                                                                  update_field( 'bracket25player', $bracket25player, $id); 
                                                                  update_field( 'bracket26player', $bracket26player, $id); 
                                                                  update_field( 'bracket27player', $bracket27player, $id); 
                                                                  update_field( 'bracket28player', $bracket28player, $id); 
                                                                  update_field( 'bracket29player', $bracket29player, $id); 
                                                                  update_field( 'bracket30player', $bracket30player, $id); 
                                                                  update_field( 'bracket31player', $bracket31player, $id); 
                                                                  update_field( 'bracket32player', $bracket32player, $id); 
                                                                  update_field( 'bracket33player', $bracket33player, $id); 
                                                                  update_field( 'bracket34player', $bracket34player, $id); 
                                                                  update_field( 'bracket35player', $bracket35player, $id); 
                                                                  update_field( 'bracket36player', $bracket36player, $id); 
                                                                  update_field( 'bracket37player', $bracket37player, $id); 
                                                                  update_field( 'bracket38player', $bracket38player, $id); 
                                                                  update_field( 'bracket39player', $bracket39player, $id); 
                                                                  update_field( 'bracket40player', $bracket40player, $id); 
                                                                  update_field( 'bracket41player', $bracket41player, $id); 
                                                                  update_field( 'bracket42player', $bracket42player, $id); 
                                                                  update_field( 'bracket43player', $bracket43player, $id); 
                                                                  update_field( 'bracket44player', $bracket44player, $id); 
                                                                  update_field( 'bracket45player', $bracket45player, $id); 
                                                                  update_field( 'bracket46player', $bracket46player, $id); 
                                                                  update_field( 'bracket47player', $bracket47player, $id); 
                                                                  update_field( 'bracket48player', $bracket48player, $id); 
                                                                  update_field( 'bracket49player', $bracket49player, $id); 
                                                                  update_field( 'bracket50player', $bracket50player, $id); 
                                                                  update_field( 'bracket51player', $bracket51player, $id); 
                                                                  update_field( 'bracket52player', $bracket52player, $id); 
                                                                  update_field( 'bracket53player', $bracket53player, $id); 
                                                                  update_field( 'bracket54player', $bracket54player, $id); 
                                                                  update_field( 'bracket55player', $bracket55player, $id); 
                                                                  update_field( 'bracket56player', $bracket56player, $id); 
                                                                  update_field( 'bracket57player', $bracket57player, $id); 
                                                                  update_field( 'bracket58player', $bracket58player, $id); 
                                                                  update_field( 'bracket59player', $bracket59player, $id); 
                                                                  update_field( 'bracket60player', $bracket60player, $id); 
                                                                  update_field( 'bracket61player', $bracket61player, $id); 
                                                                  update_field( 'bracket62player', $bracket62player, $id); 
                                                                  update_field( 'bracket63player', $bracket63player, $id); 
                                                                  update_field( 'bracket64player', $bracket64player, $id);


                                                                  update_field( 'bracket1result', $bracket1result, $id);
                                                                  update_field( 'bracket2result', $bracket2result, $id);
                                                                  update_field( 'bracket3result', $bracket3result, $id);
                                                                  update_field( 'bracket4result', $bracket4result, $id);
                                                                  update_field( 'bracket5result', $bracket5result, $id);
                                                                  update_field( 'bracket6result', $bracket6result, $id);
                                                                  update_field( 'bracket7result', $bracket7result, $id);
                                                                  update_field( 'bracket8result', $bracket8result, $id);
                                                                  update_field( 'bracket9result', $bracket9result, $id);
                                                                  update_field( 'bracket10result', $bracket10result, $id); 
                                                                  update_field( 'bracket11result', $bracket11result, $id); 
                                                                  update_field( 'bracket12result', $bracket12result, $id); 
                                                                  update_field( 'bracket13result', $bracket13result, $id); 
                                                                  update_field( 'bracket14result', $bracket14result, $id); 
                                                                  update_field( 'bracket15result', $bracket15result, $id); 
                                                                  update_field( 'bracket16result', $bracket16result, $id); 
                                                                  update_field( 'bracket17result', $bracket17result, $id); 
                                                                  update_field( 'bracket18result', $bracket18result, $id); 
                                                                  update_field( 'bracket19result', $bracket19result, $id); 
                                                                  update_field( 'bracket20result', $bracket20result, $id); 
                                                                  update_field( 'bracket21result', $bracket21result, $id); 
                                                                  update_field( 'bracket22result', $bracket22result, $id); 
                                                                  update_field( 'bracket23result', $bracket23result, $id); 
                                                                  update_field( 'bracket24result', $bracket24result, $id); 
                                                                  update_field( 'bracket25result', $bracket25result, $id); 
                                                                  update_field( 'bracket26result', $bracket26result, $id); 
                                                                  update_field( 'bracket27result', $bracket27result, $id); 
                                                                  update_field( 'bracket28result', $bracket28result, $id); 
                                                                  update_field( 'bracket29result', $bracket29result, $id); 
                                                                  update_field( 'bracket30result', $bracket30result, $id); 
                                                                  update_field( 'bracket31result', $bracket31result, $id); 
                                                                  update_field( 'bracket32result', $bracket32result, $id); 
                                                                  update_field( 'bracket33result', $bracket33result, $id); 
                                                                  update_field( 'bracket34result', $bracket34result, $id); 
                                                                  update_field( 'bracket35result', $bracket35result, $id); 
                                                                  update_field( 'bracket36result', $bracket36result, $id); 
                                                                  update_field( 'bracket37result', $bracket37result, $id); 
                                                                  update_field( 'bracket38result', $bracket38result, $id); 
                                                                  update_field( 'bracket39result', $bracket39result, $id); 
                                                                  update_field( 'bracket40result', $bracket40result, $id); 
                                                                  update_field( 'bracket41result', $bracket41result, $id); 
                                                                  update_field( 'bracket42result', $bracket42result, $id); 
                                                                  update_field( 'bracket43result', $bracket43result, $id); 
                                                                  update_field( 'bracket44result', $bracket44result, $id); 
                                                                  update_field( 'bracket45result', $bracket45result, $id); 
                                                                  update_field( 'bracket46result', $bracket46result, $id); 
                                                                  update_field( 'bracket47result', $bracket47result, $id); 
                                                                  update_field( 'bracket48result', $bracket48result, $id); 
                                                                  update_field( 'bracket49result', $bracket49result, $id); 
                                                                  update_field( 'bracket50result', $bracket50result, $id); 
                                                                  update_field( 'bracket51result', $bracket51result, $id); 
                                                                  update_field( 'bracket52result', $bracket52result, $id); 
                                                                  update_field( 'bracket53result', $bracket53result, $id); 
                                                                  update_field( 'bracket54result', $bracket54result, $id); 
                                                                  update_field( 'bracket55result', $bracket55result, $id); 
                                                                  update_field( 'bracket56result', $bracket56result, $id); 
                                                                  update_field( 'bracket57result', $bracket57result, $id); 
                                                                  update_field( 'bracket58result', $bracket58result, $id); 
                                                                  update_field( 'bracket59result', $bracket59result, $id); 
                                                                  update_field( 'bracket60result', $bracket60result, $id); 
                                                                  update_field( 'bracket61result', $bracket61result, $id); 
                                                                  update_field( 'bracket62result', $bracket62result, $id); 
                                                                  update_field( 'bracket63result', $bracket63result, $id); 
                                                                  update_field( 'bracket64result', $bracket64result, $id);

                                                                  update_field( '2bracket1player', $twobracket1player, $id);
                                                                  update_field( '2bracket2player', $twobracket2player, $id);
                                                                  update_field( '2bracket3player', $twobracket3player, $id);
                                                                  update_field( '2bracket4player', $twobracket4player, $id);
                                                                  update_field( '2bracket5player', $twobracket5player, $id);
                                                                  update_field( '2bracket6player', $twobracket6player, $id);
                                                                  update_field( '2bracket7player', $twobracket7player, $id);
                                                                  update_field( '2bracket8player', $twobracket8player, $id);
                                                                  update_field( '2bracket9player', $twobracket9player, $id);
                                                                  update_field( '2bracket10player', $twobracket10player, $id); 
                                                                  update_field( '2bracket11player', $twobracket11player, $id); 
                                                                  update_field( '2bracket12player', $twobracket12player, $id); 
                                                                  update_field( '2bracket13player', $twobracket13player, $id); 
                                                                  update_field( '2bracket14player', $twobracket14player, $id); 
                                                                  update_field( '2bracket15player', $twobracket15player, $id); 
                                                                  update_field( '2bracket16player', $twobracket16player, $id); 
                                                                  update_field( '2bracket17player', $twobracket17player, $id); 
                                                                  update_field( '2bracket18player', $twobracket18player, $id); 
                                                                  update_field( '2bracket19player', $twobracket19player, $id); 
                                                                  update_field( '2bracket20player', $twobracket20player, $id); 
                                                                  update_field( '2bracket21player', $twobracket21player, $id); 
                                                                  update_field( '2bracket22player', $twobracket22player, $id); 
                                                                  update_field( '2bracket23player', $twobracket23player, $id); 
                                                                  update_field( '2bracket24player', $twobracket24player, $id); 
                                                                  update_field( '2bracket25player', $twobracket25player, $id); 
                                                                  update_field( '2bracket26player', $twobracket26player, $id); 
                                                                  update_field( '2bracket27player', $twobracket27player, $id); 
                                                                  update_field( '2bracket28player', $twobracket28player, $id); 
                                                                  update_field( '2bracket29player', $twobracket29player, $id); 
                                                                  update_field( '2bracket30player', $twobracket30player, $id); 
                                                                  update_field( '2bracket31player', $twobracket31player, $id); 
                                                                  update_field( '2bracket32player', $twobracket32player, $id);

                                                                  update_field( '2bracket1result', $twobracket1result, $id);
                                                                  update_field( '2bracket2result', $twobracket2result, $id);
                                                                  update_field( '2bracket3result', $twobracket3result, $id);
                                                                  update_field( '2bracket4result', $twobracket4result, $id);
                                                                  update_field( '2bracket5result', $twobracket5result, $id);
                                                                  update_field( '2bracket6result', $twobracket6result, $id);
                                                                  update_field( '2bracket7result', $twobracket7result, $id);
                                                                  update_field( '2bracket8result', $twobracket8result, $id);
                                                                  update_field( '2bracket9result', $twobracket9result, $id);
                                                                  update_field( '2bracket10result', $twobracket10result, $id); 
                                                                  update_field( '2bracket11result', $twobracket11result, $id); 
                                                                  update_field( '2bracket12result', $twobracket12result, $id); 
                                                                  update_field( '2bracket13result', $twobracket13result, $id); 
                                                                  update_field( '2bracket14result', $twobracket14result, $id); 
                                                                  update_field( '2bracket15result', $twobracket15result, $id); 
                                                                  update_field( '2bracket16result', $twobracket16result, $id); 
                                                                  update_field( '2bracket17result', $twobracket17result, $id); 
                                                                  update_field( '2bracket18result', $twobracket18result, $id); 
                                                                  update_field( '2bracket19result', $twobracket19result, $id); 
                                                                  update_field( '2bracket20result', $twobracket20result, $id); 
                                                                  update_field( '2bracket21result', $twobracket21result, $id); 
                                                                  update_field( '2bracket22result', $twobracket22result, $id); 
                                                                  update_field( '2bracket23result', $twobracket23result, $id); 
                                                                  update_field( '2bracket24result', $twobracket24result, $id); 
                                                                  update_field( '2bracket25result', $twobracket25result, $id); 
                                                                  update_field( '2bracket26result', $twobracket26result, $id); 
                                                                  update_field( '2bracket27result', $twobracket27result, $id); 
                                                                  update_field( '2bracket28result', $twobracket28result, $id); 
                                                                  update_field( '2bracket29result', $twobracket29result, $id); 
                                                                  update_field( '2bracket30result', $twobracket30result, $id); 
                                                                  update_field( '2bracket31result', $twobracket31result, $id); 
                                                                  update_field( '2bracket32result', $twobracket32result, $id);

                                                                  update_field( '3bracket1player', $threebracket1player, $id);
                                                                  update_field( '3bracket2player', $threebracket2player, $id);
                                                                  update_field( '3bracket3player', $threebracket3player, $id);
                                                                  update_field( '3bracket4player', $threebracket4player, $id);
                                                                  update_field( '3bracket5player', $threebracket5player, $id);
                                                                  update_field( '3bracket6player', $threebracket6player, $id);
                                                                  update_field( '3bracket7player', $threebracket7player, $id);
                                                                  update_field( '3bracket8player', $threebracket8player, $id);
                                                                  update_field( '3bracket9player', $threebracket9player, $id);
                                                                  update_field( '3bracket10player', $threebracket10player, $id); 
                                                                  update_field( '3bracket11player', $threebracket11player, $id); 
                                                                  update_field( '3bracket12player', $threebracket12player, $id); 
                                                                  update_field( '3bracket13player', $threebracket13player, $id); 
                                                                  update_field( '3bracket14player', $threebracket14player, $id); 
                                                                  update_field( '3bracket15player', $threebracket15player, $id); 
                                                                  update_field( '3bracket16player', $threebracket16player, $id);

                                                                  update_field( '3bracket1result', $threebracket1result, $id);
                                                                  update_field( '3bracket2result', $threebracket2result, $id);
                                                                  update_field( '3bracket3result', $threebracket3result, $id);
                                                                  update_field( '3bracket4result', $threebracket4result, $id);
                                                                  update_field( '3bracket5result', $threebracket5result, $id);
                                                                  update_field( '3bracket6result', $threebracket6result, $id);
                                                                  update_field( '3bracket7result', $threebracket7result, $id);
                                                                  update_field( '3bracket8result', $threebracket8result, $id);
                                                                  update_field( '3bracket9result', $threebracket9result, $id);
                                                                  update_field( '3bracket10result', $threebracket10result, $id); 
                                                                  update_field( '3bracket11result', $threebracket11result, $id); 
                                                                  update_field( '3bracket12result', $threebracket12result, $id); 
                                                                  update_field( '3bracket13result', $threebracket13result, $id); 
                                                                  update_field( '3bracket14result', $threebracket14result, $id); 
                                                                  update_field( '3bracket15result', $threebracket15result, $id); 
                                                                  update_field( '3bracket16result', $threebracket16result, $id);

                                                                  update_field( '4bracket1player', $fourbracket1player, $id);
                                                                  update_field( '4bracket2player', $fourbracket2player, $id);
                                                                  update_field( '4bracket3player', $fourbracket3player, $id);
                                                                  update_field( '4bracket4player', $fourbracket4player, $id);
                                                                  update_field( '4bracket5player', $fourbracket5player, $id);
                                                                  update_field( '4bracket6player', $fourbracket6player, $id);
                                                                  update_field( '4bracket7player', $fourbracket7player, $id);
                                                                  update_field( '4bracket8player', $fourbracket8player, $id);

                                                                  update_field( '4bracket1result', $fourbracket1result, $id);
                                                                  update_field( '4bracket2result', $fourbracket2result, $id);
                                                                  update_field( '4bracket3result', $fourbracket3result, $id);
                                                                  update_field( '4bracket4result', $fourbracket4result, $id);
                                                                  update_field( '4bracket5result', $fourbracket5result, $id);
                                                                  update_field( '4bracket6result', $fourbracket6result, $id);
                                                                  update_field( '4bracket7result', $fourbracket7result, $id);
                                                                  update_field( '4bracket8result', $fourbracket8result, $id);

                                                                  update_field( '5bracket1player', $fivebracket1player, $id);
                                                                  update_field( '5bracket2player', $fivebracket2player, $id);
                                                                  update_field( '5bracket3player', $fivebracket3player, $id);
                                                                  update_field( '5bracket4player', $fivebracket4player, $id);

                                                                  update_field( '5bracket1result', $fivebracket1result, $id);
                                                                  update_field( '5bracket2result', $fivebracket2result, $id);
                                                                  update_field( '5bracket3result', $fivebracket3result, $id);
                                                                  update_field( '5bracket4result', $fivebracket4result, $id);

                                                                  update_field( '6bracket1player', $sixbracket1player, $id);
                                                                  update_field( '6bracket2player', $sixbracket2player, $id);

                                                                  update_field( '6bracket1result', $sixbracket1result, $id);
                                                                  update_field( '6bracket2result', $sixbracket2result, $id);   

                                  };
                                
                                
                                   
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                ?>
                                    <div id="postbox">
                                        <form id="new_post" class="result_adjustments" name="new_post" method="post" action="" enctype="multipart/form-data">
                                              <input type="text" class="hide" name="formid" class="" value="<?php echo $id; ?>">
                                             
                                            <div class="rounone">
                                                <h3>Round 1</h3>
                                              <label>Round 1 - bracket 1 player</label>
                                              <input type="text" placeholder="bracket 1 player" name="formbracket1player" class="" value="<?php echo $bracket1player; ?>">
                                              <label>bracket 1 result</label>
                                              <input type="text" placeholder="bracket 1 result" name="formbracket1result" class="" value="<?php echo $bracket1result; ?>">


                                              <label>Round 1 - bracket 2 player</label>
                                              <input type="text" placeholder="bracket 2 player" name="formbracket2player" class="" value="<?php echo $bracket2player; ?>">
                                              <label>bracket 2 result</label>
                                              <input type="text" placeholder="bracket 2 result" name="formbracket2result" class="" value="<?php echo $bracket2result; ?>">

                                              
                                              <label>Round 1 - bracket 3 player</label>
                                              <input type="text" placeholder="bracket 3 player" name="formbracket3player" class="" value="<?php echo $bracket3player; ?>">
                                              <label>bracket 3 result</label>
                                              <input type="text" placeholder="bracket 3 result" name="formbracket3result" class="" value="<?php echo $bracket3result; ?>">

                                              
                                              <label>Round 1 - bracket 4 player</label>
                                              <input type="text" placeholder="bracket 4 player" name="formbracket4player" class="" value="<?php echo $bracket4player; ?>">
                                              <label>bracket 4 result</label>
                                              <input type="text" placeholder="bracket 4 result" name="formbracket4result" class="" value="<?php echo $bracket4result; ?>">


                                              <label>Round 1 - bracket 5 player</label>
                                              <input type="text" placeholder="bracket 5 player" name="formbracket5player" class="" value="<?php echo $bracket5player; ?>">
                                              <label>bracket 5 result</label>
                                              <input type="text" placeholder="bracket 5 result" name="formbracket5result" class="" value="<?php echo $bracket5result; ?>">


                                              <label>Round 1 - bracket 6 player</label>
                                              <input type="text" placeholder="bracket 6 player" name="formbracket6player" class="" value="<?php echo $bracket6player; ?>">
                                              <label>bracket 6 result</label>
                                              <input type="text" placeholder="bracket 6 result" name="formbracket6result" class="" value="<?php echo $bracket6result; ?>">


                                              <label>Round 1 - bracket 7 player</label>
                                              <input type="text" placeholder="bracket 7 player" name="formbracket7player" class="" value="<?php echo $bracket7player; ?>">
                                              <label>bracket 7 result</label>
                                              <input type="text" placeholder="bracket 7 result" name="formbracket7result" class="" value="<?php echo $bracket7result; ?>">


                                              <label>Round 1 - bracket 8 player</label>
                                              <input type="text" placeholder="bracket 8 player" name="formbracket8player" class="" value="<?php echo $bracket8player; ?>">
                                              <label>bracket 8 result</label>
                                              <input type="text" placeholder="bracket 8 result" name="formbracket8result" class="" value="<?php echo $bracket8result; ?>">


                                              <label>Round 1 - bracket 9 player</label>
                                              <input type="text" placeholder="bracket 9 player" name="formbracket9player" class="" value="<?php echo $bracket9player; ?>">
                                              <label>bracket 9 result</label>
                                              <input type="text" placeholder="bracket 9 result" name="formbracket9result" class="" value="<?php echo $bracket9result; ?>">


                                              <label>Round 1 - bracket 10 player</label>
                                              <input type="text" placeholder="bracket 10 player" name="formbracket10player" class="" value="<?php echo $bracket10player; ?>">
                                              <label>bracket 10 result</label>
                                              <input type="text" placeholder="bracket 10 result" name="formbracket10result" class="" value="<?php echo $bracket10result; ?>">


                                              <label>Round 1 - bracket 11 player</label>
                                              <input type="text" placeholder="bracket 11 player" name="formbracket11player" class="" value="<?php echo $bracket11player; ?>">
                                              <label>bracket 11 result</label>
                                              <input type="text" placeholder="bracket 11 result" name="formbracket11result" class="" value="<?php echo $bracket11result; ?>">


                                              <label>Round 1 - bracket 12 player</label>
                                              <input type="text" placeholder="bracket 12 player" name="formbracket12player" class="" value="<?php echo $bracket12player; ?>">
                                              <label>bracket 12 result</label>
                                              <input type="text" placeholder="bracket 12 result" name="formbracket12result" class="" value="<?php echo $bracket12result; ?>">


                                              <label>Round 1 - bracket 13 player</label>
                                              <input type="text" placeholder="bracket 13 player" name="formbracket13player" class="" value="<?php echo $bracket13player; ?>">
                                              <label>bracket 13 result</label>
                                              <input type="text" placeholder="bracket 13 result" name="formbracket13result" class="" value="<?php echo $bracket13result; ?>">


                                              <label>Round 1 - bracket 14 player</label>
                                              <input type="text" placeholder="bracket 14 player" name="formbracket14player" class="" value="<?php echo $bracket14player; ?>">
                                              <label>bracket 14 result</label>
                                              <input type="text" placeholder="bracket 14 result" name="formbracket14result" class="" value="<?php echo $bracket14result; ?>">


                                              <label>Round 1 - bracket 15 player</label>
                                              <input type="text" placeholder="bracket 15 player" name="formbracket15player" class="" value="<?php echo $bracket15player; ?>">
                                              <label>bracket 15 result</label>
                                              <input type="text" placeholder="bracket 15 result" name="formbracket15result" class="" value="<?php echo $bracket15result; ?>">


                                              <label>Round 1 - bracket 16 player</label>
                                              <input type="text" placeholder="bracket 16 player" name="formbracket16player" class="" value="<?php echo $bracket16player; ?>">
                                              <label>bracket 16 result</label>
                                              <input type="text" placeholder="bracket 16 result" name="formbracket16result" class="" value="<?php echo $bracket16result; ?>">


                                              <label>Round 1 - bracket 17 player</label>
                                              <input type="text" placeholder="bracket 17 player" name="formbracket17player" class="" value="<?php echo $bracket17player; ?>">
                                              <label>bracket 17 result</label>
                                              <input type="text" placeholder="bracket 17 result" name="formbracket17result" class="" value="<?php echo $bracket17result; ?>">


                                              <label>Round 1 - bracket 18 player</label>
                                              <input type="text" placeholder="bracket 18 player" name="formbracket18player" class="" value="<?php echo $bracket18player; ?>">
                                              <label>bracket 18 result</label>
                                              <input type="text" placeholder="bracket 18 result" name="formbracket18result" class="" value="<?php echo $bracket18result; ?>">


                                              <label>Round 1 - bracket 19 player</label>
                                              <input type="text" placeholder="bracket 19 player" name="formbracket19player" class="" value="<?php echo $bracket19player; ?>">
                                              <label>bracket 19 result</label>
                                              <input type="text" placeholder="bracket 19 result" name="formbracket19result" class="" value="<?php echo $bracket19result; ?>">


                                              <label>Round 1 - bracket 20 player</label>
                                              <input type="text" placeholder="bracket 20 player" name="formbracket20player" class="" value="<?php echo $bracket20player; ?>">
                                              <label>bracket 20 result</label>
                                              <input type="text" placeholder="bracket 20 result" name="formbracket20result" class="" value="<?php echo $bracket20result; ?>">


                                              <label>Round 1 - bracket 21 player</label>
                                              <input type="text" placeholder="bracket 21 player" name="formbracket21player" class="" value="<?php echo $bracket21player; ?>">
                                              <label>bracket 21 result</label>
                                              <input type="text" placeholder="bracket 21 result" name="formbracket21result" class="" value="<?php echo $bracket21result; ?>">


                                              <label>Round 1 - bracket 22 player</label>
                                              <input type="text" placeholder="bracket 22 player" name="formbracket22player" class="" value="<?php echo $bracket22player; ?>">
                                              <label>bracket 22 result</label>
                                              <input type="text" placeholder="bracket 22 result" name="formbracket22result" class="" value="<?php echo $bracket22result; ?>">


                                              <label>Round 1 - bracket 23 player</label>
                                              <input type="text" placeholder="bracket 23 player" name="formbracket23player" class="" value="<?php echo $bracket23player; ?>">
                                              <label>bracket 23 result</label>
                                              <input type="text" placeholder="bracket 23 result" name="formbracket23result" class="" value="<?php echo $bracket23result; ?>">


                                              <label>Round 1 - bracket 24 player</label>
                                              <input type="text" placeholder="bracket 24 player" name="formbracket24player" class="" value="<?php echo $bracket24player; ?>">
                                              <label>bracket 24 result</label>
                                              <input type="text" placeholder="bracket 24 result" name="formbracket24result" class="" value="<?php echo $bracket24result; ?>">


                                              <label>Round 1 - bracket 25 player</label>
                                              <input type="text" placeholder="bracket 25 player" name="formbracket25player" class="" value="<?php echo $bracket25player; ?>">
                                              <label>bracket 25 result</label>
                                              <input type="text" placeholder="bracket 25 result" name="formbracket25result" class="" value="<?php echo $bracket25result; ?>">


                                              <label>Round 1 - bracket 26 player</label>
                                              <input type="text" placeholder="bracket 26 player" name="formbracket26player" class="" value="<?php echo $bracket26player; ?>">
                                              <label>bracket 26 result</label>
                                              <input type="text" placeholder="bracket 26 result" name="formbracket26result" class="" value="<?php echo $bracket26result; ?>">


                                              <label>Round 1 - bracket 27 player</label>
                                              <input type="text" placeholder="bracket 27 player" name="formbracket27player" class="" value="<?php echo $bracket27player; ?>">
                                              <label>bracket 27 result</label>
                                              <input type="text" placeholder="bracket 27 result" name="formbracket27result" class="" value="<?php echo $bracket27result; ?>">


                                              <label>Round 1 - bracket 28 player</label>
                                              <input type="text" placeholder="bracket 28 player" name="formbracket28player" class="" value="<?php echo $bracket28player; ?>">
                                              <label>bracket 28 result</label>
                                              <input type="text" placeholder="bracket 28 result" name="formbracket28result" class="" value="<?php echo $bracket28result; ?>">


                                              <label>Round 1 - bracket 29 player</label>
                                              <input type="text" placeholder="bracket 29 player" name="formbracket29player" class="" value="<?php echo $bracket29player; ?>">
                                              <label>bracket 29 result</label>
                                              <input type="text" placeholder="bracket 29 result" name="formbracket29result" class="" value="<?php echo $bracket29result; ?>">


                                              <label>Round 1 - bracket 30 player</label>
                                              <input type="text" placeholder="bracket 30 player" name="formbracket30player" class="" value="<?php echo $bracket30player; ?>">
                                              <label>bracket 30 result</label>
                                              <input type="text" placeholder="bracket 30 result" name="formbracket30result" class="" value="<?php echo $bracket30result; ?>">


                                              <label>Round 1 - bracket 31 player</label>
                                              <input type="text" placeholder="bracket 31 player" name="formbracket31player" class="" value="<?php echo $bracket31player; ?>">
                                              <label>bracket 31 result</label>
                                              <input type="text" placeholder="bracket 31 result" name="formbracket31result" class="" value="<?php echo $bracket31result; ?>">


                                              <label>Round 1 - bracket 32 player</label>
                                              <input type="text" placeholder="bracket 32 player" name="formbracket32player" class="" value="<?php echo $bracket32player; ?>">
                                              <label>bracket 32 result</label>
                                              <input type="text" placeholder="bracket 32 result" name="formbracket32result" class="" value="<?php echo $bracket32result; ?>">


                                              <label>Round 1 - bracket 33 player</label>
                                              <input type="text" placeholder="bracket 33 player" name="formbracket33player" class="" value="<?php echo $bracket33player; ?>">
                                              <label>bracket 33 result</label>
                                              <input type="text" placeholder="bracket 33 result" name="formbracket33result" class="" value="<?php echo $bracket33result; ?>">


                                              <label>Round 1 - bracket 34 player</label>
                                              <input type="text" placeholder="bracket 34 player" name="formbracket34player" class="" value="<?php echo $bracket34player; ?>">
                                              <label>bracket 34 result</label>
                                              <input type="text" placeholder="bracket 34 result" name="formbracket34result" class="" value="<?php echo $bracket34result; ?>">


                                              <label>Round 1 - bracket 35 player</label>
                                              <input type="text" placeholder="bracket 35 player" name="formbracket35player" class="" value="<?php echo $bracket35player; ?>">
                                              <label>bracket 35 result</label>
                                              <input type="text" placeholder="bracket 35 result" name="formbracket35result" class="" value="<?php echo $bracket35result; ?>">


                                              <label>Round 1 - bracket 36 player</label>
                                              <input type="text" placeholder="bracket 36 player" name="formbracket36player" class="" value="<?php echo $bracket36player; ?>">
                                              <label>bracket 36 result</label>
                                              <input type="text" placeholder="bracket 36 result" name="formbracket36result" class="" value="<?php echo $bracket36result; ?>">


                                              <label>Round 1 - bracket 37 player</label>
                                              <input type="text" placeholder="bracket 37 player" name="formbracket37player" class="" value="<?php echo $bracket37player; ?>">
                                              <label>bracket 37 result</label>
                                              <input type="text" placeholder="bracket 37 result" name="formbracket37result" class="" value="<?php echo $bracket37result; ?>">


                                              <label>Round 1 - bracket 38 player</label>
                                              <input type="text" placeholder="bracket 38 player" name="formbracket38player" class="" value="<?php echo $bracket38player; ?>">
                                              <label>bracket 38 result</label>
                                              <input type="text" placeholder="bracket 38 result" name="formbracket38result" class="" value="<?php echo $bracket38result; ?>">


                                              <label>Round 1 - bracket 39 player</label>
                                              <input type="text" placeholder="bracket 39 player" name="formbracket39player" class="" value="<?php echo $bracket39player; ?>">
                                              <label>bracket 39 result</label>
                                              <input type="text" placeholder="bracket 39 result" name="formbracket39result" class="" value="<?php echo $bracket39result; ?>">


                                              <label>Round 1 - bracket 40 player</label>
                                              <input type="text" placeholder="bracket 40 player" name="formbracket40player" class="" value="<?php echo $bracket40player; ?>">
                                              <label>bracket 40 result</label>
                                              <input type="text" placeholder="bracket 40 result" name="formbracket40result" class="" value="<?php echo $bracket40result; ?>">


                                              <label>Round 1 - bracket 41 player</label>
                                              <input type="text" placeholder="bracket 41 player" name="formbracket41player" class="" value="<?php echo $bracket41player; ?>">
                                              <label>bracket 41 result</label>
                                              <input type="text" placeholder="bracket 41 result" name="formbracket41result" class="" value="<?php echo $bracket41result; ?>">


                                              <label>Round 1 - bracket 42 player</label>
                                              <input type="text" placeholder="bracket 42 player" name="formbracket42player" class="" value="<?php echo $bracket42player; ?>">
                                              <label>bracket 42 result</label>
                                              <input type="text" placeholder="bracket 42 result" name="formbracket42result" class="" value="<?php echo $bracket42result; ?>">


                                              <label>Round 1 - bracket 43 player</label>
                                              <input type="text" placeholder="bracket 43 player" name="formbracket43player" class="" value="<?php echo $bracket43player; ?>">
                                              <label>bracket 43 result</label>
                                              <input type="text" placeholder="bracket 43 result" name="formbracket43result" class="" value="<?php echo $bracket43result; ?>">


                                              <label>Round 1 - bracket 44 player</label>
                                              <input type="text" placeholder="bracket 44 player" name="formbracket44player" class="" value="<?php echo $bracket44player; ?>">
                                              <label>bracket 44 result</label>
                                              <input type="text" placeholder="bracket 44 result" name="formbracket44result" class="" value="<?php echo $bracket44result; ?>">


                                              <label>Round 1 - bracket 45 player</label>
                                              <input type="text" placeholder="bracket 45 player" name="formbracket45player" class="" value="<?php echo $bracket45player; ?>">
                                              <label>bracket 45 result</label>
                                              <input type="text" placeholder="bracket 45 result" name="formbracket45result" class="" value="<?php echo $bracket45result; ?>">


                                              <label>Round 1 - bracket 46 player</label>
                                              <input type="text" placeholder="bracket 46 player" name="formbracket46player" class="" value="<?php echo $bracket46player; ?>">
                                              <label>bracket 46 result</label>
                                              <input type="text" placeholder="bracket 46 result" name="formbracket46result" class="" value="<?php echo $bracket46result; ?>">


                                              <label>Round 1 - bracket 47 player</label>
                                              <input type="text" placeholder="bracket 47 player" name="formbracket47player" class="" value="<?php echo $bracket47player; ?>">
                                              <label>bracket 47 result</label>
                                              <input type="text" placeholder="bracket 47 result" name="formbracket47result" class="" value="<?php echo $bracket47result; ?>">


                                              <label>Round 1 - bracket 48 player</label>
                                              <input type="text" placeholder="bracket 48 player" name="formbracket48player" class="" value="<?php echo $bracket48player; ?>">
                                              <label>bracket 48 result</label>
                                              <input type="text" placeholder="bracket 48 result" name="formbracket48result" class="" value="<?php echo $bracket48result; ?>">


                                              <label>Round 1 - bracket 49 player</label>
                                              <input type="text" placeholder="bracket 49 player" name="formbracket49player" class="" value="<?php echo $bracket49player; ?>">
                                              <label>bracket 49 result</label>
                                              <input type="text" placeholder="bracket 49 result" name="formbracket49result" class="" value="<?php echo $bracket49result; ?>">


                                              <label>Round 1 - bracket 50 player</label>
                                              <input type="text" placeholder="bracket 50 player" name="formbracket50player" class="" value="<?php echo $bracket50player; ?>">
                                              <label>bracket 50 result</label>
                                              <input type="text" placeholder="bracket 50 result" name="formbracket50result" class="" value="<?php echo $bracket50result; ?>">


                                              <label>Round 1 - bracket 51 player</label>
                                              <input type="text" placeholder="bracket 51 player" name="formbracket51player" class="" value="<?php echo $bracket51player; ?>">
                                              <label>bracket 51 result</label>
                                              <input type="text" placeholder="bracket 51 result" name="formbracket51result" class="" value="<?php echo $bracket51result; ?>">


                                              <label>Round 1 - bracket 52 player</label>
                                              <input type="text" placeholder="bracket 52 player" name="formbracket52player" class="" value="<?php echo $bracket52player; ?>">
                                              <label>bracket 52 result</label>
                                              <input type="text" placeholder="bracket 52 result" name="formbracket52result" class="" value="<?php echo $bracket52result; ?>">


                                              <label>Round 1 - bracket 53 player</label>
                                              <input type="text" placeholder="bracket 53 player" name="formbracket53player" class="" value="<?php echo $bracket53player; ?>">
                                              <label>bracket 53 result</label>
                                              <input type="text" placeholder="bracket 53 result" name="formbracket53result" class="" value="<?php echo $bracket53result; ?>">


                                              <label>Round 1 - bracket 54 player</label>
                                              <input type="text" placeholder="bracket 54 player" name="formbracket54player" class="" value="<?php echo $bracket54player; ?>">
                                              <label>bracket 54 result</label>
                                              <input type="text" placeholder="bracket 54 result" name="formbracket54result" class="" value="<?php echo $bracket54result; ?>">


                                              <label>Round 1 - bracket 55 player</label>
                                              <input type="text" placeholder="bracket 55 player" name="formbracket55player" class="" value="<?php echo $bracket55player; ?>">
                                              <label>bracket 55 result</label>
                                              <input type="text" placeholder="bracket 55 result" name="formbracket55result" class="" value="<?php echo $bracket55result; ?>">


                                              <label>Round 1 - bracket 56 player</label>
                                              <input type="text" placeholder="bracket 56 player" name="formbracket56player" class="" value="<?php echo $bracket56player; ?>">
                                              <label>bracket 56 result</label>
                                              <input type="text" placeholder="bracket 56 result" name="formbracket56result" class="" value="<?php echo $bracket56result; ?>">


                                              <label>Round 1 - bracket 57 player</label>
                                              <input type="text" placeholder="bracket 57 player" name="formbracket57player" class="" value="<?php echo $bracket57player; ?>">
                                              <label>bracket 57 result</label>
                                              <input type="text" placeholder="bracket 57 result" name="formbracket57result" class="" value="<?php echo $bracket57result; ?>">


                                              <label>Round 1 - bracket 58 player</label>
                                              <input type="text" placeholder="bracket 58 player" name="formbracket58player" class="" value="<?php echo $bracket58player; ?>">
                                              <label>bracket 58 result</label>
                                              <input type="text" placeholder="bracket 58 result" name="formbracket58result" class="" value="<?php echo $bracket58result; ?>">


                                              <label>Round 1 - bracket 59 player</label>
                                              <input type="text" placeholder="bracket 59 player" name="formbracket59player" class="" value="<?php echo $bracket59player; ?>">
                                              <label>bracket 59 result</label>
                                              <input type="text" placeholder="bracket 59 result" name="formbracket59result" class="" value="<?php echo $bracket59result; ?>">


                                              <label>Round 1 - bracket 60 player</label>
                                              <input type="text" placeholder="bracket 60 player" name="formbracket60player" class="" value="<?php echo $bracket60player; ?>">
                                              <label>bracket 60 result</label>
                                              <input type="text" placeholder="bracket 60 result" name="formbracket60result" class="" value="<?php echo $bracket60result; ?>">


                                              <label>Round 1 - bracket 61 player</label>
                                              <input type="text" placeholder="bracket 61 player" name="formbracket61player" class="" value="<?php echo $bracket61player; ?>">
                                              <label>bracket 61 result</label>
                                              <input type="text" placeholder="bracket 61 result" name="formbracket61result" class="" value="<?php echo $bracket61result; ?>">


                                              <label>Round 1 - bracket 62 player</label>
                                              <input type="text" placeholder="bracket 62 player" name="formbracket62player" class="" value="<?php echo $bracket62player; ?>">
                                              <label>bracket 62 result</label>
                                              <input type="text" placeholder="bracket 62 result" name="formbracket62result" class="" value="<?php echo $bracket62result; ?>">


                                              <label>Round 1 - bracket 63 player</label>
                                              <input type="text" placeholder="bracket 63 player" name="formbracket63player" class="" value="<?php echo $bracket63player; ?>">
                                              <label>bracket 63 result</label>
                                              <input type="text" placeholder="bracket 63 result" name="formbracket63result" class="" value="<?php echo $bracket63result; ?>">


                                              <label>Round 1 - bracket 64 player</label>
                                              <input type="text" placeholder="bracket 64 player" name="formbracket64player" class="" value="<?php echo $bracket64player; ?>">
                                              <label>bracket 64 result</label>
                                              <input type="text" placeholder="bracket 64 result" name="formbracket64result" class="" value="<?php echo $bracket64result; ?>">

                                            </div>
                                            <div class="rounone">




                                                <h3>Round 2</h3>
                                              <label>Round 2 - bracket 1 player</label>
                                              <input type="text" placeholder="2bracket 1 player" name="form2bracket1player" class="" value="<?php echo$twobracket1player; ?>">
                                              <label>bracket 1 result</label>
                                              <input type="text" placeholder="2bracket 1 result" name="form2bracket1result" class="" value="<?php echo$twobracket1result; ?>">

                                              <label>Round 2 - bracket 2 player</label>
                                              <input type="text" placeholder="2bracket 2 player" name="form2bracket2player" class="" value="<?php echo$twobracket2player; ?>">
                                              <label>bracket 2 result</label>
                                              <input type="text" placeholder="2bracket 2 result" name="form2bracket2result" class="" value="<?php echo$twobracket2result; ?>">

                                              <label>Round 2 - bracket 3 player</label>
                                              <input type="text" placeholder="2bracket 3 player" name="form2bracket3player" class="" value="<?php echo$twobracket3player; ?>">
                                              <label>bracket 3 result</label>
                                              <input type="text" placeholder="2bracket 3 result" name="form2bracket3result" class="" value="<?php echo$twobracket3result; ?>">

                                              <label>Round 2 - bracket 4 player</label>
                                              <input type="text" placeholder="2bracket 4 player" name="form2bracket4player" class="" value="<?php echo$twobracket4player; ?>">
                                              <label>bracket 4 result</label>
                                              <input type="text" placeholder="2bracket 4 result" name="form2bracket4result" class="" value="<?php echo$twobracket4result; ?>">


                                              <label>Round 2 - bracket 5 player</label>
                                              <input type="text" placeholder="2bracket 5 player" name="form2bracket5player" class="" value="<?php echo$twobracket5player; ?>">
                                              <label>bracket 5 result</label>
                                              <input type="text" placeholder="2bracket 5 result" name="form2bracket5result" class="" value="<?php echo$twobracket5result; ?>">

                                              <label>Round 2 - bracket 6 player</label>
                                              <input type="text" placeholder="2bracket 6 player" name="form2bracket6player" class="" value="<?php echo$twobracket6player; ?>">
                                              <label>bracket 6 result</label>
                                              <input type="text" placeholder="2bracket 6 result" name="form2bracket6result" class="" value="<?php echo$twobracket6result; ?>">


                                              <label>Round 2 - bracket 7 player</label>
                                              <input type="text" placeholder="2bracket 7 player" name="form2bracket7player" class="" value="<?php echo$twobracket7player; ?>">
                                              <label>bracket 7 result</label>
                                              <input type="text" placeholder="2bracket 7 result" name="form2bracket7result" class="" value="<?php echo$twobracket7result; ?>">


                                              <label>Round 2 - bracket 8 player</label>
                                              <input type="text" placeholder="2bracket 8 player" name="form2bracket8player" class="" value="<?php echo$twobracket8player; ?>">
                                              <label>bracket 8 result</label>
                                              <input type="text" placeholder="2bracket 8 result" name="form2bracket8result" class="" value="<?php echo$twobracket8result; ?>">


                                              <label>Round 2 - bracket 9 player</label>
                                              <input type="text" placeholder="2bracket 9 player" name="form2bracket9player" class="" value="<?php echo$twobracket9player; ?>">
                                              <label>bracket 9 result</label>
                                              <input type="text" placeholder="2bracket 9 result" name="form2bracket9result" class="" value="<?php echo$twobracket9result; ?>">


                                              <label>Round 2 - bracket 10 player</label>
                                              <input type="text" placeholder="2bracket 10 player" name="form2bracket10player" class="" value="<?php echo$twobracket10player; ?>">
                                              <label>bracket 10 result</label>
                                              <input type="text" placeholder="2bracket 10 result" name="form2bracket10result" class="" value="<?php echo$twobracket10result; ?>">


                                              <label>Round 2 - bracket 11 player</label>
                                              <input type="text" placeholder="2bracket 11 player" name="form2bracket11player" class="" value="<?php echo$twobracket11player; ?>">
                                              <label>bracket 11 result</label>
                                              <input type="text" placeholder="2bracket 11 result" name="form2bracket11result" class="" value="<?php echo$twobracket11result; ?>">


                                              <label>Round 2 - bracket 12 player</label>
                                              <input type="text" placeholder="2bracket 12 player" name="form2bracket12player" class="" value="<?php echo$twobracket12player; ?>">
                                              <label>bracket 12 result</label>
                                              <input type="text" placeholder="2bracket 12 result" name="form2bracket12result" class="" value="<?php echo$twobracket12result; ?>">


                                              <label>Round 2 - bracket 13 player</label>
                                              <input type="text" placeholder="2bracket 13 player" name="form2bracket13player" class="" value="<?php echo$twobracket13player; ?>">
                                              <label>bracket 13 result</label>
                                              <input type="text" placeholder="2bracket 13 result" name="form2bracket13result" class="" value="<?php echo$twobracket13result; ?>">


                                              <label>Round 2 - bracket 14 player</label>
                                              <input type="text" placeholder="2bracket 14 player" name="form2bracket14player" class="" value="<?php echo$twobracket14player; ?>">
                                              <label>bracket 14 result</label>
                                              <input type="text" placeholder="2bracket 14 result" name="form2bracket14result" class="" value="<?php echo$twobracket14result; ?>">


                                              <label>Round 2 - bracket 15 player</label>
                                              <input type="text" placeholder="2bracket 15 player" name="form2bracket15player" class="" value="<?php echo$twobracket15player; ?>">
                                              <label>bracket 15 result</label>
                                              <input type="text" placeholder="2bracket 15 result" name="form2bracket15result" class="" value="<?php echo$twobracket15result; ?>">


                                              <label>Round 2 - bracket 16 player</label>
                                              <input type="text" placeholder="2bracket 16 player" name="form2bracket16player" class="" value="<?php echo$twobracket16player; ?>">
                                              <label>bracket 16 result</label>
                                              <input type="text" placeholder="2bracket 16 result" name="form2bracket16result" class="" value="<?php echo$twobracket16result; ?>">


                                              <label>Round 2 - bracket 17 player</label>
                                              <input type="text" placeholder="2bracket 17 player" name="form2bracket17player" class="" value="<?php echo$twobracket17player; ?>">
                                              <label>bracket 17 result</label>
                                              <input type="text" placeholder="2bracket 17 result" name="form2bracket17result" class="" value="<?php echo$twobracket17result; ?>">


                                              <label>Round 2 - bracket 18 player</label>
                                              <input type="text" placeholder="2bracket 18 player" name="form2bracket18player" class="" value="<?php echo$twobracket18player; ?>">
                                              <label>bracket 18 result</label>
                                              <input type="text" placeholder="2bracket 18 result" name="form2bracket18result" class="" value="<?php echo$twobracket18result; ?>">


                                              <label>Round 2 - bracket 19 player</label>
                                              <input type="text" placeholder="2bracket 19 player" name="form2bracket19player" class="" value="<?php echo$twobracket19player; ?>">
                                              <label>bracket 19 result</label>
                                              <input type="text" placeholder="2bracket 19 result" name="form2bracket19result" class="" value="<?php echo$twobracket19result; ?>">


                                              <label>Round 2 - bracket 20 player</label>
                                              <input type="text" placeholder="2bracket 20 player" name="form2bracket20player" class="" value="<?php echo$twobracket20player; ?>">
                                              <label>bracket 20 result</label>
                                              <input type="text" placeholder="2bracket 20 result" name="form2bracket20result" class="" value="<?php echo$twobracket20result; ?>">


                                              <label>Round 2 - bracket 21 player</label>
                                              <input type="text" placeholder="2bracket 21 player" name="form2bracket21player" class="" value="<?php echo$twobracket21player; ?>">
                                              <label>bracket 21 result</label>
                                              <input type="text" placeholder="2bracket 21 result" name="form2bracket21result" class="" value="<?php echo$twobracket21result; ?>">


                                              <label>Round 2 - bracket 22 player</label>
                                              <input type="text" placeholder="2bracket 22 player" name="form2bracket22player" class="" value="<?php echo$twobracket22player; ?>">
                                              <label>bracket 22 result</label>
                                              <input type="text" placeholder="2bracket 22 result" name="form2bracket22result" class="" value="<?php echo$twobracket22result; ?>">


                                              <label>Round 2 - bracket 23 player</label>
                                              <input type="text" placeholder="2bracket 23 player" name="form2bracket23player" class="" value="<?php echo$twobracket23player; ?>">
                                              <label>bracket 23 result</label>
                                              <input type="text" placeholder="2bracket 23 result" name="form2bracket23result" class="" value="<?php echo$twobracket23result; ?>">


                                              <label>Round 2 - bracket 24 player</label>
                                              <input type="text" placeholder="2bracket 24 player" name="form2bracket24player" class="" value="<?php echo$twobracket24player; ?>">
                                              <label>bracket 24 result</label>
                                              <input type="text" placeholder="2bracket 24 result" name="form2bracket24result" class="" value="<?php echo$twobracket24result; ?>">


                                              <label>Round 2 - bracket 25 player</label>
                                              <input type="text" placeholder="2bracket 25 player" name="form2bracket25player" class="" value="<?php echo$twobracket25player; ?>">
                                              <label>bracket 25 result</label>
                                              <input type="text" placeholder="2bracket 25 result" name="form2bracket25result" class="" value="<?php echo$twobracket25result; ?>">


                                              <label>Round 2 - bracket 26 player</label>
                                              <input type="text" placeholder="2bracket 26 player" name="form2bracket26player" class="" value="<?php echo$twobracket26player; ?>">
                                              <label>bracket 26 result</label>
                                              <input type="text" placeholder="2bracket 26 result" name="form2bracket26result" class="" value="<?php echo$twobracket26result; ?>">


                                              <label>Round 2 - bracket 27 player</label>
                                              <input type="text" placeholder="2bracket 27 player" name="form2bracket27player" class="" value="<?php echo$twobracket27player; ?>">
                                              <label>bracket 27 result</label>
                                              <input type="text" placeholder="2bracket 27 result" name="form2bracket27result" class="" value="<?php echo$twobracket27result; ?>">


                                              <label>Round 2 - bracket 28 player</label>
                                              <input type="text" placeholder="2bracket 28 player" name="form2bracket28player" class="" value="<?php echo$twobracket28player; ?>">
                                              <label>bracket 28 result</label>
                                              <input type="text" placeholder="2bracket 28 result" name="form2bracket28result" class="" value="<?php echo$twobracket28result; ?>">


                                              <label>Round 2 - bracket 29 player</label>
                                              <input type="text" placeholder="2bracket 29 player" name="form2bracket29player" class="" value="<?php echo$twobracket29player; ?>">
                                              <label>bracket 29 result</label>
                                              <input type="text" placeholder="2bracket 29 result" name="form2bracket29result" class="" value="<?php echo$twobracket29result; ?>">


                                              <label>Round 2 - bracket 30 player</label>
                                              <input type="text" placeholder="2bracket 30 player" name="form2bracket30player" class="" value="<?php echo$twobracket30player; ?>">
                                              <label>bracket 30 result</label>
                                              <input type="text" placeholder="2bracket 30 result" name="form2bracket30result" class="" value="<?php echo$twobracket30result; ?>">


                                              <label>Round 2 - bracket 31 player</label>
                                              <input type="text" placeholder="2bracket 31 player" name="form2bracket31player" class="" value="<?php echo$twobracket31player; ?>">
                                              <label>bracket 31 result</label>
                                              <input type="text" placeholder="2bracket 31 result" name="form2bracket31result" class="" value="<?php echo$twobracket31result; ?>">


                                              <label>Round 2 - bracket 32 player</label>
                                              <input type="text" placeholder="2bracket 32 player" name="form2bracket32player" class="" value="<?php echo$twobracket32player; ?>">
                                              <label>bracket 32 result</label>
                                              <input type="text" placeholder="2bracket 32 result" name="form2bracket32result" class="" value="<?php echo$twobracket32result; ?>">


                                            </div>
                                            <div class="rounone">



                                                <h3>Round 3</h3>
                                              <label>Round 3 - bracket 1 player</label>
                                              <input type="text" placeholder="3bracket 1 player" name="form3bracket1player" class="" value="<?php echo $threebracket1player; ?>">
                                              <label>bracket 1 result</label>
                                              <input type="text" placeholder="3bracket 1 result" name="form3bracket1result" class="" value="<?php echo $threebracket1result; ?>">

                                              <label>Round 3 - bracket 2 player</label>
                                              <input type="text" placeholder="3bracket 2 player" name="form3bracket2player" class="" value="<?php echo $threebracket2player; ?>">
                                              <label>bracket 2 result</label>
                                              <input type="text" placeholder="3bracket 2 result" name="form3bracket2result" class="" value="<?php echo $threebracket2result; ?>">

                                              <label>Round 3 - bracket 3 player</label>
                                              <input type="text" placeholder="3bracket 3 player" name="form3bracket3player" class="" value="<?php echo $threebracket3player; ?>">
                                              <label>bracket 3 result</label>
                                              <input type="text" placeholder="3bracket 3 result" name="form3bracket3result" class="" value="<?php echo $threebracket3result; ?>">

                                              <label>Round 3 - bracket 4 player</label>
                                              <input type="text" placeholder="3bracket 4 player" name="form3bracket4player" class="" value="<?php echo $threebracket4player; ?>">
                                              <label>bracket 4 result</label>
                                              <input type="text" placeholder="3bracket 4 result" name="form3bracket4result" class="" value="<?php echo $threebracket4result; ?>">

                                              <label>Round 3 - bracket 5 player</label>
                                              <input type="text" placeholder="3bracket 5 player" name="form3bracket5player" class="" value="<?php echo $threebracket5player; ?>">
                                              <label>bracket 5 result</label>
                                              <input type="text" placeholder="3bracket 5 result" name="form3bracket5result" class="" value="<?php echo $threebracket5result; ?>">

                                              <label>Round 3 - bracket 6 player</label>
                                              <input type="text" placeholder="3bracket 6 player" name="form3bracket6player" class="" value="<?php echo $threebracket6player; ?>">
                                              <label>bracket 6 result</label>
                                              <input type="text" placeholder="3bracket 6 result" name="form3bracket6result" class="" value="<?php echo $threebracket6result; ?>">

                                              <label>Round 3 - bracket 7 player</label>
                                              <input type="text" placeholder="3bracket 7 player" name="form3bracket7player" class="" value="<?php echo $threebracket7player; ?>">
                                              <label>bracket 7 result</label>
                                              <input type="text" placeholder="3bracket 7 result" name="form3bracket7result" class="" value="<?php echo $threebracket7result; ?>">

                                              <label>Round 3 - bracket 8 player</label>
                                              <input type="text" placeholder="3bracket 8 player" name="form3bracket8player" class="" value="<?php echo $threebracket8player; ?>">
                                              <label>bracket 8 result</label>
                                              <input type="text" placeholder="3bracket 8 result" name="form3bracket8result" class="" value="<?php echo $threebracket8result; ?>">

                                              <label>Round 3 - bracket 9 player</label>
                                              <input type="text" placeholder="3bracket 9 player" name="form3bracket9player" class="" value="<?php echo $threebracket9player; ?>">
                                              <label>bracket 9 result</label>
                                              <input type="text" placeholder="3bracket 9 result" name="form3bracket9result" class="" value="<?php echo $threebracket9result; ?>">

                                              <label>Round 3 - bracket 10 player</label>
                                              <input type="text" placeholder="3bracket 10 player" name="form3bracket10player" class="" value="<?php echo $threebracket10player; ?>">
                                              <label>bracket 10 result</label>
                                              <input type="text" placeholder="3bracket 10 result" name="form3bracket10result" class="" value="<?php echo $threebracket10result; ?>">

                                              <label>Round 3 - bracket 11 player</label>
                                              <input type="text" placeholder="3bracket 11 player" name="form3bracket11player" class="" value="<?php echo $threebracket11player; ?>">
                                              <label>bracket 11 result</label>
                                              <input type="text" placeholder="3bracket 11 result" name="form3bracket11result" class="" value="<?php echo $threebracket11result; ?>">

                                              <label>Round 3 - bracket 12 player</label>
                                              <input type="text" placeholder="3bracket 12 player" name="form3bracket12player" class="" value="<?php echo $threebracket12player; ?>">
                                              <label>bracket 12 result</label>
                                              <input type="text" placeholder="3bracket 12 result" name="form3bracket12result" class="" value="<?php echo $threebracket12result; ?>">

                                              <label>Round 3 - bracket 13 player</label>
                                              <input type="text" placeholder="3bracket 13 player" name="form3bracket13player" class="" value="<?php echo $threebracket13player; ?>">
                                              <label>bracket 13 result</label>
                                              <input type="text" placeholder="3bracket 13 result" name="form3bracket13result" class="" value="<?php echo $threebracket13result; ?>">

                                              <label>Round 3 - bracket 14 player</label>
                                              <input type="text" placeholder="3bracket 14 player" name="form3bracket14player" class="" value="<?php echo $threebracket14player; ?>">
                                              <label>bracket 14 result</label>
                                              <input type="text" placeholder="3bracket 14 result" name="form3bracket14result" class="" value="<?php echo $threebracket14result; ?>">

                                              <label>Round 3 - bracket 15 player</label>
                                              <input type="text" placeholder="3bracket 15 player" name="form3bracket15player" class="" value="<?php echo $threebracket15player; ?>">
                                              <label>bracket 15 result</label>
                                              <input type="text" placeholder="3bracket 15 result" name="form3bracket15result" class="" value="<?php echo $threebracket15result; ?>">

                                              <label>Round 3 - bracket 16 player</label>
                                              <input type="text" placeholder="3bracket 16 player" name="form3bracket16player" class="" value="<?php echo $threebracket16player; ?>">
                                              <label>bracket 16 result</label>
                                              <input type="text" placeholder="3bracket 16 result" name="form3bracket16result" class="" value="<?php echo $threebracket16result; ?>">


                                            </div>
                                            <div class="rounone">
                                                <h3>Round 4</h3>

                                              <label>Round 4 - bracket 1 player</label>
                                              <input type="text" placeholder="4bracket 1 player" name="form4bracket1player" class="" value="<?php echo $fourbracket1player; ?>">
                                              <label>bracket 1 result</label>
                                              <input type="text" placeholder="4bracket 1 result" name="form4bracket1result" class="" value="<?php echo $fourbracket1result; ?>">

                                              <label>Round 4 - bracket 2 player</label>
                                              <input type="text" placeholder="4bracket 2 player" name="form4bracket2player" class="" value="<?php echo $fourbracket2player; ?>">
                                              <label>bracket 2 result</label>
                                              <input type="text" placeholder="4bracket 2 result" name="form4bracket2result" class="" value="<?php echo $fourbracket2result; ?>">

                                              <label>Round 4 - bracket 3 player</label>
                                              <input type="text" placeholder="4bracket 3 player" name="form4bracket3player" class="" value="<?php echo $fourbracket3player; ?>">
                                              <label>bracket 3 result</label>
                                              <input type="text" placeholder="4bracket 3 result" name="form4bracket3result" class="" value="<?php echo $fourbracket3result; ?>">

                                              <label>Round 4 - bracket 4 player</label>
                                              <input type="text" placeholder="4bracket 4 player" name="form4bracket4player" class="" value="<?php echo $fourbracket4player; ?>">
                                              <label>bracket 4 result</label>
                                              <input type="text" placeholder="4bracket 4 result" name="form4bracket4result" class="" value="<?php echo $fourbracket4result; ?>">

                                              <label>Round 4 - bracket 5 player</label>
                                              <input type="text" placeholder="4bracket 5 player" name="form4bracket5player" class="" value="<?php echo $fourbracket5player; ?>">
                                              <label>bracket 5 result</label>
                                              <input type="text" placeholder="4bracket 5 result" name="form4bracket5result" class="" value="<?php echo $fourbracket5result; ?>">

                                              <label>Round 4 - bracket 6 player</label>
                                              <input type="text" placeholder="4bracket 6 player" name="form4bracket6player" class="" value="<?php echo $fourbracket6player; ?>">
                                              <label>bracket 6 result</label>
                                              <input type="text" placeholder="4bracket 6 result" name="form4bracket6result" class="" value="<?php echo $fourbracket6result; ?>">

                                              <label>Round 4 - bracket 7 player</label>
                                              <input type="text" placeholder="4bracket 7 player" name="form4bracket7player" class="" value="<?php echo $fourbracket7player; ?>">
                                              <label>bracket 7 result</label>
                                              <input type="text" placeholder="4bracket 7 result" name="form4bracket7result" class="" value="<?php echo $fourbracket7result; ?>">

                                              <label>Round 4 - bracket 8 player</label><label>Round 4 - bracket 8 player</label>
                                              <input type="text" placeholder="4bracket 8 player" name="form4bracket8player" class="" value="<?php echo $fourbracket8player; ?>">
                                              <label>bracket 8 result</label>
                                              <input type="text" placeholder="4bracket 8 result" name="form4bracket8result" class="" value="<?php echo $fourbracket8result; ?>">

                                            </div>
                                            <div class="rounone">

                                              <h3>Round 5</h3>
                                              <label>Round 5 - bracket 1 player</label>
                                              <input type="text" placeholder="5bracket 1 player" name="form5bracket1player" class="" value="<?php echo $fivebracket1player; ?>">
                                              <label>bracket 1 result</label>
                                              <input type="text" placeholder="5bracket 1 result" name="form5bracket1result" class="" value="<?php echo $fivebracket1result; ?>">

                                              <label>Round 5 - bracket 2 player</label>
                                              <input type="text" placeholder="5bracket 2 player" name="form5bracket2player" class="" value="<?php echo $fivebracket2player; ?>">
                                              <label>bracket 2 result</label>
                                              <input type="text" placeholder="5bracket 2 result" name="form5bracket2result" class="" value="<?php echo $fivebracket2result; ?>">

                                              <label>Round 5 - bracket 3 player</label>
                                              <input type="text" placeholder="5bracket 3 player" name="form5bracket3player" class="" value="<?php echo $fivebracket3player; ?>">
                                              <label>bracket 3 result</label>
                                              <input type="text" placeholder="5bracket 3 result" name="form5bracket3result" class="" value="<?php echo $fivebracket3result; ?>">

                                              <label>Round 5 - bracket 4 player</label>
                                              <input type="text" placeholder="5bracket 4 player" name="form5bracket4player" class="" value="<?php echo $fivebracket4player; ?>">
                                              <label>bracket 4 result</label>
                                              <input type="text" placeholder="5bracket 4 result" name="form5bracket4result" class="" value="<?php echo $fivebracket4result; ?>">
            
                                            </div>
                                            <div class="rounone">
                                                <h3>Round 6</h3>
                                              <label>Round 6 - bracket 1 player</label>
                                              <input type="text" placeholder="6bracket 1 player" name="form6bracket1player" class="" value="<?php echo $sixbracket1player; ?>">
                                              <label>bracket 1 result</label>
                                              <input type="text" placeholder="6bracket 1 result" name="form6bracket1result" class="" value="<?php echo $sixbracket1result; ?>">

                                              <label>Round 6 - bracket 2 player</label>
                                              <input type="text" placeholder="6bracket 2 player" name="form6bracket2player" class="" value="<?php echo $sixbracket2player; ?>">
                                              <label>bracket 2 result</label>
                                              <input type="text" placeholder="6bracket 2 result" name="form6bracket2result" class="" value="<?php echo $sixbracket2result; ?>">

                                           </div>
                                            <div class="rounone">
                                                <h3>Winner</h3>
                                                <label>Tournament Winner</label>
                                                  <input type="text" placeholder="winner" name="formwinner" class="" value="<?php echo $winner; ?>">
                                                <label>Update Tournament</label>  
                                                  <input type="submit" value="Update">
                                            </dv>  
                                              
                                            
                                        </form>
                                    </div>
                    </div>
                </div>
            </div>
        </div>

            


<?php
}
else{
?>
<div class="client_login"><p class="oops">OOPS! You are not Authorized to Access This Page.</p></div>
<?php
};
get_footer('client');
?>                
    
    
   

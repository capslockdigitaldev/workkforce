<?php 
/*
Template Name: User Template Create Bracket
*/
get_header();

get_sidebar('left');
?>

<div class="col-md-6 col-sm-6 col-12 p-0">
		<div class="main-content support frontline text-left mt-3">
			<h4 class="">Create a Tournament Bracket</h4>
		</div>
	<hr class="thick tour mb-4">
	<div class="bracketc">
			<form method="post" action="http://xrsports.games/user-created-bracket/">
				<div class="boxes">
					<h3 class="mb-0">BASIC INFO</h3>
					<p class="form-username">
						<label for="first-name">Host</label>
						<input class="form-control" name="hostname" type="text" value="<?php global $user_login; // If user is already logged in.
				if ( is_user_logged_in() ) : echo $user_login;  endif; ?>">
					</p>
					<p class="form-username">
						<label for="first-name">Tournament Name*</label>
						<input class="form-control" name="tournamentname" type="text">
					</p>
					<p class="form-username">
						<label for="first-name">Description</label>
						<input class="form-control" name="tournamentdesc" type="textarea" >
					</p>
					
				</div>
				<div class="boxes">
					<h3 class="mb-0">GAME INFO</h3>
					<p class="form-username">
						<label for="first-name">Game*</label>
						<input class="form-control" name="game" type="text">
					</p>
					<p class="form-username">
						<label for="first-name">Type</label>
						<select class="form-control" name="type" >
						  <option value="single">Single Elimination</option>
						  <option value="double">Double Eliminations</option>
						</select>
					</p>
					<p class="form-username">
						<label for="first-name">Players</label>
						<select class="form-control" name="players" >
						    <?php 
                                $x = 1; 
                                while($x <= 64) {
                                    echo '<option value="'.$x.'">'.$x.'</option>';
                                    $x++;
                                } 
                                ?>
						  
						 
						</select>
					</p>
					<p class="form-username">
						<label for="first-name">Date</label>
						<input class="form-control" name="startingdate" type="text">
					</p>
					<p class="form-username">
						<label for="first-name">Time</label>
						<input class="form-control" name="startingtime" type="text">
					</p>
					
					
					<p class="form-submit">
						<input type="submit"  class="btn btn-lg btn-primary" value="Create">
					</p>
				</div>
			</form>

	
  	</div>
</div>

<?php 
get_sidebar('right');
get_footer();
?>


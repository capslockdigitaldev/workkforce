<?php 
/*
Template Name: Create a Public Tournament
*/
get_header();

get_sidebar('left');




?>
        <div class="col-md-6 col-sm-6 col-12 p-0">
        <div class="main-content main-content mt-3">
            <?php 
                if (isset($_POST["host"])) 
                    {
            
                        $host = $_POST['host'];
                        $title = $_POST['title']; 
                        $description = $_POST['description']; 
                        $game = $_POST['game']; 
                        $type = $_POST['type']; 
                        $totalplayer = $_POST['totalplayer'];
                        
                        // Add the content of the form to $post as an array
                        $new_post = array(
                            'post_title'    => $title,
                            'post_content'  => $description,
                            'post_status'   => 'publish',           // Choose: publish, preview, future, draft, etc.
                            'post_type' => 'publicbracket'  //'post',page' or use a custom post type if you want to
                        );
                        
                        //save the new post
                            $post_i = wp_insert_post( $new_post );
                            update_field( 'creator', $host, $post_i );
                            update_field( 'game', $game, $post_i );
                            update_field( 'Type', $type, $post_i );
                            update_field( 'totalplayers', $totalplayer, $post_i );
                            
                            echo 'tournament created';
            
                    } 
                ?>
        <div class="main-content support frontline text-left mt-3">
            <h4 class="">Create a Public Tournament</h4>
        </div>
        <hr class="thick tour mb-2">
            <div class="tabbable" id="tabs-937228">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <div class="player-rank">
                            <form id="new_publictournament" name="create_tournament" method="post" action="" enctype="multipart/form-data">
                                <div class="basic">
                                    <h3>Basic Info</h3>
                                    <!-- Tournament Host -->
                                    <p>
                                      <label for="host">Host
                                      </label>
                                      <br />
                                      <input type="text" id="host" value="" tabindex="1" size="20" name="host" />
                                    </p>
                                    <!-- Tournament Title -->
                                    <p>
                                      <label for="title">Title
                                      </label>
                                      <br />
                                      <input type="text" id="title" value="" tabindex="1" size="20" name="title" />
                                    </p>
                                    <!-- Tournament Description -->
                                    <p>
                                      <label for="description">Description
                                      </label>
                                      <br />
                                      <textarea type="text" id="description" value="" tabindex="1" size="20" name="description"></textarea>
                                    </p>
                                </div>
                                <div class="basic">
                                    <h3>Game Info</h3>
                                    <!-- Tournament Game -->
                                    <p>
                                      <label for="game">Game
                                      </label>
                                      <br />
                                      <input type="text" id="game" value="" tabindex="1" size="20" name="game" />
                                    </p>
                                    <!-- Tournament type -->
                                    <p>
                                      <label for="type">Type
                                      </label>
                                      <br />
                                        <select name="type">
                                          <option value="single">Single Elimination</option>
                                          <option value="double">Double Elimination</option>
                                        </select>
                                    </p>
                                </div>
                                <div class="basic">
                                    <h3>Player & Registerations</h3>
                                    <!-- Tournament Player -->
                                    <p>
                                      <label for="totalplayer">Total Players
                                      </label>
                                      <br />
                                        <select name="totalplayer">
                                            <?php $x = 1; while($x <= 64) { ?>
                                            <option value="<?php echo $x; ?>">
                                              <?php echo $x; ?>
                                            </option>
                                            <?php $x++; }?>
                                        </select>
                                    </p>
                                </div>
                                <input type="submit" value="Create Now" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>

<?php 
get_sidebar('right');
get_footer();
?>


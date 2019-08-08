<?php 
/*
Template Name: Client Template Teams List
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
                    <h2>Teams</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>All Teams</h5>

                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Serial Number</th>
                        <th>Team Avatar</th>
                        <th>Team Name</th>
						<th>Created By</th>
                        <th>Team Members</th>			
                    </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                                    $i = "0"; 
                                    //get the current page
                                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                    //pagination fixes prior to loop
                                    $temp =  $query;
                                    $query = null;
                                    //custom loop using WP_Query
                                    $query = new WP_Query( array( 
                                    'post_status' => 'publish',
                                    'orderby' => 'date',
                                    'order' => 'ASC' 
                                    ) ); 
                                    //set our query's pagination to $paged
                                    $query -> query('post_type=team&posts_per_page=-1'.'&paged='.$paged);
                                    if ( $query->have_posts() ) { 
                                    while ( $query->have_posts() ) : $query->the_post();
                                    $i++;
                                    ?>      
                                            <tr>
                                                <th><?php echo $i; ?></th>
                                                <th><?php if (has_post_thumbnail( $post->ID ) ): ?>
                                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                                <img style="max-width:80px; border-radius:100px;" src="<?php echo $image[0]; ?>"> <?php endif; ?></th>
                                                <th><?php the_title(); ?></th>
                                                <th><?php 
                                                $cname = get_field( "created_by" );
                                                echo $cname;
                                                ?></th>
                                                <th><a href="<?php echo get_permalink(); ?>" target="_blank">View Members</a></th>			
                                            </tr>   
                                                    
                                    <?
                                    endwhile; 
                                    }
                                    else{
                                        ?>
                                            <tr>
                                                <th>-</th>
                                                <th>-</th>
                                                <th>-</th>
                                                <th>-</th>
                                                <th>-</th>
                                            </tr> 
                                        <?php
                                    };
                                     //reset the following that was set above prior to loop
                                    $query = null; $query = $temp; ?>
                        
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Serial Number</th>
                        <th>Team Avatar</th>
                        <th>Team Name</th>
                        <th>Team Description</th>
                        <th>Last active</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

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
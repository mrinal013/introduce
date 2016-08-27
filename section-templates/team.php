<?php

$section = get_the_ID();

$permalink = get_post_permalink($section);
$section_id = basename($permalink);

$general_data = get_post_meta( $section, "common_settings", true );
$team_data  = get_post_meta( $section, "team_settings", true );



$title = $general_data['title'];
$subtitle = $general_data['subtitle'];

if( isset($team_data) ) {
    $team_members = $team_data['team_items'];
}

function addHttp($url) {
    if  ( $ret = parse_url($url) ) {

          if ( !isset($ret["scheme"]) )
           {
           $url = "http://{$url}";
           }
    }
    return $url;
}

?>
<section id="team">
    <div class="container">
        <div class="title border-center"><?php echo $title; ?></div>
        <div class="subtitle"><?php echo $subtitle; ?></div>
        <div class="row">
            <?php foreach( $team_members as $team_member ) : ?>
            <div class="col-sm-3 col-xs-6">
                <div class="panel-body">
                    <img class="img-responsive" src="<?php echo $team_member['team_member_image']; ?>" alt="<?php echo $team_member['team_member_name']; ?>" />
                    <div class="panel-primary-overlay-down">
                        <p class="overlay-title"><?php echo $team_member['team_member_name']; ?></p>
                        <p class="overlay-position"><?php echo $team_member['team_member_position']; ?></p>
                        <div class="team-social">
                        <?php if( !empty($team_member['team_member_facebook']) ) {
                        $url = addHttp($team_member['team_member_facebook']);
                        ?>
                            <a href="<?php echo $url; ?>" class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                            </a>
                        <?php } if( !empty( $team_member['team_member_twitter'] ) ) {
                        $url = addHttp($team_member['team_member_twitter']); ?>
                            <a href="<?php echo $url; ?>" class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                            </a>
                        <?php } if( !empty( $team_member['team_member_google_plus'] ) ) {
                        $url = addHttp($team_member['team_member_google_plus']);
                        ?>
                            <a href="<?php echo $url; ?>" class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
                            </a>
                        <?php } if( !empty( $team_member['team_member_dribble'] ) ) {
                        $url = addHttp($team_member['team_member_dribble']); ?>
                            <a href="<?php echo $url; ?>" class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-dribbble fa-stack-1x fa-inverse"></i>
                            </a>
                        <?php } if( !empty( $team_member['team_member_pinterest'] ) ) {
                        $url = addHttp($team_member['team_member_pinterest']);
                        ?>
                            <a href="<?php echo $url; ?>" class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-pinterest-p fa-stack-1x fa-inverse"></i>
                            </a>
                        <?php } if( !empty( $team_member['team_member_git'] ) ) {
                        $url = addHttp($team_member['team_member_git']);
                             ?>
                            <a href="<?php echo $url; ?>" class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-git fa-stack-1x fa-inverse"></i>
                            </a>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>

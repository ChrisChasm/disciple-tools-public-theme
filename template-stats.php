<?php /* Template Name: Stats */ ?>

<?php get_header(); ?>

<?php


$use_cache = !isset( $_GET['nocache'] );

$stats_data = get_transient( 'dt-stats' );
if ( empty( $stats_data ) || !$use_cache ) {
    $stats_data = [
        'stats' => apply_filters( 'go_stats_endpoint', [] ),
        'time' => time(),
    ];

    set_transient( 'dt-stats', $stats_data, DAY_IN_SECONDS );
}


$stats = [
//    'total_instances' => $stats_data['stats']['all_time_instances'],
//    'online_instances' => $stats_data['stats']['total_instances'],
    'active_instances' => $stats_data['stats']['active_instances'],
    'active_domains' => $stats_data['stats']['active_domains'],
    'theme_contributors' => $stats_data['stats']['theme_contributors'],
    'languages' => $stats_data['stats']['languages'],
]
?>


<div id='primary' class='content-area'>
    <main id='main' class='site-main' role='main'>
        <div class='page-inner-wrapper'>
            <h2>Disciple.Tools Stats</h2>

            <div class='go-cards'>
                <? foreach ( $stats as $stat ) : ?>
                    <div class="go-card">
                        <div class="go-card-container">
                            <h4 class="go-card-title"><? echo esc_html( $stat['label'] ) ?></h4>
                            <p><strong><? echo esc_html( $stat['value'] ) ?></strong></p>
                            <p class="go-stat-desc"><? echo esc_html( $stat['description'] ?? '' ) ?></p>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>

            <br>
            <br>
            <p>Stats as of <?php echo esc_html( round( ( time() - $stats_data['time'] ) / 60 / 60, 1 ) ); ?> hour(s)ago</p>
        </div>

    </main><!-- .site-main -->

</div><!-- .content-area -->
<?php get_footer(); ?>

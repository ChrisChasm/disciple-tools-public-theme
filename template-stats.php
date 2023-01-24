<?php /* Template Name: Stats */ ?>

<?php get_header(); ?>

<?php

$use_cache = !isset( $_GET['nocache'] );

$instances_stats = DT_Usage_Telemetry::get_stats( $use_cache );


//$github_forks = get_transient( 'dt_github_fork' );
//if ( empty( $github_forks ) ){
//    $github_forks = 0;
//    $github_forks = wp_remote_get( 'https://api.github.com/search/repositories?q=user%3Adiscipletools+repo%3Adisciple-tools-theme+disciple-tools-theme' );
//    $github_forks = json_decode( wp_remote_retrieve_body( $github_forks ), true );
//    if ( isset( $github_forks['items'][0]['forks_count'] ) ){
//        $github_forks = $github_forks['items'][0]['forks_count'];
//    }
//    set_transient( 'dt_github_fork', $github_forks, DAY_IN_SECONDS );
//}

$github = get_transient( 'dt_github_stats' );
if ( empty( $github ) || !$use_cache ){
    $github = [ 'contributors' => 0, 'stars' => 0, 'forks' => 0 ];

    $github_contributors = wp_remote_get( 'https://api.github.com/repos/DiscipleTools/disciple-tools-theme/contributors?per_page=100' );
    $github_contributors = json_decode( wp_remote_retrieve_body( $github_contributors ), true );
    $github['contributors'] = count( $github_contributors ) -3;
    set_transient( 'dt_github_stats', $github, DAY_IN_SECONDS );
}


$translations_count = get_transient( 'dt_translations_count' );
if ( empty( $translations_count ) || !$use_cache ){
    $translations_response = wp_remote_get( 'https://translate.disciple.tools/api/components/disciple-tools/disciple-tools-theme/statistics/' );
    $translations = json_decode( wp_remote_retrieve_body( $translations_response ), true );
    $translations_count = $translations['count'] ?? 0;
    set_transient( 'dt_translations_count', $translations_count, DAY_IN_SECONDS );
}




$stats = [
    'active_instances' => [ 'count' => $instances_stats['sites'] ?? 0, 'label' => 'Active Instances' ],
    'active_domains' => [ 'count' => $instances_stats['domains'] ?? 0, 'label' => 'Active Domains' ],
    'theme_contributors' => [ 'count' => $github['contributors'], 'label' => 'Theme Contributors' ],
    'languages' => [ 'count' => $translations_count ?? 0, 'label' => 'Languages' ],
]
?>


<style>
    #main {
        max-width:1000px;
        padding: 20px;
        font-size: .9rem;
        margin:auto;
        min-height: 100vh;
    }
    .cards {
        display: flex;
        flex-wrap: wrap;
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        border-radius: 5px;
        margin: 10px;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .card-container {
        padding: 16px;
    }
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="page-inner-wrapper">
            <h1>Stats</h1>

            <div class="cards">
                <? foreach ($stats as $stat) : ?>
                    <div class="card">
                        <div class="card-container">
                            <h4><b><? echo esc_html( $stat['count'] ) ?></b></h4>
                            <p><? echo esc_html( $stat['label'] ) ?></p>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </main><!-- .site-main -->

</div><!-- .content-area -->
<?php get_footer(); ?>

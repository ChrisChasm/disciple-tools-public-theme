<?php get_header(); ?>

    <div class="page-wrapper padding-top-1" >

        <div class="page-inner-wrapper-hd">


            <!-- Main -->
            <main role="main" id="post-main" >

                <div class="grid-x grid-margin-x grid-padding-x">

                    <div class="cell medium-9 large-8">
                        <div class="grid-x">
                            <div class="cell center padding-1">
                                <h3 class="center">All Plugins</h3>
                            </div>
                        </div>

                        <?php
                            $loop = new WP_Query(
                                [
                                    'post_type' => 'plugins',
                                    'nopaging' => true,
                                    'posts_per_page' => 200,
                                    'orderby' => 'post_title',
                                    'order' => 'ASC'
                                ]
                            );
                         ?>

                        <div id="plugin-list">
                            <div class="grid-x">
                                <div class="cell center">

                                </div>
                            </div>
                            <input type="text" class="search input" placeholder="Filter List" />
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            <button class="sort" data-sort="name">
                                                Name
                                            </button>
                                        </th>
                                        <th>
                                            Description
                                        </th>
                                        <th>
                                            Categories
                                        </th>
                                        <th>
                                            Versions
                                        </th>
                                        <th>

                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="list">

                                <?php

                                if ( $loop->have_posts() ) :
                                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                        <tr>
                                            <td class="name" style="white-space: nowrap; font-weight: bolder; vertical-align: top;">
                                                <a href="<?php echo esc_url( get_permalink() ) ?>"><?php the_title() ?></a>
                                            </td>
                                            <td class="description" style="width:33%;">
                                                <?php echo esc_html( get_post_meta( get_the_ID(), 'description', true ) ) ?>
                                            </td>
                                            <td class="category" style="font-size: .9em; vertical-align: top;">
                                                <?php
                                                $categories = wp_get_object_terms( get_the_ID(), 'plugin_categories' );
                                                if ( ! empty( $categories  ) ) {
                                                    foreach( $categories as $index => $category ) {
                                                        if ( 0 !== $index ){
                                                            echo ', ';
                                                        }
                                                        echo esc_html(  $category->name );
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td class="version" style="vertical-align: top;">
                                                <?php echo esc_html( get_post_meta( get_the_ID(), 'version', true ) ) ?>
                                            </td>
                                            <td>
                                                <a href="<?php the_permalink() ?>" class="button">View</a>
                                            </td>
                                        </tr>
                                    <?php endwhile;
                                endif;
                                wp_reset_postdata();
                                ?>
                                </tbody>
                            </table>
                        </div>


                        <script>
                            jQuery(document).ready(function(){
                                var options = {
                                    valueNames: [ 'name', 'description', 'category', 'version' ]
                                };

                                var hackerList = new List('plugin-list', options);
                            })
                        </script>



                        <?php  ?>

                    </div>

                    <div class="sidebar cell medium-3 large-4 " style="padding-right:20px;">

                        <hr class="show-for-small-only" />


                        <div>
                            <h4>What's a Plugin?</h4>
                            <div class="padding-left-1">
                                <p>
                                    Plugins are ways of extending the Disciple.Tools system to meet the unique needs of your project, ministry, or movement.
                                </p>
                                <p>
                                    The power of our open source model is that you don't have to wait on us! Using our starter plugin templates, complete sections can be
                                    added to Disciple.Tools to track and steward ministry information important to you.
                                </p>
                            </div>
                        </div>
                        <hr>

                        <?php get_template_part( 'parts/content', 'plugin-makelist' ); ?>

                        <hr>

                        <h4>Plugin Categories</h4>
                        <div class="padding-left-1">
                            <a href="/plugins/">All Plugins</a> (<?php echo wp_count_posts( 'plugins' )->publish ?>)
                            <?php wp_list_categories(
                                [
                                    'show_count' => 1,
                                    'taxonomy' => 'plugin_categories',
                                    'title_li' => ''
                                ] ) ?>
                        </div>

                        <hr>

                    </div>

                </div>

            </main> <!-- end #main -->

        </div>

    </div>

<?php get_footer(); ?>

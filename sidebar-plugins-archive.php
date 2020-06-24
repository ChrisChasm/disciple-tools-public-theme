<?php
/**
 * The sidebar containing the main widget area
 */
?>

<hr class="show-for-small-only" />

<div>
    <form>
        <div class="input-group">
            <input type="text" class="input-group-field" placeholder="Search Plugins" />
            <div class="input-group-button">
                <input type="submit" class="button" value="Submit">
            </div>
        </div>

    </form>
</div>
<hr>
<div>
    <h3>What's a Plugin?</h3>
    <p>
        Plugins are ways of extending the Disciple Tools system to meet the unique needs of your project, ministry, or movement.
    </p>
    <p>
        The power of our open source model is that you don't have to wait on us! Using our starter plugin templates, complete sections can be
        added to Disciple Tools to track and steward ministry information important to you.
    </p>

</div>
<hr>

<div class="grid-x">
    <div class="cell padding-1">
        <h3>Plugin Community</h3>
    </div>
    <div class="cell">
        <table>
            <thead>
            <tr>
                <th>
                    Name
                </th>
            </tr>
            </thead>
            <tbody>

            <?php
            $loop = new WP_Query(
                [  'post_type' => 'plugins',
                    'nopaging' => true,
                    'orderby' => 'rand',
                    'tax_query' => [
                        [
                            'taxonomy' => 'plugin_categories',
                            'field'    => 'slug',
                            'terms'    => 'featured',
                            'operator' => 'NOT IN'
                        ],
                    ]
                ]
            );
            if ( $loop->have_posts() ) :
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <tr>
                        <td>
                            <a href="<?php echo get_permalink() ?>"><?php the_title() ?></a>
                        </td>
                    </tr>
                <?php endwhile;
            endif;
            wp_reset_postdata();
            ?>
            </tbody>
        </table>
    </div>
</div>

<?php /* Template Name: Invoice */ ?>

<?php //get_header(); ?>


<style>
    #main {
        max-width:1000px;
        padding: 20px;
        font-size: .9rem;
    }
    #main h1 {
        color: #3f729b;
    }
    table {
        border-collapse: collapse;

    }
    table th {
        background-color: #3f729b;
        color: white;
    }
    table th, td {
        text-align: left;
        padding: 6px 10px;
        border: 1px solid black;
    }
    table tbody td {
        color: #727272;
        font-size: .9rem;
    }
    .address-color {
        color: #727272;
    }
    #main {
        color: #727272;
    }
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="page-inner-wrapper">
            <h1>Invoice</h1>
            <?php
                $get = dt_recursive_sanitize_array( $_GET );
                $amount = $get['amount'] ?? 0;
                $organization_name = $get['org'] ?? '';
                $attention_name = $get['attention'] ?? '';
                $address = $get['address'] ?? '';
                $city = $get['city'] ?? '';
                $state = $get['state'] ?? '';
                $zip = $get['zip'] ?? '';
                $date = $get['date'] ?? '';
            ?>

            <div style="display: flex; justify-content: space-between">
                <div class='address-color'>
                    <?php if ( !empty( $attention_name ) ) : ?>
                        <?php echo esc_html( $attention_name ); ?>
                        <br>
                    <?php endif; ?>
                    <?php echo esc_html( $organization_name ); ?>
                    <br>
                    <?php echo esc_html( $address ); ?>
                    <br>
                    <?php echo esc_html( $city ); ?>, <?php echo esc_html( $state ); ?> <?php echo esc_html( $zip ); ?>
                </div>
                <div>
                    <div style="text-align: right">
                        <div style="text-align: left">
                            <img style="height:50px" src="<?php echo esc_html( get_template_directory_uri() . '/assets/images/dt-logo-medium.png' ) ?>"/>
                            <p>
                                Disciple.Tools c/o Gospel Ambition
                                <br>
                                PO Box 325
                                <br>
                                Mooreland OK 73852
                            </p>

                        </div>
                    </div>
                </div>

            </div>
            <p>
                <strong>Invoice Date</strong>: <?php echo esc_html( dt_format_date( $date, 'F. d, Y' ) ); ?>
            </p>

            <table style="width: 100%">
                <thead>
                    <tr>
                        <th>Item Description</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Disciple.Tools Donation</td>
                        <td>$<?php echo esc_html( number_format( $amount ) ) ?></td>
                    </tr>
                    <tr style="font-weight: bold">
                        <td>Total</td>
                        <td>$<?php echo esc_html( number_format( $amount ) ) ?></td>
                    </tr>
                </tbody>
            </table>

            <p style="padding: 10px; background-color: #90b4d066; border-radius: 2px; color:#3f729b">
                <strong>Note:</strong> This invoice is presented as a tool to assist you with making a donation to help with the development and support of Disciple.Tools. It does not represent an amount owed or a bill.
            </p>


        </div>
    </main><!-- .site-main -->

</div><!-- .content-area -->
<?php //get_footer(); ?>

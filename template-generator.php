<?php /* Template Name: Invoice generator */ ?>

<?php get_header(); ?>

<style>
    #dt_generate_form {
        max-width: 400px;
    }
    #dt_generate_form .input-group-addon {
        padding: 7px; min-width: 50px; text-align: center;
        background-color: #eee; margin-bottom: 16px;
        border: 1px solid rgb(202, 202, 202);
        height: 39px;
    }
    .page-inner-wrapper {
        max-width: 1000px;
    }

</style>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="page-inner-wrapper" style="padding:20px">
            <h1>Invoice Generator</h1>
            <p>
                Input the values below to help generate an invoice that can be used to donate to Disciple.Tools.
            </p>
            <p style='padding: 10px; background-color: #90b4d066; border-radius: 2px; color:#3f729b'>
                <strong>Note:</strong> The values you enter in the form below are not saved or viewed by Disciple.Tools. This tool is for your own use to generate an invoice for a donation.
            </p>

            <form id="dt_generate_form" action="generated-invoice">

                <label>
                    Invoice Date
                    <input type="date" name="date" required value="<?php echo esc_html( gmdate( 'Y-m-d' ) ); ?>">
                </label>
                <label>
                    Organization Name
                    <input type="text" name="org" required>
                </label>
                <label>
                    Attention Name
                    <input type="text" name="attention">
                </label>
                <label>
                    Donation Amount
                    <div class="input-group" style="display: flex">
                        <span class="input-group-addon">$</span>
                        <input type="number" name="amount" required>
                    </div>
                </label>
                <label>
                    Street Address
                    <input type="text" name="address" required>
                </label>
                <label>
                    City
                    <input type="text" name="city" required>
                </label>
                <label>
                    State
                    <input type="text" name="state" required>
                </label>
                <label>
                    Postal Code
                    <input type="text" name="zip" required>
                </label>
                <button type="submit" class="button" style="color: white !important; background-color: #3f729b !important;">Generate Invoice</button>
            </form>


        </div>
    </main><!-- .site-main -->
    <?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->
<?php get_footer(); ?>

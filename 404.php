<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package medical
 */

get_header();
?>

    <!--Start Content-->
    <div class="content">



        <div class="contact-us">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">

                        <div class="page-error">
                            <h1>Nu-am gasit nimic....</h1>
                            <h5>Treceti pe pagina <a href="<?php echo home_url(); ?>">Principala</a></h5>
                        </div>

                    </div>
                </div>

            </div>


        </div>


    </div>
    <!--End Content-->

<?php
get_footer();

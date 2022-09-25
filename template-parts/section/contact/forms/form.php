<?php
/**
 * Name file: form
 * Description: show form on contact section
 * Important : use hooks get_locale()
 *
 * @package WordPress
 * @subpackage MyWork
 * @since 1.0.0
 */
?>


<?php if(get_locale() === 'fr_FR') : // Partie FR =============== ?>
        <?php
            echo
            FrmFormsController::get_form_shortcode(
                array(
                    'id' => 2,
                    'title' => true,
                    'description' => true
                )
            );
        ?>
<?php elseif(get_locale() === 'en_GB') : // Partie EN =========== ?>
    <?php
        echo
        FrmFormsController::get_form_shortcode(
            array(
                'id' => 3,
                'title' => true,
                'description' => true
            )
        );
    ?>
<?php elseif(get_locale() === 'it_IT') : // Partie IT =========== ?>
    <?php
        echo
        FrmFormsController::get_form_shortcode(
            array(
                'id' => 4,
                'title' => true,
                'description' => true
            )
        );
    ?>
<?php endif; ?>
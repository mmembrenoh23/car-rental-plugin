<?php
/**
 * 
 */

class Car_Rental_Admin {
    
    /**
     * Constructor
     */
    private function __construct() {
       
    }

    public static function init() {
        //load related files for admin or public php
        //load js
        //load css
    }

    private static function loadCSS() {
        //wp_enqueue_style( 'mystyle', plugins_url( 'mystyle.css', __FILE__ ) );
        
    }

    private static function loadJS() {
        //wp_enqueue_script( 'myscript', plugins_url( 'myscript.js', __FILE__ ) );
    }

    public static function activate() {
        add_action( 'admin_menu', array( 'Car_Rental_Admin', 'add_admin_menu' ) );
        // add_action( 'admin_init', array( 'Car_Rental_Admin', 'settings_init' ) );
        //add table creations
    }

    public static function deactivate() {
        remove_action( 'admin_menu', array( 'Car_Rental_Admin', 'add_admin_menu' ) );
        // remove_action( 'admin_init', array( 'Car_Rental_Admin', 'settings_init' ) );
        //remove table creations

    }

    /**
     * Add options page
     * @return void
     */
    public static function add_admin_menu() {
        add_options_page(
            'Car Rental',
            'Car Rental',
            'manage_options',
            'car-rental',
            array( 'Car_Rental_Admin', 'plugin_settings_page' )
        );
    }

    public function plugin_settings_page() {
        ?>
        <div class="wrap">
            <h2>Car Rental Settings</h2>
            <form method="post" action="options.php">
                <?php
                    settings_fields( 'car-rental-settings-group' );
                    do_settings_sections( 'car-rental-settings-group' );
                    submit_button();
                ?>
            </form>
        </div>
        <?php
    }
    

    /**
     * Init plugin options to white list our options
     * @return void
     */
    public function settings_init() {
        register_setting( 'car-rental', 'car_rental_settings' );

        add_settings_section(
            'car_rental_settings',
            '',
            array( 'Car_Rental_Admin', 'settings_section_callback' ),
            'car-rental'
        );

        add_settings_field(
            'car_rental_api_key',
            'API Key',
            array( 'Car_Rental_Admin', 'car_rental_api_key_render' ),
            'car-rental',
            'car_rental_settings'
        );

        add_settings_field(
            'car_rental_api_secret',
            'API Secret',
            array( 'Car_Rental_Admin', 'car_rental_api_secret_render' ),
            'car-rental',
            'car_rental_settings'
        );

        add_settings_field(
            'car_rental_api_url',
            'API URL',
            array( 'Car_Rental_Admin', 'car_rental_api_url_render' ),
            'car-rental',
            'car_rental_settings'
        );

        add_settings_field(
            'car_rental_api_version',
            'API Version',
            array( 'Car_Rental_Admin', 'car_rental_api_version_render' ),
            'car-rental',
            'car_rental_settings'
        );

        add_settings_field(
            'car_rental_api_language',
            'API Language',
            array( 'Car_Rental_Admin', 'car_rental_api_language_render' ),
            'car-rental',
            'car_rental_settings'
        );

        add_settings_field(
            'car_rental_api_currency',
            'API Currency',
            array( 'Car_Rental_Admin', 'car_rental_api_currency_render' ),
            'car-rental',
            'car_rental_settings'
        );

        add_settings_field(
            'car_rental_api_currency_symbol',
            'API Currency Symbol',
            array( 'Car_Rental_Admin', 'car_rental_api_currency_symbol_render' ),
            'car-rental',
            'car_rental_settings'
        );

        add_settings_field(
            'car_rental_api_currency_format',
            'API Currency Format',
            array( 'Car_Rental_Admin', 'car_rental_api_currency_format_render' ),
            'car-rental',
            'car_rental_settings'
        );

        add_settings_field(
            'car_rental_api_currency_decimal_point',
            'API Currency Decimal Point',
            array( 'Car_Rental_Admin', 'car_rental_api_currency_decimal_point_render' ),
            'car-rental',
            'car_rental_settings'
        );

        add_settings_field(
            'car_rental_api_currency_thousand_separator',
            'API Currency Thousand Separator',
            array( 'Car_Rental_Admin', 'car_rental_api_currency_thousand_separator_render' ),
            'car-rental',
            'car_rental_settings'
        );


        add_settings_field(
            'car_rental_api_currency_decimal_places',
            'API Currency Decimal Places',
            array( 'Car_Rental_Admin', 'car_rental_api_currency_decimal_places_render' ),
            'car-rental',
            'car_rental_settings'
        );

        add_settings_field(
            'car_rental_api_currency_symbol_position',
            'API Currency Symbol Position',
            array( 'Car_Rental_Admin', 'car_rental_api_currency_symbol_position_render' ),
            'car-rental',
            'car_rental_settings'
        );

        add_settings_field(
            'car_rental_api_currency_symbol_space',
            'API Currency Symbol Space',
            array( 'Car_Rental_Admin', 'car_rental_api_currency_symbol_space_render' ),
            'car-rental',
            'car_rental_settings'
        );

        add_settings_field(
            'car_rental_api_currency_symbol_space_after',
            'API Currency Symbol Space After',
            array( 'Car_Rental_Admin', 'car_rental_api_currency_symbol_space_after_render' ),
            'car-rental',
            'car_rental_settings'
        );

        add_settings_field(
            'car_rental_api_currency_symbol_space_before',
            'API Currency Symbol Space Before',
            array( 'Car_Rental_Admin', 'car_rental_api_currency_symbol_space_before_render' ),
            'car-rental',
            'car_rental_settings'
        );

        add_settings_field(
            'car_rental_api_currency_symbol_space_after_decimal',
            'API Currency Symbol Space After Decimal',
            array( 'Car_Rental_Admin', 'car_rental_api_currency_symbol_space_after_decimal_render' ),
            'car-rental',
            'car_rental_settings'

        );

        add_settings_field(
            'car_rental_api_currency_symbol_space_before_decimal',
            'API Currency Symbol Space Before Decimal',
            array( 'Car_Rental_Admin', 'car_rental_api_currency_symbol_space_before_decimal_render' ),
            'car-rental',
            'car_rental_settings'
        );

        add_settings_field(
            'car_rental_api_currency_symbol_space_after_thousand',
            'API Currency Symbol Space After Thousand',
            array( 'Car_Rental_Admin', 'car_rental_api_currency_symbol_space_after_thousand_render' ),
            'car-rental',
            'car_rental_settings'
        );

        add_settings_field(
            'car_rental_api_currency_symbol_space_before_thousand',
            'API Currency Symbol Space Before Thousand',
            array( 'Car_Rental_Admin', 'car_rental_api_currency_symbol_space_before_thousand_render' ),
            'car-rental',
            'car_rental_settings'
        );

        add_settings_field(
            'car_rental_api_currency_symbol_space_after_decimal_thousand',
            'API Currency Symbol Space After Decimal Thousand',
            array( 'Car_Rental_Admin', 'car_rental_api_currency_symbol_space_after_decimal_thousand_render' ),
            'car-rental',
            'car_rental_settings'
        );

        add_settings_field(
            'car_rental_api_currency_symbol_space_before_decimal_thousand',
            'API Currency Symbol Space Before Decimal Thousand',
            array( 'Car_Rental_Admin', 'car_rental_api_currency_symbol_space_before_decimal_thousand_render' ),
            'car-rental',
            'car_rental_settings'

        );
    }

    public function car_rental_api_url_render() {
        $options = get_option( 'car_rental_settings' );
        ?>
        <input type='text' name='car_rental_settings[car_rental_api_url]' value='<?php echo $options['car_rental_api_url']; ?>' />
        <?php
    }
}
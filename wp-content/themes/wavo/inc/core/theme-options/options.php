<?php

    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if (! class_exists('Redux' )) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $wavo_pre = "wavo";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $wavo_theme = wp_get_theme(); // For use with some settings. Not necessary.

    $wavo_options_args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name' => $wavo_pre,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name' => $wavo_theme->get('Name' ),
        // Name that appears at the top of your panel
        'display_version' => $wavo_theme->get('Version' ),
        // Version that appears at the top of your panel
        'menu_type' => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu' => false,
        // Show the sections below the admin menu item or not
        'menu_title' => esc_html__( 'Theme Options', 'wavo' ),
        'page_title' => esc_html__( 'Theme Options', 'wavo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key' => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography' => false,
        // Use a asynchronous font on the front end or font string
        'admin_bar' => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon' => 'dashicons-admin-generic',
        // Choose an icon for the admin bar menu
        'admin_bar_priority' => 50,
        // Choose an priority for the admin bar menu
        'global_variable' => 'wavo',
        // Set a different name for your global variable other than the wavo_pre
        'dev_mode' => false,
        // Show the time the page took to load, etc
        'update_notice' => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer' => true,
        // Enable basic customizer support

        // OPTIONAL -> Give you extra features
        'page_priority' => 99,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent' => apply_filters( 'ninetheme_parent_slug', 'themes.php' ),
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions' => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon' => '',
        // Specify a custom URL to an icon
        'last_tab' => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon' => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug' => '',
        // Page slug used to denote the panel, will be based off page title then menu title then wavo_pre if not provided
        'save_defaults' => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show' => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark' => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export' => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time' => 60 * MINUTE_IN_SECONDS,
        'output' => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag' => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database' => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn' => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints' => array(
            'icon' => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'dark',
                'shadow' => true,
                'rounded' => false,
                'style' => '',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'effect' => 'slide',
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'effect' => 'slide',
                    'duration' => '500',
                    'event' => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $wavo_options_args['admin_bar_links'][] = array(
        'id' => 'ninetheme-wavo-docs',
        'href' => 'http://demo-ninetheme.com/wavo/doc.html',
        'title' => esc_html__( 'wavo Documentation', 'wavo' ),
    );
    $wavo_options_args['admin_bar_links'][] = array(
        'id' => 'ninetheme-support',
        'href' => 'https://9theme.ticksy.com/',
        'title' => esc_html__( 'Support', 'wavo' ),
    );
    $wavo_options_args['admin_bar_links'][] = array(
        'id' => 'ninetheme-portfolio',
        'href' => 'https://themeforest.net/user/ninetheme/portfolio',
        'title' => esc_html__( 'NineTheme Portfolio', 'wavo' ),
    );

    // Add content after the form.
    $wavo_options_args['footer_text'] = esc_html__( 'If you need help please read docs and open a ticket on our support center.', 'wavo' );

    Redux::setArgs($wavo_pre, $wavo_options_args);

    /* END ARGUMENTS */

    /* START SECTIONS */


    /*************************************************
    ## MAIN SETTING SECTION
    *************************************************/
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Main Setting', 'wavo' ),
        'id' => 'basic',
        'desc' => esc_html__( 'These are main settings for general theme!', 'wavo' ),
        'customizer_width' => '400px',
        'icon' => 'el el-cog',
    ));
    //BREADCRUMBS SETTINGS SUBSECTION
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Theme Color', 'wavo' ),
        'id' => 'themebreadcrumbssubsection',
        'icon' => 'el el-brush',
        'subsection' => true,
        'customizer_width' => '450px',
        'fields' => array(
            array(
                'title' => esc_html__( 'Theme Skin Type', 'wavo' ),
                'id' => 'theme_skin',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'dark' => esc_html__( 'Dark', 'wavo' ),
                    'light' => esc_html__( 'Light', 'wavo' ),
                ),
                'default' => 'dark',
            ),
            array(
                'title' => esc_html__( 'Theme Main Color', 'wavo' ),
                'subtitle' => esc_html__( 'Add theme main color.', 'wavo' ),
                'id' => 'theme_main_clr',
                'type' => 'color',
                'default' => ''
            ),
            array(
                'title' => esc_html__( 'Theme Dark Button Main Color', 'wavo' ),
                'subtitle' => esc_html__( 'Add theme main color for the dark style button.', 'wavo' ),
                'id' => 'theme_main_dark_btnclr',
                'type' => 'color',
                'default' => ''
            ),
            array(
                'title' => esc_html__( 'Theme Light Button Main Color', 'wavo' ),
                'subtitle' => esc_html__( 'Add theme main color for the light style button.', 'wavo' ),
                'id' => 'theme_main_light_btnclr',
                'type' => 'color',
                'default' => ''
            ),
            array(
                'title' => esc_html__( 'Mobile Web Theme Color', 'wavo' ),
                'subtitle' => esc_html__( 'Add theme main color for the mobile web app status bar style.', 'wavo' ),
                'id' => 'theme_mobile_app_clr2',
                'type' => 'color',
                'default' => ''
            ),
            array(
                'title' => esc_html__( 'Apple and MS Mobile Web App Status Bar Color', 'wavo' ),
                'subtitle' => esc_html__( 'Add theme main color for the apple mobile web app status bar style.', 'wavo' ),
                'id' => 'theme_mobile_app_clr',
                'type' => 'color',
                'default' => ''
            ),
        )
    ));
    //BREADCRUMBS SETTINGS SUBSECTION
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Breadcrumbs', 'wavo' ),
        'id' => 'thememaincolorsubsection',
        'icon' => 'el el-brush',
        'subsection' => true,
        'customizer_width' => '450px',
        'fields' => array(
            array(
                'title' => esc_html__( 'Breadcrumbs', 'wavo' ),
                'subtitle' => esc_html__( 'If enabled, adds breadcrumbs navigation to bottom of page title.', 'wavo' ),
                'id' => 'breadcrumbs_visibility',
                'type' => 'switch',
                'default' => true
            ),
            array(
                'title' => esc_html__( 'Breadcrumbs Typography', 'wavo' ),
                'id' => 'breadcrumbs_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '.nt-breadcrumbs, .nt-breadcrumbs .nt-breadcrumbs-list' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'breadcrumbs_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Breadcrumbs Current Color', 'wavo' ),
                'id' => 'breadcrumbs_current',
                'type' => 'color',
                'default' => '#fff',
                'output' => array( '.nt-breadcrumbs .nt-breadcrumbs-list li.active' ),
                'required' => array( 'breadcrumbs_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Breadcrumbs Icon Color', 'wavo' ),
                'id' => 'breadcrumbs_icon',
                'type' => 'color',
                'default' => '#fff',
                'output' => array( '.nt-breadcrumbs .nt-breadcrumbs-list i' ),
                'required' => array( 'breadcrumbs_visibility', '=', '1' )
            )
        )
    ));
    //PRELOADER SETTINGS SUBSECTION
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Preloader', 'wavo' ),
        'id' => 'themepreloadersubsection',
        'icon' => 'el el-brush',
        'subsection' => true,
        'fields' => array(
            array(
                'title' => esc_html__( 'Preloader', 'wavo' ),
                'subtitle' => esc_html__( 'If enabled, adds preloader.', 'wavo' ),
                'id' => 'preloader_visibility',
                'type' => 'switch',
                'default' => true
            ),
            array(
                'title' => esc_html__( 'Mobile Device Preloader', 'wavo' ),
                'id' => 'preloader_mobile_visibility',
                'type' => 'switch',
                'default' => true,
                'required' => array( 'preloader_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Preloader Type', 'wavo' ),
                'subtitle' => esc_html__( 'Select your preloader type.', 'wavo' ),
                'id' => 'pre_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'default' => esc_html__( 'Default', 'wavo' ),
                    '01' => esc_html__( 'Type 1', 'wavo' ),
                    '02' => esc_html__( 'Type 2', 'wavo' ),
                    '03' => esc_html__( 'Type 3', 'wavo' ),
                    '04' => esc_html__( 'Type 4', 'wavo' ),
                    '05' => esc_html__( 'Type 5', 'wavo' ),
                    '06' => esc_html__( 'Type 6', 'wavo' ),
                    '07' => esc_html__( 'Type 7', 'wavo' ),
                    '08' => esc_html__( 'Type 8', 'wavo' ),
                    '09' => esc_html__( 'Type 9', 'wavo' ),
                    '10' => esc_html__( 'Type 10', 'wavo' ),
                    '11' => esc_html__( 'Type 11', 'wavo' ),
                    '12' => esc_html__( 'Type 12', 'wavo' ),
                    'custom' => esc_html__( 'Custom', 'wavo' ),
                ),
                'default' => 'default',
            ),
            array(
                'title' => esc_html__( 'Custom Preloader Content', 'wavo' ),
                'subtitle' => esc_html__( 'Add your custom HTML content here.', 'wavo' ),
                'id' => 'preloader_custom',
                'type' => 'editor',
                'default' => '',
                'required' => array(
                    array( 'preloader_visibility', '=', '1' ),
                    array( 'pre_type', '=', 'custom' )
                )
            ),
            array(
                'title' => esc_html__( 'Preloader Text', 'wavo' ),
                'subtitle' => esc_html__( 'Add preloader text here.', 'wavo' ),
                'id' => 'preloader_text',
                'type' => 'text',
                'default' => 'Loading',
                'required' => array(
                    array( 'preloader_visibility', '=', '1' ),
                    array( 'pre_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Preloader Text Color', 'wavo' ),
                'subtitle' => esc_html__( 'Add preloader text color.', 'wavo' ),
                'id' => 'pre_text_clr',
                'type' => 'color',
                'default' => '#000',
                'output' => array( '.loading-text' ),
                'required' => array(
                    array( 'preloader_visibility', '=', '1' ),
                    array( 'pre_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Custom Preloader image', 'wavo' ),
                'id' => 'pre_img',
                'type' => 'media',
                'url' => true,
                'customizer' => true,
                'required' => array( 'preloader_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Preloader Background Color', 'wavo' ),
                'subtitle' => esc_html__( 'Add preloader background color.', 'wavo' ),
                'id' => 'pre_bg',
                'type' => 'color',
                'default' => '',
                'required' => array(
                    array( 'preloader_visibility', '=', '1' )
                ),
            ),
            array(
                'title' => esc_html__( 'Preloader Progress Color', 'wavo' ),
                'subtitle' => esc_html__( 'Add preloader progress color.', 'wavo' ),
                'id' => 'pre_progress_color',
                'type' => 'color',
                'default' => '',
                'required' => array( 'preloader_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Preloader Spin / Progressbar Color', 'wavo' ),
                'subtitle' => esc_html__( 'Add preloader spin / progress color.', 'wavo' ),
                'id' => 'pre_spin',
                'type' => 'color',
                'default' => '',
                'required' => array( 'preloader_visibility', '=', '1' )
            )
    )));
    //PRELOADER SETTINGS SUBSECTION
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Cursor', 'wavo' ),
        'id' => 'themecursorsubsection',
        'icon' => 'el el-brush',
        'subsection' => true,
        'fields' => array(
            array(
                'title' => esc_html__( 'Theme Cursor Type', 'wavo' ),
                'subtitle' => esc_html__( 'Select your cursor type.', 'wavo' ),
                'id' => 'theme_cursor',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'none' => esc_html__( 'None', 'wavo' ),
                    '1' => esc_html__( 'Type 1', 'wavo' ),
                    '2' => esc_html__( 'Type 2', 'wavo' ),
                    '3' => esc_html__( 'Type 3', 'wavo' )
                ),
                'default' => '1'
            ),
            //
            array(
                'title' => esc_html__( 'Cursor Color', 'wavo' ),
                'id' => 'cursor1_clr',
                'type' => 'color_rgba',
                'mode' => 'background-color',
                'options'=> array(
                    'show_input' => true,
                    'show_initial' => true,
                    'show_alpha' => true,
                    'show_palette' => true,
                    'show_palette_only' => false,
                    'show_selection_palette' => true,
                    'max_palette_size' => 10,
                    'allow_empty' => true,
                    'clickout_fires_change' => false,
                    'choose_text' => 'Choose',
                    'cancel_text' => 'Cancel',
                    'show_buttons' => true,
                    'use_extended_classes' => true,
                    'palette' => null,
                ),
                'output' => array( '.cursor1::after, .cursor-inner, .cursor-inner.cursor-hover' ),
                'required' => array(
                    array( 'theme_cursor', '!=', 'none' ),
                    array( 'theme_cursor', '!=', '2' ),
                )
            ),
            array(
                'title' => esc_html__( 'Custom Cursor image', 'wavo' ),
                'id' => 'cursor_img',
                'type' => 'media',
                'url' => true,
                'customizer' => true,
                'required' => array(
                    array( 'theme_cursor', '!=', 'none' ),
                    array( 'theme_cursor', '!=', '3' ),
                )
            ),
            array(
                'title' => esc_html__( 'Custom Cursor Image Size', 'wavo' ),
                'subtitle' => esc_html__( 'Select your cursor type.', 'wavo' ),
                'id' => 'cursor_img_size',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'cover' => esc_html__( 'Cover', 'wavo' ),
                    'contain' => esc_html__( 'Contain', 'wavo' ),
                ),
                'default' => 'contain',
                'required' => array(
                    array( 'theme_cursor', '!=', 'none' ),
                    array( 'theme_cursor', '!=', '3' ),
                    array( 'cursor_img', '!=', '' ),
                )
            ),
            array(
                'title' => esc_html__( 'Custom Cursor Image Radius', 'wavo' ),
                'subtitle' => esc_html__( 'Select your cursor type.', 'wavo' ),
                'id' => 'cursor_img_radius',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    '100%' => esc_html__( 'Circle', 'wavo' ),
                    '0' => esc_html__( 'Square', 'wavo' ),
                ),
                'default' => '0',
                'required' => array(
                    array( 'theme_cursor', '!=', 'none' ),
                    array( 'theme_cursor', '!=', '3' ),
                    array( 'cursor_img', '!=', '' ),
                )
            ),
            array(
                'title' => esc_html__( 'Cursor Width', 'wavo' ),
                'id' => 'cursor1_width',
                'type' => 'dimensions',
                'output' => array('.cursor1'),
                'units' => array('px'),
                'all' => false,
                'width' => true,
                'height' => false,
                'default' => array(
                    'width' => '15',
                    'units' => 'px'
                ),
                'required' => array( 'theme_cursor', '=', '1' )
            ),
            //
            array(
                'title' => esc_html__( 'Cursor Border Color', 'wavo' ),
                'id' => 'cursor3_brdclr',
                'type' => 'color',
                'mode' => 'border-color',
                'default' => '#24d5b4',
                'output' => array( '.cursor-outer,.cursor2::after' ),
                'required' => array(
                    array( 'theme_cursor', '!=', 'none' ),
                    array( 'theme_cursor', '!=', '1' ),
                )
            ),
            array(
                'title' => esc_html__( 'Hide Cursor Arrow', 'wavo' ),
                'desc' => esc_html__( 'Hide or show arrow', 'wavo' ),
                'id' => 'arrow_visibility',
                'type' => 'switch',
                'required' => array( 'theme_cursor', '=', '1' ),
                'default' => true
            ),
            array(
                'title' => esc_html__( 'Cursor Border Width', 'wavo' ),
                'id' => 'cursor3_brd_width',
                'type' => 'dimensions',
                'output' => array('.cursor-outer'),
                'units' => array('px'),
                'all' => false,
                'height' => false,
                'mode' => 'border-width',
                'default' => array(
                    'width' => '1',
                    'units' => 'px'
                ),
                'required' => array( 'theme_cursor', '=', '3' )
            ),
            array(
                'title' => esc_html__( 'Custom Cursor on Mobile', 'wavo' ),
                'id' => 'cursor_on_mobile_visibility',
                'type' => 'switch',
                'default' => true,
                'required' => array( 'theme_cursor', '!=', 'none' )
            )
        )
    ));
    //MAIN THEME TYPOGRAPHY SUBSECTION
    Redux::setSection($wavo_pre, array(
    'title' => esc_html__( 'Typograhy General', 'wavo' ),
    'id' => 'themetypographysection',
    'icon' => 'el el-fontsize',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__( 'Use Elementor Style Kit', 'wavo' ),
            'subtitle' => esc_html__( 'This option applies styles created with Elementor to pages not created with Elementor.', 'wavo' ),
            'id' => 'use_elementor_style_kit',
            'type' => 'switch',
            'default' => false
        ),
        array(
            'title' => esc_html__( 'H1 Headings', 'wavo' ),
            'subtitle' => esc_html__("Choose Size and Style for h1", 'wavo' ),
            'id' => 'font_h1',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'h1' ),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => ''
            ),
            'required' => array( 'use_elementor_style_kit', '!=', '1' )
        ),
        array(
            'title' => esc_html__( 'H2 Headings', 'wavo' ),
            'subtitle' => esc_html__("Choose Size and Style for h2", 'wavo' ),
            'id' => 'font_h2',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'h2' ),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => ''
            ),
            'required' => array( 'use_elementor_style_kit', '!=', '1' )
        ),
        array(
            'title' => esc_html__( 'H3 Headings', 'wavo' ),
            'subtitle' => esc_html__("Choose Size and Style for h3", 'wavo' ),
            'id' => 'font_h3',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'h3' ),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => ''
            ),
            'required' => array( 'use_elementor_style_kit', '!=', '1' )
        ),
        array(
            'title' => esc_html__( 'H4 Headings', 'wavo' ),
            'subtitle' => esc_html__("Choose Size and Style for h4", 'wavo' ),
            'id' => 'font_h4',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'h4' ),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => ''
            ),
            'required' => array( 'use_elementor_style_kit', '!=', '1' )
        ),
        array(
            'title' => esc_html__( 'H5 Headings', 'wavo' ),
            'subtitle' => esc_html__("Choose Size and Style for h5", 'wavo' ),
            'id' => 'font_h5',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'h5' ),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => ''
            ),
            'required' => array( 'use_elementor_style_kit', '!=', '1' )
        ),
        array(
            'title' => esc_html__( 'H6 Headings', 'wavo' ),
            'subtitle' => esc_html__("Choose Size and Style for h6", 'wavo' ),
            'id' => 'font_h6',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'h6' ),
            'units' => 'px',
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => ''
            ),
            'required' => array( 'use_elementor_style_kit', '!=', '1' )
        ),
        array(
            'id' =>'info_body_font',
            'type' => 'info',
            'customizer' => false,
            'desc' => esc_html__( 'Body Font Options', 'wavo' )
        ),
        array(
            'title' => esc_html__( 'Body', 'wavo' ),
            'subtitle' => esc_html__("Choose Size and Style for Body", 'wavo' ),
            'id' => 'font_body',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'body' ),
            'default' => array(
                'font-family' =>'',
                'color' =>"",
                'font-style' =>'',
                'font-size' =>'',
                'line-height' =>''
            ),
            'required' => array( 'use_elementor_style_kit', '!=', '1' )
        ),
        array(
            'title' => esc_html__( 'Paragraph', 'wavo' ),
            'subtitle' => esc_html__("Choose Size and Style for paragraph", 'wavo' ),
            'id' => 'font_p',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'p, body.has-paragraph-style p' ),
            'default' => array(
                'font-family' =>'',
                'color' =>"",
                'font-style' =>'',
                'font-size' =>'',
                'line-height' =>''
            ),
            'required' => array( 'use_elementor_style_kit', '!=', '1' )
        ),
        array(
            'title' => esc_html__( 'Make paragraph settings priority', 'wavo' ),
            'subtitle' => esc_html__( 'Use this option if you want these settings to take priority for the paragraph', 'wavo' ),
            'id' => 'font_p_important',
            'type' => 'switch',
            'default' => false,
            'required' => array( 'use_elementor_style_kit', '!=', '1' )
        ),
    )));
    //BACKTOTOP BUTTON SUBSECTION
    Redux::setSection($wavo_pre, array(
    'title' => esc_html__( 'Back-to-top Button', 'wavo' ),
    'id' => 'backtotop',
    'icon' => 'el el-brush',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__( 'Back-to-top', 'wavo' ),
            'subtitle' => esc_html__( 'Switch On-off', 'wavo' ),
            'desc' => esc_html__( 'If enabled, adds back to top.', 'wavo' ),
            'id' => 'backtotop_visibility',
            'type' => 'switch',
            'default' => true
        ),
        array(
            'title' => esc_html__( 'Bottom Offset', 'wavo' ),
            'subtitle' => esc_html__( 'Set custom bottom offset for the back-to-top button', 'wavo' ),
            'id' => 'backtotop_top_offset',
            'type' => 'spacing',
            'output' => array('.progress-wrap'),
            'mode' => 'absolute',
            'units' => array('px'),
            'all' => false,
            'top' => false,
            'right' => true,
            'bottom' => true,
            'left' => false,
            'default' => array(
                'right' => '30',
                'bottom' => '30',
                'units' => 'px'
            ),
            'required' => array( 'backtotop_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Back-to-top Progress Wrap Color', 'wavo' ),
            'id' => 'backtotop_bg1',
            'type' => 'color_rgba',
            'default'   => array(
                'color' => '#828282',
                'alpha' => 0.2
            ),
            'options'=> array(
                'show_input' => true,
                'show_initial' => true,
                'show_alpha' => true,
                'show_palette' => true,
                'show_palette_only' => false,
                'show_selection_palette' => true,
                'max_palette_size' => 10,
                'allow_empty' => true,
                'clickout_fires_change' => false,
                'choose_text' => 'Choose',
                'cancel_text' => 'Cancel',
                'show_buttons' => true,
                'use_extended_classes' => true,
                'palette' => null,
            ),
            'required' => array( 'backtotop_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Back-to-top Progress Color', 'wavo' ),
            'id' => 'backtotop_bg',
            'type' => 'color',
            'default' =>  '#6c6d6d',
            'required' => array( 'backtotop_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Back-to-top Arrow Color', 'wavo' ),
            'id' => 'backtotop_arrow',
            'type' => 'color',
            'default' =>  '#6c6d6d',
            'required' => array( 'backtotop_visibility', '=', '1' )
        )
    )));

    // THEME PAGINATION SUBSECTION
    Redux::setSection($wavo_pre, array(
    'title' => esc_html__( 'Pagination', 'wavo' ),
    'desc' => esc_html__( 'These are main settings for general theme!', 'wavo' ),
    'id' => 'pagination',
    'subsection' => true,
    'icon' => 'el el-link',
    'fields' => array(
        array(
            'title' => esc_html__( 'Pagination', 'wavo' ),
            'subtitle' => esc_html__( 'Switch On-off', 'wavo' ),
            'desc' => esc_html__( 'If enabled, adds pagination.', 'wavo' ),
            'id' => 'pagination_visibility',
            'type' => 'switch',
            'default' => true
        ),
        array(
            'title' => esc_html__( 'Pagination Type', 'wavo' ),
            'subtitle' => esc_html__( 'Select type.', 'wavo' ),
            'id' => 'pag_type',
            'type' => 'select',
            'customizer' => true,
            'options' => array(
                'default' => esc_html__( 'Default', 'wavo' ),
                'outline' => esc_html__( 'Outline', 'wavo' )
            ),
            'default' => 'default',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Pagination size', 'wavo' ),
            'subtitle' => esc_html__( 'Select size.', 'wavo' ),
            'id' => 'pag_size',
            'type' => 'select',
            'customizer' => true,
            'options' => array(
                'small' => esc_html__( 'small', 'wavo' ),
                'medium' => esc_html__( 'medium', 'wavo' ),
                'large' => esc_html__( 'large', 'wavo' )
            ),
            'default' => 'medium',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Pagination group', 'wavo' ),
            'subtitle' => esc_html__( 'Select group.', 'wavo' ),
            'id' => 'pag_group',
            'type' => 'select',
            'customizer' => true,
            'options' => array(
                'yes' => esc_html__( 'Yes', 'wavo' ),
                'no' => esc_html__( 'No', 'wavo' )
            ),
            'default' => 'no',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Pagination corner', 'wavo' ),
            'subtitle' => esc_html__( 'Select corner type.', 'wavo' ),
            'id' => 'pag_corner',
            'type' => 'select',
            'customizer' => true,
            'options' => array(
                'square' => esc_html__( 'square', 'wavo' ),
                'rounded' => esc_html__( 'rounded', 'wavo' ),
                'circle' => esc_html__( 'circle', 'wavo' )
            ),
            'default' => 'square',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Pagination align', 'wavo' ),
            'subtitle' => esc_html__( 'Select align.', 'wavo' ),
            'id' => 'pag_align',
            'type' => 'select',
            'customizer' => true,
            'options' => array(
                'left' => esc_html__( 'left', 'wavo' ),
                'right' => esc_html__( 'right', 'wavo' ),
                'center' => esc_html__( 'center', 'wavo' )
            ),
            'default' => 'center',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Pagination default/outline color', 'wavo' ),
            'id' => 'pag_clr',
            'type' => 'color',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Active and Hover pagination color', 'wavo' ),
            'id' => 'pag_hvrclr',
            'type' => 'color',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Pagination number color', 'wavo' ),
            'id' => 'pag_nclr',
            'type' => 'color',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Active and Hover pagination number color', 'wavo' ),
            'id' => 'pag_hvrnclr',
            'type' => 'color',
            'required' => array( 'pagination_visibility', '=', '1' )
        )
    )));
    //BREADCRUMBS SETTINGS SUBSECTION
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Split Text Animation', 'wavo' ),
        'id' => 'themeanimationsubsection',
        'icon' => 'el el-brush',
        'subsection' => true,
        'customizer_width' => '450px',
        'fields' => array(
            array(
                'title' => esc_html__( 'Split Text Animation', 'wavo' ),
                'subtitle' => esc_html__( 'This option is general.Use this option if you want to turn off text split animations on pages.', 'wavo' ),
                'id' => 'split_text_animation_visibility',
                'type' => 'switch',
                'default' => true
            )
        )
    ));
    //BREADCRUMBS SETTINGS SUBSECTION
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Theme Form', 'wavo' ),
        'id' => 'themesearchformsubsection',
        'icon' => 'el el-brush',
        'subsection' => true,
        'customizer_width' => '450px',
        'fields' => array(
            array(
                'title' => esc_html__( 'Header Search Form Input Placeholder', 'wavo' ),
                'id' => 'searchform_placeholder1',
                'type' => 'text',
                'default' => 'Search...',
            ),
            array(
                'title' => esc_html__( 'Sidebar Search Form Input Placeholder', 'wavo' ),
                'id' => 'searchform_placeholder2',
                'type' => 'text',
                'default' => 'Search for...',
            ),
            array(
                'title' => esc_html__( 'Password Form Input Placeholder', 'wavo' ),
                'id' => 'searchform_placeholder3',
                'type' => 'text',
                'default' => 'Enter Password',
            ),
        )
    ));
    //BREADCRUMBS SETTINGS SUBSECTION
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Smooth Scrollbar', 'wavo' ),
        'id' => 'themesmoothscrollbarsubsection',
        'icon' => 'el el-brush',
        'subsection' => true,
        'customizer_width' => '450px',
        'fields' => array(
            array(
                'title' => esc_html__( 'Smooth Scrollbar', 'wavo' ),
                'id' => 'smoothscrollbar_visibility',
                'type' => 'switch',
                'default' => false
            ),
            array(
                'title' => esc_html__( 'Elementor Canvas Page Smooth Scrollbar', 'wavo' ),
                'id' => 'canvas_smoothscrollbar_visibility',
                'type' => 'switch',
                'default' => false,
                'required' => array( 'smoothscrollbar_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Scrollbar Thumb Color', 'wavo' ),
                'id' => 'smoothscrollbar_thumb',
                'type' => 'color',
                'mode' => 'background',
                'default' =>  '',
                'output' => array('.has-custom--scrollbar::-webkit-scrollbar-thumb'),
                'required' => array( 'smoothscrollbar_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Scrollbar Thumb Color ( Hover )', 'wavo' ),
                'id' => 'smoothscrollbar_hvrthumb',
                'type' => 'color',
                'mode' => 'background',
                'default' =>  '',
                'output' => array('.has-custom--scrollbar::-webkit-scrollbar-thumb:hover '),
                'required' => array( 'smoothscrollbar_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Scrollbar Track Color', 'wavo' ),
                'id' => 'smoothscrollbar_track',
                'type' => 'color',
                'mode' => 'background',
                'default' =>  '',
                'output' => array('.has-custom--scrollbar::-webkit-scrollbar-track'),
                'required' => array( 'smoothscrollbar_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Scrollbar Width', 'wavo' ),
                'id' => 'smoothscrollbar_width',
                'type' => 'dimensions',
                'output' => array('.has-custom--scrollbar::-webkit-scrollbar'),
                'units' => array('px'),
                'all' => false,
                'width' => true,
                'height' => false,
                'default' => array(
                    'width' => '8',
                    'units' => 'px'
                ),
                'required' => array( 'smoothscrollbar_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Animation Time', 'wavo' ),
                'id' => 'scrollbar_animationtime',
                'type' => 'spinner',
                "default" => 1000,
                "min" => 50,
                "step" => 50,
                "max" => 10000,
                'display_value' => 'label',
                'required' => array( 'smoothscrollbar_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Step Size', 'wavo' ),
                'id' => 'scrollbar_stepsize',
                'type' => 'spinner',
                "default" => 100,
                "min" => 1,
                "step" => 1,
                "max" => 1000,
                'required' => array( 'smoothscrollbar_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Acceleration Delta', 'wavo' ),
                'id' => 'scrollbar_accelerationdelta',
                'type' => 'spinner',
                "default" => 50,
                "min" => 1,
                "step" => 10,
                "max" => 5000,
                'required' => array( 'smoothscrollbar_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Acceleration Maximum', 'wavo' ),
                'id' => 'scrollbar_accelerationmax',
                'type' => 'spinner',
                "default" => 3,
                "min" => 1,
                "step" => 1,
                "max" => 100,
                'required' => array( 'smoothscrollbar_visibility', '=', '1' )
            ),
        )
    ));
    /*************************************************
    ## LOGO SECTION
    *************************************************/
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Logo', 'wavo' ),
        'desc' => esc_html__( 'These are main settings for general theme!', 'wavo' ),
        'id' => 'logosection',
        'customizer_width' => '400px',
        'icon' => 'el el-star-empty',
        'fields' => array(
            array(
                'title' => esc_html__( 'Logo Switch', 'wavo' ),
                'subtitle' => esc_html__( 'You can select logo on or off.', 'wavo' ),
                'id' => 'logo_visibility',
                'type' => 'switch',
                'default' => true
            ),
            array(
                'title' => esc_html__( 'Logo Type', 'wavo' ),
                'subtitle' => esc_html__( 'Select your logo type.', 'wavo' ),
                'id' => 'logo_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'img' => esc_html__( 'Image Logo', 'wavo' ),
                    'sitename' => esc_html__( 'Site Name', 'wavo' ),
                    'customtext' => esc_html__( 'Custom HTML', 'wavo' )
                ),
                'default' => 'sitename',
                'required' => array( 'logo_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Custom text for logo', 'wavo' ),
                'desc' => esc_html__( 'Text entered here will be used as logo', 'wavo' ),
                'id' => 'text_logo',
                'type' => 'editor',
                'args'   => array(
                    'teeny' => false,
                    'textarea_rows' => 10
                ),
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '=', 'customtext' )
                ),
            ),
            array(
                'title' => esc_html__( 'Sitename or Custom Text Logo Font', 'wavo' ),
                'desc' => esc_html__("Choose size and style your sitename, if you don't use an image logo.", 'wavo' ),
                'id' =>'logo_style',
                'type' => 'typography',
                'font-family' => true,
                'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false, // Select a backup non-google font in addition to a google font
                'font-style' => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'subsets' => true, // Only appears if google is true and subsets not set to false
                'font-size' => true,
                'line-height' => true,
                'text-transform' => true,
                'text-align' => false,
                'customizer' => true,
                'color' => true,
                'preview' => true, // Disable the previewer
                'output' => array('#nt-logo.logo-type-customtext,#nt-logo.logo-type-customtext>*, #nt-logo.logo-type-sitename, #nt-logo.logo-type-sitename>*' ),
                'default' => array(
                    'font-family' =>'',
                    'color' =>"",
                    'font-style' =>'',
                    'font-size' =>'',
                    'line-height' =>''
                ),
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '!=', 'img' )
                )
            ),
            array(
                'title' => esc_html__( 'Hover Text Logo Color', 'wavo' ),
                'desc' => esc_html__( 'Set your own hover color for the text logo.', 'wavo' ),
                'id' => 'text_logo_hvr',
                'type' => 'color',
                'output' => array( '#nt-logo.logo-type-customtext:hover,#nt-logo.logo-type-customtext:hover>*, #nt-logo.logo-type-sitename:hover,#nt-logo.logo-type-sitename:hover> *' ),
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '!=', 'img' )
                )
            ),
            array(
                'title' => esc_html__( 'Logo image', 'wavo' ),
                'subtitle' => esc_html__( 'Upload your Logo. If left blank theme will use site default logo.', 'wavo' ),
                'id' => 'img_logo',
                'type' => 'media',
                'url' => true,
                'customizer' => true,
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '=', 'img' ),
                    array( 'logo_type', '!=', '' )
                )
            ),
            array(
                'title' => esc_html__( 'Logo Dimensions', 'wavo' ),
                'subtitle' => esc_html__( 'Set the logo width and height of the image.', 'wavo' ),
                'id' => 'img_logo_dimensions',
                'type' => 'dimensions',
                'customizer' => true,
                'output' => array('#nt-logo img' ),
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '!=', '' )
                )
            ),
            array(
                'title' => esc_html__( 'Sticky Logo', 'wavo' ),
                'subtitle' => esc_html__( 'if you want to use a different logo on scroll, you can use this option.', 'wavo' ),
                'id' => 'img_logo_sticky',
                'type' => 'media',
                'url' => true,
                'customizer' => true,
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '=', 'img' ),
                    array( 'logo_type', '!=', '' )
                )
            ),
            array(
                'title' => esc_html__( 'Sticky Logo Dimensions', 'wavo' ),
                'subtitle' => esc_html__( 'Set the sticky logo width and height of the image.', 'wavo' ),
                'id' => 'img_sticky_logo_dimensions',
                'type' => 'dimensions',
                'customizer' => true,
                'output' => array('#nt-logo.has-sticky-logo img.sticky-logo' ),
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '=', 'img' ),
                    array( 'logo_type', '!=', '' )
                )
            ),
            array(
                'title' => esc_html__( 'Mobile Logo ( for Mobile Device )', 'wavo' ),
                'subtitle' => esc_html__( 'if you want to use a different logo on mobile devices, you can use this option.', 'wavo' ),
                'id' => 'img_logo_mobile',
                'type' => 'media',
                'url' => true,
                'customizer' => true,
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '=', 'img' ),
                    array( 'logo_type', '!=', '' )
                )
            ),
            array(
                'title' => esc_html__( 'Mobile Logo Dimensions', 'wavo' ),
                'subtitle' => esc_html__( 'Set the logo width and height of the image.', 'wavo' ),
                'id' => 'img_mobile_logo_dimensions',
                'type' => 'dimensions',
                'customizer' => true,
                'output' => array('#nt-logo.has-mobile-logo img.mobile-logo' ),
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '!=', '' )
                )
            )
    )));

    /*************************************************
    ## HEADER & NAV SECTION
    *************************************************/
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Header', 'wavo' ),
        'id' => 'headersection',
        'icon' => 'fa fa-bars',
    ));
    //HEADER MENU
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'General', 'wavo' ),
        'id' => 'headernavgeneralsection',
        'subsection' => true,
        'icon' => 'fa fa-cog',
        'fields' => array(
            array(
                'title' => esc_html__( 'Header Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site navigation.', 'wavo' ),
                'id' => 'nav_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Header Template', 'wavo' ),
                'subtitle' => esc_html__( 'Select your header template.', 'wavo' ),
                'id' => 'header_template',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'default' => esc_html__( 'Deafult Site Header', 'wavo' ),
                    'elementor' => esc_html__( 'Elementor Templates', 'wavo' ),
                    'sidebarmenu' => esc_html__( 'Sidebar Menu', 'wavo' ),
                ),
                'default' => 'default',
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Sidebar Menu Position', 'wavo' ),
                'id' => 'sidebar_menu_position_right',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'default' => esc_html__( 'Deafult Left', 'wavo' ),
                    'right' => esc_html__( 'Right', 'wavo' ),
                ),
                'default' => 'default',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'sidebarmenu' )
                )
            ),
            array(
                'title' => esc_html__( 'Elementor Templates', 'wavo' ),
                'subtitle' => esc_html__( 'Select a template from elementor templates.', 'wavo' ),
                'id' => 'header_elementor_templates',
                'type' => 'select',
                'customizer' => true,
                'options' => wavo_get_elementorTemplates(),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'elementor' )
                )
            ),
            array(
                'title' => esc_html__( 'Header Height', 'wavo' ),
                'id' => 'nav_top_height',
                'type' => 'dimensions',
                'output' => array('.topnav{padding:0;}.topnav'),
                'units' => array('px'),
                'all' => false,
                'width' => false,
                'height' => true,
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Overlay Menu Direction', 'wavo' ),
                'id' => 'nav_overlay_direction',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'left' => esc_html__( 'Left', 'wavo' ),
                    'right' => esc_html__( 'Right', 'wavo' ),
                ),
                'default' => 'left',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Overlay Menu Trigger Position', 'wavo' ),
                'id' => 'nav_overlay_trigger_position',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'right' => esc_html__( 'Right', 'wavo' ),
                    'after-logo' => esc_html__( 'After Logo', 'wavo' ),
                    'before-logo' => esc_html__( 'Before Logo', 'wavo' ),
                ),
                'default' => 'right',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Overlay Menu Container Width', 'wavo' ),
                'subtitle' => esc_html__( 'Select your overlay menu container width.', 'wavo' ),
                'id' => 'header_container_width',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'container' => esc_html__( 'Deafult Container', 'wavo' ),
                    'container-fluid' => esc_html__( 'Container Fluid', 'wavo' ),
                ),
                'default' => 'container',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),

            array(
                'title' => esc_html__( 'Overlay Menu Left Column Width ( for large device )', 'wavo' ),
                'subtitle' => esc_html__( 'You can control default overlay menu left column width for large device.', 'wavo' ),
                'id' => 'header_left_column_lg',
                'type' => 'slider',
                'default' => 9,
                'min' => 2,
                'step' => 1,
                'max' => 10,
                'display_value' => 'text',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Overlay Menu Left Column Width ( for medium device )', 'wavo' ),
                'subtitle' => esc_html__( 'You can control default overlay menu left column width for medium device.', 'wavo' ),
                'id' => 'header_left_column_md',
                'type' => 'slider',
                'default' => 8,
                'min' => 2,
                'step' => 1,
                'max' => 10,
                'display_value' => 'text',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            // HEADER SEARCH AREA
            array(
                'id' => 'nav_togglebar_section_heading_start',
                'type' => 'section',
                'title' => esc_html__('Menu Toggle Button Options', 'wavo'),
                'indent' => true,
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Menu Button Type', 'wavo' ),
                'subtitle' => esc_html__( 'Select your header template.', 'wavo' ),
                'id' => 'burger_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'default' => esc_html__( 'Deafult', 'wavo' ),
                    'hamburger--slider' => esc_html__( 'Slider', 'wavo' ),
                    'hamburger--squeeze' => esc_html__( 'Squeeze', 'wavo' ),
                    'hamburger--arrow' => esc_html__( 'Arrow', 'wavo' ),
                    'hamburger--arrowalt' => esc_html__( 'Arrow Alt', 'wavo' ),
                    'hamburger--arrowturn' => esc_html__( 'Arrow Turn', 'wavo' ),
                    'hamburger--spin' => esc_html__( 'Spin', 'wavo' ),
                    'hamburger--elastic' => esc_html__( 'Elastic', 'wavo' ),
                    'hamburger--emphatic' => esc_html__( 'Emphatic', 'wavo' ),
                    'hamburger--collapse' => esc_html__( 'Collapse', 'wavo' ),
                    'hamburger--vortex' => esc_html__( 'Vortex', 'wavo' ),
                    'hamburger--stand' => esc_html__( 'Stand', 'wavo' ),
                    'hamburger--spring' => esc_html__( 'Spring', 'wavo' ),
                    'hamburger--minus' => esc_html__( 'Minus', 'wavo' ),
                    'hamburger--3dx' => esc_html__( '3DX', 'wavo' ),
                    'hamburger--3dy' => esc_html__( '3DY', 'wavo' ),
                    'hamburger--3dxy' => esc_html__( '3DXY', 'wavo' ),
                    'hamburger--boring' => esc_html__( 'Boring', 'wavo' ),
                ),
                'default' => 'default',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Menu Title', 'wavo' ),
                'id' => 'nav_menu_title',
                'type' => 'text',
                'default' => 'Menu',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Close Title', 'wavo' ),
                'id' => 'nav_close_title',
                'type' => 'text',
                'default' => 'Close',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Go Back Title', 'wavo' ),
                'id' => 'nav_goback_title',
                'type' => 'text',
                'default' => '',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Reverse Go Back Arrow', 'wavo' ),
                'subtitle' => esc_html__( 'You can reverse submenu go back icon.', 'wavo' ),
                'id' => 'reverse_go_back_icon',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Open and Close Title Color', 'wavo' ),
                'id' => 'nav_open_close_text',
                'type' => 'color',
                'output' => array( '.topnav .menu-icon .text,.topnav .menu-icon .text:after' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Toggle Bar Color', 'wavo' ),
                'id' => 'nav_togglebar_bg',
                'type' => 'color_rgba',
                'mode' => 'background',
                'output' => array( '.topnav .menu-icon .icon i, .sidebarmenu--hamburger-menu span' ),
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Menu Title', 'wavo' ),
                'id' => 'nav_sidebarmenu_title',
                'type' => 'text',
                'default' => '',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'sidebarmenu' )
                )
            ),
            array(
                'title' => esc_html__( 'Menu Title Color', 'wavo' ),
                'id' => 'nav_sidebarmenu_title_color',
                'type' => 'color',
                'output' => array( '.sidebarmenu--main-side .menu-title' ),
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'id' => 'nav_togglebar_section_heading_end',
                'type' => 'section',
                'indent' => false
            ),
            // SIDEBARMENU MENU
            array(
                'id' => 'nav_sidebarmenu_section_heading_start',
                'type' => 'section',
                'title' => esc_html__('Sidebar Menu Options', 'wavo'),
                'indent' => true,
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'sidebarmenu' )
                )
            ),
            array(
                'title' => esc_html__( 'Sidebar Menu Social Icons', 'wavo' ),
                'id' => 'sidebarmenu_social',
                'type' => 'textarea',
                'default' => '<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
<li><a href="#"><i class="fab fa-twitter"></i></a></li>
<li><a href="#"><i class="fab fa-youtube"></i></a></li>',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'sidebarmenu' )
                )
            ),
            array(
                'title' => esc_html__( 'Mobile Toggle Bar Color', 'wavo' ),
                'id' => 'nav_sidebarmenu_togglebar_clr',
                'type' => 'color',
                'mode' => 'background',
                'output' => array( '.sidebarmenu--hamburger-menu.mobile--hamburger span' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'sidebarmenu' )
                )
            ),
            array(
                'title' => esc_html__( 'Sidebar Background Color', 'wavo' ),
                'id' => 'nav_sidebarmenu_bg',
                'type' => 'color_rgba',
                'mode' => 'background',
                'options'=> array(
                    'show_input' => true,
                    'show_initial' => true,
                    'show_alpha' => true,
                    'show_palette' => true,
                    'show_palette_only' => false,
                    'show_selection_palette' => true,
                    'max_palette_size' => 10,
                    'allow_empty' => true,
                    'clickout_fires_change' => false,
                    'choose_text' => 'Choose',
                    'cancel_text' => 'Cancel',
                    'show_buttons' => true,
                    'use_extended_classes' => true,
                    'palette' => null,
                ),
                'output' => array( '.sidebarmenu--main-side' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'sidebarmenu' )
                )
            ),
            array(
                'title' => esc_html__( 'Sidebar Border Color', 'wavo' ),
                'id' => 'nav_sidebarmenu_brdleft_bg',
                'type' => 'color',
                'mode' => 'border-right-color',
                'output' => array( '.sidebarmenu--main-side' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'sidebarmenu' )
                )
            ),
            array(
                'title' => esc_html__( 'Menu Background Color', 'wavo' ),
                'id' => 'nav_sidebarmenu_menu_bg',
                'type' => 'color_rgba',
                'mode' => 'background',
                'options'=> array(
                    'show_input' => true,
                    'show_initial' => true,
                    'show_alpha' => true,
                    'show_palette' => true,
                    'show_palette_only' => false,
                    'show_selection_palette' => true,
                    'max_palette_size' => 10,
                    'allow_empty' => true,
                    'clickout_fires_change' => false,
                    'choose_text' => 'Choose',
                    'cancel_text' => 'Cancel',
                    'show_buttons' => true,
                    'use_extended_classes' => true,
                    'palette' => null,
                ),
                'output' => array( '.sidebarmenu--navigation,.sidebarmenu--search-box' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'sidebarmenu' )
                )
            ),
            array(
                'title' => esc_html__( 'Mobile Header Background Color', 'wavo' ),
                'id' => 'nav_sidebarmenu_mobmenu_bg',
                'type' => 'color_rgba',
                'mode' => 'background',
                'options'=> array(
                    'show_input' => true,
                    'show_initial' => true,
                    'show_alpha' => true,
                    'show_palette' => true,
                    'show_palette_only' => false,
                    'show_selection_palette' => true,
                    'max_palette_size' => 10,
                    'allow_empty' => true,
                    'clickout_fires_change' => false,
                    'choose_text' => 'Choose',
                    'cancel_text' => 'Cancel',
                    'show_buttons' => true,
                    'use_extended_classes' => true,
                    'palette' => null,
                ),
                'output' => array( '.nt-mobile .sidebarmenu--headertop.mobile--header' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'sidebarmenu' )
                )
            ),
            array(
                'title' => esc_html__( 'Mobile Sticky Header Background Color', 'wavo' ),
                'id' => 'nav_sidebarmenu_mobmenu_sticky_bg',
                'type' => 'color_rgba',
                'mode' => 'background',
                'options'=> array(
                    'show_input' => true,
                    'show_initial' => true,
                    'show_alpha' => true,
                    'show_palette' => true,
                    'show_palette_only' => false,
                    'show_selection_palette' => true,
                    'max_palette_size' => 10,
                    'allow_empty' => true,
                    'clickout_fires_change' => false,
                    'choose_text' => 'Choose',
                    'cancel_text' => 'Cancel',
                    'show_buttons' => true,
                    'use_extended_classes' => true,
                    'palette' => null,
                ),
                'output' => array( '.nt-mobile.scroll-start .sidebarmenu--headertop.mobile--header' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'sidebarmenu' )
                )
            ),
            array(
                'title' => esc_html__( 'Search Overlay Background Color', 'wavo' ),
                'id' => 'nav_sidebarmenu_search_bg',
                'type' => 'color_rgba',
                'mode' => 'background',
                'options'=> array(
                    'show_input' => true,
                    'show_initial' => true,
                    'show_alpha' => true,
                    'show_palette' => true,
                    'show_palette_only' => false,
                    'show_selection_palette' => true,
                    'max_palette_size' => 10,
                    'allow_empty' => true,
                    'clickout_fires_change' => false,
                    'choose_text' => 'Choose',
                    'cancel_text' => 'Cancel',
                    'show_buttons' => true,
                    'use_extended_classes' => true,
                    'palette' => null,
                ),
                'output' => array( '.sidebarmenu--search-box' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'sidebarmenu' )
                )
            ),
            array(
                'title' => esc_html__( 'Social Icon Color', 'wavo' ),
                'id' => 'nav_sidebarmenu_social_clr',
                'type' => 'color',
                'output' => array( '.sidebarmenu--main-side .sidebarmenu--social-media li a' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'sidebarmenu' )
                )
            ),
            array(
                'title' => esc_html__( 'Social Icon Color ( Hover )', 'wavo' ),
                'id' => 'nav_sidebarmenu_social_hvrclr',
                'type' => 'color',
                'output' => array( '.sidebarmenu--main-side .sidebarmenu--social-media li a:hover' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'sidebarmenu' )
                )
            ),
            array(
                'title' => esc_html__( 'Search Icon Color', 'wavo' ),
                'id' => 'nav_sidebarmenu_search_clr',
                'type' => 'color',
                'mode' => 'fill',
                'output' => array( '.sidebarmenu--main-side .sidebarmenu--search svg' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'sidebarmenu' )
                )
            ),
            array(
                'title' => esc_html__( 'Search Overlay Title Font and Color', 'wavo' ),
                'id' => 'nav_sidebarmenu_search_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '.sidebarmenu--search-box.open h2' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'sidebarmenu' )
                )
            ),
            array(
                'id' => 'nav_sidebarmenu_section_heading_end',
                'type' => 'section',
                'indent' => false
            ),
            // HEADER MENU
            array(
                'id' => 'nav_top_section_heading_start',
                'type' => 'section',
                'title' => esc_html__('Header and Menu Options', 'wavo'),
                'indent' => true,
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Header Background Color', 'wavo' ),
                'id' => 'nav_top_bg',
                'type' => 'color_rgba',
                'mode' => 'background',
                'output' => array( '.topnav' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Overlay Menu Background Image', 'wavo' ),
                'id' => 'nav_top_bg_img',
                'type' => 'background',
                'preview' => true,
                'preview_media' => true,
                'output' => array( '.hamenu' ),
                'default' => array(
                    'background-position' => 'center'
                ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Header Overlay Background Color', 'wavo' ),
                'id' => 'nav_bg',
                'type' => 'color_rgba',
                'mode' => 'background',
                'output' => array( 'div.hamenu' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Menu Item Font and Color', 'wavo' ),
                'subtitle' => esc_html__('Choose Size and Style for primary menu', 'wavo' ),
                'id' => 'nav_a_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '.hamenu .menu-links .link, .hamenu .menu-links .sub-link' ),
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Menu Item Color ( Hover and Active )', 'wavo' ),
                'desc' => esc_html__( 'Set your own hover color for the navigation menu item.', 'wavo' ),
                'id' => 'nav_hvr_a',
                'type' => 'color',
                'output' => array( '.hamenu .menu-links .link:hover, .hamenu .menu-links .sub-link:hover, .hamenu .menu-links .main-menu .sub-menu li .sub-link.back:hover, .hamenu .menu-links .is--active .link, .hamenu .menu-links .is--active .sub-link' ),
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Go Back Font and Color', 'wavo' ),
                'subtitle' => esc_html__( 'Choose Size and Style for primary menu', 'wavo' ),
                'id' => 'nav_back_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '.hamenu .menu-links .main-menu .sub-menu li .sub-link.back' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Increment Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site navigation menu item increment.', 'wavo' ),
                'id' => 'nav_increment_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Increment Color', 'wavo' ),
                'desc' => esc_html__( 'Set your own hover color for the navigation menu item.', 'wavo' ),
                'id' => 'nav_increment_color2',
                'type' => 'color',
                'output' => array( '.hamenu .main-menu .nm::before' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'nav_increment_visibility', '=', '1' )
                )
            ),
            array(
                'id' => 'nav_top_section_heading_end',
                'type' => 'section',
                'indent' => false
            ),
            // HEADER CONTACT AREA
            array(
                'id' => 'nav_contact_section_heading_start',
                'type' => 'section',
                'title' => esc_html__('Header Contact Area Options', 'wavo'),
                'indent' => true,
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Header Contact Area Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site navigation contact area.', 'wavo' ),
                'id' => 'nav_contact_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Header Contact Content Type', 'wavo' ),
                'subtitle' => esc_html__( 'Select your header contact information template.', 'wavo' ),
                'id' => 'nav_contact_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'default' => esc_html__( 'Deafult', 'wavo' ),
                    'widget' => esc_html__( 'WP Widget Content', 'wavo' ),
                    'elementor' => esc_html__( 'Elementor Template', 'wavo' ),
                ),
                'default' => 'default',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' ),
                    array( 'nav_contact_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__( 'Elementor Templates', 'wavo' ),
                'subtitle' => esc_html__( 'Select a template from elementor templates.', 'wavo' ),
                'id' => 'nav_contact_elementor_templates',
                'type' => 'select',
                'customizer' => true,
                'options' => wavo_get_elementorTemplates(),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' ),
                    array( 'nav_contact_visibility', '=', '1' ),
                    array( 'nav_contact_type', '=', 'elementor' ),
                )
            ),
            array(
                'title' => esc_html__( 'Header Contact Area', 'wavo' ),
                'id' => 'nav_contact',
                'type' => 'editor',
                'default' => '<div class="item"><h6>Phone :</h6><p>+0 762-2367-723</p></div>
                <div class="item"><h6>Address :</h6><p>541 Melville Ave, Palo Alto, CA 94301, ask@wavo.io</p></div>
                <div class="item"><h6>Email :</h6><p>Wavo_website@gmail.com</p></div>',
                'args'   => array(
                    'teeny' => false,
                    'textarea_rows' => 10
                ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' ),
                    array( 'nav_contact_visibility', '=', '1' ),
                    array( 'nav_contact_type', '=', 'default' ),
                ),
            ),
            array(
                'title' => esc_html__( 'Contact Label Text Color', 'wavo' ),
                'desc' => esc_html__( 'Set your own hover color for the navigation menu item.', 'wavo' ),
                'id' => 'nav_contact_label_color',
                'type' => 'color',
                'output' => array( '.hamenu .cont-info .item h6,.hamenu .cont-info .item h5,.hamenu .cont-info .item h4,.hamenu .cont-info .item h3,.hamenu .cont-info .item h2' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' ),
                    array( 'nav_contact_visibility', '=', '1' ),
                    array( 'nav_contact_type', '=', 'default' ),
                ),
            ),
            array(
                'title' => esc_html__( 'Contact Detail Text Color', 'wavo' ),
                'desc' => esc_html__( 'Set your own hover color for the navigation menu item.', 'wavo' ),
                'id' => 'nav_contact_info_color',
                'type' => 'color',
                'output' => array( '.hamenu .cont-info .item, .hamenu .cont-info .item p' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' ),
                    array( 'nav_contact_visibility', '=', '1' ),
                    array( 'nav_contact_type', '=', 'default' ),
                ),
            ),
            array(
                'title' => esc_html__( 'Contact Detail Font and Color', 'wavo' ),
                'subtitle' => esc_html__( 'Choose Size and Style for primary menu contact details', 'wavo' ),
                'id' => 'nav_contact_info_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '.hamenu .cont-info .item, .hamenu .cont-info .item p' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' ),
                    array( 'nav_contact_visibility', '=', '1' ),
                    array( 'nav_contact_type', '=', 'default' ),
                ),
            ),
            array(
                'id' => 'nav_contact_section_heading_end',
                'type' => 'section',
                'indent' => false
            ),
            // HEADER SEARCH AREA
            array(
                'id' => 'nav_search_section_heading_start',
                'type' => 'section',
                'title' => esc_html__('Header Search Options', 'wavo'),
                'indent' => true,
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Search Form Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site navigation search form.', 'wavo' ),
                'id' => 'nav_search_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Form Input Border Color', 'wavo' ),
                'id' => 'nav_search_input_brdcolor',
                'type' => 'color',
                'mode' => 'border-color',
                'output' => array( '.hamenu form#content-widget-searchform input.search_input,.hamenu form#content-widget-searchform .btn-curve.btn-wit' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' ),
                    array( 'nav_search_visibility', '=', '1' )
                ),
            ),
            array(
                'title' => esc_html__( 'Form Submit Background Color', 'wavo' ),
                'id' => 'nav_search_submit_bgcolor',
                'type' => 'color',
                'mode' => 'background-color',
                'output' => array( '.hamenu form#content-widget-searchform .btn-curve.btn-wit' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' ),
                    array( 'nav_search_visibility', '=', '1' )
                ),
            ),
            array(
                'title' => esc_html__( 'Form Submit Background Color 2', 'wavo' ),
                'id' => 'nav_search_submit_hvrbgcolor',
                'type' => 'color',
                'mode' => 'background-color',
                'output' => array( '.hamenu form#content-widget-searchform .btn-curve.btn-wit:after' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' ),
                    array( 'nav_search_visibility', '=', '1' )
                ),
            ),
            array(
                'id' => 'nav_search_section_heading_end',
                'type' => 'section',
                'indent' => false
            ),
            // HEADER SEARCH AREA
            array(
                'id' => 'nav_copyright_section_heading_start',
                'type' => 'section',
                'title' => esc_html__('Header Copyright Options', 'wavo'),
                'indent' => true,
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Header Copyright Text Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site navigation copyright text.', 'wavo' ),
                'id' => 'nav_copyright_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Header Copyright Text', 'wavo' ),
                'id' => 'nav_copyright',
                'type' => 'editor',
                'default' => '',
                'args' => array(
                    'teeny' => false,
                    'textarea_rows' => 10
                ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'nav_copyright_visibility', '=', '1' )
                ),
            ),
            array(
                'title' => esc_html__( 'Header Copyright Text Color', 'wavo' ),
                'desc' => esc_html__( 'Set your own color for the navigation menu item.', 'wavo' ),
                'id' => 'nav_increment_color',
                'type' => 'color',
                'output' => array( '.hamenu .item.header-footer' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'nav_copyright_visibility', '=', '1' )
                )
            ),
            array(
                'title' => esc_html__( 'Header Copyright Font and Color', 'wavo' ),
                'subtitle' => esc_html__( 'Choose Size and Style for primary menu', 'wavo' ),
                'id' => 'nav_copyright_info_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '.hamenu .cont-info .item, .hamenu .cont-info .item p' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' ),
                    array( 'nav_contact_visibility', '=', '1' )
                ),
            ),
            array(
                'id' => 'nav_copyright_section_heading_end',
                'type' => 'section',
                'indent' => false
            ),
            // STICKY MENU
            array(
                'id' => 'nav_top_sticky_section_heading_start',
                'type' => 'section',
                'title' => esc_html__('Sticky Header Options', 'wavo'),
                'indent' => true,
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Sticky Header Display', 'wavo' ),
                'id' => 'nav_sticky_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Sticky Header Height', 'wavo' ),
                'id' => 'nav_top_sticky_height',
                'type' => 'dimensions',
                'units' => array('px'),
                'all' => false,
                'width' => false,
                'height' => true,
                'output' => array( '.scroll-start .topnav {padding:0;}.scroll-start .topnav' ),
                'required' => array( 'nav_sticky_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Sticky Header Background Color', 'wavo' ),
                'id' => 'nav_top_sticky_bg',
                'type' => 'color_rgba',
                'mode' => 'background',
                'output' => array( '.topnav.nav-scroll' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Sticky Header Direction?', 'wavo' ),
                'subtitle' => esc_html__( 'Select your sticky headers visibility as you scroll the page.', 'wavo' ),
                'id' => 'nav_top_sticky_direction',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'default' => esc_html__( 'Deafult( from Top )', 'wavo' ),
                    'bottom' => esc_html__( 'Bottom (from Bottom)', 'wavo' ),
                ),
                'default' => 'default',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'id' => 'nav_top_sticky_section_heading_end',
                'type' => 'section',
                'indent' => false
            ),
            // MOBILE MENU
            array(
                'id' => 'nav_mobile_section_heading_start',
                'type' => 'section',
                'title' => esc_html__('Mobile Header Options', 'wavo'),
                'indent' => true,
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Mobile Header Background Color', 'wavo' ),
                'id' => 'nav_top_mobile_bg',
                'type' => 'color_rgba',
                'mode' => 'background',
                'output' => array( '.nt-mobile .topnav,body[data-elementor-device-mode="tablet"] .topnav,body[data-elementor-device-mode="mobile"] .topnav' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Mobile Sticky Header Background Color', 'wavo' ),
                'id' => 'nav_top_mobile_sticky_bg',
                'type' => 'color_rgba',
                'mode' => 'background',
                'output' => array( '.nt-mobile.scroll-start .topnav,
                body.scroll-start[data-elementor-device-mode="tablet"] .topnav,
                body.scroll-start[data-elementor-device-mode="mobile"] .topnav' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'id' => 'nav_mobile_section_heading_end',
                'type' => 'section',
                'indent' => false
            ),
            // HEADER EXTRA
            array(
                'id' => 'nav_transition_section_heading_start',
                'type' => 'section',
                'title' => esc_html__('Header Extra Options', 'wavo'),
                'indent' => true,
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Theme Overlay Menu Transition', 'wavo' ),
                'id' => 'overlay_menu_transition',
                'type' => 'text',
                'default' => 'all 0.5s cubic-bezier(1, 0, 0.55, 1)',
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Theme Overlay Menu Item Transition', 'wavo' ),
                'id' => 'overlay_menuitem_transition',
                'type' => 'text',
                'default' => 'all 0.5s',
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Theme Overlay Submenu Transition Delay', 'wavo' ),
                'id' => 'overlay_submenu_transitiondelay',
                'type' => 'text',
                'default' => '0.2s',
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'id' => 'nav_transition_section_heading_end',
                'type' => 'section',
                'indent' => false
            ),
            // HEADER EXTRA
            array(
                'id' => 'nav_lang_section_heading_start',
                'type' => 'section',
                'title' => esc_html__('Header Lang Switcher Options', 'wavo'),
                'indent' => true,
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Header Lang Switcher Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site header language area.', 'wavo' ),
                'id' => 'nav_lang_visibility',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off',
            ),
            array(
                'title' => esc_html__( 'Use Theme WPML Lang Switcher', 'wavo' ),
                'id' => 'use_wpml_lang_switcher',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'nav_lang_visibility', '=', '1' ),
                    array( 'header_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Lang Globe Icon Color', 'wavo' ),
                'desc' => esc_html__( 'Set your own color for the header language item.', 'wavo' ),
                'id' => 'nav_lang_icon_color',
                'type' => 'color',
                'output' => array( '.main-overlaymenu .lang-item.active .lang-icon' ),
            ),
            array(
                'title' => esc_html__( 'Lang Color', 'wavo' ),
                'desc' => esc_html__( 'Set your own color for the header language item.', 'wavo' ),
                'id' => 'nav_lang_color',
                'type' => 'color',
                'output' => array( '.main-overlaymenu .lang-select .uppercase' ),
            ),
            array(
                'title' => esc_html__( 'Sub Lang Background Color', 'wavo' ),
                'desc' => esc_html__( 'Set your own color for the header language item.', 'wavo' ),
                'id' => 'nav_sublang_bgcolor',
                'type' => 'color',
                'mode' => 'background-color',
                'output' => array( '.main-overlaymenu .sub-lang-item a:before' ),
            ),
            array(
                'id' => 'nav_lang_section_heading_end',
                'type' => 'section',
                'indent' => false
            ),
            //information on-off
            array(
                'id' =>'info_nav0',
                'type' => 'info',
                'style' => 'success',
                'title' => esc_html__( 'Success!', 'wavo' ),
                'icon' => 'el el-info-circle',
                'customizer' => false,
                'desc' => sprintf(esc_html__( '%s is disabled on the site. Please activate to view options.', 'wavo' ), '<b>Navigation</b>' ),
                'required' => array( 'nav_visibility', '=', '0' )
            )
    )));


    /*************************************************
    ## SIDEBARS SECTION
    *************************************************/
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Sidebars', 'wavo' ),
        'id' => 'sidebarssection',
        'customizer_width' => '400px',
        'icon' => 'fa fa-th-list',
    ));
    // SIDEBAR LAYOUT SUBSECTION
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Sidebars Layout', 'wavo' ),
        'desc' => esc_html__( 'You can change the below default layout type.', 'wavo' ),
        'id' => 'sidebarslayoutsection',
        'subsection' => true,
        'icon' => 'el el-cogs',
        'fields' => array(
            array(
                'title' => esc_html__( 'Sidebar type', 'wavo' ),
                'subtitle' => esc_html__( 'Select sidebar type.', 'wavo' ),
                'id' => 'sidebar_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    '' => esc_html__( 'Select type', 'wavo' ),
                    'default' => esc_html__( 'default', 'wavo' ),
                    'bordered' => esc_html__( 'bordered', 'wavo' )
                ),
                'default' => 'default',
            ),
            array(
                'title' => esc_html__( 'Blog Page Layout', 'wavo' ),
                'subtitle' => esc_html__( 'Choose the blog index page layout.', 'wavo' ),
                'id' => 'index_layout',
                'type' => 'image_select',
                'options' => array(
                    'left-sidebar' => array(
                        'alt' => 'Left Sidebar',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/2cl.png'
                    ),
                    'full-width' => array(
                        'alt' => 'Full Width',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/1col.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right Sidebar',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/2cr.png'
                    )
                ),
                'default' => 'right-sidebar'
            ),
            array(
                'title' => esc_html__( 'Single Page Layout', 'wavo' ),
                'subtitle' => esc_html__( 'Choose the single post page layout.', 'wavo' ),
                'id' => 'single_layout',
                'type' => 'image_select',
                'options' => array(
                    'left-sidebar' => array(
                        'alt' => 'Left Sidebar',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/2cl.png'
                    ),
                    'full-width' => array(
                        'alt' => 'Full Width',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/1col.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right Sidebar',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/2cr.png'
                    )
                ),
                'default' => 'full-width'
            ),
            array(
                'title' => esc_html__( 'Search Page Layout', 'wavo' ),
                'subtitle' => esc_html__( 'Choose the search page layout.', 'wavo' ),
                'id' => 'search_layout',
                'type' => 'image_select',
                'options' => array(
                    'left-sidebar' => array(
                        'alt' => 'Left Sidebar',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/2cl.png'
                    ),
                    'full-width' => array(
                        'alt' => 'Full Width',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/1col.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right Sidebar',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/2cr.png'
                    )
                ),
                'default' => 'full-width'
            ),
            array(
                'title' => esc_html__( 'Archive Page Layout', 'wavo' ),
                'subtitle' => esc_html__( 'Choose the archive page layout.', 'wavo' ),
                'id' => 'archive_layout',
                'type' => 'image_select',
                'options' => array(
                    'left-sidebar' => array(
                        'alt' => 'Left Sidebar',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/2cl.png'
                    ),
                    'full-width' => array(
                        'alt' => 'Full Width',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/1col.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right Sidebar',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/2cr.png'
                    )
                ),
                'default' => 'full-width'
            )
    )));
    // SIDEBAR COLORS SUBSECTION
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Sidebar Customize', 'wavo' ),
        'desc' => esc_html__( 'These are main settings for general theme!', 'wavo' ),
        'id' => 'sidebarsgenaralsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Sidebar Background', 'wavo' ),
                'id' => 'sdbr_bg',
                'type' => 'color',
                'mode' => 'background',
                'output' => array( '.nt-sidebar' )
            ),
            array(
                'id' => 'sdbr_brd',
                'type' => 'border',
                'title' => esc_html__( 'Sidebar Border', 'wavo' ),
                'output' => array( '.nt-sidebar' ),
                'all' => false
            ),
            array(
                'title' => esc_html__( 'Sidebar Padding', 'wavo' ),
                'id' => 'sdbr_pad',
                'type' => 'spacing',
                'mode' => 'padding',
                'all' => false,
                'units' => array( 'em', 'px', '%' ),
                'units_extended' => 'true',
                'output' => array( '.nt-sidebar' ),
                'default' => array(
                    'margin-top' => '',
                    'margin-right' => '',
                    'margin-bottom' => '',
                    'margin-left' => ''
                )
            ),
            array(
                'title' => esc_html__( 'Sidebar Margin', 'wavo' ),
                'id' => 'sdbr_mar',
                'type' => 'spacing',
                'mode' => 'margin',
                'all' => false,
                'units' => array( 'em', 'px', '%' ),
                'units_extended' => 'true',
                'output' => array( '.nt-sidebar' ),
                'default' => array(
                    'margin-top' => '',
                    'margin-right' => '',
                    'margin-bottom' => '',
                    'margin-left' => ''
                )
            ),
    )));
    // SIDEBAR WIDGET COLORS SUBSECTION
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Widget Customize', 'wavo' ),
        'desc' => esc_html__( 'These are main settings for general theme!', 'wavo' ),
        'id' => 'sidebarwidgetsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Sidebar Widgets Background Color', 'wavo' ),
                'id' => 'sdbr_w_bg',
                'type' => 'color',
                'mode' => 'background',
                'output' => array( '.nt-sidebar .nt-sidebar-inner-widget' )
            ),
            array(
                'title' => esc_html__( 'Widgets Border', 'wavo' ),
                'id' => 'sdbr_w_brd',
                'type' => 'border',
                'output' => array( '.nt-sidebar .nt-sidebar-inner-widget' ),
                'all' => false
            ),
            array(
                'title' => esc_html__( 'Widget Title Color', 'wavo' ),
                'desc' => esc_html__( 'Set your own colors for the widgets.', 'wavo' ),
                'id' => 'sdbr_wt',
                'type' => 'color',
                'output' => array( '#nt-sidebar .widget-title' )
            ),
            array(
                'title' => esc_html__( 'Widget Text Color', 'wavo' ),
                'desc' => esc_html__( 'Set your own colors for the widgets.', 'wavo' ),
                'id' => 'sdbr_wp',
                'type' => 'color',
                'output' => array( '.nt-sidebar .nt-sidebar-inner-widget, .nt-sidebar .nt-sidebar-inner-widget p' )
            ),
            array(
                'title' => esc_html__( 'Widget Link Color', 'wavo' ),
                'desc' => esc_html__( 'Set your own colors for the widgets.', 'wavo' ),
                'id' => 'sdbr_a',
                'type' => 'color',
                'output' => array( '.nt-sidebar .nt-sidebar-inner-widget a' )
            ),
            array(
                'title' => esc_html__( 'Widget Hover Link Color', 'wavo' ),
                'desc' => esc_html__( 'Set your own hover colors for the widgets.', 'wavo' ),
                'id' => 'sdbr_hvr_a',
                'type' => 'color',
                'output' => array( '.nt-sidebar .nt-sidebar-inner-widget a:hover' )
            ),
            array(
                'title' => esc_html__( 'Widget Padding', 'wavo' ),
                'id' => 'sdbr_w_pad',
                'type' => 'spacing',
                'mode' => 'padding',
                'all' => false,
                'units' => array( 'em', 'px', '%' ),
                'units_extended' => 'true',
                'output' => array( '.nt-sidebar .nt-sidebar-inner-widget' ),
                'default' => array(
                    'margin-top' => '',
                    'margin-right' => '',
                    'margin-bottom' => '',
                    'margin-left' => ''
                )
            ),
            array(
                'title' => esc_html__( 'Widget Margin', 'wavo' ),
                'id' => 'sdbr_w_mar',
                'type' => 'spacing',
                'mode' => 'margin',
                'all' => false,
                'units' => array( 'em', 'px', '%' ),
                'units_extended' => 'true',
                'output' => array( '.nt-sidebar .nt-sidebar-inner-widget' ),
                'default' => array(
                    'margin-top' => '',
                    'margin-right' => '',
                    'margin-bottom' => '',
                    'margin-left' => ''
                )
            )
    )));

    /*************************************************
    ## BLOG PAGE SECTION
    *************************************************/
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Blog Page', 'wavo' ),
        'id' => 'blogsection',
        'icon' => 'el el-home',
    ));
    // BLOG HERO SUBSECTION
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Blog Hero', 'wavo' ),
        'desc' => esc_html__( 'These are blog index page hero text settings!', 'wavo' ),
        'id' => 'blogherosubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Blog Hero Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site blog index page hero section with switch option.', 'wavo' ),
                'id' => 'blog_hero_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Blog Hero Background', 'wavo' ),
                'id' => 'blog_hero_bg',
                'type' => 'background',
                'preview' => true,
                'preview_media' => true,
                'output' => array( '#nt-index .page-header' ),
                'default' => array(
                    'background-position' => 'center'
                ),
                'required' => array( 'blog_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Blog Page Title Tag', 'wavo' ),
                'id' => 'blog_title_tag',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'h1' => esc_html__( 'H1', 'wavo' ),
                    'h2' => esc_html__( 'H2', 'wavo' ),
                    'h3' => esc_html__( 'H3', 'wavo' ),
                    'h4' => esc_html__( 'H4', 'wavo' ),
                    'h5' => esc_html__( 'H5', 'wavo' ),
                    'h6' => esc_html__( 'H6', 'wavo' ),
                    'div' => esc_html__( 'div', 'wavo' ),
                ),
                'default' => 'h1'
            ),
            array(
                'title' => esc_html__( 'Blog Big Title Typography', 'wavo' ),
                'id' => 'blog_stroke_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-index .page-header .text-bg' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'blog_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__( 'Big Title Stroke Color', 'wavo' ),
                'desc' => esc_html__( 'Set your own colors for the big title.', 'wavo' ),
                'id' => 'blog_big_title_stroke_clr',
                'type' => 'color',
                'mode' => '-webkit-text-stroke-color',
                'output' => array( '#nt-index .page-header .text-bg' ),
                'required' => array( 'blog_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__( 'Big Title Top Offset', 'wavo' ),
                'subtitle' => esc_html__( 'You can control blog big title top offset.', 'wavo' ),
                'id' => 'blog_big_title_top_pos',
                'type' => 'spacing',
                'output' => array('#nt-index .page-header .text-bg'),
                'mode' => 'absolute',
                'units' => array('px'),
                'all' => false,
                'top' => true,
                'right' => false,
                'bottom' => false,
                'left' => false,
                'default' => array(
                    'top' => '60',
                    'units' => 'px'
                ),
                'required' => array( 'blog_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__( 'Blog Title', 'wavo' ),
                'subtitle' => esc_html__( 'Add your blog index page title here.', 'wavo' ),
                'id' => 'blog_title',
                'type' => 'text',
                'default' => 'BLOG',
                'required' => array( 'blog_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Blog Title Typography', 'wavo' ),
                'id' => 'blog_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-index .nt-hero-title' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'blog_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__( 'Blog Site Title', 'wavo' ),
                'subtitle' => esc_html__( 'Add your blog index page site title here.', 'wavo' ),
                'id' => 'blog_site_title',
                'type' => 'textarea',
                'default' => get_bloginfo('name' ),
                'required' => array( 'blog_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Blog Site Title Typography', 'wavo' ),
                'id' => 'blog_site_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-index .nt-hero-desc' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'blog_hero_visibility', '=', '1' )
            )
    )));
    // BLOG LAYOUT AND POST COLUMN STYLE
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Blog Content', 'wavo' ),
        'id' => 'blogcontentsubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Blog page type', 'wavo' ),
                'subtitle' => esc_html__( 'Select blog page layout type.', 'wavo' ),
                'id' => 'index_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    '' => esc_html__( 'Select type', 'wavo' ),
                    'default' => esc_html__( 'default', 'wavo' ),
                    'grid' => esc_html__( 'grid', 'wavo' ),
                ),
                'default' => 'default'
            ),
            array(
                'title' => esc_html__( 'Blog page container width type', 'wavo' ),
                'subtitle' => esc_html__( 'Select blog page container width type.', 'wavo' ),
                'id' => 'index_container_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    '' => esc_html__( 'Select type', 'wavo' ),
                    'boxed' => esc_html__( 'Default Boxed', 'wavo' ),
                    'fluid' => esc_html__( 'Fluid', 'wavo' ),
                ),
                'default' => 'boxed'
            ),
            array(
                'title' => esc_html__( 'Blog page post column width', 'wavo' ),
                'subtitle' => esc_html__( 'Select a column number.', 'wavo' ),
                'id' => 'index_post_column',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    '' => esc_html__( 'Select type', 'wavo' ),
                    'col-lg-6' => esc_html__( '2 column', 'wavo' ),
                    'col-lg-4' => esc_html__( '3 column', 'wavo' )
                ),
                'default' => 'col-lg-6',
                'required' => array( 'index_type', '=', 'grid' )
            ),
            array(
                'title' => esc_html__( 'Blog Post Title Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site blog index page post title with switch option.', 'wavo' ),
                'id' => 'post_title_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Blog Post Author Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site blog index page post author with switch option.', 'wavo' ),
                'id' => 'post_author_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Blog Post Tags Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site blog index page post tags with switch option.', 'wavo' ),
                'id' => 'post_tags_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Blog Post Date Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site blog index page post date with switch option.', 'wavo' ),
                'id' => 'post_date_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
            ),
            array(
                'title' => esc_html__( 'Blog Post Excerpt Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site blog index page post meta with switch option.', 'wavo' ),
                'id' => 'post_excerpt_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Post Excerpt Size (max word count)', 'wavo' ),
                'subtitle' => esc_html__( 'You can control blog post excerpt size with this option.', 'wavo' ),
                'id' => 'excerptsz',
                'type' => 'slider',
                'default' => 30,
                'min' => 0,
                'step' => 1,
                'max' => 100,
                'display_value' => 'text',
                'required' => array( 'post_excerpt_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Blog Post Button Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site blog index page post read more button wityh switch option.', 'wavo' ),
                'id' => 'post_button_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Blog Post Button Title', 'wavo' ),
                'subtitle' => esc_html__( 'Add your blog post read more button title here.', 'wavo' ),
                'id' => 'post_button_title',
                'type' => 'text',
                'default' => esc_html__( 'Read More', 'wavo' ),
                'required' => array( 'post_button_visibility', '=', '1' )
            )
    )));

    /*************************************************
    ## SINGLE PAGE SECTION
    *************************************************/
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Single Page', 'wavo' ),
        'id' => 'singlesection',
        'icon' => 'el el-home-alt',
    ));
    // SINGLE HERO SUBSECTION
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Single Hero', 'wavo' ),
        'desc' => esc_html__( 'These are single page hero section settings!', 'wavo' ),
        'id' => 'singleherosubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Single Hero display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site single page hero section with switch option.', 'wavo' ),
                'id' => 'single_hero_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Use Elementor Template For Single Hero?', 'wavo' ),
                'subtitle' => esc_html__( 'Please open this option, If you want to use elementor template instead of the default single hero section.', 'wavo' ),
                'id' => 'use_elementor_for_single_hero',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Elementor Templates', 'wavo' ),
                'subtitle' => esc_html__( 'Select a template from elementor templates.', 'wavo' ),
                'id' => 'single_hero_elementor_templates',
                'type' => 'select',
                'customizer' => true,
                'options' => wavo_get_elementorTemplates(),
                'required' => array(
                    array( 'single_hero_visibility', '=', '1' ),
                    array( 'use_elementor_for_single_hero', '=', '1' )
                )
            ),
            array(
                'title' => esc_html__( 'Single Hero Background', 'wavo' ),
                'id' => 'single_hero_bg',
                'type' => 'background',
                'output' => array( '#nt-single .page-header' ),
                'required' => array(
                    array( 'single_hero_visibility', '=', '1' ),
                    array( 'use_elementor_for_single_hero', '=', '0' )
                )
            ),
            array(
                'title' => esc_html__( 'Single Hero Title Tag', 'wavo' ),
                'id' => 'single_hero_title_tag',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'h1' => esc_html__( 'H1', 'wavo' ),
                    'h2' => esc_html__( 'H2', 'wavo' ),
                    'h3' => esc_html__( 'H3', 'wavo' ),
                    'h4' => esc_html__( 'H4', 'wavo' ),
                    'h5' => esc_html__( 'H5', 'wavo' ),
                    'h6' => esc_html__( 'H6', 'wavo' ),
                    'div' => esc_html__( 'div', 'wavo' ),
                ),
                'default' => 'h2'
            ),
            array(
                'title' => esc_html__( 'Single Title Typography', 'wavo' ),
                'id' => 'single_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-single .page-header h2' ),
                'units' => 'px',
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array(
                    array( 'single_hero_visibility', '=', '1' ),
                    array( 'use_elementor_for_single_hero', '=', '0' )
                )
            ),
            array(
                'title' => esc_html__( 'Hero Post Meta Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site single page post meta tags with switch option.', 'wavo' ),
                'id' => 'single_hero_postmeta_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array(
                    array( 'single_hero_visibility', '=', '1' ),
                    array( 'use_elementor_for_single_hero', '=', '0' )
                )
            ),
            array(
                'title' => esc_html__( 'Hero Post Meta Typography', 'wavo' ),
                'id' => 'single_site_meta_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-single .cont .info p,#nt-single .cont .info a' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array(
                    array( 'single_hero_visibility', '=', '1' ),
                    array( 'use_elementor_for_single_hero', '=', '0' ),
                    array( 'single_hero_postmeta_visibility', '=', '1' )
                )
            ),
            array(
                'title' => esc_html__( 'Single Thumbnail Display', 'wavo' ),
                'id' => 'single_thumb_visibility',
                'type' => 'switch',
                'default' => 1
            ),
            array(
                'title' => esc_html__( 'Thumbnail Image Size', 'wavo' ),
                'subtitle' => esc_html__( 'Default size: full', 'wavo' ),
                'customizer' => true,
                'id' => 'single_thumb_imgsize',
                'type' => 'select',
                'data' => 'image_sizes',
                'required' => array( 'single_thumb_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Single Thumbnail Parallax Effect', 'wavo' ),
                'id' => 'single_parallax_thumb',
                'type' => 'switch',
                'default' => 1,
                'required' => array( 'single_thumb_visibility', '=', '1' )
            )
        )
    ));
    // SINGLE CONTENT SUBSECTION
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Single Content', 'wavo' ),
        'id' => 'singlecontentsubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Single Post Tags Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site single page post meta tags with switch option.', 'wavo' ),
                'id' => 'single_postmeta_tags_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Single Post Authorbox', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site single page post authorbox with switch option.', 'wavo' ),
                'id' => 'single_post_author_box_visibility',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Single Post Pagination Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site single page post next and prev pagination with switch option.', 'wavo' ),
                'id' => 'single_navigation_visibility',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Single Related Post Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site single page related post with switch option.', 'wavo' ),
                'id' => 'single_related_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Single Related Background', 'wavo' ),
                'id' => 'single_related_bg_pattern',
                'type' => 'background',
                'output' => array( '.nt-single .work-carousel .stories,.nt-single .work-carousel:not(.bg-img)' ),
                'required' => array( 'single_related_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Single Related Post Style', 'wavo' ),
                'id' => 'single_related_post_style',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    '' => esc_html__( 'Select type', 'wavo' ),
                    '1' => esc_html__( 'Stle 1', 'wavo' ),
                    '2' => esc_html__( 'Stle 2', 'wavo' ),
                ),
                'default' => '1',
                'required' => array( 'single_related_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Single Related Post Count', 'wavo' ),
                'subtitle' => esc_html__( 'You can control related post count with this option.', 'wavo' ),
                'id' => 'related_perpage',
                'type' => 'slider',
                'default' => 3,
                'min' => 1,
                'step' => 1,
                'max' => 24,
                'display_value' => 'text',
                'required' => array( 'single_related_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Related Background Big Title Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site single page related post with switch option.', 'wavo' ),
                'id' => 'related_bgtitle_visibility',
                'type' => 'switch',
                'default' => 1,
                'required' => array( 'single_related_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Related Section Background Big Title', 'wavo' ),
                'subtitle' => esc_html__( 'Add your single page related post section big title here.', 'wavo' ),
                'id' => 'related_bgtitle',
                'type' => 'text',
                'default' => '',
                'required' => array(
                    array( 'single_related_visibility', '=', '1' ),
                    array( 'related_bgtitle_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__( 'Related Section Background Big Title Typography', 'wavo' ),
                'id' => 'related_bgtitle_typo',
                'type' => 'typography',
                'font-backup' => false,
                'all_styles' => true,
                'output' => array( '#nt-single .nt-related-post .text-bg' ),
                'required' => array(
                    array( 'single_related_visibility', '=', '1' ),
                    array( 'related_bgtitle_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__( 'Related Section Sub-Title Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site single page related post with switch option.', 'wavo' ),
                'id' => 'related_subtitle_visibility',
                'type' => 'switch',
                'default' => 1,
                'required' => array( 'single_related_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Related Section Sub-Title', 'wavo' ),
                'subtitle' => esc_html__( 'Add your single page related post section sub-title here.', 'wavo' ),
                'id' => 'related_subtitle',
                'type' => 'text',
                'default' => '',
                'required' => array(
                    array( 'single_related_visibility', '=', '1' ),
                    array( 'related_subtitle_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__( 'Related Section Background Big Title Typography', 'wavo' ),
                'id' => 'related_subtitle_typo',
                'type' => 'typography',
                'font-backup' => false,
                'all_styles' => true,
                'output' => array( '#nt-single .nt-related-post .section-head h6' ),
                'required' => array(
                    array( 'single_related_visibility', '=', '1' ),
                    array( 'related_bgtitle_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__( 'Related Section Title Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site single page related post with switch option.', 'wavo' ),
                'id' => 'related_title_visibility',
                'type' => 'switch',
                'default' => 1,
                'required' => array( 'single_related_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Related Section Title', 'wavo' ),
                'subtitle' => esc_html__( 'Add your single page related post section title here.', 'wavo' ),
                'id' => 'related_title',
                'type' => 'text',
                'default' => '',
                'required' => array(
                    array( 'single_related_visibility', '=', '1' ),
                    array( 'related_title_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__( 'Related Section Background Big Title Typography', 'wavo' ),
                'id' => 'related_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'all_styles' => true,
                'output' => array( '#nt-single .nt-related-post .section-head h3' ),
                'required' => array(
                    array( 'single_related_visibility', '=', '1' ),
                    array( 'related_bgtitle_visibility', '=', '1' ),
                )
            )
    )));
    /*************************************************
    ## ARCHIVE PAGE SECTION
    *************************************************/
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Archive Page', 'wavo' ),
        'id' => 'archivesection',
        'icon' => 'el el-folder-open',
    ));
    // ARCHIVE PAGE SECTION
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Archive Hero', 'wavo' ),
        'desc' => esc_html__( 'These are archive page hero settings!', 'wavo' ),
        'id' => 'archiveherosubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Archive Hero display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site archive page hero section with switch option.', 'wavo' ),
                'id' => 'archive_hero_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
            ),
            array(
                'title' => esc_html__( 'Archive Hero Background', 'wavo' ),
                'id' => 'archive_hero_bg',
                'type' => 'background',
                'output' => array( '#nt-archive .page-header' ),
                'required' => array( 'archive_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__( 'Custom Archive Title', 'wavo' ),
                'subtitle' => esc_html__( 'Add your custom archive page title here.', 'wavo' ),
                'id' => 'archive_title',
                'type' => 'text',
                'default' => esc_html__( 'ARCHIVE', 'wavo' ),
                'required' => array( 'archive_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__( 'Archive Title Typography', 'wavo' ),
                'id' => 'archive_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-archive .nt-hero-title' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'archive_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__( 'Archive Site Title', 'wavo' ),
                'subtitle' => esc_html__( 'Add your archive page site title here.', 'wavo' ),
                'id' => 'archive_site_title',
                'type' => 'textarea',
                'default' => get_bloginfo('name' ),
                'required' => array( 'archive_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__( 'Archive Site Title Typography', 'wavo' ),
                'id' => 'archive_site_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-archive .nt-hero-desc' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'archive_hero_visibility', '=', '1' ),
            )
    )));
    /*************************************************
    ## 404 PAGE SECTION
    *************************************************/
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( '404 Page', 'wavo' ),
        'id' => 'errorsection',
        'icon' => 'el el-error',
        'fields' => array(
            array(
                'title' => esc_html__( '404 Type', 'wavo' ),
                'subtitle' => esc_html__( 'Select your 404 page type.', 'wavo' ),
                'id' => 'error_page_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'default' => esc_html__( 'Deafult', 'wavo' ),
                    'elementor' => esc_html__( 'Elementor Templates', 'wavo' ),
                ),
                'default' => 'default'
            ),
            array(
                'title' => esc_html__( 'Elementor Templates', 'wavo' ),
                'subtitle' => esc_html__( 'Select a template from elementor templates.', 'wavo' ),
                'id' => 'error_page_elementor_templates',
                'type' => 'select',
                'customizer' => true,
                'options' => wavo_get_elementorTemplates(),
                'required' => array( 'error_page_type', '=', 'elementor' )
            ),
            array(
                'title' => esc_html__( '404 Background', 'wavo' ),
                'id' => 'error_content_bg_img',
                'type' => 'background',
                'output' => array( '#nt-404 .call-action:before' ),
                'required' => array( 'error_page_type', '=', 'default' )
            ),
            array(
                'title' => esc_html__( '404 Background Overlay Opacity', 'wavo' ),
                'id' => 'error_content_bg_img_opacity',
                'type' => 'slider',
                'default' => .04,
                'min' => 0,
                'max' => 1,
                'step' => .01,
                'resolution' => 0.01,
                'display_value' => 'text',
                'required' => array( 'error_page_type', '=', 'default' )
            ),
            array(
                'title' => esc_html__( 'Content Title Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site 404 page content title with switch option.', 'wavo' ),
                'id' => 'error_content_subtitle_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'error_page_type', '=', 'default' )
            ),
            array(
                'title' => esc_html__( 'Content Subtitle', 'wavo' ),
                'subtitle' => esc_html__( 'Add your 404 page content subtitle here.', 'wavo' ),
                'id' => 'error_content_subtitle',
                'type' => 'textarea',
                'default' => '<h6>page not found</h6>',
                'required' => array(
                    array( 'error_page_type', '=', 'default' ),
                    array( 'error_content_subtitle_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__( 'Subtitle Typography', 'wavo' ),
                'id' => 'error_content_subtitle_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-404 .content h6' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array(
                    array( 'error_page_type', '=', 'default' ),
                    array( 'error_content_subtitle_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__( 'Content Title Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site 404 page content title with switch option.', 'wavo' ),
                'id' => 'error_content_title_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'error_page_type', '=', 'default' )
            ),
            array(
                'title' => esc_html__( 'Content Title', 'wavo' ),
                'subtitle' => esc_html__( 'Add your 404 page content title here.', 'wavo' ),
                'id' => 'error_content_title',
                'type' => 'textarea',
                'default' => '<h2>404 <b>Page</b> .</h2>',
                'required' => array(
                    array( 'error_page_type', '=', 'default' ),
                    array( 'error_content_title_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__( 'Title Typography', 'wavo' ),
                'id' => 'error_content_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-404 .content h2' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array(
                    array( 'error_page_type', '=', 'default' ),
                    array( 'error_content_title_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__( 'Content Description Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site 404 page content description with switch option.', 'wavo' ),
                'id' => 'error_content_desc_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'error_page_type', '=', 'default' )
            ),
            array(
                'title' => esc_html__( 'Content Description', 'wavo' ),
                'subtitle' => esc_html__( 'Add your 404 page content description here.', 'wavo' ),
                'id' => 'error_content_desc',
                'type' => 'textarea',
                'default' => 'Sorry, but the page you are looking for does not exist or has been removed',
                'required' => array(
                    array( 'error_page_type', '=', 'default' ),
                    array( 'error_content_desc_visibility', '=', '1' ),
                )
            ),
            array(
                'title' =>esc_html__( 'Description Typography', 'wavo' ),
                'id' => 'error_page_content_desc_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-404 .content p' ),
                'default' => array(
                    'color' =>'',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array(
                    array( 'error_page_type', '=', 'default' ),
                    array( 'error_content_desc_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__( 'Button Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site 404 page content back to home button with switch option.', 'wavo' ),
                'id' => 'error_content_btn_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'error_page_type', '=', 'default' )
            ),
            array(
                'title' => esc_html__( 'Button Title', 'wavo' ),
                'subtitle' => esc_html__( 'Add your 404 page content back to home button title here.', 'wavo' ),
                'id' => 'error_content_btn_title',
                'type' => 'text',
                'default' => 'Go to home page',
                'required' => array(
                    array( 'error_page_type', '=', 'default' ),
                    array( 'error_content_btn_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__( 'Search Form Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site 404 page content search form with switch option.', 'wavo' ),
                'id' => 'error_content_form_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'error_page_type', '=', 'default' )
            ),
    )));
    /*************************************************
    ## SEARCH PAGE SECTION
    *************************************************/
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Search Page', 'wavo' ),
        'id' => 'searchsection',
        'icon' => 'el el-search',
    ));
    //SEARCH PAGE SECTION
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Search Hero', 'wavo' ),
        'id' => 'searchherosubsection',
        'desc' => esc_html__( 'These are main settings for general theme!', 'wavo' ),
        'icon' => 'el el-brush',
        'subsection' => true,
        'fields' => array(
            array(
                'title' => esc_html__( 'Search Hero display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site search page hero section with switch option.', 'wavo' ),
                'id' => 'search_hero_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Search Hero Background', 'wavo' ),
                'id' =>'search_hero_bg',
                'type' => 'background',
                'output' => array( '#nt-search .page-header' ),
                'required' => array( 'search_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Search Title', 'wavo' ),
                'subtitle' => esc_html__( 'Add your search page title here.', 'wavo' ),
                'id' => 'search_title',
                'type' => 'text',
                'default' => esc_html__( 'Search results for :', 'wavo' ),
                'required' => array( 'search_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Search Title Typography', 'wavo' ),
                'id' => 'search_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-search .nt-hero-title' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'search_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Search Site Title', 'wavo' ),
                'subtitle' => esc_html__( 'Add your search page site title here.', 'wavo' ),
                'id' => 'search_site_title',
                'type' => 'textarea',
                'default' => get_bloginfo('name' ),
                'required' => array( 'search_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Search Site Title Typography', 'wavo' ),
                'id' => 'search_site_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-search .nt-hero-desc' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'search_hero_visibility', '=', '1' )
            )
    )));
    //FOOTER SECTION
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Footer', 'wavo' ),
        'desc' => esc_html__( 'These are main settings for general theme!', 'wavo' ),
        'id' => 'footersection',
        'icon' => 'el el-photo',
        'fields' => array(
            array(
                'title' => esc_html__( 'Footer Section Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site footer copyright and footer widget area on the site with switch option.', 'wavo' ),
                'id' => 'footer_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Footer Type', 'wavo' ),
                'subtitle' => esc_html__( 'Select your footer type.', 'wavo' ),
                'id' => 'footer_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'default' => esc_html__( 'Deafult Site Footer', 'wavo' ),
                    'elementor' => esc_html__( 'Elementor Templates', 'wavo' ),
                ),
                'default' => 'default',
                'required' => array( 'footer_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Elementor Templates', 'wavo' ),
                'subtitle' => esc_html__( 'Select a template from elementor templates.', 'wavo' ),
                'id' => 'footer_elementor_templates',
                'type' => 'select',
                'customizer' => true,
                'options' => wavo_get_elementorTemplates(),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'elementor' )
                )
            ),
            array(
                'title' => esc_html__( 'Copyright Left Section Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site footer left section on the site with switch option.', 'wavo' ),
                'id' => 'footer_copyright_left_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Copyright Left Text', 'wavo' ),
                'subtitle' => esc_html__( 'HTML allowed (wp_kses)', 'wavo' ),
                'desc' => esc_html__( 'Enter your site copyright left text here.', 'wavo' ),
                'id' => 'footer_copyright_left',
                'type' => 'textarea',
                'validate' => 'html',
                'default' => esc_html__( 'All rights reserved by', 'wavo' ),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_copyright_left_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Copyright Right Section Display', 'wavo' ),
                'subtitle' => esc_html__( 'You can enable or disable the site footer left section on the site with switch option.', 'wavo' ),
                'id' => 'footer_copyright_right_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Copyright Right Text', 'wavo' ),
                'subtitle' => esc_html__( 'HTML allowed (wp_kses)', 'wavo' ),
                'desc' => esc_html__( 'Enter your site copyright right text here.', 'wavo' ),
                'id' => 'footer_copyright_right',
                'type' => 'textarea',
                'validate' => 'html',
                'default' => sprintf( '<p>&copy; %1$s, <a class="theme" href="%2$s">%3$s</a> Template. %4$s <a class="dev" href="https://ninetheme.com/contact/">%5$s</a></p>',
                    date( 'Y' ),
                    esc_url( home_url( '/' ) ),
                    get_bloginfo( 'name' ),
                    esc_html__( 'Made with passion by', 'wavo' ),
                    esc_html__( 'Ninetheme.', 'wavo' )
                ),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_copyright_right_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Text Alignment', 'wavo' ),
                'id' => 'footer_copyright_left_align',
                'type' => 'select',
                'default' => 'text-left',
                'customizer' => true,
                'options' => array(
                    '' => esc_html__( 'Select a option', 'wavo' ),
                    'text-left' => esc_html__( 'left', 'wavo' ),
                    'text-center' => esc_html__( 'center', 'wavo' ),
                    'text-right' => esc_html__( 'right', 'wavo' ),
                ),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_copyright_left_visibility', '=', '1' ),
                    array( 'footer_copyright_right_visibility', '=', '0' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Text Alignment', 'wavo' ),
                'id' => 'footer_copyright_right_align',
                'type' => 'select',
                'default' => 'text-right',
                'customizer' => true,
                'options' => array(
                    '' => esc_html__( 'Select a option', 'wavo' ),
                    'text-left' => esc_html__( 'left', 'wavo' ),
                    'text-center' => esc_html__( 'center', 'wavo' ),
                    'text-right' => esc_html__( 'right', 'wavo' ),
                ),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_copyright_left_visibility', '=', '0' ),
                    array( 'footer_copyright_right_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            //information on-off
            array(
                'id' =>'info_f0',
                'type' => 'info',
                'style' => 'success',
                'title' => esc_html__( 'Success!', 'wavo' ),
                'icon' => 'el el-info-circle',
                'customizer' => false,
                'desc' => sprintf(esc_html__( '%s section is disabled on the site.Please activate to view subsection options.', 'wavo' ), '<b>Site Main Footer</b>' ),
                'required' => array( 'footer_visibility', '=', '0' )
            )
    )));
    //FOOTER SECTION
    Redux::setSection($wavo_pre, array(
        'title' => esc_html__( 'Footer Style', 'wavo' ),
        'desc' => esc_html__( 'These are main settings for general theme!', 'wavo' ),
        'id' => 'footerstylesubsection',
        'icon' => 'el el-photo',
        'subsection' => true,
        'fields' => array(
            array(
                'id' =>'footer_color_customize',
                'type' => 'info',
                'icon' => 'el el-brush',
                'customizer' => false,
                'desc' => sprintf(esc_html__( '%s', 'wavo' ), '<h2>Footer Color Customize</h2>' ),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Footer Padding', 'wavo' ),
                'subtitle' => esc_html__( 'You can set the top spacing of the site main footer.', 'wavo' ),
                'id' => 'footer_pad',
                'type' => 'spacing',
                'output' => array('#nt-footer.footer-sm' ),
                'mode' => 'padding',
                'units' => array('em', 'px' ),
                'units_extended' => 'false',
                'default' => array(
                    'padding-top' => '',
                    'padding-right' => '',
                    'padding-bottom' => '',
                    'padding-left' => '',
                    'units' => 'px'
                ),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Footer Background Color', 'wavo' ),
                'desc' => esc_html__( 'Set your own colors for the footer.', 'wavo' ),
                'id' => 'footer_bg_clr',
                'type' => 'color',
                'mode' => 'background-color',
                'output' => array( '#nt-footer.footer-sm' ),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Copyright Text Color', 'wavo' ),
                'desc' => esc_html__( 'Set your own colors for the copyright.', 'wavo' ),
                'id' => 'footer_copy_clr',
                'type' => 'color',
                'transparent' => false,
                'output' => array( '#nt-footer.footer-sm, #nt-footer.footer-sm p' ),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Link Color', 'wavo' ),
                'desc' => esc_html__( 'Set your own colors for the copyright.', 'wavo' ),
                'id' => 'footer_link_clr',
                'type' => 'color',
                'transparent' => false,
                'output' => array( '#nt-footer.footer-sm a' ),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Link Color ( Hover )', 'wavo' ),
                'desc' => esc_html__( 'Set your own colors for the copyright.', 'wavo' ),
                'id' => 'footer_link_hvr_clr',
                'type' => 'color',
                'transparent' => false,
                'output' => array( '#nt-footer.footer-sm a:hover' ),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            //information on-off
            array(
                'id' =>'info_fc0',
                'type' => 'info',
                'style' => 'success',
                'title' => esc_html__( 'Success!', 'wavo' ),
                'icon' => 'el el-info-circle',
                'customizer' => false,
                'desc' => sprintf(esc_html__( '%s section is disabled on the site.Please activate to view subsection options.', 'wavo' ), '<b>Site Main Footer</b>' ),
                'required' => array( 'footer_visibility', '=', '0' )
            )
    )));

    Redux::setSection($wavo_pre, array(
        'id' => 'inportexport_settings',
        'title' => esc_html__( 'Import / Export', 'wavo' ),
        'desc' => esc_html__( 'Import and Export your Theme Options from text or URL.', 'wavo' ),
        'icon' => 'fa fa-download',
        'fields' => array(
            array(
                'id' => 'opt-import-export',
                'type' => 'import_export',
                'title' => '',
                'customizer' => false,
                'subtitle' => '',
                'full_width' => true
            )
    )));
    Redux::setSection($wavo_pre, array(
    'id' => 'nt_support_settings',
    'title' => esc_html__( 'Support', 'wavo' ),
    'icon' => 'el el-idea',
    'fields' => array(
        array(
            'id' => 'doc',
            'type' => 'raw',
            'markdown' => true,
            'class' => 'theme_support',
            'content' => '<div class="support-section">
            <h5>'.esc_html__( 'WE RECOMMEND YOU READ IT BEFORE YOU START', 'wavo' ).'</h5>
            <h2><i class="el el-website"></i> '.esc_html__( 'DOCUMENTATION', 'wavo' ).'</h2>
            <a target="_blank" class="button" href="https://ninetheme.com/docs/wavo/">'.esc_html__( 'READ MORE', 'wavo' ).'</a>
            </div>'
        ),
        array(
            'id' => 'support',
            'type' => 'raw',
            'markdown' => true,
            'class' => 'theme_support',
            'content' => '<div class="support-section">
            <h5>'.esc_html__( 'DO YOU NEED HELP?', 'wavo' ).'</h5>
            <h2><i class="el el-adult"></i> '.esc_html__( 'SUPPORT CENTER', 'wavo' ).'</h2>
            <a target="_blank" class="button" href="https://ninetheme.com/contact/">'.esc_html__( 'GET SUPPORT', 'wavo' ).'</a>
            </div>'
        ),
        array(
            'id' => 'portfolio',
            'type' => 'raw',
            'markdown' => true,
            'class' => 'theme_support',
            'content' => '<div class="support-section">
            <h5>'.esc_html__( 'SEE MORE THE NINETHEME WORDPRESS THEMES', 'wavo' ).'</h5>
            <h2><i class="el el-picture"></i> '.esc_html__( 'NINETHEME PORTFOLIO', 'wavo' ).'</h2>
            <a target="_blank" class="button" href="https://ninetheme.com/themes/">'.esc_html__( 'SEE MORE', 'wavo' ).'</a>
            </div>'
        ),
        array(
            'id' => 'like',
            'type' => 'raw',
            'markdown' => true,
            'class' => 'theme_support',
            'content' => '<div class="support-section">
            <h5>'.esc_html__( 'WOULD YOU LIKE TO REWARD OUR EFFORT?', 'wavo' ).'</h5>
            <h2><i class="el el-thumbs-up"></i> '.esc_html__( 'PLEASE RATE US!', 'wavo' ).'</h2>
            <a target="_blank" class="button" href="https://themeforest.net/downloads/">'.esc_html__( 'GET STARS', 'wavo' ).'</a>
            </div>'
        )
    )));
    /*
     * <--- END SECTIONS
     */


    /** Action hook examples **/

    function wavo_remove_demo()
    {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if (class_exists('ReduxFrameworkPlugin' )) {
            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action('admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ));
        }
    }
    //include get_template_directory() . '/inc/core/theme-options/redux-extensions/loader.php';
    function wavo_newIconFont() {
        // Uncomment this to remove elusive icon from the panel completely
        // wp_deregister_style( 'redux-elusive-icon' );
        // wp_deregister_style( 'redux-elusive-icon-ie7' );
        wp_register_style(
            'redux-font-awesome',
            '//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
            array(),
            time(),
            'all'
        );
        wp_enqueue_style( 'redux-font-awesome' );
    }
    add_action( 'redux/page/wavo/enqueue', 'wavo_newIconFont' );

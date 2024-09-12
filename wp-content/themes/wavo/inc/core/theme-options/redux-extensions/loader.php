<?php

// Replace {$wavo_opt_name} with your opt_name.
// Also be sure to change this function name!

if(!function_exists('wavo_register_custom_extension_loader')) :
    function wavo_register_custom_extension_loader($ReduxFramework) {

        $path = get_template_directory(). '/inc/core/theme-options/redux-extensions/extensions/';

        $folders = scandir( $path, 1 );
        foreach ( $folders as $folder ) {
            if ( $folder === '.' or $folder === '..' or ! is_dir( $path . $folder ) ) {
                continue;
            }
            $extension_class = 'ReduxFramework_Extension_' . $folder;
            if ( ! class_exists( $extension_class ) ) {
                // In case you wanted override your override, hah.
                $class_file = $path . $folder . '/extension_' . $folder . '.php';
                $class_file = apply_filters( $path . $ReduxFramework->args['opt_name'] . '/' . $folder, $class_file );
                if ( $class_file ) {
                    require_once( $class_file );
                }
            }
            if ( ! isset( $ReduxFramework->extensions[ $folder ] ) ) {
                $ReduxFramework->extensions[ $folder ] = new $extension_class( $ReduxFramework );
            }
        }
    }
    // Modify {$wavo_opt_name} to match your opt_name
    add_action("redux/extensions/{$wavo_pre}/before", 'wavo_register_custom_extension_loader', 0);
endif;

<?php

// scoper-autoload.php @generated by PhpScoper

// Backup the autoloaded Composer files
if (isset($GLOBALS['__composer_autoload_files'])) {
    $existingComposerAutoloadFiles = $GLOBALS['__composer_autoload_files'];
}

$loader = require_once __DIR__.'/autoload.php';
// Ensure InstalledVersions is available
$installedVersionsPath = __DIR__.'/composer/InstalledVersions.php';
if (file_exists($installedVersionsPath)) require_once $installedVersionsPath;

// Restore the backup
if (isset($existingComposerAutoloadFiles)) {
    $GLOBALS['__composer_autoload_files'] = $existingComposerAutoloadFiles;
} else {
    unset($GLOBALS['__composer_autoload_files']);
}

// Class aliases. For more information see:
// https://github.com/humbug/php-scoper/blob/master/docs/further-reading.md#class-aliases
if (!function_exists('humbug_phpscoper_expose_class')) {
    function humbug_phpscoper_expose_class(string $exposed, string $prefixed): void {
        if (!class_exists($exposed, false) && !interface_exists($exposed, false) && !trait_exists($exposed, false)) {
            spl_autoload_call($prefixed);
        }
    }
}
humbug_phpscoper_expose_class('Mustache_Cache_AbstractCache', 'DynamicOOOS\Mustache_Cache_AbstractCache');
humbug_phpscoper_expose_class('Mustache_Cache_FilesystemCache', 'DynamicOOOS\Mustache_Cache_FilesystemCache');
humbug_phpscoper_expose_class('Mustache_Cache_NoopCache', 'DynamicOOOS\Mustache_Cache_NoopCache');
humbug_phpscoper_expose_class('Mustache_Exception_InvalidArgumentException', 'DynamicOOOS\Mustache_Exception_InvalidArgumentException');
humbug_phpscoper_expose_class('Mustache_Exception_LogicException', 'DynamicOOOS\Mustache_Exception_LogicException');
humbug_phpscoper_expose_class('Mustache_Exception_RuntimeException', 'DynamicOOOS\Mustache_Exception_RuntimeException');
humbug_phpscoper_expose_class('Mustache_Exception_SyntaxException', 'DynamicOOOS\Mustache_Exception_SyntaxException');
humbug_phpscoper_expose_class('Mustache_Exception_UnknownFilterException', 'DynamicOOOS\Mustache_Exception_UnknownFilterException');
humbug_phpscoper_expose_class('Mustache_Exception_UnknownHelperException', 'DynamicOOOS\Mustache_Exception_UnknownHelperException');
humbug_phpscoper_expose_class('Mustache_Exception_UnknownTemplateException', 'DynamicOOOS\Mustache_Exception_UnknownTemplateException');
humbug_phpscoper_expose_class('Mustache_Loader_ArrayLoader', 'DynamicOOOS\Mustache_Loader_ArrayLoader');
humbug_phpscoper_expose_class('Mustache_Loader_CascadingLoader', 'DynamicOOOS\Mustache_Loader_CascadingLoader');
humbug_phpscoper_expose_class('Mustache_Loader_FilesystemLoader', 'DynamicOOOS\Mustache_Loader_FilesystemLoader');
humbug_phpscoper_expose_class('Mustache_Loader_InlineLoader', 'DynamicOOOS\Mustache_Loader_InlineLoader');
humbug_phpscoper_expose_class('Mustache_Loader_MutableLoader', 'DynamicOOOS\Mustache_Loader_MutableLoader');
humbug_phpscoper_expose_class('Mustache_Loader_ProductionFilesystemLoader', 'DynamicOOOS\Mustache_Loader_ProductionFilesystemLoader');
humbug_phpscoper_expose_class('Mustache_Loader_StringLoader', 'DynamicOOOS\Mustache_Loader_StringLoader');
humbug_phpscoper_expose_class('Mustache_Logger_AbstractLogger', 'DynamicOOOS\Mustache_Logger_AbstractLogger');
humbug_phpscoper_expose_class('Mustache_Logger_StreamLogger', 'DynamicOOOS\Mustache_Logger_StreamLogger');
humbug_phpscoper_expose_class('Mustache_Source_FilesystemSource', 'DynamicOOOS\Mustache_Source_FilesystemSource');
humbug_phpscoper_expose_class('Mustache_Autoloader', 'DynamicOOOS\Mustache_Autoloader');
humbug_phpscoper_expose_class('Mustache_Cache', 'DynamicOOOS\Mustache_Cache');
humbug_phpscoper_expose_class('Mustache_Compiler', 'DynamicOOOS\Mustache_Compiler');
humbug_phpscoper_expose_class('Mustache_Context', 'DynamicOOOS\Mustache_Context');
humbug_phpscoper_expose_class('Mustache_Engine', 'DynamicOOOS\Mustache_Engine');
humbug_phpscoper_expose_class('Mustache_Exception', 'DynamicOOOS\Mustache_Exception');
humbug_phpscoper_expose_class('Mustache_HelperCollection', 'DynamicOOOS\Mustache_HelperCollection');
humbug_phpscoper_expose_class('Mustache_LambdaHelper', 'DynamicOOOS\Mustache_LambdaHelper');
humbug_phpscoper_expose_class('Mustache_Loader', 'DynamicOOOS\Mustache_Loader');
humbug_phpscoper_expose_class('Mustache_Logger', 'DynamicOOOS\Mustache_Logger');
humbug_phpscoper_expose_class('Mustache_Parser', 'DynamicOOOS\Mustache_Parser');
humbug_phpscoper_expose_class('Mustache_Source', 'DynamicOOOS\Mustache_Source');
humbug_phpscoper_expose_class('Mustache_Template', 'DynamicOOOS\Mustache_Template');
humbug_phpscoper_expose_class('Mustache_Tokenizer', 'DynamicOOOS\Mustache_Tokenizer');
humbug_phpscoper_expose_class('ComposerAutoloaderInit8e30170ffd6b7cc7d77bc9cdc9e62e1d', 'DynamicOOOS\ComposerAutoloaderInit8e30170ffd6b7cc7d77bc9cdc9e62e1d');
humbug_phpscoper_expose_class('Attribute', 'DynamicOOOS\Attribute');
humbug_phpscoper_expose_class('PhpToken', 'DynamicOOOS\PhpToken');
humbug_phpscoper_expose_class('Stringable', 'DynamicOOOS\Stringable');
humbug_phpscoper_expose_class('UnhandledMatchError', 'DynamicOOOS\UnhandledMatchError');
humbug_phpscoper_expose_class('ValueError', 'DynamicOOOS\ValueError');
humbug_phpscoper_expose_class('JsonException', 'DynamicOOOS\JsonException');
humbug_phpscoper_expose_class('Cpdf', 'DynamicOOOS\Cpdf');
humbug_phpscoper_expose_class('HTML5_Data', 'DynamicOOOS\HTML5_Data');
humbug_phpscoper_expose_class('HTML5_InputStream', 'DynamicOOOS\HTML5_InputStream');
humbug_phpscoper_expose_class('HTML5_Parser', 'DynamicOOOS\HTML5_Parser');
humbug_phpscoper_expose_class('HTML5_Tokenizer', 'DynamicOOOS\HTML5_Tokenizer');
humbug_phpscoper_expose_class('HTML5_TreeBuilder', 'DynamicOOOS\HTML5_TreeBuilder');
humbug_phpscoper_expose_class('ContentTest', 'DynamicOOOS\ContentTest');
humbug_phpscoper_expose_class('ErrorSample', 'DynamicOOOS\ErrorSample');
humbug_phpscoper_expose_class('Datamatrix', 'DynamicOOOS\Datamatrix');
humbug_phpscoper_expose_class('PDF417', 'DynamicOOOS\PDF417');
humbug_phpscoper_expose_class('QRcode', 'DynamicOOOS\QRcode');
humbug_phpscoper_expose_class('TCPDF_COLORS', 'DynamicOOOS\TCPDF_COLORS');
humbug_phpscoper_expose_class('TCPDF_FILTERS', 'DynamicOOOS\TCPDF_FILTERS');
humbug_phpscoper_expose_class('TCPDF_FONT_DATA', 'DynamicOOOS\TCPDF_FONT_DATA');
humbug_phpscoper_expose_class('TCPDF_FONTS', 'DynamicOOOS\TCPDF_FONTS');
humbug_phpscoper_expose_class('TCPDF_IMAGES', 'DynamicOOOS\TCPDF_IMAGES');
humbug_phpscoper_expose_class('TCPDF_STATIC', 'DynamicOOOS\TCPDF_STATIC');
humbug_phpscoper_expose_class('TCPDF', 'DynamicOOOS\TCPDF');
humbug_phpscoper_expose_class('TCPDFBarcode', 'DynamicOOOS\TCPDFBarcode');
humbug_phpscoper_expose_class('TCPDF2DBarcode', 'DynamicOOOS\TCPDF2DBarcode');
humbug_phpscoper_expose_class('TCPDF_IMPORT', 'DynamicOOOS\TCPDF_IMPORT');
humbug_phpscoper_expose_class('TCPDF_PARSER', 'DynamicOOOS\TCPDF_PARSER');
humbug_phpscoper_expose_class('Puc_v4_Factory', 'DynamicOOOS\Puc_v4_Factory');
humbug_phpscoper_expose_class('Puc_v4p13_Autoloader', 'DynamicOOOS\Puc_v4p13_Autoloader');
humbug_phpscoper_expose_class('Puc_v4p13_DebugBar_Extension', 'DynamicOOOS\Puc_v4p13_DebugBar_Extension');
humbug_phpscoper_expose_class('Puc_v4p13_DebugBar_Panel', 'DynamicOOOS\Puc_v4p13_DebugBar_Panel');
humbug_phpscoper_expose_class('Puc_v4p13_DebugBar_PluginExtension', 'DynamicOOOS\Puc_v4p13_DebugBar_PluginExtension');
humbug_phpscoper_expose_class('Puc_v4p13_DebugBar_PluginPanel', 'DynamicOOOS\Puc_v4p13_DebugBar_PluginPanel');
humbug_phpscoper_expose_class('Puc_v4p13_DebugBar_ThemePanel', 'DynamicOOOS\Puc_v4p13_DebugBar_ThemePanel');
humbug_phpscoper_expose_class('Puc_v4p13_Factory', 'DynamicOOOS\Puc_v4p13_Factory');
humbug_phpscoper_expose_class('Puc_v4p13_InstalledPackage', 'DynamicOOOS\Puc_v4p13_InstalledPackage');
humbug_phpscoper_expose_class('Puc_v4p13_Metadata', 'DynamicOOOS\Puc_v4p13_Metadata');
humbug_phpscoper_expose_class('Puc_v4p13_OAuthSignature', 'DynamicOOOS\Puc_v4p13_OAuthSignature');
humbug_phpscoper_expose_class('Puc_v4p13_Plugin_Info', 'DynamicOOOS\Puc_v4p13_Plugin_Info');
humbug_phpscoper_expose_class('Puc_v4p13_Plugin_Package', 'DynamicOOOS\Puc_v4p13_Plugin_Package');
humbug_phpscoper_expose_class('Puc_v4p13_Plugin_Ui', 'DynamicOOOS\Puc_v4p13_Plugin_Ui');
humbug_phpscoper_expose_class('Puc_v4p13_Plugin_Update', 'DynamicOOOS\Puc_v4p13_Plugin_Update');
humbug_phpscoper_expose_class('Puc_v4p13_Plugin_UpdateChecker', 'DynamicOOOS\Puc_v4p13_Plugin_UpdateChecker');
humbug_phpscoper_expose_class('Puc_v4p13_Scheduler', 'DynamicOOOS\Puc_v4p13_Scheduler');
humbug_phpscoper_expose_class('Puc_v4p13_StateStore', 'DynamicOOOS\Puc_v4p13_StateStore');
humbug_phpscoper_expose_class('Puc_v4p13_Theme_Package', 'DynamicOOOS\Puc_v4p13_Theme_Package');
humbug_phpscoper_expose_class('Puc_v4p13_Theme_Update', 'DynamicOOOS\Puc_v4p13_Theme_Update');
humbug_phpscoper_expose_class('Puc_v4p13_Theme_UpdateChecker', 'DynamicOOOS\Puc_v4p13_Theme_UpdateChecker');
humbug_phpscoper_expose_class('Puc_v4p13_Update', 'DynamicOOOS\Puc_v4p13_Update');
humbug_phpscoper_expose_class('Puc_v4p13_UpdateChecker', 'DynamicOOOS\Puc_v4p13_UpdateChecker');
humbug_phpscoper_expose_class('Puc_v4p13_UpgraderStatus', 'DynamicOOOS\Puc_v4p13_UpgraderStatus');
humbug_phpscoper_expose_class('Puc_v4p13_Utils', 'DynamicOOOS\Puc_v4p13_Utils');
humbug_phpscoper_expose_class('Puc_v4p13_Vcs_Api', 'DynamicOOOS\Puc_v4p13_Vcs_Api');
humbug_phpscoper_expose_class('Puc_v4p13_Vcs_BaseChecker', 'DynamicOOOS\Puc_v4p13_Vcs_BaseChecker');
humbug_phpscoper_expose_class('Puc_v4p13_Vcs_BitBucketApi', 'DynamicOOOS\Puc_v4p13_Vcs_BitBucketApi');
humbug_phpscoper_expose_class('Puc_v4p13_Vcs_GitHubApi', 'DynamicOOOS\Puc_v4p13_Vcs_GitHubApi');
humbug_phpscoper_expose_class('Puc_v4p13_Vcs_GitLabApi', 'DynamicOOOS\Puc_v4p13_Vcs_GitLabApi');
humbug_phpscoper_expose_class('Puc_v4p13_Vcs_PluginUpdateChecker', 'DynamicOOOS\Puc_v4p13_Vcs_PluginUpdateChecker');
humbug_phpscoper_expose_class('Puc_v4p13_Vcs_Reference', 'DynamicOOOS\Puc_v4p13_Vcs_Reference');
humbug_phpscoper_expose_class('Puc_v4p13_Vcs_ThemeUpdateChecker', 'DynamicOOOS\Puc_v4p13_Vcs_ThemeUpdateChecker');
humbug_phpscoper_expose_class('Parsedown', 'DynamicOOOS\Parsedown');
humbug_phpscoper_expose_class('PucReadmeParser', 'DynamicOOOS\PucReadmeParser');

// Function aliases. For more information see:
// https://github.com/humbug/php-scoper/blob/master/docs/further-reading.md#function-aliases
if (!function_exists('__')) { function __() { return \DynamicOOOS\__(...func_get_args()); } }
if (!function_exists('_cleanup_header_comment')) { function _cleanup_header_comment() { return \DynamicOOOS\_cleanup_header_comment(...func_get_args()); } }
if (!function_exists('_x')) { function _x() { return \DynamicOOOS\_x(...func_get_args()); } }
if (!function_exists('add_action')) { function add_action() { return \DynamicOOOS\add_action(...func_get_args()); } }
if (!function_exists('add_filter')) { function add_filter() { return \DynamicOOOS\add_filter(...func_get_args()); } }
if (!function_exists('add_query_arg')) { function add_query_arg() { return \DynamicOOOS\add_query_arg(...func_get_args()); } }
if (!function_exists('apply_filters')) { function apply_filters() { return \DynamicOOOS\apply_filters(...func_get_args()); } }
if (!function_exists('array_key_first')) { function array_key_first() { return \DynamicOOOS\array_key_first(...func_get_args()); } }
if (!function_exists('array_key_last')) { function array_key_last() { return \DynamicOOOS\array_key_last(...func_get_args()); } }
if (!function_exists('balanceTags')) { function balanceTags() { return \DynamicOOOS\balanceTags(...func_get_args()); } }
if (!function_exists('check_admin_referer')) { function check_admin_referer() { return \DynamicOOOS\check_admin_referer(...func_get_args()); } }
if (!function_exists('check_ajax_referer')) { function check_ajax_referer() { return \DynamicOOOS\check_ajax_referer(...func_get_args()); } }
if (!function_exists('composerRequire8e30170ffd6b7cc7d77bc9cdc9e62e1d')) { function composerRequire8e30170ffd6b7cc7d77bc9cdc9e62e1d() { return \DynamicOOOS\composerRequire8e30170ffd6b7cc7d77bc9cdc9e62e1d(...func_get_args()); } }
if (!function_exists('ctype_alnum')) { function ctype_alnum() { return \DynamicOOOS\ctype_alnum(...func_get_args()); } }
if (!function_exists('ctype_alpha')) { function ctype_alpha() { return \DynamicOOOS\ctype_alpha(...func_get_args()); } }
if (!function_exists('ctype_cntrl')) { function ctype_cntrl() { return \DynamicOOOS\ctype_cntrl(...func_get_args()); } }
if (!function_exists('ctype_digit')) { function ctype_digit() { return \DynamicOOOS\ctype_digit(...func_get_args()); } }
if (!function_exists('ctype_graph')) { function ctype_graph() { return \DynamicOOOS\ctype_graph(...func_get_args()); } }
if (!function_exists('ctype_lower')) { function ctype_lower() { return \DynamicOOOS\ctype_lower(...func_get_args()); } }
if (!function_exists('ctype_print')) { function ctype_print() { return \DynamicOOOS\ctype_print(...func_get_args()); } }
if (!function_exists('ctype_punct')) { function ctype_punct() { return \DynamicOOOS\ctype_punct(...func_get_args()); } }
if (!function_exists('ctype_space')) { function ctype_space() { return \DynamicOOOS\ctype_space(...func_get_args()); } }
if (!function_exists('ctype_upper')) { function ctype_upper() { return \DynamicOOOS\ctype_upper(...func_get_args()); } }
if (!function_exists('ctype_xdigit')) { function ctype_xdigit() { return \DynamicOOOS\ctype_xdigit(...func_get_args()); } }
if (!function_exists('current_filter')) { function current_filter() { return \DynamicOOOS\current_filter(...func_get_args()); } }
if (!function_exists('current_user_can')) { function current_user_can() { return \DynamicOOOS\current_user_can(...func_get_args()); } }
if (!function_exists('d')) { function d() { return \DynamicOOOS\d(...func_get_args()); } }
if (!function_exists('dce_admin_notice_maximum_php_version')) { function dce_admin_notice_maximum_php_version() { return \DynamicOOOS\dce_admin_notice_maximum_php_version(...func_get_args()); } }
if (!function_exists('dce_admin_notice_minimum_elementor_pro_version')) { function dce_admin_notice_minimum_elementor_pro_version() { return \DynamicOOOS\dce_admin_notice_minimum_elementor_pro_version(...func_get_args()); } }
if (!function_exists('dce_admin_notice_minimum_elementor_version')) { function dce_admin_notice_minimum_elementor_version() { return \DynamicOOOS\dce_admin_notice_minimum_elementor_version(...func_get_args()); } }
if (!function_exists('dce_admin_notice_minimum_php_version')) { function dce_admin_notice_minimum_php_version() { return \DynamicOOOS\dce_admin_notice_minimum_php_version(...func_get_args()); } }
if (!function_exists('dce_admin_notice_suggest_new_php_version')) { function dce_admin_notice_suggest_new_php_version() { return \DynamicOOOS\dce_admin_notice_suggest_new_php_version(...func_get_args()); } }
if (!function_exists('dce_enqueue_admin_styles')) { function dce_enqueue_admin_styles() { return \DynamicOOOS\dce_enqueue_admin_styles(...func_get_args()); } }
if (!function_exists('dce_fail_load')) { function dce_fail_load() { return \DynamicOOOS\dce_fail_load(...func_get_args()); } }
if (!function_exists('dce_load')) { function dce_load() { return \DynamicOOOS\dce_load(...func_get_args()); } }
if (!function_exists('dd')) { function dd() { return \DynamicOOOS\dd(...func_get_args()); } }
if (!function_exists('decodeit')) { function decodeit() { return \DynamicOOOS\decodeit(...func_get_args()); } }
if (!function_exists('delete_site_option')) { function delete_site_option() { return \DynamicOOOS\delete_site_option(...func_get_args()); } }
if (!function_exists('delete_site_transient')) { function delete_site_transient() { return \DynamicOOOS\delete_site_transient(...func_get_args()); } }
if (!function_exists('did_action')) { function did_action() { return \DynamicOOOS\did_action(...func_get_args()); } }
if (!function_exists('do_action')) { function do_action() { return \DynamicOOOS\do_action(...func_get_args()); } }
if (!function_exists('dump')) { function dump() { return \DynamicOOOS\dump(...func_get_args()); } }
if (!function_exists('encodeit')) { function encodeit() { return \DynamicOOOS\encodeit(...func_get_args()); } }
if (!function_exists('esc_attr')) { function esc_attr() { return \DynamicOOOS\esc_attr(...func_get_args()); } }
if (!function_exists('esc_html')) { function esc_html() { return \DynamicOOOS\esc_html(...func_get_args()); } }
if (!function_exists('esc_html__')) { function esc_html__() { return \DynamicOOOS\esc_html__(...func_get_args()); } }
if (!function_exists('esc_url')) { function esc_url() { return \DynamicOOOS\esc_url(...func_get_args()); } }
if (!function_exists('fdiv')) { function fdiv() { return \DynamicOOOS\fdiv(...func_get_args()); } }
if (!function_exists('get_available_languages')) { function get_available_languages() { return \DynamicOOOS\get_available_languages(...func_get_args()); } }
if (!function_exists('get_bloginfo')) { function get_bloginfo() { return \DynamicOOOS\get_bloginfo(...func_get_args()); } }
if (!function_exists('get_core_updates')) { function get_core_updates() { return \DynamicOOOS\get_core_updates(...func_get_args()); } }
if (!function_exists('get_debug_type')) { function get_debug_type() { return \DynamicOOOS\get_debug_type(...func_get_args()); } }
if (!function_exists('get_file_data')) { function get_file_data() { return \DynamicOOOS\get_file_data(...func_get_args()); } }
if (!function_exists('get_footer')) { function get_footer() { return \DynamicOOOS\get_footer(...func_get_args()); } }
if (!function_exists('get_header')) { function get_header() { return \DynamicOOOS\get_header(...func_get_args()); } }
if (!function_exists('get_last_retrieve_url_contents_content_type')) { function get_last_retrieve_url_contents_content_type() { return \DynamicOOOS\get_last_retrieve_url_contents_content_type(...func_get_args()); } }
if (!function_exists('get_locale')) { function get_locale() { return \DynamicOOOS\get_locale(...func_get_args()); } }
if (!function_exists('get_option')) { function get_option() { return \DynamicOOOS\get_option(...func_get_args()); } }
if (!function_exists('get_permalink')) { function get_permalink() { return \DynamicOOOS\get_permalink(...func_get_args()); } }
if (!function_exists('get_plugin_data')) { function get_plugin_data() { return \DynamicOOOS\get_plugin_data(...func_get_args()); } }
if (!function_exists('get_plugins')) { function get_plugins() { return \DynamicOOOS\get_plugins(...func_get_args()); } }
if (!function_exists('get_post')) { function get_post() { return \DynamicOOOS\get_post(...func_get_args()); } }
if (!function_exists('get_post_type')) { function get_post_type() { return \DynamicOOOS\get_post_type(...func_get_args()); } }
if (!function_exists('get_queried_object')) { function get_queried_object() { return \DynamicOOOS\get_queried_object(...func_get_args()); } }
if (!function_exists('get_resource_id')) { function get_resource_id() { return \DynamicOOOS\get_resource_id(...func_get_args()); } }
if (!function_exists('get_search_form')) { function get_search_form() { return \DynamicOOOS\get_search_form(...func_get_args()); } }
if (!function_exists('get_site_option')) { function get_site_option() { return \DynamicOOOS\get_site_option(...func_get_args()); } }
if (!function_exists('get_site_transient')) { function get_site_transient() { return \DynamicOOOS\get_site_transient(...func_get_args()); } }
if (!function_exists('get_stylesheet')) { function get_stylesheet() { return \DynamicOOOS\get_stylesheet(...func_get_args()); } }
if (!function_exists('get_submit_button')) { function get_submit_button() { return \DynamicOOOS\get_submit_button(...func_get_args()); } }
if (!function_exists('get_template_part')) { function get_template_part() { return \DynamicOOOS\get_template_part(...func_get_args()); } }
if (!function_exists('get_term_meta')) { function get_term_meta() { return \DynamicOOOS\get_term_meta(...func_get_args()); } }
if (!function_exists('get_theme_root')) { function get_theme_root() { return \DynamicOOOS\get_theme_root(...func_get_args()); } }
if (!function_exists('get_theme_root_uri')) { function get_theme_root_uri() { return \DynamicOOOS\get_theme_root_uri(...func_get_args()); } }
if (!function_exists('get_user_locale')) { function get_user_locale() { return \DynamicOOOS\get_user_locale(...func_get_args()); } }
if (!function_exists('getallheaders')) { function getallheaders() { return \DynamicOOOS\getallheaders(...func_get_args()); } }
if (!function_exists('glob_recursive')) { function glob_recursive() { return \DynamicOOOS\glob_recursive(...func_get_args()); } }
if (!function_exists('have_posts')) { function have_posts() { return \DynamicOOOS\have_posts(...func_get_args()); } }
if (!function_exists('hrtime')) { function hrtime() { return \DynamicOOOS\hrtime(...func_get_args()); } }
if (!function_exists('human_time_diff')) { function human_time_diff() { return \DynamicOOOS\human_time_diff(...func_get_args()); } }
if (!function_exists('is_admin')) { function is_admin() { return \DynamicOOOS\is_admin(...func_get_args()); } }
if (!function_exists('is_category')) { function is_category() { return \DynamicOOOS\is_category(...func_get_args()); } }
if (!function_exists('is_countable')) { function is_countable() { return \DynamicOOOS\is_countable(...func_get_args()); } }
if (!function_exists('is_tag')) { function is_tag() { return \DynamicOOOS\is_tag(...func_get_args()); } }
if (!function_exists('is_tax')) { function is_tax() { return \DynamicOOOS\is_tax(...func_get_args()); } }
if (!function_exists('is_user_logged_in')) { function is_user_logged_in() { return \DynamicOOOS\is_user_logged_in(...func_get_args()); } }
if (!function_exists('is_wp_error')) { function is_wp_error() { return \DynamicOOOS\is_wp_error(...func_get_args()); } }
if (!function_exists('load_plugin_textdomain')) { function load_plugin_textdomain() { return \DynamicOOOS\load_plugin_textdomain(...func_get_args()); } }
if (!function_exists('load_textdomain')) { function load_textdomain() { return \DynamicOOOS\load_textdomain(...func_get_args()); } }
if (!function_exists('mb_check_encoding')) { function mb_check_encoding() { return \DynamicOOOS\mb_check_encoding(...func_get_args()); } }
if (!function_exists('mb_chr')) { function mb_chr() { return \DynamicOOOS\mb_chr(...func_get_args()); } }
if (!function_exists('mb_convert_case')) { function mb_convert_case() { return \DynamicOOOS\mb_convert_case(...func_get_args()); } }
if (!function_exists('mb_convert_encoding')) { function mb_convert_encoding() { return \DynamicOOOS\mb_convert_encoding(...func_get_args()); } }
if (!function_exists('mb_convert_variables')) { function mb_convert_variables() { return \DynamicOOOS\mb_convert_variables(...func_get_args()); } }
if (!function_exists('mb_decode_mimeheader')) { function mb_decode_mimeheader() { return \DynamicOOOS\mb_decode_mimeheader(...func_get_args()); } }
if (!function_exists('mb_decode_numericentity')) { function mb_decode_numericentity() { return \DynamicOOOS\mb_decode_numericentity(...func_get_args()); } }
if (!function_exists('mb_detect_encoding')) { function mb_detect_encoding() { return \DynamicOOOS\mb_detect_encoding(...func_get_args()); } }
if (!function_exists('mb_detect_order')) { function mb_detect_order() { return \DynamicOOOS\mb_detect_order(...func_get_args()); } }
if (!function_exists('mb_encode_mimeheader')) { function mb_encode_mimeheader() { return \DynamicOOOS\mb_encode_mimeheader(...func_get_args()); } }
if (!function_exists('mb_encode_numericentity')) { function mb_encode_numericentity() { return \DynamicOOOS\mb_encode_numericentity(...func_get_args()); } }
if (!function_exists('mb_encoding_aliases')) { function mb_encoding_aliases() { return \DynamicOOOS\mb_encoding_aliases(...func_get_args()); } }
if (!function_exists('mb_get_info')) { function mb_get_info() { return \DynamicOOOS\mb_get_info(...func_get_args()); } }
if (!function_exists('mb_http_input')) { function mb_http_input() { return \DynamicOOOS\mb_http_input(...func_get_args()); } }
if (!function_exists('mb_http_output')) { function mb_http_output() { return \DynamicOOOS\mb_http_output(...func_get_args()); } }
if (!function_exists('mb_internal_encoding')) { function mb_internal_encoding() { return \DynamicOOOS\mb_internal_encoding(...func_get_args()); } }
if (!function_exists('mb_language')) { function mb_language() { return \DynamicOOOS\mb_language(...func_get_args()); } }
if (!function_exists('mb_list_encodings')) { function mb_list_encodings() { return \DynamicOOOS\mb_list_encodings(...func_get_args()); } }
if (!function_exists('mb_ord')) { function mb_ord() { return \DynamicOOOS\mb_ord(...func_get_args()); } }
if (!function_exists('mb_output_handler')) { function mb_output_handler() { return \DynamicOOOS\mb_output_handler(...func_get_args()); } }
if (!function_exists('mb_parse_str')) { function mb_parse_str() { return \DynamicOOOS\mb_parse_str(...func_get_args()); } }
if (!function_exists('mb_scrub')) { function mb_scrub() { return \DynamicOOOS\mb_scrub(...func_get_args()); } }
if (!function_exists('mb_str_pad')) { function mb_str_pad() { return \DynamicOOOS\mb_str_pad(...func_get_args()); } }
if (!function_exists('mb_str_split')) { function mb_str_split() { return \DynamicOOOS\mb_str_split(...func_get_args()); } }
if (!function_exists('mb_stripos')) { function mb_stripos() { return \DynamicOOOS\mb_stripos(...func_get_args()); } }
if (!function_exists('mb_stristr')) { function mb_stristr() { return \DynamicOOOS\mb_stristr(...func_get_args()); } }
if (!function_exists('mb_strlen')) { function mb_strlen() { return \DynamicOOOS\mb_strlen(...func_get_args()); } }
if (!function_exists('mb_strpos')) { function mb_strpos() { return \DynamicOOOS\mb_strpos(...func_get_args()); } }
if (!function_exists('mb_strrchr')) { function mb_strrchr() { return \DynamicOOOS\mb_strrchr(...func_get_args()); } }
if (!function_exists('mb_strrichr')) { function mb_strrichr() { return \DynamicOOOS\mb_strrichr(...func_get_args()); } }
if (!function_exists('mb_strripos')) { function mb_strripos() { return \DynamicOOOS\mb_strripos(...func_get_args()); } }
if (!function_exists('mb_strrpos')) { function mb_strrpos() { return \DynamicOOOS\mb_strrpos(...func_get_args()); } }
if (!function_exists('mb_strstr')) { function mb_strstr() { return \DynamicOOOS\mb_strstr(...func_get_args()); } }
if (!function_exists('mb_strtolower')) { function mb_strtolower() { return \DynamicOOOS\mb_strtolower(...func_get_args()); } }
if (!function_exists('mb_strtoupper')) { function mb_strtoupper() { return \DynamicOOOS\mb_strtoupper(...func_get_args()); } }
if (!function_exists('mb_strwidth')) { function mb_strwidth() { return \DynamicOOOS\mb_strwidth(...func_get_args()); } }
if (!function_exists('mb_substitute_character')) { function mb_substitute_character() { return \DynamicOOOS\mb_substitute_character(...func_get_args()); } }
if (!function_exists('mb_substr')) { function mb_substr() { return \DynamicOOOS\mb_substr(...func_get_args()); } }
if (!function_exists('mb_substr_count')) { function mb_substr_count() { return \DynamicOOOS\mb_substr_count(...func_get_args()); } }
if (!function_exists('network_admin_url')) { function network_admin_url() { return \DynamicOOOS\network_admin_url(...func_get_args()); } }
if (!function_exists('nocache_headers')) { function nocache_headers() { return \DynamicOOOS\nocache_headers(...func_get_args()); } }
if (!function_exists('plugin_basename')) { function plugin_basename() { return \DynamicOOOS\plugin_basename(...func_get_args()); } }
if (!function_exists('plugin_dir_path')) { function plugin_dir_path() { return \DynamicOOOS\plugin_dir_path(...func_get_args()); } }
if (!function_exists('plugins_url')) { function plugins_url() { return \DynamicOOOS\plugins_url(...func_get_args()); } }
if (!function_exists('preg_last_error_msg')) { function preg_last_error_msg() { return \DynamicOOOS\preg_last_error_msg(...func_get_args()); } }
if (!function_exists('register_activation_hook')) { function register_activation_hook() { return \DynamicOOOS\register_activation_hook(...func_get_args()); } }
if (!function_exists('register_deactivation_hook')) { function register_deactivation_hook() { return \DynamicOOOS\register_deactivation_hook(...func_get_args()); } }
if (!function_exists('register_uninstall_hook')) { function register_uninstall_hook() { return \DynamicOOOS\register_uninstall_hook(...func_get_args()); } }
if (!function_exists('remove_action')) { function remove_action() { return \DynamicOOOS\remove_action(...func_get_args()); } }
if (!function_exists('remove_filter')) { function remove_filter() { return \DynamicOOOS\remove_filter(...func_get_args()); } }
if (!function_exists('sanitize_text_field')) { function sanitize_text_field() { return \DynamicOOOS\sanitize_text_field(...func_get_args()); } }
if (!function_exists('self_admin_url')) { function self_admin_url() { return \DynamicOOOS\self_admin_url(...func_get_args()); } }
if (!function_exists('set_site_transient')) { function set_site_transient() { return \DynamicOOOS\set_site_transient(...func_get_args()); } }
if (!function_exists('set_transient')) { function set_transient() { return \DynamicOOOS\set_transient(...func_get_args()); } }
if (!function_exists('showHelp')) { function showHelp() { return \DynamicOOOS\showHelp(...func_get_args()); } }
if (!function_exists('site_url')) { function site_url() { return \DynamicOOOS\site_url(...func_get_args()); } }
if (!function_exists('status_header')) { function status_header() { return \DynamicOOOS\status_header(...func_get_args()); } }
if (!function_exists('str_contains')) { function str_contains() { return \DynamicOOOS\str_contains(...func_get_args()); } }
if (!function_exists('str_ends_with')) { function str_ends_with() { return \DynamicOOOS\str_ends_with(...func_get_args()); } }
if (!function_exists('str_starts_with')) { function str_starts_with() { return \DynamicOOOS\str_starts_with(...func_get_args()); } }
if (!function_exists('the_content')) { function the_content() { return \DynamicOOOS\the_content(...func_get_args()); } }
if (!function_exists('the_post')) { function the_post() { return \DynamicOOOS\the_post(...func_get_args()); } }
if (!function_exists('trailingslashit')) { function trailingslashit() { return \DynamicOOOS\trailingslashit(...func_get_args()); } }
if (!function_exists('translate')) { function translate() { return \DynamicOOOS\translate(...func_get_args()); } }
if (!function_exists('trigger_deprecation')) { function trigger_deprecation() { return \DynamicOOOS\trigger_deprecation(...func_get_args()); } }
if (!function_exists('untrailingslashit')) { function untrailingslashit() { return \DynamicOOOS\untrailingslashit(...func_get_args()); } }
if (!function_exists('update_site_option')) { function update_site_option() { return \DynamicOOOS\update_site_option(...func_get_args()); } }
if (!function_exists('user_sanitize')) { function user_sanitize() { return \DynamicOOOS\user_sanitize(...func_get_args()); } }
if (!function_exists('wp_clear_scheduled_hook')) { function wp_clear_scheduled_hook() { return \DynamicOOOS\wp_clear_scheduled_hook(...func_get_args()); } }
if (!function_exists('wp_create_nonce')) { function wp_create_nonce() { return \DynamicOOOS\wp_create_nonce(...func_get_args()); } }
if (!function_exists('wp_enqueue_script')) { function wp_enqueue_script() { return \DynamicOOOS\wp_enqueue_script(...func_get_args()); } }
if (!function_exists('wp_enqueue_style')) { function wp_enqueue_style() { return \DynamicOOOS\wp_enqueue_style(...func_get_args()); } }
if (!function_exists('wp_get_current_user')) { function wp_get_current_user() { return \DynamicOOOS\wp_get_current_user(...func_get_args()); } }
if (!function_exists('wp_get_installed_translations')) { function wp_get_installed_translations() { return \DynamicOOOS\wp_get_installed_translations(...func_get_args()); } }
if (!function_exists('wp_get_theme')) { function wp_get_theme() { return \DynamicOOOS\wp_get_theme(...func_get_args()); } }
if (!function_exists('wp_kses')) { function wp_kses() { return \DynamicOOOS\wp_kses(...func_get_args()); } }
if (!function_exists('wp_login_url')) { function wp_login_url() { return \DynamicOOOS\wp_login_url(...func_get_args()); } }
if (!function_exists('wp_next_scheduled')) { function wp_next_scheduled() { return \DynamicOOOS\wp_next_scheduled(...func_get_args()); } }
if (!function_exists('wp_nonce_url')) { function wp_nonce_url() { return \DynamicOOOS\wp_nonce_url(...func_get_args()); } }
if (!function_exists('wp_normalize_path')) { function wp_normalize_path() { return \DynamicOOOS\wp_normalize_path(...func_get_args()); } }
if (!function_exists('wp_redirect')) { function wp_redirect() { return \DynamicOOOS\wp_redirect(...func_get_args()); } }
if (!function_exists('wp_register_style')) { function wp_register_style() { return \DynamicOOOS\wp_register_style(...func_get_args()); } }
if (!function_exists('wp_remote_get')) { function wp_remote_get() { return \DynamicOOOS\wp_remote_get(...func_get_args()); } }
if (!function_exists('wp_remote_retrieve_body')) { function wp_remote_retrieve_body() { return \DynamicOOOS\wp_remote_retrieve_body(...func_get_args()); } }
if (!function_exists('wp_remote_retrieve_headers')) { function wp_remote_retrieve_headers() { return \DynamicOOOS\wp_remote_retrieve_headers(...func_get_args()); } }
if (!function_exists('wp_remote_retrieve_response_code')) { function wp_remote_retrieve_response_code() { return \DynamicOOOS\wp_remote_retrieve_response_code(...func_get_args()); } }
if (!function_exists('wp_remote_retrieve_response_message')) { function wp_remote_retrieve_response_message() { return \DynamicOOOS\wp_remote_retrieve_response_message(...func_get_args()); } }
if (!function_exists('wp_safe_redirect')) { function wp_safe_redirect() { return \DynamicOOOS\wp_safe_redirect(...func_get_args()); } }
if (!function_exists('wp_schedule_event')) { function wp_schedule_event() { return \DynamicOOOS\wp_schedule_event(...func_get_args()); } }
if (!function_exists('wp_upload_dir')) { function wp_upload_dir() { return \DynamicOOOS\wp_upload_dir(...func_get_args()); } }

return $loader;
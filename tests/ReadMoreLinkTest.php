<?php
use PHPUnit\Framework\TestCase;

// Stub WordPress functions and constants required by the plugin
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__);
}
if (!function_exists('plugin_basename')) {
    function plugin_basename($file) {
        return $file;
    }
}
if (!defined('WP_PLUGIN_DIR')) {
    define('WP_PLUGIN_DIR', __DIR__);
}
if (!defined('WP_PLUGIN_URL')) {
    define('WP_PLUGIN_URL', 'http://example.test');
}
if (!defined('OPB_DIR')) {
    define('OPB_DIR', __DIR__ . '/stubs');
}
if (!function_exists('add_filter')) {
    function add_filter($tag, $function) {
        // no-op stub
    }
}

// Mock get_permalink to return a fake URL
function get_permalink() {
    return 'https://example.com/fake-post';
}

require_once __DIR__ . '/../plugin_wp_cassonestudio.php';

final class ReadMoreLinkTest extends TestCase
{
    public function test_read_more_link_contains_url_and_text()
    {
        $url = get_permalink();
        $result = dh_modify_read_more_link();

        $this->assertStringContainsString('<a class="more-link" href="' . $url . '">Leia mais</a>', $result);
    }
}

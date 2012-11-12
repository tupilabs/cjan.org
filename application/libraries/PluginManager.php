<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'JG_Cache.php';

/**
 * A plug-in manager, responsible for load, reload and purge the plug-ins cache.
 * <p>
 * This class is also responsible for keeping plug-ins from disk in sync with 
 * plug-ins in database.
 */
class PluginManager {

    var $CI;
    var $cache_dir;
    var $cache;
    var $config;
    
    public function __construct() {
        log_message('debug', 'PluginManager initialized');
        $this->config =& get_config();
        $this->CI =& get_instance();
        $this->cache_dir = APPPATH . 'cache';
        
        log_message('debug', "Creating cache at $this->cache_dir");
        $this->cache = new JG_Cache($this->cache_dir);
        $this->load();
    }
    
    public function load() {
        log_message('info', 'Loading plug-ins');
        $plugins = $this->cache->get('plugins');
        if(TRUE OR $plugins === FALSE) {
            log_message('debug', 'Loading plug-ins from database');
            $this->CI->load->model('plugins_model');
            $plugins_from_db = $this->CI->plugins_model->get_all();
            $plugins = array();
            foreach ($plugins_from_db as $plugin) {
                // Skip if not active
                if($plugin->active === FALSE) 
                    continue;
                
                $plugin_home = APPPATH . "plugins/$plugin->name/";
                log_message('debug', "Loading plug-in $plugin->name from $plugin_home");
                
                $plugin_entry_point = get_plugin_entry_point($plugin_home, $plugin->name);
                
                if($plugin_entry_point === FALSE) {
                    log_message('error', "Failed to load plug-in $plugin->name");
                } else {
                    $plugin_entry_point = FCPATH . $plugin_entry_point;
                    include_once "$plugin_entry_point";
                    $plugin_class = $plugin->name . 'Plugin';
                    $obj = new $plugin_class();
                    
                    $plugins[$plugin->name] = $obj;
                }
            }
            $this->cache->set('plugins', $plugins);
            $total_plugins = count($plugins);
            log_message('debug', "Found : $total_plugins plugins");
        } else {
            log_message('debug', 'Plug-ins cached');
        }
    }
    
    public function reload() {
        
    }
    
    public function get_cache() {
        return $this->cache;
    }
    
    public function get_plugins() {
        return $this->cache->get('plugins');
    }
    
}

?>
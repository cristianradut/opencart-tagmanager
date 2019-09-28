<?php
class ControllerExtensionModuleTagmanager extends Controller {
    
	public function insert_head_code_after(&$route, &$args, &$output) {
		    // In case the module is disabled, do nothing
		
        if (!$this->config->get('module_tagmanager_status')) {
            return;
        }
		
		    $head_code = html_entity_decode($this->config->get('module_tagmanager_head_code'), ENT_QUOTES, 'UTF-8');
	
		    // Insert codes before the </head> tag
        $output = str_replace('</head>', $head_code . '</head>' , $output);
	}
	
	public function insert_body_code_after(&$route, &$args, &$output) {
		    // In case the module is disabled, do nothing
        if (!$this->config->get('module_tagmanager_status')) {
            return;
        }
		
		    $body_code = html_entity_decode($this->config->get('module_tagmanager_body_code'), ENT_QUOTES, 'UTF-8');
		
		    // Insert codes after the <body> tag
        $output = str_replace('<body>', '<body>' . $body_code, $output);
	}
}

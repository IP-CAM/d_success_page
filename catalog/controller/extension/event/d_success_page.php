<?php
class ControllerExtensionEventDSuccessPage extends Controller
{
    private $codename = 'd_success_page';

    private $route = 'extension/module/d_success_page';

    public function __construct($registry)
    {
        parent::__construct($registry);
        
        // $this->load->language($this->route);
        // $this->load->model($this->route);
    }

    public function view_checkout_success(&$view, &$data, &$output)
    {       
            $this->load->model('setting/setting');
            $data['settings'] = $setting = $this->model_setting_setting->getSetting($this->codename);
            if($data['settings']['d_success_page_status']==1){
                $data['heading_title'] = $data['settings']['d_success_page_description'][(int)$this->config->get('config_language_id')]['title'];
                $data['text_message'] = html_entity_decode($data['settings']['d_success_page_description'][(int)$this->config->get('config_language_id')]['description']);
            }
    }
}
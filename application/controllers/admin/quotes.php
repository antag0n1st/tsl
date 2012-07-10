<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @property CI_Loader $load
* @property CI_Form_validation $form_validation
* @property CI_Input $input
* @property CI_Email $email
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property Quotes_model $quotes_model
*/
class Quotes extends MY_Admin_Controller {
    
    public function index()
    {
        $this->show_quotes();
    }
    
    public function new_quote()
    {
        $data = array();
        $data['quote']  = new Quote();
        
        $data['main_content']   =   'admin/quotes/new';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function edit_quote($quote_id)
    {
        if(is_numeric($quote_id))
        {
            $this->load->model('quotes_model');
            $options = array('quotes_id' => $quote_id);
            $quote = $this->quotes_model->get_quotes($options,1);
            if(count($quote) == 1)
            {
                $quote = $quote[0];
                $data = array();
                $data['quote']  =   $quote;
                $data['main_content']   =   'admin/quotes/new';
                $this->load->view('admin/layout/layout', $data);
            }
        }
    }
    
    public function submit_quote()
    {
        $this->load->model('quotes_model');
        $data = array();
        $quote = new Quote();
        
        $quote->quotes_id       =   $this->input->post('quotes_id');
        $quote->description     =   $this->input->post('description');
        $quote->author          =   $this->input->post('author');
        $quote->date_created    =   TimeHelper::DateTimeAdjusted();
        
        
        if($quote->is_valid())
        {
            if($quote->quotes_id == 0)
            {
                $quote->quotes_id   =   $this->quotes_model->insert_quote($quote);
            }
            else
            {
                $this->quotes_model->update_quote($quote);
            }
            $msg = 'Цитатот е успешно зачуван';
        }
        else{
            $msg = 'Цитатот не е зачуван. Проверете дали сте ги пополниле сите полиња';
        }
        
        $data['msg']    =   $msg;
        $data['quote']  =   $quote;
        $data['main_content']   =   'admin/quotes/new';
        $this->load->view('admin/layout/layout', $data);
        
    }
    
    public function show_quotes()
    {
        $this->load->model('quotes_model');
        
        $this->load->library('pagination');

        $per_page = 5;
        
        $quotes= array();
        $quotes = $this->quotes_model->get_quotes(array(),$per_page,$this->uri->segment(4));
        $config = array();
        
        $config['base_url'] =  base_url() . 'admin/quotes/show_quotes/';
        
        
        
        $config['total_rows'] = $this->quotes_model->get_total_quotes();
        $config['per_page'] = $per_page; 
        $config['uri_segment'] = '4'; 

        $this->pagination->initialize($config); 
        $data['quotes'] =   $quotes;
        $data['main_content']   =   'admin/quotes/quotes';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function delete_quote($quote_id)
    {
        if(is_numeric($quote_id))
        {
            $this->load->model('quotes_model');
            $this->quotes_model->delete_slide($quote_id);
            redirect(base_url() . 'admin/quotes/show_quotes');
        }
    }
    
}

?>

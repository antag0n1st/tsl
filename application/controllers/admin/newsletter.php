<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @property CI_Loader $load
* @property CI_Form_validation $form_validation
* @property CI_Input $input
* @property CI_Email $email
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property Newsletter_model $newsletter_model
* @property Articles_model $articles_model
*/
class Newsletter extends MY_Admin_Controller {
    public function index()
    {
        Head::instance()->title = "Сите Писма";
        
        $this->load->model('newsletter_model');
        
        $newsletters = $this->newsletter_model->get_newsletters();
        $total_emails = $this->newsletter_model->get_total_emails();
        
        /**
         * status
         *  0 - not started
         *  1 - started
         *  2 - paused
         *  3 - finished
         */
         
        $data['total_emails'] = $total_emails;
        $data['newsletters'] = $newsletters;
        $data['main_content']   =   'admin/newsletter/view_all';
        $this->load->view('admin/layout/layout', $data);
    }
    public function add_new(){
        
        Head::instance()->title = "Ново писмо";
        
        $this->load->model('articles_model');
        
        $articles = $this->articles_model->get_articles();
        
        $data['articles'] = $articles;
        $data['main_content']   =   'admin/newsletter/add_new';
        $this->load->view('admin/layout/layout', $data);
        
    }
    
    public function newsletter_save(){
        
        $articles = $this->input->post('articles');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        
        $this->load->model('newsletter_model');
        
        $this->newsletter_model->insert_newsletter($title,$content,$articles);
        
        header('Location: '.base_url().'admin/newsletter');
        exit;
    }
    
    public function edit_newsletter($id){
        
        Head::instance()->title = "Уреди писмо";
        
        $this->load->model('articles_model');
        $this->load->model('newsletter_model');
        
        $articles = $this->articles_model->get_articles();
        
        $selected_articles = $this->newsletter_model->get_newsletter_articles($id);
        $newsletters = $this->newsletter_model->get_newsletter($id);
        $newsletter =$newsletters[0];
        
        $sa = array();
        foreach($selected_articles as $ar){
            $sa[] = $ar->article_id;
        }
        
        $data['newsletter'] = $newsletter;
        $data['selected_articles'] = $sa;
        $data['articles'] = $articles;
        $data['main_content']   =   'admin/newsletter/edit_newsletter';
        $this->load->view('admin/layout/layout', $data);
        
    }
    
    public function newsletter_update(){
        $articles = $this->input->post('articles');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $id = $this->input->post('newsletter_id');
        $status = $this->input->post('status');
        
        $this->load->model('newsletter_model');
        
        $this->newsletter_model->update_newsletter($id,$title,$content,$articles,$status);
        
        header('Location: '.base_url().'admin/newsletter');
        exit;
    }
    
    public function delete_newsletter($id){
        

        $this->load->model('newsletter_model');
        
        $this->newsletter_model->delete_newsletter($id);
        
        // delete all click data for that newsletter
        $options = array('newsletter_id' => $id);
        $this->newsletter_model->delete_newsletter_click($options);
        
        
        header('Location: '.base_url().'admin/newsletter');
        exit;
    }
    
    public function browse_emails(){
        
        Head::instance()->title = "Сите емаил адреси";
        
        $this->load->model('newsletter_model');
        
        $this->load->library('pagination');

        $per_page = 10;
        
        $emails = array();
        $emails = $this->newsletter_model->get_all_emails($per_page,$this->uri->segment(4));
        $config = array();
        
        $config['base_url'] =  base_url() . 'admin/newsletter/browse_emails/';
        
        
        
        $config['total_rows'] = $this->newsletter_model->get_total_emails();
        $config['per_page'] = $per_page; 
        $config['uri_segment'] = '4'; 

        $this->pagination->initialize($config); 
        
        
        
        $emails = 
        
        $data['emails'] = $emails;
        $data['main_content']   =   'admin/newsletter/browse_emails';
        $this->load->view('admin/layout/layout', $data);
        
    }
    
    public function edit_email($id){
        
       
        
        $this->load->model('newsletter_model');
        $emails = $this->newsletter_model->get_email_by_id($id);
        $email = $emails[0];
        
        
         if($this->input->post('id')){
             
             $this->newsletter_model->update_email($this->input->post('id'),$this->input->post('email'),$this->input->post('status'));
        
             header('Location: '.  base_url().'admin/newsletter/browse_emails');
             exit;
        }
        
        $data['email'] = $email;
        $data['main_content']   =   'admin/newsletter/edit_email';
        $this->load->view('admin/layout/layout', $data);
        
    }
    
    public function delete_email($id){
        $this->load->model('newsletter_model');
        $this->newsletter_model->delete_email($id);
        
        // delete all click data for that email
        $options = array('email_id' => $id);
        $this->newsletter_model->delete_newsletter_click($options);
        
        
        header('Location: '.  base_url().'admin/newsletter/browse_emails');
        exit;
    }
    
    
    
    public function report($newsletter_id, $excel = 0)
    {
        if(is_numeric($newsletter_id))
        {
            $this->load->model('newsletter_model');
            
            $newsletter = $this->newsletter_model->get_newsletter($newsletter_id);
            
            if(count($newsletter) == 1)
            {
                $newsletter = $newsletter[0];
                
                $options = array(
                    'newsletter_id' =>  $newsletter->id
                );
               
               $data['newsletter_id']   = $newsletter_id;

               if(isset($excel) and $excel > 0)
               {
                   if($excel == 1) // excel
                  {
                       
                       
                       $report_rows = $this->newsletter_model->get_newsletter_clicks($options);
                       //load our new PHPExcel library
                        $this->load->library('excel');
                        //activate worksheet number 1
                        $this->excel->setActiveSheetIndex(0);
                        //name the worksheet
                        $this->excel->getActiveSheet()->setTitle('Кликови по newsletter');
                        //set cell A1 content with some text
                      //  $this->excel->getActiveSheet()->setCellValue('A1', 'Владимир me text value');
                        
                        $column_names = array('e-mail',
                                              'newsletter',
                                              'статија',
                                              //'линк',
                                              'датум');
                        $column_names = array_reverse($column_names);
                        
                        $keys = array_keys($column_names); // Get the Column Names
                        $min = ord("A"); // ord returns the ASCII value of the first character of string.
                        $max = $min + count($keys); 
                        $firstChar = ""; // Initialize the First Character
                        $abc = $min;   // Initialize our alphabetical counter
                        for($j = $min; $j <= $max; ++$j)
                        {
                        $col = $firstChar.chr($abc);   // This is the Column Label. 
                        $last_char = substr($col, -1);
                        if ($last_char> "Z") // At the end of the alphabet. Time to Increment the first column letter.
                        {   
                            $abc = $min; // Start Over
                            if ($firstChar == "") // Deal with the first time.
                                $firstChar = "A";
                            else
                            {
                                $fchrOrd = ord($firstChar);// Get the value of the first character
                                $fchrOrd++; // Move to the next one.
                                $firstChar = chr($fchrOrd); // Reset the first character.
                            }     
                            $col = $firstChar.chr($abc); // This is the column identifier
                        }
                        /* 
                            Use the $col here.
                        */
                        $this->excel->getActiveSheet()->setCellValue($col."1", array_pop($column_names));
                        $this->excel->getActiveSheet()->getStyle($col."1")->getFont()->setBold(true);
                        $this->excel->getActiveSheet()->getStyle($col."1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        
                        $abc++; // Move on to the next letter
                        }
                        
                            
                       
                            for($i = 0; $i < count($report_rows); $i++)
                            {
                                $x = 0;
                                $y = 2;
                                foreach($report_rows as $row)
                                {
                                    $this->excel->getActiveSheet()->setCellValueByColumnAndRow($x++, $y, $row->email);
                                    $this->excel->getActiveSheet()->setCellValueByColumnAndRow($x++, $y, $row->newsletter_title);
                                    $this->excel->getActiveSheet()->setCellValueByColumnAndRow($x++, $y, $row->article_title);
                                   /* $this->excel->getActiveSheet()->setCellValueByColumnAndRow($x++, $y, base_url() . 'articles/'. 
                                                                                                         $row->article_id . '-' . 
                                                                                                         $row->article_slug);*/
                                    $this->excel->getActiveSheet()->setCellValueByColumnAndRow($x++, $y, TimeHelper::format($row->date_clicked,"d.m.Y H:i"));
                                    $y++;
                                    $x = 0;
                                }
                            }

                        $filename='klikovi_po_newsletter' . time() .  '.xls'; //save our workbook as this file name
                        header('Content-Type: application/vnd.ms-excel'); //mime type
                        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                        header('Cache-Control: max-age=0'); //no cache

                        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension)
                        //if you want to save it as .XLSX Excel 2007 format
                        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                        //force user to download the Excel file without writing it to server's HD
                        $objWriter->save('php://output');


                    //$data['report'] =  $this->newsletter_model->get_newsletter_clicks($options);
                    //$this->load->view('admin/newsletter/reports/clicks_excel', $data);
                       
                       
                       
                       
                       
                       
                   }
                   else if($excel == 2) // csv
                   {
                        $this->load->dbutil();
                        $delimiter = ",";
                        $newline = "\r\n";
                        
                        $report_result = $data['report'] =  $this->newsletter_model->get_newsletter_clicks($options,0,0,'email DESC, date_clicked DESC',1);
                        
                        
                        
                        $data['csv']    = $this->dbutil->csv_from_result($report_result, $delimiter, $newline);
                        $this->load->view('admin/newsletter/reports/clicks_csv', $data);
                   }
               }
               else
               {
                   $data['report'] =  $this->newsletter_model->get_newsletter_clicks($options);
                   $data['main_content']   =   'admin/newsletter/reports/clicks';
                   $this->load->view('admin/layout/layout', $data);
               }
               
               
            }
            
        }
    
    }
    
    
    public function import_csv()
    {
         $this->load->library('csvreader');  
         $this->load->model('newsletter_model');
         $filePath = './public/csv/triple s emailovi.csv';  
      
         $data['csvData'] = $this->csvreader->parse_file($filePath);  
         
         foreach($data['csvData'] as $row)
         {
             $email =  array_shift($row);
             $email_data  =  array(
                       'email'          =>  $email,
                       'created_at'     => TimeHelper::DateTimeAdjusted(),
                       'is_unsubscribed'=>  0
             );
             $this->newsletter_model->insert_email($email_data);
         }
         
  
         $this->load->view('admin/newsletter/csv_view', $data);  
    }
}

?>
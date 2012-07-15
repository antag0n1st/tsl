<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author Vladimir
 */
class Newsletter extends MY_Admin_Controller {

    public function index($auth_token = '') {
        set_time_limit(0);


        $current_time = new DateTime(TimeHelper::DateTimeAdjusted());
        $start_time = new DateTime(TimeHelper::DateAdjusted() . ' 8:00:00');
        $end_time = new DateTime(TimeHelper::DateAdjusted() . ' 15:00:00');

        if ($current_time > $start_time and $current_time < $end_time) {
            // we can begin , the time is right
        } else {
            die('the time is not right yet');
        }

        if ($auth_token != 'thepasswordfortsl123') {
            die();
        }

        $this->load->model('newsletter_model');

        $newsletter = $this->newsletter_model->get_newsletter_to_send();
        if ($newsletter == null) {
            die('there is no newsletter to sent');
        }

        $data['newsletter_id'] = $newsletter_id = $newsletter->id;
        $data['title'] = $title = $newsletter->title;
        $data['content'] = $content = $newsletter->content;

        if ($newsletter->status == 0) {
            $this->newsletter_model->set_newsletter_started($newsletter_id);
        }

        $data['articles'] = $articles = $this->newsletter_model->get_newsletter_articles($newsletter_id);

        $emails = $this->newsletter_model->get_emails($newsletter_id, 100);

        if (count($emails) == 0) {

            $this->newsletter_model->set_newsletter_finished($newsletter_id);
        } else {
            $email_body = $this->load->view('newsletter_template', $data, true);

            foreach ($emails as $email) {

                // TODO send email


                $this->newsletter_model->update_email_sent($newsletter_id, $email->id);
                sleep(8);
            }
        }
    }

}

?>
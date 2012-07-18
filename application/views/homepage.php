<?php $this->load->view('elements/slidebar'); ?>
<div class="container o" style="margin-top: 30px;">

    <div class="left">
     
            <h3>Најнови вести</h3>
            
            <?php foreach($latest_news as $news): ?>
                    <?php $data['article'] = $news; $this->load->view('elements/article_item_row', $data); ?>
            <?php endforeach; ?>
            <div class="separator"></div>
            <h3>Наши Клиенти</h3>
            
            <?php $this->load->view('elements/clients_rotarot'); ?>
            
            

    </div>

    <div class="right">
        <?php $this->load->view('elements/sidebar'); ?>
    </div>


</div>

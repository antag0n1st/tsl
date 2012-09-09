<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" 
      xmlns:og="http://opengraphprotocol.org/schema/"
      xmlns:fb="http://www.facebook.com/2008/fbml"
      >
<head>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>images/favicon triple s.ico">
<?php Head::instance()->display(); ?>

</head>    
    <body>
        <?php $this->load->view('elements/header'); ?>
        <?php $this->load->view('elements/menu'); ?>
        <?php $this->load->view($main_content); ?>
        <?php $this->load->view('elements/footer'); ?>   
        <?php $this->load->view('elements/like_us'); ?>   
    </body>    
</html>
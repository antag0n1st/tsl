<style type="text/css">
    #menu li a {
        padding: 5px 10px;
        font-size: 15px;
    }
</style>
<div class="container">
    <ul id="menu" class="clear">
        <li>
            <a href="#">Навигација</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>">tsl.mk</a></li>
                <li><a href="<?php echo base_url(); ?>admin/home">Почетна</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Статии</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>admin/articles/new_article">Нова статија</a></li>
                <li><a href="<?php echo base_url(); ?>admin/articles/show_articles">Сите статии</a></li>
            </ul>
        </li>
        <li><a href="#">Настани</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>admin/events/new_event">Нов настан</a></li>
                <li><a href="<?php echo base_url(); ?>admin/events/show_events">Сите настани</a></li>
            </ul>
        </li>
        <li><a href="#">Слајдови</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>admin/slides/new_slide">Нов слајд</a></li>
                <li><a href="<?php echo base_url(); ?>admin/slides/show_slides">Сите слајдови</a></li>
            </ul>
        </li>
        <li><a href="#">Мени</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>admin/menu/new_menu_item">Нов линк</a></li>
                <li><a href="<?php echo base_url(); ?>admin/menu/show_menu_items">Сите линкови</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Newsletter</a>
            <ul>
                <li><a href="<?php echo base_url().'admin/newsletter'; ?>">Сите Писма</a></li>
                <li><a href="<?php echo base_url().'admin/newsletter/add_new'; ?>">Ново Писмо</a></li>
            </ul>
        </li>
        <li><a href="#">Галерии</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>admin/gallery/new_gallery">Нова галерија</a></li>
                <li><a href="<?php echo base_url(); ?>admin/gallery">Сите галерии</a></li>
            </ul>
        </li>
        <li><a href="#">Цитати</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>admin/quotes/new_quote">Нов цитат</a></li>
                <li><a href="<?php echo base_url(); ?>admin/quotes/show_quotes">Сите цитати</a></li>
            </ul>
        </li>
        <li><a href="#">Клиенти</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>admin/clients/new_client">Нов клиент</a></li>
                <li><a href="<?php echo base_url(); ?>admin/clients/show_clients">Сите клиенти</a></li>
            </ul>
        </li>
        <li><a href="#">Странично мени</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>admin/sidebar/add_element">Нов елемент</a></li>
                <li><a href="<?php echo base_url(); ?>admin/sidebar/change_position">Сите елементи</a></li>
            </ul>
        </li>
    </ul>   
</div>

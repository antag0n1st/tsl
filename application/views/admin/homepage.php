<div class="container o">
    <h3>Администрациона панела</h3>
    <div>
        <p>
            Добредојдовте во администрационата панела. Овде може да ги уредувате содржините на Вашиот сајт
        </p>
    </div>
    <div style="width:960px">
        <div class="dashboard-widget">
            <div class="title">
            <h3>Најнови статии</h3>
            </div>
            <div class="body">
                <?php foreach ($articles as $article): ?>
                    <a href="<?php echo base_url(); ?>admin/articles/edit_article/<?php echo $article->id; ?>" title="Измени">
                        <?php echo mb_substr($article->title, 0, 65, 'UTF-8') . (mb_strlen($article->title, 'UTF-8') > 65 ? '...' : ''); ?>
                    </a>
                    <div class="separator"></div>
                <?php endforeach; ?>
            </div>
            <div>
                <div class="float-left">
                    <a class="round button"  href="<?php echo base_url(); ?>/admin/articles/show_articles">
                        Види ги сите...
                    </a>
                </div>
                <div class="float-right">
                    <a class="round button" href="<?php echo base_url(); ?>/admin/articles/new_article">
                        Додади нова статија
                    </a>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <div class="title">
            <h3>Најнови настани</h3>
            </div>
            <div class="body">
                <?php foreach ($events as $event) : ?>
                    <a href="<?php echo base_url();?>admin/events/edit_event/<?php echo $event->calendar_events_id; ?>" title="Измени">
                        
                        <?php echo mb_substr($event->title, 0, 55, 'UTF-8'); ?>
                        <?php echo ' ('; FieldHelper::date_no_time_field($event->date_happen); echo ')'; ?>
                    </a>
                    <div class="separator"></div>
                <?php endforeach; ?>
                <div>
                    <div class="float-left">
                        <a class="round button"  href="<?php echo base_url(); ?>/admin/events/show_events">
                            Види ги сите...
                        </a>
                    </div>
                    <div class="float-right">
                        <a class="round button" href="<?php echo base_url(); ?>/admin/events/new_event">
                            Додади нов настан
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <div class="title">
            <h3>
                Најнови галерии
            </h3>
            </div>
            <div class="body">
                <?php foreach($galleries as $gallery): ?>
                    <a href="<?php echo base_url().'admin/gallery/add_photos/'.$gallery->id_gallery; ?>">
                        <?php echo mb_substr($gallery->description, 0, 65, 'UTF-8') . (mb_strlen($gallery->description, 'UTF-8') > 65 ? '...' : ''); ?>
                    </a>
                <div class="separator"></div>
                <?php endforeach; ?>
            </div>
            <div>
                    <div class="float-left">
                        <a class="round button"  href="<?php echo base_url(); ?>/admin/gallery">
                            Види ги сите...
                        </a>
                    </div>
                    <div class="float-right">
                        <a class="round button" href="<?php echo base_url(); ?>/admin/gallery/new_gallery">
                            Додади нова галерија
                        </a>
                    </div>
                </div>
        </div>
        <div class="dashboard-widget">
            <div class="title">
            <h3>Најнови писма</h3>
            </div>
            <div class="body">
                 <?php foreach($newsletters as $newsletter): ?>
                     <a href="<?php echo base_url().'admin/newsletter/edit_newsletter/'.$newsletter->id; ?>">   
                     <?php echo mb_substr($newsletter->title, 0, 65, 'UTF-8') . (mb_strlen($newsletter->title, 'UTF-8') > 65 ? '...' : ''); ?>
                     <a/>
                <div class="separator"></div>
                 <?php endforeach; ?>
            </div>
             <div>
                    <div class="float-left">
                        <a class="round button"  href="<?php echo base_url(); ?>/admin/newsletter">
                            Види ги сите...
                        </a>
                    </div>
                    <div class="float-right">
                        <a class="round button" href="<?php echo base_url(); ?>/admin/newsletter/add_new">
                            Додади новo писмо
                        </a>
                    </div>
                </div>
        </div>
    </div>
</div>
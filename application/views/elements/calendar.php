
<link rel="stylesheet" href="<?php echo base_url(); ?>public/js/jquery-ui/css/smoothness/jquery-ui-1.8.14.custom.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.datepicker.js"></script>
<?php 
echo '<style type="text/css">';
foreach($event_categories as $event_category){
    /* @var $event_category EventCategory  */
    
    echo '
    .'.$event_category->slug.'  {
        background-color: '.$event_category->color.';
    }
    .'.$event_category->slug.' a  {
        background-color: '.$event_category->color.' !important;
        background-image: none !important;
        color: white !important;
    }
    ';
} 
echo '</style>';
?>
<script type="text/javascript">
    $(document).ready(function() {
        <?php 
        $_events = array(); foreach($events as $event){
           
            $_events[] = '{ Date: new Date("'.$event->d.'"), link : "'.$event->calendar_link.'" , color: "'.$event->color.'" , slug: "'.$event->slug.'" }';
        }
       
        ?>
        var events = [ 
            <?php  echo implode(',', $_events); ?>
        ];
                
        $.datepicker.setDefaults( $.datepicker.regional[ "" ] );

        $( "#date_published" ).datepicker({ dateFormat: 'm/d/yy',
            defaultDate : '<?php echo isset($events[0]) ? $events[0]->d : ''; ?>' ,
            regional: 'mk' , 
            dayNames:["Недела", "Понеделник", "Вторник", "Среда", "Четврток", "Петок", "Сабота"] , 
            dayNamesMin:["Нед", "Пон", "Вто", "Сре", "Чет", "Пет", "Саб"] ,
            dayNamesShort:["Нед", "Пон", "Вто", "Сре", "Чет", "Пет", "Саб"] , 
            firstDay: 1 , 
            monthNames:["Јануари", "Фебруари", "Март", "Април", "Мај", "Јуни", "Јули", "Август", "Септември", "Октомври", "Ноември", "Декември"] , 
            
            beforeShowDay: function(date) {
                
                var result = [true, '', null];
                var matching = $.grep(events, function(event) {
                    return (event.Date.valueOf() === date.valueOf()) ;
                });
                
                if (matching.length) {
                    result = [true, matching[0].slug, null];
                }
                return result;
            },
            
            onSelect: function(dateText) {
                var date,
                selectedDate = new Date(dateText),
                i = 0,
                event = null;
                
                while (i < events.length && !event) {
                    date = events[i].Date;
                    
                    if (selectedDate.valueOf() === date.valueOf()) {
                        event = events[i];
                    }
                    i++;
                }
                if (event) {
                    window.open(event.link);
                }
            }
        });
        
    });
    
    
</script>

<h3>Отворени обуки</h3>
<div id="date_published"></div>

<div class="legend">
  <?php foreach($event_categories as $event_category): ?>
    <div><span style="background-color: <?php echo $event_category->color; ?>;"></span><?php echo $event_category->name; ?></div>
  <?php endforeach; ?>
</div>
<div style="margin:10px 0 0 0;font-size:18px;">
        &raquo; <a href="<?php echo base_url().'page/signup_for_training'; ?>">Пријави се за обука</a>
</div>
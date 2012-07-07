
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


<div id="date_published"></div>

<div class="legend">
  <!-- #868686 -->  <div><span style="background-color: #868686;"></span>Услуга кон клиентите</div>
  <!-- #ef1d1d -->  <div><span style="background-color: #ef1d1d;"></span>Продажни вештини</div>
  <!-- #edb7b7 -->  <div><span style="background-color: #edb7b7;"></span>Маркетинг и PR</div>
  <!-- #7771ee -->  <div><span style="background-color: #7771ee;"></span>Менаџмент</div>
  <!-- #d7ed1f -->  <div><span style="background-color: #d7ed1f;"></span>Човечки ресурси</div>
  <!-- #ab348b -->  <div><span style="background-color: #ab348b;"></span>Финансии</div>
  <!-- #2ada74 -->  <div><span style="background-color: #2ada74;"></span>Производство и дистрибуција</div>
  <!-- #eca72f -->  <div><span style="background-color: #eca72f;"></span>Деловни вештини</div>    
  <!-- #10125f -->  <div><span style="background-color: #10125f;"></span>Тим билдинг</div>
  <!-- #186752 -->  <div><span style="background-color: #186752;"></span>Конференции</div>
  <!-- #000000 -->  <div><span style="background-color: #000000;"></span>Експертски академии</div>
    
</div>

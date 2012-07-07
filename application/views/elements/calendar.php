
<link rel="stylesheet" href="<?php echo base_url(); ?>public/js/jquery-ui/css/smoothness/jquery-ui-1.8.14.custom.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
                
        $.datepicker.setDefaults( $.datepicker.regional[ "" ] );
        $( "#date_published" ).datepicker({ dateFormat: 'dd.mm.yy',
            regional: 'mk' , 
            dayNames:["Недела", "Понеделник", "Вторник", "Среда", "Четврток", "Петок", "Сабота"] , 
            dayNamesMin:["Нед", "Пон", "Вто", "Сре", "Чет", "Пет", "Саб"] ,
            dayNamesShort:["Нед", "Пон", "Вто", "Сре", "Чет", "Пет", "Саб"] , 
            firstDay: 1 , 
            monthNames:["Јануари", "Фебруари", "Март", "Април", "Мај", "Јуни", "Јули", "Август", "Септември", "Октомври", "Ноември", "Декември"] , 
            
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
<?php
header("Content-type: application/csv-tab-delimited-table" );
           header("Content-Disposition: attachment; filename=csvdata.csv" );
           header("Content-Description: fichier binaire" );
           header("Content-Transfer-Encoding: binary" );
           
           echo $csv; 
?>  


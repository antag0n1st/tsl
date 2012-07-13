<style type="text/css">
    #clients_banner {
        padding: 0px;
        height: 70px;
        width: 100%;
        position: relative;
        background-repeat: no-repeat;
        background-position: left top;
        margin-top: 5px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
    }

    #clients_banner ul {
        padding: 0px;
        width: 100%;
        margin-top: 0px;
        margin-right: auto;
        margin-bottom: 0px;
        margin-left: auto;
        height: 70px;
        overflow: hidden;
        position: relative;
        list-style: none;
    }
    #clients_banner img{
        padding: 5px;
    }
</style>
<?php   $current_client_index = 0;
        $per_row = 5;
        $rows = count($clients) / $per_row; ?>

<div id="clients_banner">
    <ul id="clients_banner_ul">
        
        <?php for($i = 1; $i <= $rows; $i++) :?>
        
        <li id="clientsbannerimg_<?php echo $i; ?>" style="position: absolute; top: 100px; display: list-item; overflow: visible; ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                        <td valign="middle" align="center" height="70">
                            <?php for($j = $current_client_index; $j < count($clients) and $j < $per_row * $i; $j++, $current_client_index++): ?>
                            <img src="<?php echo base_url()?>public/uploaded/clients/<?php echo $clients[$j]->image; ?>" alt="" />
                            <?php endfor; ?>
                        </td>
                    </tr>
                </tbody></table>
        </li>
        <?php endfor; ?>
       <!-- <li id="clientsbannerimg_2" style="position: absolute; top: 100px; display: list-item; overflow: visible; ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                        <td valign="middle" align="center" height="70">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Ohridska-banka.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Pro-Credit-banka.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/TTK-banka.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/moznosti.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/QBE.png">
                        </td>
                    </tr>
                </tbody></table>
        </li>


        <li id="clientsbannerimg_3" style="position: absolute; top: 100px; display: list-item; overflow: visible; ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                        <td valign="middle" align="center" height="70">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/eurolink.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Hypo-Alpe-Adria.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/eurostandard-banka.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Automobile-SK.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Avtonova-Citroen.png">
                        </td>
                    </tr>
                </tbody></table>

        </li>

        <li id="clientsbannerimg_4" style="position: absolute; top: 0px; display: list-item; overflow: visible; ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                        <td valign="middle" align="center" height="70">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Ka-Dis-seat.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Dal-Met-Fu.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/BlueCafe.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Papu.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Forza.png">
                        </td>
                    </tr>
                </tbody></table>

        </li>

        <li id="clientsbannerimg_5" style="position: absolute; top: 100px; display: list-item; overflow: visible; ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                        <td valign="middle" align="center" height="70">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/restoran-14.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Lira-restoran.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/World-Learning.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Nacionalna-agencija.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Katastar.png">
                        </td>
                    </tr>
                </tbody></table>

        </li>

        <li id="clientsbannerimg_6" style="position: absolute; top: 100px; display: list-item; overflow: visible; ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                        <td valign="middle" align="center" height="70">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Glaxo-Smith-Kline.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Filip-Vtori.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Dr-Panovski.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Natusana.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/belupo.png">
                        </td>
                    </tr>
                </tbody></table>

        </li>

        <li id="clientsbannerimg_7" style="position: absolute; top: 100px; display: list-item; overflow: visible; ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                        <td valign="middle" align="center" height="70">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Farmahem.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Microsoft.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/seavus.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Asseco.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Pakom.png">
                        </td>
                    </tr>
                </tbody></table>
        </li>

        <li id="clientsbannerimg_8" style="position: absolute; top: 100px; display: list-item; overflow: visible; ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                        <td valign="middle" align="center" height="70">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Duna-kompjuteri.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/TNT-IT-market.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Rema-kompjuteri.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/InTec-System.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/makpetrol.png">
                        </td>
                    </tr>
                </tbody></table>
        </li>

        <li id="clientsbannerimg_9" style="position: absolute; top: 100px; display: list-item; overflow: visible; ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                        <td valign="middle" align="center" height="70">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Makoil.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/prilepska-pivarnica.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Tinex.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/lazov-group.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Oriflame.png">
                        </td>
                    </tr>
                </tbody></table>
        </li>


        <li id="clientsbannerimg_10" style="position: absolute; top: 100px; display: list-item; overflow: visible; ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                        <td valign="middle" align="center" height="70">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/wurth.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/2BE.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Magnetik.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Fashion-group.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/futura-logo.png">
                        </td>
                    </tr>
                </tbody></table>
        </li>

        <li id="clientsbannerimg_11" style="position: absolute; top: 100px; display: list-item; overflow: visible; ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                        <td valign="middle" align="center" height="70">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Delta-sport.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Lesnina-Inzenering.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Urban-Invest.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/JUB.png">
                            <img src="http://www.tsl.mk/content/pics/klienti/banner/Swisslion.png">
                        </td>
                    </tr>
                </tbody></table>
        </li>   -->

    </ul>

</div>

<script type="text/javascript">
    $(document).ready(function(){
        iPom = 1;
        $("#content_banner_frame_ul"+' > li').each(function(){
            $(this).attr("id","bannerimg_"+iPom);
            iPom++;
        });
		
        iMaxBannerImages = iPom-1;
        for (i=1;i<=iMaxBannerImages;i++)
        {
            $("#bannerimg_"+i).css("position", "absolute");
            $("#bannerimg_"+i).css("z-index", (iMaxBannerImages-i+1) );
            $("#bannerimg_"+i).css("top", "0px" );
        }
			
        timeoutID = setInterval("changeBanner()", 5000);


        //rotating clients banner code ------------------------------------------------------------------------------------
        iPom = 1;
        $("#clients_banner_ul"+' > li').each(function(){
            $(this).attr("id","clientsbannerimg_"+iPom);
            iPom++;
        });
		
        iMaxClientsBannerImages = iPom-1;
        for (i=1;i<=iMaxClientsBannerImages;i++)
        {
            $("#clientsbannerimg_"+i).css("position", "absolute");
            if (i==1) $("#clientsbannerimg_"+i).css("top", "0px" );
            else $("#clientsbannerimg_"+i).css("top", "70px" );
        }
		
        timeoutClientsID = setInterval("changeClientsBanner()", 3000);
    });
    
    var iBannerImgNow = 1;
    var iMaxBannerImages = 0;
    function changeBanner()
    {
        var iBannerImgNowPom = iBannerImgNow;
        var iPomZIndex = 0;
        $("#bannerimg_"+iBannerImgNow).animate( {opacity:0}, 1000, 
        function() 
        {
            for (i=1;i<=iMaxBannerImages;i++)
            {
                if (iBannerImgNowPom!=i)
                {
                    iPomZIndex = parseInt( $("#bannerimg_"+i).css("z-index") );
                    iPomZIndex++;
                    $("#bannerimg_"+i).css("z-index", iPomZIndex );
                }
            }
            $(this).css("z-index", 1 );
            $(this).animate( {opacity:1}, 0);
        });
        iBannerImgNow++;
        if (iBannerImgNow>iMaxBannerImages) iBannerImgNow=1;
    }



    var iClientsBannerImgNow = 1;
    var iMaxClientsBannerImages = 0;
    function changeClientsBanner()
    {
        //var iBannerImgNowPom = iBannerImgNow;
        $("#clientsbannerimg_"+iClientsBannerImgNow).animate( {top:-70}, 500, 
        function() 
        {
            $(this).css("top", '100px' );
        });
        iClientsBannerImgNow++;
        if (iClientsBannerImgNow>iMaxClientsBannerImages) iClientsBannerImgNow=1;
		
        var iPomHeight = $("#clientsbannerimg_"+iClientsBannerImgNow).height();
        $("#clientsbannerimg_"+iClientsBannerImgNow).animate( {top:0}, 500, 
        function() 
        {
            //$(this).css("top", '100px' );
        });
    }
</script>
<style>
    .tablo td {
        font-size: 9pt;
        padding: 2px;
        text-align: center;
    }

    .baslik {
        font-size: 16pt;
        font-weight: 600;
        text-align: center;
    }

    .baslik2 {
        font-size: 14pt;
        font-weight: 600;
        text-align: center;
    }

    .baslik3 {
        font-size: 10pt;
        text-align: center;
    }

    .baslik4 {
        font-size: 9pt;
        font-weight: 600;
    }

    .solaYasla td {
        float: left;
    }
</style>
<?php if (empty($ayar)) { ?>
<table class="tablo" width="100">
    <tbody>
    <tr>
        <td colspan="32" align="center"><span class="baslik">AYARLAR MENÜSÜNDEN TAŞINIR AYARLARINIZI YAPILANDIRMANIZ GEREKLİ</span></td>
    </tr>
    </tbody>
</table>
<?php } else { ?>
<table class="tablo">
    <tbody>
    <tr>
        <td colspan="29" align="center"><span class="baslik">K Ü T Ü P H A N E  D E F T E R İ </span></td>
        <td colspan="2"></td>
        <td></td>
    </tr>
    <tr>
        <td style="float: left;" colspan="2">GİRİŞ</td>
        <td colspan="28"></td>
        <td style="float: right;">ÇIKIŞ</td>
        <td></td>
    </tr>

    <tr>
        <td style="float: left;" colspan="8">İL VE İLÇENİN</td>
        <td>ADI</td>
        <td colspan="9"><?php echo $ayar->il_ilce ?></td>
        <td>KODU</td>
        <td colspan="3"><?php echo $ayar->il_ilce_kod ?></td>
        <td></td>
        <td>TAŞINIRIN</td>
        <td colspan="3">ADI</td>
        <td colspan="5"></td>

    </tr>
    <tr>
        <td style="float: left;" colspan="8">HARCAMA BİRİMİNİN</td>
        <td>ADI</td>
        <td colspan="9"><?php echo $ayar->harcama ?></td>
        <td>KODU</td>
        <td colspan="3"><?php echo $ayar->harcama_kod ?></td>
        <td></td>
        <td>TAŞINIRIN</td>
        <td colspan="3">ADI</td>
        <td colspan="5"></td>

    </tr>
    <tr>
        <td style="float: left;" colspan="8">AMBAR BİRİMİNİN</td>
        <td>ADI</td>
        <td colspan="9"><?php echo $ayar->ambar ?></td>
        <td>KODU</td>
        <td colspan="3"><?php echo $ayar->ambar_kod ?></td>
        <td></td>
        <td>TAŞINIRIN</td>
        <td colspan="3">ADI</td>
        <td colspan="5"></td>

    </tr>
    <tr>
        <td style="float: left;" colspan="8">MUHASEBE BİRİMİNİN</td>
        <td>ADI</td>
        <td colspan="9"><?php echo $ayar->muhasebe ?></td>
        <td>KODU</td>
        <td colspan="3"><?php echo $ayar->muhasebe_kod ?></td>
        <td></td>
        <td>TAŞINIRIN</td>
        <td colspan="3">ADI</td>
        <td colspan="5"></td>

    </tr>
    <tr>
        <td height="10" colspan="32"></td>
    </tr>
    <?php
    $satir = 1;
    if(empty(Input::get('bosListe'))) {

    foreach ($demirbas_data as $data) {
    $sicilNo = $data->demirbas_no . ' ' . substr($data->demirbas_alis_tarihi, 2, 2) . ' ' . $data->kod_1 . ' ' . $data->kod_2 . ' ' . $data->kod_3 . ' ' . $data->kod_4 . ' ' . $data->kod_5 . ' ' . $data->kod_6;
    ?>
    <tr>
        <td><?php echo $satir; ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><?php echo $ata->demirbas_yazar ?></td>
        <td><?php echo $ata->demirbas_isim ?></td>
        <td><?php echo $ata->demirbas_basim_yer?></td>
        <td><?php echo $ata->demirbas_basim_yil ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><?php echo $data->demirbas_deger ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </tbody>
    <?php $satir++; }
    }?>


</table>
<?php }  ?>
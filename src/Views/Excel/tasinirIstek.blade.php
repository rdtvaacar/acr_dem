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
        <td colspan="7" align="center"><span class="baslik">AYARLAR MENÜSÜNDEN TAŞINIR AYARLARINIZI YAPILANDIRMANIZ GEREKLİ</span></td>
    </tr>
    </tbody>
</table>
<?php } else { ?>


<table class="tablo">
    <tbody>
    <tr>
        <td colspan="7" align="center"><span class="baslik">TAŞINIR İSTEK BELGESİ </span></td>
    </tr>
    <tr>
        <td style="float: left;" colspan="3">İstek Yapan Birim :</td>
        <td colspan="3">TARİH :<?php echo date('d/m/Y') ?></td>
        <td style="float: right;">NO:......</td>
    <tr>
        <td colspan="7" style="text-align: center; height: 30px; font-size: 12pt;">T A Ş I N I R I N</td>
    </tr>
    <tr class="baslik4">
        <td rowspan="2">NO</td>
        <td rowspan="2">KODU</td>
        <td rowspan="2" colspan="2">ADI</td>
        <td rowspan="2">BİRİMİ</td>
        <td rowspan="2">İSTENEN MİKTAR</td>
        <td rowspan="2">KARŞILANAN MİKTAR</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="2"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <?php
    $satir = 1;
    if(empty(Input::get('bosListe'))) {

    foreach ($demirbas_data as $data) {
    $sicilNo = $data->demirbas_no . ' ' . substr($data->demirbas_alis_tarihi, 2, 2) . ' ' . $data->kod_1 . ' ' . $data->kod_2 . ' ' . $data->kod_3 . ' ' . $data->kod_4 . ' ' . $data->kod_5 . ' ' . $data->kod_6;
    ?>
    <tr>
        <td><?php echo $satir; ?></td>
        <td width="18"><?php echo $data->kod_1 . ' ' . $data->kod_2 . ' ' . $data->kod_3 . ' ' . $data->kod_4 . ' ' . $data->kod_5 . ' ' . $data->kod_6  ?></td>
        <td width="25" colspan="2"><?php echo $data->demirbas_isim ?></td>
        <td width="9"><?php echo $data->birim_isim ?></td>
        <td width="16"><?php echo $miktar[] = $data->demirbas_miktar ?></td>
        <td width="16"><?php echo $miktar[] = $data->demirbas_miktar ?></td>
    </tr>
    </tbody>
    <?php $satir++; }
    }?>
    <tr>
        <td colspan="7" height="16px;"></td>
    </tr>
    <tr>
        <td colspan="3">Birimimiz ihtiyacı için yukarıda belirtilen</td>
        <td colspan="4">Karşılanan Miktar" sütununda kayıtlı</td>
    </tr>
    <tr>
        <td colspan="3"> taşınırların verilmesi rica olunur.</td>
        <td colspan="4">miktarları teslim edilmiştir.</td>
    </tr>
    <tr>
        <td colspan="3"><span class="baslik4">İstek Yapan Birim Yöneticisi</span></td>
        <td colspan="4"><span class="baslik4">Taşınır Kayıt ve Kontrol Yetkilisi</span></td>
    </tr>
    <tr>
        <td colspan="7" height="16px;"></td>
    </tr>

    <tr>
        <td></td>
        <td style="float:left;" colspan="2"><span class="baslik4">Adı Soyadı:.............................. </span></td>
        <td></td>
        <td style="float:left;" colspan="3"><span class="baslik4">Adı Soyadı: <?php echo $ayar->yetkili ?></span></td>
    </tr>
    <tr>
        <td></td>
        <td style="float:left;" colspan="2"><span class="baslik4">Ünvanı:.................................. </span></td>
        <td></td>
        <td style="float:left;" colspan="3"><span class="baslik4">Ünvanı: <?php echo $ayar->yetkili_unvan ?></span></td>
    </tr>
    <tr>
        <td></td>
        <td style="float:left;" colspan="2"><span class="baslik4">İmzası:........................................</span></td>
        <td></td>
        <td style="float:left;" colspan="3"><span class="baslik4">İmzası:........................................</span></td>
    </tr>
    <tr>
        <td colspan="7" height="16px;"></td>
    </tr>

</table>
<?php }  ?>
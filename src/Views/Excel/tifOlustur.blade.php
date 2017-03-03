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
        <td colspan="12" align="center"><span class="baslik">AYARLAR MENÜSÜNDEN TAŞINIR AYARLARINIZI YAPILANDIRMANIZ GEREKLİ</span></td>
    </tr>
    </tbody>
</table>
<?php } else { ?>


<table class="tablo">
    <tbody>
    <tr>
        <td colspan="12" align="center"><span class="baslik">TAŞINIR İŞLEM FİŞİ</span></td>
    </tr>
    <tr>
        <td style="float: left;" colspan="2">Fiş Sıra No :</td>
        <td colspan="8"></td>
        <td colspan="2">TARİH :<?php echo date('d/m/Y') ?></td>
    <tr>
        <td style="float: left;" colspan="5">İL VE İLÇENİN</td>
        <td>ADI</td>
        <td colspan="3"><?php echo $ayar->il_ilce ?></td>
        <td>KODU</td>
        <td colspan="2"><?php echo $ayar->il_ilce_kod ?></td>
    </tr>
    <tr>
        <td style="float: left;" colspan="5">HARCAMA BİRİMİNİN</td>
        <td>ADI</td>
        <td width="32" colspan="3"><?php echo $ayar->harcama ?></td>
        <td>KODU</td>
        <td colspan="2"><?php echo $ayar->harcama_kod ?></td>
    </tr>
    <tr>
        <td style="float: left;" colspan="5">AMBARIN</td>
        <td>ADI</td>
        <td colspan="3"><?php echo $ayar->ambar ?></td>
        <td>KODU</td>
        <td colspan="2"><?php echo $ayar->ambar_kod ?></td>
    </tr>
    <tr>
        <td style="float: left;" colspan="5">MUHASEBE BİRİMİNİN</td>
        <td>ADI</td>
        <td colspan="3"><?php echo $ayar->muhasebe ?></td>
        <td>KODU</td>
        <td colspan="2"><?php echo $ayar->muhasebe_kod ?></td>
    </tr>
    <tr>
        <td colspan="12" height="6px;"></td>
    </tr>
    <tr>
        <td style="float: left;" colspan="5">MUAYENE VE KABUL KOMİSYONU TUTANAĞININ</td>
        <td>TARİHİ</td>
        <td colspan="3"><?php echo date('d/m/Y', strtotime($demirbas->demirbas_alis_tarihi))  ?></td>
        <td>SAYISI</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td style="float: left;" colspan="5">DAYANAĞI BELGENİN</td>
        <td>TARİHİ</td>
        <td colspan="3"><?php echo date('d/m/Y', strtotime($demirbas->demirbas_alis_tarihi))  ?></td>
        <td>SAYISI</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="4">İŞLEM ÇEŞİDİ</td>
        <td colspan="2">NEREDEN GELDİĞİ</td>
        <td colspan="3">KİME VERİLDİĞİ</td>
        <td colspan="3">NEREYE VERİLDİĞİ</td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td colspan="2"></td>
        <td colspan="3"></td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td colspan="12" height="6px;"></td>
    </tr>
    <tr>
        <td colspan="12" style="text-align: center;">BİRİMLER VE AMBARLAR ARASI TAŞINIR HAREKETLERİNDE</td>
    </tr>
    <tr>
        <td style="float: left;" colspan="5">GÖNDERİLEN HARCAMA BİRİMİ</td>
        <td>ADI</td>
        <td colspan="3"></td>
        <td>KODU</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td style="float: left;" colspan="5">GÖNDERİLEN TAŞINIR AMBARI</td>
        <td>ADI</td>
        <td colspan="3"></td>
        <td>KODU</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td style="float: left;" colspan="5">MUHASEBE BİRİMİ</td>
        <td>ADI</td>
        <td colspan="3"></td>
        <td>KODU</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="12" height="6px;"></td>
    </tr>
    <tr>
        <td colspan="12" style="text-align: center;">T A Ş I N I R I N</td>
    </tr>
    <tr class="baslik4">
        <td>NO</td>
        <td>KODU</td>
        <td>SİCİL NUMARASI</td>
        <td colspan="3">ADI</td>
        <td>BİRİMİ</td>
        <td>MİKTARI</td>
        <td colspan="2">FİYATI</td>
        <td colspan="2">TUTARI</td>
    </tr>
    <?php
    $satir = 1;
    if(empty(Input::get('bosListe'))) {

    $son_yil = empty($data->amortisman_id) ? '' : date('d.', strtotime($data->demirbas_alis_tarihi)) . date('m.', strtotime($data->demirbas_alis_tarihi)) . (date('Y', strtotime($data->demirbas_alis_tarihi)) +
            $data->omur);
    foreach ($demirbas_data as $data) {
    $sicilNo = $data->demirbas_no . ' ' . substr($data->demirbas_alis_tarihi, 2, 2) . ' ' . $data->kod_1 . ' ' . $data->kod_2 . ' ' . $data->kod_3 . ' ' . $data->kod_4 . ' ' . $data->kod_5 . ' ' . $data->kod_6;
    ?>
    <tr>
        <td><?php echo $satir; ?></td>
        <td width="11"><?php echo $data->kod_1 . ' ' . $data->kod_2 . ' ' . $data->kod_3 . ' ' . $data->kod_4 . ' ' . $data->kod_5 . ' ' . $data->kod_6  ?></td>
        <td width="15"><?php echo $sicilNo ?></td>
        <td width="15" colspan="3"><?php echo $data->demirbas_isim ?></td>
        <td width="6"><?php echo $data->birim_isim ?></td>
        <td width="7"><?php echo $miktar[] = $data->demirbas_miktar ?></td>
        <td width="5" colspan="2"><?php echo $data->demirbas_deger ?>₺</td>
        <td width="7" colspan="2"><?php echo $data->demirbas_miktar * $data->demirbas_deger ?>₺</td>
    </tr>
    </tbody>
    <?php $satir++; }
    }?>
    <tr>
        <td colspan="12" height="16px;"></td>
    </tr>
    <tr>
        <td colspan="6"><span class="baslik4">Yukarıda gösterilen <?php echo $satir - 1; ?> kalem ve toplam <?php echo array_sum
                ($miktar) ?>
                taşınırın.</span></td>
        <td colspan="6"><span class="baslik4">Yukarıda gösterilen <?php echo $satir - 1; ?> kalem ve toplam <?php echo array_sum($miktar) ?> taşınırın.</span></td>
    </tr>
    <tr>
        <td colspan="6"><span class="baslik4">GİRİŞ KAYDI YAPILMIŞTIR <?php echo date('d/m/Y') ?></span></td>
        <td colspan="6"><span class="baslik4">ÇIKIŞ KAYDI YAPILMIŞTIR <?php echo date('d/m/Y') ?></span></td>
    </tr>
    <tr>
        <td colspan="12" height="16px;"></td>
    </tr>
    <tr>
        <td colspan="6"><span class="baslik4">Taşınır Kayıt ve Kontrol Yetkilisinin</span></td>
        <td colspan="6"><span class="baslik4">Taşınır Kayıt ve Kontrol Yetkilisinin</span></td>
    </tr>
    <tr>
        <td></td>
        <td style="float:left;" colspan="5"><span class="baslik4">Adı Soyadı: <?php echo $ayar->yetkili ?></span></td>
        <td></td>
        <td style="float:left;" colspan="5"><span class="baslik4">Adı Soyadı: <?php echo $ayar->cikis_yetkili ?></span></td>
    </tr>
    <tr>
        <td></td>
        <td style="float:left;" colspan="5"><span class="baslik4">Ünvanı: <?php echo $ayar->yetkili_unvan ?></span></td>
        <td></td>
        <td style="float:left;" colspan="5"><span class="baslik4">Ünvanı: <?php echo $ayar->cikis_yetkili_unvan ?></span></td>
    </tr>
    <tr>
        <td></td>
        <td style="float:left;" colspan="5"><span class="baslik4">İmzası:........................................</span></td>
        <td></td>
        <td style="float:left;" colspan="5"><span class="baslik4">İmzası:........................................</span></td>
    </tr>
    <tr>
        <td colspan="12" height="16px;"></td>
    </tr>
    <tr>
        <td colspan="6"><span class="baslik4">TESLİM EDİLMİŞTİR <?php echo date('d/m/Y') ?></span></td>
        <td colspan="6"><span class="baslik4">TESLİM ALINMIŞTIR <?php echo date('d/m/Y') ?></span></td>
    </tr>
    <tr>
        <td colspan="6"><span class="baslik4">TESLİM EDEN <?php echo date('d/m/Y') ?></span></td>
        <td colspan="6"><span class="baslik4">TESLİM ALAN <?php echo date('d/m/Y') ?></span></td>
    </tr>
    <tr>
        <td></td>
        <td style="float:left;" colspan="5"><span class="baslik4">Adı Soyadı: <?php echo $ayar->teslim_eden ?></span></td>
        <td></td>
        <td style="float:left;" colspan="5"><span class="baslik4">Adı Soyadı: <?php echo $ayar->teslim_alan ?></span></td>
    </tr>
    <tr>
        <td></td>
        <td style="float:left;" colspan="5"><span class="baslik4">Ünvanı: <?php echo $ayar->teslim_eden_unvan ?></span></td>
        <td></td>
        <td style="float:left;" colspan="5"><span class="baslik4">Ünvanı: <?php echo $ayar->teslim_alan_unvan ?></span></td>
    </tr>
    <tr>
        <td></td>
        <td style="float:left;" colspan="5"><span class="baslik4">İmzası:........................................</span></td>
        <td></td>
        <td style="float:left;" colspan="5"><span class="baslik4">İmzası:........................................</span></td>
    </tr>
</table>
<?php }  ?>
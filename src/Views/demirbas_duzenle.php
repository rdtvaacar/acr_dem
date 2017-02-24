<?php $formlar = [
    [
        'demirbas_isim',
        'Demirbaş İsim',
        $demirbas_data->demirbas_isim,
        'text',
        '',
        '<div class="input-group-addon"><span class="glyphicon glyphicon-tag"></span></div>'
    ],
    [
        'demirbas_aciklama',
        'Demirbaş Açıklama',
        $demirbas_data->demirbas_aciklama,
        'text',
        '',
        '<div class="input-group-addon"><span  class="glyphicon glyphicon-tags"></span></div>'
    ],
    [
        'demirbas_marka',
        'Demirbaşın Markası',
        $demirbas_data->demirbas_marka,
        'text',
        '',
        '<div class="input-group-addon"><span  class="glyphicon glyphicon-leaf"></div>'

    ],
    [
        'demirbas_model',
        'Demirbaşın Modeli',
        $demirbas_data->demirbas_model,
        'text',
        '',
        '<div class="input-group-addon"><span  class="glyphicon glyphicon-globe"></div>'

    ],
    [
        'demirbas_bulunan_yer',
        'Bulunduğu Yer',
        $demirbas_data->demirbas_bulunan_yer,
        'text',
        '',
        '<div class="input-group-addon"><span  class="glyphicon glyphicon-map-marker"></div>'
    ],


    [
        'demirbas_bakim_periyodu',
        'Demirbaş Bakım Periyodu Ay Olarak Yazılmalı (ÖRN:12)',
        $demirbas_data->demirbas_bakim_periyodu,
        'number',
        '',
        '<div class="input-group-addon"><span  class="glyphicon glyphicon-calendar"></div>'
    ],
    [
        'demirbas_alis_tarihi',
        'Demirbaş Alış Tarihi',
        date('d/m/Y', strtotime($demirbas_data->demirbas_alis_tarihi)),
        '',
        'date',
        '<div class="input-group-addon"><span  class="glyphicon glyphicon-calendar"></div>'
    ],
    [
        'demirbas_kodu',
        'Demirbaş Kodu',
        $demirbas_data->demirbas_kodu,
        'text',
        '',
        '<div class="input-group-addon"><span  class="glyphicon glyphicon-subtitles"></div>'
    ],
    [
        'demirbas_no',
        'Demirbaş No',
        $demirbas_data->demirbas_no,
        'number',
        '',
        '<div class="input-group-addon"><span  class="glyphicon glyphicon-edit"></div>'
    ],
    [
        'demirbas_plaka',
        'Demirbaş Plakası',
        $demirbas_data->demirbas_plaka,
        'text',
        '',
        '<div class="input-group-addon"><span  class="glyphicon glyphicon-sound-dolby"></div>'
    ],
    [
        'demirbas_motor_no',
        'Demirbaş Motor No',
        $demirbas_data->demirbas_motor_no,
        'text',
        '',
        '<div class="input-group-addon"><span  class="glyphicon glyphicon-compressed"></div>'
    ],
    [
        'demirbas_sasi_no',
        'Demirbaş Şasi No',
        $demirbas_data->demirbas_sasi_no,
        'text',
        '',
        '<div class="input-group-addon"><span  class="glyphicon glyphicon-sound-stereo"></div>'
    ],
    [
        'demirbas_yazar',
        'Demirbaş Kitabın Yazarı',
        $demirbas_data->demirbas_yazar,
        'text',
        '',
        '<div class="input-group-addon"><span  class="glyphicon glyphicon-book"></div>'
    ],
    [
        'demirbas_basim_yer',
        'Demirbaş Kitabın Basım Yeri',
        $demirbas_data->demirbas_basim_yer,
        'text',
        '',
        '<div class="input-group-addon"><span  class="glyphicon glyphicon-book"></div>'
    ],
    [
        'demirbas_basim_yil',
        'Demirbaş Kitabın Basım Yılı',
        $demirbas_data->demirbas_basim_yil,
        'text',
        '',
        '<div class="input-group-addon"><span  class="glyphicon glyphicon-book"></div>'
    ],
    [
        'demirbas_sayfa',
        'Demirbaş Kitabın Sayfası',
        $demirbas_data->demirbas_sayfa,
        'text',
        '',
        '<div class="input-group-addon"><span  class="glyphicon glyphicon-book"></div>'
    ],
    [
        'demirbas_kitabin_turu',
        'Demirbaş Kitabın Turu (Nevi)',
        $demirbas_data->demirbas_kitabin_turu,
        'text',
        '',
        '<div class="input-group-addon"><span  class="glyphicon glyphicon-book"></div>'
    ],
    [
        'demirbas_deger',
        'Birim Fiyatı',
        $demirbas_data->demirbas_deger,
        'text',
        'money',
        '<div class="input-group-addon">₺</div>'
    ],
    [
        'demirbas_miktar',
        'Miktarı',
        $demirbas_data->demirbas_miktar,
        'number',
        '',
        '<div class="input-group-addon"><span  class="glyphicon glyphicon-equalizer"></div>'
    ],


];
?>
<form id="demirbas_duzenle_form">
    <?php
    foreach (array_chunk($formlar, 5, true) as $item) {
        foreach ($item as $form => $veri) {
            ?>
            <div style="float: left; width: 48%; margin: 5px" class="form-group">
                <label for="<?php echo $veri[0] ?>"><?php echo $veri[1] ?></label>
                <div class="input-group">
                    <?php echo $veri[5] ?>
                    <input type="<?php echo $veri[3] ?>" class="form-control <?php echo $veri[4] ?>" id="<?php echo $veri[0] ?>" name="<?php echo $veri[0] ?>" value="<?php echo $veri[2] ?>"/>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
    <div style="float: left; width: 48%; margin: 5px" class="form-group">
        <label for="birim_id">Birim</label>
        <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-option-vertical"></div>
            <select class="form-control " id="birim_id" name="birim_id">
                <?php
                foreach ($birimler as $birim) { ?>
                    <option <?php echo $demirbas_data->birim_id == $birim->id ? 'selected="selected"' : ''; ?> value="<?php echo $birim->id; ?>"><?php echo $birim->birim_isim;
                        echo empty($birim->birim_olcu) ? '' : ' <span style="font-size:8pt; color: rgba(31,131,253,0.29)">(' . $birim->birim_olcu . ')</span>'; ?>
                    </option>
                <?php } ?>

            </select>
        </div>
    </div>
    <div style="float: left; width: 48%; margin: 5px" class="form-group">
        <label for="firma_id">Firma</label>
        <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-bookmark"></div>
            <select class="form-control " id="firma_id" name="firma_id">
                <option>Seçiniz</option>
                <?php foreach ($firmalar as $firma) { ?>
                    <option <?php echo $demirbas_data->firma_id == $firma->id ? 'selected="selected"' : ''; ?> value="<?php echo $firma->id ?>"><?php echo $firma->firma_isim ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div style="float: left; width: 48%; margin: 5px" class="form-group">
        <label for="amortisman_id">Amortisman</label>
        <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-dashboard"></div>
            <select class="form-control " id="amortisman_id" name="amortisman_id">

                <?php foreach ($amortismanlar as $amortisman) {

                    if ($amortisman->omur == null) {
                        if ($amortisman->id == $amortisman->amortisman_id) {
                            echo '<optgroup label="' . $amortisman->amortisman . '">';
                        }
                        ?>
                    <?php } else { ?>
                        <option <?php echo $demirbas_data->amortisman_id == $amortisman->id ? 'selected="selected"' : ''; ?> value="<?php echo $amortisman->id ?>"><?php echo $amortisman->amortisman ?></option>
                        <?php
                        if ($amortisman->id == $amortisman->amortisman_id) {
                            echo '</optgroup>';
                        }
                    }
                } ?>
            </select>
        </div>
    </div>
    <div style="float: left; width: 48%; margin: 5px" class="form-group">
        <label for="personel_id">Personeller</label>
        <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-user"></div>
            <select class="form-control " id="personel_id" name="personel_id">
                <option>Seçiniz</option>
                <?php foreach ($personeller as $per) { ?>
                    <option <?php echo $demirbas_data->personel_id == $per->id ? 'selected="selected"' : ''; ?> value="<?php echo $per->id ?>"><?php echo $per->ad ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div style="float: left; width: 48%; margin: 5px" class="form-group">
        <label for="grup_id">Demirbaş Grup</label>
        <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-user"></div>
            <select class="form-control " id="grup_id" name="grup_id">
                <option>Seçiniz</option>
                <?php foreach ($gruplar as $grup) { ?>
                    <option <?php echo $demirbas_data->grup_id == $grup->id ? 'selected="selected"' : ''; ?> value="<?php echo $grup->id ?>"><?php echo $grup->grup_isim ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <input type="hidden" id="demirbas_id" name="demirbas_id" value="<?php echo $demirbas_data->demirbas_id ?>"/>
</form>
<div style="clear:both;"></div>
<br>
<button class="btn btn-primary btn-block" onclick="demirbas_duzenle_kaydet(<?php echo $demirbas_data->demirbas_id ?>)">DEĞİŞİKLİKLERİ KAYDET</button>
<div style="clear:both;"></div>
<script language="JavaScript" src="<?php echo URL::asset('/') . 'js/jquery.mask.min.js' ?>"></script>
<script>
    $(document).ready(function () {
        $('.date').mask('00/00/0000', {reverse: false});
        $('.time').mask('00:00:00');
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
        $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});

    });

</script>
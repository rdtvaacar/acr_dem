<table>
    <tbody>
    <tr>
        <td><h3><strong>SIRA</strong></h3></td>
        <td><h3><strong>NO</strong></h3></td>
        <td><h3><strong>KODU</strong></h3></td>
        <td><h3><strong>İSİM</strong></h3></td>
        <td><h3><strong>ACIKLAMA</strong></h3></td>
        <td><h3><strong>MARKA</strong></h3></td>
        <td><h3><strong>MODEL</strong></h3></td>
        <td><h3><strong>GRUP</strong></h3></td>
        <td><h3><strong>MİKTAR</strong></h3></td>
        <td><h3><strong>BİRİM FİYAT</strong></h3></td>
        <td><h3><strong>TOPLAM FİYAT</strong></h3></td>
        <td><h3><strong>ALIŞ TARİHİ</strong></h3></td>
        <td><h3><strong>A. ID</strong></h3></td>
        <td><h3><strong>A. ÖMÜR</strong></h3></td>
        <td><h3><strong>A. ORAN</strong></h3></td>
        <td><h3><strong>BAKIM (AY)</strong></h3></td>
        <td><h3><strong>YERİ</strong></h3></td>
        <td><h3><strong>SON TARİH</strong></h3></td>
        <td><h3><strong>PLAKA</strong></h3></td>
        <td><h3><strong>MOTOR NO</strong></h3></td>
        <td><h3><strong>ŞASİ NO</strong></h3></td>
        <td><h3><strong>YAZAR</strong></h3></td>
        <td><h3><strong>BASIM YERİ</strong></h3></td>
        <td><h3><strong>BASIM YILI</strong></h3></td>
        <td><h3><strong>SAYFA</strong></h3></td>
        <td><h3><strong>KİTAP TURU</strong></h3></td>
    </tr>
    <?php
    $satir = 1;
    if(empty(Input::get('bosListe'))) {

    $son_yil = empty($data->amortisman_id) ? '' : date('d.', strtotime($data->demirbas_alis_tarihi)) . date('m.', strtotime($data->demirbas_alis_tarihi)) . (date('Y', strtotime($data->demirbas_alis_tarihi)) +
            $data->omur);
    foreach ($demirbas_data as $data) { ?>
    <tr>
        <td><?php echo $satir; ?></td>
        <td><?php echo $data->demirbas_no ?></td>
        <td><?php echo $data->kod_1 . ' ' . $data->kod_2 . ' ' . $data->kod_3 . ' ' . $data->kod_4 . ' ' . $data->kod_5 . ' ' . $data->kod_6  ?></td>
        <td><?php echo $data->demirbas_isim ?></td>
        <td><?php echo $data->demirbas_aciklama ?></td>
        <td><?php echo $data->demirbas_marka ?></td>
        <td><?php echo $data->demirbas_model ?></td>
        <td><?php echo $data->grup_isim ?></td>
        <td><?php echo $data->demirbas_miktar ?></td>
        <td><?php echo $data->demirbas_deger ?></td>
        <td><?php echo $data->demirbas_miktar * $data->demirbas_deger ?></td>
        <td><?php echo date('d.m.Y', strtotime($data->demirbas_alis_tarihi)) ?></td>
        <td><?php echo $data->amortisman_id ?></td>
        <td><?php echo $data->omur ?></td>
        <td><?php echo $data->oran ?></td>
        <td><?php echo $data->demirbas_bakim_periyodu ?> AY</td>
        <td><?php echo $data->demirbas_bulunan_yer ?></td>
        <td><?php echo $son_yil ?></td>
        <td><?php echo $data->demirbas_plaka ?></td>
        <td><?php echo $data->demirbas_motor_no ?></td>
        <td><?php echo $data->demirbas_sasi_no?></td>
        <td><?php echo $data->demirbas_yazar ?></td>
        <td><?php echo $data->demirbas_basim_yer ?></td>
        <td><?php echo $data->demirbas_basim_yil ?></td>
        <td><?php echo $data->demirbas_sayfa ?></td>
        <td><?php echo $data->demirbas_kitabin_turu ?></td>

    </tr>
    </tbody>
    <?php $satir++; }
    }?>
</table>
<?php

// firmalar
Route::post('/derirbas_firma_sil', function () {
    return Demirbas::firma_sil();
});
Route::post('/tum_firmalar', function () {
    return Demirbas::tum_firmalar();
});
Route::post('/demirbas_firmalar', function () {
    return Demirbas::demirbas_firmalar();
});
Route::post('/demirbas_firma_ekle', function () {
    return Demirbas::firma_ekle();
});
Route::post('/demirbas_firma_guncelle', function () {
    return Demirbas::firma_guncelle();
});
Route::post('/demirbas_firma_tuttur', function () {
    return Demirbas::demirbas_firma_tuttur();
});
// hesaplar

Route::post('/derirbas_hesap_sil', function () {
    return Demirbas::hesap_sil();
});
Route::post('/tum_hesaplar', function () {
    return Demirbas::tum_hesaplar();
});
Route::post('/demirbas_hesaplar', function () {
    return Demirbas::demirbas_hesaplar();
});
Route::post('/demirbas_hesap_ekle', function () {
    return Demirbas::hesap_ekle();
});
Route::post('/demirbas_hesap_guncelle', function () {
    return Demirbas::hesap_guncelle();
});
Route::post('/demirbas_hesap_tuttur', function () {
    return Demirbas::demirbas_hesap_tuttur();
});
// gruplar
Route::post('/derirbas_grup_sil', function () {
    return Demirbas::grup_sil();
});
Route::post('/tum_gruplar', function () {
    return Demirbas::tum_gruplar();
});
Route::post('/demirbas_gruplar', function () {
    return Demirbas::demirbas_gruplar();
});
Route::post('/demirbas_grup_ekle', function () {
    return Demirbas::grup_ekle();
});
Route::post('/demirbas_grup_guncelle', function () {
    return Demirbas::grup_guncelle();
});
Route::post('/demirbas_grup_tuttur', function () {
    return Demirbas::demirbas_grup_tuttur();
});

//demirbaş
Route::get('/acr_demirbas', function () {
    return Demirbas::index();
});
Route::post('/demirbas_ekle', function () {
    return Demirbas::demirbas_ekle();
});
Route::get('/tum_amortismanlar', function () {
    return Demirbas::tum_amortismanlar();
});
Route::post('/demirbas_duzenle', function () {
    return Demirbas::demirbas_duzenle();
});
Route::post('/tum_amortismanlar', function () {
    return Demirbas::tum_amortismanlar();
});
Route::post('/amortismanEkle', function () {
    return Demirbas::amortismanEkle();
});
Route::post('/demirbas_guncelle', function () {
    return Demirbas::demirbas_guncelle();
});
Route::get('/tum_demirbaslar', function () {
    return Demirbas::tum_demirbaslar();
});
Route::post('/demirbas_sil', function () {
    return Demirbas::demirbas_sil();
});

Route::post('/demirbas_duzenle_kaydet', function () {
    return Demirbas::demirbas_duzenle_kaydet();
});
Route::post('/tum_demirbas_sil', function () {
    return Demirbas::tum_demirbas_sil();
});

// excel
Route::get('/amortismanYukle', function () {
    return Demirbas::amortismanYukle();
});
Route::get('/demirbas_excel_aktar', function () {
    return Demirbas::demirbas_excel_aktar();
});
Route::post('/demirbas_excel_yukle', function () {
    return Demirbas::demirbas_excel_yukle();
});
Route::post('/demirbas_hesap_excel_yukle', function () {
    return Demirbas::demirbas_hesap_excel_yukle();
});

// raporlar
Route::post('/raporOlustur', function () {
    return Demirbas::raporOlustur();
});

// ayarlar

Route::post('/demirbas_ayarlar', function () {
    return Demirbas::demirbas_ayarlar();
});
Route::post('/demirbas_ayar_kaydet', function () {
    return Demirbas::demirbas_ayar_kaydet();
});

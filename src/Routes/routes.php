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
Route::get('/demirbas_excel_aktar', function () {
    return Demirbas::demirbas_excel_aktar();
});

Route::post('/demirbas_excel_yukle', function () {
    return Demirbas::demirbas_excel_yukle();
});
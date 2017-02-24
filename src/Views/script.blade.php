<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $('#menuTable').DataTable({
            "language": {
                "sProcessing" : "İşleniyor...",
                "lengthMenu"  : "Sayfada _MENU_ satır gösteriliyor",
                "zeroRecords" : "Eşleşen sonuç yok",
                "info"        : "Toplam _PAGES_ sayfadan _PAGE_. sayfa gösteriliyor",
                "infoEmpty"   : "Gösterilecek öğe yok",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search"      : "Arama yap",
                "oPaginate"   : {
                    "sFirst"   : "İlk",
                    "sPrevious": "Önceki",
                    "sNext"    : "Sonraki",
                    "sLast"    : "Son"
                }

            }
        });
    });

    function demirbas_hesap_sec(demirbas_id) {
        $.ajax({
            type   : 'post',
            url    : 'tum_hesaplar',
            data   : 'demirbas_id=' + demirbas_id,
            success: function (veri) {
                $('.modal-title').html('hesap Seçim Ekranı');
                $('.modal-body').html(veri);
                $('#demirbasModal').modal('show');
            }
        });
    }
    function demirbas_hesaplar() {
        $.ajax({
            type   : 'post',
            url    : 'demirbas_hesaplar',
            success: function (veri) {
                $('.modal-title').html('hesap Düzenleme <div style="float: right; margin-right: 50px;" class="btn btn-success " onclick="yeni_hesap_ekle(0)">Yeni hesap Ekle</div>');
                $('.modal-body').html(veri);
                $('#demirbasModal').modal('show');
            }
        });
    }
    function hesap_guncelle(hesap_id) {
        var hesap_isim = $('#hesap_isim_' + hesap_id).val();
        var hesap_aciklama = $('#hesap_aciklama_' + hesap_id).val();
        var hesap_vergi_no = $('#hesap_vergi_no_' + hesap_id).val();
        $.ajax({
            type   : 'post',
            url    : 'demirbas_hesap_guncelle',
            data   : 'hesap_isim=' + hesap_isim + '&hesap_aciklama=' + hesap_aciklama + '&hesap_vergi_no=' + hesap_vergi_no + '&hesap_id=' + hesap_id,
            success: function (veri) {
                $('#hesap_guncel_' + hesap_id).show();
                $('#hesap_guncel_' + hesap_id).html('<span style="color: #1c9f0a" class="glyphicon glyphicon-ok-sign"></span>');
                $('#hesap_guncel_' + hesap_id).fadeOut(1000);
                $('.duzenleme_input_' + hesap_id).hide();
                $('#duzenleButton_' + hesap_id).show();
            }
        });
    }
    function demirbas_hesap_tuttur(hesap_id, demirbas_id) {
        $.ajax({
            type   : 'post',
            url    : 'demirbas_hesap_tuttur',
            data   : 'hesap_id=' + hesap_id + '&demirbas_id=' + demirbas_id,
            success: function (veri) {
                $('#demirbas_hesap_kod_' + demirbas_id).html(veri);
                $('#demirbasModal').modal('hide');
            }
        });
    }
    function derirbas_hesap_sil(hesap_id) {
        if (confirm('hesap silinsin mi?') == true) {
            $.ajax({
                type   : 'post',
                url    : 'derirbas_hesap_sil',
                data   : 'hesap_id=' + hesap_id,
                success: function () {
                    $('#hesap_' + hesap_id).hide();
                }
            });
        }
    }
    function yeni_grup_ekle(id) {
        $.ajax({
            type   : 'post',
            url    : 'demirbas_grup_ekle',
            data   : 'id=' + id,
            success: function (veri) {
                $('#gruplar').append(veri);
            }
        });
    }

    function demirbas_grup_sec(demirbas_id) {
        $.ajax({
            type   : 'post',
            url    : 'tum_gruplar',
            data   : 'demirbas_id=' + demirbas_id,
            success: function (veri) {
                $('.modal-title').html('Grup Seçim Ekranı');
                $('.modal-body').html(veri);
                $('#demirbasModal').modal('show');
            }
        });
    }
    function demirbas_gruplar() {
        $.ajax({
            type   : 'post',
            url    : 'demirbas_gruplar',
            success: function (veri) {
                $('.modal-title').html('Grup Düzenleme <div style="float: right; margin-right: 50px;" class="btn btn-success " onclick="yeni_grup_ekle(0)">Yeni grup Ekle</div>');
                $('.modal-body').html(veri);
                $('#demirbasModal').modal('show');
            }
        });
    }
    function grup_guncelle(grup_id) {
        var grup_isim = $('#grup_isim_' + grup_id).val();
        var grup_aciklama = $('#grup_aciklama_' + grup_id).val();
        var grup_vergi_no = $('#grup_vergi_no_' + grup_id).val();
        $.ajax({
            type   : 'post',
            url    : 'demirbas_grup_guncelle',
            data   : 'grup_isim=' + grup_isim + '&grup_aciklama=' + grup_aciklama + '&grup_vergi_no=' + grup_vergi_no + '&grup_id=' + grup_id,
            success: function (veri) {
                $('#grup_guncel_' + grup_id).show();
                $('#grup_guncel_' + grup_id).html('<span style="color: #1c9f0a" class="glyphicon glyphicon-ok-sign"></span>');
                $('#grup_guncel_' + grup_id).fadeOut(1000);
                $('.duzenleme_input_' + grup_id).hide();
                $('#duzenleButton_' + grup_id).show();
            }
        });
    }
    function demirbas_grup_tuttur(grup_id, demirbas_id) {
        $.ajax({
            type   : 'post',
            url    : 'demirbas_grup_tuttur',
            data   : 'grup_id=' + grup_id + '&demirbas_id=' + demirbas_id,
            success: function (veri) {
                $('#demirbas_grup_' + demirbas_id).html(veri);
                $('#demirbasModal').modal('hide');
            }
        });
    }
    function demirbas_ayarlar() {
        $.ajax({
            type   : 'post',
            url    : 'demirbas_ayarlar',
            success: function (veri) {
                $('.modal-title').html('Demirbaş Genel Ayarlar');
                $('.modal-body').html(veri);
                $('#demirbasModal').modal('show');
            }
        });

    }
    function derirbas_grup_sil(grup_id) {
        if (confirm('grup silinsin mi?') == true) {
            $.ajax({
                type   : 'post',
                url    : 'derirbas_grup_sil',
                data   : 'grup_id=' + grup_id,
                success: function () {
                    $('#grup_' + grup_id).hide();
                }
            });
        }
    }
    function demirbas_duzenle_kaydet(demirbas_id, yeni_demirbas) {
        $.ajax({
            type   : 'post',
            url    : 'demirbas_duzenle_kaydet',
            data   : $("#demirbas_duzenle_form").serialize(),
            success: function (veri) {
                if (yeni_demirbas == 1) {
                    $('#demirbaslar').append(veri);
                } else {
                    $('#demirbas_isim_' + demirbas_id).html(veri[0]);
                    $('#demirbas_deger_' + demirbas_id).html(veri[1]);
                    $('#demirbas_miktar_' + demirbas_id).html(veri[2]);
                    $('#demirbas_toplamFiyat_' + demirbas_id).html(veri[3]);
                    $('#demirbas_hesap_kod_' + demirbas_id).html(veri[4]);
                    $('#demirbas_grup_' + demirbas_id).html(veri[5]);
                    $('#demirbas_firma' + demirbas_id).html(veri[6]);
                    $('#amortisman_' + demirbas_id).html(veri[7]);
                    $('#amortisman_son_yil_' + demirbas_id).html(veri[8]);
                    $('#demirbas_' + demirbas_id).addClass('bg bg-info');
                }
                $('#demirbasModal').modal('hide');

            }
        });
    }

    function demirbas_ekle(id) {
        $.ajax({
            type   : 'post',
            url    : 'demirbas_ekle',
            data   : 'id=' + id,
            success: function (veri) {
                $('#demirbaslar').append(veri);
            }
        });
    }
    function amortismanSec(demirbas_id) {
        $.ajax({
            type   : 'post',
            url    : 'tum_amortismanlar',
            data   : 'demirbas_id=' + demirbas_id,
            success: function (veri) {
                $('.modal-title').html('Amortisman Seçim Ekranı');
                $('.modal-body').html(veri);
                $('#demirbasModal').modal('show');
            }
        });
    }
    function demirbas_firma_sec(demirbas_id) {
        $.ajax({
            type   : 'post',
            url    : 'tum_firmalar',
            data   : 'demirbas_id=' + demirbas_id,
            success: function (veri) {
                $('.modal-title').html('Firma Seçim Ekranı');
                $('.modal-body').html(veri);
                $('#demirbasModal').modal('show');
            }
        });
    }
    function demirbas_firmalar() {
        $.ajax({
            type   : 'post',
            url    : 'demirbas_firmalar',
            success: function (veri) {
                $('.modal-title').html('Firma Düzenleme <div style="float: right; margin-right: 50px;" class="btn btn-success " onclick="yeni_firma_ekle(0)">Yeni Firma Ekle</div>');
                $('.modal-body').html(veri);
                $('#demirbasModal').modal('show');
            }
        });
    }
    function amortismanEkle(amortisman_id, demirbas_id) {
        $.ajax({
            type   : 'post',
            url    : 'amortismanEkle',
            data   : 'amortisman_id=' + amortisman_id + '&demirbas_id=' + demirbas_id,
            success: function (veri) {
                $('#amortisman_' + demirbas_id).html(veri[0]);
                $('#amortisman_omur_' + demirbas_id).html(veri[1]);
                $('#amortisman_oran_' + demirbas_id).html(veri[2]);
                $('#demirbasModal').modal('hide');
            }
        });
    }
    function yeni_firma_ekle(id) {
        $.ajax({
            type   : 'post',
            url    : 'demirbas_firma_ekle',
            data   : 'id=' + id,
            success: function (veri) {
                $('#firmalar').append(veri);
            }
        });
    }

    function demirbas_duzenle(demirbas_id) {

        $.ajax({
            type   : 'post',
            url    : 'demirbas_duzenle',
            data   : 'demirbas_id=' + demirbas_id,
            success: function (veri) {
                $('.modal-title').html('Demirbaş Düzenleme');
                $('.modal-body').html(veri);
                $('#demirbasModal').modal('show');
            }
        });

    }

    function demirbas_guncelle(demirbas_id) {
        var demirbas_isim = $('#demirbas_isim_' + demirbas_id).val();
        var demirbas_aciklama = $('#demirbas_aciklama_' + demirbas_id).val();
        $.ajax({
            type   : 'post',
            url    : 'demirbas_guncelle',
            data   : 'demirbas_isim=' + demirbas_isim + '&demirbas_aciklama=' + demirbas_aciklama + '&demirbas_id=' + demirbas_id,
            success: function (veri) {
                $('#demirbas_guncel_' + demirbas_id).show();
                $('#demirbas_guncel_' + demirbas_id).html('<span style="color: #1c9f0a" class="glyphicon glyphicon-ok-sign"></span>');
                $('#demirbas_guncel_' + demirbas_id).fadeOut(1000);
                $('#duzenleme_div_isim_' + demirbas_id).show().html(demirbas_isim);
                $('#duzenleme_div_aciklama_' + demirbas_id).show().html(demirbas_aciklama);
                $('.duzenleme_input_' + demirbas_id).hide();
                $('#duzenleButton_' + demirbas_id).show();
                $('#guncelleButton_' + demirbas_id).hide();
            }
        });
    }
    function firma_guncelle(firma_id) {
        var firma_isim = $('#firma_isim_' + firma_id).val();
        var firma_aciklama = $('#firma_aciklama_' + firma_id).val();
        var firma_vergi_no = $('#firma_vergi_no_' + firma_id).val();
        $.ajax({
            type   : 'post',
            url    : 'demirbas_firma_guncelle',
            data   : 'firma_isim=' + firma_isim + '&firma_aciklama=' + firma_aciklama + '&firma_vergi_no=' + firma_vergi_no + '&firma_id=' + firma_id,
            success: function (veri) {
                $('#firma_guncel_' + firma_id).show();
                $('#firma_guncel_' + firma_id).html('<span style="color: #1c9f0a" class="glyphicon glyphicon-ok-sign"></span>');
                $('#firma_guncel_' + firma_id).fadeOut(1000);
                $('.duzenleme_input_' + firma_id).hide();
                $('#duzenleButton_' + firma_id).show();
            }
        });
    }
    function demirbas_firma_tuttur(firma_id, demirbas_id) {
        $.ajax({
            type   : 'post',
            url    : 'demirbas_firma_tuttur',
            data   : 'firma_id=' + firma_id + '&demirbas_id=' + demirbas_id,
            success: function (veri) {
                $('#demirbas_firma_' + demirbas_id).html(veri);
                $('#demirbasModal').modal('hide');
            }
        });
    }
    function derirbas_firma_sil(firma_id) {
        if (confirm('Firma silinsin mi?') == true) {
            $.ajax({
                type   : 'post',
                url    : 'derirbas_firma_sil',
                data   : 'firma_id=' + firma_id,
                success: function () {
                    $('#firma_' + firma_id).hide();
                }
            });
        }
    }
    function demirbas_sil(demirbas_id) {
        if (confirm('Demirbaş silinsin mi?') == true) {
            $.ajax({
                type   : 'post',
                url    : 'demirbas_sil',
                data   : 'demirbas_id=' + demirbas_id,
                success: function () {
                    $('#demirbas_' + demirbas_id).hide();
                }
            });
        }
    }
    function tum_demirbas_sil() {
        if (confirm('Tüm demirbaş listeniz silinsin mi?') == true) {
            $.ajax({
                type   : 'post',
                url    : 'tum_demirbas_sil',
                success: function () {
                    location.reload();
                }
            });
        }
    }


</script>
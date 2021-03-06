<?php
namespace Acr\Demirbas;

use Acr\Demirbas\Controller\BaseController;
use Acr\Demirbas\Model\Amortisman_model;
use Acr\Demirbas\Model\Demirbas_ayar_model;
use Acr\Demirbas\Model\Demirbas_firma_model;
use Acr\Demirbas\Model\Demirbas_grup_model;
use Acr\Demirbas\Model\Demirbas_hesap_model;
use Illuminate\Http\Request;
use DB;
use App\Handlers\Commands\my;
use Form;
use Illuminate\Support\Facades\Input;
use View;
use Illuminate\Support\Facades\Config;
use Acr\Demirbas\Controller\AmortismanContorller;
use Acr\Demirbas\Model\Demirbas_model;

use Acr\Demirbas\Model\Demirbas_amortisman_list;
use Acr\Demirbas\Controller\DemirbasController;
use Session;

class Demirbas extends BaseController
{

    protected $basarili           = '<div class="alert alert-success">Başarıyla Eklendi</div>';
    protected $basariliGuncelleme = '<div class="alert alert-success">Başarıyla Güncellendi</div>';
    protected $kullaniciAdi       = '';
    protected $kullaniciSifre     = '';
    protected $config;
    public    $demirbas_isim;
    public    $demirbas_aciklama;
    public    $amortisman;
    public    $amortisman_aciklama;
    public    $oran;
    public    $amortisman_id;
    public    $demirbas_id;
    public    $omur;
    public    $id;
    public    $firma_id;
    public    $firma_isim;

    function __construct()
    {
        $this->config = Config::get("demirbas_config");
    }

    function index()
    {

        $demirbas = new Demirbas();
        return View::make('acr_demirbas.index', compact('demirbas'));
    }

    function anasayfa()
    {
        $raporlar = self::raporlar();
        $demirbas = new Demirbas();
        return view('acr_views::anasayfa', compact('demirbas', 'raporlar'));
    }

    function script()
    {
        return view('acr_views::script');
    }

    function demirbas_ayarlar()
    {
        $formlar        = [
            'il_ilce'             => 'İl ve İlce Adı',
            'il_ilce_kod'         => 'İl ve İlçe Kodu',
            'harcama'             => 'Harcama Birimi',
            'harcama_kod'         => 'Harcama Kodu',
            'ambar'               => 'Ambar Adı',
            'ambar_kod'           => 'Ambar Kodu',
            'muhasebe'            => 'Muhasebe Birimi Adı',
            'muhasebe_kod'        => 'Muhasebe Kodu',
            'teslim_eden'         => 'Teslim Eden Kişi',
            'teslim_eden_unvan'   => 'Teslim Eden Ünvan',
            'yetkili'             => 'Giriş Yetkili Kişi',
            'yetkili_unvan'       => 'Giriş Yetkili Kişi Ünvan',
            'cikis_yetkili'       => 'Çıkış Yetkili Kişi',
            'cikis_yetkili_unvan' => 'Çıkış Yetkili Kişi Ünvan',
            'teslim_alan'         => 'Teslim Alan Kişi',
            'teslim_alan_unvan'   => 'Teslim Alan Kişi Unvan'
        ];
        $demirbas_model = new Demirbas_model();
        $demirbas       = new Demirbas();
        $ayar           = $demirbas_model->demirbas_ayar();
        if (empty($ayar)) {
            $data = [];
            $demirbas_model->demirbas_ayar_kaydet($data);
            $ayar = $demirbas_model->demirbas_ayar();
        }
        return view('acr_views::ayarlar', compact('demirbas', 'formlar', 'ayar'));
    }

    function demirbas_ayar_kaydet()
    {
        $demirbas_model = new Demirbas_model();
        $demirbas       = new Demirbas();
        $data           = [
            'il_ilce'             => Input::get('il_ilce'),
            'il_ilce_kod'         => Input::get('il_ilce_kod'),
            'harcama'             => Input::get('harcama'),
            'harcama_kod'         => Input::get('harcama_kod'),
            'ambar'               => Input::get('ambar'),
            'ambar_kod'           => Input::get('ambar_kod'),
            'muhasebe'            => Input::get('muhasebe'),
            'muhasebe_kod'        => Input::get('muhasebe_kod'),
            'teslim_eden'         => Input::get('teslim_eden'),
            'teslim_eden_unvan'   => Input::get('teslim_eden_unvan'),
            'yetkili'             => Input::get('yetkili'),
            'yetkili_unvan'       => Input::get('yetkili_unvan'),
            'cikis_yetkili'       => Input::get('cikis_yetkili'),
            'cikis_yetkili_unvan' => Input::get('cikis_yetkili_unvan'),
            'teslim_alan'         => Input::get('teslim_alan'),
            'teslim_alan_unvan'   => Input::get('teslim_alan_unvan'),
        ];
        $demirbas_model->demirbas_ayar_kaydet($data);
        return redirect()->back()->with('msg', $this->basarili);
    }

    function raporOlustur()
    {
        $rapor              = Input::get('rapor');
        $id                 = Input::get('demirbas_id');
        $demirbasController = new DemirbasController();
        return $demirbasController->excelRapor($rapor, $id);
    }

    function raporlar()
    {
        return $raporlar = [
            'tif'            => 'Taşınır İşlem Fişi',
            'demirbas_istek' => 'Taşınır İstek Belgesi',
            'kitapListesi'   => 'Kütüphane Defteri',
            /*  'zimmet_tasit'    => 'Zimmet Fişi (Taşıt & MAK)',
              'zimmet_demirbas' => 'Zimmet Fişi Demirbaş',
              'gecici_alindi'   => 'Taşınır Geçici Alındısı',
              'dusme'           => 'Kayıttan Düşme Teklif Onay',
              'ambar_devir'     => 'Ambar Devir Teslim Tutanağı',*/
        ];
    }

    function demirbas_excel_aktar()
    {
        $demirbas_controller = new DemirbasController();
        return $demirbas_controller->excelAktar();
    }

    function amortismanYukle()
    {
        $amortisman_controller = new AmortismanContorller();
        return $amortisman_controller->amortismanYukle();
    }

    function tum_demirbaslar()
    {
        $demirbas_model = new Demirbas_model();
        return $demirbas_model->tum_demirbaslar();
    }

    function tum_amortismanlar()
    {

        $demirbas_model = new Demirbas_model();
        $amortismanlar  = $demirbas_model->amortismanlar();
        $demirbas_id    = Input::get('demirbas_id');
        $demirbas       = new Demirbas();
        return view('acr_views::amortismanlar', compact('demirbas', 'amortismanlar', 'demirbas_id'));

    }

    function tum_firmalar()
    {

        $demirbas_model = new Demirbas_model();
        $firmalar       = $demirbas_model->firmalar();
        $demirbas_id    = Input::get('demirbas_id');
        $demirbas       = new Demirbas();
        return view('acr_views::tum_firmalar', compact('demirbas', 'firmalar', 'demirbas_id'));

    }

    function demirbas_firmalar()
    {

        $demirbas_model = new Demirbas_model();
        $demirbas       = new Demirbas();
        $firmalar       = $demirbas_model->firmalar();
        return view('acr_views::demirbas_firmalar', compact('demirbas', 'firmalar'));

    }

    function demirbas_duzenle()
    {
        $demirbas       = new Demirbas();
        $demirbas_model = new Demirbas_model();
        $demirbas_id    = Input::get('demirbas_id');
        $yeni_demirbas  = Input::get('demirbas_id') == 0 ? 1 : 0;
        $demirbas_data  = $demirbas->demirbas($demirbas_id);
        $firmalar       = $demirbas_model->firmalar();
        $birimler       = $demirbas_model->birimler();
        $gruplar        = $demirbas_model->gruplar();
        $personeller    = $demirbas_model->personellerUye();
        $amortismanlar  = $demirbas_model->amortismanlar();
        return view('acr_views::demirbas_duzenle', compact('demirbas', 'demirbas_data', 'firmalar', 'amortismanlar', 'personeller', 'birimler', 'gruplar', 'yeni_demirbas'));

    }

    function demirbas_firma_ekle() // seçim ekranınından sonra verileri ekrana gönderir
    {

        $firma_model    = new Demirbas_firma_model();
        $demirbas_model = new Demirbas_model();
        $firma_id       = Input::get('firma_id');
        $demirbas_id    = Input::get('demirbas_id');
        $demirbas_model->where('id', $demirbas_id)->update(['firma_id' => $firma_id]);
        $firma = $firma_model->find($firma_id);
        return self::sayYaz('15', $firma->firma_isim);

    }

    function demirbas_duzenle_kaydet()
    {
        $demirbas_model = new Demirbas_model();
        $demirbas       = new Demirbas();
        $demirbas_id    = Input::get('demirbas_id');
        $yeni_demirbas  = Input::get('yeni_demirbas');

        $data = [
            'birim_id'                => Input::get('birim_id'),
            'grup_id'                 => Input::get('grup_id'),
            'amortisman_id'           => Input::get('amortisman_id'),
            'firma_id'                => Input::get('firma_id'),
            'demirbas_isim'           => Input::get('demirbas_isim'),
            'demirbas_aciklama'       => Input::get('demirbas_aciklama'),
            'demirbas_marka'          => Input::get('demirbas_marka'),
            'demirbas_no'             => Input::get('demirbas_no'),
            'demirbas_kodu'           => Input::get('demirbas_kodu'),
            'demirbas_plaka'          => Input::get('demirbas_plaka'),
            'demirbas_sasi_no'        => Input::get('demirbas_sasi_no'),
            'demirbas_motor_no'       => Input::get('demirbas_motor_no'),
            'demirbas_yazar'          => Input::get('demirbas_yazar'),
            'demirbas_basim_yer'      => Input::get('demirbas_basim_yer'),
            'demirbas_basim_yil'      => Input::get('demirbas_basim_yil'),
            'demirbas_sayfa'          => Input::get('demirbas_sayfa'),
            'demirbas_kitabin_turu'   => Input::get('demirbas_kitabin_turu'),
            'demirbas_model'          => Input::get('demirbas_model'),
            'demirbas_bulunan_yer'    => Input::get('demirbas_bulunan_yer'),
            'demirbas_miktar'         => Input::get('demirbas_miktar'),
            'demirbas_deger'          => str_replace(['.', ','], ['', '.'], Input::get('demirbas_deger')),
            'demirbas_bakim_periyodu' => Input::get('demirbas_bakim_periyodu'),
            'demirbas_alis_tarihi'    => date('Y-m-d', $demirbas->zamanHesapla(Input::get('demirbas_alis_tarihi'))),
            'personel_id'             => Input::get('personel_id'),
        ];
        $demirbas_model->demirbas_guncelle($demirbas_id, $data);
        $demirbas_veri = $demirbas->demirbas($demirbas_id);
        $son_yil       = empty($demirbas_veri->amortisman) ? '' : date('d/', strtotime($demirbas_veri->demirbas_alis_tarihi)) . date('m/', strtotime($demirbas_veri->demirbas_alis_tarihi)) . (date('Y/', strtotime($demirbas_veri->demirbas_alis_tarihi)) + $demirbas_veri->omur);
        $hesap         = $demirbas->hesap($demirbas_veri->hesap_id);
        $hesap_kodu    = empty($hesap) ? '' : $hesap->kod_1 . ' ' . $hesap->kod_2 . ' ' . $hesap->kod_3 . ' ' . $hesap->kod_4 . ' ' . $hesap->kod_5 . ' ' . $hesap->kod_6;
        if ($yeni_demirbas == 1) {
            return self::demirbas_satir($demirbas_veri);
        } else {
            return [
                $demirbas_veri->demirbas_isim,
                $demirbas_veri->demirbas_deger,
                $demirbas_veri->demirbas_miktar,
                $demirbas_veri->demirbas_deger * $demirbas_veri->demirbas_miktar,
                $hesap_kodu,
                '#' . $demirbas_veri->grup_id . ' ' . $demirbas->sayYaz(15, $demirbas_veri->grup_isim),
                '#' . $demirbas_veri->firma_id . ' ' . $demirbas->sayYaz(15, $demirbas_veri->firma_isim),
                '#' . $demirbas_veri->amortisman_id . ' ' . $demirbas->sayYaz(15, $demirbas_veri->amortisman),
                $son_yil
            ];
        }

    }

    function amortismanEkle() // seçim ekranınından sonra verileri ekrana gönderir
    {

        $amortisman_model = new Amortisman_model();
        $demirbas_model   = new Demirbas_model();
        $amortisman_id    = Input::get('amortisman_id');
        $demirbas_id      = Input::get('demirbas_id');
        $demirbas_model->where('id', $demirbas_id)->update(['amortisman_id' => $amortisman_id]);
        $amortisman = $amortisman_model->find($amortisman_id);
        return [self::sayYaz('15', $amortisman->amortisman), $amortisman->omur, $amortisman->oran];

    }

    function demirbas($id)
    {
        $demirbas_model = new Demirbas_model();
        $demirbas_no    = empty(Input::get('demirbas_no')) ? $demirbas_model->demirbas_no() : Input::get('demirbas_no');
        if (empty($id)) {
            $id = $demirbas_model->insertGetId(['uye_id' => $this->uye_id(), 'kurum_id' => $this->kurum_id(), 'demirbas_isim' => '', 'demirbas_no' => $demirbas_no]);
        }
        $demirbas_satir = $demirbas_model->demirbas($id);
        return $demirbas_satir;

    }

    function zamanHesapla($tarih)
    {
        if (empty($tarih)) {
            $tarih = Input::get('tarih');
        } else {
            $tarih = $tarih;
        }

        $tarihExp = explode("/", $tarih);
        if (array($tarihExp) && count($tarihExp) > 2) {
            $ay  = $tarihExp[1];
            $gun = $tarihExp[0];
            $yil = $tarihExp[2];
        } else {
            $ay  = 0;
            $gun = 0;
            $yil = 0;
        }
        return mktime(0, 0, 0, $ay, $gun, $yil);
    }

    function demirbas_guncelle()
    {
        $demirbas_id    = Input::get('demirbas_id');
        $demirbas_model = new Demirbas_model();
        $data           = [
            'demirbas_isim'     => Input::get('demirbas_isim'),
            'demirbas_aciklama' => Input::get('demirbas_aciklama'),
        ];
        $demirbas_model->where('id', $demirbas_id)->update($data);

    }

    function sayYaz($sayi, $yazi)
    {
        if (empty($yazi)) {
            return '';
        }
        $veri = '';
        if (strlen($yazi) < $sayi) {
            return $yazi;
        } else {
            $yazilacak     = explode(' ', substr($yazi, 0, $sayi));
            $yazilacakSayi = count($yazilacak);
            for ($i = 0; $i < $yazilacakSayi - 1; $i++) {
                $veri .= $yazilacak[$i] . ' ';
            }
            $veri .= '...';
        }
        return $veri;
    }

    function msg()
    {
        if (Session::get('msg')) {
            return Session::get('msg');
        }
    }

    function demirbas_satir($demirbas)
    {
        $demirbas_func = new Demirbas();
        return view('acr_views::demirbas_satir', compact('demirbas', 'demirbas_func'));
    }

    function demirbas_ekle($id = null)
    {
        if (empty($id)) {
            $id = Input::get('id');
        }
        $demirbas      = self::demirbas($id);
        $demirbas_func = new Demirbas();
        return view('acr_views::demirbas_satir', compact('demirbas', 'demirbas_func'));
    }

    function firma($id)
    {
        $firma_model = new Demirbas_firma_model();
        if (empty($id)) {
            $id = $firma_model->insertGetId(['uye_id' => $this->uye_id(), 'kurum_id' => $this->kurum_id(), 'firma_isim' => '']);
        }
        $firma_satir = $firma_model->find($id);
        return $firma_satir;

    }

    function demirbasAktar()
    {
        $tur = Input::get('tur');
    }

    function firma_satir($firma)
    {

        return view('acr_views::firma_satir', compact('firma'));
    }

    function firma_ekle($id = null)
    {
        if (empty($id)) {
            $id = Input::get('id');
        }
        $firma = self::firma($id);
        return view('acr_views::firma_satir', compact('firma'));
    }

    function firma_guncelle()
    {
        $firma_id    = Input::get('firma_id');
        $firma_model = new Demirbas_firma_model();
        $data        = [
            'firma_isim'     => Input::get('firma_isim'),
            'firma_aciklama' => Input::get('firma_aciklama'),
            'firma_vergi_no' => Input::get('firma_vergi_no'),
        ];
        if ($firma_model->where('id', $firma_id)->update($data)) {
            return 1;
        } else {
            return 0;
        }

    }

    function demirbas_firma_tuttur() // seçim ekranınından sonra verileri ekrana gönderir
    {

        $firma_model    = new Demirbas_firma_model();
        $demirbas_model = new Demirbas_model();
        $firma_id       = Input::get('firma_id');
        $demirbas_id    = Input::get('demirbas_id');
        $demirbas_model->where('id', $demirbas_id)->update(['firma_id' => $firma_id]);
        $firma = $firma_model->find($firma_id);
        return '#' . $firma_id . ' ' . self::sayYaz('15', $firma->firma_isim);

    }

    function firma_sil()
    {
        $firma_id    = Input::get('firma_id');
        $firma_model = new Demirbas_firma_model();
        $firma_model->where('kurum_id', $this->kurum_id())->where('id', $firma_id)->update(['sil' => 1]);
    }

    function demirbas_sil()
    {
        $demirbas_id    = Input::get('demirbas_id');
        $demirbas_model = new Demirbas_model();
        $demirbas_model->where('kurum_id', $this->kurum_id())->where('id', $demirbas_id)->update(['sil' => 1]);
    }

    function tum_demirbas_sil()
    {
        $demirbas_model = new Demirbas_model();
        $demirbas_model->where('kurum_id', $this->kurum_id())->update(['sil' => 1]);
    }

    function grup($id)
    {
        $grup_model = new Demirbas_grup_model();
        if (empty($id)) {
            $id = $grup_model->insertGetId(['uye_id' => $this->uye_id(), 'kurum_id' => $this->kurum_id(), 'grup_isim' => '']);
        }
        $grup_satir = $grup_model->find($id);
        return $grup_satir;

    }

    function tum_gruplar()
    {

        $demirbas_model = new Demirbas_model();
        $gruplar        = $demirbas_model->gruplar();
        $demirbas_id    = Input::get('demirbas_id');
        $demirbas       = new Demirbas();
        return view('acr_views::tum_gruplar', compact('demirbas', 'gruplar', 'demirbas_id'));

    }

    function grup_satir($grup)
    {

        return view('acr_views::grup_satir', compact('grup'));
    }

    function grup_ekle($id = null)
    {
        if (empty($id)) {
            $id = Input::get('id');
        }
        $grup = self::grup($id);
        return view('acr_views::grup_satir', compact('grup'));
    }

    function grup_guncelle()
    {
        $grup_id    = Input::get('grup_id');
        $grup_model = new Demirbas_grup_model();
        $data       = [
            'grup_isim'     => Input::get('grup_isim'),
            'grup_aciklama' => Input::get('grup_aciklama'),
        ];
        if ($grup_model->where('id', $grup_id)->update($data)) {
            return 1;
        } else {
            return 0;
        }

    }

    function demirbas_grup_tuttur() // seçim ekranınından sonra verileri ekrana gönderir
    {

        $grup_model     = new Demirbas_grup_model();
        $demirbas_model = new Demirbas_model();
        $grup_id        = Input::get('grup_id');
        $demirbas_id    = Input::get('demirbas_id');
        $demirbas_model->where('id', $demirbas_id)->update(['grup_id' => $grup_id]);
        $grup = $grup_model->find($grup_id);
        return '#' . $grup_id . ' ' . self::sayYaz('15', $grup->grup_isim);

    }

    function grup_sil()
    {
        $grup_id    = Input::get('grup_id');
        $grup_model = new Demirbas_grup_model();
        $grup_model->where('kurum_id', $this->kurum_id())->where('id', $grup_id)->update(['sil' => 1]);
    }

    function demirbas_gruplar()
    {

        $demirbas_model = new Demirbas_model();
        $demirbas       = new Demirbas();
        $gruplar        = $demirbas_model->gruplar();
        return view('acr_views::demirbas_gruplar', compact('demirbas', 'gruplar'));

    }

    function hesap($id)
    {
        $hesap_model = new Demirbas_hesap_model();
        $hesap_satir = $hesap_model->find($id);
        return $hesap_satir;

    }

    function tum_hesaplar()
    {

        $demirbas_model = new Demirbas_model();
        $hesaplar       = $demirbas_model->hesaplar();
        $demirbas_id    = Input::get('demirbas_id');
        $demirbas       = new Demirbas();
        return view('acr_views::tum_hesaplar', compact('demirbas', 'hesaplar', 'demirbas_id'));

    }

    function hesap_satir($hesap)
    {

        return view('acr_views::hesap_satir', compact('hesap'));
    }

    function hesap_ekle($id = null)
    {
        if (empty($id)) {
            $id = Input::get('id');
        }
        $hesap = self::hesap($id);
        return view('acr_views::hesap_satir', compact('hesap'));
    }

    function hesap_guncelle()
    {
        $hesap_id    = Input::get('hesap_id');
        $hesap_model = new Demirbas_hesap_model();
        $data        = [
            'hesap_isim'     => Input::get('hesap_isim'),
            'hesap_aciklama' => Input::get('hesap_aciklama'),
        ];
        if ($hesap_model->where('id', $hesap_id)->update($data)) {
            return 1;
        } else {
            return 0;
        }

    }

    function demirbas_hesap_tuttur() // seçim ekranınından sonra verileri ekrana gönderir
    {

        $hesap_model    = new Demirbas_hesap_model();
        $demirbas_model = new Demirbas_model();
        $hesap_id       = Input::get('hesap_id');
        $demirbas_id    = Input::get('demirbas_id');
        $demirbas_model->where('id', $demirbas_id)->update(['hesap_id' => $hesap_id]);
        $hesap = $hesap_model->find($hesap_id);
        return $hesap->kod_1 . ' ' . $hesap->kod_2 . ' ' . $hesap->kod_3 . ' ' . $hesap->kod_4 . ' ' . $hesap->kod_5 . ' ' . $hesap->kod_6 . ' ' . self::sayYaz('15', $hesap->d_hesap_isim);
    }

    function hesap_sil()
    {
        $hesap_id    = Input::get('hesap_id');
        $hesap_model = new Demirbas_hesap_model();
        $hesap_model->where('kurum_id', $this->kurum_id())->where('id', $hesap_id)->update(['sil' => 1]);
    }

    function demirbas_hesaplar()
    {

        $demirbas_model = new Demirbas_model();
        $demirbas       = new Demirbas();
        $hesaplar       = $demirbas_model->hesaplar();
        return view('acr_views::demirbas_hesaplar', compact('demirbas', 'hesaplar'));

    }

    function demirbas_excel_yukle()
    {
        $demirbas_controller = new DemirbasController();
        $demirbas_controller->demirbas_excel_yukle(Input::file('file'));
        return redirect()->back()->with('msg', $this->basarili);
    }

    function demirbas_hesap_excel_yukle()
    {
        $demirbas_controller = new DemirbasController();
        $demirbas_controller->demirbas_hesap_kodlari_yukle(Input::file('file'));
        return redirect()->back()->with('msg', $this->basarili);
    }

}
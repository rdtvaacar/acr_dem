<?php
namespace Acr\Demirbas\Controller;

use Acr\Demirbas\Model\Demirbas_birim_model;
use Acr\Demirbas\Model\Demirbas_grup_model;

use DB;
use Form;
use Symfony\Component\CssSelector\Parser\Reader;
use Illuminate\Support\Facades\Input;
use View;
use Excel;
use Acr\Demirbas\Model\Demirbas_model;
use Acr\Demirbas\Demirbas;
use File;
use Acr\Demirbas\Model\Demirbas_hesap_model;

class DemirbasController extends BaseController
{
    function excelAktar()
    {
        $demirbas_modal = new Demirbas_model();
        $demirbas       = new Demirbas();
        $demirbas_data  = $demirbas_modal->tum_demirbaslar();
        return Excel::create('Demirbaş Listesi', function ($excel) use ($demirbas_data, $demirbas) {

            $excel->sheet('sayfa', function ($sheet) use ($demirbas_data, $demirbas) {
                $sheet->loadView('acr_views::Excel.demirbaslar', compact('demirbas_data', 'demirbas'));
            });
        })->export('xls');
    }

    public function demirbas_excel_yukle($file)
    {
        // Import a user provided file
        $demirbas_model      = new Demirbas_model();
        $demirbas_grup_model = new Demirbas_grup_model();
        $demirbas            = new Demirbas  ();
        $fileType            = $file->getClientOriginalExtension();
        $isim                = uniqid() . '.' . $fileType;
        $file->move(public_path(), $isim);
        // Return it's location
        $satirlar = Excel::load(public_path($isim), function ($reader) {
        })->get();
        // dd($satirlar);
        foreach ($satirlar as $satir) {
            if (empty($satir->grup)) {
                $satir->grup = uniqid();
            }
            $satir->kodu = str_replace(['.', '-', '  ', '*', '_'], [' ', ' ', ' ', ' ', ' '], $satir->kodu);
            $expKod      = explode(' ', $satir->kodu);
            $kod2        = isset($expKod[1]) ? $expKod[1] : 0;
            $kod3        = isset($expKod[2]) ? $expKod[2] : 0;
            $kod4        = isset($expKod[3]) ? $expKod[3] : 0;
            $kod5        = isset($expKod[4]) ? $expKod[4] : 0;
            $kod6        = isset($expKod[5]) ? $expKod[5] : 0;
            //  dd($expKod[0] . $kod2 . $kod3 . $kod4 . $kod5 . $kod6);
            $hesap_id = $demirbas_model->hesap_kod_ara($expKod[0], $kod2, $kod3, $kod4, $kod5, $kod6);
            $hesap_id = empty($hesap_id) ? '0' : $hesap_id->id;
            $grup     = $demirbas_grup_model->where('grup_isim', $satir->grup)->first();
            $data[]   = [
                'uye_id'                  => $this->uye_id(),
                'kurum_id'                => $this->kurum_id(),
                'grup_id'                 => @$grup->id,
                'amortisman_id'           => $satir->a_id,
                'demirbas_isim'           => $satir->isim,
                'demirbas_aciklama'       => $satir->aciklama,
                'demirbas_miktar'         => $satir->miktar,
                'demirbas_deger'          => str_replace(['.', ',', ' ₺'], ['', '.', ''], $satir->birim_fiyat),
                'demirbas_marka'          => $satir->marka,
                'demirbas_no'             => $satir->no,
                'hesap_id'                => $hesap_id,
                'demirbas_plaka'          => $satir->plaka,
                'demirbas_sasi_no'        => $satir->sasi_no,
                'demirbas_motor_no'       => $satir->motor_no,
                'demirbas_yazar'          => $satir->yazar,
                'demirbas_basim_yer'      => $satir->basim_yeri,
                'demirbas_basim_yil'      => $satir->basim_yili,
                'demirbas_sayfa'          => $satir->sayfa,
                'demirbas_kitabin_turu'   => $satir->kitap_turu,
                'demirbas_model'          => $satir->model,
                'demirbas_bulunan_yer'    => $satir->demirbas_bulunan_yer,
                'demirbas_bakim_periyodu' => $satir->bakim_ay,
                'demirbas_alis_tarihi'    => date('Y-m-d', $demirbas->zamanHesapla($satir->alis_tarihi)),
            ];
        }
        $demirbas_model->insert($data);
        unlink(public_path() . '/' . $isim);
    }

    public function demirbas_hesap_kodlari_yukle($file)
    {
        // Import a user provided file
        $demirbas_hesap_model = new Demirbas_hesap_model();
        $demirbas             = new Demirbas  ();
        $fileType             = $file->getClientOriginalExtension();
        $isim                 = uniqid() . '.' . $fileType;
        $file->move(public_path(), $isim);
        // Return it's location
        $satirlar = Excel::load(public_path($isim), function ($reader) {
        })->get();
        // dd($satirlar);
        foreach ($satirlar as $satir) {
            if (!empty($satir->kod_1)) {
                $data[] = [
                    'kod_1'        => $satir->kod_1,
                    'kod_2'        => $satir->kod_2,
                    'kod_3'        => $satir->kod_3,
                    'kod_4'        => $satir->kod_4,
                    'kod_5'        => $satir->kod_5,
                    'kod_6'        => $satir->kod_6,
                    'd_hesap_isim' => $satir->isim,
                ];
            }

        }
        $demirbas_hesap_model->insert($data);
        unlink(public_path() . '/' . $isim);
    }

    function tifOlustur()
    {
        $demirbas_modal = new Demirbas_model();
        $demirbas       = new Demirbas();
        $ayar           = $demirbas_modal->demirbas_ayar();
        $demirbas_data  = $demirbas_modal->demirbasDizi(Input::get('demirbas_id'));
        return Excel::create('Demirbaş Listesi', function ($excel) use ($demirbas_data, $demirbas, $ayar) {

            $excel->sheet('sayfa', function ($sheet) use ($demirbas_data, $demirbas, $ayar) {
                $demirbasSatir = 19 + $demirbas_data->count();
                $sheet->setFontFamily('Arial');
                $sheet->setBorder('A3:L10', 'medium');
                $sheet->setBorder('A13:L16', 'medium');
                $sheet->setBorder('A19:L' . $demirbasSatir, 'medium');
                $sheet->loadView('acr_views::Excel.tifOlustur', compact('demirbas_data', 'demirbas', 'ayar'));
            });
        })->export('xls');
    }
}
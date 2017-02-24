<?php
namespace Acr\Demirbas\Controller;

use Acr\Demirbas\Model\Demirbas_birim_model;
use Acr\Demirbas\Model\Demirbas_grup_model;
use DB;
use Form;
use Illuminate\Support\Facades\Input;
use View;
use Excel;
use Acr\Demirbas\Model\Demirbas_model;
use Acr\Demirbas\Demirbas;
use File;

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

        foreach ($satirlar as $satir) {
            if (empty($satir->grup)) {
                $satir->grup = uniqid();
            }
            $grup   = $demirbas_grup_model->where('grup_isim', $satir->grup)->first();
            $data[] = [
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
                'demirbas_kodu'           => $satir->kodu,
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
    }

}
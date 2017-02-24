<?php
namespace Acr\Demirbas\Controller;

use App\Handlers\Commands\my;
use DB;
use Form;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use View;
use Illuminate\Support\Facades\Config;
use Acr\Demirbas\Model\Amortisman_model;


class AmortismanContorller extends BaseController
{
    function excelAktar()
    {

        //  $amr = new Amortisman();
        Excel::load('amortisman.xlsx', function ($reader) {


            $reader->each(function ($sheet) {

                // Loop through all rows
                $sheet->each(function ($row) {
                    $amr     = new Amortisman_model();
                    $isimExp = explode(":", $row->amortismana_tabi_iktisadi_kiymetler);
                    if (empty($row->normal_amortisman_orani)) {
                        if (count($isimExp) > 1) {
                            $aciklama = $isimExp[1];
                        } else {
                            $aciklama = '';
                        }
                        $data               = [
                            'amortisman'          => $isimExp[0],
                            'amortisman_aciklama' => $aciklama,
                            'omur'                => $row->faydali_omur_yil,
                            'oran'                => str_replace(',', '.', $row->normal_amortisman_orani)
                        ];
                        $id                 = $amr->insertGetId($data);
                        $amr->amortisman_id = $id;
                        $amr->where('id', $id)->update(['amortisman_id' => $id]);
                    } else {

                        if (count($isimExp) > 1) {
                            $aciklama = $isimExp[1];
                        } else {
                            $aciklama = '';
                        }
                        $amr_id = $amr->orderBy('amortisman_id', 'desc')->first()->amortisman_id;
                        $data   = [
                            'amortisman_id'       => $amr_id,
                            'amortisman'          => $isimExp[0],
                            'amortisman_aciklama' => $aciklama,
                            'omur'                => $row->faydali_omur_yil,
                            'oran'                => str_replace(',', '.', $row->normal_amortisman_orani)
                        ];
                        $amr->insert($data);
                    }
                });

            });

        });

    }

}
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
    function amortismanYukle()
    {
        //  $amr = new Amortisman();
        Excel::load(public_path() . '/Amortismanlar.xlsx', function ($reader) {
            $reader->each(function ($sheet) {
                // Loop through all rows
                $satir = 1;
                $sheet->each(function ($row) use ($satir) {
                    $row->a_kod_1 = $row->a_kod_1 == null ? 0 : $row->a_kod_1;
                    $row->a_kod_2 = $row->a_kod_2 == null ? 0 : $row->a_kod_2;
                    $row->a_kod_3 = $row->a_kod_3 == null ? 0 : $row->a_kod_3;
                    $row->a_kod_4 = $row->a_kod_4 == null ? 0 : $row->a_kod_4;
                    $amr          = new Amortisman_model();
                    $isimExp      = explode(":", $row->amortisman);
                    if (empty($row->oran)) {
                        if (count($isimExp) > 1) {
                            $aciklama = $isimExp[1];
                        } else {
                            $aciklama = '';
                        }
                        $data               = [
                            'a_kod_1'             => $row->a_kod_1,
                            'a_kod_2'             => $row->a_kod_2,
                            'a_kod_3'             => $row->a_kod_3,
                            'a_kod_4'             => $row->a_kod_4,
                            'amortisman'          => $isimExp[0],
                            'amortisman_aciklama' => $aciklama,
                            'omur'                => $row->omur,
                            'oran'                => str_replace([',', '%'], ['', ''], $row->oran),
                            'teblig'              => $row->teblig,
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
                            'a_kod_1'             => $row->a_kod_1,
                            'a_kod_2'             => $row->a_kod_2,
                            'a_kod_3'             => $row->a_kod_3,
                            'a_kod_4'             => $row->a_kod_4,
                            'amortisman'          => $isimExp[0],
                            'amortisman_aciklama' => $aciklama,
                            'omur'                => $row->omur,
                            'oran'                => str_replace([',', '%'], ['', ''], $row->oran),
                            'teblig'              => $row->teblig,
                        ];
                        $amr->insert($data);
                    }
                    $satir++;
                });

            });

        });
    }
}
<?php

namespace Acr\Demirbas\Model;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Demirbas_model extends Model

{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'demirbas';
    public    $uye_id;
    public    $kurum_id;

    function uye_id()
    {
        if (Auth::check()) {
            return $this->uye_id = Auth::user()->id;

        } else {
            return $this->uye_id = 0;
        }

    }

    function kurum_id()
    {
        if (Auth::check()) {
            return $this->kurum_id = Auth::user()->kurum_id;
        } else {
            return $this->kurum_id = 0;
        }
    }

    function tum_demirbaslar()
    {
        $demirbaslar = Demirbas_model::leftJoin('demirbas_amortisman', 'demirbas_amortisman.id', '=', 'demirbas.amortisman_id')
            ->leftJoin('demirbas_firma', 'demirbas_firma.id', '=', 'demirbas.firma_id')
            ->leftJoin('demirbas_grup', 'demirbas_grup.id', '=', 'demirbas.grup_id')
            ->leftJoin('demirbas_birim', 'demirbas_birim.id', '=', 'demirbas.birim_id')
            ->select("demirbas.*", "demirbas_amortisman.*", "demirbas_firma.*", "demirbas_grup.*", "demirbas_birim.*", "demirbas.id as demirbas_id", "demirbas_amortisman.id as amortisman_id", "demirbas_firma.id as firma_id", "demirbas_grup.id as grup_id", "demirbas_birim.id as birim_id")
            ->where('demirbas.kurum_id', $this->kurum_id())
            ->where('demirbas.sil', 0)
            ->orderBy('demirbas.grup_id')
            ->get();
        return $demirbaslar;
    }

    function demirbas($id)
    {
        $demirbas = Demirbas_model::leftJoin('demirbas_amortisman', 'demirbas_amortisman.id', '=', 'demirbas.amortisman_id')
            ->leftJoin('demirbas_firma', 'demirbas_firma.id', '=', 'demirbas.firma_id')
            ->leftJoin('demirbas_grup', 'demirbas_grup.id', '=', 'demirbas.grup_id')
            ->leftJoin('demirbas_birim', 'demirbas_birim.id', '=', 'demirbas.birim_id')
            ->select("demirbas.*", "demirbas_amortisman.*", "demirbas_firma.*", "demirbas_grup.*", "demirbas_birim.*", "demirbas.id as demirbas_id", "demirbas_amortisman.id as amortisman_id", "demirbas_firma.id as firma_id", "demirbas_grup.id as grup_id", "demirbas_birim.id as birim_id")
            ->where('demirbas.kurum_id', $this->kurum_id())
            ->where('demirbas.id', $id)
            ->first();
        return $demirbas;

    }

    function amortisman($id)
    {
        return Amortisman_model::where('id', $id)->first();
    }

    function firmalar()
    {
        return Demirbas_firma_model::where('kurum_id', $this->kurum_id())->where('sil', 0)->get();
    }

    function birimler()
    {
        return Demirbas_birim_model::where('sil', 0)->get();
    }

    function gruplar()
    {
        return Demirbas_grup_model::where('kurum_id', $this->kurum_id())->where('sil', 0)->get();
    }

    function demirbas_guncelle($demirbas_id, $data)
    {
        Demirbas_model::where('id', $demirbas_id)->where('kurum_id', $this->kurum_id())->update($data);
    }

    function amortismanlar()
    {
        return Amortisman_model::join('demirbas_amortisman as a2', 'demirbas_amortisman.id', '=', 'a2.amortisman_id')
            ->select('demirbas_amortisman.*', 'a2.*', 'demirbas_amortisman.amortisman as grup_isim')
            ->get();
    }

    function personellerUye()
    {
        return Personel_model::where('uye_id', $this->uye_id())->get();
    }
}

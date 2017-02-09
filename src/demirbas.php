<?php
namespace Acr\Demirbas;


use DB;
use App\Handlers\Commands\my;
use Form;
use Illuminate\Support\Facades\Input;
use View;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Acr\Demirbas\Controller\AmortismanContorller;


class Demirbas extends Controller
{

    protected $basarili           = '<div class="alert alert-success">Başarıyla Eklendi</div>';
    protected $basariliGuncelleme = '<div class="alert alert-success">Başarıyla Güncellendi</div>';
    protected $kullaniciAdi       = '';
    protected $kullaniciSifre     = '';
    protected $config;

    function __construct()
    {
        $this->config = Config::get("demirbas_config");
    }

    function index()
    {
        $amortisman = new AmortismanContorller();
        $my         = new my();
        $demirbas   = new Demirbas();
        return View::make('acr_demirbas.index', compact('demirbas', 'my', 'amortisman'));
    }
}
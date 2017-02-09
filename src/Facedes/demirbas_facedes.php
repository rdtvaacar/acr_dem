<?php
namespace Acr\demirbas\Facedes;

use Illuminate\Support\Facades\Facade;

class demirbas_facedes extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'acr-demirbas';
    }
}
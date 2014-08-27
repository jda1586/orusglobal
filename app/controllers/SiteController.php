<?php

class SiteController extends \BaseController
{
    /*protected $layout = 'site.layout';*/

    public function __construct()
    {
        //
    }

    public function index($lang)
    {
        $diff = strtotime("2014-08-27 14:49:00") - strtotime(date("Y-m-d H:i:s"));
        $dias = $diff/(60*60*24);
        $horas = ($dias-intval($dias))*24;
        $min = ($horas-intval($horas))*60;
        $seg = ($min-intval($min))*60;
        return View::make('site.index', [
            'lang' => $lang,
            'deadline' => $diff
        ]);
    }

}
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
        $diff = strtotime("2014-08-27 15:00:00") - strtotime(date("Y-m-d H:i:s"));
        return View::make('site.index', [
            'lang' => $lang,
            'deadline' => ($diff > 0)?$diff:1
        ]);
    }

}
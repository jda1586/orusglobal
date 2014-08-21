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
        return View::make('site.index', ['lang' => $lang]);
    }

}
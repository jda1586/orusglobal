<?php

class SiteController extends \BaseController
{
    /*protected $layout = 'site.layout';*/

    public function __construct()
    {
        //
    }

    public function index()
    {
        return View::make('site.index', ['lang' => Request::get('lang')]);
    }

}
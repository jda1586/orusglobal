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
        return View::make('site.index');
    }

    public function register()
    {
        return View::make('site.register');
    }

}
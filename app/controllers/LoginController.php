<?php

class LoginController extends \BaseController
{

    /**
     * Display a listing of the resource.
     * GET /login
     *
     * @return Response
     */
    public function index()
    {
        return View::make('login.index');
    }

    public function login()
    {

    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('root');
    }
}
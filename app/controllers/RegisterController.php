<?php

class RegisterController extends \BaseController
{

    /**
     * Display a listing of the resource.
     * GET /register
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * GET /register/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /register
     *
     * @param $lang
     * @return Response
     */
    public function store($lang)
    {
        $file = Input::file('idfile');
        $file2 = Input::file('prooffile');
            $file3 = Input::file('corpfile');

        $validator = Validator::make(Input::all(), array(
            'user' => 'Required|AlphaNum',
            'name' => 'Required',
            'lastname' => 'Required',
            'address' => 'Required',
            'zipcode' => 'Required|Numeric|Min:4',
            'phone' => 'Required',
            'email' => 'Required|Email|Min:8',
            'birthday' => 'Required',
            'gender' => 'Required|Alpha',
            'idfile' => 'Required',
            'prooffile' => 'Required',
        ));
        //TODO: Save form data here
        if($validator->passes()){
            $user = User::create(array(
                'user'=>Input::get('user'),
                'password'=>Hash::make(Input::get('user')),
                'rol_id'=>0,
                'terms'=>1,
                'status'=>1,
                'remember_token' => 0
            ));
            $user->details()->save(new UserDetail(array(
                'name'=>Input::get('name'),
                'lastname'=>Input::get('lastname'),
                'address'=>Input::get('address'),
                'zipcode'=>Input::get('zipcode'),
                'country_id'=>0, 'state_id'=>0, 'city_id'=>0,
                'phone'=>Input::get('phone'),
                'email'=>Input::get('email'),
                'birthday'=>Input::get('birthday'),
                'gender'=>Input::get('gender')
            )));

            $file_suc = $file->move(
                base_path().'/public/files',
                'id_file_'.Input::get('user')
            );
            $user->documents()->save(new UserDocument(array(
                'document_id'=>1,
                'path'=>base_path().'/public/files/id_file_'.Input::get('user'),
                'status'=>1
            )));

            $file_suc = $file2->move(
                base_path().'/public/files',
                'proof_file_'.Input::get('user')
            );
            $user->documents()->save(new UserDocument(array(
                'document_id'=>2,
                'path'=>base_path().'/public/filesproof_file_'.Input::get('user'),
                'status'=>1
            )));
            if($file3->isValid()){
                $file_suc = $file3->move(
                    base_path().'/files',
                    'corp_file_'.Input::get('user')
                );
                $user->documents()->save(new UserDocument(array(
                    'document_id'=>3,
                    'path'=>base_path().'/publicfiles/corp_file_'.Input::get('user'),
                    'status'=>1
                )));
            }

            Mail::send('email.register', array('name'=>Input::get('name')), function($message)
            {
                $message->to(Input::get('email'),Input::get('name'))->subject('Welcome!');
            });

            return Redirect::to('https://vizinova.com/soft/');

        }else{
            return Redirect::to('/'.$lang.'#steps')->withErrors($validator);
        }

    }

    /**
     * Display the specified resource.
     * GET /register/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /register/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /register/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /register/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
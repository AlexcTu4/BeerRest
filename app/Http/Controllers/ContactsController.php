<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\Http\Requests\ContactsRequest;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        return [
            'info' => [
                [
                    'key' => 'id',
                    'label'=> 'ID',
                    'editable'=> false
                ],
                [
                    'key' => 'first_name',
                    'label'=> 'Имя',
                    'editable'=> true
                ],
                [
                    'key' => 'last_name',
                    'label'=> 'Фамилия',
                    'editable'=> true
                ],
                [
                    'key' => 'patronymic',
                    'label'=> 'Отчество',
                    'editable'=> true
                ],
                [
                    'key' => 'phone',
                    'label'=> 'Телефон',
                    'editable'=> true
                ],
                [
                    'key' => 'company',
                    'label'=> 'Компания',
                    'editable'=> true
                ],
                [
                    'key' => 'post',
                    'label'=> 'Должность',
                    'editable'=> true
                ],
            ],
            'data' => Contacts::all()
        ];

    }




    public function store(ContactsRequest $request)
    {
        $day = Contacts::create($request->validated());
        return $day;
    }

    public function show(Contacts $crm)
    {
        return $game = Contacts::findOrFail($crm);
    }



    public function update(ContactsRequest $request, $id)
    {
        $game = Contacts::findOrFail($id);
        $game->fill($request->except(['id']));
        $game->save();
        return response()->json($game);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactsRequest $request, $id )
    {
        $game = Contacts::findOrFail($id);
        if($game->delete()) return response(null, 204);
    }
}

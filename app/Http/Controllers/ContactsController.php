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
                    'key' => 'first_name',
                    'label'=> 'Имя'
                ],
                [
                    'key' => 'last_name',
                    'label'=> 'Фамилия'
                ],
                [
                    'key' => 'patronymic',
                    'label'=> 'Отчество'
                ],
                [
                    'key' => 'phone',
                    'label'=> 'Телефон'
                ],
                [
                    'key' => 'company',
                    'label'=> 'Компания'
                ],
                [
                    'key' => 'post',
                    'label'=> 'Должность'
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

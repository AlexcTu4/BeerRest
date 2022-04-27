<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\Http\Requests\ContactsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index(ContactsRequest $request)
    {
        return  DB::table('contacts')->paginate($request['per_page']??10);

    }




    public function store(ContactsRequest $request)
    {
        $day = Contacts::create($request->validated());
        return $day;
    }

    public function show(Contacts $crm, string $string)
    {
        return $game = Contacts::search($string)->paginate(10);
    }




    public function update(ContactsRequest $request, $id)
    {
        $game = Contacts::findOrFail($id);
        $game->fill($request->except(['id']));
        $game->save();
        return response()->json($game);
    }

    public function search(ContactsRequest $request, $id)
    {
        $game = Contacts::search('test');
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
        if($game->delete()){
            return response(['result'=>true]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Crm;
use App\Http\Requests\CrmRequest;
use App\Test;

class CrmController extends Controller
{

    public function index()
    {
        return Crm::all();
    }




    public function store(CrmRequest $request)
    {
        $day = Crm::create($request->validated());
        return $day;
    }

    public function show(Crm $crm)
    {
        return $game = Crm::findOrFail($crm);
    }



    public function update(CrmRequest $request, $id)
    {
        $game = Crm::findOrFail($id);
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
    public function destroy(CrmRequest $request, $id )
    {
        $game = Crm::findOrFail($id);
        if($game->delete()) return response(null, 204);
    }
}

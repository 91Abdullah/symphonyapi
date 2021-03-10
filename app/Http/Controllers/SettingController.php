<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Setting::query()->get();
        $setting=null;
        $myObj = new \stdClass();
        foreach ($data as $value)
        {
            $id= $value->id;
            $column[]=array('title'=> $value->key, 'dataIndex'=> $value->key, 'key'=> $value->key);
            $key= $value->key;
            $myObj->$key= $value->value;
        }
        $setting= array($myObj);
        $column[] = array('title'=> 'action', 'dataIndex'=> 'action', 'key'=>'action');

        return response()->json(['column'=> array_merge($column), 'settings'=> $setting, 'id'=> $id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
//        Add validation according to req
//        $request->validate([
//            'server_address' => ['required', 'ipv4'],
//            'wss_port' => ['required', 'numeric'],
//            'manager_port' => ['required'],
//            'username' => ['required'],
//            'secret' => ['required'],
//            'connection_timeout' => ['required', 'numeric'],
//            'read_timeout' => ['required', 'numeric'],
//        ]);
        try {
            $setting->update($request->all());
//            activity('Role Updated')->causedBy(Auth::user())->performedOn($setting)->withProperties($setting)->log('updated');
            return response()->json("Settings has been updated.");
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}

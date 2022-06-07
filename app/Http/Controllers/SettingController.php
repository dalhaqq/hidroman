<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function show(Request $request)
    {
        $settings = $request->session()->get("appSettings");
        return view('settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $input = $request->input();

        // Remove unecessary form fields from input (like _token and _method)
        foreach ($input as $key => $value) {
            if (preg_match("/^_/", $key)) {
                unset($input[$key]); 
            }
        }

        Storage::disk('config')->put('settings.json', json_encode($input, JSON_PRETTY_PRINT));
        
        $request->session()->forget("appSettings");
        
        $request->session()->flash('flash_msg', 'Settings have been saved.');
        
        return redirect()->route('settings.show');

    }
}

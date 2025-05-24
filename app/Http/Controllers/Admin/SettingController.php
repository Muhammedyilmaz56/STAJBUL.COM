<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::firstOrCreate(
            ['key' => 'session_timeout'],
            ['value' => '30'] // varsayılan değer
        );

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'value' => 'required|integer|min:1|max:1440', // dakika cinsinden (maks. 24 saat)
        ]);

        Setting::updateOrCreate(
            ['key' => 'session_timeout'],
            ['value' => $request->value]
        );

        return redirect()->route('admin.settings.edit')->with('success', 'Oturum süresi başarıyla güncellendi.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function edit()
    {
        $id = Auth::guard('web')->user()->id;

        $data = User::whereId($id)->first();
        // dd($user);
        return view('pages.user.form', [
            'page_title' => 'Profile Admin',
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {   
        // dd($request->all());
        DB::beginTransaction();

        try{
            $formData = ([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
            ]);

            if($request->password != null || $request->password != ''){
                $formData['password'] = bcrypt($request->password);
            }

            User::find($id)->update($formData);

            return redirect()->route('profile.edit')
                ->with('success', 'Profile berhasil dirubah!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Error on line {$e->getLine()}: {$e->getMessage()}");
        } catch (\Throwable $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Error on line {$e->getLine()}: {$e->getMessage()}");
        }
    }
}

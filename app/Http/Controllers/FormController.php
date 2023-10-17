<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Form;
use App\Models\DecryptForm;

class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function submitForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'email' => 'required|email',
            'NIK' => 'required|string|max:17',
            'phonenumber' => 'required|string|max:12',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'file' => 'required|mimes:pdf,doc,docx',
            'video' => 'required|mimetypes:video/mp4,video/avi',
        ]);

        if ($validator->fails()) {
            return redirect('/form')
                ->withErrors($validator)
                ->withInput();
        }

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        $file = $request->file('file');
        $fileName = time() . '.' . $file->extension();
        $file->move(public_path('files'), $fileName);

        $video = $request->file('video');
        $videoName = time() . '.' . $video->extension();
        $video->move(public_path('videos'), $videoName);

        $form = new Form([
            'encryptusername' => encrypt($request->input('username')),
            'encryptpassword' => encrypt($request->input('password')),
            'encryptemail' => encrypt($request->input('email')),
            'encryptNIK' => encrypt($request->input('NIK')),
            'encryptphonenumber' => encrypt($request->input('phonenumber')),
            'encryptimage' => encrypt($imageName),
            'encryptfile' => encrypt($fileName),
            'encryptvideo' => encrypt($videoName),
        ]);

        $form->save();

        // Decrypt the data if needed
        $decryptedForm = new DecryptForm([
            'decryptusername' => decrypt($form->encryptusername),
            'password' => decrypt($form->encryptpassword),
            'email' => decrypt($form->encryptemail),
            'NIK' => decrypt($form->encryptNIK),
            'phonenumber' => decrypt($form->encryptphonenumber),
            'image' => decrypt($form->encryptimage),
            'file' => decrypt($form->encryptfile),
            'video' => decrypt($form->encryptvideo),
        ]);

        $decryptedForm->save();

        return redirect('/success');
    }
}

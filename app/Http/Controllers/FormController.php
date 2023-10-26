<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Form;

class FormController extends Controller
{

    public function showForm()
    {
        return view('form');
    }

    public function submitForm(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'quantity' => 'required|numeric|between:0,100',
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $formItem = new Form;

        $formItem->name = $request->input('name');
        $formItem->quantity = $request->input('quantity');
        $formItem->description = $request->input('description');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images');
            $formItem->image = $imagePath;
        }

        $formItem->save();

        return redirect()->route('showForm')->with('success', 'Form submitted successfully');
    }
}


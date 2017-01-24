<?php

namespace App\Http\Controllers;

use App\User;
use App\Field;
use App\Post;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FieldsController extends Controller
{
    public function getFieldPage($fieldname){
        $field = Field::where('name', $fieldname)->first();
        return view('field', ['field' => $field]);
    }

    public function getCatalog(){
        $fields = Field::all();
        $user = Auth::user();
        return view('catalog', ['fields' => $fields, 'user' => $user]);
    }

    public function postAddField(Request $request){
        $field = new Field();
        $field->name = $request['fieldname'];
        $field -> save();

        $message = 'Field added.';

        return redirect() -> route('adminpnl') -> with(['message' => $message]);
    }
}
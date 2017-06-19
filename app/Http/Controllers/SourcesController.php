<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use App\Field;
use App\Section;

class SourcesController extends Controller {

    public function getFieldSources($fieldname){
        $field = Field::where('name', $fieldname)->first();
        return view('sources', ['field' => $field]);
    }

    public function getFieldSection($fieldname, $id){
        $field = Field::where('name', $fieldname)->first();
        $section = Section::where('id', $id)->first();
        return view('sources', ['field' => $field, 'section' => $section]);
    }

}
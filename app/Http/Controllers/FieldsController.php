<?php

namespace App\Http\Controllers;

use Forum;
use App\User;
use App\Field;
use App\Post;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Riari\Forum\Models\Category;
use Riari\Forum\Http\Controllers\API\CategoryController;

class FieldsController extends CategoryController
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
		if(Auth::user() == null || Auth::user()->user_level != 'admin'){
            return redirect()->back();
        }
		
		$this->validate($request, [
            'fieldname' => 'required|unique:fields,name',
            'description' => 'required'
        ]);

        $field = new Field();
        $field->name = $request['fieldname'];
		$field->desc = $request['description'];
        $field -> save();

        $message = 'Field added.';

        return redirect() -> route('catalog') -> with(['message' => $message]);
    }

    public function getSub(Request $request){
        $fieldname = $request['fieldname'];
        $field = Auth::user() -> fields()->where('name', $fieldname)->first();
        if ($field == null){
            $field = Field::where('name', $fieldname)->first();
            Auth::user()->fields()->attach($field);
        }
        else{
            Auth::user()->fields()->detach($field);
        }
        $field = Field::where('name', $fieldname)->first();
        return view('field', ['field' => $field]);
    }

    public function getForum(Request $request){
        $fieldname = $request['name'];
        $id = null;

        switch ($fieldname){
            case "Yarrak":
                $id = 1;
                break;
            case "Kesf":
                $id = 2;
                break;
        }

        if(is_null($id)){
            return redirect()->back();
        }

        $category = $this->fetch($id, $request);

        return redirect(Forum::route('category.show', $category));
    }

    public function fetch($id, Request $request)
    {
        $category = $this->model()->find($id);

        if (is_null($category) || !$category->exists) {
            return $this->notFoundResponse();
        }

        if ($category->private) {
            $this->authorize('view', $category);
        }

        return $category;
    }
	
	public function getFieldImage($fieldname){
		$field = Field::where('name', $fieldname)->first();
		$filePath = '/field-images/default.png';
				
		if ($field) {
			$jpgFilePath = '/field-images/' . $field->name . '-' . $field->id . '.jpg';
			$pngFilePath = '/field-images/' . $field->name . '-' . $field->id . '.png';
		
			if (Storage::disk('local')->has($jpgFilePath)) {
				$filePath = $jpgFilePath;
			}
			else if (Storage::disk('local')->has($pngFilePath)) {
				$filePath = $pngFilePath;
			}
		}
		
		return Storage::disk('local')->get($filePath);
    }
}
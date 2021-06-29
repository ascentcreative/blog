<?php

namespace AscentCreative\Blog\Controllers\Admin;

use AscentCreative\CMS\Controllers\AdminBaseController;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

class AuthorController extends AdminBaseController
{

    static $modelClass = 'AscentCreative\Blog\Models\Author';
    static $bladePath = "blog::admin.authors";

    public $indexSort = 'name';
    public $indexSearchFields = ['name', 'bio'];

    // public function commitModel(Request $request, Model $model)
    // {

 
    //   // $model->fillExtenders($request->all());
    //     $model->fill($request->all());
    //     $model->save();

      

    // }
    


    public function rules($request, $model=null) {

       return [
            'name' => 'required',
        ]; 

    }


    public function autocomplete(Request $request) {

        // Should this be encapsulated in a 'search' method on the model?
         //  - would allow all search formats to always use the same fields. Handy for the index filters. 
         $term = $request->term;
         $cls = $this::$modelClass;
         $data = $cls::where('name', 'like', '%' . $term . '%')
                         ->get();
 
         // Can't easily concat fields etc without making a raw query
         // Not keen on that for security, so we'll loop and assign the label here.
         // Plus, we get the benefit of using the model accessor.
         foreach($data as $row) {   
             $row->makeVisible('id');
             $row['label'] = $row->name;
         }
 
         return $data;
 
     }



}
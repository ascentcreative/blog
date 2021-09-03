<?php

namespace AscentCreative\Blog\Controllers\Admin;

use AscentCreative\CMS\Controllers\AdminBaseController;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

class TypeController extends AdminBaseController
{

    //static $modelClass = 'AscentCreative\Blog\Models\Post';
    static $modelClass = 'AscentCreative\Blog\Models\Type';
    static $bladePath = "blog::admin.types";

    //public $indexSort = [ ['publish_start', 'DESC'], ['created_at', 'DESC'], 'title'];
    public $indexSearchFields = ['type'];



   
    


    public function rules($request, $model=null) {

       return [
            // 'title' => 'required',
            // 'type_id' => 'required',
        ]; 

    }


    public function autocomplete(Request $request) {

        // Should this be encapsulated in a 'search' method on the model?
         //  - would allow all search formats to always use the same fields. Handy for the index filters. 
         $term = $request->term;
         $cls = $this::$modelClass;
         $data = $cls::where('type', 'like', '%' . $term . '%')
                         ->get();
 
         // Can't easily concat fields etc without making a raw query
         // Not keen on that for security, so we'll loop and assign the label here.
         // Plus, we get the benefit of using the model accessor.
         foreach($data as $row) {   
             $row->makeVisible('id');
             $row['label'] = $row->title;
         }
 
         return $data;
 
     }



}
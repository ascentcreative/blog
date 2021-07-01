<?php

namespace AscentCreative\Blog\Controllers\Admin;

use AscentCreative\CMS\Controllers\AdminBaseController;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

class PostController extends AdminBaseController
{

    //static $modelClass = 'AscentCreative\Blog\Models\Post';
    static $modelClass = 'Post';
    static $bladePath = "blog::admin.posts";

    //public $indexSort = [ ['publish_start', 'DESC'], ['created_at', 'DESC'], 'title'];
    public $indexSearchFields = ['title', 'content'];

    public $ignoreScopes = ['published'];

    public function commitModel(Request $request, Model $model)
    {

        //dd(request()->all());



      // $model->fillExtenders($request->all());
        $model->fill($request->all());
        $model->save();

        $model->authors()->sync($request->authors);

        // tags:
        // ideally this would be handled in a trait etc, but while we work it out, we'll add it here
        $tags = array();

        // first of all, save any new tags by running findOrCreate on the array
        if(is_array($request->tags)) {
            foreach($request->tags as $incoming) {
                $tag = \AscentCreative\Blog\Models\Tag::firstOrCreate($incoming);
                $tags[] = $tag->id;
            }
        }

        // then sync the resulting array to the model
        $model->tags()->sync($tags);

    }
    


    public function rules($request, $model=null) {

       return [
            'title' => 'required',
            'type_id' => 'required',
        ]; 

    }


    public function autocomplete(Request $request) {

        // Should this be encapsulated in a 'search' method on the model?
         //  - would allow all search formats to always use the same fields. Handy for the index filters. 
         $term = $request->term;
         $cls = $this::$modelClass;
         $data = $cls::where('title', 'like', '%' . $term . '%')
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
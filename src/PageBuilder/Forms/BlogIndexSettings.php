<?php
namespace AscentCreative\Blog\PageBuilder\Forms;

use AscentCreative\Forms\Form;

use AscentCreative\Forms\Fields\Input;
use AscentCreative\Forms\Fields\Colour;
use AscentCreative\Forms\Fields\Checkbox;
// use AscentCreative\Forms\Fields\FileUpload;
use AscentCreative\Files\Fields\FileUpload;
use AscentCreative\Forms\Fields\Options;
use AscentCreative\Forms\Fields\ForeignKeySelect;
use AscentCreative\Forms\Fields\CompoundDate;
use AscentCreative\Forms\Structure\Tabs;
use AscentCreative\Forms\Structure\Tab;
use AscentCreative\Forms\Structure\HTML;
use AscentCreative\Forms\Fields\ValueWithUnits;

use AscentCreative\Blog\Models\Type;

use Illuminate\Support\Arr;

class BlogIndexSettings extends Form {

    public function __construct($name, $data) {

        $this->children([

            ForeignKeySelect::make($name . '[post_types]', "Post Types")
            ->query(Type::query())
            ->type('checkbox')
            ->labelField('type'),

            Input::make($name . '[post_count]', 'Max Posts to Display'),

            Checkbox::make($name . '[paginate]', 'Display pagination links?')
                ->uncheckedValue(0),

        ]);


        if($data) {

            $dot = collect(Arr::dot(json_decode(json_encode($data), true)))
                        ->mapWithKeys(function($item, $key) use ($name) {
                            return [dotname($name) . '.' . $key => $item];
                        })->toArray();


            $data = json_decode(json_encode(Arr::undot($dot)));

        } else {
            $data = [];
        }

        $this->populate($data, $name);
        
    }

}
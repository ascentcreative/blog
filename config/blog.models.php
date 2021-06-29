<?php

return [
    
    // take care when changing these values. 
    // Any Polymorphic relationships which reference the model class will no longer resolve. 
    // Database migration may be required 

    // maybe we should look at a morph map? But does that need to bve exhaustive?

    'post' => '\AscentCreative\Blog\Models\Post',
    
    
];

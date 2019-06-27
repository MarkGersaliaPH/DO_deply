<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SubCategory
 * @package App\Models\Admin
 * @version June 4, 2019, 9:49 am UTC
 *
 * @property string display
 */
class SubCategory extends Model
{
    use SoftDeletes;

    public $table = 'sub_categories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'display'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'display' => 'string',
        'category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

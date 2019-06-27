<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;


/**
 * @SWG\Definition(
 *      definition="Items",
 *      required={"name", "price", "stock", "brand", "description", "status"},
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="price",
 *          description="price",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="stock",
 *          description="stock",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="brand",
 *          description="brand",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="slug",
 *          description="slug",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="seller_id",
 *          description="seller_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="categories",
 *          description="categories",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="isEnabled",
 *          description="isEnabled",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Items extends Model
{
    use SoftDeletes;

     use Sluggable;

    public $table = 'items';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'price',
        'stock',
        'brand',
        'description',
        'slug',
        'seller_id',
        'categories',
        'status',
        'isEnabled'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'id' => 'integer',
        'price' => 'integer',
        'stock' => 'integer',
        'brand' => 'string',
        'slug' => 'string',
        'seller_id' => 'integer',
        'categories' => 'string',
        'status' => 'integer',
        'isEnabled' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'price' => 'required',
        'stock' => 'required',
        'brand' => 'required',
        'description' => 'required',
        'status' => 'required'
    ];



    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    
}

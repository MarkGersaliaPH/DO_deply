<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Items;
use App\Repositories\BaseRepository;

/**
 * Class ItemsRepository
 * @package App\Repositories\Admin
 * @version June 4, 2019, 9:19 am UTC
*/

class ItemsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Items::class;
    }
}

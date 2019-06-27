<?php

namespace App\Repositories\Admin;

use App\Models\Admin\SubCategory;
use App\Repositories\BaseRepository;

/**
 * Class SubCategoryRepository
 * @package App\Repositories\Admin
 * @version June 4, 2019, 9:49 am UTC
*/

class SubCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'display'
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
        return SubCategory::class;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateSubCategoryRequest;
use App\Http\Requests\Admin\UpdateSubCategoryRequest;
use App\Repositories\Admin\SubCategoryRepository;
use App\Models\Admin\Category;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request; 
use Flash;
use Response;

class SubCategoryController extends AppBaseController
{
    /** @var  SubCategoryRepository */
    private $subCategoryRepository;
    private $categoryRepository;

    public function __construct(SubCategoryRepository $subCategoryRepo)
    {
        $this->subCategoryRepository = $subCategoryRepo;
    } 
    /**
     * Display a listing of the SubCategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $subCategories = $this->subCategoryRepository->paginate(50);
        return view('admin.sub_categories.index')
            ->with('subCategories', $subCategories);
    }

    /**
     * Show the form for creating a new SubCategory.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::All(); 
        return view('admin.sub_categories.create',$categories);
    }

    /**
     * Store a newly created SubCategory in storage.
     *
     * @param CreateSubCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateSubCategoryRequest $request)
    {
        $input = $request->all();

        $subCategory = $this->subCategoryRepository->create($input);

        Flash::success('Sub Category saved successfully.');

        return redirect(route('admin.subCategories.index'));
    }

    /**
     * Display the specified SubCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subCategory = $this->subCategoryRepository->find($id);

        if (empty($subCategory)) {
            Flash::error('Sub Category not found');

            return redirect(route('admin.subCategories.index'));
        }

        return view('admin.sub_categories.show')->with('subCategory', $subCategory);
    }

    /**
     * Show the form for editing the specified SubCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subCategory = $this->subCategoryRepository->find($id);

        if (empty($subCategory)) {
            Flash::error('Sub Category not found');

            return redirect(route('admin.subCategories.index'));
        }

        return view('admin.sub_categories.edit')->with('subCategory', $subCategory);
    }

    /**
     * Update the specified SubCategory in storage.
     *
     * @param int $id
     * @param UpdateSubCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubCategoryRequest $request)
    {
        $subCategory = $this->subCategoryRepository->find($id);

        if (empty($subCategory)) {
            Flash::error('Sub Category not found');

            return redirect(route('admin.subCategories.index'));
        }

        $subCategory = $this->subCategoryRepository->update($request->all(), $id);

        Flash::success('Sub Category updated successfully.');

        return redirect(route('admin.subCategories.index'));
    }

    /**
     * Remove the specified SubCategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subCategory = $this->subCategoryRepository->find($id);

        if (empty($subCategory)) {
            Flash::error('Sub Category not found');

            return redirect(route('admin.subCategories.index'));
        }

        $this->subCategoryRepository->delete($id);

        Flash::success('Sub Category deleted successfully.');

        return redirect(route('admin.subCategories.index'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateItemsRequest;
use App\Http\Requests\Admin\UpdateItemsRequest;
use App\Repositories\Admin\ItemsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ItemsController extends AppBaseController
{
    /** @var  ItemsRepository */
    private $itemsRepository;

    public function __construct(ItemsRepository $itemsRepo)
    {
        $this->itemsRepository = $itemsRepo;
    }

    /**
     * Display a listing of the Items.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $items = $this->itemsRepository->paginate(100);

        return view('admin.items.index')
            ->with('items', $items);
    }

    /**
     * Show the form for creating a new Items.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.items.create');
    }

    /**
     * Store a newly created Items in storage.
     *
     * @param CreateItemsRequest $request
     *
     * @return Response
     */
    public function store(CreateItemsRequest $request)
    {
        $input = $request->all();

        $items = $this->itemsRepository->create($input);

        Flash::success('Items saved successfully.');

        return redirect(route('admin.items.index'));
    }

    /**
     * Display the specified Items.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $items = $this->itemsRepository->find($id);

        if (empty($items)) {
            Flash::error('Items not found');

            return redirect(route('admin.items.index'));
        }

        return view('admin.items.show')->with('items', $items);
    }

    /**
     * Show the form for editing the specified Items.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $items = $this->itemsRepository->find($id);

        if (empty($items)) {
            Flash::error('Items not found');

            return redirect(route('admin.items.index'));
        }

        return view('admin.items.edit')->with('items', $items);
    }

    /**
     * Update the specified Items in storage.
     *
     * @param int $id
     * @param UpdateItemsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItemsRequest $request)
    {
        $items = $this->itemsRepository->find($id);

        if (empty($items)) {
            Flash::error('Items not found');

            return redirect(route('admin.items.index'));
        }

        $items = $this->itemsRepository->update($request->all(), $id);

        Flash::success('Items updated successfully.');

        return redirect(route('admin.items.index'));
    }

    /**
     * Remove the specified Items from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $items = $this->itemsRepository->find($id);

        if (empty($items)) {
            Flash::error('Items not found');

            return redirect(route('admin.items.index'));
        }

        $this->itemsRepository->delete($id);

        Flash::success('Items deleted successfully.');

        return redirect(route('admin.items.index'));
    }
}

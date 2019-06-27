<div class="table-responsive-sm">
    <table class="table table-striped table-bordered" id="items-table">
        <thead>
            <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Brand</th> 
        <th>Slug</th>
        <th>Categories</th>
        <th>Status</th>
        <th>Isenabled</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($items as $items)
            <tr>
                <td>{!! $items->name !!}</td>
            <td>{!! $items->price !!}</td>
            <td>{!! $items->stock !!}</td>
            <td>{!! $items->brand !!}</td> 
            <td>{!! $items->slug !!}</td>
            <td>{!! $items->categories !!}</td>
            <td>{!! $items->status !!}</td>
            <td>{!! $items->isEnabled !!}</td>
                <td>
                    {!! Form::open(['route' => ['admin.items.destroy', $items->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('admin.items.show', [$items->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('admin.items.edit', [$items->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
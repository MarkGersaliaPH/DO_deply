<div class="table-responsive-sm">
    <table class="table table-striped" id="subCategories-table">
        <thead>
            <th>Display</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($subCategories as $subCategory)
            <tr>
                <td>{!! $subCategory->display !!}</td>
                <td>
                    {!! Form::open(['route' => ['admin.subCategories.destroy', $subCategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('admin.subCategories.show', [$subCategory->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('admin.subCategories.edit', [$subCategory->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="table-responsive-sm">
    <table class="table table-striped" id="orders-table">
        <thead>
            <th>Item</th>
        <th>Price</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{!! $order->item !!}</td>
            <td>{!! $order->price !!}</td>
                <td>
                    {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('orders.show', [$order->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('orders.edit', [$order->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
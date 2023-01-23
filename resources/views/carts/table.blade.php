<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="carts-table">
            <thead>
            <tr>
                <th>User Id</th>
                <th>Product Id</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($carts as $cart)
                <tr>
                    <td>{{ $cart->user_id }}</td>
                    <td>{{ $cart->product_id }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['carts.destroy', $cart->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('carts.show', [$cart->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('carts.edit', [$cart->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $carts])
        </div>
    </div>
</div>

<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="jsons-table">
            <thead>
            <tr>
                <th>Json</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($jsons as $json)
                <tr>
                    <td>{{ $json->json }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['jsons.destroy', $json->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('jsons.show', [$json->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('jsons.edit', [$json->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $jsons])
        </div>
    </div>
</div>

<!-- Json Field -->
<div class="col-sm-12">
    {!! Form::label('json', 'Json:') !!}
    <p>{{ $json->json }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $json->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $json->updated_at }}</p>
</div>


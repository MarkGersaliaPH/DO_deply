<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Stock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock', 'Stock:') !!}
    {!! Form::number('stock', null, ['class' => 'form-control']) !!}
</div>

<!-- Brand Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand', 'Brand:') !!}
    {!! Form::text('brand', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Seller Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seller_id', 'Seller Id:') !!}
    {!! Form::text('seller_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Categories Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categories', 'Categories:') !!}
    {!! Form::select('categories', ['Kids' => 'Kids', 'Fashion' => 'Fashion', 'Electronics' => 'Electronics', 'Kitchen' => 'Kitchen', 'Bedroom' => 'Bedroom'], null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <label class="radio-inline">
        {!! Form::radio('status', "Forsale", null) !!} Forsale
    </label>

    <label class="radio-inline">
        {!! Form::radio('status', "Draft", null) !!} Draft
    </label>

</div>

<!-- Isenabled Field -->
<div class="form-group col-sm-12">
    {!! Form::label('isEnabled', 'Isenabled:') !!}
    <label class="radio-inline">
        {!! Form::radio('isEnabled', "On", null) !!} On
    </label>

    <label class="radio-inline">
        {!! Form::radio('isEnabled', "Off", null) !!} Off
    </label>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.items.index') !!}" class="btn btn-default">Cancel</a>
</div>

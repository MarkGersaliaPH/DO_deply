<!-- Display Field -->


<div class="form-group col-sm-6">
    {!! Form::label('display', 'Categories:') !!}
    <select name="category_id" class="form-control">
    	@foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->display}}</option>
    	@endforeach
    </select>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('display', 'Display:') !!}
    {!! Form::text('display', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.subCategories.index') !!}" class="btn btn-default">Cancel</a>
</div>

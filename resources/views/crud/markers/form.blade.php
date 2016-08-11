<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    {!! Form::label('title', trans('markers.title'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    {!! Form::label('description', trans('markers.description'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::textarea('description', null, ['rows' => 5, 'class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('x') ? 'has-error' : '' }}">
    {!! Form::label('x', trans('markers.position'), ['class' => 'col-sm-3 control-label']) !!}
  	<div class="col-sm-2">
        {!! Form::number('x', null, ['class' => 'form-control', 'placeholder' => 'x']) !!}
        {!! $errors->first('x', '<p class="help-block">:message</p>') !!}
  	</div>
  	<div class="col-sm-2">
        {!! Form::number('y', null, ['class' => 'form-control', 'placeholder' => 'y']) !!}
        {!! $errors->first('y', '<p class="help-block">:message</p>') !!}
  	</div>
  	<div class="col-sm-2">
        {!! Form::number('z', null, ['class' => 'form-control', 'placeholder' => 'z']) !!}
        {!! $errors->first('z', '<p class="help-block">:message</p>') !!}
  	</div>
</div>

<div class="form-group {{ $errors->has('checkable') ? 'has-error' : '' }}">
    {!! Form::label('checkable', trans('markers.checkable'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
    	<label>
        	{!! Form::checkbox('checkable', 1, false) !!}
    	</label>
        {!! $errors->first('checkable', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('active') ? 'has-error' : '' }}">
    {!! Form::label('active', trans('markers.active'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
    	<label>
        	{!! Form::checkbox('active', 1, true) !!}
    	</label>
        {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('marker_group_id') ? 'has-error' : '' }}">
    {!! Form::label('marker_group_id', trans('markers.marker_group_id'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
    	{!! Form::select('marker_group_id', $model->selectGroup(), null, ['class' => 'form-control']) !!}
        {!! $errors->first('marker_group_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

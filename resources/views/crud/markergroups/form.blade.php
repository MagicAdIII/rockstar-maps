<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    {!! Form::label('title', trans('markers.title'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
    {!! Form::label('slug', trans('markers.slug'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    {!! Form::label('description', trans('markers.description'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::textarea('description', null, ['rows' => 5, 'class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
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

<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
    {!! Form::label('parent_id', trans('markers.parent_id'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::select('parent_id', $model->selectParent(), null, ['class' => 'form-control']) !!}
        {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('game_id') ? 'has-error' : '' }}">
    {!! Form::label('game_id', trans('markers.game_id'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
    	{!! Form::select('game_id', $model->selectGames(), null, ['class' => 'form-control']) !!}
        {!! $errors->first('game_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('vendor/select2/dist/css/select2.css') !!}

	{!! Html::script('vendor/tinymce/js/tinymce/tinymce.js') !!}

	<script type="text/javascript">
		// Initialize
			tinymce.init({
				selector: '#post_body',
				menubar: false,
				plugins: 'link code'
			});
	</script>

@endsection

@section('main-content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel mb25 shadow">
		      <div class="panel-heading border">
		        <h4>Create New Post <i class="fa fa-file-text-o"></i></h4>
		      </div>
		      <div class="panel-body">
		        <div class="row no-margin">
		          <div class="col-lg-12">
		          	{!! Form::open(['route' => 'post.store', 'class' => 'form-horizontal bordered-group', 'data-parsley-validate' => '']) !!}
		          		<div class="form-group">
		          				{{ Form::label('title', 'Title:', ['class' => 'col-md-1 control-label']) }}
		          			
		          			<div class="col-md-11">
		          				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'placeholder' => 'Give your post a Title')) }}
		          			</div> 
					    </div>
					    <div class="form-group">
					    	{{ Form::label('slug', 'Slug:', ['class' => 'col-md-1 control-label']) }}
					  
					    	<div class="col-md-11">
					    		{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255', 'placeholder' => 'URL')) }}
					    	</div>
					    </div>
					    <div class="form-group">
					    	{{ Form::label('category', 'Category:', ['class' => 'col-md-1 control-label']) }}
					    	
					    	<div class="col-md-11">
					    		<select class="form-control" name="category_id">
					    			@foreach($categories as $category)
					    				<option value="{{ $category->id }}">{{ $category->name }}</option>
					    			@endforeach
			                    </select>
					    	</div>
					    </div> 
					    <div class="form-group">
					    	{{ Form::label('tags', 'Tags:', ['class' => 'col-md-1 control-label']) }}
					    	
					    	<div class="col-md-11">
					    		<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					    			@foreach($tags as $tag)
					    				<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					    			@endforeach
			                    </select>
					    	</div>
					    </div> 
					    <div class="form-group">
						    {{ Form::label('body', 'Body:', ['class' => 'col-md-1 control-label']) }}
						    <div class="col-md-11">
						    	{{ Form::textarea('body', null, array('id' => 'post_body','rows' => '8', 'class' => 'form-control', 'placeholder' => 'Post Body')) }}
						    </div>
						</div>
						<div class="form-group">
					    	{{ Form::button('Create Post', array('class' => 'btn btn-primary btn-block', 'type' => 'submit')) }}
					    </div>
					{!! Form::close() !!}
		          </div>
		        </div>
		      </div>
		    </div>
		</div>
	</div>
@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}

	<script type="text/javascript">
		$(function () {
		  	$('[data-toggle="tooltip"]').tooltip()
		})
	</script>

	{!! Html::script('vendor/select2/dist/js/select2.js') !!}

	<script type="text/javascript">
		$(".select2-multi").select2();
	</script>

@endsection
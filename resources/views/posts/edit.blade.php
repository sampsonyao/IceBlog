@extends('main')

@section('title', '| Edit Post')

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
        <div class="col-sm-9">
			<div class="panel shadow">
				<div class="panel-heading border">
		        	<h3>Edit Post <i class="fa fa-edit"></i></h3>
		      	</div>
		      	<div class="panel-body">
		      		<div class="row no-margin">
		      			<div class="col-lg-12">
		      				{!! Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'PUT', 'class' => 'form-horizontal bordered-group', 'data-parsley-validate' => '']) !!}
								<div class="form-group">
				          				{{ Form::label('title', 'Title:', ['class' => 'col-md-1 control-label']) }}
				          			
				          			<div class="col-md-11">
				          				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'placeholder' => 'Give your post a Title')) }}
				          			</div> 
							    </div>
							    <div class="form-group">
							    	{{ Form::label('slug', 'URL:', ['class' => 'col-md-1 control-label']) }}
							  
							    	<div class="col-md-11">
							    		{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255', 'placeholder' => 'URL')) }}
							    	</div>
							    </div>
							    <div class="form-group">
							    	{{ Form::label('category_id', 'Category:', ['class' => 'col-md-1 control-label']) }}
							    	
							    	<div class="col-md-11">
							    		{{ Form::select('category_id',$categories, null, array('class' => 'form-control')) }}
							    	</div>
							    </div>
							    <div class="form-group">
							    	{{ Form::label('tags', 'Tags:', ['class' => 'col-md-1 control-label']) }}
							    	
							    	<div class="col-md-11">
							    		{{ Form::select('tags[]',$tags, null, array('class' => 'form-control select2-multi', 'multiple' => 'multiple')) }}
							    	</div>
							    </div> 
							    <div class="form-group">
								    {{ Form::label('body', 'Body:', ['class' => 'col-md-1 control-label']) }}
								    <div class="col-md-11">
								    	{{ Form::textarea('body', null, array('id' => 'post_body','rows' => '8', 'class' => 'form-control', 'placeholder' => 'Post Body')) }}
								    </div>
								</div>
						        <div class="pull-right">
						        	<div class="composer-options">
						        		{{ Form::button('<span class="fa fa-save"></span>', array('class' => 'btn btn-success btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Update Post', 'type' => 'submit')) }}
						        		{!! Html::decode(Html::linkRoute('post.show', '<span class="fa fa-ban"></span>', array($post->id), array('class' => 'btn btn-danger btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Cancel'))) !!}
						            </div>
						        </div>
						    {!! Form::close() !!}
		      			</div>
		      		</div>
					
		      	</div>
		    </div>
		</div>
		<div class="col-sm-3">
			<!-- <div class="panel shadow">
			  	<div class="panel-body">
			    	<h3 class="mt0 mb0">Post Details</h3><hr>
			    	<div style="padding: 10px">
			    		<p>
			    			<small>URL <i class="icon-globe"></i>: <strong><a href="{{ url($post->slug) }}">{{ url($post->slug) }}</a></strong></small>
			    		</p>
			    		<p>
			    			<small>Category: <strong>{{ $post->category->name }}</strong></small>
			    		</p>
			    		<p>
		    				@if(is_null($post->tags))
		    					<small>Tags: No Tag Assigned</small>
		    				@else
		    					<small>Tags: 
			    					@foreach($post->tags as $tag)
						        		<span class="label label-default">{{ $tag->name }}</span>
						        	@endforeach
					        	</small>
		    				@endif
			    		</p>
			    		<p>
			    			<small>Created on: <strong>{{ date('F j, Y H:i', strtotime($post->created_at)) }}</strong></small>
			    		</p>
			    		<p>
			    			<small>Last Updated: <strong>{{ date('F j, Y H:i', strtotime($post->updated_at)) }}</strong></small>
			    		</p>
			    		<hr>
			    		{!!  Html::linkRoute('post.index','<< See All Posts', array(), array('class' => 'btn btn-default btn-sm btn-block'))  !!}
			    	</div>
			  	</div>
			</div> -->
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
		$(".select2-multi").select2().val({!! json_encode($post->tags()->allRelatedIds()->toArray()) !!}).trigger("change"); 
	</script>

@endsection

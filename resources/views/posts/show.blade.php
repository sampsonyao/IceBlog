@extends('main')
@section('title', '| View Post')
@section('main-content')
	<div class="row">
        <div class="col-sm-9">
			<div class="panel shadow">
		      	<div class="panel-body">
			        <h4 style="">{{ $post->title }}</h4><hr>
			        <div style="padding: 10px">
			        	{!! $post->body !!}
			        </div>
			        <hr>
			        <div class="pull-left">
			        	Tags: 
			        	@foreach($post->tags as $tag)
			        		<span class="label label-default">{{ $tag->name }}</span>
			        	@endforeach
			        </div>
			        <div class="pull-right">
			        	<div class="composer-options" style="display: inline-flex;">
			        		{!! Html::decode(Html::linkRoute('post.edit','<span class="fa fa-edit"></span>', array($post->id), array('class' => 'btn btn-primary btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Edit Post', 'data-original-title' => 'Edit Post'))) !!}

			        		{!! Form::open(['route' => ['post.destroy', $post->id], 'method' => 'DELETE']) !!}

			        			{{ Form::button('<span class="fa fa-trash-o"></span>', array('class' => 'btn btn-danger btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Delete Post', 'data-original-title' => 'Delete Post', 'type' => 'submit', 'style' => 'margin-left:5px')) }}

			        		{!! Form::close() !!}
			            </div>
			        </div>
		      	</div>
		    </div>

		    
		</div>
		<!-- <div class="col-sm-3">
			<div class="panel shadow">
			  	<div class="panel-body">
			    	<h3 class="mt0 mb0">Post Details</h3><hr>
			    	<div style="padding: 10px">
			    		<p>
			    			<small>URL <i class="icon-globe"></i>: <strong><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></strong></small>
			    		</p>
			    		<p>
			    			<small>Category: <strong>{{ $post->category->name }}</strong></small>
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
			</div>
		</div> -->
	</div>
@endsection

@section('scripts')

	<script type="text/javascript">
		$(function () {
		  	$('[data-toggle="tooltip"]').tooltip()
		})
	</script>

@endsection

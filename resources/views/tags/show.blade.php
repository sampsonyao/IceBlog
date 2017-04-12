@extends('main')
@section('title', "| $tag->name Tag")
@section('main-content')
	<div class="row">
        <div class="col-sm-9">
			<div class="panel shadow">
		      	<div class="panel-body">
			        <h3 style="">{{ $tag->name }} Tag 
			        	<small>
			        		@if($tag->posts()->count() > 1 || $tag->posts()->count() == 0)
			        			{{ $tag->posts()->count() }} Posts
			        		@else
			        			{{ $tag->posts()->count() }} Post
			        		@endif
			        	</small>

			        	<div class="pull-right" style="display: -webkit-inline-box;">
				        	<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-xs mr5">Edit <i class="fa fa-edit"></i></a>
			        		{!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}

			        			{{ Form::button('Delete <span class="fa fa-trash-o"></span>', array('class' => 'btn btn-danger btn-xs mr5', 'type' => 'submit')) }}

			        		{!! Form::close() !!}
			        	</div>
			        </h3>
			        <hr>
			        <div class="">
	                	<table class="table">
	                		<thead>
	                			<th class="col-sm-1">#</th>
	                			<th class="col-sm-4">Post Title</th>
	                			<th class="col-sm-4">Tags</th>
	                			<th>Options</th>
	                		</thead>

	                		<tbody>
	                			
	                		@foreach($tag->posts as $post)

	                			<tr>
	                				<th>{{ $post->id }}</th>
	                				<td><a href="{{ route('post.show', $post->id) }}" class="text-primary">{{ $post->title }}</a></td>
	                				<td>
	                					@foreach($post->tags as $tag)
	                						<span class="label label-default">{{ $tag->name }}</span>
	                					@endforeach
	                				</td>
	                				<td>
	                					<div class="btn-group">
	                						<a href="{{ route('post.show', $post->id) }}" class="btn btn-xs btn-default">View <i class="fa fa-eye"></i></a>
	                					</div>
	                				</td>
	                			</tr>

	                		@endforeach

	                		</tbody>
	                	</table>
	                    <div class="text-center">
	                        
	                    </div>
	                </div>
		      	</div>
		    </div>
		</div>
		<div class="col-sm-3">
			<div class="panel shadow">
			  	<div class="panel-body">
			    	<h3 class="mt0 mb0">Tag Details</h3><hr>
			    	<div style="padding: 10px">
			    		<p>
			    			<small>Created on: <strong>{{ date('F j, Y H:i', strtotime($tag->created_at)) }}</strong></small>
			    		</p>
			    		<p>
			    			<small>Last Updated: <strong>{{ date('F j, Y H:i', strtotime($tag->updated_at)) }}</strong></small>
			    		</p>
			    		<hr>
			    		{!!  Html::linkRoute('tags.index','<< See All Tags', array(), array('class' => 'btn btn-default btn-sm btn-block'))  !!}
			    	</div>
			  	</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

	<script type="text/javascript">
		$(function () {
		  	$('[data-toggle="tooltip"]').tooltip()
		})
	</script>

@endsection

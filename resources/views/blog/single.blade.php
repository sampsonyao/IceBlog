@extends('main')
@section('title', "| $post->title")
@section('main-content')
	<div class="row">
	<div class="col-sm-3">
			<div class="panel shadow">
			  	<div class="panel-body">
			    	<h3 class="mt0 mb0"> Details</h3><hr>
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
			    		{!!  Html::linkRoute('blog.index','<< See All Posts', array(), array('class' => 'btn btn-default btn-sm btn-block'))  !!}
			    	</div>
			  	</div>
			</div>
		</div>
		
        <div class="col-sm-9">
			<div class="panel shadow">
		      	<div class="panel-body">
			        <h4 style="">{{ $post->title }}</h4><hr>
			        <div style="padding: 10px">
			        	{!! $post->body !!}
			        </div>
			        <hr>
			        <div class="pull-left">
			        	@if($post->comments()->count() > 1 || $post->comments()->count() == 0)
		        			<i class="fa fa-comments-o fa-1x"></i> {{ $post->comments()->count() }} Comments
		        		@else
		        			<i class="fa fa-comment-o fa-1x"></i> {{ $post->comments()->count() }} Comment
		        		@endif
			        </div>
			        <div class="pull-right">
			        	Tags: 
			        	@foreach($post->tags as $tag)
			        		<span class="label label-default">{{ $tag->name }}</span>
			        	@endforeach
			        </div>
		      	</div>
		    </div>

		    @foreach($post->comments->sortByDesc('created_at') as $comment)
        		<div class="panel shadow">
			      	<div class="panel-body">
				        <section class="profile-timeline">
			              	<div class="profile-timeline-header">
				                <a href="#" class="profile-timeline-user">
				                  <img src="{{ "https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))."?s=50&d=retro" }}" alt="" class="img-circle">
				                </a>
				                <div class="profile-timeline-user-details">
				                  <a href="#" class="bold">{{$comment->name}}</a>
				                  <br>
				                  <em class="text-success small">Submitted on {{ date('F dS, Y - g:i A' ,strtotime($comment->created_at)) }}</em>
				                </div>
			              	</div>
			              	<div class="profile-timeline-content">
				                <p>{{ $comment->comment }}</p>
				                <div class="profile-timeline-controls">
				                  <a class="pull-right" href="javascript:;">
				                    <i class="fa fa-share-alt mr5"></i>
				                  </a>
				                  <a class="mr15" href="javascript:;">
				                    <i class="fa fa-heart mr5"></i>Like
				                  </a>
				                  <a href="javascript:;">
				                    <i class="fa fa-comment mr5"></i>Comment
				                  </a>
				                </div>
			              	</div>
			            </section>
			      	</div>
			    </div>
        	@endforeach

		    <div class="panel shadow panel-collapsed">
		    	<div class="panel-heading border">
			        <h4 style=""><a href="#" class="panel-collapse" data-toggle="panel-collapse">Write a comment</a></h4>
			    </div>
		      	<div class="panel-body">
			        <div class="row no-margin">
		          		<div class="col-lg-12">
		          			<div id="comment_form">
		          				{!! Form::open(['route' => ['comments.store', $post->id, 'method' => 'POST'], 'class' => 'form-horizontal bordered-group', 'data-parsley-validate' => '']) !!}
          							<div class="form-group">
          								<div class="col-md-6">
									    	{{ Form::label('name', 'Name:', ['class' => 'col-md-2 control-label']) }}
									  
									    	<div class="col-md-10">
									    		{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Enter your name')) }}
									    	</div>
									    </div>
          								<div class="col-md-6">
									    	{{ Form::label('email', 'Email:', ['class' => 'col-md-2 control-label']) }}
									  
									    	<div class="col-md-10">
									    		{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Enter your email')) }}
									    	</div>
									    </div>
	          						</div>
          							<div class="form-group">
          								<div class="col-md-12">
									    	{{ Form::label('comment', 'Comment:', ['class' => 'col-md-1 control-label']) }}
									  
									    	<div class="col-md-11">
									    		{{ Form::textarea('comment', null, array('class' => 'form-control', 'placeholder' => 'Comment here')) }}
									    	</div>
									    </div>
	          						</div>
		          					<div class="form-group">
								    	{{ Form::button('Submit Comment', array('class' => 'btn btn-primary btn-block', 'type' => 'submit')) }}
								    </div>
		          				{!! Form::close() !!}
		          			</div>
		          		</div>
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

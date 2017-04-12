@extends('main')
@section('title', '| All Posts')
@section('main-content')

   	<div class="row">
        <div class="col-sm-12">
            <div class="panel shadow">
              <div class="panel-body">
                <h4 style="padding: 10px;">All Posts <i class="icon-paper"></i> <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm pull-right">Create New Post <i class="fa fa-plus"></i></a></h4>
                <hr>
                <div class="">
                	<table class="table">
                		<thead>
                			<th class="col-sm-1">#</th>
                			<th class="col-sm-3">Title</th>
                			<th class="col-sm-4">Body</th>
                			<th class="col-sm-2">Created At</th>
                			<th>Options</th>
                		</thead>

                		<tbody>
                			
                		@foreach($posts as $post)

                			<tr>
                				<th>{{ $post->id }}</th>
                				<td>{{ $post->title }}</td>
                				<td>{{ substr(strip_tags($post->body), 0,50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
                				<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                				<td>
                					<div class="btn-group">
                						<a href="{{ route('post.show', $post->id) }}" class="btn btn-xs btn-default">View <i class="fa fa-eye"></i></a> 
                						<a href="{{ route('post.edit', $post->id) }}" class="btn btn-xs btn-primary">Edit <i class="fa fa-edit"></i></a>
                					</div>
                				</td>
                			</tr>

                		@endforeach

                		</tbody>
                	</table>
                    <div class="text-center">
                        {!! $posts->links(); !!}
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
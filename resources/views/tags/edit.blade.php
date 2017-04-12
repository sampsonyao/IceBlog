@extends('main')

@section('title', '| Edit Tag')

@section('stylesheets')

	{!! Html::style('vendor/select2/dist/css/select2.css') !!}

@endsection

@section('main-content')

	<div class="row">
        <div class="col-sm-7">
			<div class="panel shadow">
				<div class="panel-heading border">
		        	<h3>Edit Tag <i class="fa fa-edit"></i></h3>
		      	</div>
		      	<div class="panel-body">
		      		<div class="row no-margin">
		      			<div class="col-lg-12">
		      				{!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT', 'class' => 'form-horizontal bordered-group', 'data-parsley-validate' => '']) !!}

                                <div class="form-group">
                                	{{ Form::label('name', 'Name:', ['class' => 'col-md-1 control-label']) }}
                                	<div class="col-md-11">
                                    	{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'placeholder' => 'Enter tag name')) }}
                                    </div>
                                </div> 
                                <div class="pull-right">
						        	<div class="composer-options">
						        		{{ Form::button('<span class="fa fa-save"></span>', array('class' => 'btn btn-success btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Update Tag', 'type' => 'submit')) }}
						        		{!! Html::decode(Html::linkRoute('tags.show', '<span class="fa fa-ban"></span>', array($tag->id), array('class' => 'btn btn-danger btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Cancel'))) !!}
						            </div>
						        </div>
                                
                            {!! Form::close() !!}
		      			</div>
		      		</div>
					
		      	</div>
		    </div>
		</div>
		<div class="col-sm-3 col-sm-offset-2">
			<div class="panel shadow">
			  	<div class="panel-body">
			    	<h3 class="mt0 mb0">
			    		Tag Details
			    		<small>
			        		@if($tag->posts()->count() > 1 || $tag->posts()->count() == 0)
			        			{{ $tag->posts()->count() }} Posts
			        		@else
			        			{{ $tag->posts()->count() }} Post
			        		@endif
			        	</small>
			    	</h3>
			    	<hr>
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
	{!! Html::script('js/parsley.min.js') !!}

	<script type="text/javascript">
		$(function () {
		  	$('[data-toggle="tooltip"]').tooltip()
		})
	</script>


@endsection

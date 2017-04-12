@extends('main')
@section('title', '| All Tags')
@section('main-content')

   	<div class="row">
        <div class="col-sm-6">
            <div class="panel shadow">
              <div class="panel-body">
                <h4 style="padding: 10px;">Tags <i class="fa fa-tags"></i></h4>
                <hr>
                <div class="">
                    <table class="table">
                        <thead>
                            <th class="col-sm-1">#</th>
                            <th class="col-sm-3">Name</th>
                            <th class="col-sm-3">Option</th>
                        </thead>

                        <tbody>
                            
                        @foreach($tags as $tag)

                            <tr>
                                <th>{{ $tag->id }}</th>
                                <td>{{ $tag->name }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-xs btn-default">View <i class="fa fa-eye"></i></a> 
                                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-xs btn-primary">Edit <i class="fa fa-edit"></i></a>
                                    </div>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $tags->links(); !!}
                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel shadow">
                <div class="panel-body">
                    <div class="row no-margin">
                        <div class="col-lg-12">
                            {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
                                <h4 style="padding: 10px;"><span style="font-size: 10px">You can tag blog posts to help find them</span><span class="pull-right">New Tag <i class="icon-tag"></i></span></h4>
                                <hr>
                                <div class="">
                                    <div class="form-group">
                                        {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'placeholder' => 'Enter tag name')) }}
                                    </div> 
                                    <div class="form-group">
                                        {{ Form::button('Add Tag', array('class' => 'btn btn-primary btn-block', 'type' => 'submit')) }}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@extends('main')
@section('title', '| All Categories')
@section('main-content')

   	<div class="row">
        <div class="col-sm-6">
            <div class="panel shadow">
              <div class="panel-body">
                <h4 style="padding: 10px;">Categories <i class="icon-paper"></i></h4>
                <hr>
                <div class="">
                    <table class="table">
                        <thead>
                            <th class="col-sm-1">#</th>
                            <th class="col-sm-3">Name</th>
                        </thead>

                        <tbody>
                            
                        @foreach($categories as $category)

                            <tr>
                                <th>{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $categories->links(); !!}
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
                            {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                                <h4 style="padding: 10px;"><span style="font-size: 10px">Your blog posts need categories to help manage them</span><span class="pull-right">New Category <i class="icon-paper-clip"></i></span></h4>
                                <hr>
                                <div class="">
                                    <div class="form-group">
                                        {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'placeholder' => 'Enter category name')) }}
                                    </div> 
                                    <div class="form-group">
                                        {{ Form::button('Add Category', array('class' => 'btn btn-primary btn-block', 'type' => 'submit')) }}
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
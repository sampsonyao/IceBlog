      @extends('main')
      @section('title', '| Home')
      @section('main-content')
        <div class="col-md-4">
        <div class="mb0">
        
          <div class="col-md-11">
          <div class="row">
              <form>
                <input type="text" class="form-control input-lg" placeholder="Search..." style="box-shadow: 0 0 1px rgba(0,0,0,.2);">
              </form>
            </div>
            <br>
          <div class="row">
              <div class="panel shadow">
                <div class="panel-body" style="padding: 5px 15px;">
                  <h5 class="pull-left"><small>Today is {{  date("l jS \of F Y") }}</small></h5>
                  <h5 class="pull-right"><small>Time</small></h5>
                </div>
              </div>
            </div>
            <div class="row">
            @include('partials._topposts')
          </div>
            
          </div>
        </div>
        </div>
        <div class="col-md-8">
        <div class="row">
          <div class="col-sm-10">
            <div class="panel shadow">
              <div class="panel-body">
                <h4 style="padding: 10px;">Posts <i class="icon-paper"></i></h4><hr>
                <div class="search-results">
                  <ul class="search-results-list">
                    @foreach($posts as $post)

                      <li class="search-result">
                        <h4>
                          <a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a>
                        </h4>
                        <p>{{ substr(strip_tags($post->body), 0,300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                        <div class="mt20 mb0">
                          <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-default btn-outline">Read More >></a>
                        </div>
                      </li>

                    @endforeach
                  </ul>
                  <div class="text-center">
                      {!! $posts->links(); !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="col-sm-4">
            @include('partials._topposts')
          </div> -->
        </div>
        </div>
      @endsection
     
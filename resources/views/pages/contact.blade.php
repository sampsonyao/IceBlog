@extends('main')
@section('title', '| Contact')
@section('main-content')
	<!-- <div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel mb25 shadow">
		      <div class="panel-heading border">
		        <h3>Contact Form</h3>
		      </div>
		      <div class="panel-body">
		        <div class="row no-margin">
		          <div class="col-lg-12">
		            <form class="form-horizontal bordered-group" role="form">
		              <div class="form-group">
		                <label class="col-sm-3 control-label">Full Name</label>
		                <div class="col-sm-8">
		                  <input type="text" class="form-control" placeholder="Enter your full name">
		                </div>
		              </div>
		              <div class="form-group">
		                <label class="col-sm-3 control-label">Email</label>
		                <div class="col-sm-8">
		                  <input type="email" class="form-control" placeholder="Enter your email address">
		                </div>
		              </div>
		              <div class="form-group">
		                <label class="col-sm-3 control-label">Message</label>
		                <div class="col-sm-8">
		                  <textarea class="form-control" placeholder="Message" rows="10" cols="50" style="resize: none;"></textarea>
		                </div>
		              </div>
		              <div class="form-group">
		                <button class="btn btn-primary btn-block">Submit Message</button>
		              </div>
		            </form>
		          </div>
		        </div>
		      </div>
		    </div>
		</div>
	</div> -->



   


<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form   class="form-horizontal bordered-group" role="form">
                    <fieldset>
                        <legend class="text-center header">Contact us</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="name" type="text" placeholder="First Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="lname" name="name" type="text" placeholder="Last Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. " rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    ./*header {
        color: #36A0FF;
        font-size: 27px;
        padding: 10px;
    }

    .bigicon {
        font-size: 35px;
        color: #36A0FF;
    }*/
</style>


@endsection
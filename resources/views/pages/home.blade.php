@extends('layout')
<title>registration</title>
@section('content')

<h1>Please register yourself inorder to practice</h1>

<hr>

<h2>Register only if you know what you're doing</h2>
<ul class="inline">
	<li>Please enter all the information and select your desiced day. Also, please enter an authenticate student_id</li>
	<li>Please check the number of available seats before submitting</li>
	<li>Register only to one slot</li>
</ul>

<p>Enjoy</p>


<hr>

<div class="container">
	<div class="row">
		<div class="col-xs-2">
			@if(isset($num1))
			<P>In section1 {{8-$num1}} seats are available</P>
			<hr>
			@endif
			@if(isset($num2))
			<P>In section2 {{8-$num2}} seats are available</P>
			<hr>
			@endif
			@if(isset($num3))
			<P>In section3 {{8-$num3}} seats are available</P>
			<hr>
			@endif
			@if(isset($num4))
			<P>In section4 {{8-$num4}} seats are available</P>
			<hr>
			@endif
			<a href="/section">see sections</a>
		</div>
		<div class="col-xs-8">

			<form method="POST" action="/register" enctype="multipart/form-data" class="col-md-6">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Name:</label></br>
					<input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" required>

				</div>


				<div class="form-group">
					<label for="email">Email</label></br>
					<input type="text" name="email" id="email" class="form-control" value="{{old('email')}}" required>

				</div>


				<div class="form-group">
					<label for="student_id">Student_id</label></br>
					<input type="text" name="student_id" id="student_id" class="form-control" value="{{old('student_id')}}" required>

				</div>

				<input type="radio" name="sec" value="1" id="sec" />
				<label for="sec">Section 1 Sunday time:3pm-6pm</label>
				<input type="radio" name="sec" value="2" id="sec" />
				<label for="sec">Section 2 Monday time:8am-11am, </label>
				<input type="radio" name="sec" value="3" id="sec" />
				<label for="sec">Section 3 Tuesday time:2pm-5pm</label>
				<input type="radio" name="sec" value="4" id="sec" />
				<label for="sec">Section 4 Wednesday time:6pm-8pm</label>

			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>


		</form>
	</div>
</div>
</div>

@if(count($errors)>0)
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>
			{{ error }}
		</li>
		@endforeach
	</ul>
</div>
@endif


@if(Session::has('message'))
<div class="alert alert-success">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	{{Session::get('message')}}
</div>
@endif



@if(Session::has('error'))
<div class="alert alert-warning">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	{{Session::get('error')}}
</div>
@endif

@if(Session::has('email'))
<div class="alert alert-warning">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	{{Session::get('email')}}
</div>
@endif


@if(Session::has('full'))
<div class="alert alert-warning">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	{{Session::get('full')}}
</div>
@endif


@stop	
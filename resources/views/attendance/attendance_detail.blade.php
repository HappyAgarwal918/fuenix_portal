@extends('layouts.master')
@section('content')

<div class="container-fluid">
	<div class="app-card app-card-settings shadow-sm p-4">
	    <div class="app-card-body">
	    	<div class="row">
		    	<div class="col-12 col-md-3">
		    		<h5>Overall</h5>
		    		<p>{{ $data['total_days'] }}</p>
		    	</div>
		    	<div class="col-12 col-md-3">
		    		<h5>Present</h5>
		    		<p>{{ $data['present'] }}</p>
		    	</div>
		    	<div class="col-12 col-md-3">
		    		<h5>Absent</h5>
		    		<p>{{ $data['absent'] }}</p>
		    	</div>
		    	<div class="col-12 col-md-3">
		    		<h5>Percentage</h5>
		    		<p>{{ $data['present']/$data['total_days'] * 100 }}</p>
		    	</div>		    	
		    </div>
	    </div><!--//app-card-body-->
	</div><!--//app-card-->
</div>
@endsection
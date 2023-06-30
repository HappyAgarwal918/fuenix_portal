@extends('layouts.master')
@section('content')

<div class="container-fluid">
	<div class="app-card app-card-settings shadow-sm p-4">
	    <div class="app-card-body">
	    	@foreach($data as $key => $value)
	    	<h3>{{ $key }}</h3>
	    	<table class="restu_table">
	    		<thead>
	    			<tr>
	    				<th>Name</th>
	    				<th>Total Days</th>
	    				<th>Present</th>
	    				<th>Absent</th>
	    				<th>Leave</th>
	    				<th>Percentage</th>
	    				<th>Details</th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			@foreach($data[$key] as $employee_name => $attendance)
		    			<tr>
		    			 	<td>{{ $employee_name }}</td>
		    			 	<td>{{ $attendance['total_days'] }}</td>
		    			 	<td>{{ $attendance['present'] }}</td>
		    			 	<td>{{ $attendance['absent'] }}</td>
		    			 	<td>{{ $attendance['leave'] }}</td>
		    			 	<td>{{ $attendance['present']/$attendance['total_days'] * 100 }}</td>
		    			 	<td><a class="ybtn" href="{{ route('attendance_detail', $attendance['id'])}}">Get Detail</a></td>
		    			</tr>
		    		@endforeach
	    		</tbody>
	    	</table>
	    	@endforeach
	    </div><!--//app-card-body-->
	</div><!--//app-card-->
</div>

@endsection
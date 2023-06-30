@extends('layouts.master')
@section('content')
<div id="txtTest" class=""></div>

<div class="container-fluid">
	<div class="app-card app-card-settings shadow-sm p-4">
	    <div class="app-card-body">
		    <button id="btnShow" class="btn btn-success">Add More</button>
		    <table class="restu_table">
			    <thead>
			        <tr>
			        	<th>S.no</th>
			            <th>Used for</th>
			            <th>Amount</th>
			        </tr>
			    </thead>
			    <tbody>
			    	@foreach($data as $index => $expense)
			        <tr>
			        	<td id="indexno">{{ $index +1 }}</td>
			            <td>{{ $expense->name }}</td>
			            <td>{{ $expense->amount }}</td>
			        </tr>
			        @endforeach
			    </tbody>
			</table>
	    </div><!--//app-card-body-->
	</div><!--//app-card-->
    
    <div class="modal fade" id="expense_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close_modal" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Add Expense</h4>
                </div>
                <div class="modal-body">
                	<form class="" id="myform" action="{{ route('add_expense')}}" method="POST">
                		@csrf
				    	<div class="mb-3 d-none">
						    <label for="user_id" class="form-label">User ID</label>
						    <input type="text" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}" required>
						</div>
					    <div class="mb-3">
						    <label for="name" class="form-label">Used for</label>
						    <input type="text" class="form-control" id="name" name="name" value="" required>
						</div>
						<div class="mb-3">
						    <label for="amount" class="form-label">Amount</label>
						    <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="" required>
						</div>
						<button type="button" class="btn app-btn-primary" id="submit">Add to Expenses</button>
						<button type="button" class="btn btn-default close_modal" data-dismiss="modal">Close</button>
				    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script type="text/javascript">
	$(document).ready(function(){
		var rowCount = $(".restu_table tr").length;
		console.log(rowCount);
		var form = $('#myform');
		$('#submit').click(function(){
			$.ajax({
				url: "{{ route('add_expense')}}",
				type: "POST",
				data: $("#myform").serialize(),

				success: function(user){
					Success = true;
					$('#expense_modal').modal('hide');
					$("#txtTest").html("Expenses updated successfully.").addClass("alert alert-success");
					if(rowCount <= 10){
						$('.restu_table tbody').append("<tr><td>" + rowCount + "</td><td>" + user.name + "</td><td>" + user.amount + "</td></tr>");
						rowCount++;
					}
				},
				error: function(user){
					Success = false;
					$('#expense_modal').modal('hide');
					$("#txtTest").html("Error while updating.").addClass("alert alert-danger");
				} 
			});
		});
	});
</script>
@endsection
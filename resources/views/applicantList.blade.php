<!DOCTYPE html>
<html>
<head>
    <title>All Applicant Listing</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container mt-5">
    <h2 class="mb-4">All Applicant Lists</h2>
    <a href="/" class="btn btn-primary pull-right" role="button" aria-pressed="true">Add Applicant</a>
    <br><br>
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>DOB</th>
                <th>GENDER</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
   
    <!--Applicant-->

    <div class="modal fade" id="applicantView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Applicant Information</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="id"></span></p>
                <p><strong>First Name:</strong> <span id="first_name"></span></p>
                <p><strong>Last Name:</strong> <span id="last_name"></span></p>
                <p><strong>Phone:</strong> <span id="phone"></span></p>
                <p><strong>Email:</strong> <span id="email"></span></p>
                <p><strong>Address:</strong> <span id="address"></span></p>
                <p><strong>DOB:</strong> <span id="dob"></span></p>
                <p><strong>Gender:</strong> <span id="gender"></span></p>
                <p><strong>Resume :</strong> <a href="#" target="_blank"><span id="resume"></span></a></p>
                <p><strong>Profile:</strong> <span id="profile"></span></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>


</div>
   
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {

    $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('applicant.list') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'first_name', first_name: 'first_name'},
            {data: 'last_name', last_name: 'last_name'},
            {data: 'phone', phone: 'phone'},
            {data: 'email', email: 'email'},
            {data: 'address', address: 'address'},
            {data: 'dob', dob: 'dob'},
            {data: 'gender', gender: 'gender'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
</script>

<script>
 $(document).on('click', '.view', function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let applicantId = $(this).attr('id');
    $.get('applicant/detail/' + applicantId, function (data) {
          $('#applicantView').modal('show');
          $('#exampleModalLongTitle').html("Applicant Information");
          $('#id').text(data.id);
          $('#first_name').text(data.first_name);
          $('#last_name').text(data.last_name);
          $('#phone').text(data.phone);
          $('#email').text(data.email);
          $('#address').text(data.address);
          $('#dob').text(data.dob);
          $('#gender').text(data.gender);
          $('#resume').text(data.resume);
          $('#profile').text(data.applicant_photo);
      })
    $('#applicantView').modal('show');
 });
</script>

<script>
    $(document).on('click', '.delete', function(){
      let applicantId = $(this).attr('id');
      confirm("Are You sure want to delete !");
        $.ajax({
            type: "DELETE",
            url: "applicant/delete"+'/'+applicantId,
            success: function (data) {
                $('.yajra-datatable').DataTable().ajax.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
</script>    

</html>
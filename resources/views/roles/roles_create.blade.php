
@extends('layouts.app')

@section('content')
<style>
    .error{
        color: red;
    }
    .custom-alert {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9999;
}

.alert-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 33px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.alert_x {
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
   position: absolute;
   top:10px;
   right: 8px;
}
</style>
<div class="container">
    <div class="row">

        <div class="col-md-8">

         <div class="card">
  <div class="card-header">Create Roles</div>
  <div class="card-body">

      <form id="form_validation" action="{{route('role_store')}}" method="post" onsubmit="return validateNumber()">
        {!! csrf_field() !!}
        <label>Role</label></br>
        <input type="text" name="role_name" id="role_name" class="form-control" ></br>
        <label>Status</label></br>
        <input type="text" name="status" id="status" class="form-control" ></br>
        <div style="
        display: flex;
    ">
            <input type="submit" value="Save" class="btn btn-success" ></br>
            <a href="{{route('index')}}" class="btn btn-primary btn-sm" style="padding: 10px;margin-left:20px;"> Back</a>
        </div>

    </form>

{{-- customized alert box --}}

    <div id="customAlert" class="custom-alert">
        <div class="alert-content">
            <button class="alert_x" onclick="closeCustomAlert()">x</button>

            <p id="alertMessage">Please enter a number not exceeding 1.</p>
        </div>
    </div>


  </div>
</div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>
<script>

    // jquery validation for role name and status
 $(document).ready(function($) {

    $('#form_validation').validate({
        rules:{
            role_name:
                "required",
            status:
                "required"

        },
        messages:{
            role_name:"Please Enter The Correct Role Name *",
            status:"Please Enter The Status *",
        }

});
});
</script>
<script>
   function validateNumber() {
    const status = parseFloat(document.getElementById("status").value);
    // const status = document.getElementById("status").value;

    if (status > 1 || status < -1) {
        const customAlert = document.getElementById("customAlert");
        customAlert.style.display = "block";
        return false;
    }

    return true;
}
</script>
<script>
function closeCustomAlert() {
    const customAlert = document.getElementById("customAlert");
    customAlert.style.display = "none";
}
</script>







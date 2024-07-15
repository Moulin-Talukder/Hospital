<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        label{

            display: inline-block;
            width: 200px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
        <!-- partial:partials/_navbar.html -->

      @include('admin.navbar')  
        
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

        <div class="container" align="center" style="padding-top: 100px;">


@if(session('notify'))
    <div class="alert alert-{{ session('notify')['type'] }}">
        {{ session('notify')['message'] }}
    </div>
@endif


<form action="{{url('updatedoctor', $doctors->id)}}" method="POST" enctype="multipart/form-data">

@csrf

    <div style="padding: 15px;">

        <label>Doctor Name</label>
        <input type="text" name="name" value="{{ $doctors->name }}" style="color: black;" placeholder="Write the name" required>

    </div>

    <div style="padding: 15px;">

        <label>Phone</label>
        <input type="number" name="phone" value="{{ $doctors->phone }}" style="color: black;" placeholder="Write the number" required>

    </div>
    
    <div style="padding: 15px;">

        <label>Speciality</label>
        <select name="speciality"  style="color: black; width: 200px;" required>
            <option value="skin" <?php if($doctors->speciality=='skin'){ echo "selected";} ?> >skin</option>
            <option value="heart" <?php if($doctors->speciality=='heart'){ echo "selected";} ?> >heart</option>
            <option value="eyes" <?php if($doctors->speciality=='eyes'){ echo "selected";} ?> >eyes</option>
            <option value="nose" <?php if($doctors->speciality=='nose'){ echo "selected";} ?> >nose</option>
        </select>

    </div>

    <div style="padding: 15px;">

        <label>Roon No</label>
        <input type="text" name="room" value="{{ $doctors->room }}" style="color: black;" placeholder="Write the room number" required>

    </div>

    <div style="padding: 15px;">

        <label>Old Image</label>
        <img height="150" width="150" src="{{ asset('doctorimage/' . $doctors->image) }}">

    </div>

    <div style="padding: 15px;">

        <label>Change Image</label>
        <input type="file" name="file">

    </div>

    <div style="padding: 15px;">

        <input type="submit" class="btn btn-primary">

    </div>







</form>
</div>

        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>

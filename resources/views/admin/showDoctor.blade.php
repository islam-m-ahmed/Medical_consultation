
<!DOCTYPE html>
<html lang="en">
  <head>
      @include('admin.css')
    <!-- Required meta tags -->
   </head>
  <body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidbar')
        <!-- partial -->

        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
            <!-- container-scroller -->
            <div class="container-fluid m-auto   " style="margin-top: 100px !important">
                {{-- <h2 class=" m-auto m-">your appointment</h2> --}}

              <table class="table dark pt-8 table-responsive-sm  table-dark text-white ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">doctor name</th>
                    <th scope="col">phone</th>
                    <th scope="col">Speciality</th>
                    <th scope="col">room no</th>
                    <th scope="col">image</th>
                    <th scope="col">update</th>
                    <th scope="col">cancel</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($doctors as  $x)


                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{ $x->name}}</td>
                      <td> {{ $x->phone}}</td>
                      <td> {{ $x->specialty}}</td>
                      <td> {{ $x->room}}</td>
                      <td> <img style="height: 60px;  width: 60px" src="doctot_image/{{ $x->image}}" alt=""></td>
                      <td><a class="btn btn-success" href="{{url('update_doctor',$x->id)}}">update</td>
                      <td><a onclick="return confirm('are you sure to delete')" class="btn btn-danger" href="{{url('delete_doctor', $x->id)}}">delete</td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>

        <!-- plugins:js -->
        @include('admin.script')
       <!-- End custom js for this page -->
  </body>
</html>

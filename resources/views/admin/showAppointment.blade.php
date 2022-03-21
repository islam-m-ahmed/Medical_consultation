
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
            <div class="container m-auto pt-8  " style="margin-top: 50px !important;overflow: auto; width:400rem">
                {{-- <h2 class=" m-auto m-">your appointment</h2> --}}

              <table class="table table-dark text-white ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">customer name</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col">doctor name</th>
                    <th scope="col">date</th>
                    <th scope="col">message</th>
                    <th scope="col">Status</th>
                    <th scope="col">Approved</th>
                    <th scope="col">Canceled</th>
                    <th scope="col">send email</th>

                  </tr>
                </thead>
                <tbody>

                    @foreach ($data as  $x)


                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{ $x->name}}</td>
                      <td> {{ $x->email}}</td>
                      <td> {{ $x->phone}}</td>
                      <td> {{ $x->doctor}}</td>
                      <td> {{ $x->date}}</td>
                      <td> {{ $x->message}}</td>
                      <td> {{ $x->status}}</td>
                      <td><a class="btn btn-success" href="{{url('approved',$x->id)}}">Approved</td>
                      <td><a onclick="return confirm('are you sure to delete')" class="btn btn-danger" href="{{url('canceled', $x->id)}}">Cancel</td>
                    <td><a class="btn btn-primary" href="{{url('send_email',$x->id)}}">Send</td>

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

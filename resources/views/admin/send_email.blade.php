
<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
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
            <div class="container-fluid  page-body-wrapper ">

                <div class="container pt-1 m-sm-auto">


            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
              </div>
            @endif
            {{-- <h1 class="m-auto">add doctor</h1> --}}
            <form method="post"  action="{{url('send_now',$data->id)}}" class="m-auto d-block mt-5 border rounde border-white p-4">
                @csrf
                {{-- <label for="" class="col-12 m-auto">add doctor</label> --}}
                <div class="form-group row pt-6">
                    <label for="name" class="col-sm-2 col-form-label">Greeting</label>
                    <div class="col-sm-10">
                      <input type="text"  class="form-control border-0 text-white" name="greeting" id="" ">
                    </div>
                </div>
                <div class="form-group row pt-6">
                    <label for="name" class="col-sm-2 col-form-label">Body</label>
                    <div class="col-sm-10">
                      <input type="text"  class="form-control border-0 text-white" name="body" id=""  >
                    </div>
                </div>
                <div class="form-group row pt-6">
                    <label for="name" class="col-sm-2 col-form-label">Action Url</label>
                    <div class="col-sm-10">
                      <input type="text"  class="form-control border-0 text-white" name="action_url" id=""  >
                    </div>
                </div>
                <div class="form-group row pt-6">
                    <label for="name" class="col-sm-2 col-form-label">Action Text</label>
                    <div class="col-sm-10">
                      <input type="text"  class="form-control border-0 text-white" name="action_text" id=""  >
                    </div>
                </div>
                <div class="form-group row pt-6">
                    <label for="name" class="col-sm-2 col-form-label">end part</label>
                    <div class="col-sm-10">
                      <input type="text"  class="form-control border-0 text-white" name="end" id=""  >
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>

            </form>
        </div>
            </div>

        <!-- plugins:js -->
        @include('admin.script')
       <!-- End custom js for this page -->
  </body>
</html>

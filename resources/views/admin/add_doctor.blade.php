
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
            <div class="container-fluid  page-body-wrapper ">

                <div class="container pt-1 m-sm-auto">


            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
              </div>
            @endif
            {{-- <h1 class="m-auto">add doctor</h1> --}}
            <form method="post" enctype="multipart/form-data" action="{{url('/upload_doctor')}}" class="m-auto d-block mt-5 border rounde border-white p-4">
                @csrf
                                {{-- <label for="" class="col-12 m-auto">add doctor</label> --}}
                <div class="form-group row pt-6">
                    <label for="name" class="col-sm-2 col-form-label">Doctor Name</label>
                    <div class="col-sm-10">
                      <input required type="text" value="{{old('name')}}" style="background-color: #2a3038 !important"  class="form-control border-0 text-white" name="name" id="" autocomplete="off">
                        @error('name')
                        <span style="color: red; ">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row pt-6">
                    <label for="phone" class="col-sm-2 col-form-label">phone</label>
                    <div class="col-sm-10">
                      <input required type="number"  value="{{old('phone')}}" style="background-color: #2a3038 !important" autocomplete="off"class="form-control text-white" id="" name="phone">
                      @error('phone')
                      <span style="color: red; ">{{$message}}</span>
                      @enderror
                    </div>
                </div>
                <div class="form-group row pt-6">
                    <label for="" class="col-sm-2 col-form-label "> Speciality</label>
                    <div class="col-sm-10">
                        <select name="speciaity" class="form-control text-white  " id="">
                            <option   value="select">--select--</option>
                            <option @if (old('speciaity') == "skin") selected @endif  value="skin">skin</option>
                            <option @if (old('speciaity') == "heart") selected @endif value="heart">heart</option>
                            <option @if (old('speciaity') == "eye") selected @endif value="eye">eye</option>
                            <option @if (old('speciaity') == "nose") selected @endif value="nose">nose</option>
                        </select>
                        @error('speciaity')
                        <span style="color: red; ">{{$message}}</span>
                        @enderror
                    </div>
                  </div>
                <div class="form-group row pt-6">
                    <label for="room" class="col-sm-2 col-form-label">room no</label>
                    <div class="col-sm-10">
                      <input required value="{{old('room')}}" type="number" style="background-color: #2a3038 !important" class="form-control" id="" name="room">
                      @error('room')
                      <span style="color: red; ">{{$message}}</span>
                      @enderror
                    </div>
                </div>
                <div class="form-group row pt-6 ">
                    <label class=" col-sm-2  col-form-label "  for="">Choose iamge...</label>
                    <input type="file" class="  col-sm-10 " name="file" id="" >
                    @error('file')
                    <span style="color: red; ">{{$message}}</span>
                    @enderror
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

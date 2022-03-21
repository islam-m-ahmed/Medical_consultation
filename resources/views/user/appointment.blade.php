<div class="page-section">
    <div class="container">


      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
        {{-- @if (url()->current() == route('Home')) --}}
        <form class="main-form" action="{{url('appointment')}}" method="POST">
        {{-- @else --}}
        {{-- <form class="main-form" action="{{url('doctors')}}" method="POST"> --}}
        {{-- @endif --}}
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input required value="{{old('name')}}" type="text" class="form-control" name="name" placeholder="Full name">
            @error('name')
            <span style="color: red; ">{{$message}}</span>
            @enderror
        </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input required  value="{{old('email')}}" type="text" class="form-control" name="email" placeholder="Email address..">
            @error('email')
            <span style="color: red; ">{{$message}}</span>
            @enderror
        </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input required  value="{{old('date')}}" type="date" name="date" class="form-control">
            @error('date')
            <span style="color: red; ">{{$message}}</span>
            @enderror
        </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
        {{-- add doctors --}}
            <select name="doctor" id="" class="custom-select">
                @foreach ($doctors as $doctor)
              <option @if (old('doctor') == $doctor->name) selected @endif  value="{{$doctor->name}} ---specialty-- {{$doctor->specialty}}">{{$doctor->name}} --- specialty --- {{$doctor->specialty}}</option>
              @endforeach
            </select>
            @error('doctor')
            <span style="color: red; ">{{$message}}</span>
            @enderror
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input required  value="{{old('phone')}}" type="text" class="form-control" name="phone" placeholder="Number..">
            @error('phone')
            <span style="color: red; ">{{$message}}</span>
            @enderror
        </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea required  value="{{old('message')}}" name="message" id="message"  class="form-control" rows="6" placeholder="Enter message.."></textarea>
            @error('message')
            <span style="color: red; ">{{$message}}</span>
            @enderror
        </div>
        </div>

        <button type="submit" class="btn alert-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->

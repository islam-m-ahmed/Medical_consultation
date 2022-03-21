@include('layout.user_header');

  <div class="container-fluid  p-5 m-auto ">
    {{-- <h2 class=" m-auto m-">your appointment</h2> --}}

  <table class="table table-hover ">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Doctor name</th>
        <th scope="col">Date</th>
        <th scope="col">Message</th>
        <th scope="col">Status</th>
        <th>cancel appointment</th>
      </tr>
    </thead>
    <tbody>


        @foreach ($data as $x)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$x->doctor}}</td>
        <td>{{$x->date}}</td>
        <td>{{$x->message}}</td>
        <td>{{$x->status}}</td>
        <td><a class="btn btn-danger" onclick="return confirm('are you sure to delete this')" href="{{url('cancel',$x->id)}}">Cancel</td>
      </tr>
      @endforeach



    </tbody>
  </table>
</div>

@include('layout.user_script');

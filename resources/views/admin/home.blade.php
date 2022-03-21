
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
        @include('admin.body')

        <!-- plugins:js -->
        @include('admin.script')
       <!-- End custom js for this page -->
  </body>
</html>

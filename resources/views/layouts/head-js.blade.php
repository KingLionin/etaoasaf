<!-- Core JS files -->
 <script src="{{URL::asset('assets/demo/demo_configurator.js')}}"></script>
 <script src="{{URL::asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
 <script src="{{URL::asset('assets/js/jquery/jquery.min.js')}}"></script>
 <script src="https://www.gstatic.com/charts/loader.js"></script>
 <!-- /core JS files -->
@yield('center-scripts')

 <!-- Theme JS files -->
 <script src="{{URL::asset('assets/js/app.js')}}"></script>
 <!-- /theme JS files -->
@yield('scripts')
<!-- Core JS files -->
 <script src="{{URL::asset('assets/demo/demo_configurator.js')}}"></script>
 <script src="{{URL::asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
 <script src="{{URL::asset('assets/js/jquery/jquery.min.js')}}"></script>
 <script src="{{URL::asset('assets/js/vendor/forms/inputs/autosize.min.js')}}"></script>
 <script src="{{URL::asset('assets/js/vendor/notifications/sweet_alert.min.js')}}"></script>
 <script src="{{URL::asset('assets/js/vendor/forms/selects/select2.min.js')}}"></script>
 <script src="{{URL::asset('assets/js/vendor/forms/selects/bootstrap_multiselect.js')}}"></script>
 <!-- /core JS files -->
@yield('center-scripts')

 <!-- Theme JS files -->
 <script src="{{URL::asset('assets/js/app.js')}}"></script>
 <!-- /theme JS files -->
@yield('scripts')
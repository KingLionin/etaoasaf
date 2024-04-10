@extends('layouts.master')
@section('title', 'Response Table')
@section('content')

<div class="content">
   

@endsection

@section('center-scripts')
<script src="{{ URL::asset('assets/js/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/vendor/tables/datatables/datatables.min.js') }}">
</script>
<script
    src="{{ URL::asset('assets/js/vendor/tables/datatables/extensions/buttons.min.js') }}">
</script>
<script
    src="{{ URL::asset('assets/js/vendor/tables/datatables/extensions/responsive.min.js') }}">
</script>
<script
    src="{{ URL::asset('assets/js/vendor/tables/datatables/extensions/select.min.js') }}">
</script>
<script
    src="{{ URL::asset('assets/js/vendor/tables/datatables/extensions/col_reorder.min.js') }}">
</script>
@endsection

@section('scripts')
<script src="{{ URL::asset('assets/demo/pages/datatables_basic.js') }}"></script>
@endsection

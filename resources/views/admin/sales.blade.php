@extends('admin.app')

@section('content')
<!-- Bars chart -->
<div class="min-w-0 my-6 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
  <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
    Total Sales per Month
  </h4>
  <canvas id="bars"></canvas>
</div>
</div>
@endsection
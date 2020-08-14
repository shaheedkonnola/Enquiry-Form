@extends('layouts.admin')

@section('content')     
   <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
   <div class="card">
      <div class="card-header">
        <h2 class="card-title">
        <b>
          Sales Orders Details
        </b>
        </h2>
       
      </div>
      <div class="card-body">
      	 <enquiries></enquiries>
      </div> 	
   </div>  

@endsection
@push('style')
<style type="text/css">
    
</style>
@endpush
@push('scripts')
<script type="text/javascript">
    
</script>

@endpush        
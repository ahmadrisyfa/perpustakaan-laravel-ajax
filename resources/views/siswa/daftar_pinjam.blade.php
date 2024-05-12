@extends('template.admin.index')
@section('css_admin')
<script src="{{asset('js/app.js')}}" defer></script>    
@endsection
@section('content_admin')
<style>
    .badge{cursor: pointer;}    
    .dataTable-input{        
        border: 1px solid black;
    }        
    @media only screen and (max-width: 520px) {
        .dataTable-dropdown  {
          display: none;
        }
    }
</style>        
    
    <div id="siswalist"></div>                 
@endsection
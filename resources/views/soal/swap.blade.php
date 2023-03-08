@extends('adminlte.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Hit API Product Stock</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Hit API Product Stock</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-body">
        <h3>Initialization</h3>
        <h4>$a : {{$a}}</h4>
        <h4>$b : {{$b}}</h4>
        <h4>list($a,$b) = [$b,$a];</h4>
        <h3>After Swapping</h3>
        @php
            list($a,$b) = [$b,$a];
        @endphp
        <h4>$a : {{$a}}</h4>
        <h4>$b : {{$b}}</h4>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->    
@endsection
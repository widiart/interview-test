@extends('adminlte.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Terbilang</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Terbilang</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-body">
        <div class="d-none">
          <h3>Initialization</h3>
          <h4>Input : {{$a}}</h4>
          <h4>Terbilang : {{$terbilang}}</h4>
        </div>

        <h3>Form Mengubah Angka menjadi Kata</h3>
        <h4>Angka : </h4>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
          <button type="button" class="btn btn-primary" onclick="terbilang()"> Proses </button>
          </div>
          
          <input type="text" id="angka" class="form-control">
        </div>
        <h4>Terbilang : <span id="label"></span></h4>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->    
@endsection

@section('script')
    <script>
      function terbilang() {
        $.ajax({
          url: "{{route('soal.terbilang_ajax')}}",
          method: "POST",
          data: {_token: "{{csrf_token()}}",angka:$("#angka").val() },
          success: function(result) {
            $("#label").html(result)
          }
        })
      }
    </script>
@endsection
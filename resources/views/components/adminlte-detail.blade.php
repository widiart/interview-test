<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <tbody>
            @foreach ($column as $item)  
              <tr>
                <td>{{ $item['label'] }}</td>
                <td>{{ $data->{$item['field']} }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>

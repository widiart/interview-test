<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">{{$title}}</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              @foreach ($column as $item)  
                <th>{{$item['label']}}</th>
              @endforeach
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
              <tr>
                @foreach ($column as $value)
                  <td>{{ $item->{$value['field']} }}</td>
                @endforeach
                <td><x-adminlte-table-action :route="$route" :id="$item->id"></x-adminlte-table-action></td>
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

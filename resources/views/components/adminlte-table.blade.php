@php
    if (empty($modal)) {
        $modal = [];
    }
    if (empty($modal['detail'])) {
        $modal['detail'] = ['id'=>'modalDetail','label'=>'Detail'];
    }
    if (empty($modal['update'])) {
        $modal['update'] = ['id'=>'modalUpdate','label'=>'Update'];
    }
    if (empty($modal['delete'])) {
        $modal['delete'] = ['id'=>'modalDelete','label'=>'Delete'];
    }
    if (empty($modal['create'])) {
        $modal['create'] = ['id'=>'modalCreate','label'=>'Create'];
    }
@endphp

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">{{$title}}</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <button class="btn btn-success btn-block" id="{{$modal['create']['label']}}"><i class="fas fa-plus"></i> Add User</button>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" id="{{$id}}">
        <div id="cover" style="display:none;background-color: white;width:100%;height:100%;position: absolute;opacity: 50%;">
        </div>
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
                <td>
                  <button id="{{$modal['detail']['label']}}" data-id="{{$item->id}}" class="btn btn-info"><i class="fas fa-eye"></i></button>
                  <button id="{{$modal['update']['label']}}" data-id="{{$item->id}}" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                  <button id="{{$modal['delete']['label']}}" data-id="{{$item->id}}" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <x-adminlte-modal :id="$modal['detail']['id']" :label="$modal['detail']['label']"></x-adminlte-modal>
      <x-adminlte-modal :id="$modal['update']['id']" :label="$modal['update']['label']" :submit="true"></x-adminlte-modal>
      <x-adminlte-modal :id="$modal['create']['id']" :label="$modal['create']['label']" :submit="true"></x-adminlte-modal>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>

@section('script')
    <script>
      $(document).on("click","#{{$modal['detail']['label']}}", function() {
        let id = $(this).data('id')
        $('#{{$modal['detail']['id']}} .modal-body').html('');
        $('#{{$modal['detail']['id']}}').modal('show')
        $.ajax({
          url: "{{route($route.'.detail')}}/"+id,
          method: "POST",
          data: {
            _token: "{{ csrf_token() }}",
          },
          success: function(result) {
            $(document).find('#{{$modal['detail']['id']}} .modal-body').html(result);
          }
        })
      })

      $(document).on("click","#{{$modal['update']['label']}}", function() {
        formModal($("#{{$modal['update']['id']}}"),"{{route($route.'.update')}}")
      })

      $(document).on("click","#{{$modal['create']['label']}}", function() {
        formModal($("#{{$modal['create']['id']}}"),"{{route($route.'.create')}}")
      })

      $(document).on("click","#{{$modal['delete']['label']}}", function() {
        let id = $(this).data('id')
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          cancelButtonColor: '#3085d6',
          confirmButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "{{route($route.'.delete')}}/"+id,
              method: "POST",
              data: {
                _token: "{{ csrf_token() }}",
              },
              success: function(result) {
                if(result.status == 'error') {
                  Swal.fire(
                    'Error!',
                    result.message,
                    'warning'
                  )
                } else {
                  Swal.fire(
                    'Deleted!',
                    result.message,
                    'success'
                  )
                  refreshTable()
                }
              }
            })
          }
        })
      })

      function formModal(el,url) {
        let id = el.data('id')
        el.find('#error').html('')
        el.find('.modal-body').html('');
        el.modal('show')
        $.ajax({
          url: url+(id?'/'+id:''),
          method: "POST",
          data: {
            _token: "{{ csrf_token() }}",
          },
          success: function(result) {
            el.find('.modal-body').html(result);
          }
        })
      }

      function submit(id) {
        let form = $("#"+id+" form");
        let data = form.serialize();
        $("#"+id+" #error").html('')
        form.find('input').attr('disabled',true);
        $.ajax({
          url: form.attr('action'),
          method: form.attr('method'),
          data: data,
          success: function(result) {
            if(result.status == 'success') {
              Swal.fire(
                'Success',
                result.message,
                'success'
              ).then((result) => {
                if (result.isConfirmed) {
                  $('#'+id).modal('hide')
                  refreshTable()
                }
              })
            }
            form.find('input').removeAttr('disabled');
          },
          error: function(result) {
            showError(result.responseJSON.errors)
            form.find('input').removeAttr('disabled');
          }
        })
      }

      function showCover() {
        $("#cover").show()
      }
      
      function hideCover() {
        $("#cover").hide()
      }

      function showError(data) {
        let container = $("#{{$modal['update']['id']}} #error")
        for (let value in data) {
          container.append('<div class="alert alert-danger" role="alert">' + data[value] + '</div>');
        }
      }

      function refreshTable() {
        showCover()
        $.ajax({
          url: "{{route($route.'.ajax_refresh')}}",
          method: "POST",
          data: {_token: "{{ csrf_token() }}"},
          success: function(result) {
            $('#{{$id}}').html(result);
            hideCover()
          }
        })
      }
    </script>
@endsection
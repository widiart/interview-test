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
@endphp
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
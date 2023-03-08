<div class="modal fade" id="{{$id}}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{$label}} <span></span></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="container" id="error">
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer justify-content-end">
        @if ($submit ?? false)
          <button type="button" id="submit" onclick="submit('{{$id}}')" class="btn btn-primary">Submit</button>
        @endif
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
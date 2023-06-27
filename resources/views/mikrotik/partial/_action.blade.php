<a href="{{route('mikrotiks.show',$data->slug)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Show Mikrotik"
   class="btn btn-datatable btn-icon btn-transparent-dark me-2 router-show">
    <i class="fas fa-external-link-alt"></i>
</a>
<a href="javascript:void(0)" data-id="{{$data->slug}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Mikrotik"
   class="btn btn-datatable btn-icon btn-transparent-dark me-2 router-edit">
    <i class="fas fa-edit"></i>
</a>
<a href="javascript:void(0)" id="check-online" data-id="{{$data->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Cek Mikrotik Status"
   class="btn btn-datatable btn-icon btn-transparent-dark me-2">
    <i class="fas fa-exchange-alt"></i>
</a>
<a href="javascript:void(0)" data-id="{{$data->slug}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Mikrotik" id="btn-hapus-router" type="button" class="btn btn-datatable btn-icon btn-transparent-dark me-2">
    <i class="far fa-trash-alt"></i>
</a>

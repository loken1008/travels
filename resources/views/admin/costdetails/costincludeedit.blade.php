@php 
$costexclude=App\Models\CostExclude::where('created_at','desc')->get();
@endphp

<div class="modal fade ecibd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-white">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Update Cost Include</h5>
              <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </a>
          </div>
          @foreach($costinclude as $costinclude)
          <form action="{{route('costinclude.update',$costinclude->id)}}" method="post">
              @csrf
              <div class="modal-body">
                  <div class="" id="costincludeAdd">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="costinclude">Cost Include :</label>
                              <input type="text" value="{{$costinclude->cost_include}}" class="form-control" id="costinclude" name="cost_include">
  
                          </div>
                      </div>
                  </div>
              </div>
             
              <div class="modal-footer" style="float:right;width:100%">
  
                  <input type="submit" class="btn btn-primary" value="Update Cost Include"
                      style="float: right">
                      <a href="{{ route('costinclude.delete', $costinclude->id) }}" class="btn btn-danger mt-2 "
                        style="width:5rem" id="delete" title="delete"><i
                            class="fa fa-trash"></i></a>
              </div>
          </form>
        @endforeach
      </div>
    </div>
  </div>
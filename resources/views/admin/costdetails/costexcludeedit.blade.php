

<div class="modal fade ecebd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-white">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Update Cost Exclude</h5>
              <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </a>
          </div>
          @foreach($costexclude as $costexclude)
          <form action="{{route('costexclude.update',$costexclude->id)}}" method="post">
              @csrf
              <div class="modal-body">
                  <div class="" id="costexcludeAdd">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="costexclude">Cost Exclude :</label>
                              <input type="text" value="{{$costexclude->cost_exclude}}" class="form-control" id="costexclude" name="cost_exclude">
                              <a href="{{ route('costexclude.delete', $costexclude->id) }}" class="btn btn-danger mt-2 "
                                style="width:5rem" id="delete" title="delete"><i
                                    class="fa fa-trash"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
             
              <div class="modal-footer" style="float:right;width:100%">
  
                  <input type="submit" class="btn btn-primary" value="Update Cost Exclude"
                      style="float: right">
              </div>
          </form>
        @endforeach
      </div>
    </div>
  </div>
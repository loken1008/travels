

<div class="modal fade cebd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-white">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add Cost Exclude</h5>
              <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </a>
          </div>
          <form action="{{route('costexclude.store')}}" method="post">
              @csrf
              <div class="modal-body">
                  <div class="" id="costexcludeAdd">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="costexclude">Cost Exclude :</label>
                              <input type="text" class="form-control" id="costexclude" name="cost_exclude[]">
  
                          </div>
                      </div>
                  </div>
              </div>
              <div class="">
                  <a href="javascript:void(0)" id="addMoreCostexclude"
                      class="btn btn-success pull-right mr-3 "></span>
                      Add More</a>
              </div>
              <hr>
              <div class="modal-footer" style="float:right;width:100%">
  
                  <input type="submit" class="btn btn-primary" value="Add Cost Exclude"
                      style="float: right">
              </div>
          </form>
      </div>
    </div>
  </div>
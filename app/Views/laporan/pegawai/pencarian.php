<div class="card card-outline card-warning  ">
  <div class="card-header bg-primary">
      <h3 class="card-title">Pencarian</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
      </div>
  </div>
  
  <div class="card-body">
      <form class="form-horizontal forml" action="">
        <input type="hidden" name="tanggal_mulai" id="tanggal_mulai" />
        <input type="hidden" name="tanggal_akhir" id="tanggal_akhir" />
        <div class="row">
          <div class="col-sm-5">


          <div class="form-group row">
            <label for="inputUnit" class="col-sm-4 col-form-label">Periode</label>
              <div class="col-sm-6">
                  <button type="button" class="btn btn-default btn-lg" id="daterange-btn">
                      <i class="far fa-calendar-alt" ></i> <span id="side_tanggal"><?= date('F Y') ?> </span>
                      <i class="fas fa-caret-down"></i>
                  </button>
              </div>
          </div>

            <div class="form-group row">
              <label for="inputAgen" class="col-sm-4 col-form-label"></label>
              <div class="col-sm-8 d-flex">
                <input type="submit" class="col-4 btn btn-block bg-gradient-warning btn-sm mr-1" value="Cari">
                <button class="col-2 btn bg-gradient-primary btn-sm mr-1">PDF</button>
                <button class="col-3 btn bg-gradient-success btn-sm">Excel</button>
              </div>
            </div>                      
            
          </div>

          <div class="col-sm-5">

       
          </div>
        </div>

      
      
      </form>
      <!-- endForm -->
  </div>
</div>
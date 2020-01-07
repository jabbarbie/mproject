<div class="card card-outline">
  <div class="card-header bg-gradient-primary ">
      <h3 class="card-title">Target</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
      </div>
  </div>

  <div class="card-body">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Tanggal Awal</th>
          <th>Sampai</th>
          <th>Target</th>  
        </tr>
      </thead>

      <tbody>
      <?php foreach($target as $k => $t): ?>
        <tr>
          <td><?= ($k+1)?></td>
          <td><?= $t->tanggal_mulai?></td>
          <td><?= $t->tanggal_akhir?></td>
          <td><?= $t->target?></td>
        </tr>
      <?php endforeach;?>
      </tbody>

    </table>
  </div><!-- end of cardbody -->

</div><!-- end of card -->


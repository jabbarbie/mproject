<?php $this->extend('template/index') ?>
<?php $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                
            </div>
            <div class="card-body">
               <table class="table table-noborder">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Halaman</th>
                        <th>Method</th>
                        <th>Fungsi</th>
                        <th>URL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0 ?>
                    <?php foreach($data as $key => $r):?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $key ?></td>
                            <td>
                                <ul class="list-unstyled">
                                    <?php for($ii=0; $ii < count($r); $ii++):?>
                                        <li><?= $r[$ii][0] ?></li>
                                    <?php endfor;?>
                                </ul>
                            </td>
                            <td>
                                <ul class="list-unstyled">
                                    <?php for($ii=0; $ii < count($r); $ii++):?>
                                        <li><?= $r[$ii][1] ?></li>
                                    <?php endfor;?>
                                </ul>
                            </td>
                            <td>
                                <ul class="list-unstyled">
                                    <?php for($ii=0; $ii < count($r); $ii++):?>
                                        <li><a href="<?= base_url($r[$ii][2])?>" target="_blank"><?= $r[$ii][2] ?></a></li>
                                    <?php endfor;?>
                                </ul>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach;?>
                </tbody>
               </table>
            </div>
        </div>
    </div>
</div> 
<?php $this->endSection() ?>

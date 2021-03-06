<?php $this->extend('template/laporan/index') ?>
<?php $this->section('content') ?>

<header>
            <div id="tulisan">
                <p class='judul_sub'>Laporan Pegawai Konsolidasi</p>
                <p class='judul'>PT. BANK MANDIRI (PERSERO) Tbk. & Entitas Anak</p>
            </div>
        </header>

        <div class="judultable">
            <p><?= $keterangan_periode?></p>
        </div>
        <table border="0" cellspacing=0 width="100%">
            <thead>
                <tr>
                    <th width="10%" rowspan="2">No</th>
                    <th rowspan="2">Pegawai</th>    
                    <th colspan="2" class="thtebal">Jumlah</th>
                    <th rowspan="2" width="10%">GAP</th>

                </tr>
                <tr>
                    <th width="9%" class="textkecil">Target</th>
                    <th width="9%" class="textkecil">Realisasi</th>
                </tr>
                <tr class="kiri thtebal">
                    <td></td>
                    <td class="textkecil" colspan="4">Agen Usaha</td>
                </tr>
            </thead>
            <tbody>
                <?php if (count($data) > 0):?>
                
                <?php $totaltarget = 0; $totalrealisasi = 0; $totalgap = 0; $jumagen = 0 ?>
                <?php foreach ($data as $key => $value): ?>
                    <?php $gap = (int) ($value['default_target'] - $value['jumlah']) ?>
                    <?php
                        $jumlahagen = 0;
                        if(count($value['sate']) > 0) {
                            $jumlahagen = count($value['sate']);
                        }    
                        $totaltarget += $value['default_target'];
                        $totalrealisasi += $value['jumlah'];
                        $totalgap += ($gap <= 0? 0: $gap);

                    ?>
                    <tr  class="abugelap">
                        <td align=right  valign="top" class="tebal">
                            <?= ($key+1).'.' ?>
                        </td>
                        <td class="tebal"><?= $value['nama_pegawai'] ?></td>

                        <td align="center" class="tebal"><?= $value['default_target'] ?></td>
                        <td align="center" class="tebal"><?= $value['jumlah'] ?></td>
                        <td align="center" class="tebal"><?= ($gap <= 0?'-':$gap) ?></td>
                    </tr>
                    <?php if($jumlahagen > 0):?>
                    <?php foreach($value['sate'] as $k => $r): ?>
                    <tr>
                        <td></td>
                        <td class="textkecil"> - <?= $r['nama_agen'] ?></td>
                        <?php $jumagen++ ?>
                    </tr>

                    <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>

            <tfoot>
                <tr class="thtebal ">
                    <td></td>
                    <td class="textkecil">Jumlah Agen dalam periode ini <?= $jumagen ?> agen dari <?= count($data)?> pegawai</td>
                    <td class="textkecil" align="center"><?= $totaltarget?></td>
                    <td class="textkecil" align="center"><?= $totalrealisasi?></td>
                    <td class="textkecil" align="center"><?= $totalgap?></td>
                </tr>
            </tfoot>

                    <?php else: ?>
                        <tr>
                            <td colspan="5"  align="center"><p>- Data Not Found -</p></td>
                        </tr>
            <?php endif; ?>

        </table>

<?php $this->endSection() ?>

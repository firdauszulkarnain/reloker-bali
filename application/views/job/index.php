 <!-- slider_area_start -->
 <div class="slider_area mb-5">
     <div class="single_slider  d-flex align-items-center slider_bg_1">
         <div class="container">
             <div class="row align-items-center">
                 <div class="col-lg-7 col-md-6">
                     <div class="slider_text">
                         <!-- <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s"><?= $total ?>+ Jobs listed</h5> -->
                         <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">RELOKER BALI</h3>
                         <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">Temukan Lowongan Kerja Sesuai Dengan Kriteria Anda!</p>
                         <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                             <?php if ($this->session->userdata('user')) : ?>
                                 <a href="<?= base_url() ?>rekomendasi" class="boxed-btn3"><i class="fas fa-search"></i> Cari Rekomendasi</a>
                             <?php else : ?>
                                 <a href="<?= base_url() ?>auth/login" class="boxed-btn3"><i class="fas fa-search"></i> Cari Rekomendasi</a>
                             <?php endif; ?>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
         <img src="<?= base_url() ?>assets/job_template/img/banner/illustration.png" alt="" style="width:50% !important;">
     </div>
 </div>
 <!-- slider_area_end -->

 <!-- job_listing_area_start  -->
 <div class="job_listing_area py-5 mt-n5" id="job_listing">
     <div class="container pt-5">
         <div class="row align-items-center">
             <div class="col-lg-12">
                 <div class="section_title">
                     <h3 style="font-size: 24px !important; color: #0E185F;" class="text-center">Lowongan Kerja Terbaru</h3>
                     <hr width="30%">
                 </div>
             </div>
         </div>
         <div class="job_lists">
             <div class="row" id="tampil">
                 <?php foreach ($loker as $item) : ?>
                     <div class="col-lg-12 col-md-12">
                         <div class="single_jobs white-bg d-flex justify-content-between">
                             <div class="jobs_left d-flex align-items-center">
                                 <div class="thumb">
                                     <img src="<?= base_url() ?>assets/img/foto_loker/<?= $item['foto'] ?>" alt="" width="100%">
                                 </div>
                                 <div class="jobs_conetent">
                                     <a href="<?= base_url() ?>loker/detail_loker/<?= $item['id_alternatif'] ?>">
                                         <h4><?= $item['nama_alternatif'] ?></h4>
                                     </a>
                                     <div class="links_locat d-flex align-items-center">
                                         <div class="location">
                                             <p> <i class="fas fa-fw fa-building"></i><?= $item['nama_usaha'] ?></p>
                                         </div>
                                         <div class="location">
                                             <p class="text-capitalize"><i class="fas fa-fw fa-map-marker-alt"></i><?= strtolower($item['nama_kab']) ?>, <?= strtolower($item['nama_kec'])  ?></p>
                                         </div>
                                         <div class="location">
                                             <p> <i class="fas fa-fw fa-tag"></i><?= $item['nama_kategori'] ?></p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="jobs_right">
                                 <div class="apply_now float-right">
                                     <!-- <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a> -->
                                     <a href="<?= base_url() ?>/loker/detail_loker/<?= $item['id_alternatif'] ?>" class="btn btn-sm bg-warna text-light"><i class="fas fa-fw fa-eye"></i></a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 <?php endforeach; ?>
             </div>
             <div class="row ">
                 <div class="col-lg-12 d-flex justify-content-center">
                     <a href="<?= base_url() ?>loker" class="btn py-2 mt-3 text-center px-5 text-light" style="background-color: #0E185F;">Lihat Lowongan Lainnya</a>
                 </div>
             </div>
         </div>
     </div>
 </div>
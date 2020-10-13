<footer class="bd-footer text-light">
    <div class="container">
        <div class="row pt-4">
            <div class="col-lg-12" id="footer">
                <!-- <div class="top">
                    <a href="#" class="d-block text-center" style=" margin-top:-35px; margin-bottom:30px">
                        <font color='black'>
                            <i class="fas fa-chevron-up"></i>
                        </font>
                    </a>
                </div> -->
                <img src="<?= base_url('assets/img/logo/logopkk.png') ?>" style="width:auto; height: 150px; position:center; display:block; margin-left:auto; margin-right:auto; margin-bottom:5px;">
                <div class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">
                    <p class="pt-2 bold">Tim Penggerak PKK Kabupaten Wonogiri</p>
                    <!-- <hr width="40%" color="#E3BCB2" style="margin-top: -7px; margin-bottom: 7px"> -->
                    <p>Alamat : Jl. Kabupaten Nomor 5 Wonogiri, Jawa Tengah</p>
                    <p>Telepon : (0273) 321002</p>
                    <p>Email : tppkkwonogiri@gmail.com</p>
                </div>
                <br>
            </div>
            <!-- <div class="col-lg-4">
                <p>hehehe</p>
            </div> -->
            <!-- <div class="col-lg-4">
                <p style="font-family: 'Open Sans', sans-serif; font-weight:bold; margin-bottom:-10px">Hubungi Kami</p>
                <hr width="20%" color="white" align="left">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d988.189762082921!2d110.92477882916931!3d-7.815310670999842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNDgnNTUuMSJTIDExMMKwNTUnMzEuMiJF!5e0!3m2!1sid!2sid!4v1578384142974!5m2!1sid!2sid" width="200" height="200" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div> -->
        </div>
    </div>
    <div class="container">
        <!-- developed with <3 by wahyu adi kusuma -->
        <div class="footer-copyright text-left text-light pb-3">
            <hr width="100%" color="white">
            <p>
                Copyright © <?php echo date('Y'); ?> by <a href="https://diskominfo.wonogirikab.go.id/" target="_blank">Diskominfo Kabupaten Wonogiri.</a> <span> All Right Reserved.</span>
            </p>
        </div>
    </div>

</footer>
<script src="<?= base_url('assets/js/jquery-3.4.1.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/owlcarousel/dist/owl.carousel.min.js'); ?>"></script>
<script src="<?= base_url(); ?>assets/js/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/js/sweetalert2/myscript.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                // nav: true,
                autoplay: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true
            },
            600: {
                items: 2,
                // nav: false,
                autoplay: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true

            },
            1000: {
                items: 3,
                // nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true

            }
        }
    })
</script>
<script>
    let btn = $('#button');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });
</script>

<!-- Load Jquery & Datatable JS -->
<script type="text/javascript" src="<?php echo base_url('assets/datatables/datatables.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datatables/lib/js/dataTables.bootstrap4.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        tabel = $('#tablemateri').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true, // Set true agar bisa di sorting
            "ajax": {
                "url": "<?php echo base_url('materi/get_ajax_materi') ?>", // URL file untuk proses select datanya
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [-1], // -1 itu field aksi
                "orderable": false,
            }],
            "deferRender": true,
            "aLengthMenu": [
                [5, 10, 25],
                [5, 10, 25]
            ], // Combobox Limit
            "order": [],
            //  "responsive": true,
            autoFill: true
        })
    });
</script>
</body>

</html>
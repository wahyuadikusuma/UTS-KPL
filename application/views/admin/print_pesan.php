<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2/admin.css" rel="stylesheet">
    <title>Pesan Masyarakat</title>
</head>

<body>
    <div class="table-responsive table-bordered">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="5%">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Pesan</th>
                    <th scope="col">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($pesan as $row) { ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->email; ?></td>
                        <td><?= $row->telepon; ?></td>
                        <td><?= $row->pesan; ?></td>
                        <?php date_default_timezone_set("Asia/Jakarta"); ?>
                        <td><?= date('d F Y, G:i', $row->tanggal); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

<script type="text/javascript">
    window.print();
</script>

</html>
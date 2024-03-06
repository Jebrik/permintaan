<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

     <link rel="stylesheet" href="<?=base_url()?>src/css/laporan.css">

     <style>
      tr.border_bottom {
        border:1pt solid black;
      }
    </style>

    <title>Data Aset</title>
  </head>
  <body>

    <meta http-equiv="REFRESH" content="5; url=<?=base_url('laporan/aset')?>">
    
    <div class="container">
      <div class="row mt-3">
        <?php foreach ($aset as $row) {?>
        <div class="col-md-2">
          <table>
            <tr class="border_bottom">
              <td>
                <img class="card-img-top" src="<?php echo base_url().'src/img/qrcode/'.$row['qr_code'];?>" alt="Card image cap">
                <p style="font-size:8px;text-align:center"><?=$row['kode_aset'];?></p>
              </td>
            </tr>
          </table>
        </div>
        <?php } ?>
      </div>
    </div>

    <script>
      window.print();
    </script>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
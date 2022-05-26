<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Payment add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="col-8 mx-auto">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Amount</th>
              <th scope="col">Type</th>
              <th scope="col">Operation Date</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($payments as $key => $payment) { ?>
              <tr data-id="<?= $payment["id"] ?>">
                <th scope="row"><?= $key + 1 ?></th>
                <td><?= $payment["amount"] ?></td>
                <td><?= $payment["type"] ?></td>
                <td><?= date("Y-m-d", strtotime($payment["operation_date"])) ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= lang("Payments") ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="col-8 mx-auto my-3">
        <div class="container mb-3">
          <div class="card col-6 mx-auto">
            <h5 class="card-header"><?= lang("Payment add") ?></h5>
            <div class="card-body">
              <div class="mb-3">
                <label for="amount" class="form-label"><?= lang("Amount") ?></label>
                <input type="number" class="form-control" min="0" step="0.01" id="amount">
              </div>
              <select class="form-select" id="type">
                <option value="entry"><?= lang("Entry") ?></option>
                <option value="exist"><?= lang("Exist") ?></option>
              </select>
              <button type="button" class="btn btn-primary mt-3" data-role="add-payment"
               name="button"><?= lang("Pay") ?></button>
            </div>
          </div>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col"><?= lang("Amount") ?></th>
              <th scope="col"><?= lang("Type") ?></th>
              <th scope="col"><?= lang("Operation date") ?></th>
              <th scope="col"><?= lang("Actions") ?></th>
            </tr>
          </thead>
          <tbody data-role="table-list">

          </tbody>
        </table>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= assets('js/payments/list.js') ?>" charset="utf-8"></script>

  </body>
</html>

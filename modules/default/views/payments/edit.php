<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= lang("Payment edit") ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="card col-6 mx-auto my-3">
        <h5 class="card-header"><?= lang("Payment edit") ?></h5>
        <div class="card-body">
          <input type="hidden" id="id" value="<?= $payment["id"]; ?>">
          <div class="mb-3">
            <label for="amount" class="form-label"><?= lang("Amount") ?></label>
            <input type="number" value="<?= $payment["amount"] ?>" class="form-control" min="0" step="0.01" id="amount">
          </div>
          <select class="form-select" id="type">
            <option value="entry" <?= $payment["type"] === "entry" ? "selected" : ""; ?> ><?= lang("Entry") ?></option>
            <option value="exist" <?= $payment["type"] === "exist" ? "selected" : ""; ?> ><?= lang("Exist") ?></option>
          </select>
          <button type="button" class="btn btn-primary mt-3" data-role="edit-payment" name="button"><?= lang("Update") ?></button>
          <a href="/payments" class="btn btn-danger mt-3"><?= lang("Back") ?></a>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
      $(document).on("click", `[data-role="edit-payment"]`, function() {
        console.log("Payment edited");
        let amount = $("#amount").val();
        let type = $("#type").val();
        let id = $("#id").val();

        $.ajax({
          url: `/payments/${id}/edit`,
          type: "PUT",
          data: JSON.stringify({
            amount, type
          }),
          success: function(data) {
            console.log(data);
            if (data.code === 200) {
              Swal.fire(
                'Updated!',
                'Your payment has been updated.',
                'success'
              );
            }
          },
          error: function(err) {
            console.log("Error!", err);
          }
        });
      });
    </script>
  </body>
</html>

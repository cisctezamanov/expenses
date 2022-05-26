<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Payment add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="card col-6 mx-auto my-3">
        <h5 class="card-header">Payment</h5>
        <div class="card-body">
          <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" step="0.01" id="amount">
          </div>

          <select class="form-select" id="type">
            <option disabled selected>Select type</option>
            <option value="entry">Entry</option>
            <option value="exist">Exist</option>
          </select>

          <button type="button" class="btn btn-primary mt-3" data-role="add-payment" name="button">Pay</button>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(document).on("click", `[data-role="add-payment"]`, function() {
        console.log("Payment added");
        let amount = $("#amount").val();
        let type = $("#type").val();

        $.post({
          url: "/api/payments/add",
          data: {amount, type},
          success: function(data) {
            console.log("Success!");
          },
          error: function(err) {
            console.log("Error!", err);
          }
        });
      });
    </script>
  </body>
</html>

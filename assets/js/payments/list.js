$(function() {
  const paymentComponent = (data) => {
    let {row_count, id, amount, type, operation_date} = data;

    return `
      <tr data-id="${id}">
        <th scope="row">${row_count}</th>
        <td data-amount="${amount}">${amount}</td>
        <td data-type="${type}">${type}</td>
        <td>${operation_date}</td>
        <td>
          <a href="payments/${id}/edit" class="btn btn-success btn-sm">Edit</a>
          <button type="button" data-role="delete-payment" class="btn btn-danger btn-sm">Delete</button>
        </td>
      </tr>
    `;
  }

  $(document).on("click", `[data-role="add-payment"]`, function() {
    let amount = $("#amount").val();
    let type = $("#type").val();

    $.post({
      url: "/payments/add",
      data: {
        amount, type
      },
      success: function(data) {
        console.log(data);
        if (data.code === 201) {
          Swal.fire(
            'Added!',
            'Your payment has been added.',
            'success'
          );
          getContent();

          $("#amount").val("");
          $("#type").val("entry");
        }
      },
      error: function(err) {
        console.log("Error!", err);
      }
    });
  });

  $(document).on("click", `[data-role="delete-payment"]`, function() {
    Swal.fire({
      title: 'Are you sure to delete this payment?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        // $(this) = <button>, parents("tr") = <button>-nın parenti tr-dir.
        // data methodu data- atributundakı data-key'ə əsasən dəyəri götürür. data-id="${id}"
        let id = $(this).parents("tr").data("id");

        $.ajax({
          url: `/payments/${id}/delete`,
          type: "DELETE",
          success: function(data) {
            console.log(data);
          },
          error: function(err) {
            console.log("Error!", err);
          }
        });

        Swal.fire(
          'Deleted!',
          'Your payment has been deleted.',
          'success'
        );

        getContent();
      }

    })
  });

  let getContent = () => {
    $.get({
      url: "api/payments/list-live",
      success: function(data) {
        console.log("Success!");
        let html = "";
        let row_count = 0;

        if (data.code === 200) {
          let payments = data.data;

          html += payments.map((payment) => paymentComponent({
            row_count: ++row_count,
            id: payment.id,
            amount: payment.amount,
            type: payment.type,
            operation_date: payment.operation_date
          }));

          $(`[data-role="table-list"]`).html(html);
        }
        else {
          console.log(data);
        }
      },
      error: function(err) {
        console.log("Error!", err);
      }
    });
  }

  getContent();

});

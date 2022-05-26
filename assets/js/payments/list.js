$(function() {
  const paymentComponent = (data) => {
    let {row_count, id, amount, type, operation_date} = data;

    return `
      <tr data-id="${id}">
        <th scope="row">${row_count}</th>
        <td>${amount}</td>
        <td>${type}</td>
        <td>${operation_date}</td>
        <td>
          <button type="button" data-role="edit-payment" class="btn btn-success btn-sm">Edit</button>
          <button type="button" data-role="delete-payment" class="btn btn-danger btn-sm">Delete</button>
        </td>
      </tr>
    `;
  }

  $(document).on("click", `[data-role="edit-payment"]`, function() {
    $.ajax({
      url: "/api/payments/",
      success: function() {
        console.log("Success!");
      },
      error: function(err) {
        console.log("Error!", err);
      }
    });
  });

  let getContent = () => {
    $.get({
      url: "/api/payments/list-live",
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

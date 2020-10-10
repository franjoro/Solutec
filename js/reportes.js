tabla = (start,end) => {
    articulo = $("#articulo").children("option:selected").val(),
    pago= $("#pago").children("option:selected").val();
    $.ajax({
        url: `php/ordenes/tablaClose.php?start=${start}&end=${end}&articulo=${articulo}&pago=${pago}`
    }).done(function(e) {
        $("#clientTable").html(e), $("#dataTable").DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pdf','excel','print'
            ]
        });;
    });
}
let start = moment().subtract(30, "days"), end = moment();
function cb(start, end) {
  $("#reportrange span").html(
    start.format("DD/MM/YYYY") + " - " + end.format("DD/MM/YYYY")
  );
}
$("#reportrange").daterangepicker(
  {
    startDate: start,
    endDate: end,
    ranges: {
      Today: [moment(), moment()],
      Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
      "Last 7 Days": [moment().subtract(6, "days"), moment()],
      "Last 30 Days": [moment().subtract(29, "days"), moment()],
      "This Month": [moment().startOf("month"), moment().endOf("month")],
      "Last Month": [
        moment().subtract(1, "month").startOf("month"),
        moment().subtract(1, "month").endOf("month"),
      ],
    },
  },
  cb
);
cb(start, end);
tabla(start.format("MM/DD/YYYY"), end.format("MM/DD/YYYY"));
$("#reportrange").on("apply.daterangepicker", function (t, a) {
    start = a.startDate;
    end = a.endDate;
    tabla(
    a.startDate.format("MM/DD/YYYY"),
    a.endDate.format("MM/DD/YYYY")
  );
  console.log(a.startDate.format("DD/MM/YYYY"), a.endDate.format("DD/MM/YYYY"));
});
$("#pago").change(() => { 
    tabla(start.format("MM/DD/YYYY"), end.format("MM/DD/YYYY"));
})
$("#articulo").change(() => { 
    tabla(start.format("MM/DD/YYYY"), end.format("MM/DD/YYYY"));
})
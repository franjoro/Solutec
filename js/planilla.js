let start = moment().subtract(30, "days"), end = moment();

tabla = (start,end, tec) => {
    $.ajax({
        url: `php/tecnicos/planilla.php?start=${start}&end=${end}&tec=${tec}`
    }).done(function(e) {
        $("#clientTable").html(e), $("#dataTable").DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pdf','excel','print'
            ]
        });;
    });
}

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
tabla(start.format("MM/DD/YYYY"), end.format("MM/DD/YYYY"), "All");

$("#reportrange").on("apply.daterangepicker", function (t, a) {
    start = a.startDate;
    end = a.endDate;
    tabla(
    a.startDate.format("MM/DD/YYYY"),
    a.endDate.format("MM/DD/YYYY"),
    $("#tecnico").children("option:selected").val()
  );
  console.log(a.startDate.format("DD/MM/YYYY"), a.endDate.format("DD/MM/YYYY"));
});

$("#tecnico").change(() => { 
    tabla(
        start.format("MM/DD/YYYY"),
        end.format("MM/DD/YYYY"), 
        $("#tecnico").children("option:selected").val()
      );
})
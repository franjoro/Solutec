
const start = moment().subtract(29, "days"),
    end = moment();
//TABLA
const tablaMovimientos = async (start, end) => {
    const query = await $.ajax({
        url: `php/inventario/movimientos.php?start=${start}&end=${end}`,
    });
    $("#PTable").html(query);
    $("#dataTable").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pdf','excel','print'
        ]
    });
};

//Reloj operaciones
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

tablaMovimientos(start.format("MM/DD/YYYY"), end.format("MM/DD/YYYY"));


$("#reportrange").on("apply.daterangepicker", function (t, a) {
    tablaMovimientos(
        a.startDate.format("MM/DD/YYYY"),
        a.endDate.format("MM/DD/YYYY")
    );
});

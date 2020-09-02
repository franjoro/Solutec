//Alertas
AlertaExito = () => {
    Swal.mixin({
        toast: !0,
        position: "top-end",
        showConfirmButton: !1,
        timer: 3e3,
        timerProgressBar: !0,
        onOpen: (e) => {
            e.addEventListener("mouseenter", Swal.stopTimer),
                e.addEventListener("mouseleave", Swal.resumeTimer);
        },
    }).fire({ icon: "success", title: "Operación exitosa" });
};
AlertaFallido = () => {
    Swal.mixin({
        toast: !0,
        position: "top-end",
        showConfirmButton: !1,
        timer: 3e3,
        timerProgressBar: !0,
        onOpen: (e) => {
            e.addEventListener("mouseenter", Swal.stopTimer),
                e.addEventListener("mouseleave", Swal.resumeTimer);
        },
    }).fire({ icon: "error", title: "Algo salio mal..." });
};

//Saldo Disponible
const saldoDisponible = async () => {
    const query = await $.ajax(`php/cajachica/saldodisponible.php`);
    $("#fondosDis").html(query);
};

const start = moment().subtract(29, "days"),
    end = moment();
//TABLA
const tablaCajaChica = async (start, end) => {
    const query = await $.ajax({
        url: `php/cajachica/tabla.php?start=${start}&end=${end}`,
    });
    $("#PTable").html(query);
    //   $("#dataTable").DataTable();
};

//INSERTAR
$("#CajaChicaForm").submit(async function (e) {
    try {
        e.preventDefault();
        const t = $(this).serialize();
        const query = await $.ajax({
            url: "php/cajachica/insert.php",
            type: "post",
            data: t,
            beforeSend: () => {
                $("#New_button").css("display", "none"),
                    $("#loader").removeClass("invisible").addClass("visible");
            },
        });
        if (query == "AllOk") {
            tablaCajaChica(start.format("MM/DD/YYYY"), end.format("MM/DD/YYYY"));
            saldoDisponible();
            AlertaExito();
            $("#New_button").css("display", "block");
            $("#loader").removeClass("visible").addClass("invisible");
            $("#CajaChicaForm")[0].reset();
        } else {
            throw query;
        }
    } catch (error) {
        console.log(error);
        AlertaFallido();
    }
});

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
tablaCajaChica(start.format("MM/DD/YYYY"), end.format("MM/DD/YYYY"));


$("#reportrange").on("apply.daterangepicker", function (t, a) {
    tablaCajaChica(
        a.startDate.format("MM/DD/YYYY"),
        a.endDate.format("MM/DD/YYYY")
    );
    console.log(a.startDate.format("DD/MM/YYYY"), a.endDate.format("DD/MM/YYYY"));
});

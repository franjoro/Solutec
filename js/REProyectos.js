const start = moment().subtract(29, "days"),
  end = moment(),
  loader = () => {
    Swal.fire({
      title: "Please Wait!",
      html: "Loading data",
      allowOutsideClick: !1,
      onBeforeOpen: () => {
        Swal.showLoading();
      },
    });
  },
  brProyectoToLocalS = async () => {
    let t = await $.ajax("empleados/php/getAllProyectos.php");
    localStorage.setItem("AllProyectos", t), swal.close();
  },
  fillSelectProyectos = () => {
    let t = localStorage.getItem("AllProyectos");
    t = JSON.parse(t);
    for (const e in t)
      $("#proj").append(`<option value="${e}">${t[e]}</option>`);
  };
$(function () {
  function t(t, e) {
    $("#reportrange span").html(
      t.format("MMMM D, YYYY") + " - " + e.format("MMMM D, YYYY")
    );
  }
  Swal.fire({
    title: "Please Wait!",
    html: "Loading data",
    allowOutsideClick: !1,
    onBeforeOpen: () => {
      Swal.showLoading();
    },
  }),
    $("#reportrange").daterangepicker(
      {
        startDate: start,
        endDate: end,
        ranges: {
          Today: [moment(), moment()],
          Yesterday: [
            moment().subtract(1, "days"),
            moment().subtract(1, "days"),
          ],
          "Last 7 Days": [moment().subtract(6, "days"), moment()],
          "Last 30 Days": [moment().subtract(29, "days"), moment()],
          "This Month": [moment().startOf("month"), moment().endOf("month")],
          "Last Month": [
            moment().subtract(1, "month").startOf("month"),
            moment().subtract(1, "month").endOf("month"),
          ],
        },
      },
      t
    ),
    t(start, end);
  const e = (t, e, a) =>
      $("#order_data").DataTable({
        dom: "Bfrtip",
        buttons: ["excel", "pdf", "print"],
        destroy: !0,
        ajax: {
          url: `php/reportes/AllProyectos.php?filter=empleados&start_date=${t.format(
            "MM/DD/YYYY"
          )}&end_date=${e.format("MM/DD/YYYY")}&codePro=${a}`,
          dataSrc: "",
        },
        columnDefs: [
          { title: "Bill Name/Number", targets: 0 },
          { title: "Provider Name", targets: 1 },
          { title: "Total Cost", targets: 2 },
          { title: "Project Name", targets: 3 },
        ],
        columns: [
          { data: "Name_Empleado", name: "WorkZone" },
          { data: "TotalH", name: "Total" },
          { name: "Salary", data: "Salary" },
          { name: "Salary1", data: "Salary1" },
        ],
        order: [[1, "asc"]],
      }),
    a = new Promise((t, a) => {
      e(start, end, "All");
    }),
    o = new Promise((t, e) => {
      brProyectoToLocalS();
    });
  Promise.all([a, o]).then(fillSelectProyectos());
  let r = start,
    n = end;
  $("#proj").change(() => {
    const t = $("#proj").children("option:selected").val();
    e(r, n, t);
  }),
    $("#reportrange").on("apply.daterangepicker", function (t, a) {
      (r = a.startDate),
        (n = a.endDate),
        $("#order_data").DataTable().destroy();
      const o = $("#proj").children("option:selected").val();
      1 == s ? e(a.startDate, a.endDate, o) : m(a.startDate, a.endDate);
    });
  let s = 1;
  $("#filter1").click(function () {
    d(1, 2),
      $("#selector").removeClass("d-none"),
      (s = 1),
      e(start, end, "All");
  }),
    $("#filter2").click(function () {
      d(2, 1), $("#selector").addClass("d-none"), (s = 2);
    });
  let l = !1;
  const d = (t, e) => {
      $("#filter" + t)
        .removeClass("btn-info")
        .addClass("btn-success"),
        $("#filter" + e)
          .removeClass("btn-success")
          .addClass("btn-info"),
        $("#div_" + t).removeClass("d-none"),
        $("#div_" + e).addClass("d-none"),
        l || m(start, end);
    },
    m = (t, e) => {
      (l = !0),
        $("#order_data2").DataTable({
          dom: "Bfrtip",
          buttons: ["excel", "pdf", "print"],
          destroy: !0,
          ajax: {
            url: `php/reportes/AllProyectos.php?filter=proyectos&start_date=${t.format(
              "MM/DD/YYYY"
            )}&end_date=${e.format("MM/DD/YYYY")}`,
            dataSrc: "",
          },
          columnDefs: [
            { title: "Provider Name", targets: 0 },
            { title: "Total Payed", targets: 1 },
          ],
          columns: [
            { data: "Name_Proyecto", name: "WorkZone" },
            { data: "code", name: "code" },
          ],
          order: [[1, "asc"]],
        });
    };
});

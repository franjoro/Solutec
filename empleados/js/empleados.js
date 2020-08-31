const PutTimePicker = () => {
    $(".entrada").timepicker({
      timeFormat: "HH:mm",
      interval: 30,
      startTime: "6:00am",
      dynamic: !1,
      dropdown: !1,
      defaultTime: "now",
    }),
      $(".salida").timepicker({
        timeFormat: "HH:mm",
        interval: 30,
        startTime: "6:00am",
        dynamic: !1,
        dropdown: !1,
        defaultTime: "now",
      });
  },
  loader = () => {
    Swal.fire({
      title: "Please Wait!",
      html: "Loading data",
      allowOutsideClick: !1,
      onBeforeOpen: () => {
        Swal.showLoading();
      },
    });
  };
let numeroTotal = 1,
  ShowIfExistSomething = !1;
const NewWork = () => {
    ShowIfExistSomething = !1;
    let t = `<tr><td>${numeroTotal}</td>\n                                    <td>\n                                        <div class="form-group input-group-sm">\n                                            <select name="proyecto" class="form-control" id="proyecto">\n                                            </select>\n                                        </div>\n                                    </td>\n                                    <td>\n                                        <div class="input-group input-group-sm mb-3">\n                                            <input placeholder="Entry Hour" type="text" class="form-control entrada"\n                                                name="entrada" id="entrada" />\n                                        </div>\n                                        <div class="form-group input-group-sm">\n                                            <button type="button" class="btn btn-primary btn-sm" onclick="insertarEntrada()">\n                                                Save\n                                            </button>\n                                        </div>\n                                    </td>\n                                </tr>`;
    return $("#turno").append(t);
  },
  WorkToRegiOut = (t, e) => {
    let o = `  \n                                <tr>\n                                    <td>${t}</td>\n                                    <td>\n                                        <h5>Work in progress... Don't forget to record your departure time</h5>\n                                        <p>Project: ${e.name}</p>\n                                        <p>Entry Hour: ${e.startime}</p>\n                                    </td>\n                                    <td>\n                                        <div class="input-group input-group-sm mb-3">\n                                            <input placeholder="Exit Hour" type="text" class="form-control salida"\n                                                name="salida" id="salida"  />\n                                        </div>\n                                        <div class="form-group input-group-sm">\n                                            <button type="button" class="btn btn-primary btn-sm" onclick="insertarSalida(${e.code}, '${e.startime}')" >\n                                                Save\n                                            </button>\n                                        </div>\n                                    </td>\n                                </tr> `;
    return $("#turno").append(o);
  },
  WorkDone = (t, e) => {
    let o = `           <tr>\n                                    <td>${t}</td>\n                                    <td colspan="2">\n                                        <h5 class="text-success"> <i class="fas fa-clipboard-check"></i> Work Done Today</h5>\n                                        <p>Project: ${e.name}</p>\n                                        <p>Entry Hour: ${e.startime}</p>\n                                        <p>Exit Hour: ${e.endtime}</p>\n                                    </td>\n                                </tr>`;
    return $("#turno").append(o);
  },
  getTodayDate = () => {
    let t = new Date();
    return `${("0" + (t.getMonth() + 1)).slice(-2)}/${String(
      t.getDate()
    ).padStart(2, "0")}/${t.getFullYear()}`;
  };
$("#newbtn").click(() => {
  return ShowIfExistSomething && NewWork(), PutTimePicker();
  Swal.fire({
    icon: "warning",
    title: "Oops...",
    text: "you have to close your current job to start another!",
  });
});
const NumeroDeTrabajoToday = () => {
    Swal.fire({
      title: "Please Wait!",
      html: "Loading data",
      allowOutsideClick: !1,
      onBeforeOpen: () => {
        Swal.showLoading();
      },
    }),
      $.ajax({ url: "php/cantidad.php?date=" + getTodayDate() }).done((t) => {
        const e = (t = JSON.parse(t)).num;
        let o,
          a,
          n = 0;
        if (
          (0 === e && NewWork(),
          e > 0 &&
            t.data.forEach((t, e) => {
              let r = t.totalhoras.split(":");
              r[0] >= 1 && ((o = t.code), (a = t.totalhoras)),
                (n = Number(n) + Number(60 * r[0]) + Number(r[1])),
                (numeroTotal = e + 1),
                0 == t.status && WorkToRegiOut(e + 1, t),
                1 == t.status &&
                  (WorkDone(e + 1, t),
                  (ShowIfExistSomething = !0),
                  numeroTotal++);
            }),
          n >= 300)
        ) {
          localStorage.getItem("almuerzo") === getTodayDate()
            ? $("#botones").append(
                '<button class="btn btn-success"> <i class="fas fa-clipboard-check"></i> Lunch entered</button>'
              )
            : $("#botones").append(
                `<button class="btn btn-info" onclick="newAlmuerzo('${o}', '${a}')">Add lunch time</button>`
              );
        }
        PutTimePicker();
      });
  },
  newAlmuerzo = (t, e) => {
    Swal.fire({
      title: "How old are you?",
      icon: "question",
      input: "range",
      inputAttributes: { min: 25, max: 60, step: 1 },
      inputValue: 25,
      preConfirm: async (o) => {
        e = e.split(":");
        let a = Number(60 * e[0]) + Number(e[1]);
        nuevotiempo = ((a - o) / 60).toFixed(2).split(".");
        let n = Math.round(0.6 * Number(nuevotiempo[1])),
          r = `${nuevotiempo[0]}:${n}`;
        await $.ajax({
          url: "../php/edit.php",
          type: "POST",
          data: { tabla: "tb_labor", columna: "totalhoras", campo: r, code: t },
        });
        localStorage.setItem("almuerzo", getTodayDate()), location.reload();
      },
    });
  };
$(document).ready(function () {
  Swal.fire({
    title: "Please Wait!",
    html: "Loading data",
    allowOutsideClick: !1,
    onBeforeOpen: () => {
      Swal.showLoading();
    },
  }),
    $.ajax({ url: "php/cantidad.php?date=" + getTodayDate() }).done((t) => {
      const e = (t = JSON.parse(t)).num;
      let o,
        a,
        n = 0;
      0 === e && NewWork(),
        e > 0 &&
          t.data.forEach((t, e) => {
            let r = t.totalhoras.split(":");
            r[0] >= 1 && ((o = t.code), (a = t.totalhoras)),
              (n = Number(n) + Number(60 * r[0]) + Number(r[1])),
              (numeroTotal = e + 1),
              0 == t.status && WorkToRegiOut(e + 1, t),
              1 == t.status &&
                (WorkDone(e + 1, t),
                (ShowIfExistSomething = !0),
                numeroTotal++);
          }),
        n >= 300 &&
          (localStorage.getItem("almuerzo") === getTodayDate()
            ? $("#botones").append(
                '<button class="btn btn-success"> <i class="fas fa-clipboard-check"></i> Lunch entered</button>'
              )
            : $("#botones").append(
                `<button class="btn btn-info" onclick="newAlmuerzo('${o}', '${a}')">Add lunch time</button>`
              )),
        PutTimePicker();
    }),
    $("#fecha").text(getTodayDate());
});
let banderaDown = !1;
$("#turno").on("focus", "#proyecto", function () {
  if (banderaDown) return;
  let t = localStorage.getItem("proyectos");
  t = JSON.parse(t);
  for (const e in t)
    $("#proyecto").append(`<option value="${e}">${t[e]}</option>`);
  banderaDown = !0;
});
const brProyectoToLocalS = async () => {
    let t = await $.ajax("php/ObtenerProyecto.php");
    localStorage.setItem("proyectos", t), swal.close();
  },
  calculardiferencia = (t, e) => {
    var o = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;
    if (!t.match(o) || !e.match(o)) return;
    var a = t.split(":").reduce((t, e) => 60 * parseInt(t) + parseInt(e)),
      n = e.split(":").reduce((t, e) => 60 * parseInt(t) + parseInt(e));
    if (n < a) return;
    var r = n - a,
      i = r % 60;
    return Math.floor(r / 60) + ":" + (i < 10 ? "0" : "") + i;
  },
  insertarEntrada = () => {
    const t = $("#entrada").val(),
      e = $("#proyecto").children("option:selected").val();
    if ("" === t || "x" === e) return alert("Fill information correctly");
    Swal.fire({
      title: "Are you sure?",
      text: "you are going to record your work hours",
      icon: "info",
      showCancelButton: !0,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes!",
    }).then((o) => {
      o.value &&
        $.ajax({
          type: "POST",
          url: "php/insertarEntrada.php?date=" + getTodayDate(),
          data: { entrada: t, selectedProject: e },
        }).done((t) => {
          Swal.fire(
            "OK",
            "Don't forget to record your departure time",
            "success"
          ).then(() => {
            location.reload();
          });
        });
    });
  },
  insertarSalida = (t, e) => {
    const o = $("#salida").val(),
      a = calculardiferencia(e, o);
    if ("" === t) return alert("Fill information correctly");
    Swal.fire({
      title: "Are you sure?",
      text: "you are going to record your departure",
      icon: "info",
      showCancelButton: !0,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes!",
    }).then((e) => {
      e.value &&
        $.ajax({
          type: "POST",
          url: "php/insertarSalida.php?date=" + getTodayDate(),
          data: { code: t, salida: o, horas: a },
        }).done((t) => {
          Swal.fire("OK", "Work Done", "success").then(() => {
            location.reload();
          });
        });
    });
  };
$("#change").click(() => {
  const t = JSON.stringify($("#change").data().id);
  Swal.fire({
    title: "Change my password",
    text: "Here you can edit your password ",
    input: "password",
    inputValue: $(this).text(),
    icon: "info",
    showCancelButton: !0,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, edit it!",
  }).then((e) => {
    e.value &&
      $.ajax({
        url: "php/password.php?FromEmpleado=" + e.value + "&id=" + t,
      }).done(() => {
        Swal.fire(
          "OK",
          "Don't forget to start next time with your new password",
          "success"
        );
      });
  });
});

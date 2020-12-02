loader = () => {
  Swal.fire({
    title: "Por favor, Espere",
    html: "Cargando Data",
    allowOutsideClick: !1,
    onBeforeOpen: () => {
      Swal.showLoading();
    },
  });
};

SobreValorAlerta = () => {
  Swal.fire({
    icon: "error",
    title: "Oops...",
    text:
      "Parece que no tienes en existencia la cantidad seleccionada en este producto, Verifica",
  });
};

AlertaDeVacio = () => {
  Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "Parece que tienes un dato necesario sin llenar, Verifica",
  });
};

let total = 0;
let itineracion = 0;

$.urlParam = function(name) {
  var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
  return results[1] || 0;
}

fullTotal = (num) => {
  $("#total").text(currency(num).format());
};

let saveArr = [];

$("#formMateriales").submit(function (e) {
  e.preventDefault();
  loader();
  const data = $(this).serialize().split("&"),
    selector = $(".materiales").children("option:selected"),
    precio = selector.data().precio,
    cantDis = selector.data().existente,
    material = selector.text();
  let obj = { precio: precio };
  for (var key in data) {
    obj[data[key].split("=")[0]] = data[key].split("=")[1];
  }
  if (cantDis < obj.cantidad) {
    SobreValorAlerta();
  } else {
    totalTemp = currency(obj.precio).multiply(obj.cantidad);
    saveArr[itineracion] = {
      cantidad: obj.cantidad,
      total: totalTemp.format(),
      code: selector.val(),
      new: true
    };
    let html = `<tr data-totalr="${totalTemp}"  class="it${itineracion}" ><td><button onclick="deleteRow('${itineracion}')" class="btn "><i class="fas fa-trash"></i></button></td>   <td>${
      obj.cantidad
    }</td><td>${material}</td> <td>$${
      obj.precio
    }</td> <td>${totalTemp.format()}</td></tr>`;

    $("#tablaMateriales").append(html);
    total = currency(total).add(totalTemp);
    fullTotal(total);
    $("#formMateriales")[0].reset();
    $(".materiales").val(null).trigger("change");
    actualizarPrecios();
    itineracion = itineracion + 1;
  }
  swal.close();
});

deleteRow = (it) => {
  itineracion = itineracion - 1;
  total = currency(total - $(".it" + it).data().totalr);
  $(".it" + it).remove();
  actualizarPrecios();
  fullTotal(total);
  saveArr.splice(it, 1);
};

deleteRowPermanente = (it,code) => {
  Swal.fire({
    title: "¿Estas seguro?",
    text:
      "No sera posible revertir esta acción , Se removera el material utilizado",
    icon: "warning",
    showCancelButton: !0,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Borrar",
  }).then((t) => {
    if (t.value) {
      itineracion = itineracion - 1;
      total = currency(total - $(".it" + it).data().totalr);
      $(".it" + it).remove();
      actualizarPrecios();
      fullTotal(total);
      saveArr.splice(it, 1);
      uNeta = $("#utilidadNeta").val(),
      UTec = $("#utilidadTec").val(),
      upcode = $.urlParam('id');
      $.ajax({
          url: "php/ordenes/eliminarMaterial.php?id=" + code,
          data: {neta:uNeta, tec:UTec,upcode:upcode },
          type:"POST"
      }).done((data) => {
          Swal.fire("Eliminado")
      });
    }
  });
};

$("#precioCliente").change(function () {
  actualizarPrecios();
});

$("#utilidadNetaPor").change(function () {
  actualizarPrecios();
});


$("#gridCheck").click(function () {
  actualizarPrecios();
});

actualizarPrecios = () => {
  let precio;
  if ($("#gridCheck").is(":checked")) {
    precio = $("#precioCliente").val() - $("#precioCliente").val() * 0.13;
  } else {
    precio = $("#precioCliente").val();
  }
  let porcentajeTec  = ( $("#utilidadNetaPor").val() /100 );
  let porcentajeUti = ( (100- $("#utilidadNetaPor").val() ) /100);
  (tec = currency(currency(precio) * porcentajeTec ).format()),
    (utilidad = currency(currency(precio) * porcentajeUti ).format());
  $("#utilidadTec").val(tec);
  $("#utilidadNeta").val(utilidad);
};

add = async () => {
  loader();
  const cliente = $("#cliente").children("option:selected").val(),
    Namecliente = $("#cliente").children("option:selected").text(),
    precio = $("#precioCliente").val(),
    tecnico = $("#tecnico").children("option:selected").val(),
    uNeta = $("#utilidadNeta").val(),
    UTec = $("#utilidadTec").val(),
    factura = $("#factura").val(),
    pago = $("#pago").children("option:selected").val(),
    iva = $("#gridCheck").is(":checked"),
    estado = $("#estado").children("option:selected").val(),
    //----
    trabajo = $("#trabajoR").val(),
    articulo = $("#articulo").children("option:selected").val(),
    marca = $("#marca").val(),
    date = $("#datepicker").val(),
    falla = $("#falla").val(),
    porcentaje = $("#utilidadNetaPor").val();
  if (
    cliente == 0 ||
    tecnico == 0 ||
    validate.isEmpty(precio) ||
    validate.isEmpty(uNeta) ||
    validate.isEmpty(UTec)
  ) {
    return AlertaDeVacio();
  }

  const query1 = await $.ajax({
    url: "php/ordenes/addMain.php?id=1",
    type: "POST",
    data: { cliente, precio, tecnico, uNeta, UTec, iva, estado,factura,pago, porcentaje },
  });
  console.log(query1);
  const queries = await Promise.all([
    $.ajax({
      url: "php/ordenes/addMain.php?id=2",
      type: "POST",
      data: { trabajo, articulo, marca, date, falla, query1 },
    }),
    $.ajax({
      url: `php/ordenes/addMain.php?id=3&code=${query1}&date=${date}&cliente=${Namecliente.trim()}`,
      type: "POST",
      data: { data: saveArr },
    }),
  ]).then((d) => {
    swal.close();
    return (window.location.href = "showOrdenes.php");
  });
};

edit = async () => {
  upcode = $.urlParam('id');
  loader();
  const cliente = $("#cliente").children("option:selected").val(),
    Namecliente = $("#cliente").children("option:selected").text(),
    precio = $("#precioCliente").val(),
    tecnico = $("#tecnico").children("option:selected").val(),
    uNeta = $("#utilidadNeta").val(),
    UTec = $("#utilidadTec").val(),
    iva = $("#gridCheck").is(":checked"),
    factura = $("#factura").val(),
    pago = $("#pago").children("option:selected").val(),
    estado = $("#estado").children("option:selected").val(),
    //----
    trabajo = $("#trabajoR").val(),
    articulo = $("#articulo").children("option:selected").val(),
    marca = $("#marca").val(),
    date = $("#datepicker").val(),
    falla = $("#falla").val();
    porcentaje = $("#utilidadNetaPor").val();
  if (
    cliente == 0 ||
    tecnico == 0 ||
    validate.isEmpty(precio) ||
    validate.isEmpty(uNeta) ||
    validate.isEmpty(UTec)
  ) {
    return AlertaDeVacio();
  }

  console.log(saveArr)
  const queries = await Promise.all([
    $.ajax({
      url: "php/ordenes/editO.php?id=1",
      type: "POST",
      data: { cliente, precio, tecnico, uNeta, UTec, iva, estado, upcode, factura, pago, porcentaje },
    })
    ,$.ajax({
      url: "php/ordenes/editO.php?id=2",
      type: "POST",
      data: { trabajo, articulo, marca, date, falla, upcode },
    }),
    $.ajax({
      url: `php/ordenes/editO.php?id=3&date=${date}&cliente=${Namecliente.trim()}`,
      type: "POST",
      data: { data: saveArr , upcode},
    }),
  ]).then((d) => {
    swal.close();
    return (window.location.href = "showOrdenes.php");
  });
};

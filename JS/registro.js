const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll("#formulario input");

const expresiones = {
  nombre: /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/i,
  correo:
    /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i,
  telefono: /5(6|5)\d{8}/gm,
};
const campos = {
  nombre: false,
  apellido: false,
  correo: false,
  contraseña: false,
  telefono: false,
};
const validarformulario = (e) => {
  switch (e.target.name) {
    case "name":
      if (expresiones.nombre.test(e.target.value)) {
        campos["nombre"] = true;
      } else {
        campos["nombre"] = false;
      }
    case "lastName":
      if (expresiones.nombre.test(e.target.value)) {
        campos["apellido"] = true;
      } else {
        campos["apellido"] = false;
      }
    case "mail":
      if (expresiones.correo.test(e.target.value)) {
        campos["correo"] = true;
      } else {
        campos["correo"] = false;
      }
    case "pass":
      if (e.target.value.length != 0) {
        campos["contraseña"] = true;
      } else {
        campos["contraseña"] = false;
      }
    case "number":
      if (expresiones.telefono.test(e.target.value)) {
        campos["telefono"] = true;
      } else {
        campos["telefono"] = false;
      }
  }
};
inputs.forEach((input) => {
  input.addEventListener("keyup", validarformulario);
});
formulario.addEventListener("submit", (e) => {
  e.preventDefault();
  if (
    campos.nombre &&
    campos.apellido &&
    campos.correo &&
    campos.contraseña &&
    campos.telefono
  ) {
    formulario.submit();
  } else {
    Swal.fire("Error", "Verificar los campos", "error");
  }
});

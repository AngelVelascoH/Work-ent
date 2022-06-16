const botonCompra = document.querySelector(".boton-compra");

botonCompra.onclick = function (e) {
  e.preventDefault();
  Swal.fire({
    title: "Confirmar",
    icon: "question",
    text: "Al confirmar, se le proporcionaran sus datos al trabajador para que se ponga en contacto con usted.",
    confirmButtonText: "Continuar",
  }).then((result) => {
    if (result.isConfirmed) {
    }
  });
};

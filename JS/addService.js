const add_button = document.getElementById("add-service");
const check_service = document.getElementById("check-service");
add_button.onclick = function () {
  Swal.fire({
    title: "Nuevo Servicio",
    html: `<form id="register-form" action="/PHP/work-registration.php" method="post"  enctype="multipart/form-data">
    <input type="text" id="name" name="name" class="swal2-input" placeholder="Nombre del servicio">
<textarea  id="description" name="description" class="swal2-textarea" placeholder="Descripción"></textarea>
<input type="number" id="price" name="price" class="swal2-input"  min="10" max="5000" step=".50"  placeholder="Precio">
<label for="image" class="swal2-input-label">Imágen</label>
  <input type="file" name="image" id="image" placeholder="Imágen" class="swal2-file">
  </form>`,
    confirmButtonText: "Registrar Servicio",
    focusConfirm: false,
    preConfirm: () => {
      const name = Swal.getPopup().querySelector("#name").value;
      const description = Swal.getPopup().querySelector("#description").value;
      const price = Swal.getPopup().querySelector("#price").value;
      const image = Swal.getPopup().querySelector("#image").value;
      const form = Swal.getPopup().querySelector("#register-form");
      if (!name || !description || !price || !image) {
        Swal.showValidationMessage(`Asegurese de llenar todos los campos`);
      } else {
        form.submit();
      }
    },
  }).then((result) => {
    console.log(result);
  });
};
check_service.onclick = function () {
  window.location = "perfil-trabajador.php";
};

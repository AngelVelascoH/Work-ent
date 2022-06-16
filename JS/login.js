const formulario = document.getElementById("formulario-login");

formulario.addEventListener("submit", (e) => {
  e.preventDefault();
  $("#formulario-login").ajaxSubmit({
    url: "/PHP/a.php",
    type: "POST",
    success: function (response) {
      if (response == "1") {
        Swal.fire({
          title: "Error",
          text: "Correo o contraseña incorrectos",
          icon: "error",
        });
      }
      if (response == "2") {
        location.href = "PHP/feed.php";
      }
      if (response == "3") {
        location.href = "PHP/worker-app.php";
      } else {
        Swal.fire({
          title: "Error",
          text: "Correo o contraseña incorrectos",
          icon: "error",
        });
      }
    },
    error: function () {
      Swal.fire({
        title: "Error",
        text: "Error interno, por favor, vuelva a intentarlo",
        icon: "error",
      });
    },
  });
});

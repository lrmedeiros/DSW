console.log("aqui");

$("#loginForm").submit(function (event) {
  event.preventDefault();
  window.location.replace("/src/pages/Kanban/index.html");
});

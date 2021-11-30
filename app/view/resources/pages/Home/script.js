$("#loginForm").submit(function (event) {
  console.log("AQUI");
  const email = emailInput.value;
  const password = passwordInput.value;

  const result = await fetch("http://localhost:3333/projectManagement/", {
    method: "POST",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ email, password }),
  });

  event.target.preventDefault();

  console.log({ result });
});

const emailInput = document.querySelector("#email");
const passwordInput = document.querySelector("#password");
const registerSubmit = document.querySelector("#register-submit");

registerSubmit.addEventListener("click", async () => {
  const email = emailInput.value;
  const password = passwordInput.value;

  await fetch("http://localhost:3333/projectManagement/register", {
    method: "POST",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ email, password }),
  });
});

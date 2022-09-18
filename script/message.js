const submit = document.querySelector("#submit");
const name = document.querySelector("#name");
const phone = document.querySelector("#phone");
const email = document.querySelector("#email");
const message = document.querySelector("#message");

submit.onclick = (e) => {
  e.preventDefault();
  const body = JSON.stringify({
    name: name.value,
    email: email.value,
    phone: phone.value,
    message: message.value,
  });
  axios
    .post(
      "https://bllcg3cwp7.execute-api.us-east-1.amazonaws.com/prod/contact",
      body,
      {
        headers: {
          ContentType: "application/json",
        },
      }
    )
    .then((res) => {
      document.getElementById("success").style.display = "block";
      document.getElementById("fail").style.display = "none";
    })
    .catch((err) => {
      document.getElementById("fail").style.display = "block";
      document.getElementById("success").style.display = "none";
    });
};

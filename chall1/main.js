email = document.querySelector("#mail");
validator = document.querySelector("#validator");

email.addEventListener("input", () => {
  validator.value = 0;
  text = email.value;
  error = document.querySelector(".error");
  error.innerHTML = "";
  if (text.includes(" ")) {
    error.innerHTML += "ur e-mail should not contain a space <br/> ";
    validator.value = 1;
  }
  if (!text.includes("@")) {
    error.innerHTML += "ur e-mail should  contain an @ <br/> ";
    validator.value = 1;
  }

  try {
    split = text.split("@");
    if (split[1].length == 0) {
      error.innerHTML += "not a valid e-mail <br/>";
      validator.value = 1;
    }

    if (!split[1].includes(".")) {
      error.innerHTML += "not a valid e-mail <br/>";
      validator.value = 1;
    }
  } catch (error) {
    console.error(error);
  }

  console.log(validator.value);
});

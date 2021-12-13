email = document.querySelector("#mail");

email.addEventListener("input", () => {
  text = email.value;
  error = document.querySelector(".error");
  error.innerHTML = "";
  if (text.includes(" ")) {
    error.innerHTML += "ur e-mail should not contain a space <br/> ";
  }
  if (!text.includes("@")) {
    error.innerHTML += "ur e-mail should  contain an @ <br/> ";
  }

  try {
    split = text.split("@");
    if (split[1].length == 0) {
      error.innerHTML += "not a valid e-mail <br/>";
    }

    if (!split[1].includes(".")) {
      error.innerHTML += "not a valid e-mail <br/>";
    }
  } catch (error) {
    console.error(error);
  }
});

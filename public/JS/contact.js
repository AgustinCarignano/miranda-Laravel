const form = document.getElementById("contactForm");
const modalBtn = document.getElementById("contactModalBtn");

form.addEventListener("keyup", (e) => {
  document
    .querySelector(`div[data-name=${e.target.name}]`)
    .classList.remove("pageContactForm__form__inputError");
});

if (modalBtn) {
  modalBtn.addEventListener("click", () => {
    document
      .getElementById("contactModal")
      .classList.add("pageContactForm__modalContainer-hidden");
  });
}

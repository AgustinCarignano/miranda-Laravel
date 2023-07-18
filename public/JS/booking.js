var form = document.getElementById("availabilityForm");
var modal = document.getElementById("availabilityModal");
var aceptBtn = document.getElementById("modalBtn");

form === null || form === void 0
  ? void 0
  : form.addEventListener("keyup", function (e) {
      e.target.classList.remove("pageContactForm__form__inputError");
    });
form === null || form === void 0
  ? void 0
  : form.addEventListener("change", function (e) {
      e.target.classList.remove("pageContactForm__form__inputError");
    });

aceptBtn === null || aceptBtn === void 0
  ? void 0
  : aceptBtn.addEventListener("click", function () {
      modal === null || modal === void 0
        ? void 0
        : modal.classList.add("pageDetailsAvailability__modalContainer-hidden");
    });

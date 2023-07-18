const form = document.getElementById("orderForm");
const modalBtn = document.getElementById("orderModalBtn");
const orderModal = document.getElementById("actionOrdersModal");
const editOrderForms = document.getElementsByClassName("editOrderForm");
const cancelOrderForms = document.getElementsByClassName("cancelOrderForm");
const repeatOrderForms = document.getElementsByClassName("repeatOrderForm");
const deleteOrderForms = document.getElementsByClassName("deleteOrderForm");
const deleteOrderModal = document.getElementById("deleteOrdersModal");
const deleteModalBtn = document.getElementById("deleteOrderModalBtn");
const cancelDeleteOrder = document.getElementById("cancelDeleteOrder");

form.addEventListener("keyup", (e) => {
    document
        .querySelector(`div[data-name=${e.target.name}]`)
        .classList.remove("pageOrderNew__form__inputError");
});
form.addEventListener("change", (e) => {
    document
        .querySelector(`div[data-name=${e.target.name}]`)
        .classList.remove("pageOrderNew__form__inputError");
});

if (modalBtn) {
    modalBtn.addEventListener("click", () => {
        document
            .getElementById("orderModal")
            .classList.add("pageContactForm__modalContainer-hidden");
    });
}

if (cancelOrderForms) {
    deleteFormBehaviour(cancelOrderForms);
}
if (deleteOrderForms) {
    deleteFormBehaviour(deleteOrderForms);
}

if (editOrderForms) {
    editFormBehaviour(editOrderForms, "editOrderModal");
}

if (repeatOrderForms) {
    editFormBehaviour(repeatOrderForms, "repeatOrderModal");
}

function deleteFormBehaviour(elementsList) {
    for (let i = 0; i < elementsList.length; i++) {
        elementsList[i].addEventListener("submit", (e) => {
            e.preventDefault();
            deleteOrderModal.classList.remove(
                "pageContactForm__modalContainer-hidden"
            );
            cancelDeleteOrder.addEventListener("click", () => {
                deleteOrderModal.classList.add(
                    "pageContactForm__modalContainer-hidden"
                );
            });
            deleteModalBtn.addEventListener("click", () => {
                elementsList[i].submit();
            });
        });
    }
}

function editFormBehaviour(elementsList, baseId) {
    for (let i = 0; i < elementsList.length; i++) {
        elementsList[i].addEventListener("submit", (e) => {
            e.preventDefault();
            const { orderid } = elementsList[i].dataset;
            const modal = document.getElementById(`${baseId}-${orderid}`);
            const cancelBtn = elementsList[i].querySelector(
                `#cancelModalButton_${orderid}`
            );
            const aceptlBtn = elementsList[i].querySelector(
                `#aceptlModalButton_${orderid}`
            );
            modal.classList.remove("pageContactForm__modalContainer-hidden");
            cancelBtn.addEventListener("click", (e) => {
                e.preventDefault();
                modal.classList.add("pageContactForm__modalContainer-hidden");
            });
            aceptlBtn.addEventListener("click", () => {
                elementsList[i].submit();
            });
        });
    }
}

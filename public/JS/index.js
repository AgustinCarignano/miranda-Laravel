"use strict";
//import Swiper from "swiper";
const swiper = new Swiper(".swiper", {
    direction: "horizontal",
    loop: true,
    pagination: {
        el: ".swiper-pagination",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        1000: {
            enabled: false,
            slidesPerView: 3,
            spaceBetween: 30,
        },
    },
});
//Swiper seccion facilities de la pagina about
const swiperAboutFacility = new Swiper(".swiperAboutFacility", {
    direction: "horizontal",
    loop: true,
    pagination: {
        el: ".swiperAboutFacility-pagination",
    },
    breakpoints: {
        1000: {
            slidesPerView: 3,
            spaceBetween: 30,
            grid: {
                rows: 2,
                fill: "row",
            },
            enabled: false,
        },
    },
});
//Swiper de la seccion counter de la pagina about
const swiperAboutCounter = new Swiper(".pageAboutCounter-swiper", {
    direction: "horizontal",
    loop: true,
    pagination: {
        el: ".pageAboutCounter-swiper-pagination",
    },
    breakpoints: {
        1000: {
            enabled: false,
            slidesPerView: 2,
            spaceBetween: 30,
        },
    },
});
//Swiper de la seccion related de la pagina room details
const swiperDetailRelated = new Swiper(".swiperPageDetail", {
    direction: "horizontal",
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        1000: {
            enabled: false,
            slidesPerView: 2,
            spaceBetween: 30,
        },
    },
});
// prueba de combinar archivos -----------------------------------------------
//Swiper de las habitaciones del home
if (document.body.id === "homePage") {
    const swiperRoom = new Swiper(".swiper", {
        direction: "horizontal",
        loop: true,
        pagination: {
            el: ".swiper-pagination",
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            1000: {
                allowTouchMove: false,
                loop: false,
            },
        },
    });
}
//Swiper de las facilities del home --------------------------------------------------------------
const swiperFacilities = new Swiper(".swiperFacility", {
    direction: "horizontal",
    loop: true,
    pagination: {
        el: ".swiperFacility-pagination",
    },
    breakpoints: {
        1000: {
            slidesPerView: 3,
            spaceBetween: 30,
            grid: {
                rows: 2,
                fill: "row",
            },
            enabled: false,
        },
    },
});
//Swiper de las opciones de menu ---------------------------------------------------------------
const swiperFoodMenues = new Swiper(".swiperFoodMenu", {
    direction: "horizontal",
    loop: true,
    pagination: {
        el: ".swiperFoodMenu-pagination",
    },
    navigation: {
        nextEl: ".swiperFoodMenu-button-next",
        prevEl: ".swiperFoodMenu-button-prev",
    },
    breakpoints: {
        1000: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
    },
});
//Swiper de imagenes relacionadas a las opciones de menu. -----------------------------------
const swiperMenuOptions = new Swiper(".swiperMenuOption", {
    direction: "horizontal",
    loop: true,
    pagination: {
        el: ".swiperMenuOption-pagination",
    },
    breakpoints: {
        1000: {
            slidesPerView: 3,
            spaceBetween: 30,
            enabled: false,
        },
    },
});
//Funcionalidad para cambiar las imagenes que se muestran en el slider de la seccion menu
if (document.body.id === "homePage") {
    //array de elementos del DOM - Opciones de menu -------------------------------------------------
    const foodOptions = [];
    for (let i = 1; i < 16; i++) {
        foodOptions.push(document.getElementById(`menuOption${i}`));
    }
    //Asignacion de evento "click" a cada elemento del array ---------------------------------------
    foodOptions.forEach((el) => {
        el === null || el === void 0
            ? void 0
            : el.addEventListener("click", () => {
                  const { path } = el.dataset;
                  const newSlides = [
                      `<div class="swiper-slide"><img class="menu__options__individualSlider-img" src="images/foodsMenu/${path}1.webp" alt="" /></div>`,
                      `<div class="swiper-slide"><img class="menu__options__individualSlider-img" src="images/foodsMenu/${path}2.webp" alt="" /></div>`,
                      `<div class="swiper-slide"><img class="menu__options__individualSlider-img" src="images/foodsMenu/${path}3.webp" alt="" /></div>`,
                  ];
                  showSelectedMenu(el.id);
                  swiperMenuOptions.removeAllSlides();
                  swiperMenuOptions.appendSlide(newSlides);
              });
    });
    //Funcion para agregar la clase "active" al elemento clickeado y restaurar las anteriores
    const showSelectedMenu = (id) => {
        foodOptions.forEach((el) => {
            if ((el === null || el === void 0 ? void 0 : el.id) === id) {
                el === null || el === void 0
                    ? void 0
                    : el.classList.add("menu__options-activeOption");
            } else {
                el === null || el === void 0
                    ? void 0
                    : el.classList.remove("menu__options-activeOption");
            }
        });
    };
}
function createDefaultSlides() {
    const defaultSlides = [
        `<div class="swiper-slide"><img class="menu__options__individualSlider-img" src="images/foodsMenu/eggsBacon1.webp" alt="" /></div>`,
        `<div class="swiper-slide"><img class="menu__options__individualSlider-img" src="images/foodsMenu/eggsBacon2.webp" alt="" /></div>`,
        `<div class="swiper-slide"><img class="menu__options__individualSlider-img" src="images/foodsMenu/eggsBacon3.webp" alt="" /></div>`,
    ];
    swiperMenuOptions.removeAllSlides();
    swiperMenuOptions.appendSlide(defaultSlides);
}
createDefaultSlides();

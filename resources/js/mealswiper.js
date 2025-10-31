import Swiper from "swiper";
import { Pagination, Autoplay } from "swiper/modules";
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/autoplay";

const swiper = new Swiper(".ProductSwiper", {
    modules: [Pagination],
    
    /* breakpoints:{
        400:{
            slidesPerView: 1,
        },
        768:{
            slidesPerView: 3,
        },
        1366:{
            slidesPerView: 6,
        },
    }, */
    grabCursor: true,     // ✅ Enables swipe-like cursor
    freeMode: true,
    slidesPerView: 'auto',
    spaceBetween: 8,
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
        clickable:true,
    },
});

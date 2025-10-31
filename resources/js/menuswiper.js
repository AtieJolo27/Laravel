import Swiper from 'swiper';
import { Pagination,Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/autoplay'

const swiper = new Swiper('.WallpaperSlideshow', {
  modules: [Pagination, Autoplay],
  centeredSlides: true,
  pagination: {
    el: '.swiper-pagination',
    dynamicBullets: true,
  },
  autoplay:{
    delay: 2500,
  
  },
});

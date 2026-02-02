$(document).ready(function () {
    // lozad
    const observer = lozad('.lozad', {
    loaded: function(el) {
            el.classList.add('loaded');
        }
    });
    observer.observe();
    // lozad


    const heroCardsSlider = new Swiper(".hero__cards", {
        slidesPerView: 1.2,
        spaceBetween: 14,
        breakpoints: {
            991: {
                slidesPerView: 3,
                spaceBetween: 8,
            },
            768: {
                slidesPerView: 2.1,
                 spaceBetween: 8,
            },
        },
    });

    const reviewsSlider = new Swiper(".reviews__swiper", {
        slidesPerView: 1.2,
        spaceBetween: 14,
        breakpoints: {
            991: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2.1,
                spaceBetween: 20,
            },
        },
        navigation: {
            nextEl: '.reviews__arrows .next',
            prevEl: '.reviews__arrows .prev',
        },
    });

    const offersSlider = new Swiper(".offers__swiper", {
        slidesPerView: 1.08,
        spaceBetween: 12,
        breakpoints: {
            991: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3.1,
                spaceBetween: 20,
            },
        },
    });

    const vendorsSlider = new Swiper(".vendors__swiper", {
        slidesPerView: 1.08,
        spaceBetween: 12,
        breakpoints: {
            991: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3.1,
                spaceBetween: 20,
            },
        },
    });

    if(window.innerWidth < 767) {
        const dataSystemSlider = new Swiper(".data-system__swiper", {
            slidesPerView: 1.084,
            spaceBetween: 12,
        });

        const cardsWaveSlider = new Swiper(".cards-wave__swiper", {
            slidesPerView: 1.084,
            spaceBetween: 12,
        });

        const infoBlockSlider = new Swiper(".info-block__item-side-swiper", {
            slidesPerView: 1.2,
            spaceBetween: 8,
        });
    }

    const clientsSliders = [];

    $(".clients__swiper").each(function(index) {
        const swiper = new Swiper(this, {
            slidesPerView: 'auto',
            speed: 10000,
            loop: true,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
            }
        });
    
        clientsSliders.push(swiper);
    
        $(this).mouseenter(function() {
            if (clientsSliders[index].autoplay.running) {
                clientsSliders[index].autoplay.stop();
            }
        });
    
        $(this).mouseleave(function() {
            if (!clientsSliders[index].autoplay.running) {
                clientsSliders[index].autoplay.start();
            }
        });
    });

    const solutionSlider = new Swiper(".solution__swiper", {
        slidesPerView: 1.2,
        spaceBetween: 14,
        breakpoints: {
            991: {
                slidesPerView: 5,
                spaceBetween: 14,
            },
            768: {
                slidesPerView: 2.1,
                 spaceBetween: 14,
            },
        },
    });

    const solutionFourSlider = new Swiper(".solution__swiper-four", {
        slidesPerView: 1.2,
        spaceBetween: 14,
        breakpoints: {
            991: {
                slidesPerView: 4,
                spaceBetween: 14,
            },
            768: {
                slidesPerView: 2.1,
                 spaceBetween: 14,
            },
        },
    });


    $(".input-mail").inputmask({
        mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
        greedy: false,
        onBeforePaste: function (pastedValue, opts) {
            pastedValue = pastedValue.toLowerCase();
            return pastedValue.replace("mailto:", "");
        },
        definitions: {
            "*": {
                validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~-]",
                casing: "lower",
            },
        },
    });
  

    // popup
     let lastFocusedElement; 

    function openPopup(popupId) {
        const popup = $('#' + popupId);
        if (popup.length === 0) return;

    lastFocusedElement = document.activeElement; 
        $('html').addClass('no-scroll');
        $('.popup').fadeOut(350); 
        popup.fadeIn(350, function() {
            popup.find('.popup__close').focus();
        });
    }

    function closePopups() {
        $('.popup').fadeOut(350);
        $('html').removeClass('no-scroll');
        if (lastFocusedElement) {
            lastFocusedElement.focus(); 
        }
    }

    $('.popup-open').on('click', function (e) {
        e.preventDefault();
        let openLink = $(this).attr('href').replace('#', '');
        openPopup(openLink);
    });

    $('.reviews__item-content-more').on('click', function(e) {
        e.preventDefault();
        const sourceReview = $(this).closest('.reviews__item');
        const title = sourceReview.find('.reviews__item-title').text();
        const content = sourceReview.find('.reviews__item-content-text').html(); 
        const author = sourceReview.find('.reviews__item-auth').text();
        
        const reviewPopup = $('#review');
        reviewPopup.find('.reviews__item-title').text(title);
        reviewPopup.find('.reviews__item-content-text').html(content);
        reviewPopup.find('.reviews__item-auth').text(author);

        openPopup('review'); 
    });
    
    $('.popup__close, .popup__shade').on('click', function () {
        closePopups();
    });

    $(document).on('keydown', function(e) {
        if (e.key === "Escape") {
            closePopups();
        }
    });
    

    // popup


    $('.lang__head').on('click', function() {
        const isActive = $(this).toggleClass('is-active').hasClass('is-active');
        $(this).attr('aria-expanded', isActive); 
        $(this).parent().find('.lang__body').slideToggle();
    });

    

    if (innerWidth > 768) {
        $('.header__nav-item.with-sub > a').on('focus mouseenter', function() {
            const parentLi = $(this).parent();
            $('.header__nav-item.with-sub').not(parentLi).find('.header__nav-item-sub').slideUp(0);
            $('.header__nav-item.with-sub > a').not(this).attr('aria-expanded', 'false');

            parentLi.find('.header__nav-item-sub').slideDown();
            $(this).attr('aria-expanded', 'true');
        });

        $('.header__nav').on('mouseleave', function() {
            $('.header__nav-item-sub').slideUp(0);
            $('.header__nav-item.with-sub > a').attr('aria-expanded', 'false');
        });
    } else {
        $('.header__nav-item.with-sub > a').on('click', function(e) {
            e.preventDefault();
            const parentLi = $(this).parent();
            const isActive = parentLi.toggleClass('is-active').hasClass('is-active');
            $(this).attr('aria-expanded', isActive);
            parentLi.find('.header__nav-item-sub').slideToggle();
        });
    }

    if (innerWidth < 769) {
        $('.header__burger').on('click', function() {
            const isActive = $(this).toggleClass("is-active").hasClass('is-active');
            $(this).attr('aria-expanded', isActive);
            $('.header__menu').toggleClass("is-active");
            $('body').toggleClass('no-scroll');
        });

        $('.footer__nav-col-head').on('click', function() {
            const isActive = $(this).toggleClass("is-active").hasClass('is-active');
            $(this).next().slideToggle();
        });
    }
   

    $(".js-anchor").on('click', function(e) {
        e.preventDefault();

        // animate
        $('html, body').animate({
            scrollTop: $(this.hash).offset().top - 120
          }, 300, function(){
          });
     });
    
});



document.addEventListener('DOMContentLoaded', () => {

    const feedbackPopup = document.getElementById('feedback');
    if (!feedbackPopup) {
        console.error('Элемент с ID "feedback" не найден!');
        return; 
    }
    const form = feedbackPopup.querySelector('.cta__form');
    const title = feedbackPopup.querySelector('.cta__title');
    const description = feedbackPopup.querySelector('.cta__descr');

    if (!form || !title || !description) {
        console.error('Не удалось найти форму, заголовок или описание внутри #feedback.');
        return;
    }

    form.addEventListener('submit', (event) => {
        event.preventDefault();

        if (form.checkValidity()) {
            console.log('Форма валидна. Отправляем...');

            title.textContent = 'Message sent';

            description.textContent = 'You will be contacted shortly.';
            
            form.style.display = 'none';

        } else {
            console.log('Форма невалидна. Проверьте поля.');
        }
    });
});

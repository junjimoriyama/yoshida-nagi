// テスト
console.log('test2')


/* ========================== spのnavmenu表示 ===========================*/
const menuBtn = document.querySelector('.menu-btn'),
      navSp = document.querySelector('.nav-sp'),
      menuSp = document.querySelector('.menu-sp')

        menuBtn.addEventListener('click', () => {
        navSp.classList.toggle('open'),
        menuSp.classList.toggle('open');
      });



/* ============================= swiper ================================*/

// work swipr
const mainSwiper = new Swiper('.main-swiper', {
  loop: false,
  speed: 1000,
  effect: 'fade',
});


// work list
const subImgList = document.querySelectorAll('.sub-img li')
subImgList.forEach((el, index) => {
  el.addEventListener('click', () => {
    mainSwiper.slideTo(index);
  })
})

/* news swipr */
const newsSwiper = new Swiper(".newsSwiper", {
  slidesPerView: 1,
  spaceBetween: 30,
  slidesPerGroup: 1,
  loop: true,
  loopFillGroupWithBlank: true,

  breakpoints: {
    769: {
      slidesPerView: 2,
      slidesPerGroup: 2,
    },
    1000: {
      slidesPerView: 3,
      slidesPerGroup: 3,
    }
  },

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

/* ========================== 一文字ずつ表示 ===========================*/

const titleEl = document.querySelectorAll('.title');
for (let i = 0; i < titleEl.length; i++) {
  const titleTargetEl = titleEl[i],
  text = titleTargetEl.textContent,
  textsArray = [];

  // 一度、取得した文字列を空にする
  titleTargetEl.textContent = '';
  // １文字ずつ取得
  for (let j = 0; j < text.split('').length; j++ ) {
  // １文字ずつspanタグを付けてtextsArrayに戻す
    if(text.split('')[j] === ' ') {
      textsArray.push(' ');
    } else {
      textsArray.push('<span style="animation-delay: ' + (j * .1) + 's;">' + text.split('')[j] + '</span>')
    }
  }
  // spanタグが付いたtextsArrayをHTMLに全て戻す
  for (let k = 0; k < textsArray.length; k++) {
    titleTargetEl.innerHTML += textsArray[k];
  }
}


/* ========================== spのnavmenu表示 ===========================*/

// スクロールしたら現れる

const apperTopBtn = document.querySelector('.top-btn')
const ignitionEl = document.querySelector('.text-en')
document.addEventListener('scroll', () => {
  const ignitionDistance = ignitionEl.getBoundingClientRect().top
  if (window.innerHeight > ignitionDistance) {
    apperTopBtn.classList.add("show");
  };
});

// クリックしたらtopに戻る
const scrollTopBtn = document.querySelector('.top-btn')
scrollTopBtn.addEventListener('click', () => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  })
});


/* ========================== sp workのクリックした場合の表示枚数追加 ===========================*/
// もし画面幅が768px以下だったら
if(window.innerWidth <= 768) {
  // portfolioのli全ての要素を取得して変数imgListに入れる。
  const imgList = document.querySelectorAll('.sub-img .portfolio li'),
  // 初めに見せる写真の枚数
        firstShow = 5,
  // 加えていく写真の枚数
        addShow = 1
  // imgListの数分、for文で回す
  for (let i = 0; i < imgList.length; i++) {
  // もしfirstShowの枚数よりi番目の数が多い場合
    if (i >= firstShow) {
  // 以降の写真は非表示にする
      imgList[i].style.display = 'none'
    }
  }

  // firstShowを変数currentNumberへ代入する
  let currentNumber = firstShow /* 代入する理由 */
  // id指定したmore要素を取得し、クリックイベントを追加
  document.getElementById('more').addEventListener('click', function() {
  // currentNumberにaddShowで定義した枚数分加えていく
    currentNumber += addShow
  // currentNumberの数分、for文で回す
    for (let i = firstShow - 1; i < currentNumber; i++) {
  
      imgList[i].style.display = ''
      /* imgList[4].style.display = ''
      imgList[5].style.display = ''
      imgList[6].style.display = ''
      imgList[7].style.display = '' */
    }
  // もしimgList(全ての枚数)がcurrentNumber（表示された枚数）以下になれば
    if (imgList.length <= currentNumber) {
  // this(more要素)を非表示にする
      this.style.display = 'none'
    }
  })
}

// imgList: 全ての写真の数
// currentNumber: 現時点で表示される写真の数
// this: more要素
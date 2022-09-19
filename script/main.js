const animatedComponents = {
  "hero-wrapper": "flyLeftAnimation",
  "hero-image": "flyRightAnimation",
  image: "flyLeftAnimation",
  "image-2": "flyRightAnimation",
  "image-3": "flyLeftAnimation",
  "small-margin": "flyUpAnimation",
  "data-wrapper": "flyUpAnimation",
  "left-grid": "flyUpAnimation",
  "contact-form": "zoomAnimation",
  "collection-list": "zoomAnimation",
};

const classKeys = Object.keys(animatedComponents);

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      var animationClass = classKeys.find(
        (i) => i === entry.target.classList[0]
      );
      entry.target.classList.add(animatedComponents[animationClass]);
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  classKeys.forEach((key) => {
    document.querySelectorAll(`.${key}`).forEach((e) => observer.observe(e));
  });

  document.querySelector(".menu-button").addEventListener("click", function () {
    const x = document.querySelector(".nav-menu");
    if (x.style.display === "flex") x.style.display = "none";
    else x.style.display = "flex";
  });
});

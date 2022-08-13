const animatedComponents = {
  "hero-wrapper": "flyLeftAnimation",
  "hero-image": "flyRightAnimation",
  image: "flyLeftAnimation",
  "image-2": "flyRightAnimation",
  "image-3": "flyLeftAnimation",
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
    observer.observe(document.querySelector(`.${key}`));
  });
});

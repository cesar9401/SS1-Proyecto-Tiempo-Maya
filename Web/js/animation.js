const elements = document.querySelectorAll(".elements");
const nahual = document.querySelector(".easyimage.easyimage-full img");

function addAnimation(e) {
	const img = e.target.querySelector("img");
	const span = e.target.querySelector("span");
	img.classList.add("raise");
	span.classList.add("span-raise");
}

function removeAnimation(e) {
	const img = e.target.querySelector("img");
	const span = e.target.querySelector("span");
	img.classList.remove("raise");
	span.classList.remove("span-raise");
}

function setRotation() {
	const seconds = new Date().getSeconds();
	deg = (seconds / 60) * 360;
	nahual.style.transform = `rotate(${deg}deg)`;
}

elements.forEach((element) =>
	element.addEventListener("mouseenter", addAnimation)
);
elements.forEach((element) =>
	element.addEventListener("mouseleave", removeAnimation)
);

setInterval(setRotation, 1000);

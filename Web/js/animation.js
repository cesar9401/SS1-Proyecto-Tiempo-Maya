const elements = document.querySelectorAll(".elements");
const cards = document.querySelectorAll("div.data");
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

function addCardAnimation(e) {
	e.target.classList.add("active");
	// const img = e.target.querySelector("img.card-image");
	// img.classList.add("active");
}

function removeCardAnimation(e) {
	e.target.classList.remove("active");
	// const img = e.target.querySelector("img.card-image");
	// img.classList.remove("active");
}

elements.forEach((element) =>
	element.addEventListener("mouseenter", addAnimation)
);
elements.forEach((element) =>
	element.addEventListener("mouseleave", removeAnimation)
);

cards.forEach((card) => card.addEventListener("mouseenter", addCardAnimation));

cards.forEach((card) =>
	card.addEventListener("mouseleave", removeCardAnimation)
);

if (nahual) {
	setInterval(setRotation, 1000);
}

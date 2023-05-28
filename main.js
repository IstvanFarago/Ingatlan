/* const collaps = document.querySelectorAll(".collaps");
collaps.forEach((item) =>
  item.addEventListener("click", function () {
    this.classList.toggle("collaps--expand");
  })
); */

// split into 3 main parts, common, house and flat..This code renders the correct part

const flat = document.getElementById("flat");
const house = document.getElementById("house");
const vacation = document.getElementById("vacation");
const land = document.getElementById("land");
const garage = document.getElementById("garage");

const propertyType = document.getElementById("property-type");

//Hidden elements by start
flat.style.display = "none";
house.style.display = "none";
land.style.display = "none";
garage.style.display = "none";
vacation.style.display = "block";

propertyType.addEventListener("change", () => {
  if (propertyType.value === "Lakás") {
    flat.style.display = "block";
    house.style.display = "none";
    vacation.style.display = "none";
    land.style.display = "none";
    garage.style.display = "none";
  } else if (propertyType.value === "Ház") {
    house.style.display = "block";
    flat.style.display = "none";
    vacation.style.display = "none";
    land.style.display = "none";
    garage.style.display = "none";
  } else if (propertyType.value === "Telek") {
    house.style.display = "none";
    flat.style.display = "none";
    vacation.style.display = "none";
    land.style.display = "block";
    garage.style.display = "none";
  } else if (propertyType.value === "Garázs") {
    house.style.display = "none";
    flat.style.display = "none";
    vacation.style.display = "none";
    land.style.display = "none";
    garage.style.display = "block";
  } else if (propertyType.value === "Nyaraló") {
    house.style.display = "none";
    flat.style.display = "none";
    vacation.style.display = "block";
    land.style.display = "none";
    garage.style.display = "none";
  } else {
    land.style.display = "none";
    garage.style.display = "none";
    flat.style.display = "none";
    house.style.display = "none";
    vacation.style.display = "block";
  }
});

//not needed as of now - Hiding the common footer if the property type is either house or flat

/* const commonFooter = document.getElementById("common-footer");

propertyType.addEventListener("change", () => {
  if (propertyType.value === "flat" || propertyType.value === "house") {
    commonFooter.style.display = "none";
  } else {
    commonFooter.style.display = "block";
  }
}); */

//Rendering the balcony size for flat and house

/* const balcony = document.getElementById("balcony");
const balconySize = document.getElementById("balcony-size");
const balconyFlat = document.getElementById("balcony-flat");
const balconySizeFlat = document.getElementById("balcony-size-flat");
balconySize.style.display = "none";
balconySizeFlat.style.display = "none";

balcony.addEventListener("change", () => {
  if (balcony.value === "Van") {
    balconySize.style.display = "block";
  } else {
    balconySize.style.display = "none";
  }
});

balconyFlat.addEventListener("change", () => {
  if (balconyFlat.value === "Van") {
    balconySizeFlat.style.display = "block";
  } else {
    balconySizeFlat.style.display = "none";
  }
}); */

//The balcony-size is rendered all the time but when the value of balcony is "Nincs" the balcony-size stuck at 0.

const balconySelectList = document.getElementsByClassName("balcony");
const balconySizeInputList = document.getElementsByClassName("balcony-input");

// Loop over balcony select elements
for (let i = 0; i < balconySelectList.length; i++) {
  const balconySelect = balconySelectList[i];
  const balconySizeInput = balconySizeInputList[i];

  // Attach event listener to each balcony select element
  balconySelect.addEventListener("change", function () {
    if (balconySelect.value === "Nincs") {
      balconySizeInput.value = "0";
      balconySizeInput.max = "0";
    } else {
      balconySizeInput.value = "";
      balconySizeInput.max = "99";
    }
  });
}

//date cant be less than 1900 and more than current year
const input = document.getElementById("date-built");
const currentYear = new Date().getFullYear();
input.addEventListener("blur", () => {
  const value = parseInt(input.value);
  if (isNaN(value)) {
    input.value = "";
  } else if (value < 1900) {
    input.value = "1900";
  } else if (value > currentYear) {
    input.value = currentYear;
  }
});

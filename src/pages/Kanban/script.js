const pendingUl = document.querySelector(".pending");
const nowUl = document.querySelector(".now");
const runningUl = document.querySelector(".running");
const concludedUl = document.querySelector(".concluded");

function listItemCreate(status) {
  const li = document.createElement("li");

  const h4 = document.createElement("h4");
  const title = document.createTextNode(status.title);
  h4.classList.add("title-card");
  h4.appendChild(title);

  const p = document.createElement("p");
  const description = document.createTextNode(status.description);
  const div = document.createElement("div");
  p.classList.add("description-card");
  p.appendChild(description);
  div.classList.add("description-content-card");
  div.appendChild(p);

  li.classList.add("card");
  li.setAttribute("draggable", true);

  li.appendChild(h4);
  li.appendChild(div);

  return li;
}

async function populateProjectManagement() {
  const response = await fetch("http://localhost:3333/projectManagement");
  const data = await response.json();
  console.log(data);

  const { pendings, nows, runnings, concludeds } = data;

  pendings.forEach((pending) => {
    const li = listItemCreate(pending);
    pendingUl.appendChild(li);
  });

  nows.forEach((now) => {
    const li = listItemCreate(now);
    nowUl.appendChild(li);
  });

  runnings.forEach((running) => {
    const li = listItemCreate(running);
    runningUl.appendChild(li);
  });

  concludeds.forEach((concluded) => {
    const li = listItemCreate(concluded);
    concludedUl.appendChild(li);
  });

  updateCards();
}

document.addEventListener("DOMContentLoaded", populateProjectManagement);

function updateCards() {
  cards = document.querySelectorAll(".card");
  cards.forEach((card) => {
    card.addEventListener("dragstart", dragStart);
    card.addEventListener("dragend", dragEnd);
  });
}

let cards = document.querySelectorAll(".card");
let dropzones = document.querySelectorAll(".dropzone");

cards.forEach((card) => {
  card.addEventListener("dragstart", dragStart);
  card.addEventListener("dragend", dragEnd);
});

function dragStart() {
  dropzones.forEach((dropzone) => dropzone.classList.add("highlight"));
  this.classList.add("is-dragging");
}

function dragEnd() {
  dropzones.forEach((dropzone) => dropzone.classList.remove("highlight"));
  this.classList.remove("is-dragging");
}

dropzones.forEach((dropzone) => {
  dropzone.addEventListener("dragover", dragOver);
  dropzone.addEventListener("dragleave", dragLeave);
  dropzone.addEventListener("drop", drop);
});

function dragOver() {
  this.classList.add("over");
  const cardBeingDragged = document.querySelector(".is-dragging");

  this.appendChild(cardBeingDragged);
}

function dragLeave() {
  this.classList.remove("over");
}

function drop() {
  this.classList.remove("over");
}

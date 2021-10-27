const pendingUl = document.querySelector(".pending");
const nowUl = document.querySelector(".now");
const runningUl = document.querySelector(".running");
const concludedUl = document.querySelector(".concluded");

function listItemCreate(status) {
  const li = document.createElement("li");
  const responsible = document.createTextNode(
    `Responsável - ${status.responsible}`
  );
  const priority = document.createTextNode(`Prioridade - ${status.priority}`);

  li.classList.add("card");
  li.setAttribute("draggable", true);

  li.appendChild(responsible);
  li.appendChild(priority);

  return li;
}

async function populateProjectManagement() {
  const response = await fetch("http://localhost:3333/projectManagement");
  const data = await response.json();

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

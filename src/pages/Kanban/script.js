const pendingUl = document.querySelector(".pendings");
const nowUl = document.querySelector(".nows");
const runningUl = document.querySelector(".runnings");
const concludedUl = document.querySelector(".concluded");

function listItemCreate(status) {
  const li = document.createElement("li");
  li.setAttribute("id", status.id);

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

  const { pendings, nows, runnings, concluded } = data;

  if (pendings) {
    pendings.forEach((pending) => {
      const li = listItemCreate(pending);
      pendingUl.appendChild(li);
    });
  }
  if (nows) {
    nows.forEach((now) => {
      const li = listItemCreate(now);
      nowUl.appendChild(li);
    });
  }

  if (runnings) {
    runnings.forEach((running) => {
      const li = listItemCreate(running);
      runningUl.appendChild(li);
    });
  }

  if (concluded) {
    concluded.forEach((conclud) => {
      const li = listItemCreate(conclud);
      concludedUl.appendChild(li);
    });
  }

  updateCards();
}

document.addEventListener("DOMContentLoaded", populateProjectManagement());

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

  const [newFather] = [...dropzones].filter((dropzone) => {
    const haveCard = [...dropzone.childNodes].filter(
      (card) => card.id === this.id
    );
    if (haveCard.length > 0) {
      return dropzone;
    }
  });
  updateBackendCards(this, newFather);
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

async function updateBackendCards(card, dropzone) {
  const id = Number(card.id);
  const [titleNode] = filterChildNodeWithOneClass(card, "title-card");
  const title = titleNode.textContent;

  const [descriptionContentNode] = filterChildNodeWithOneClass(
    card,
    "description-content-card"
  );
  const [descriptionNode] = filterChildNodeWithOneClass(
    descriptionContentNode,
    "description-card"
  );

  const description = descriptionNode.textContent;

  const [, dropzoneName] = dropzone.classList;

  const response = await fetch("http://localhost:3333/projectManagement");
  const data = await response.json();

  const { pendings, nows, runnings, concluded } = data;

  const pendingFiltered = pendings.filter((pending) => {
    return pending.id !== id;
  });
  const nowsFiltered = nows.filter((now) => {
    return now.id !== id;
  });
  const runningsFiltered = runnings.filter((running) => {
    return running.id !== id;
  });
  const concludedFiltered = concluded.filter((conclud) => {
    return conclud.id !== id;
  });

  const dataWithOutDuplicates = {
    pendings: pendingFiltered,
    nows: nowsFiltered,
    runnings: runningsFiltered,
    concluded: concludedFiltered,
  };

  const dropzoneArea = [...data[dropzoneName]];

  let dropzoneAreaFiltered = [];

  for (dropzone of dropzoneArea) {
    if (dropzone.id !== id) {
      dropzoneAreaFiltered.push(dropzone);
    }
  }

  await fetch("http://localhost:3333/projectManagement", {
    method: "post",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      ...dataWithOutDuplicates,
      [dropzoneName]: [...dropzoneAreaFiltered, { id, title, description }],
    }),
  });
}

function filterChildNodeWithOneClass(node, className) {
  return [...node.childNodes].filter((child) =>
    child.classList.contains(className)
  );
}

const buttonPedings = document.querySelector("#button-pendings");
const buttonNows = document.querySelector("#button-nows");
const buttonConcluded = document.querySelector("#button-concluded");
const buttonRunnings = document.querySelector("#button-runnings");
const saveButton = document.querySelector("#save-button");

buttonPedings.addEventListener("click", () => {
  createNewCard("pendings");
});

buttonNows.addEventListener("click", () => {
  createNewCard("nows");
});

buttonConcluded.addEventListener("click", () => {
  createNewCard("concluded");
});

buttonRunnings.addEventListener("click", () => {
  createNewCard("runnings");
});

function createNewCard(section) {
  saveButton.addEventListener("click", async () => {
    const titleInput = document.querySelector("#title");
    const descriptionInput = document.querySelector("#description");

    const title = titleInput.value;
    const description = descriptionInput.value;

    await fetch(`http://localhost:3333/projectManagement/${section}`, {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ title, description }),
    });
  });
}
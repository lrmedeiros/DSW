const pendingUl = document.querySelector(".pendings");
const nowUl = document.querySelector(".nows");
const runningUl = document.querySelector(".runnings");
const concludedUl = document.querySelector(".concluded");

function listItemCreate(data) {
  const li = document.createElement("li");
  li.setAttribute("id", data.id);

  const h4 = document.createElement("h4");
  const title = document.createTextNode(data.title);

  h4.classList.add("title-card");
  h4.appendChild(title);

  const divHeader = document.createElement("div");
  const buttonLixeira = document.createElement("button");
  const buttonEdit = document.createElement("button");

  buttonLixeira.setAttribute("id", data.id);
  buttonLixeira.classList.add("btn");
  buttonLixeira.classList.add("btn-danger");
  buttonLixeira.classList.add("delete");
  const buttonLixeiraText = document.createTextNode("Excluir");
  buttonLixeira.appendChild(buttonLixeiraText);
  divHeader.classList.add("div-header");
  divHeader.appendChild(h4);
  divHeader.appendChild(buttonLixeira);

  const p = document.createElement("p");
  const description = document.createTextNode(data.description);
  const div = document.createElement("div");

  p.classList.add("description-card");
  p.appendChild(description);
  div.classList.add("description-content-card");
  div.appendChild(p);

  li.classList.add("card");
  li.setAttribute("draggable", true);

  li.appendChild(divHeader);
  li.appendChild(div);

  return li;
}

function removePhpText() {
  let tags = document.getElementsByTagName("text");
  console.log(tags.length);

  for (let index = 0; index < tags.length; index++) {
    tags[index].parentNode.removeChild(tags[index]);
  }
}

async function populateProjectManagement() {
  const userId = localStorage.getItem("userId");
  console.log(userId);
  if (!userId) {
    window.location.replace("http://localhost/");
  }
  const response = await fetch("http://localhost:80/notes/list", {
    method: "POST",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      userId,
    }),
  });
  const dataArray = await response.json();
  console.log("aqui");
  removePhpText();

  dataArray.forEach((data) => {
    if (data.status === "CONCLUDED") {
      const li = listItemCreate(data);
      concludedUl.appendChild(li);
    }
    if (data.status === "NOWS") {
      const li = listItemCreate(data);
      nowUl.appendChild(li);
    }
    if (data.status === "PENDINGS") {
      const li = listItemCreate(data);
      pendingUl.appendChild(li);
    }
    if (data.status === "RUNNINGS") {
      const li = listItemCreate(data);
      runningUl.appendChild(li);
    }
  });

  updateCards();
}

document.addEventListener("DOMContentLoaded", populateProjectManagement());

function updateCards() {
  cards = document.querySelectorAll(".card");
  buttonsDelete = document.querySelectorAll(".delete");
  cards.forEach((card) => {
    card.addEventListener("dragstart", dragStart);
    card.addEventListener("dragend", dragEnd);
  });
  deleteCard();
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

  const [, dropzoneName] = dropzone.classList;

  await fetch("http://localhost:80/notes", {
    method: "PUT",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      dropzoneName,
      id,
    }),
  });
  window.location.reload(true);
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
    const userId = localStorage.getItem("userId");

    const title = titleInput.value;
    const description = descriptionInput.value;

    await fetch(`http://localhost:80/notes`, {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        section,
        title,
        description,
        userId,
      }),
    });
    window.location.reload(true);
  });
}

let buttonsDelete = document.querySelectorAll(".delete");

function deleteCard() {
  buttonsDelete.forEach((button) => {
    button.addEventListener("click", async () => {
      const id = button.getAttribute("id");
      await fetch(`http://localhost:80/notes`, {
        method: "DELETE",
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ id }),
      });
      window.location.reload(true);
    });
  });
}

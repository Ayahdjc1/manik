document.addEventListener("DOMContentLoaded", function() {
  const modal = document.getElementById("myModal");
  const modalContent = modal.querySelector(".modal-content");
  const closeButton = modal.querySelector(".close");
  const openModalButton = document.getElementById("openModal");

  let isDragging = false;
  let initialX;
  let initialY;

  function openModal() {
      toggleModal(true);
  }

  function closeModal() {
      toggleModal(false);
  }

  function toggleModal(isOpen) {
      modal.style.display = isOpen ? "block" : "none";
  }

  function startDragging(e) {
      isDragging = true;
      initialX = e.clientX - modal.offsetLeft;
      initialY = e.clientY - modal.offsetTop;
  }

  function stopDragging() {
      isDragging = false;
  }

  function dragModal(e) {
      if (isDragging) {
          e.preventDefault();
          const newX = e.clientX - initialX;
          const newY = e.clientY - initialY;
          modal.style.left = newX + "px";
          modal.style.top = newY + "px";
      }
  }

  function outsideClickHandler(e) {
      if (e.target === modal) {
          closeModal();
      }
  }

  modalContent.addEventListener("mousedown", startDragging);
  window.addEventListener("mouseup", stopDragging);
  window.addEventListener("mousemove", dragModal);
  document.addEventListener("click", outsideClickHandler);

  openModalButton.addEventListener("click", openModal);
  closeButton.addEventListener("click", closeModal);
});
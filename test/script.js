const draggable = document.getElementById('draggable');
const dropZone = document.getElementById('dropZone');
const successMessage = document.getElementById('successMessage');

let offsetX, offsetY;

draggable.addEventListener('mousedown', onMouseDown);

function onMouseDown(event) {
    offsetX = event.clientX - draggable.getBoundingClientRect().left;
    offsetY = event.clientY - draggable.getBoundingClientRect().top;

    document.addEventListener('mousemove', onMouseMove);
    document.addEventListener('mouseup', onMouseUp);
}

function onMouseMove(event) {
    draggable.style.left = `${event.clientX - offsetX}px`;
    draggable.style.top = `${event.clientY - offsetY}px`;
}

function onMouseUp(event) {
    document.removeEventListener('mousemove', onMouseMove);
    document.removeEventListener('mouseup', onMouseUp);

    const draggableRect = draggable.getBoundingClientRect();
    const dropZoneRect = dropZone.getBoundingClientRect();

    if (
        draggableRect.left < dropZoneRect.right &&
        draggableRect.right > dropZoneRect.left &&
        draggableRect.top < dropZoneRect.bottom &&
        draggableRect.bottom > dropZoneRect.top
    ) {
        successMessage.style.display = 'block';
        draggable.style.backgroundColor = '#2ecc71';
        draggable.style.left = `${dropZoneRect.left + (dropZoneRect.width - draggableRect.width) / 2}px`;
        draggable.style.top = `${dropZoneRect.top + (dropZoneRect.height - draggableRect.height) / 2}px`;
    }
}

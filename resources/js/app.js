const { default: axios } = require('axios');

require('./bootstrap');

$(".edit-task").on('click', (event) => {
    let task = $(event.target).closest('.task');
    
    // Change edit to update
    task.find('.edit-task').hide();
    task.find('.update-task').show();

    // Change task description to input
    task.find('span').hide();
    task.find('.edit-description').show();

    // Change delete into cancel
    task.find('.delete-task').hide();
    task.find('.cancel-edit').show();
});

$(".cancel-edit").on('click', (event) => {
    let task = $(event.target).closest('.task');
    
    // Change update back to edit
    task.find('.edit-task').show();
    task.find('.update-task').hide();

    // Change input back to task description
    task.find('span').show();
    task.find('.edit-description').hide();

    // Change cancel back into delete
    task.find('.delete-task').show();
    task.find('.cancel-edit').hide();
});

$(".update-task").on('click', (event) => {
    // Get task
    let task = $(event.target).closest('.task');
    let taskid = task.data('taskid');

    // Get new task description
    let description = task.find('.edit-description').val();

    // Make request to update description
    axios.put('/tasks/' + taskid + '/update', {description})
        .then((response) => {
            task.find('span').html(response.data.taskDescription);
            window.location.reload();
        });
});

$(".delete-task").on('click', (event) => {
     // Get task
     let taskid = $(event.target).closest('.task').data('taskid');

    // Make request to update description
    axios.delete('/tasks/' + taskid + '/delete')
    .then(() => {
        window.location.reload();
    });
});

// Drag tasks
let taskContainers = $(".tasks-container");
let tasks = $(".task");

// Fade display of task bein dragged
tasks.on('dragstart', (event) => {
    $(event.target).addClass('held-task');
});

// After releasing the task, update priorities
tasks.on('dragend', (event) => {
    $(event.target).removeClass('held-task');
    let taskArray = [...$('.task')].map((element) => {
        return $(element).data('taskid');
    });

    axios.put('/tasks/priority', {taskIDs: taskArray});
});

// Calcuate postion of task based on position of cursor
taskContainers.on('dragover', (event) => {
    event.preventDefault();
    let taskContainer = $(event.target).closest('.tasks-container');
    let newPosition = getHeldTaskPosition(taskContainer, event.clientY);
    if(newPosition == null) {
        taskContainer.append($(".held-task"));
    } else {
        $(newPosition).before($(".held-task"));
    }
});

// Function for calculating position
function getHeldTaskPosition(taskContainer, yPosition) {
    let tasks = [...taskContainer.find('.task:not(.held-task)')];
    
    return tasks.reduce((closestElement, task) => {
        let taskRect = task.getBoundingClientRect();
        let distance = yPosition - taskRect.top - taskRect.height / 2;
        if(distance < 0 && distance > closestElement.distance) {
            return { distance: distance, element: task }
        } else {
            return closestElement;
        }
    }, { distance: Number.NEGATIVE_INFINITY }).element;
}
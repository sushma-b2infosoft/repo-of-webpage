<!DOCTYPE html>
<html>
<head>
  <title>Mini Task Manager</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="task-container">
<h2>Task Manager (AJAX)</h2>
<div class="task-form">
<input type="text" id="taskInput" placeholder="Enter new task">
<button onclick="addTask()">Add</button>
</div>

<div class="filters">
  <button onclick="setFilter('all')">All</button>
  <button onclick="setFilter('Pending')">Pending</button>
  <button onclick="setFilter('Completed')">Completed</button>
</div>

<input type="text" id="searchBox" placeholder="Search tasks..." onkeyup="loadTasks()">

<div id="tasks"></div>

<div class="pagination">
  <button onclick="prevPage()">Previous</button>
  <span id="pageInfo"></span>
  <button onclick="nextPage()">Next</button>
</div>

<script>
let currentFilter = "all";
let currentPage = 1;
let perPage = 5;
let totalPages = 1;

async function loadTasks() {
    let search = document.getElementById("searchBox").value;
    let res = await fetch(`fetch.php?filter=${currentFilter}&search=${search}&page=${currentPage}&limit=${perPage}`);
    let json = await res.json();
    let container = document.getElementById("tasks");
    container.innerHTML = "";
    json.data.forEach(t => {
        container.innerHTML += `
          <div class="task ${t.status==='Completed'?'completed':''}" id="task-${t.id}">
            <span id="title-${t.id}">${t.title}</span>
            <div>
              <button onclick="showEdit(${t.id},'${t.title}')">Edit</button>
              <button onclick="deleteTask(${t.id})">Delete</button>
              <button onclick="toggleStatus(${t.id},'${t.status}')">
                ${t.status==='Completed'?'Mark Pending':'Mark Done'}
              </button>
            </div>
          </div>`;
    });

    totalPages = json.totalPages;
    document.getElementById("pageInfo").textContent = `Page ${currentPage} of ${totalPages}`;
}

async function addTask() {
    let title = document.getElementById("taskInput").value;
    if (!title) return alert("Enter a task!");
    let fd = new FormData();
    fd.append("title", title);
    let res = await fetch("add.php",{method:"POST",body:fd});
    let json = await res.json();
    if(json.status==="success"){
        document.getElementById("taskInput").value="";
        currentPage = 1; // show latest task at top
        loadTasks();
    } else {
        alert(json.message);
    }
}

function showEdit(id,title){
    let el = document.getElementById("task-"+id);
    el.innerHTML = `
        <input type="text" id="edit-${id}" value="${title}">
        <button onclick="updateTask(${id})">Save</button>
        <button onclick="loadTasks()">Cancel</button>`;
}

async function updateTask(id){
    let newTitle = document.getElementById("edit-"+id).value;
    let fd = new FormData();
    fd.append("id",id);
    fd.append("title",newTitle);
    let res = await fetch("update.php",{method:"POST",body:fd});
    let json = await res.json();
    if(json.status==="success"){ loadTasks(); }
    else { alert(json.message); }
}

async function deleteTask(id){
    if(!confirm("Delete task?")) return;
    let fd = new FormData();
    fd.append("id",id);
    let res = await fetch("delete.php",{method:"POST",body:fd});
    let json = await res.json();
    if(json.status==="success"){ loadTasks(); }
    else { alert(json.message); }
}

async function toggleStatus(id,status){
    let newStatus = (status==='Completed')?'Pending':'Completed';
    let fd = new FormData();
    fd.append("id",id);
    fd.append("status",newStatus);
    let res = await fetch("update.php",{method:"POST",body:fd});
    let json = await res.json();
    if(json.status==="success"){ loadTasks(); }
}

function setFilter(filter){
    currentFilter = filter;
    currentPage = 1; // reset to first page
    loadTasks();
}

function nextPage(){
    if(currentPage < totalPages){
        currentPage++;
        loadTasks();
    }
}

function prevPage(){
    if(currentPage > 1){
        currentPage--;
        loadTasks();
    }
}

loadTasks();
</script>
</body>
</html>


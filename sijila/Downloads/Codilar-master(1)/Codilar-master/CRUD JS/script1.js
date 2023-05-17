var form = `<div>
    <label>Name</label>
    <input type="text" placeholder="Enter Your Name" id="name">
    <label>Email</label>
    <input type="email" id="email" placeholder="Enter Your email">
    <label>Mobile</label>
    <input type="text" id="mobile" placeholder="Enter Your Mobile Number">
    <label>Date of Birth</label>
    <input type="date" id="dob">
  </div>
  <button type="submit" id="button" onclick="save()">Save</button>
</div>`;
function table() {
    let table = `<table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Mobile</th>
      <th>Date of Birth</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>`;
    for (let i = 0; i < details.length; i++){
        table = table + `<tr>
      <td>${i + 1}</td>
      <td>${details[i].name}</td>
      <td>${details[i].email}</td>
      <td>${details[i].mobile}</td>
      <td>${details[i].dob}</td>

      <td><button type="button" onclick="edit(${i})">Edit</button></td>
      <td><button type="button" onclick="deleteData(${i})">Delete</button></td>
    </tr> `;
    };
    table = table+`</tbody>
    </table>`;
    document.getElementById("table").innerHTML = table;
};
document.getElementById("form").innerHTML = form;
details = [];
getData();
table();
function getData(){
    let Data = localStorage.getItem("details");
    if (Data) {
        details = JSON.parse(Data);
    } else {
        setData();
    };
};
function setData() {
    localStorage.setItem("details", JSON.stringify(details));
};
function save() {
    let name = document.getElementById("name");
    let email = document.getElementById("email");
    let mobile = document.getElementById("mobile");
    let dob = document.getElementById("dob");

    if (name.value == 0) {
        alert("name is Empty");
        return
    }
    let data = {
        name: name.value,
        email: email.value,
        mobile:mobile.value,
        dob:dob.value,
    };
    details.push(data);
    setData();
    table();
    name.value = "";
    email.value = "";
    mobile.value="";
    dob.value="";
};
function deleteData(index) {
    details.splice(index, 1);
    setData();
    table();
};

function edit(index) {
    let editForm = `<div>
  <div class="form-group">
    <label>Update Name</label>
    <input type="text" value="${details[index].name}" class="form-control" id="newName" aria-describedby="emailHelp" placeholder="Update Your Name">
  </div>
  <div class="form-group mt-3">
    <label>Email</label>
    <input type="email" value="${details[index].email}" class="form-control" id="newEmail" placeholder="Update Your email">
  </div>
  <div class="form-group mt-3">
    <label>Mobile</label>
    <input type="text" value="${details[index].mobile}" class="form-control" id="newMobile" placeholder="Update Your Mobile No">
  </div>
  <div class="form-group mt-3">
    <label for="email">Date of Birth</label>
    <input type="date" value="${details[index].dob}" class="form-control" id="newDob" placeholder="Update Your Date of Birth">
  </div>
  <button type="submit" class="btn btn-primary mt-3" onclick="update(${index})">Update</button>
</div>`;
    document.getElementById("form").innerHTML = editForm;
};
function update(index) {
    let newName = document.getElementById('newName');
    let newEmail = document.getElementById('newEmail');
    let newMobile= document.getElementById('newMobile');
    let newDob= document.getElementById('newDob');

    details[index] = {
        name: newName.value,
        email: newEmail.value,
        mobile:newMobile.value,
        dob:newDob.value
    };
    setData();
    table();
    document.getElementById("form").innerHTML = form;
}


var form = `<div>
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Your Name">
  </div>
  <div class="form-group mt-3">
    <label>Email</label>
    <input type="email" class="form-control" id="email" placeholder="Enter Your email">
  </div>
  <label>Mobile</label>
    <input type="text" class="form-control" id="mobile" placeholder="Enter Your Mobile Number">
  </div>
  <label>Date of Birth</label>
    <input type="date" class="form-control" id="dob" placeholder="Enter Date of Birth">
  </div>
  <button type="submit" class="btn btn-primary mt-3" onclick="save()">Save</button>
</div>`;

function table() {
    let table = `<table class="table">
  <thead>
    <tr>
      <th >Name</th>
      <th >Email</th>
      <th>Mobile</th>
      <th>Date of Birth</th>

      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>`;
    for (let i = 0; i < details.length; i++){
        table = table + `<tr>
      <td>${details[i].name}</td>
      <td>${details[i].email}</td>
      <td>${details[i].mobile}</td>
      <td>${details[i].dob}</td>
      <td><button type="button" class="btn btn-warning" onclick="edit(${i})">Edit</button></td>
      <td><button type="button" class="btn btn-danger" onclick="deleteData(${i})">Delete</button></td>
    </tr> `;
    };
    table = table+`</tbody>
    </table>`;
    document.getElementById("table").innerHTML = table;
};
document.getElementById("form").innerHTML = form;
details = [];
getData();
table();
function getData(){
    let Data = localStorage.getItem("details");
    if (Data) {
        details = JSON.parse(Data);
    } else {
        setData();
    };
};
function setData() {
    localStorage.setItem("details", JSON.stringify(details));
};
function save() {
    let name = document.getElementById("name");
    let email = document.getElementById("email");
    let mobile = document.getElementById("mobile");
    let dob = document.getElementById("dob");


    if (name.value == 0) {
        alert("name is Empty");
        return
    }
    let data = {
        name: name.value,
        email: email.value,
        mobile:mobile.value,
        dob:dob.value,
    };
    details.push(data);
    setData();
    table();
    name.value = "";
    email.value = "";
    mobile.value = "";
    dob.value = "";
};
function deleteData(index) {
    details.splice(index, 1);
    setData();
    table();
};

function edit(index) {
    let editForm = `<div>
  <div class="form-group">
    <label for="name">Update Name</label>
    <input type="text" value="${details[index].name}" class="form-control" id="newName" aria-describedby="emailHelp" placeholder="Update Your Name">
  </div>
  <div class="form-group mt-3">
    <label for="email">Email</label>
    <input type="email" value="${details[index].email}" class="form-control" id="newEmail" placeholder="Update Your email">
  </div>
  <div class="form-group mt-3">
    <label>Mobile</label>
    <input type="text" value="${details[index].mobile}" class="form-control" id="newMobile" placeholder="Update Your Mobile">
  </div>
  <div class="form-group mt-3">
    <label>Date of Birth</label>
    <input type="date" value="${details[index].dob}" class="form-control" id="newDob" placeholder="Update Your date">
  </div>
  <button type="submit" class="btn btn-primary mt-3" onclick="update(${index})">Update</button>
</div>`;
    document.getElementById("form").innerHTML = editForm;
};
function update(index) {
    let newName = document.getElementById('newName');
    let newEmail = document.getElementById('newEmail');
    let newMobile = document.getElementById('newMobile');
    let newDob = document.getElementById('newDob');

    details[index] = {
        name: newName.value,
        email: newEmail.value,
        mobile:newMobile.value,
        dob:newDob.value,
    };
    setData();
    table();
    document.getElementById("form").innerHTML = form;
}



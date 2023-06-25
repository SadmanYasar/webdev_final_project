function uploadCV() {
  var name = document.getElementById("name").value;
  var cv = document.getElementById("cv").files[0];

  var formData = new FormData();
  formData.append("name", name);
  formData.append("cv", cv);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "upload.php", true);
  xhr.onload = function () {
    document.getElementById("message").innerHTML = this.responseText;
  };
  xhr.send(formData);
}

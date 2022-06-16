<nav id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a><br>
  <div class="d-flex justify-content-center align-items-center px-3 py-4">
  <img src="https://media.discordapp.net/attachments/958687400203255808/958687472227868682/275714560_317115067181930_3442500599053539010_n.png?width=1025&height=180" alt="logo" width="250" height="50">
  </div>
  <ul class="nav flex-column" id="nav_accordion">
    <li class="nav-item"><a href="#" class="active">Home</a></li>
    <li class="nav-item"><a href="#">Profile</a></li>
    <li class="nav-item"><a href="#">Payslips</a></li>
    <li class="nav-item"><a href="#">Schedule</a></li>
    <li class="nav-item"><a href="/Employees" class="active">Employee List</a></li>
    <li class="nav-item"><a href="/Employees/create">Add Employee</a></li>
    <li class="nav-item"><a href="#">Add Detachments</a></li>
    <li class="nav-item"><a href="#">Employee Payroll</a></li>
    <li  class="nav-item has-submenu">
      <a href="#" class="nav-link">Account Settings <i class="fa fa-caret-down"></i></a>
        <ul class="submenu collapse">
          <li><a class="nav-item" href="#">Submenu item 4 </a></li>
          <li><a class="nav-link" href="#">Submenu item 5 </a></li>
          <li><a class="nav-link" href="#">Submenu item 6 </a></li>
          <li><a class="nav-link" href="#">Submenu item 7 </a></li>
      </ul>
    </li>
  </ul>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll('.sidenav .nav-link').forEach(function(element){
    
    element.addEventListener('click', function (e) {

      let nextEl = element.nextElementSibling;
      let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
    });
  })
}); 
</script>

<nav class="navbar navbar-light navbg">
<button class="bt" onclick="openNav()">&#9776;</button>
<a class="navbar-brand" class = "form-inline my-2 my-lg-0 right">Apeiros Security Solutions & Investigation Agency, Inc.</a>
</nav>
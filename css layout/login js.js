
function slideAdmin(){
    const slide = document.getElementById("slideAdminLogin");
    
    slide.style.transition = "width 1s";
	slide.style.visibility = "visible";
	slide.style.width = "40%";
    
    const user = document.getElementById("loginUser");
    user.style.visibility = "hidden";
}

function slideUser(){
    const slide = document.getElementById("slideUserLogin");
    
    slide.style.transition = "width 1s";
	slide.style.visibility = "visible";
	slide.style.width = "40%";
    
    const admin = document.getElementById("loginAdmin");
    admin.style.visibility = "hidden";
}

function slideAdminForm(){
    const user = document.getElementById("createUser");
    const admin = document.getElementById("createAdmin");
    user.style.visibility = "hidden";
    admin.style.visibility = "hidden";
    
    const slide = document.getElementById("slideAdminCreate");
    slide.style.transition = "opacity 1s";
	slide.style.visibility = "visible";
    slide.style.opacity = "1";
}

function slideUserForm(){
    const user = document.getElementById("createUser");
    const admin = document.getElementById("createAdmin");
    user.style.visibility = "hidden";
    admin.style.visibility = "hidden";
    
    const slide = document.getElementById("slideUserCreate");
    slide.style.transition = "opacity 1s";
	slide.style.visibility = "visible";
    slide.style.opacity = "1";
}

//Resets the width and transition to 0 for future transitions
function resetTransitionsLogin(){
    document.getElementById("slideAdminLogin").style.width = "0%";
    document.getElementById("slideUserLogin").style.width = "0%";
}

function resetTransitionsCreate(){
    document.getElementById("slideAdminCreate").opacity = "0";
    document.getElementById("slideUserCreate").opacity = "0";
}

function backLogin(){
    resetTransitionsLogin();
    document.getElementById("slideAdminLogin").style.visibility = "hidden";
    document.getElementById("slideUserLogin").style.visibility = "hidden";
    
    document.getElementById("loginAdmin").style.visibility = "visible";
    document.getElementById("loginUser").style.visibility = "visible";
}

function backCreate(){
    resetTransitionsCreate();
    document.getElementById("slideAdminCreate").style.visibility = "hidden";
    document.getElementById("slideUserCreate").style.visibility = "hidden";
    
    document.getElementById("createAdmin").style.visibility = "visible";
    document.getElementById("createUser").style.visibility = "visible";
}


function login(){
    resetTransitions();
    
    document.getElementById("createAcc").style.visibility = "hidden";
    document.getElementById("createAdmin").style.visibility = "hidden";
    document.getElementById("createUser").style.visibility = "hidden";
    document.getElementById("slideAdminCreate").style.visibility = "hidden";
    document.getElementById("slideUserCreate").style.visibility = "hidden";
    
    
    document.getElementById("login").style.visibility = "visible";
    document.getElementById("loginAdmin").style.visibility = "visible";
    document.getElementById("loginUser").style.visibility = "visible";
}


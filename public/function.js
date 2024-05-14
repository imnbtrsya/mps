// const btns = document.querySelectorAll('.side-dropdown-content > div > a');
// const dropMenus = document.querySelectorAll('.drop-menu');


/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function openSideDropdown() {
    var dropdown = document.getElementById("sideDropdown");
    if (dropdown.classList.contains('show-side')) {
        dropdown.classList.remove('show-side');
    } else {
        dropdown.classList.add('show-side');
    }
}

function openProfileDropdown() {
    var profileDropdown = document.getElementById("profileDropdown");
    if (profileDropdown.style.right === "-250px") {
        profileDropdown.style.right = "0";
    } else {
        profileDropdown.style.right = "-250px";
    }
}

window.onclick = function(event) {
    if (!event.target.matches('.side-dropbtn')) {
        var dropdowns = document.getElementsByClassName("side-dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains("show-side")) {
                openDropdown.classList.remove("show-side");
            }
        }
    }

    if (!event.target.matches('.profile-dropbtn')) {
        var profileDropdown = document.getElementById("profileDropdown");
        if (profileDropdown.style.right === "0px") {
            profileDropdown.style.right = "-250px";
        }
    }
}




// btns.forEach(btn => {
//     btn.addEventListener('click', () => {
//         removeActive();
//         btn.classList.add('active');
//         document.querySelector(btn.dataset.target).classList.add('active');
//     })
// })

// const removeActive = () => {
//     btns.forEach(btn => btn.classList.remove('active'));
//     dropMenus.forEach(dropmenu => dropmenu.classList.remove('active'));
// }

// window.onclick = (e) => {
//     if (!e.target.matches('.btn')) {
//         removeActive()
//     }
// }
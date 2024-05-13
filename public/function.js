// const btns = document.querySelectorAll('.side-dropdown-content > div > a');
// const dropMenus = document.querySelectorAll('.drop-menu');


/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function openSideDropdown() {
    console.log("Dropdown toggle function called.");
    document.getElementById("sideDropdown").classList.toggle("show-side");
}

function openProfileDropdown() {
    console.log("Dropdown toggle function called.");
    document.getElementById("profileDropdown").classList.toggle("show-profile");
}
  
// Close the dropdown if the user clicks outside of it

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
        var dropdowns = document.getElementsByClassName("profile-dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains("show-profile")) {
                openDropdown.classList.remove("show-profile");
            }
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
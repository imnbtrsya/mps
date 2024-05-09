function toggleNavSide() {
    const nav = document.getElementById("side-navigation");
    if (nav.classList.contains('flex-side-navigation')) {
        nav.classList.remove('flex-side-navigation'); // If visible, hide it
    } else {
        nav.classList.add('flex-side-navigation'); // If hidden, show it
    }
}

function toggleNavProfile() {
    const profileNav = document.getElementById("profile-navigation");
    const isVisible = profileNav.style.display === "flex";
    profileNav.style.display = isVisible ? "none" : "flex";
}

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



document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.tab');
    const indicator = document.querySelector('.tab-indicator');
    const searchInput = document.getElementById('searchInput');
    const searchType = document.getElementById('searchType');
    
    function updateIndicator(tab) {
        const tabRect = tab.getBoundingClientRect();
        const tabsRect = tab.parentElement.getBoundingClientRect();
        indicator.style.width = tabRect.width + 'px';
        indicator.style.left = (tabRect.left - tabsRect.left) + 'px';
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            
            if (tab.dataset.tab === 'titles') {
                searchInput.placeholder = "Enter title that you're interested";
                searchType.value = "titles";
            } else if (tab.dataset.tab === 'authors') {
                searchInput.placeholder = "Search by author names";
                searchType.value = "authors";
            }

            updateIndicator(tab);
        });
    });

    updateIndicator(document.querySelector('.tab.active'));
});


function toggleFields() {
    var type = document.getElementById('Pb_type').value;
    var journalFields = document.getElementById('journalFields');
    var conferenceFields = document.getElementById('conferenceFields');
  
    journalFields.style.display = 'none';
    conferenceFields.style.display = 'none';
  
    if (type === 'Journal' || type === 'Book') {
      journalFields.style.display = 'block';
    } else if (type === 'Conference Paper') {
      conferenceFields.style.display = 'block';
    }
  }
  
  function updateFileName(input) {
    const fileName = input.files[0].name;
    document.getElementById('file_name').textContent = fileName;
  }
  
  document.addEventListener('DOMContentLoaded', function() {
    toggleFields(); // Set the initial visibility of fields based on the selected type
  });


document.querySelectorAll('button[name=acceptFriendRequest], button[name=declineFriendRequest]').forEach(function(el) {
    el.addEventListener('click', function() {
        query = 'funcname=cDatabase::' + el.name + '&id=' + this.dataset.id;
        console.log(query);
        ajax({
            type: "POST",
            async: true,
            data: query,
            dataType: 'json',
            success: friendRequestAccepted(el.name),
            error: console.log('ko')
        });
    })
})

async function friendRequestAccepted(result) {
    const delay = ms => new Promise(res => setTimeout(res, ms));
    result == "acceptFriendRequest" ? notify({ type: 'success', content: 'Demande d\'ami acceptée' }) : notify({ type: 'warning', content: 'Demande d\'ami supprimée' });
    await delay(50);
    location.reload();
}

function disconnect() {
    ajax({
        type: "GET",
        async: true,
        data: 'funcname=cDatabase::disconnect',
        success: function() { window.location = "index.php"; }
    });
}

async function uploadFile() {
    let formData = new FormData();
    formData.append("file", PICTURE.files[0]);
    await fetch('/upload.php', {
        method: "POST",
        body: formData,
    });
    return (true);
};

async function uploadFileEdit() {
    let formData = new FormData();
    formData.append("file", post_picture.files[0]);
    await fetch('/upload.php', {
        method: "POST",
        body: formData,
    });
    return (true);
};


// Upload file
function uploadFileProfile() {
    var formData = new FormData();
    formData.append("file", profile_picture.files[0]);
    var xhttp = new XMLHttpRequest();

    xhttp.open("POST", "upload_profile.php", true);

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;
            if (response == "success") {
                return (1)
            } else {
                notify({
                    type: 'warning',
                    content: response
                });
                return (-1);
            }
        }
    };
    xhttp.send(formData);
};


async function uploadFileBanner(username) {
    var formData = new FormData();
    formData.append("file", banner_picture.files[0]);
    var xhttp = new XMLHttpRequest();

    xhttp.open("POST", "upload_banner.php", true);

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;
            if (response == "success") {
                return (1)
            } else {
                notify({
                    type: 'warning',
                    content: response
                });
                return (-1);
            }
        }
    };
    xhttp.send(formData);
};



function searchArea(search) {
    if (search != "")
        window.location = "/profile.php?search=" + search;
}
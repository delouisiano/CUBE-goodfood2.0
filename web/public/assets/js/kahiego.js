const __MVC__ = "./assets/cUse.php";

function extractUrlParams(s) {
    var t = s.substring(1).split('&');
    var f = [];
    for (var i = 0; i < t.length; i++) {
        var x = t[i].split('=');
        f[x[0]] = decodeURIComponent(x[1]);
    }
    return f;
};

function isPhoneNumber(phone) {
    return (phone.match(/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/gmi) ? true : false);
}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function toTimestamp(strDate) {
    var datum = Date.parse(strDate);
    return datum / 1000;

}

function formatSizeUnits(bits) {
    if (bits >= 1048576 /* 1024 * 1024 */ )
        bits = (bits / 1048576).toFixed(2) + " MB";
    else if (bits >= 1024)
        bits = (bits / 1024).toFixed(2) + " KB";
    else bits = bits + " B";
    return bits;
}

function whatMonth(id) {
    let months = new Array("janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre");
    return months[parseInt(id - 1)];
}

function formatDate(dateString) {
    var allDate = dateString.split(' ');
    var thisDate = allDate[0].split('-');
    var newDate = [thisDate[2], whatMonth(thisDate[1]), thisDate[0]].join(" ");
    return newDate;
}

/** retourne une string correspondant à la date au format dd/mm/yyyy */
Date.prototype.ddmmyyyy = function() {
    var yyyy = this.getFullYear().toString();
    var mm = (this.getMonth() + 1).toString(); // getMonth() is zero-based
    var dd = this.getDate().toString();
    return (dd[1] ? dd : "0" + dd[0]) + '/' + (mm[1] ? mm : "0" + mm[0]) + '/' + yyyy;
};


/** Perform an asynchronous HTTP (Ajax) request.
 * @param args A set of key/value pairs that configure the Ajax request
 * (async, data, dataType, error, success, type, url, ...).
 * @see https://api.jquery.com/jquery.ajax/
 */
function ajax(opt = []) {
    let xmlhttp = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.open(opt.type, (opt.url ? opt.url : __MVC__) + (opt.type == 'GET' ? "?" + opt.data : ''), opt.async !== false);

    let cover;
    if (opt.contentType !== false) xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    if (opt.dataType === 'json') xmlhttp.setRequestHeader('Accept', 'application/json');
    if (opt.timeout) { xmlhttp.timeout = opt.timeout; }

    xmlhttp.onloadstart = function() {
        if (opt.cover) {
            cover = opt.cover.querySelector('.loading');
            if (!cover) {
                cover = document.createElement("div");
                cover.setAttribute('role', 'status');
                cover.classList.add("loading");
                cover.classList.add("load-edc");
                cover.setAttribute('remaining', 1)
                opt.cover.appendChild(cover);
            } else {
                cover.setAttribute('remaining', parseInt(cover.getAttribute('remaining')) + 1);
            }
        }
        if (opt.defaultBtn) opt.defaultBtn.disabled = true;
    }
    xmlhttp.onloadend = function() {
        let resp = (this.response && opt.dataType === 'json' ? JSON.parse(this.response) : this.response);
        if (cover) {
            if (parseInt(cover.getAttribute('remaining')) == 1) cover.remove();
            else cover.setAttribute('remaining', parseInt(cover.getAttribute('remaining')) - 1);
        }
        if (this.status == 200) {
            if (opt.success) opt.success(resp);
        } else if (resp.code == 99998) {
            if (window.location.href.includes('.modal.php')) {
                window.top.location = './accueil.php';
                return; }
            dynamicModal({src: 'connect.modal.php'}, {width : '100%', height: '345px', scrolling : 'no', static: true});
        } else if (opt.error) opt.error(resp);
        if (opt.defaultBtn) opt.defaultBtn.disabled = false;
    }

    xmlhttp.onerror = function() {
        let resp = (this.response && opt.dataType === 'json' ? JSON.parse(this.response) : this.response);
        if (opt.error) opt.error(resp);
        if (opt.defaultBtn) opt.defaultBtn.disabled = false;
        if (cover) cover.remove();
    }
    xmlhttp.send(opt.data);

}
/**/


/** sérialise un objet (par défaut, en fonction de name)
 * @param {*} args
 * class -- la fonction sérialise en fonction de classname
 * @see //if (Array.isArray(val)) return val.map(function (val, i) { return { name:el.name, value:val }; });
 */
Object.prototype.serialize = function(opt = []) {
    let elements;
    if (this.name) elements = document.querySelectorAll('[name=' + this.name + '] *');
    else elements = this.querySelectorAll('*');

    if (opt['class']) test = function(el) { return opt['class'].test(el.className) }
    else test = function(el) { var regType = /input|select|textarea/i; return regType.test(el.nodeName); }

    let datas = Array.from(elements)
        .filter(el => test(el) && el.name && !el.disabled && (el.type !== 'radio' || el.checked))
        .map(el => {
            var val = el.value;
            if (val === null || el.indeterminate) return null;
            if (el.type === 'checkbox') val = el.checked ? 1 : 0;
            return ({ name: el.name, value: val });
        });

    if (datas.length == 0) return null;
    let resp = '';
    datas.forEach(function(item) { resp += item.name + '=' + encodeURIComponent(item.value) + '&'; });
    return resp.slice(0, -1);
}

/** prépare les enfants [name] d'un objet
 * @param {*} opt
 * @see https://www.w3schools.com/js/js_validation_api.asp
 */
Object.prototype.prepare = function(opt = []) {
    let elements;
    if (this.name) elements = document.querySelectorAll('[name=' + this.name + '] [name]');
    else elements = this.querySelectorAll('[name]');

    elements.forEach(el => {
        el.addEventListener('change', function() {
            el.classList.add("modified");
            if (el.checkValidity()) {
                if (el.type === 'radio') {
                    document.getElementsByName(el.name).forEach(radioel => {
                        radioel.classList.remove('is-invalid');
                    })
                } else el.classList.remove("is-invalid");
            } else el.classList.add("is-invalid");
        });

        if (opt.defaultBtn)
            el.addEventListener("keydown", function(e) {
                if (e.code == "Enter" || e.code == "NumpadEnter") {
                    e.preventDefault();
                    opt.defaultBtn.focus();
                    opt.defaultBtn.click();
                }
            });
    });
};

/** remplit par l'attribut name les enfants d'un objet
 * en fonction des données passées en paramètre
 * @param {*} oDatas
 * @see optimize
 * @see Array.from() vs querySelectorAll()
 */
Object.prototype.fill = function(oDatas) {
    var selector;
    var form = this;
    if (form.name) selector = function(selkey) { return document.querySelectorAll('[name=' + form.name + '] ' + selkey)[0]; };
    else selector = function(selkey) { return form.querySelectorAll(selkey)[0]; };

    Object.entries(oDatas).forEach(entry => {
        const [key, value] = entry;
        if (value === null) return;
        if (typeof value == 'object') return;
        let el = selector('[name=' + key + ']');
        if (el === undefined) return;

        switch (el.type) {
            case 'radio':
                el = selector('[name=' + key + '][value="' + value + '"]');
                if (el === undefined) return;
            case 'checkbox':
                el.checked = parseInt(value) || value === true;
                break;

            case 'date':
                el.valueAsDate = new Date(value.date);
                break;

            default:
                el.value = value;
        }
    });
};

/** reset les forms et remove les class .modified + .invalid
 */
Object.prototype.erase = function(opt = []) {
    if (this.name) {
        let forms = document.querySelectorAll('[name=' + this.name + ']');
        forms.forEach(f => { f.reset(); });
    } else this.reset();

    let elements;
    if (this.name) elements = document.querySelectorAll('[name=' + this.name + '] .modified, [name=' + this.name + '] :invalid');
    else elements = this.querySelectorAll('.modified, :invalid');
    elements.forEach(el => {
        el.classList.remove('modified');
        el.classList.remove('is-invalid');
    });

    return false;
}


/** définit les événements sur une tabulation */
Object.prototype.tabBind = function(opt = []) {
    var tabs = this
    var arrtabs = tabs.querySelectorAll('.tab-');
    var arrpages = document.querySelectorAll(opt['tabpages']);
    arrtabs.forEach(function(el) {
        el.onclick = function() {
            if (this.disabled) return;
            //if () this.classList.add('tab-active');
            var idx = [].slice.call(arrtabs).indexOf(this);
            tabs.getElementsByClassName('tab-active')[0].classList.remove('tab-active');
            document.querySelectorAll(opt['tabpages'] + '.page-active')[0].classList.remove('page-active');
            this.classList.add('tab-active');
            arrpages[idx].classList.add('page-active');
        }
    });
}


/** Create modals based on display type and arguments
 * @param {*} type
 * @param {*} args
 */
function dynamicModal(type, args) {
    let stdModal = document.createElement("div");
    document.body.appendChild(stdModal);
    stdModal.id = "stdModal";
    stdModal.classList = "modal fade";
    stdModal.addEventListener('hidden.bs.modal', function() { stdModal.remove(); })
    modalDiv = document.createElement("div");
    stdModal.appendChild(modalDiv);
    modalDiv.classList = "modal-dialog modal-dialog-centered";
    //Sets the size of the modal, corresponding to Bootstrap standard sizes
    //If no argument, medium size will be displayed by defaults
    if (type.size) { modalDiv.classList.add(type.size) } else(modalDiv.classList.add("modal-md"))
    if (type.img) {
        modalDiv.classList.add("PEauto");
        var DOM_new = document.createElement("img");
        DOM_new.src = type.img;
        modalDiv.appendChild(DOM_new);
    } else if (type.txt) {
        modalContent = document.createElement("div");
        modalDiv.appendChild(modalContent);
        modalContent.classList = "modal-content";

        modalBody = document.createElement("div");
        modalBody.classList = "modal-body";
        modalContent.appendChild(modalBody);

        var DOM_new = document.createElement("p");
        DOM_new.id = "modal_mess"
        DOM_new.innerHTML = type.txt;
        modalBody.appendChild(DOM_new);
    } else if (type.src) {
        modalDiv.classList.add("PEauto");
        var DOM_new = document.createElement("iframe");
        DOM_new.classList = 'rounded border-secondary shadow-lg'
        DOM_new.src = type.src;
        modalDiv.appendChild(DOM_new);
    }
    //Optionnals arguments
    if (args) {
        if (DOM_new) {
            for (const key in args) {
                for (const key in args) {
                    DOM_new.style[key] = args[key];
                }
            }
        }
        if (args.scrolling) { DOM_new.scrolling = args.scrolling; }
        //if (args.static == true) { static = true }
        if (args.closeBtn) {
            var DOM_newBtn = document.createElement("button");
            modalContent.classList.add('modalContainer');
            DOM_newBtn.classList = "login-btn modalBtn";
            DOM_newBtn.innerHTML = args.closeBtn;
            DOM_newBtn.setAttribute("title", "Fermer la fenêtre")
            DOM_newBtn.addEventListener('click', () => { window.top.postMessage("killmodal", "*") })
            modalContent.appendChild(DOM_newBtn);

        }
        if (args.header) {
            modalHeader = document.createElement("div");
            modalHeader.id = "container-modal";
            modalHeader.classList = "modal-header modal-header-eurodatacar center";
            modalHeader.innerHTML = '<img src="./assets/img/eurodatacar-logo.png" alt="Eurodatacar Logo">' +
                '<p style="font-size: 40px">' + args.header + '</p>' +
                modalContent.prepend(modalHeader);
        }
    }
    let myModal;
    if (typeof args.static != 'undefined' || args.static == true) {
        myModal = new bootstrap.Modal(stdModal, {
            backdrop: 'static', keyboard: false });
    }
    else {
        myModal = new bootstrap.Modal(stdModal);
    }
    myModal.show();
    window.onmessage = function(e) {
        if (e.data == 'killmodal') {
            myModal.hide();
        }
    };
}

/** display notification
 */
function notify(opt = []) {
    var notifyCloseTimer;
    closeNotify();

    let notif = document.createElement("div");
    notif.classList.add("notify");
    notif.classList.add('n-' + opt.type);
    let span = notif.appendChild(document.createElement('span'));
    span.innerText = opt.content;
    let cancel = notif.appendChild(document.createElement('button'));
    cancel.classList.add("n-cancel");
    cancel.addEventListener("click", closeNotify);
    document.querySelector('html').appendChild(notif);
    notifyCloseTimer = setInterval(closeNotify, 2500);

    function closeNotify() {
        clearInterval(notifyCloseTimer);
        let notif = document.querySelector('div.notify');
        if (!notif) return;
        notif.remove();
    }
}


/** détruit la session et renvoie vers la page index */
function disconnect() {
    ajax({
        type: "GET",
        async: true,
        data: 'funcname=obj\\cInterlocutor::disconnect&public=1',
        success: function() { window.location = "index.php"; }
    });
}
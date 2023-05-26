function redirection(page){
	setTimeout(geturl(page), 10000);
	return false;
}

function geturl(page){
	origin = document.location.origin;		
	url=origin+"/"+page;
    console.log(url);
	location = url;
}
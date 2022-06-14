var div_fav = document.querySelector("#preferiti");

for (let i = 0; i< div_fav.children.length; i++){

    div_fav.children[i].children[0].addEventListener("click", remFav);

}

function remFav(event){
    var img_selected = event.srcElement.parentElement.children[1].children[0].currentSrc;
    var url_selected = event.srcElement.parentElement.children[1].href;
    img_selected = img_selected.substring(24 ,img_selected.length);
    url_selected = url_selected.substring(31 ,url_selected.length);

    console.log(img_selected);
    console.log(url_selected);

    fetch("del/"+img_selected+"/"+url_selected);

    var div = event.currentTarget.parentElement.parentElement;

    while(div.firstChild){

        div.removeChild(div.firstChild);

    }

    setTimeout(get, 200);
}

function get(){
    fetch("all_fav").then(onResponseAll).then(OnJSONAll);
}

function onResponseAll(response){
    return response.json();
}

function OnJSONAll(json){

    for(let i =0; i<json.length;i++){
        const item = document.createElement("div");
        item.classList.add("flex-item");
        const imgBlock = document.createElement("img");

        const albumLink = document.createElement('a');
        albumLink.setAttribute('href', json[i].url);
        albumLink.setAttribute('target', "_blank");
        imgBlock.src=json[i].img;

        albumLink.appendChild(imgBlock);

        const heart = document.createElement("img");
        heart.addEventListener("click", remFav);
        heart.src = "img/cuore_pieno.png";
        heart.id = "onlick_remove";

        item.appendChild(heart);
        item.appendChild(albumLink);
        item.dataset.songId =json[i].id_canzone;
        div_fav.appendChild(item);
    }
}

const form = document.querySelector('form');
form.addEventListener('submit', Cerca);

const testo = document.querySelector('#testo');
const bottone = testo.querySelector('#submit');
bottone.addEventListener('click', lyrics);


const client_id = '6abaa1a35fcf404f9a1fafdb50ed4b29';
const client_secret = '86bdad9569b2428486f852fc736fd654';

let token;


function onResponse(response) {
   console.log('Risposta ricevuta');
    return response.json();
    console.log(response.text);
    
}

 function onrespNew(response){
    return response.json();
}

function onjnew(json){

  console.log(json);

}


function addFav(event){
  event.currentTarget.src="img/cuore_pieno.png";
  event.currentTarget.removeEventListener("click", addFav);
  
  var img_selected = event.srcElement.parentElement.childNodes[1].currentSrc;
  var url_selected = event.srcElement.parentElement.childNodes[3].href;
  img_selected = img_selected.substring(24 ,img_selected.length);
  url_selected = url_selected.substring(31 ,url_selected.length);
  /*console.log(img_selected);
  console.log(url_selected);*/

  fetch("fav/"+img_selected+"/"+url_selected).then(onrespNew).then(onjnew);
}

function onJson(json) {
    console.log(json); 
    // Svuotiamo la libreria
    const library = document.querySelector('#cover');
    library.innerHTML = '';
    num_results=json.tracks.items.length;
    console.log(num_results);
    // Leggi il numero di risultati
    for(let i=0; i<num_results; i++){
    const results = json.tracks.items[i];
    const mamma = results.album;

    // Mostriamone al massimo 10
    if(num_results > 10)
      num_results = 10;
    // Processa ciascun risultati
      
      // Leggiamo info
      const title = results.name;
      const selected_image = mamma.images[0].url;
      // Creiamo il div che conterrà immagine e didascalia
      const songs = document.createElement('div');
      songs.classList.add('stile');
      const img = document.createElement('img');
      img.src = selected_image;
      const caption = document.createElement('p');
      caption.textContent = title;
      const link= document.createElement('a');
      link.setAttribute('href', mamma.external_urls.spotify);
      link.setAttribute('target', "_blank");
      link.textContent = "Apri su spotify";
      const cuore = document.createElement("img");
      //cuore.dataset.songId = results;
      cuore.src="img/cuore.png";
      cuore.classList.add("favorite");
      cuore.dataset.songName = title;
      cuore.dataset.singerName = results.artists[0].name;
      cuore.addEventListener("click", addFav);
      songs.appendChild(cuore);

      // Aggiungiamo immagine e didascalia al div
      songs.appendChild(img);
      songs.appendChild(caption);
      songs.appendChild(link);
      //Aggiungiamo il div all'article
      library.appendChild(songs);


      link.addEventListener('click', addLastListened);

    }
  }

function addLastListened(event){
  console.log(event);

  var img_selected = event.srcElement.parentElement.childNodes[1].currentSrc;
  var url_selected = event.srcElement.parentElement.childNodes[3].href;

  img_selected = img_selected.substring(24 ,img_selected.length); 
  url_selected = url_selected.substring(31 ,url_selected.length);

  fetch("last_rep/"+img_selected+"/"+url_selected).then(onrespNew).then(onjnew);
}


function Cerca(event){
    event.preventDefault();
    const tracks = document.querySelector('#brano');
    const tracks_value = encodeURIComponent(tracks.value);
    console.log('Eseguo ricerca: ' + tracks_value);
    
    console.log(tracks.value);
    
    console.log(tracks_value);

    //richiesta
    fetch("spotify/"+tracks_value).then(onResponse).then(onJson);
  }

  function onTokenJson(json){
 //   console.log(json)
    // Imposta il token global
    token = json.access_token;
  }
  
  function onTokenResponse(response){
    return response.json();
  }
  
  fetch("https://accounts.spotify.com/api/token",
  {
 method: "post",
 body: 'grant_type=client_credentials',
 headers:
 {
  'Content-Type': 'application/x-www-form-urlencoded',
  'Authorization': 'Basic ' + btoa(client_id + ':' + client_secret)
 }
}
).then(onTokenResponse).then(onTokenJson);


function lyrics(event){
  event.preventDefault();
  const text_artista = testo.querySelector('#nome_artista');
  const text_brano = testo.querySelector('#nome_brano');
  const url = "https://api.lyrics.ovh/v1/"
  if(text_artista.value === "" || text_brano.value === ""){
    alert("Entrambi i campi devono essere compilati.")
  }else{
    fetch('lyrics/' + text_artista.value + '/' + text_brano.value).then(onResponseCatch).then(onJsonDue);
  }
}

function onResponseCatch(response){
  return response.json();
}

function onJsonDue(json){
  const text_artista = testo.querySelector('#nome_artista');
  const text_lyrics = testo.querySelector('#text_lyrics');
  if(json.error === "No lyrics found"){
    alert("Non è stato trovato alcun brano di " + text_artista.value);
  }else{
    text_lyrics.innerHTML = "";
    text_lyrics.innerHTML = json.lyrics;
  }
}
